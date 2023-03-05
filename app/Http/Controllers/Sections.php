<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Section;

class Sections extends Controller
{
    //

    public function addSection(Request $request)
    {

        $section = new Section;
        $name = $request->input('name'); //name input 

        $grade_id = $request->input('class_id');  //class id(foreign) input 
        // $grade = Grade::find($grade_id);

        
        $section->name = $name;
        // $section->grade()->associate($grade);
        $section->class_id = $grade_id;

        $section->save(); //save it to DB through func save 

        return response()->json([
            'message' => 'section created successfully!'
        ]);
    }
}
