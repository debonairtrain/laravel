@if (session()->has('alert_message'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-{{ session('alert_type') }} alert-dismissible fade show" role="alert">
                <strong>Notice!</strong> {!! session('alert_message') !!}
                <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
