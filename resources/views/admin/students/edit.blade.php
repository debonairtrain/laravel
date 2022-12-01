@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-10">
                    <div class="card mb-4">
                        <div class="card-header">
                            Edit Student
                        </div>
                        {{ Form::open(['route' => ['admin.student.patch', ['student' => $student->id]]]) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        {!! Form::text('firstname', old('firstname', $student?->firstname), [
                                            'id' => 'firstname',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('firstname') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        {!! Form::text('lastname', old('lastname', $student?->lastname), [
                                            'id' => 'lastname',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('lastname') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        {!! Form::email('email', old('email', $student?->email), [
                                            'id' => 'email',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        {!! Form::text('phone', old('phone', $student?->phone), [
                                            'id' => 'phone',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        {!! Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        {!! levelDropdown('level', old('level', $student?->level_id), [
                                            'id' => 'level',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('level') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        {!! departmentDropdown('department', old('department', $student?->department_id), [
                                            'id' => 'department',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button
                                type="submit"
                                class="btn btn-sm btn-primary"
                            >
                                Save
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
