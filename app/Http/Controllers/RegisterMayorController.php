<?php

namespace App\Http\Controllers;

use App\Models\RegisterMayor;
use App\Models\User;
use App\Models\WalletCoridor;
use App\Models\WalletMayor;
use App\Models\WalletKing;
use App\Models\WalletUser;
use App\Models\WalletAdmin;
use App\Models\SmsOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterMayorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;

        if($usertype == "King"){
           
                $mayors = User::where("banned","0")->where("king_id", $userid)->where(function($query) {
                    $query->where("usertype", "Mayor")
                    ->orwhere("usertype", "Coridor");
                })->get();
                  

          
        } else if($usertype == "Mayor"){
            $mayors = User::where("banned","=","0")
                ->where("mayor_id", $userid)
                ->where("usertype", "Coridor")
                ->get();

        } 

        return view('registermayor.index',compact('usertype', 'mayors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $usertype = auth()->user()->usertype;
        $mayors = User::select('id','name')
                        ->where('usertype','Mayor')
                        ->where('banned','0')
                        ->get();

      //  $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        //echo $details->city; // -> "Mountain View"
        
        return view('registermayor.create',compact('usertype', 'mayors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function createphakbet()
     {
        $id = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        if($usertype == "King"){
            $mayors = User::select('id','name')
            ->where('usertype','Mayor')
            ->where('banned','0')
            ->where('king_id',$id)
            ->get();
            $coridors=array();
        } 
        if($usertype == "Mayor"){
            
            $mayors=array();
            $coridors = User::select('id','name')
            ->where('usertype','Coridor')
            ->where('mayor_id', $id)
            ->where('banned','0')
            ->get();
        }
        if($usertype == "Coridor"){
          
            $mayors=array();
            $coridors = array();
        }
         return view('registermayor.createphakbet',compact('usertype', 'mayors', 'coridors'));
     }
 
     public function phakbetlist()
     {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $userid = auth()->user()->id;
        $userwallet = getUserDetails($userid, "curr_wallet");
        if($usertype== 'King'){
            $phakbets = User::where("banned","=","0")
                        ->where("usertype", "Phakbet")
                        ->where("king_id", $userid)
                        ->get();
        } else if($usertype== 'Mayor'){
            $phakbets = User::where("banned","=","0")
                        ->where("usertype", "Phakbet")
                        ->where("mayor_id", $userid)
                        ->get();
        } else if($usertype== 'Coridor'){
            $phakbets = User::where("banned","=","0")
            ->where("usertype", "Phakbet")
            ->where("coridor_id", $userid)
            ->get();
        }
        return view('registermayor.phakbetlist',compact('usertype','phakbets','userwallet'));
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store_mayor(Request $request)
    {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $now=date("Y-m-d");
        $nowtime=date("Y-m-d H:i:s");
        $wallet_max = getUserDetails($userid, "curr_wallet");
        $payment_ref = date("YmdHis").generateRandom('6');
        if($usertype== "King"){

            if($request->input('usertype') == "Mayor"){
                $request->validate([
                    'usertype' => ['required', 'string'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                    'mobile' => ['required', 'string', 'min:11','max:11', 'unique:'.User::class],
                    'wallet'=>['numeric','max:'.$wallet_max]
                ],[
                    'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
                ]);
            } else if($request->input('usertype') == "Coridor" || $request->input('usertype') == "Phakbet"){
                $request->validate([
                    'usertype' => ['required', 'string'],
                    'name' => ['required', 'string', 'max:255'],
                    'mobile' => ['required', 'string', 'min:11','max:11', 'unique:'.User::class],
                    'wallet'=>['numeric','max:'.$wallet_max]
                ],[
                    'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
                ]);
            }
        } else if($usertype == "Mayor"){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'string',  'min:11','max:11', 'unique:'.User::class],
                'wallet'=>['numeric','max:'.$wallet_max]
            ],[
                'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
            ]);

        } 
        $king = getUpline("king", auth()->user()->id, 'id');

        $pw= generateRandom(10);
        $ref_code = failsafe_refcode();
        $clientIP = "49.145.111.137";
        //$clientIP =  request()->ip(); 
        $data = \Location::get($clientIP);  
        
        $region_code= $data->regionCode;
        $region= $data->regionName;
        $city= $data->cityName;

      

     
        if($usertype == "King"){

            
            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>$request->input('usertype'),
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'king_id'=>$userid,
                'mayor_id'=>$request->input('mayor'),
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'

            ]);

            $kingdata = User::find($userid);
            $kingdata->curr_wallet = $kingdata->curr_wallet-$request->input('wallet');
            $kingdata->save();

            SmsOut::create([
                'sms_to'=>$request->input('mobile'),
                'sms_text'=>"Thanks for registering to Phakbet. Your password is ".$pw,
                'sms_from'=>"+639668096065",
                'sms_timestamp'=>$nowtime,
                
            ]);

            $walletdata = WalletKing::create([
                'transaction_date'=>$now,
                'king_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet'),
                'transaction_reference'=>$payment_ref
            ]);

            if($request->input('usertype') == 'Mayor'){
                $walletdata = WalletMayor::create([
                    'transaction_date'=>$now,
                    'mayor_id'=>$data_user_id,
                    'transaction_type'=>'Wallet top-up from '. $usertype,
                    'debit'=>$request->input('wallet'),
                    'transaction_reference'=>$payment_ref
                ]);
            } 
            
            if($request->input('usertype') == 'Coridor'){
                $walletdata = WalletCoridor::create([
                    'transaction_date'=>$now,
                    'coridor_id'=>$data_user_id,
                    'transaction_type'=>'Wallet top-up from '.$usertype,
                    'debit'=>$request->input('wallet'),
                    'transaction_reference'=>$payment_ref
                ]);
            }

        } else if($usertype == "Mayor"){

            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>'Coridor',
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'king_id'=>$king,
                'mayor_id'=>$userid,
                'coridor_id'=>'0',
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'

            ]);

            SmsOut::create([
                'sms_to'=>$request->input('mobile'),
                'sms_text'=>"Thanks for registering to Phakbet. Your password is ".$pw,
                'sms_from'=>"+639668096065",
                'sms_timestamp'=>$nowtime,
                
            ]);

            $mayordata = User::find($userid);
            $mayordata->curr_wallet = $mayordata->curr_wallet-$request->input('wallet');
            $mayordata->save();

            $walletdata = WalletMayor::create([
                'transaction_date'=>$now,
                'mayor_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet'),
                'transaction_reference'=>$payment_ref
            ]);

            $walletdata = WalletCoridor::create([
                'transaction_date'=>$now,
                'coridor_id'=>$data_user_id,
                'transaction_type'=>'Wallet top-up from '.$usertype,
                'debit'=>$request->input('wallet'),
                'transaction_reference'=>$payment_ref
            ]);
        }
       

        return redirect()->route('registermayor.create')->with('status','Registered successfully! The user\'s referral code is: ' . $ref_code  .'. The user\'s password is: '. $pw .'');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    
     public function store_phakbet(Request $request)
    {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $now =date("Y-m-d");
        $nowtime = date("Y-m-d H:i:s");
        $wallet_max = getUserDetails($userid, "curr_wallet");
        
        
        if($usertype == "King"){
          
            $request->validate([
                'mayor' => 'required',
                'coridor' => 'required',
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:11|max:11|unique:'.User::class,
                'wallet'=>'numeric|max:'.$wallet_max
            ],[
                'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
            ]);
        }  
        if($usertype == "Mayor"){
            $request->validate([
                'coridor' => 'required',
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:11|max:11|unique:'.User::class,
                'wallet'=>'numeric|max:'.$wallet_max
            ],[
                'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
            ]);
        }
        if($usertype == "Coridor"){

         
            $request->validate([
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:11|max:11|unique:'.User::class,
                'wallet'=>'numeric|max:'.$wallet_max
            ],[
                'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
            ]);
        }

        $pw= generateRandom(4);
        $ref_code = failsafe_refcode();

       
        $clientIP = "49.145.111.137";
        //$clientIP =  request()->ip(); 
        $data = \Location::get($clientIP);  
        
        $region_code= $data->regionCode;
        $region= $data->regionName;
        $city= $data->cityName;
        $king = getUpline("king", auth()->user()->id, 'id');
        $mayor = getUpline("mayor", auth()->user()->id, 'id');
        

        if($usertype == "King"){
            $kingdata = User::find($userid);
            $kingdata->curr_wallet = $kingdata->curr_wallet-$request->input('wallet');
            $kingdata->save();

            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>'Phakbet',
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'king_id'=>auth()->user()->id,
                'mayor_id'=>$request->input('mayor'),
                'coridor_id'=>$request->input('coridor'),
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'
    
            ]);

            SmsOut::create([
                'sms_to'=>$request->input('mobile'),
                'sms_text'=>"Thanks for registering to Phakbet. Your password is ".$pw,
                'sms_from'=>"+639668096065",
                'sms_timestamp'=>$nowtime,
                
            ]);
    
            $walletdata = WalletUser::create([
                'transaction_date'=>$now,
                'user_id'=>$data_user_id,
                'transaction_type'=>'Wallet top-up from King',
                'debit'=>$request->input('wallet')
            ]);

            $walletdata = WalletKing::create([
                'transaction_date'=>$now,
                'king_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet')
            ]);

        } else if($usertype == "Mayor"){
            $mayordata = User::find($userid);
            $mayordata->curr_wallet = $mayordata->curr_wallet-$request->input('wallet');
            $mayordata->save();
         
            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>'Phakbet',
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'king_id'=>$king,
                'mayor_id'=>auth()->user()->id,
                'coridor_id'=>$request->input('coridor'),
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'
    
            ]);

            SmsOut::create([
                'sms_to'=>$request->input('mobile'),
                'sms_text'=>"Thanks for registering to Phakbet. Your password is ".$pw,
                'sms_from'=>"+639668096065",
                'sms_timestamp'=>$nowtime,
                
            ]);
    
            $walletdata = WalletUser::create([
                'transaction_date'=>$now,
                'user_id'=>$data_user_id,
                'transaction_type'=>'Wallet top-up from Mayor',
                'debit'=>$request->input('wallet')
            ]);

            $walletdata = WalletMayor::create([
                'transaction_date'=>$now,
                'mayor_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet')
            ]);
        }
        else if($usertype == "Coridor"){
            $coridordata = User::find($userid);
            $coridordata->curr_wallet = $coridordata->curr_wallet-$request->input('wallet');
            $coridordata->save();
          
            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>'Phakbet',
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'king_id'=>$king,
                'mayor_id'=>$mayor,
                'coridor_id'=>auth()->user()->id,
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'
    
            ]);
    
            SmsOut::create([
                'sms_to'=>$request->input('mobile'),
                'sms_text'=>"Thanks for registering to Phakbet. Your password is ".$pw,
                'sms_from'=>"+639668096065",
                'sms_timestamp'=>$nowtime,
                
            ]);

            $walletdata = WalletUser::create([
                'transaction_date'=>$now,
                'user_id'=>$data_user_id,
                'transaction_type'=>'Wallet top-up from Kuridor',
                'debit'=>$request->input('wallet')
            ]);

            $walletdata = WalletCoridor::create([
                'transaction_date'=>$now,
                'coridor_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet')
            ]);
        }

        return redirect()->route('createphakbet')->with('status','Registered successfully! The user\'s referral code is: ' . $ref_code  .'. The user\'s password is: '. $pw .'');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {
        $details = User::find($id);
        $usertype = auth()->user()->usertype;
        return view('registermayor.show',compact('details', 'usertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function add_wallet(Request $request)
    {
       $count = $request->input('count');
       $phakbetid = $request->input('user_id_'.$count);
       $ref_code = getUserDetails($phakbetid, "ref_code");
       $now=date("Y-m-d");
       $userid = auth()->user()->id;
       $usertype = getUserDetails($userid, "usertype");
       $userwallet = getUserDetails($userid, "curr_wallet");


       $phakbetdata = User::find($phakbetid);
       $phakbetdata->curr_wallet = $phakbetdata->curr_wallet+$request->input('wallet_'.$count);
       $phakbetdata->save();

        WalletUser::create([
            'transaction_date'=>$now,
            'user_id'=>$phakbetid,
            'transaction_type'=>'Wallet top-tup',
            'debit'=>$request->input('wallet_'.$count)
        ]);


       $userdata = User::find($userid);
       $userdata->curr_wallet = $userdata->curr_wallet-$request->input('wallet_'.$count);
       $userdata->save();

       if($usertype=='King'){
            $walletdata = WalletKing::create([
                'transaction_date'=>$now,
                'king_id'=>$userid,
                'transaction_type'=>'Wallet top-up for user #'.$ref_code,
                'credit'=>$request->input('wallet_'.$count)
            ]);
       } else if($usertype == "Mayor"){
            $walletdata = WalletMayor::create([
                'transaction_date'=>$now,
                'mayor_id'=>$userid,
                'transaction_type'=>'Wallet top-up for user #'.$ref_code,
                'credit'=>$request->input('wallet_'.$count)
            ]);
       } else if($usertype == "Coridor"){
            $walletdata = WalletCoridor::create([
                'transaction_date'=>$now,
                'coridor_id'=>$userid,
                'transaction_type'=>'Wallet top-up for user #'.$ref_code,
                'credit'=>$request->input('wallet_'.$count)
            ]);
       }

       return redirect()->route('phakbetlist')->with('status','Wallet topped-up successfully for user #' . $ref_code);
    }

    public function registerking()
     {
       
         return view('registermayor.registerking');
     }

     public function store_king(Request $request)
    {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $now =date("Y-m-d");
        $nowtime = date("Y-m-d H:i:s");
        $wallet_max = getUserDetails($userid, "curr_wallet");
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'mobile' => ['required', 'string',  'min:11','max:11', 'unique:'.User::class],
            'wallet'=>['numeric','max:'.$wallet_max]
        ],[
            'wallet.max' => 'Top-up your wallet to register users. Current wallet: '.number_format($wallet_max,2) ,
        ]);
     

        $pw= generateRandom(4);
        $ref_code = failsafe_refcode();

        $clientIP = "49.145.111.137";
        //$clientIP =  request()->ip(); 
        $data = \Location::get($clientIP);  
        
        $region_code= $data->regionCode;
        $region= $data->regionName;
        $city= $data->cityName;
 

            $admindata = User::find($userid);
            $admindata->curr_wallet = $admindata->curr_wallet-$request->input('wallet');
            $admindata->save();

            $data_user_id = User::insertGetId([
                'date_registered'=>$nowtime,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($pw),
                'mobile'=>$request->input('mobile'),
                'usertype'=>'King',
                'gcash'=>$request->input('gcash'),
                'maya' =>$request->input('maya'),
                'ref_code'=>$ref_code,
                'region_code'=>$region_code,
                'region'=>$region,
                'city'=>$city,
                'curr_wallet'=>$request->input('wallet'),
                'first_time_logged_in'=>'1'
    
            ]);
    
            $walletdata = WalletKing::create([
                'transaction_date'=>$now,
                'king_id'=>$data_user_id,
                'transaction_type'=>'Wallet top-up from Admin',
                'debit'=>$request->input('wallet')
            ]);

            $walletdata = WalletAdmin::create([
                'transaction_date'=>$now,
                'admin_id'=>$userid,
                'transaction_type'=>'Registration of user #'. $ref_code,
                'credit'=>$request->input('wallet')
            ]);

       

        return redirect()->route('registerking')->with('status','Registered successfully! The user\'s referral code is: ' . $ref_code  .'. The user\'s password is: '. $pw .'');
    }

    
    public function kinglist()
    {
       $usertype = auth()->user()->usertype;
       $userid = auth()->user()->id;
       $userwallet = getUserDetails($userid, "curr_wallet");
     
           $kings = User::where("banned","=","0")
           ->where("usertype", "King")
           ->get();
       
       return view('registermayor.kinglist',compact('usertype','kings','userwallet','userid'));
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
  
}
