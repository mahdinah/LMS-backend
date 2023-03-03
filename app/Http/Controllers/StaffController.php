<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;


class StaffController extends Controller
{
    public function addStaff(Request $request){

        $staff = new Staff;
        $name = $request ->input('name');
        $role = $request ->input('role');
        $staff -> name = $name;
        $staff -> role = $role;
        
        $staff->save();
    
        return response()->json([
            'message' => 'Section created successfully!',]);
        }
}
