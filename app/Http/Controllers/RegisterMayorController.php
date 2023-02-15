<?php

namespace App\Http\Controllers;

use App\Models\RegisterMayor;
use App\Models\User;
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

        $mayors = User::where("usertype", "Mayor")
                    ->orwhere("usertype", "Coridor")
                    ->where("banned","!=","")
                    ->get();

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
        $usertype = auth()->user()->usertype;
         return view('registermayor.createphakbet',compact('usertype'));
     }
 
     public function phakbetlist()
     {
        $usertype = auth()->user()->usertype;
        return view('registermayor.phakbetlist',compact('usertype'));
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store_mayor(Request $request)
    {
        $request->validate([
            'usertype' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'mobile' => ['required', 'string', 'max:11', 'unique:'.User::class],
        ]);

        $pw= generateRandom(10);
        $ref_code = generateRandom(6);
        $clientIP = "49.145.111.137";
        //$clientIP =  request()->ip(); 
        $data = \Location::get($clientIP);  
        
        $region_code= $data->regionCode;
        $region= $data->regionName;
        $city= $data->cityName;

        $data = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make($pw),
            'mobile'=>$request->input('mobile'),
            'usertype'=>$request->input('usertype'),
            'gcash'=>$request->input('gcash'),
            'maya' =>$request->input('maya'),
            'king_id'=>auth()->user()->id,
            'mayor_id'=>$request->input('mayor'),
            'ref_code'=>$ref_code,
            'region_code'=>$region_code,
            'region'=>$region,
            'city'=>$city
        ]);
        return redirect()->route('registermayor.create')->with('status','Registered successfully! Your referral code is: ' . $ref_code  .'. Your password is: '. $pw .'');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterMayor $registerMayor)
    {
        //
    }
}
