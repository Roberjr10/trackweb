@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
        {!! session('success') !!}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! session('warning') !!}
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! session('danger') !!}
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {!! session('info') !!}
    </div>
@endif
