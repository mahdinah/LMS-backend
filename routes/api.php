<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GradeController;



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
Route::Post('/applicant',[ApplicantController::class,'addApplicant']);
Route::Post('/section',[SectionController::class,'addSection']);
Route::Post('/staff',[StaffController::class,'addStaff']);
Route::Post('/subject',[SubjectController::class,'addSubject']);
Route::Post('/attendance',[AttendanceController::class,'addAttendance']);
Route::Post('/grade',[GradeController::class,'addGrade']);


