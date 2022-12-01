@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <h5>{{ $document?->document_title }}</h5>
                            <div>
                                <a class="btn btn-sm btn-info" href="{{ route('student.resources') }}">
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    {{ $document?->description }}
                                    <hr>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <span class="fw-normal">Posted: {{ $document->created_at?->format('d/m/Y H:i:s A') }}</span>
                                    <span class="fw-normal">Type: {{ $document->documentType?->name }}</span>
                                    <span class="fw-normal">Status:
                                        @if ($document->status === 2)
                                            <span class="badge rounded-pill text-bg-success">{{ $document->documentStatus?->name }}</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning">{{ $document->documentStatus?->name }}</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="col-12 mb-3">
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table border mb-0">
                                            <thead class="fw-semibold">
                                                <tr class="align-middle">
                                                    <th>#</th>
                                                    <th>File Name</th>
                                                    <th>Type</th>
                                                    <th>Size</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($document->getMedia('documents') as $media)
                                                <tr class="align-middle">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $media->file_name }}</td>
                                                    <td>{{ $media->mime_type }}</td>
                                                    <td>{{ $media->human_readable_size }}</td>
                                                    <td class="text-end">
                                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('student.document.media.download', ['media' => $media->id]) }}">
                                                            Download
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="align-middle">
                                                    <td colspan="5" class="text-danger">No files found.</td>
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
            </div>
        </div>
    </div>
@endsection
