<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGPTController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/web-gl', function () {
    return view('web-gl');
});

Route::get('/brain-js', function () {
    return view('brain-js');
});

Route::get('/tensor-flow', function () {
    return view('tensor-flow');
});

Route::get('/chatgpt', [ChatGPTController::class, 'index'])->name('chatgpt.index');
Route::post('/chatgpt/ask', [ChatGPTController::class, 'ask'])->name('chatgpt.ask');
