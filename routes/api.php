<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/image/{filename}', function ($filename) {
    $path = storage_path('app/public/images/') . $filename;
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/sec-class', [\App\Http\Controllers\JoinController::class, 'sectionFullInfo']);
Route::get('/sec-class/{id}', [\App\Http\Controllers\JoinController::class, 'sectionInfobyid']);
Route::get('/sec-by-class/{id}', [\App\Http\Controllers\JoinController::class, 'sectionInfobyclass']);
Route::post('/stu-sec-class', [\App\Http\Controllers\JoinController::class, 'studentFullInfo']);
Route::get('/stu-sec-class/{id}', [\App\Http\Controllers\JoinController::class, 'studentInfobyid']);
Route::get('/att-stu-sec-class', [\App\Http\Controllers\JoinController::class, 'attendanceFullInfo']);
Route::get('/att-stu-by-sec-class/{id}', [\App\Http\Controllers\JoinController::class, 'attendanceInfobysection']);
Route::get('/att-stu-sec-by-class/{id}', [\App\Http\Controllers\JoinController::class, 'attendanceInfobyclassroom']);

Route::post('/section', [\App\Http\Controllers\SectionController::class, 'createSection']);
Route::get('/section', [\App\Http\Controllers\SectionController::class, 'getSections']);
Route::get('/section/{id}', [\App\Http\Controllers\SectionController::class, 'getSection']);
Route::put('/section/{id}', [\App\Http\Controllers\SectionController::class, 'updateSection']);
Route::delete('/section/{id}', [\App\Http\Controllers\SectionController::class, 'deleteSection']);
Route::get('/classroomsection/{id}', [\App\Http\Controllers\SectionController::class, 'getSectionClassroom']);

Route::post('/classroom', [\App\Http\Controllers\ClassroomController::class, 'createClassroom']);
Route::get('/classroom', [\App\Http\Controllers\ClassroomController::class, 'getClassrooms']);
Route::get('/classroom/{id}', [\App\Http\Controllers\ClassroomController::class, 'getClassroom']);
Route::put('/classroom/{id}', [\App\Http\Controllers\ClassroomController::class, 'updateClassroom']);
Route::delete('/classroom/{id}', [\App\Http\Controllers\ClassroomController::class, 'deleteClassroom']);

Route::post('/attendance', [\App\Http\Controllers\AttendanceController::class, 'createAttendance']);
Route::get('/attendance', [\App\Http\Controllers\AttendanceController::class, 'getAttendances']);
Route::get('/attendance/{id}', [\App\Http\Controllers\AttendanceController::class, 'getAttendance']);
Route::put('/attendance/{id}', [\App\Http\Controllers\AttendanceController::class, 'updateAttendance']);
Route::delete('/attendance/{id}', [\App\Http\Controllers\AttendanceController::class, 'deleteAttendance']);

Route::post('/chart', [\App\Http\Controllers\AttendanceController::class, 'chart']);

Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'createAdmin']);
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'getAdmins']);
Route::get('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'getAdmin']);
Route::post('/getadmin', [\App\Http\Controllers\AdminController::class, 'getAdminByUsername']);
Route::put('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'updateAdmin']);
Route::delete('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'deleteAdmin']);

Route::post('/student', [\App\Http\Controllers\StudentController::class, 'createStudent']);
Route::get('/student', [\App\Http\Controllers\StudentController::class, 'getStudents']);
Route::get('/student/{id}', [\App\Http\Controllers\StudentController::class, 'getStudent']);
Route::put('/student/{id}', [\App\Http\Controllers\StudentController::class, 'updateStudent']);
Route::delete('/student/{id}', [\App\Http\Controllers\StudentController::class, 'deleteStudent']);

// Register a new user
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);

// Login a user
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);


// Register a new admin
Route::post('/adminregister', [\App\Http\Controllers\AdminAuthController::class, 'adminregister']);

// Login a admin
Route::post('/adminlogin', [\App\Http\Controllers\AdminAuthController::class, 'adminlogin']);

// Logout a user
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:api');

// Logout a user
Route::post('/adminlogout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:api');


Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/tasks', 'TaskController@index');
    Route::get('/task/{id}', 'TaskController@show');
    Route::post('/task/{id}', 'TaskController@update');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{id}', 'TaskController@destroy');
});
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     Route::get('/admin-profile', [AuthController::class, 'adminProfile']);    
// });

