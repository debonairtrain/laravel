<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="" style="width:60px; height: 50px;">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.manage-students') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-group') }}"></use>
                </svg> Students</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
                </svg> Resources</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.manage-documents') }}"><span class="nav-icon"></span> Documents</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.manage-videos') }}"><span class="nav-icon"></span> Videos</a></li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
