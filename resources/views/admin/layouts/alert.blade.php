@if (session('success'))
    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-check-double-line label-icon"></i><strong> {{ session('success') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-alert-line label-icon"></i><strong>{{ session('warning') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-error-warning-line label-icon"></i><strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
