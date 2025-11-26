@extends('layout')


@section('content')
    <h1>Edit Class</h1>
    @include('partials.errors')


    <form action="{{ route('classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')


        <label>Name</label>
        <input value="{{ $class->name }}" type="text" name="name" class="form-control" required>


        <label>Description</label>
        <textarea name="description" class="form-control">{{ $class->description }}</textarea>


        <label>Teacher</label>
        <select name="teacher_id" class="form-control">
            <option value="">-- None --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $class->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->getFullName() }}
                </option>
            @endforeach
        </select>


        <button class="btn btn-success mt-3">Update</button>
    </form>
@endsection
