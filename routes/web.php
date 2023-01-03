<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UpdatePasswordController;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register',[AuthController::class, 'registerIndex'])->middleware('guest');
Route::post('/register',[AuthController::class, 'register']);

Route::get('/showProduct', [ItemController::class, 'showItem']);

Route::get('/productDetail/{item}', [ItemController::class, 'itemDetail']);

Route::group(['middleware' => ['admin']], function () {
    Route::get('/viewItem', [ItemController::class, 'viewItem']);
    Route::get('/updateItem/{item}', [ItemController::class, 'updateItem']);
    Route::delete('/deleteItem/{item}', [ItemController::class, 'deleteItem']);
    Route::put('/updateItem/{id}', [ItemController::class, 'update']);
    Route::get('/addItem', [ItemController::class, 'addItem']);
    Route::post('/addItem', [ItemController::class, 'store']);
});

Route::get('/editProfile', function(){
    return view('editProfile');
});

Route::get('/changePassword', [UpdatePasswordController::class, 'edit'])->name('changePassword');
Route::put('/changePassword', [UpdatePasswordController::class, 'update']);

Route::get('/cartList', [CartController::class, 'index']);
Route::post('/cartList', [CartController::class, 'addToCart']);
