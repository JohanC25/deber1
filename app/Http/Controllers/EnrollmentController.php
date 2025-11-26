<?php


namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;


class EnrollmentController extends Controller
{
    public function enrollForm(SchoolClass $class)
    {
        $students = Student::orderBy('id')->get();
        return view('classes.create_class', compact('class', 'students'));
    }


    public function enroll(Request $request, SchoolClass $class)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);


        $class->students()->syncWithoutDetaching([$data['student_id']]);


        return redirect()->route('classes.show', $class)->with('success', 'Student enrolled');
    }


    public function withdraw(SchoolClass $class, Student $student)
    {
        $class->students()->detach($student->id);
        return back()->with('success', 'Student withdrawn');
    }
}