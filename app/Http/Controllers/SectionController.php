<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Grade;




class SectionController extends Controller
{
    public function addSection(Request $request){

    $section = new Section;
    $name = $request->input('name');
    $grade = Grade::find('grade_id');
    $grade_id = $request->input('class_id');
    $section->class_id = $grade_id; // set the grade_id value directly
    $section->name = $name;
    $section->save();
    

    return response()->json([
        'message' => 'Section created successfully!',]);
    }
}   
?>