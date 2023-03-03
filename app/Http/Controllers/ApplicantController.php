<?php

namespace App\Http\Controllers;
use App\Models\Applicant;
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
}
?>