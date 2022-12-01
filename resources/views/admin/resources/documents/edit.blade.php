@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-10">
                    <div class="card mb-4">
                        <div class="card-header">
                            Edit Document
                        </div>
                        {{ Form::open(['route' => ['admin.document.update', ['document' => $document->id]], 'files' => true]) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        {!! Form::text('title', old('title', $document->document_title), [
                                            'id' => 'title',
                                            'class' => 'form-control',
                                        ]) !!}
                                        @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Type</label>
                                        {!! documentTypeDropdown('type', old('type', $document->document_type), [
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
                                        <label for="description" class="form-label">Description</label>
                                        {!! Form::textarea('description', old('description', $document->description), [
                                            'id' => 'description',
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        {!! documentStatusDropdown('status', old('status', $document->status), [
                                            'id' => 'status',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        {!! departmentDropdown('department', old('department', $document->department_id), [
                                            'id' => 'department',
                                            'class' => 'form-select',
                                        ]) !!}
                                        @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="document_file" class="form-label">Document(s)</label>
                                        {!! Form::file('document_file[]', [
                                            'id' => 'document_file',
                                            'class' => 'form-control',
                                            'multiple',
                                        ]) !!}
                                        @error('document_file') <span class="text-danger small">{{ $message }}</span> @enderror
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
