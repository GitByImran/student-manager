<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'classes' => 'required|array',
        ]);

        $subject = new SubjectModel();
        $subject->name = $req->name;
        $subject->code = $req->code;
        $subject->class = $req->classes;
        $subject->save();

        return back()->with('addSubjectSuccess', "Subject added successfully");
    }

    public function getSubjects(Request $req)
    {
        $subjects = SubjectModel::paginate(20);
        return view('subjects', ['subjects' => $subjects]);
    }

    public function filterSubjects(Request $req)
    {
        $query = SubjectModel::query();

        if ($req->filled('name')) {
            $query->where('name', 'like', '%' . $req->input('name') . '%');
        }

        if ($req->filled('class')) {
            $class = $req->input('class');
            if ($class == '9C') {
                $class = '9/10-C';
            } elseif ($class == '9A') {
                $class = '9/10-A';
            } elseif ($class == '9S') {
                $class = '9/10-S';
            }
            $query->where(function ($query) use ($class) {
                $query->where('class', 'like', '%' . $class . '%')
                    ->orWhere('class', 'like', $class . ',%')
                    ->orWhere('class', 'like', '%,' . $class)
                    ->orWhere('class', '=', $class);
            });
        }

        $subjects = $query->paginate(20);
        return view('subjects', ['subjects' => $subjects]);
    }
}
