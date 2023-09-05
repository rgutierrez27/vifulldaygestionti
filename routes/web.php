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

Route::get('/', [ParticipantController::class, 'landigpageindex'])->name('home');

Route::get('/{codeName}', [ParticipantController::class, 'eventsByFacultad'])->name('registerForm');

// Route::get('/{eventName}', [ParticipantController::class, 'registerForm'])->name('registerForm');
Route::get('/{codeName}/{eventName}', [ParticipantController::class, 'registerForm'])->name('registerForm');


Route::post('/addparticipant', 'ParticipantController@addparticipant');

// E-mail verification
Route::get('/register/verify/{code}', 'ParticipantController@verify');

Route::get('/confirmemailsuccess', [ParticipantController::class, 'confirmemailsuccess'])->name('confirmemailsuccess');

Route::get('/participantes/e79bf02ccf0aab45be24713e36aa2c7b2ad3cf5eaa1c7b584d8a43c09a1c61c6cacf3d0803b44ee33bd43239e55a8563e6a31eb6afdd507aeb5228b65437ba31', 'ParticipantController@listparticipantes');
Route::get('/getparticipant', 'ParticipantController@getparticipant');
Route::post('/changeOptionCerticate', 'ParticipantController@changeOptionCerticate');
Route::post('/deleteParticipant', 'ParticipantController@deleteParticipant');

Route::get('/sorteo/E7F24D17EF9F857DB0E14CE95F3DBD1CEE08AF110945DD0CF5309DDC787B77C970B1C6D7C5E4723B038349EFC8778E6546F9F653F6A784DE0EB8FFC4D50C0DA4', 'ParticipantController@indexSorteo');

Route::get('validardni/{dni}/{tipoDocumento}', 'ParticipantController@validardni');

Route::get('/sorteoIframe', [ParticipantController::class, 'sorteoIframe'])->name('iframesorteo');;
