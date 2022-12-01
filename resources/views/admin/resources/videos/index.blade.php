@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            Manage Videos
                            <div class="d-flex justify-content-end">
                                <a
                                    href="{{ route('admin.video.create') }}"
                                    class="btn btn-sm btn-primary"
                                >
                                    New Video
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
                                    @forelse($videos as $video)
                                        <tr class="align-middle">
                                            <th>{{ $video->video_title }}</th>
                                            <td>{{ $video->videoType?->name }}</td>
                                            <td>{{ $video->department?->department_name }}</td>
                                            <td>
                                                @if ($video->status === 2)
                                                    <span class="badge rounded-pill text-bg-success">{{ $video->videoStatus?->name }}</span>
                                                @else
                                                    <span class="badge rounded-pill text-bg-warning">{{ $video->videoStatus?->name }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $video->uploaded_at?->diffForHumans() }}</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="{!! $video->video_url !!}"
                                                   class="btn btn-sm btn-secondary"
                                                   target="_blank"
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
                                                        <a class="dropdown-item" href="{{ route('admin.video.edit', ['video' => $video->id]) }}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('admin.video.destroy', ['video' => $video->id]) }}">Delete</a>
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
                                        <td colspan="6">{{ $videos->links() }}</td>
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
