<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/adminlogin', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
//     Route::post('/adminlogin', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
 
    // Route::group(['middleware' => 'adminauth'], function () {
    //     Route::get('/', function () {
    //         return view('welcome');
    //     })->name('adminDashboard');
 
    // });
// });