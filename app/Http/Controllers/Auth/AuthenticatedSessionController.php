<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LoginLogs;
use App\Models\EventWinners;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $banned = auth()->user()->banned;
        //echo $id;
        //echo $request->session()->get('usertype');
        if($banned == 0){
                if($usertype=='King'){
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else if($usertype=='Mayor'){

                $clientIP = "49.145.111.137";
                    $data = \Location::get($clientIP);  
                    $region_code= $data->regionCode;
                    $region= $data->regionName;
                    $city= $data->cityName;

                    $hasLocation = User::where('id',$userid)->get();
                    $loc = $hasLocation[0]['region'];
                    if($loc == ""){
                        $updateloc = User::find($userid);
                        $updateloc->region_code = $region_code;
                        $updateloc->region = $region;
                        $updateloc->city = $city;
                        $updateloc->save();

                    }

                    $now = date("Y-m-d H:i:s");
                    $getlogs= LoginLogs::where('user_id',$userid)->count();
                    if($getlogs==0){
                        $message = "";
                        LoginLogs::create([
                            'user_id'=>$userid,
                            'login_count'=>1,
                            'last_login'=>$now,
                            ]);
                    } else {
                    
                        $log = LoginLogs::where('user_id',$userid)->get();
                        $logid  = $log[0]['id'];
                        $latestlogs  = $log[0]['last_login'];
                        $count_wins = EventWinners::where('user_id',$userid)->count();
                    
                        if($count_wins == 0){
                            $message = "";
                        } else {
                        
                            
                            $getlatestwin = EventWinners::where('user_id',$userid)->orderBy('win_date', 'desc')->first();
                            
                            if($latestlogs < $getlatestwin['win_date']){
                                $message = "Congratulations, you have won an event! Go to Events Joined to view the event you have won.";
                            } else {
                                $message="";
                            }
                        }

                        $logs = LoginLogs::find($logid);
                        $logs->login_count = $logs->login_count + 1;
                        $logs->last_login = $now;
                        $logs->save();
                    }
                
                
                
                    return redirect(RouteServiceProvider::HOME_MAYOR)->with('lastlogin', $message);

                    //return redirect()->intended(RouteServiceProvider::HOME_MAYOR);
                }  else if($usertype=='Liaison'){

                    $clientIP = "49.145.111.137";
                    $data = \Location::get($clientIP);  
                    $region_code= $data->regionCode;
                    $region= $data->regionName;
                    $city= $data->cityName;
        
                    $hasLocation = User::where('id',$userid)->get();
                    $loc = $hasLocation[0]['region'];
                    if($loc == ""){
                        $updateloc = User::find($userid);
                        $updateloc->region_code = $region_code;
                        $updateloc->region = $region;
                        $updateloc->city = $city;
                        $updateloc->save();
        
                    }
                    return redirect()->intended(RouteServiceProvider::HOME_LIAISON);
                } else if($usertype=='Operator'){

                        $clientIP = "49.145.111.137";
                        $data = \Location::get($clientIP);  
                        $region_code= $data->regionCode;
                        $region= $data->regionName;
                        $city= $data->cityName;
            
                        $hasLocation = User::where('id',$userid)->get();
                        $loc = $hasLocation[0]['region'];
                        if($loc == ""){
                            $updateloc = User::find($userid);
                            $updateloc->region_code = $region_code;
                            $updateloc->region = $region;
                            $updateloc->city = $city;
                            $updateloc->save();
            
                        }
                        return redirect()->intended(RouteServiceProvider::HOME_OPERATOR);
                    
                } else if($usertype=='Accountant'){

                    $clientIP = "49.145.111.137";
                    $data = \Location::get($clientIP);  
                    $region_code= $data->regionCode;
                    $region= $data->regionName;
                    $city= $data->cityName;
        
                    $hasLocation = User::where('id',$userid)->get();
                    $loc = $hasLocation[0]['region'];
                    if($loc == ""){
                        $updateloc = User::find($userid);
                        $updateloc->region_code = $region_code;
                        $updateloc->region = $region;
                        $updateloc->city = $city;
                        $updateloc->save();
        
                    }
                    return redirect()->intended(RouteServiceProvider::HOME_ACCOUNTANT);
                
                }  else if($usertype=='Coridor' || $usertype=='Admin' || $usertype=='Phakbet'){
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect("login")->with('status','Login details are not valid.');
                }
            }  else {
                Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect("login")->with('status','Login details are not valid.');
            }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
