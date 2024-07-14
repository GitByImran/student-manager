@extends('layout.app')

@section('title', 'Dasboard')

@section('main-container')

<div class="container my-4">

    <div class="row">
        <!-- Students Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Students</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-title">150</h3>
                    <p class="card-text">Total number of students.</p>
                    <a href="/students" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Classes Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Classes</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-title">10</h3>
                    <p class="card-text">Total number of classes.</p>
                    <a href="/" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <!-- Subjects Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Subjects</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-title">25</h3>
                    <p class="card-text">Total number of subjects.</p>
                    <a href="/subjects" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Students -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Recent Students</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Class</th>
                                <th class="border-0">Roll</th>
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

@endsection