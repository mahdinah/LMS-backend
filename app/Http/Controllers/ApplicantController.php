<?php

namespace App\Http\Controllers;
use App\Models\Applicant;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ApplicantController extends Controller
{
 public function addApplicant(Request $request){
    $applicant = new Applicant;
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $section_id = $request->input('section_id');
    $image = $request->input('image');
    $image_path = $request->file('image')->store('images','public');
    $applicant->image = $image_path;
    $applicant->name = $name;
    $applicant->email = $email;
    $applicant->password = $password;
    $applicant->section_id = $section_id;
    $applicant->save();
    return response()->json([
        'message' => 'Applicant created successfully!',
    ]);
 }

 public function getApplicants(Request $request){
    $applicant = Applicant::get();//Getting all applicants
    return response()->json([
        'message' => $applicant,

    ]);
}

public function editApplicant(Request $request, $id){
    $applicant = Applicant::find($id);
    $inputs = $request->except('image','_method'); //except save everything in request except the ones in our array
    $applicant->update($inputs);

    $author_id = $request->input('author_id');
    $author = Author::find($author_id);

    if($request->has('categories')){
        $book->categories()->sync(json_decode($request->input('categories')));
    }
    if($request->hasFile('image')){
        Storage::delete('public/'.$applicant->image);
        $image_path = $request->file('image')->store('images','public');
        $applicant->update(['image' => $image_path]);
    }
    return response()->json([
    'message' => 'applicant edited succssesfully',
    'applicant' => $applicant,
    ]);
}

public function deleteApplicant(Request $request, $id){
    $applicant = Applicant::find($id);
    $applicant->delete();
    return response()->json([
        'message' => 'Applicant Deleted Successfully',
    
    
    ]);
}

}

?>