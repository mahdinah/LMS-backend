<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Applicant;
use App\Models\Section;
use App\Models\Staff;
use Illuminate\Http\Request;

class addAttendance extends Controller
{
    public function addAttendance(Request $request){
    $attendance = new Attendance;
    $date = $request->input('date');
    $status = $request->input('status');
    $section_id = $request->input('section_id');
    $section = Section::find($section_id);
    $staff_id= $request->input('staff_id');
    $staff = Staff::find($staff_id);
    $applicant_id= $request->input('applicant_id');
    $applicant = Applicant::find($applicant_id);
    $attendance->date=$date;
    $attendance->status=$status;
    $attendance->section()->associate($section);
    $attendance->staff()->associate($staff);
    $attendance->applicant()->associate($applicant);
    $attendance->save();
    return response()->json([
        'message' => $request->all()
    ]); 
}

public function editAttendance(Request $request, $id){
    $attendance= Attendance::find($id);
    $inputs=$request->except('_method');
    $attendance->update($inputs);
  return response()->json([
        'message' => 'Attendance updated successfully',
        'attendance'=>$attendance,
    ]); 
}
public function deleteAttendance(Request $request, $id){
    $attendance= Attendance::find($id);
    $attendance->delete();
        return response()->json([
        'message' => 'Attendance deleted successfully',
    ]); 

}
}