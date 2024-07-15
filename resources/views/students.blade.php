@extends('layout.app')

@section('title', 'Students')

@section('main-container')

<div class="container mt-4">
    <div class="my-4">
        <h5 class="text-secondary mb-4"><i class="fa-regular fa-folder mr-2"></i>Student</h5>
        <form action="/filterStudents" method="GET" class="form-inline row">
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <input class="form-control w-100" type="search" name="name" placeholder="search by name" aria-label="Search" value="{{ old('name', request()->get('name')) }}">
            </div>
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <input class="form-control w-100" type="number" name="age_min" placeholder="age-min" aria-label="age-min" value="{{ old('age_min', request()->get('age_min')) }}">
            </div>
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <input class="form-control w-100" type="number" name="age_max" placeholder="age-max" aria-label="age-max" value="{{ old('age_max', request()->get('age_max')) }}">
            </div>
            <div class="col-6 col-md-3 mb-2 mb-md-0">
                <select class="form-control w-100" name="class">
                    <option value="">All Classes</option>
                    <option value="6" {{ request()->get('class') == '6' ? 'selected' : '' }}>Class 6</option>
                    <option value="7" {{ request()->get('class') == '7' ? 'selected' : '' }}>Class 7</option>
                    <option value="8" {{ request()->get('class') == '8' ? 'selected' : '' }}>Class 8</option>
                    <option value="9" {{ request()->get('class') == '9' ? 'selected' : '' }}>Class 9</option>
                    <option value="10" {{ request()->get('class') == '10' ? 'selected' : '' }}>Class 10</option>
                </select>
            </div>
            <div class="col-6 col-md-2 mb-2 mb-md-0">
                <button class="btn btn-primary " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>

    <div class="text-center">
        @if(Session("updateStudentSuccess"))
        <h6 class="alert alert-success">{{Session("updateStudentSuccess")}}</h6>
        @endif
        @if(Session("current_password_success"))
        <h6 class="alert alert-success">{{Session("current_password_success")}}</h6>
        @endif
        @if(Session("current_password_wrong"))
        <h6 class="alert alert-danger">{{Session("current_password_wrong")}}</h6>
        @endif
    </div>

    <div class="row">
        <!-- Add Student Form -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary d-flex align-items-center justify-content-between">
                    <h5 class="m-0 p-0 text-white">New Student</h5>
                    @if(Session::has('addStudentSuccess'))
                    <p class="p-0 m-0 px-2 py-1 bg-light text-success" style="font-weight: 600;"><i class="fas fa-check mr-1"></i>{{Session::get('addStudentSuccess')}}</p>
                    @endif
                </div>
                <div class="card-body">
                    <form action="/newStudentData" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" id="class" class="form-control" required>
                                <option value="6">Class 6</option>
                                <option value="7">Class 7</option>
                                <option value="8">Class 8</option>
                                <option value="9">Class 9</option>
                                <option value="10">Class 10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div>
                                <label for="student_image">Upload Image</label>
                                <input type="file" name="photo" id="student_image" class="form-control-file" required>
                            </div>
                            <div>
                                <img id="image_preview" class="img-preview" src="images/{{'dummy-avatar.png'}}" alt="Image Preview">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Student <i class="fa-solid fa-plus ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Student List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="m-0 p-0 text-white">Students List</h5>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-0">username</th>
                                <th class="border-0">Name</th>
                                <th class="border-0">Class</th>
                                <th class="border-0">Age</th>
                                <th class="border-0">Gender</th>
                                <th class="border-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($students))
                            @foreach($students as $student)
                            <tr>
                                <!-- <td><img src="{{ asset('images/' . $student->photo) }}" class="img-thumbnail" style="max-width: 50px;" alt="{{ $student->name }} Photo"></td> -->
                                <td>{{ $student->username }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->gender }}</td>
                                <td class="student-actions">
                                    <a href="#" class="text-secondary view-student-info-btn" data-toggle="modal" data-target="#studentInfoModal" data-id="{{ $student->id }}" data-name="{{ $student->name }}" data-class="{{ $student->class }}" data-age="{{ $student->age }}" data-gender="{{ $student->gender }}" data-photo="{{ $student->photo }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a href="#" class="text-info edit-student-btn" data-toggle="modal" data-target="#editStudentModal" data-id="{{ $student->id }}" data-username="{{ $student->username }}" data-name="{{ $student->name }}" data-class="{{ $student->class }}" data-age="{{ $student->age }}" data-gender="{{ $student->gender }}">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ url('deleteStudent/'.$student->id) }}" class="text-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="pagination-links">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info modal -->
<div class="modal fade" id="studentInfoModal" tabindex="-1" role="dialog" aria-labelledby="studentInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentInfoModalLabel">Student Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="student-info-photo" class="img-thumbnail" src="" alt="Student Photo">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Name:</strong> <span id="student-info-name"></span></p>
                        <p><strong>Class:</strong> <span id="student-info-class"></span></p>
                        <p><strong>Age:</strong> <span id="student-info-age"></span></p>
                        <p><strong>Gender:</strong> <span id="student-info-gender"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="POST" action="/updateStudent" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-student-id">

                    <div class="row">
                        <!-- Personal Information Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-student-username">Username</label>
                                <input type="text" class="form-control" id="edit-student-username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-student-name">Name</label>
                                <input type="text" class="form-control" id="edit-student-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-student-class">Class</label>
                                <select class="form-control" id="edit-student-class" name="class" required>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10">Class 10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit-student-age">Age</label>
                                <input type="number" class="form-control" id="edit-student-age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-student-gender">Gender</label>
                                <select class="form-control" id="edit-student-gender" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div>
                                    <label for="edit-student-photo">Upload Image</label>
                                    <input type="file" class="form-control-file" id="edit-student-photo" name="photo">
                                </div>
                                <div>
                                    <img id="image_preview" class="img-preview" src="images/{{'dummy-avatar.png'}}" alt="Image Preview">
                                </div>
                            </div>
                        </div>

                        <!-- Password Section -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-student-curr-password">Current Password</label>
                                <input type="password" class="form-control" id="edit-student-curr-password" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="edit-student-new-password">New Password</label>
                                <input type="password" class="form-control" id="edit-student-new-password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="edit-student-conf-password">Confirm Password</label>
                                <input type="password" class="form-control" id="edit-student-conf-password" name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<script>
    // info
    $(document).on('click', '.view-student-info-btn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var classVal = $(this).data('class');
        var age = $(this).data('age');
        var gender = $(this).data('gender');
        var photo = $(this).data('photo');

        $('#student-info-name').text(name);
        $('#student-info-class').text(classVal);
        $('#student-info-age').text(age);
        $('#student-info-gender').text(gender);
        $('#student-info-photo').attr('src', 'images/' + photo);

        $('#studentInfoModal').modal('show');
    });

    // edit
    $(document).on('click', '.edit-student-btn', function() {
        var id = $(this).data('id');
        var username = $(this).data('username');
        var name = $(this).data('name');
        var classVal = $(this).data('class');
        var age = $(this).data('age');
        var gender = $(this).data('gender');

        $('#edit-student-id').val(id);
        $('#edit-student-username').val(username);
        $('#edit-student-name').val(name);
        $('#edit-student-class').val(classVal);
        $('#edit-student-age').val(age);
        $('#edit-student-gender').val(gender);

        $('#editStudentModal').modal('show');
    });

    // Preview image
    document.getElementById('student_image').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('image_preview').src = URL.createObjectURL(file);
        }
    });
</script>

@endsection