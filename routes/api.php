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
//aplicants routes
Route::Get('/applicants',[ApplicantController::class,'getApplicants']);
Route::Get('/applicant/{id}',[ApplicantController::class,'getApplicant']);
Route::Patch('/applicant/{id}',[ApplicantController::class,'editApplicant']);
Route::Post('/applicant',[ApplicantController::class,'addApplicant']);
Route::delete('/applicant/{id}',[ApplicantController::class,'deleteApplicant']);


//attendance routes
Route::Get('/attendance/{id}',[AttendanceController::class,'getAttendance']);
Route::Get('/attendances',[AttendanceController::class,'getAttendances']);
Route::Post('/attendance',[AttendanceController::class,'addAttendance']);
Route::Patch('/attendance/{id}',[AttendanceController::class,'editAttendance']);
Route::delete('/attendance/{id}',[AttendanceController::class,'deleteAttendance']);




//grade routes
Route::Post('/grade',[GradeController::class,'addGrade']);
Route::Get('/grades',[GradeController::class,'getGrades']);
Route::Get('/grade/{id}',[GradeController::class,'getGrade']);
Route::Patch('/grade/{id}',[GradeController::class,'editGrade']);
Route::delete('/grade/{id}',[GradeController::class,'deleteGrade']);


//section routes

Route::Post('/section',[SectionController::class,'addSection']);
Route::Get('/sections',[SectionController::class,'getSections']);
Route::Get('/section/{id}',[SectionController::class,'getSection']);
Route::Patch('/section/{id}',[SectionController::class,'editSection']);
Route::delete('/section/{id}',[SectionController::class,'deleteSection']);



//staff controller
Route::Post('/staff',[StaffController::class,'addStaff']);
Route::get('/staffs',[StaffController::class,'getStaffs']);
Route::get('/staff/{id}',[StaffController::class,'getStaff']);
Route::Patch('/staff/{id}',[StaffController::class,'editStaff']);
Route::delete('/staff/{id}',[StaffController::class,'deleteStaff']);






//subject routes
Route::Post('/subject',[SubjectController::class,'addSubject']);
Route::get('/subjects',[SubjectController::class,'getSubjects']);
Route::get('/subject/{id}',[SubjectController::class,'getSubject']);
Route::Patch('/subject/{id}',[SubjectController::class,'editSubject']);
Route::delete('/subject/{id}',[SubjectController::class,'deleteSubject']);

?>