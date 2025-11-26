@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Details: {{ $student->getFullName() }}</h5>
                <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Student ID:</strong></label>
                            <p class="form-control-plaintext">{{ $student->id }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Full Name:</strong></label>
                            <p class="form-control-plaintext">{{ $student->getFullName() }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Email Address:</strong></label>
                            <p class="form-control-plaintext">{{ $student->email }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Created At:</strong></label>
                            <p class="form-control-plaintext">{{ $student->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit Student</a>
            </div>
        </div>
    </div>
@endsection