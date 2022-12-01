@extends('layouts.front.main')

@section('main-content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card-group d-block d-md-flex row">
                <div class="card col-md-7 p-4 mb-0">
                    {{ Form::open(['route' => 'admin.store']) }}
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-medium-emphasis">Administration Area</p>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                  </svg>
                                </span>
                                {{ Form::email('email', old('email'), [
                                    'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                                    'placeholder' => 'Email Address',
                                ]) }}
                            </div>
                            @error('email') <div class="small text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                  </svg>
                                </span>
                                {{ Form::password('password', [
                                    'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
                                    'placeholder' => 'Password',
                                ]) }}
                            </div>
                            @error('password') <div class="mb-3 small text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="btn btn-link px-0" type="button">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
