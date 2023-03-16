<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{

    public function createStudent(Request $request)
    {
        $data = new Student;
        try {
            if ($request->has('image') && $request->image->isValid()) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $imageResized = Image::make($image)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 80);
                Storage::disk('public')->put('images/' . $name, $imageResized);
                $data->image = $name;
            }
            $data->fill($request->all());
            $data->save();
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (Exception $e) {
            return false;
        }
    }

    public function getStudents()
    {
        try {
            $data = Student::all();
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (Exception $e) {
            return false;
        }
    }

    public function getStudent($id)
    {
        try {
            $data = Student::where('id', $id)->first();
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateStudent($id, Request $request)
    {
        $data = Student::where('id', $id)->first();

        try {
            if ($request->has('image') && $request->image->isValid()) {
                $image = $request->image;
                $name = time() . '.' . $image->getClientOriginalExtension();
                $imageResized = Image::make($image)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 80);
                Storage::disk('public')->put('images/' . $name, $imageResized);
                if ($data->image && Storage::disk('public')->exists('images/' . $data->image)) {
                    Storage::disk('public')->delete('images/' . $data->image);
                }
                $data->image = $name;
            }

            $data->fill($request->all());
            $data->save();
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteStudent($id)
    {
        try {
            $data = Student::where('id', $id)->first();
            if ($data->image && Storage::disk('public')->exists('images/' . $data->image)) {
                Storage::disk('public')->delete('images/' . $data->image);
            }
            $data = Student::where('id', $id)->delete();
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (Exception $e) {
            return false;
        }
    }

}
