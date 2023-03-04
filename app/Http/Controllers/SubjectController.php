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
            'message' => 'Subject created successfully!',]);
            }

      

            public function getSubject(Request $request, $id) {
                $subject = Subject::findOrFail($id);//getting a section by a specific id
                return response()->json([
                    'message' => $subject
                ]);
            }
            
            public function getSubjects(Request $request){
                $subject = Subject::get();//Getting all setions
                return response()->json([
                    'message' => $subject,
                
                ]);
            }
        
        
            public function editSubject(Request $request, $id){
                $subject = Subject::find($id);
                $inputs = $request->except('_method'); //except save everything in request except the ones in our array
                $subject->update($inputs);
              
                return response()->json([
                'message' => 'Subject edited succssesfully',
                'subject' => $subject,
                ]);
            }
        
        
            public function deleteSubject(Request $request, $id){
                $subject = Subject::find($id);
                $subject->delete();
                return response()->json([
                    'message' => 'Subject Deleted Successfully',
                
                
                ]);
        
        }   


    }
?>