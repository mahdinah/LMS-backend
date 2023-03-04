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



    public function getSection(Request $request, $id) {
        $section = Section::findOrFail($id);//getting a section by a specific id
        return response()->json([
            'message' => $section
        ]);
    }
    
    public function getSections(Request $request){
        $section = Section::get();//Getting all setions
        return response()->json([
            'message' => $section,
        
        ]);
    }


    public function editSection(Request $request, $id){
        $section = Section::find($id);
        $inputs = $request->except('_method'); //except save everything in request except the ones in our array
        $section->update($inputs);
      
        return response()->json([
        'message' => 'Section edited succssesfully',
        'section' => $section,
        ]);
    }


    public function deleteSection(Request $request, $id){
        $section = Section::find($id);
        $section->delete();
        return response()->json([
            'message' => 'Section Deleted Successfully',
        
        
        ]);

}   
}
?>