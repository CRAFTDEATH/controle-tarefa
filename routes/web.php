<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

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

Auth::routes(['verify'=>true]);

Route::middleware('verified')->group(function(){
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('tarefa',TarefaController::class);
});


Route::get('/menssagem-teste',function(){
    return new MensagemTesteMail();
    //Mail::to('adriano1997r@gmail.com')->send(new MensagemTesteMail());
    return 'Email enviado com sucesso';
});
