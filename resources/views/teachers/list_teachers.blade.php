@extends('layout')

@section('content')
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->getFullName() }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        {{-- VIEW BUTTON ADDED HERE --}}
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">View</a>

                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete teacher?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection