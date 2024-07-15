@extends('layout.app')

@section('title', 'Student Login')

@section('main-container')
<div class="container student-login-form">
    <h3 class="mb-4">Student Login</h3>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('student.login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Student Login</button>
    </form>

</div>
@endsection