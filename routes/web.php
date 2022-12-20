<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\historyController;

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
Route::get('/list', [TodoListController::class, 'index']);

use App\Http\Controllers\TaskController;
 
Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('index.history.php');
});
Route::get('/history', [historyController::class, 'index']);
Route::resource('history', historyController::class);