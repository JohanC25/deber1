@extends('layout')

@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>

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
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->getFullName() }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        {{-- VIEW BUTTON ADDED HERE --}}
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>

                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection