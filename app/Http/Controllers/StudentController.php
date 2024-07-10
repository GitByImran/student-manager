<?php

namespace App\Http\Controllers;

use App\Models\studentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $req)
    {
        $table = new studentModel();

        // Handle file upload
        $photo_path = "img_" . time() . '.' . $req->photo->extension();
        $req->photo->move(public_path('images'), $photo_path);

        // Save student data
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
        // Retrieve student records without filters
        $studentRecords = studentModel::paginate(20);

        // Pass the student records to the view
        return view('students', ['students' => $studentRecords]);
    }

    public function filterStudents(Request $req)
    {
        $query = studentModel::query();

        // Apply filters if they are present
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

        // Retrieve filtered student records
        $studentRecords = $query->paginate(20);

        // Pass the filtered student records to the view
        return view('students', ['students' => $studentRecords]);
    }
}

