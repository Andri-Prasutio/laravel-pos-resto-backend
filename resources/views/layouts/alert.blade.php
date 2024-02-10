@if ($message = Session::get('success'))
    <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-check-circle mr-2"></i></div>
        <div class="alert-body">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
