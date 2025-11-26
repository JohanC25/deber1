@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Teacher Details: {{ $teacher->getFullName() }}</h5>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Teacher ID:</strong></label>
                            <p class="form-control-plaintext">{{ $teacher->id }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Full Name:</strong></label>
                            <p class="form-control-plaintext">{{ $teacher->getFullName() }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Email Address:</strong></label>
                            <p class="form-control-plaintext">{{ $teacher->email }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label><strong>Classes Taught:</strong></label>
                            <div>
                                @if($teacher->classes && $teacher->classes->count() > 0)
                                    @foreach($teacher->classes as $class)
                                        <span class="badge bg-primary me-1">{{ $class->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No classes assigned yet.</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Edit Teacher</a>
            </div>
        </div>
    </div>
@endsection