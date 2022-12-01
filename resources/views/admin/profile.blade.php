@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            Profile
                        </div>
                        {{ Form::open(['route' => 'admin.profile.store']) }}
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                {!! Form::text('firstname', old('firstname', $profile?->firstname), [
                                    'id' => 'firstname',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('firstname') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                {!! Form::text('lastname', old('lastname', $profile?->lastname), [
                                    'id' => 'lastname',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('lastname') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                {!! Form::email('email', old('email', $profile?->email), [
                                    'id' => 'email',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                {!! Form::text('phone', old('phone', $profile?->phone), [
                                    'id' => 'phone',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                {!! Form::password('password', [
                                    'id' => 'password',
                                    'class' => 'form-control',
                                ]) !!}
                                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
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
