<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class Grades extends Controller
{
    //CREATE GRADE

    public function addGrade(Request $request)
    {

        $grade = new Grade;
        $name = $request->input('name');

        $grade->name = $name;

        $grade->save();

        return response()->json([
            'message' => 'grade created successfully!'
        ]);
    }

    //GET ALL GRADES

    public function getGrade(Request $request)
    {

        $grades = Grade::all();
        return response()->json($grades);
    }

    //GET BY ID GRADE

    public function getGradeById(Request $request, $id)
    {
        $grade = Grade::find($id);
        if (!$grade) {
            return response()->json(['message' => 'Grade not found'], 404);
        }
        return response()->json($grade);
    }

    //UPDATE GRADE

    public function updateGrade(Request $request, $id)
    {

        $grade = Grade::find($id);

        $inputs = $request->except('_method');

        $grade->update($inputs);


        return response()->json([
            'message' => 'Grade updated successfully',
            'grade' => $grade
        ]);
    }


    //DELETE GRADE

    public function deleteGrade(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return response()->json([
            'message' => 'Grade deleted successfuly',
        ]);
    }
}
