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
