<?php

namespace App\Http\Controllers;

use App\Models\studentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $req)
    {
        $table = new studentModel();

        $photo_path = "img_" . time() . '.' . $req->photo->extension();
        $req->photo->move(public_path('images'), $photo_path);

        $table->class = $req->class;
        $table->name = $req->name;
        $table->age = $req->age;
        $table->gender = $req->gender;
        $table->photo = $photo_path;
        $table->save();

        return back()->with('addStudentSuccess', "Student added");
    }

    public function getStudent(Request $req)
    {
        $studentRecords = studentModel::paginate(20);

        return view('students', ['students' => $studentRecords]);
    }

    public function filterStudents(Request $req)
    {
        $query = studentModel::query();

        if ($req->filled('name')) {
            $query->where('name', 'like', '%' . $req->input('name') . '%');
        }
        if ($req->filled('age_min')) {
            $query->where('age', '>=', $req->input('age_min'));
        }
        if ($req->filled('age_max')) {
            $query->where('age', '<=', $req->input('age_max'));
        }
        if ($req->filled('class')) {
            $query->where('class', $req->input('class'));
        }

        $studentRecords = $query->paginate(20);

        return view('students', ['students' => $studentRecords]);
    }

    public function updateStudent(Request $req)
    {
        $student = studentModel::findOrFail($req->id);

        if ($req->hasFile('photo')) {
            $photo_path = "img_" . time() . '.' . $req->photo->extension();
            $req->photo->move(public_path('images'), $photo_path);
            $student->photo = $photo_path;
        }

        $student->name = $req->name;
        $student->class = $req->class;
        $student->age = $req->age;
        $student->gender = $req->gender;
        $student->save();

        return back()->with('updateStudentSuccess', "Student updated");
    }

    public function deleteStudent($id)
    {
        $student = studentModel::findOrFail($id);
        $student->delete();

        return back()->with('deleteStudentSuccess', "Student deleted");
    }

}

