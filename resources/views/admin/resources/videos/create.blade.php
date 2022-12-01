@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-10">
                    <div class="card mb-4">
                        <div class="card-header">
                            New Video
                        </div>
                        {{ Form::open(['route' => 'admin.video.store']) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        {!! Form::text('title', old('title'), [
                                            'id' => 'title',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Type</label>
                                        {!! videoTypeDropdown('type', old('type'), [
                                            'id' => 'type',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('type') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="url" class="form-label">Video URL <em class="text-muted">(e.g. https://www.youtube.com/watch?v=MYyJ4PuL4pY)</em></label>
                                        {!! Form::text('url', old('url'), [
                                            'id' => 'url',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('url') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        {!! videoStatusDropdown('status', old('status'), [
                                            'id' => 'status',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        {!! departmentDropdown('department', old('department'), [
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
                                Add Video
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
