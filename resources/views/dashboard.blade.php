<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <div class="container my-4">

        <div class="row">
            <!-- Students Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Students</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">150</h3>
                        <p class="card-text">Total number of students.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Classes Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Classes</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">10</h3>
                        <p class="card-text">Total number of classes.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Subjects Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Subjects</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">25</h3>
                        <p class="card-text">Total number of subjects.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Students -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Recent Students</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Class 5</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Class 4</td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>Mike Johnson</td>
                                    <td>Class 3</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td>Class 2</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Sarah Brown</td>
                                    <td>Class 1</td>
                                    <td>7</td>
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