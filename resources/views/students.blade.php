<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/students.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Manager</title>
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')
    <!--  -->

    <div class="container mt-4">
        <div class="my-4 d-flex align-items-center justify-content-between">
            <h5 class="text-secondary"><i class="fa-regular fa-folder mr-2"></i>Student</h5>
            <form class="form-inline">
                <input class="form-control mr-2" type="search" placeholder="Search students" aria-label="Search">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="row">
            <!-- Add Student Form -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h5 class="m-0 p-0 text-white">New Student</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
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
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Class</th>
                                    <th class="border-0">Age</th>
                                    <th class="border-0">Gender</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>John Doe</td>
                                    <td>6</td>
                                    <td>12</td>
                                    <td>Male</td>
                                    <td class="student-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>7</td>
                                    <td>13</td>
                                    <td>Female</td>
                                    <td class="student-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sam Brown</td>
                                    <td>8</td>
                                    <td>14</td>
                                    <td>Male</td>
                                    <td class="student-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emily Johnson</td>
                                    <td>9</td>
                                    <td>15</td>
                                    <td>Female</td>
                                    <td class="student-actions">
                                        <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="" class="text-info"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Michael Lee</td>
                                    <td>10</td>
                                    <td>16</td>
                                    <td>Male</td>
                                    <td class="student-actions">
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