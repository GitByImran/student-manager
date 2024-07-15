@extends('layout.app')

@section('title', 'Student Profile')

@section('main-container')

<div class="container mt-4">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <h3>{{ $student->name }}'s Profile</h3>
        @if(session('force_student_id'))
        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">Back</a>
        @else
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light btn-sm">Logout</button>
        </form>
        @endif
    </div>


    @if(session('updateProfileSuccess'))
    <div class="alert alert-success">
        {{ session('updateProfileSuccess') }}
    </div>
    @endif

    @if(session('updatePasswordSuccess'))
    <div class="alert alert-success">
        {{ session('updatePasswordSuccess') }}
    </div>
    @endif

    @if(session('updatePasswordError'))
    <div class="alert alert-danger">
        {{ session('updatePasswordError') }}
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Profile Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('updateStudentProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $student->username }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select name="class" id="class" class="form-control" required>
                        <option value="6" {{ $student->class == '6' ? 'selected' : '' }}>Class 6</option>
                        <option value="7" {{ $student->class == '7' ? 'selected' : '' }}>Class 7</option>
                        <option value="8" {{ $student->class == '8' ? 'selected' : '' }}>Class 8</option>
                        <option value="9" {{ $student->class == '9' ? 'selected' : '' }}>Class 9</option>
                        <option value="10" {{ $student->class == '10' ? 'selected' : '' }}>Class 10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ $student->age }}" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Upload Image</label>
                    <input type="file" name="photo" id="photo" class="form-control-file">
                    <img src="{{ asset('images/' . $student->photo) }}" class="img-thumbnail mt-2" alt="{{ $student->name }} Photo" style="max-width: 100px;">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Update Password</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('updateStudentPassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-secondary">Update Password</button>
            </form>
        </div>
    </div>
</div>

@endsection