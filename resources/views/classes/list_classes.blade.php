@extends('layout')

@section('content')
    <h1>Classes</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-primary">Add Class</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->teacher ? $class->teacher->getFullName() : 'None' }}</td>
                    <td>
                        <a href="{{ route('classes.show', $class->id) }}" class="btn btn-info btn-sm">View</a>

                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete class?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection