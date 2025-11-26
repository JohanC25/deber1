<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id')->paginate(12);
        return view('students.list_students', compact('students'));
    }

    public function create()
    {
        // Fetch all classes so the dropdown menu can be populated
        $classes = SchoolClass::orderBy('name')->get();
        return view('students.create_student', compact('classes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'nullable|email|unique:students,email',
            'dob' => 'nullable|date',
            'enrollment_date' => 'nullable|date',
            'class_id' => 'nullable|exists:classes,id',
        ]);

        $student = Student::create($data);

        // If a class is selected, attach it to the student
        if (!empty($data['class_id'])) {
            $student->classes()->attach($data['class_id']);
        }

        return redirect()->route('students.index')->with('success', 'Student created');
    }

    public function show(Student $student)
    {
        $student->load('classes');
        return view('students.view_student', compact('student'));
    }

    public function edit(Student $student)
    {
        // Fetch classes for the dropdown in the edit form
        $classes = SchoolClass::orderBy('name')->get();
        return view('students.edit_student', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => "nullable|email|unique:students,email,{$student->id}",
            'dob' => 'nullable|date',
            'enrollment_date' => 'nullable|date',
            'class_id' => 'nullable|exists:classes,id',
        ]);

        // 1. Update basic info
        $student->update($data);

        // 2. Update the Class Enrollment (The new part)
        // 'sync' keeps the array in the DB identical to what you pass here.
        if (!empty($data['class_id'])) {
            $student->classes()->sync([$data['class_id']]);
        } else {
            // If the user selected "No Class" (empty), remove existing classes
            $student->classes()->detach();
        }
    
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        // Remove enrollments before deleting the student to keep DB clean
        $student->classes()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}