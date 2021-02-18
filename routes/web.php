<?php

use App\Http\Controllers\ParticipantController;
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
    return view('landigpageindex');
});

Route::get('/regitroform', function(){
    return view('registerForm');
});



Route::post('/addparticipant', 'ParticipantController@addparticipant');

// E-mail verification
Route::get('/register/verify/{code}', 'ParticipantController@verify');

Route::get('/confirmemailsuccess', function(){
    return view('confirmForm');
});

Route::get('/participantes/06e7cdd1a9854c75a094fde427de5993', 'ParticipantController@listparticipantes');
Route::get('/getparticipant', 'ParticipantController@getparticipant');
Route::post('/changeOptionCerticate', 'ParticipantController@changeOptionCerticate');
Route::post('/deleteParticipant', 'ParticipantController@deleteParticipant');

Route::get('/sorteo/E7F24D17EF9F857DB0E14CE95F3DBD1CEE08AF110945DD0CF5309DDC787B77C970B1C6D7C5E4723B038349EFC8778E6546F9F653F6A784DE0EB8FFC4D50C0DA4', 'ParticipantController@indexSorteo');

Route::get('/sorteoIframe', function(){
    return view('iframeSorteo');
})->name('iframesorteo');;
