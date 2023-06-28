<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterMayorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HeirarchyController;
use App\Http\Controllers\WalletTransferController;
use App\Http\Controllers\LiaisonController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/dashboard', [DashboardController::class,'king_dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'prevent-back-history'],function(){
	Route::get('/dashboard', [DashboardController::class, 'king_dashboard'])->name('dashboard');

});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('registermayor', RegisterMayorController::class)->middleware(['auth', 'verified']);
Route::post('store_mayor', [RegisterMayorController::class, 'store_mayor'])->name('store_mayor')->middleware(['auth', 'verified']); 
Route::get('createphakbet', [RegisterMayorController::class, 'createphakbet'])->name('createphakbet')->middleware(['auth', 'verified']);
Route::post('store_phakbet', [RegisterMayorController::class, 'store_phakbet'])->name('store_phakbet')->middleware(['auth', 'verified']); 
Route::get('phakbetlist', [RegisterMayorController::class, 'phakbetlist'])->name('phakbetlist')->middleware(['auth', 'verified']);
Route::post('add_wallet', [RegisterMayorController::class, 'add_wallet'])->name('add_wallet')->middleware(['auth', 'verified']); 
Route::get('registerking', [RegisterMayorController::class, 'registerking'])->name('registerking')->middleware(['auth', 'verified']);
Route::post('store_king', [RegisterMayorController::class, 'store_king'])->name('store_king')->middleware(['auth', 'verified']); 
Route::get('kinglist', [RegisterMayorController::class, 'kinglist'])->name('kinglist')->middleware(['auth', 'verified']);

Route::get('getMayor/{id}', function ($usertype) {
    $id = auth()->user()->id;
    $mayor = App\Models\User::where('king_id',$id)
                            ->where('usertype', 'Mayor')->get();
    return response()->json($mayor);
});

Route::get('getCoridor/{id}', function ($mayor) {
    $Coridor = App\Models\User::where('mayor_id',$mayor)
                            ->where('usertype', 'Coridor')->get();
    return response()->json($Coridor);
});

Route::get('getQuestions/{id}', function ($questions) {
    
    $que = App\Models\QuestionBank::where('game_category_id',$questions)->get();
     return response()->json($que);
});


Route::get('closeEvent/{id}', function ($id) {
    $event = App\Models\Events::find($id);
    $event->closed='1';
    $event->save();
    return 'success';
});

Route::get('checkRefCode/{val}/{userid}', function ($refcode, $userid) {
 
    $que_self = App\Models\User::where('id',$userid)->where(function($query) use ($refcode){
        $query->where('ref_code', $refcode)
              ->orWhere('mobile', $refcode);

    })->count();
    if($que_self != 0){
        return 'invalid';
    } else {
        $que = App\Models\User::where('ref_code',$refcode)->orWhere('mobile',$refcode)->count();
        return $que;
    }
});

Route::get('checkRefCode_submit/{ref_code}', function ($ref_code) {

    $que_self = App\Models\User::where('id',$userid)->where(function($query) use ($refcode){
        $query->where('ref_code', $refcode)
              ->orWhere('mobile', $refcode);

    })->count();
    if($que_self != 0){
        return 'invalid';
    } else {
        $que = App\Models\User::where('ref_code',$refcode)->orWhere('mobile',$refcode)->count();
        return $que;
    }
});

Route::get('getdescription/{id}', function ($question) {
    $question = App\Models\QuestionBank::where('question',$question)->get();
    $desc=$question[0]['instruction'];
    return $desc;
});

Route::resource('events', EventsController::class)->middleware(['auth', 'verified']);
Route::get('finishedevents', [EventsController::class, 'finishedevents'])->name('finishedevents')->middleware(['auth', 'verified']);
Route::get('joined', [EventsController::class, 'joined'])->name('joinedevents')->middleware(['auth', 'verified']);
Route::post('set_winning_array', [EventsController::class, 'set_winning_array'])->name('set_winning_array')->middleware(['auth', 'verified']); 
Route::get('event_bettors', [EventsController::class, 'event_bettors'])->name('event_bettors')->middleware(['auth', 'verified']);
Route::get('viewbettors/{id}', [EventsController::class, 'viewbettors'])->name('viewbettors')->middleware(['auth', 'verified']);
Route::get('raffle_reservation/{id}', [EventsController::class, 'raffle_reservation'])->name('raffle_reservation')->middleware(['auth', 'verified']);

Route::resource('transactionhistory', TransactionHistoryController::class)->middleware(['auth', 'verified']);
Route::get('transactionreceipt/{id}', [TransactionHistoryController::class, 'transaction_receipt'])->name('transactionreceipt')->middleware(['auth', 'verified']); 
Route::get('user_wallets', [TransactionHistoryController::class, 'user_wallets'])->name('user_wallets')->middleware(['auth', 'verified']); 
Route::get('viewtransaction/{id}', [TransactionHistoryController::class, 'viewtransaction'])->name('viewtransaction')->middleware(['auth', 'verified']); 

Route::get('destroy', [ProfileController::class, 'destroy'])->name('destroy');
Route::get('view_profile/{id}', [ProfileController::class, 'profile'])->name('view_profile')->middleware(['auth', 'verified']); 
Route::get('myprofile', [ProfileController::class, 'viewprofile'])->name('myprofile')->middleware(['auth', 'verified']);
Route::get('editprofile', [ProfileController::class, 'editprofile'])->name('editprofile')->middleware(['auth', 'verified']); 
Route::post('update_profile', [ProfileController::class, 'update_profile'])->name('update_profile');  
Route::get('changemypassword', [ProfileController::class, 'changemypassword'])->name('changemypassword'); 
Route::post('changemypassword_process', [ProfileController::class, 'changemypassword_process'])->name('changemypassword_process'); 
Route::get('/mayor/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin_dashboard');
Route::get('mod_dashboard', [DashboardController::class, 'mod_dashboard'])->middleware(['auth', 'verified'])->name('mod_dashboard');
Route::get('accountant_dashboard', [DashboardController::class, 'accountant_dashboard'])->middleware(['auth', 'verified'])->name('accountant_dashboard');


Route::get('/login_phakbet', [UsersController::class, 'index'])->name('login_phakbet');
Route::post('login_process', [UsersController::class, 'login_process'])->name('login_process'); 
Route::get('/login_admin', [UsersController::class, 'login_admin'])->name('login_admin');
Route::post('login_admin_process', [UsersController::class, 'login_admin_process'])->name('login_admin_process'); 
Route::get('change_password', [UsersController::class, 'change_password'])->name('change_password'); 
Route::post('change_password_process', [UsersController::class, 'change_password_process'])->name('change_password_process'); 
Route::post('forgot_password', [UsersController::class, 'forgot_password'])->name('forgot_password'); 


Route::get('upload_image', [UsersController::class, 'upload_image'])->name('upload_image'); 
Route::post('upload_image_process', [UsersController::class, 'upload_image_process'])->name('upload_image_process'); 
// Route::get('dashboard_phakbet', [UsersController::class, 'dashboard_phakbet'])->name('dashboard_phakbet')->middleware(['auth', 'verified','prevent-back-history']); 
Route::group(['middleware' => 'prevent-back-history'],function(){
	Route::get('dashboard_phakbet', [UsersController::class, 'dashboard_phakbet'])->name('dashboard_phakbet');

});

Route::post('place_bet', [UsersController::class, 'place_bet'])->name('place_bet')->middleware(['auth', 'verified']); 
Route::post('place_bet_raffle', [UsersController::class, 'place_bet_raffle'])->name('place_bet_raffle')->middleware(['auth', 'verified']); 
Route::post('place_bet_admin', [DashboardController::class, 'place_bet_admin'])->name('place_bet_admin')->middleware(['auth', 'verified']); 

Route::get('king_heirarchy', [HeirarchyController::class, 'king_heirarchy'])->name('king_heirarchy')->middleware(['auth', 'verified']); 
Route::get('mayor_heirarchy', [HeirarchyController::class, 'mayor_heirarchy'])->name('mayor_heirarchy')->middleware(['auth', 'verified']); 
Route::get('liaison_heirarchy', [HeirarchyController::class, 'liaison_heirarchy'])->name('liaison_heirarchy')->middleware(['auth', 'verified']); 
Route::get('operator_heirarchy', [HeirarchyController::class, 'operator_heirarchy'])->name('operator_heirarchy')->middleware(['auth', 'verified']); 


Route::get('index', [WalletTransferController::class, 'index'])->name('wallet_transfer')->middleware(['auth', 'verified']); 
Route::post('transferwallet', [WalletTransferController::class, 'transferwallet'])->name('transferwallet'); 
Route::get('receipt/{id}', [WalletTransferController::class, 'receipt'])->name('receipt')->middleware(['auth', 'verified']); 
Route::get('cashin', [WalletTransferController::class, 'cashin'])->name('cashin')->middleware(['auth', 'verified']); 
Route::post('cashin_process', [WalletTransferController::class, 'cashin_process'])->name('cashin_process'); 
Route::get('/liaison/dashboard', [LiaisonController::class, 'index'])->middleware(['auth', 'verified'])->name('liaison_dashboard');

Route::get('/operator/dashboard', [OperatorController::class, 'index'])->middleware(['auth', 'verified'])->name('operator_dashboard');

Route::get('reports/events_summary', [ReportsController::class, 'events_summary'])->middleware(['auth', 'verified'])->name('events_summary');
Route::get('reports/all_transactions', [ReportsController::class, 'all_transactions'])->middleware(['auth', 'verified'])->name('all_transactions');
Route::get('reports/user_summary', [ReportsController::class, 'user_summary'])->middleware(['auth', 'verified'])->name('user_summary');
Route::get('reports/event_winners', [ReportsController::class, 'event_winners'])->middleware(['auth', 'verified'])->name('event_winners');
Route::get('reports/daily_bets', [ReportsController::class, 'daily_bets'])->middleware(['auth', 'verified'])->name('daily_bets');

Route::get('sms/custom_all', [SmsController::class, 'custom_all'])->middleware(['auth', 'verified'])->name('custom_all');
Route::get('sms/create_message', [SmsController::class, 'create_message'])->middleware(['auth', 'verified'])->name('create_message');
//Route::get('place_bet/{counter}', [UsersController::class, 'place_bet'])->name("place_bet");
require __DIR__.'/auth.php';
