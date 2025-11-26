@extends('layout')


@section('content')
    <h1>Add Teacher</h1>
    @include('partials.errors')


    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf


        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" required>


        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" required>


        <label>Email</label>
        <input type="email" name="email" class="form-control" required>


        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
        
        <label class="mt-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>

        <button class="btn btn-success mt-3">Save</button>
    </form>
@endsection
