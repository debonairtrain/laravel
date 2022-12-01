@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @include('layouts.partials.alert')
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-coreui-toggle="tab" data-coreui-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Videos</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-coreui-toggle="tab" data-coreui-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Documents</button>
                              </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
                                          @forelse($videoResources as $video)
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
                                                  </td>
                                              </tr>
                                          @empty
                                              <tr class="align-middle">
                                                  <td colspan="6" class="text-danger">No videos found.</td>
                                              </tr>
                                          @endforelse
                                          <tr class="align-middle">
                                              <td colspan="6">{{ $videoResources->links() }}</td>
                                          </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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
                                          @forelse($documentResources as $document)
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
                                                      <a href="{{ route('student.document.show', ['document' => $document->id]) }}"
                                                         class="btn btn-sm btn-secondary"
                                                      >
                                                          <svg class="icon">
                                                              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-share') }}"></use>
                                                          </svg>
                                                      </a>
                                                  </td>
                                              </tr>
                                          @empty
                                              <tr class="align-middle">
                                                  <td colspan="6" class="text-danger">No document found.</td>
                                              </tr>
                                          @endforelse
                                          <tr class="align-middle">
                                              <td colspan="6">{{ $documentResources->links() }}</td>
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
            </div>
        </div>
    </div>
@endsection
