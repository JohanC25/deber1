@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Class Details: {{ $schoolClass->name }}</h5>
                <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                {{-- Class Information --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="fw-bold">Class ID:</label>
                        <p class="text-muted">{{ $schoolClass->id }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold">Class Name:</label>
                        <p class="lead">{{ $schoolClass->name }}</p>
                    </div>
                </div>

                <hr>

                {{-- List of Enrolled Students --}}
                <h5 class="mt-4">Enrolled Students</h5>
                
                @if($schoolClass->students->count() > 0)
                    <table class="table table-bordered table-striped mt-2">
                        <thead class="table-light">
                            <tr>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schoolClass->students as $student)
                                <tr>
                                    <td>{{ $student->getFullName() }}</td> {{-- Assuming getFullName() exists in Student model --}}
                                    <td>{{ $student->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-3">
                        No students are currently enrolled in this class.
                    </div>
                @endif

            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('classes.edit', $schoolClass->id) }}" class="btn btn-warning">Edit Class</a>
            </div>
        </div>
    </div>
@endsection