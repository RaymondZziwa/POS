<?php

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

Route::get('/outgoings', function () {
    return view('outgoings');
});

Route::get('/incomings', function () {
    return view('incomings');
});

Route::get('/recordoutgoings', function () {
    return view('recordoutgoings');
});

Route::get('/recordincomings', function () {
    return view('recordincomings');
});
Route::get('/salesrecords', function () {
    return view('sales');
});
Route::get('/merchandiseoperations', function () {
    return view('merchandiseoperations');
});

Route::get('/savecart', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/recordincomings',[App\Http\Controllers\IncomingController::class,'saveIncoming'])->name('incoming');
Route::get('/incomings',[App\Http\Controllers\IncomingController::class,'recordList'])->name('record.list');

Route::post('/recordoutgoings',[App\Http\Controllers\OutgoingsController::class,'saveOutgoing'])->name('outgoing');
Route::get('/outgoings',[App\Http\Controllers\OutgoingsController::class,'outRecordList'])->name('outrecord.list');

Route::post('/',[App\Http\Controllers\SalesController::class,'saveSale'])->name('sales');
Route::get('/salesrecords',[App\Http\Controllers\SalesController::class,'salesRecordList'])->name('salesrecord.list');

Route::post('/merchandiseoperations',[App\Http\Controllers\MerchandiseController::class,'saveMerchandise'])->name('merchandisesave');
Route::get('/merchandiseoperations',[App\Http\Controllers\MerchandiseController::class,'merchandiseRecordList'])->name('merchandiserecord.list');

Route::get('/welcome', [App\Http\Controllers\liveSearch::class, 'index']);
Route::get('/welcome', [App\Http\Controllers\liveSearch::class, 'action'])->name('live_search.action');

Route::get('print/test', [App\Http\Controllers\PrintController::class, 'test']);


Route::get('/welcome/{MerchandiseName}/{MerchandisePrice}',[App\Http\Controllers\PrintController::class,'addmerch'])->name('merch.add');