@extends('layout')

@section('content')
    <h1>Edit Student</h1>
    @include('partials.errors')

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>First Name</label>
        <input value="{{ $student->first_name }}" type="text" name="first_name" class="form-control" required>

        <label>Last Name</label>
        <input value="{{ $student->last_name }}" type="text" name="last_name" class="form-control" required>

        <label>Email</label>
        <input value="{{ $student->email }}" type="email" name="email" class="form-control">

        <label>Date of Birth</label>
        <input value="{{ $student->dob }}" type="date" name="dob" class="form-control">

        <label>Enrollment Date</label>
        <input value="{{ $student->enrollment_date }}" type="date" name="enrollment_date" class="form-control">

        {{-- NEW DROPDOWN ADDED HERE --}}
        <label class="mt-3">Assign Class</label>
        <select name="class_id" class="form-control">
            <option value="">-- Select a Class --</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}"
                    {{-- Check if the student is already in this class to select it --}}
                    @if($student->classes->contains($class->id)) selected @endif
                >
                    {{ $class->name }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Update</button>
    </form>
@endsection