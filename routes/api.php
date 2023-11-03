<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\IntervalController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\OrderNumberController;
use App\Http\Controllers\TransferTypeController;
use App\Http\Controllers\TransferStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//UserLog
//UserPermission

Route::post('/register',[UserController::class,'store']);
Route::group(['middleware'=>['auth:api']], function () {
   //Branch
   Route::post('/branch',[BranchController::class,'store']);
   Route::get('/branch/all',[BranchController::class,'index']);
   Route::post('/branch/filter',[BranchController::class,'filter']);
   //Call
   Route::post('/call',[CallController::class,'store']);
   Route::get('/call/all',[CallController::class,'index']);
   Route::post('/call/filter',[CallController::class,'filter']);
   //Card
   Route::post('/card',[CardController::class,'store']);
   Route::get('/card/all',[CardController::class,'index']);
   Route::post('/card/filter',[CardController::class,'filter']);
   //Counter
   Route::post('/counter',[CounterController::class,'store']);
   Route::get('/counter/all',[CounterController::class,'index']);
   Route::post('/counter/filter',[CounterController::class,'filter']);
   //Currency
   Route::post('/currency',[CurrencyController::class,'store']);
   Route::get('/currency/all',[CurrencyController::class,'index']);
   Route::post('/currency/filter',[CurrencyController::class,'filter']);
   //Interval
   Route::post('/interval',[IntervalController::class,'store']);
   Route::get('/interval/all',[IntervalController::class,'index']);
   Route::post('/interval/filter',[IntervalController::class,'filter']);
   //Misc
   Route::get('/misc',[MiscController::class,'all_misc']);
   //OrdeNumber
   Route::post('/orderNumber',[OrderNumberController::class,'store']);
   Route::get('/orderNumber/all',[OrderNumberController::class,'index']);
   Route::post('/orderNumber/filter',[OrderNumberController::class,'filter']);
   //Ticket -
   Route::post('/ticket',[TicketController::class,'store']);
   Route::post('/ticket/close',[TicketController::class,'close_ticket']);
   Route::get('/ticket/all',[TicketController::class,'index']);
   Route::get('/ticket/edit/{id}',[TicketController::class,'edit']);
   Route::post('/ticket/filter',[TicketController::class,'filter']);
   //Title
   Route::post('/title',[TitleController::class,'store']);
   Route::get('/title/all',[TitleController::class,'index']);
   Route::post('/title/filter',[TitleController::class,'filter']);
   //Transfer
   Route::post('/transfer',[TransferController::class,'store']);
   Route::get('/transfer/all',[TransferController::class,'index']);
   Route::post('/transfer/filter',[TransferController::class,'filter']);
   //TransferStatus
   Route::post('/transferStatus',[TransferStatusController::class,'store']);
   Route::get('/transferStatus/all',[TransferStatusController::class,'index']);
   Route::post('/transferStatus/filter',[TransferStatusController::class,'filter']);
   //TransferType
   Route::post('/transferType',[TransferTypeController::class,'store']);
   Route::get('/transferType/all',[TransferTypeController::class,'index']);
   Route::post('/transferType/filter',[TransferTypeController::class,'filter']);
   //User
   Route::post('/login',[UserController::class,'login']);   
   Route::get('/user/all',[UserController::class,'index']);
   Route::post('/user/filter',[UserController::class,'filter']);
//
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
