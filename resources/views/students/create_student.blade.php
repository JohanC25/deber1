@extends('layout')

@section('content')
    <h1>Add Student</h1>
    @include('partials.errors')

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" required>

        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control">

        <label>Date of Birth</label>
        <input type="date" name="dob" class="form-control">

        <label>Enrollment Date</label>
        <input type="date" name="enrollment_date" class="form-control">

        {{-- NEW DROPDOWN ADDED HERE --}}
        <label class="mt-3">Assign Class</label>
        <select name="class_id" class="form-control">
            <option value="">-- Select a Class --</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">
                    {{ $class->name }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Save</button>
    </form>
@endsection