<!DOCTYPE html>
@extends('layout.app')

@section('title', 'Subjects')

@section('main-container')
<div class="container mt-4">
    <div class="my-4">
        <h5 class="text-secondary mb-4"><i class="fa-regular fa-folder mr-2"></i>Subjects</h5>
        <form action="/filterSubjects" method="GET" class="form-inline row">
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <input class="form-control w-100" type="search" name="name" placeholder="Search subjects" aria-label="Search" value="{{ request()->get('name') }}">
            </div>
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <select class="form-control w-100" name="class">
                    <option value="">All Classes</option>
                    <option value="6" {{ request()->get('class') == '6' ? 'selected' : '' }}>Class 6</option>
                    <option value="7" {{ request()->get('class') == '7' ? 'selected' : '' }}>Class 7</option>
                    <option value="8" {{ request()->get('class') == '8' ? 'selected' : '' }}>Class 8</option>
                    <option value="9C" {{ request()->get('class') == '9C' ? 'selected' : '' }}>Class 9-10 (Commerce)</option>
                    <option value="9A" {{ request()->get('class') == '9A' ? 'selected' : '' }}>Class 9-10 (Arts)</option>
                    <option value="9S" {{ request()->get('class') == '9S' ? 'selected' : '' }}>Class 9-10 (Science)</option>
                </select>
            </div>
            <div class="col-12 col-md-2 mb-2 mb-md-0">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
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
                                    <!-- <a href="" class="text-secondary"><i class="fa-solid fa-circle-info"></i></a> -->
                                    <a href="#" class="text-info edit-subject-btn" data-toggle="modal" data-target="#editSubjectModal" data-id="{{ $subject->id }}" data-name="{{ $subject->name }}" data-code="{{ $subject->code }}" data-class="{{ implode(', ', $subject->class) }}">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ url('deleteSubject/'.$subject->id) }}" class="text-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
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

<!-- -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSubjectForm" method="POST" action="/updateSubject">
                    @csrf
                    <input type="hidden" name="id" id="edit-subject-id">
                    <div class="form-group">
                        <label for="edit-subject-name">Subject Name</label>
                        <input type="text" name="name" id="edit-subject-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-subject-code">Subject Code</label>
                        <input type="text" name="code" id="edit-subject-code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="edit-class6" value="6" name="classes[]">
                            <label class="form-check-label" for="edit-class6">Class 6</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="edit-class7" value="7" name="classes[]">
                            <label class="form-check-label" for="edit-class7">Class 7</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="edit-class8" value="8" name="classes[]">
                            <label class="form-check-label" for="edit-class8">Class 8</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="checkbox" id="edit-class9Science" value="9/10-S" name="classes[]">
                            <label class="form-check-label" for="edit-class9Science">Class 9-10 (Science)</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="checkbox" id="edit-class9Arts" value="9/10-A" name="classes[]">
                            <label class="form-check-label" for="edit-class9Arts">Class 9-10 (Arts)</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="checkbox" id="edit-class9Commerce" value="9/10-C" name="classes[]">
                            <label class="form-check-label" for="edit-class9Commerce">Class 9-10 (Commerce)</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Subject <i class="fa-solid fa-pen ml-2"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.edit-subject-btn').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const code = $(this).data('code');
            const classList = $(this).data('class').split(', ');

            $('#edit-subject-id').val(id);
            $('#edit-subject-name').val(name);
            $('#edit-subject-code').val(code);

            $('#editSubjectForm input[type=checkbox]').prop('checked', false);

            classList.forEach(classValue => {
                $(`#editSubjectForm input[value='${classValue}']`).prop('checked', true);
            });
        });
    });
</script>

@endsection



<!-- // 
Bangla	BAN101	6, 7, 8, 9/10-S, 9/10-A, 9/10-C
English	ENG102	6, 7, 8, 9/10-S, 9/10-A, 9/10-C
Mathematics	MATH103	6, 7, 8, 9/10-A, 9/10-C
Religion	REL104	6, 7, 8, 9/10-S, 9/10-A, 9/10-C
Global Studies	GST105	6, 7, 8, 9/10-S, 9/10-A, 9/10-C
Science	SC106	6, 7, 8, 9/10-A, 9/10-C
Physics	PHY201	9/10-S
Chemistry	CHE202	9/10-S
Biology	BIO203	9/10-S
Higher Mathematics	HMATH204	9/10-S
Economics	ECON301	9/10-C
Accounting	ACCT302	9/10-C
Business Studies	BST303	9/10-C
History	HIST304	9/10-A
Geography	GEOG305	9/10-A
Civics	CIV306	9/10-A
Agricultural Studies	AGR107	6, 7, 8, 9/10-A, 9/10-C
-->