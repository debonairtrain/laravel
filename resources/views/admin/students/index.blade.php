@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            Manage Students
                            <div class="d-flex justify-content-end">
                                <a
                                    href="{{ route('admin.student.create') }}"
                                    class="btn btn-sm btn-primary"
                                >
                                    New Student
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border mb-0">
                                    <thead class="fw-semibold">
                                    <tr class="align-middle">
                                        <th>Student #</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($students as $student)
                                        <tr class="align-middle">
                                            <th scope="row">{{ $student->student_number }}</th>
                                            <td>{{ \Illuminate\Support\Str::title($student->fullName) }}</td>
                                            <td>{{ $student->level_id }}</td>
                                            <td>{{ $student->department?->department_name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td><div class="fw-semibold">{{ $student->created_at?->diffForHumans() }}</div></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="icon">
                                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="{{ route('admin.student.edit', ['student' => $student->id]) }}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('admin.student.destroy', ['student' => $student->id]) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="align-middle">
                                            <td colspan="8" class="text-danger">No records found.</td>
                                        </tr>
                                    @endforelse
                                    <tr class="align-middle">
                                        <td colspan="8">{{ $students->links() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
