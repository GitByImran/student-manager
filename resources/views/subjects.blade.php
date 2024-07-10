<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/subjects.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Subject Manager</title>
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')
    <!--  -->

    <div class="container mt-4">
        <div class="my-4 d-flex align-items-center justify-content-between">
            <h5 class="text-secondary"><i class="fa-regular fa-folder mr-2"></i>Subjects</h5>
            <form action="/filterSubjects" method="GET" class="form-inline">
                <input class="form-control mr-2" type="search" name="name" placeholder="Search subjects" aria-label="Search" value="{{ request()->get('name') }}">
                <select class="form-control mr-2" name="class">
                    <option value="">All Classes</option>
                    <option value="6" {{ request()->get('class') == '6' ? 'selected' : '' }}>Class 6</option>
                    <option value="7" {{ request()->get('class') == '7' ? 'selected' : '' }}>Class 7</option>
                    <option value="8" {{ request()->get('class') == '8' ? 'selected' : '' }}>Class 8</option>
                    <option value="9C" {{ request()->get('class') == '9C' ? 'selected' : '' }}>Class 9-10 (Commerce)</option>
                    <option value="9A" {{ request()->get('class') == '9A' ? 'selected' : '' }}>Class 9-10 (Arts)</option>
                    <option value="9S" {{ request()->get('class') == '9S' ? 'selected' : '' }}>Class 9-10 (Science)</option>
                </select>
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="row">
            <!-- Add Subject Form -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary d-flex align-items-center justify-content-between">
                        <h5 class="m-0 p-0 text-white">New Subject</h5>
                        @if(Session::has('addSubjectSuccess'))
                        <p class="p-0 m-0 px-2 py-1 bg-light text-success" style="font-weight: 600;"><i class="fas fa-check mr-1"></i>{{Session::get('addSubjectSuccess')}}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="/newSubjectData" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Subject Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="code">Subject Code</label>
                                <input type="text" name="code" id="code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Class</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="class6" value="6" name="classes[]">
                                    <label class="form-check-label" for="class6">Class 6</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="class7" value="7" name="classes[]">
                                    <label class="form-check-label" for="class7">Class 7</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="class8" value="8" name="classes[]">
                                    <label class="form-check-label" for="class8">Class 8</label>
                                </div>
                                <div class="form-check form-check-block">
                                    <input class="form-check-input" type="checkbox" id="class9Science" value="9/10-S" name="classes[]">
                                    <label class="form-check-label" for="class9Science">Class 9-10 (Science)</label>
                                </div>
                                <div class="form-check form-check-block">
                                    <input class="form-check-input" type="checkbox" id="class9Arts" value="9/10-A" name="classes[]">
                                    <label class="form-check-label" for="class9Arts">Class 9-10 (Arts)</label>
                                </div>
                                <div class="form-check form-check-block">
                                    <input class="form-check-input" type="checkbox" id="class9Commerce" value="9/10-C" name="classes[]">
                                    <label class="form-check-label" for="class9Commerce">Class 9-10 (Commerce)</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Subject <i class="fa-solid fa-plus ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Subject List -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="m-0 p-0 text-white">Subjects List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-0">Subject Name</th>
                                    <th class="border-0">Subject Code</th>
                                    <th class="border-0">Class</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($subjects))
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->code }}</td>
                                    <td>{{ implode(', ', $subject->class) }}</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>