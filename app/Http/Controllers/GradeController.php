<?php

namespace App\Http\Controllers;
use App\Models\Grade;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function addGrade(Request $request){

        $grade = new Grade;
        $name = $request ->input('name');
        $grade->name = $name;
        $grade->save();
        return response()->json([
            'message' => 'grade is posted successfully!',]);
        }
        
}
?>