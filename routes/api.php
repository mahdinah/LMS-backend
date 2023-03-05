<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddApplicant;
use App\Http\Controllers\addAttendance;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/applicant',[addApplicant::class,"addApplicant"]);
Route::get('/applicantSection/{id}',[addApplicant::class,"getSection"]);
Route::get('/applicant/{id}',[addApplicant::class,"getApplicant"]);
Route::patch('/applicant/{id}',[addApplicant::class,"editApplicant"]);
Route::delete('/applicant/{id}',[addApplicant::class,"deleteApplicant"]);
Route::post('/attendance',[addAttendance::class,"addAttendance"]);
Route::patch('/attendance/{id}',[addAttendance::class,"editAttendance"]);
Route::delete('/attendance/{id}',[addAttendance::class,"deleteAttendance"]);