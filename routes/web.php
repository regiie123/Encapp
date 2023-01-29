<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;

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


Route::get('/', [PagesController::class, 'login']);
#Route::get('/register', [PagesController::class, 'register']);
#Route::get('/start', [PagesController::class, 'start']);

Route::get('/text_enc', [PagesController::class, 'text_enc']);
Route::get('/enc', [PagesController::class, 'enc']);
Route::post('/text_enc_enter', [PagesController::class, 'text_enc_enter']);
Route::get('/dec', [PagesController::class, 'dec']);
Route::post('/text_dec_enter', [PagesController::class, 'text_dec_enter']);


Route::get('/file_enc', [PagesController::class, 'file_enc']);
Route::post('/file_enc_upload', [PagesController::class, 'file_enc_upload']);
Route::patch('/file_enc_enter/{file_id}', [PagesController::class, 'file_enc_enter']);

Route::get('/share_txt', [PagesController::class, 'share_txt']);
Route::post('/share_txt_upload', [PagesController::class, 'share_txt_upload']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/contact', [PagesController::class, 'contact']);


Route::resource('posts', PostController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
