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


        public function getStaff(Request $request, $id) {
            $staff = Staff::findOrFail($id);//getting a section by a specific id
            return response()->json([
                'message' => $staff
            ]);
        }
        
        public function getStaffs(Request $request){
            $staff = Staff::get();//Getting all setions
            return response()->json([
                'message' => $staff,
            
            ]);
        }
    
    
        public function editStaff(Request $request, $id){
            $staff = Staff::find($id);
            $inputs = $request->except('_method'); //except save everything in request except the ones in our array
            $staff->update($inputs);
          
            return response()->json([
            'message' => 'Staff edited succssesfully',
            'section' => $staff,
            ]);
        }
    
    
        public function deleteStaff(Request $request, $id){
            $staff = Staff::find($id);
            $staff->delete();
            return response()->json([
                'message' => 'Staff Deleted Successfully',
            
            
            ]);
    
    }   

}
