<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Section;

class Sections extends Controller
{
    //CREATE SECTION

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

    //GET ALL SECTIONS

    public function getSection(Request $request)
    {
        $section = Section::all();
        return response()->json($section);
    }

    //GET BY ID GRADE

    public function getSectionById(Request $request, $id)
    {
        $section = Section::find($id);
        if (!$section) {
            return response()->json(['message' => 'section not found'], 404);
        }
        return response()->json($section);
    }

    //UPDATE SECTION

    public function updateSection(Request $request, $id)
    {

        $section = Section::find($id);
        $section->name = $request->input('name');

        $inputs = $request->except('_method');

        $section->update($inputs);

        return response()->json([
            'message' => 'Section updated successfully',
            'section' => $section,
        ]);
    }

    //DELETE SECTION

    public function deleteSection(Request $request, $id)
    {
        $section = Section::find($id);
        $section->delete();

        return response()->json([
            'message' => 'section deleted successfuly',
        ]);
    }
}
