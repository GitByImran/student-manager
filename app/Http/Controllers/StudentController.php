<?php

namespace App\Http\Controllers;

use App\Models\studentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function addStudent(Request $req)
    {
        $table = new studentModel();

        $photo_path = "img_" . time() . '.' . $req->photo->extension();
        $req->photo->move(public_path('images'), $photo_path);

        $table->class = $req->class;
        $table->username = $req->username;
        $table->password = Hash::make($req->password);
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

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->intended('students/profile');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/studentLogin')->with('success', 'Logged out successfully.');
    }

    public function showProfile()
    {
        $studentId = session('force_student_id');

        if (!$studentId) {
            $student = Auth::guard('student')->user();
            if (!$student instanceof studentModel) {
                return redirect()->back()->with('error', 'Unable to retrieve student data.');
            }
        } else {
            $student = studentModel::findOrFail($studentId);
            session()->forget('force_student_id');
        }

        return view('studentProfile', compact('student'));
    }


    public function updateStudentProfile(Request $request)
    {
        $student = Auth::guard('student')->user();
        if (!$student instanceof studentModel) {
            return redirect()->back()->with('error', 'Unable to retrieve student data.');
        }

        $student->username = $request->input('username');
        $student->name = $request->input('name');
        $student->class = $request->input('class');
        $student->age = $request->input('age');
        $student->gender = $request->input('gender');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->extension();
            $photo->move(public_path('images'), $filename);
            $student->photo = $filename;
        }

        $student->save();
        return redirect()->back()->with('updateProfileSuccess', 'Profile updated successfully');
    }


    public function updateStudentPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $student = Auth::guard('student')->user();
        if (!$student instanceof studentModel) {
            return redirect()->back()->with('error', 'Unable to retrieve student data.');
        }

        if (Hash::check($request->current_password, $student->password)) {
            $student->password = Hash::make($request->new_password);
            $student->save();

            return redirect()->back()->with('updatePasswordSuccess', 'Password updated successfully.');
        } else {
            return redirect()->back()->with('updatePasswordError', 'Current password is incorrect.');
        }
    }


}

