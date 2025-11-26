@extends('layout')


@section('content')
    <h1>Add Class</h1>
    @include('partials.errors')


    <form action="{{ route('classes.store') }}" method="POST">
        @csrf


        <label>Name</label>
        <input type="text" name="name" class="form-control" required>


        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>


        <label>Teacher</label>
        <select name="teacher_id" class="form-control">
            <option value="">-- None --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->getFullName() }}</option>
            @endforeach
        </select>


        <button class="btn btn-success mt-3">Save</button>
    </form>
@endsection
