<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function addSubject(Request $request){

        $subject = new Subject;
        $name = $request ->input('name');
        $staff_id = $request ->input('staff_id');

        $subject -> name = $name;
        $subject -> staff_id = $staff_id;
        $subject->save();
    
        return response()->json([
            'message' => 'Section created successfully!',]);
            }
    }
