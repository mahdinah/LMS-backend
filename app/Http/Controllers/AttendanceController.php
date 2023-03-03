<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Staff;
use App\Models\Applicant;
use App\Models\Section;

class AttendanceController extends Controller
{
    public function addAttendance(Request $request)
{
    $attendance = new Attendance;
    $status = $request->input('status');
    $date = date('Y-m-d', strtotime($request->input('created_at')));
    $staff = Staff::find('staff_id');
    $staff_id = $request->input('staff_id');
    $applicant = Applicant::find('applicant_id');
    $applicant_id = $request->input('applicant_id');
    $section = Section::find('section_id');
    $section_id = $request->input('section_id');
    $attendance->section_id = $section_id;
    $attendance->staff_id = $staff_id;
    $attendance->applicant_id = $applicant_id;
    $attendance->status = $status; 
    $attendance->date = $date;
    $attendance->save();

    return response()->json([
        'message' => 'Attendance was recorded successfully!',
    ]);
}
}
?>