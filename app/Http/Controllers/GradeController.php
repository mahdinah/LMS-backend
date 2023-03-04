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
        

        public function getGrade(Request $request, $id) {
            $grade = Grade::findOrFail($id);//getting an attendance by a specific id
            return response()->json([
                'message' => $grade
            ]);
        }
        
        public function getGrades(Request $request){
            $grade = Grade::get();//Getting all applicants
            return response()->json([
                'message' => $grade,
            
            ]);
        }


        public function editGrade(Request $request, $id){
            $grade = Grade::find($id);
            $inputs = $request->except('_method'); //except save everything in request except the ones in our array
            $grade->update($inputs);
          
            return response()->json([
            'message' => 'Grade edited succssesfully',
            'attendance' => $grade,
            ]);
        }


        public function deleteGrade(Request $request, $id){
            $grade = Grade::find($id);
            $grade->delete();
            return response()->json([
                'message' => 'Grade Deleted Successfully',
            
            
            ]);
        }
}
?>