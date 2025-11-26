<?php


namespace App\Http\Controllers;


use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;


class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('teacher')->orderBy('id')->paginate(12);
        return view('classes.list_classes', compact('classes'));
    }


    public function create()
    {
        $teachers = Teacher::orderBy('last_name')->get();
        return view('classes.create_class', compact('teachers'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);


        SchoolClass::create($data);


        return redirect()->route('classes.index')->with('success', 'Class created');
    }


    public function show($id)
    {
        $schoolClass = SchoolClass::find($id);
        $schoolClass->load('students', 'teacher');

        return view('classes.view_class', compact('schoolClass'));
    }


    public function edit(SchoolClass $class)
    {
        $teachers = Teacher::orderBy('last_name')->get();
        return view('classes.edit_class', compact('class', 'teachers'));
    }


    public function update(Request $request, SchoolClass $class)
    {
            $data = $request->validate([
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);


        $class->update($data);


        return redirect()->route('classes.index')->with('success', 'Class updated');
    }


    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted');
    }
}