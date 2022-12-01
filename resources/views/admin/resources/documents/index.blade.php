@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            Manage Documents
                            <div class="d-flex justify-content-end">
                                <a
                                    href="{{ route('admin.document.create') }}"
                                    class="btn btn-sm btn-primary"
                                >
                                    New Document
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border mb-0">
                                    <thead class="fw-semibold">
                                    <tr class="align-middle">
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($documents as $document)
                                        <tr class="align-middle">
                                            <th>{{ $document->document_title }}</th>
                                            <td>{{ $document->documentType?->name }}</td>
                                            <td>{{ $document->department?->department_name }}</td>
                                            <td>
                                                @if ($document->status === 2)
                                                    <span class="badge rounded-pill text-bg-success">{{ $document->documentStatus?->name }}</span>
                                                @else
                                                    <span class="badge rounded-pill text-bg-warning">{{ $document->documentStatus?->name }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $document->uploaded_at?->diffForHumans() }}</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="{{ route('admin.document.show', ['document' => $document->id]) }}"
                                                   class="btn btn-sm btn-secondary"
                                                >
                                                    <svg class="icon">
                                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-share') }}"></use>
                                                    </svg>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="icon">
                                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="{{ route('admin.document.edit', ['document' => $document->id]) }}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('admin.document.destroy', ['document' => $document->id]) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="align-middle">
                                            <td colspan="6" class="text-danger">No records found.</td>
                                        </tr>
                                    @endforelse
                                    <tr class="align-middle">
                                        <td colspan="6">{{ $documents->links() }}</td>
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
