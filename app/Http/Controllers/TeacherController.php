<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id')->paginate(12);

        return view('teachers.list_teachers', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create_teacher');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.view_teacher', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit_teacher', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => "required|email|unique:teachers,email,{$teacher->id}",
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $teacher->update($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted');
    }
}
