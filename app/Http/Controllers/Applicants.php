<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Applicant;

use Illuminate\Support\Facades\Storage; //upload image


class Applicants extends Controller
{
    // CREATE APPLICANT

//     public function addApplicant(Request $request)
//     {

//         $applicant = new Applicant;                 //creating new var. applicant 

//         $name = $request->input('name');
//         $email = $request->input('email');
//         $password = $request->input('password');
        
//         $section_id = $request->input('section_id');  //foreign 
        
        
//         //UPLOADIG IMAGE 
//         $image_path = $request->file('image')->store('images', 'public');

//         $applicant->name = $name;
//         $applicant->email = $email;
//         $applicant->password = $password;
//         $applicant->image = $image_path;

//         $applicant->section_id = $section_id;

//         $applicant->save(); //save it to DB through func save 

//         return response()->json([
//             'message' => $request->all(),
//         ]);
//     }

}
