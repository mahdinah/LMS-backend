<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Section;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Storage;

class addApplicant extends Controller
{
public function addApplicant(Request $request){
    $applicant = new Applicant;
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $section_id = $request->input('section_id');
    $section = Section::find($section_id);
    $image_path = $request->file('image')->store('images','public');
    $applicant->name = $name;
    $applicant->email = $email;
    $applicant->password = $password;
    $applicant->image = $image_path;
    $applicant->section()->associate($section);
    $applicant->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}
public function getApplicant(Request $request, $id){
    $applicantInfo=Applicant::where('id','=', $id)->get();
    return response()->json([
        'message' => $applicantInfo,
    ]);
}
public function getSection(Request $request, $id){
$section = Section::find($id)->with (['applicant'])->get();
    return response()->json([
        'message' => $section,
    ]); 
}

public function editApplicant(Request $request, $id){
    $applicant= Applicant::find($id);
    if (!$applicant) {
        return response()->json([
            'message' => 'Applicant not found',
        ], 404);
    }
    $inputs=$request->except('image','_method');
    // $section_id = $request->input('section_id');
    $applicant->update($inputs);
    if($request->hasFile('image')){
        Storage::delete('public/',$applicant->image);
        $image_path = $request->file('image')->store('images','public');
        $applicant->update(['image' => $image_path]);}
        return response()->json([
        'message' => 'Applicant updated successfully',
        'applicant'=>$applicant,
    ]); 
}


public function deleteApplicant(Request $request, $id){
    $applicant= Applicant::find($id);
    $applicant->delete();
        return response()->json([
        'message' => 'Applicant deleted successfully',
    ]); 

}



}
