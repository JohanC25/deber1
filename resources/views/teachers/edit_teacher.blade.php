@extends('layout')


@section('content')
    <h1>Edit Teacher</h1>
    @include('partials.errors')


    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')


        <label>First Name</label>
        <input value="{{ $teacher->first_name }}" type="text" name="first_name" class="form-control" required>


        <label>Last Name</label>
        <input value="{{ $teacher->last_name }}" type="text" name="last_name" class="form-control" required>


        <label>Email</label>
        <input value="{{ $teacher->email }}" type="email" name="email" class="form-control" required>


        <button class="btn btn-success mt-3">Update</button>
    </form>
@endsection
