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
            <form class="form-inline">
                <input class="form-control mr-2" type="search" placeholder="Search subjects" aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="row">
            <!-- Add Subject Form -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h5 class="m-0 p-0 text-white">New Subject</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
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
                                    <input class="form-check-input" type="checkbox" id="class9Science" value="9S" name="classes[]">
                                    <label class="form-check-label" for="class9Science">Class 9-10 (Science)</label>
                                </div>
                                <div class="form-check form-check-block">
                                    <input class="form-check-input" type="checkbox" id="class9Arts" value="9A" name="classes[]">
                                    <label class="form-check-label" for="class9Arts">Class 9-10 (Arts)</label>
                                </div>
                                <div class="form-check form-check-block">
                                    <input class="form-check-input" type="checkbox" id="class9Commerce" value="9C" name="classes[]">
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
                                <tr>
                                    <td>Bangla</td>
                                    <td>BAN101</td>
                                    <td>6-7-8</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>English</td>
                                    <td>ENG102</td>
                                    <td>6-7-8</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mathematics</td>
                                    <td>MATH103</td>
                                    <td>6-7-8, 9-10</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>REL104</td>
                                    <td>6-7-8</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Global Studies</td>
                                    <td>GST105</td>
                                    <td>6-7-8</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Physics</td>
                                    <td>PHY201</td>
                                    <td>9-10 (Science)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chemistry</td>
                                    <td>CHE202</td>
                                    <td>9-10 (Science)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Biology</td>
                                    <td>BIO203</td>
                                    <td>9-10 (Science)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Higher Mathematics</td>
                                    <td>HMATH204</td>
                                    <td>9-10 (Science)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Economics</td>
                                    <td>ECON301</td>
                                    <td>9-10 (Commerce)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accounting</td>
                                    <td>ACCT302</td>
                                    <td>9-10 (Commerce)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Business Studies</td>
                                    <td>BST303</td>
                                    <td>9-10 (Commerce)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>History</td>
                                    <td>HIST304</td>
                                    <td>9-10 (Arts)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Geography</td>
                                    <td>GEOG305</td>
                                    <td>9-10 (Arts)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Civics</td>
                                    <td>CIV306</td>
                                    <td>9-10 (Arts)</td>
                                    <td class="subjects-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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