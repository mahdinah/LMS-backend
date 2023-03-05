<?php

use App\Http\Controllers\Applicants;
use App\Http\Controllers\Grades;
use App\Http\Controllers\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Grade CRUD
Route::Post('/grade', [Grades::class, 'addGrade']);  //Create garde
Route::Get('/grade', [Grades::class, 'getGrade']);  //GET ALL garde
Route::Get('/grade/{id}', [Grades::class, 'getGradeById']);  //GET BY ID garde
Route::patch('/grade/{id}', [Grades::class, 'updateGrade']); //UPDATE GRADE 
Route::delete ('/grade/{id}', [Grades::class, 'deleteGrade']); //DELET GRADE 




Route::Post('/applicant', [Applicants::class, 'addApplicant']);  //Create Applicant
Route::Post('/section', [Sections::class, 'addSection']);  //Create section
