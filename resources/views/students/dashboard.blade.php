@extends('layouts.dashboard.main')

@section('main-content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-sm-10">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-MnSzUX7kU-E" role="tab">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-media-play') }}"></use>
                                </svg>Media Playback</a></li>
                    </ul>

                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-MnSzUX7kU-E">
                            <div class="row">
                                <div class="col-12">
                                    @if (! empty($video))
                                        <div class="card">
                                            <div class="card-body p-3 d-flex align-items-center">
                                                <iframe width="1080" height="460" src="{{ $video->video_url }}?enablejsapi=1" title="Media video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="card-footer px-3 py-2"><a class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center" target="_blank" href="{{ $video->video_url }}"><span class="small fw-semibold">View Online</span>
                                                    <svg class="icon">
                                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chevron-right') }}"></use>
                                                    </svg></a></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.col-->
            </div>
        </div>
    </div>
@endsection
