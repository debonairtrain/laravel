@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            Assessments
                            <div class="d-flex justify-content-end">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    data-coreui-toggle="modal"
                                    data-coreui-target="#assessment-modal"
                                >
                                    Make an Assessment
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border mb-0">
                                    <thead class="fw-semibold">
                                    <tr class="align-middle">
                                        <th>#</th>
                                        <th>Lecturer</th>
                                        <th>Assessment</th>
                                        <th>Grade</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($assessments as $assessment)
                                        <tr class="align-middle">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ \Illuminate\Support\Str::title($assessment->name) }}</td>
                                            <td>{{ $assessment->assessment_requirement_id }}</td>
                                            <td>{{ $assessment->assessment_score }}</td>
                                            <td><div class="fw-semibold">{{ $assessment->created_at?->diffForHumans() }}</div></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="icon">
                                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('student.assessment.destroy', ['assessment' => $assessment->id]) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="align-middle">
                                            <td colspan="6" class="text-danger">No records found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal modal-lg fade"
             id="assessment-modal"
             data-coreui-backdrop="static"
             data-coreui-keyboard="false"
             tabindex="-1"
             aria-labelledby="assessment-modal-label"
             aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assessment-modal-label">Make an Assessment</h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div>
                                        <label for="course" class="form-label">Course</label>
                                        {!! courseDropdown('course', old('course'), [
                                            'id' => 'course',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('course') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div>
                                        <label for="lecturer_name" class="form-label">Lecturer Name</label>
                                        {!! Form::text('lecturer_name', old('lecturer_name'), [
                                            'id' => 'lecturer_name',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('lecturer_name') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table border-0">
                                        <tbody>
                                            @forelse($requirements as $requirement)
                                                <tr class="align-middle">
                                                    <td>{{ $requirement->name }}</td>
                                                    <td>Check box here</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-danger text-sm">No records found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm text-white" data-coreui-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
