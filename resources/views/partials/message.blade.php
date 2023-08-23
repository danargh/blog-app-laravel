@if ($type == 'success')
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
    <i style="width: 1.5rem;" class="bi bi-check-circle-fill"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($type == 'error')
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <i style="width: 1.5rem;" class="bi bi-exclamation-circle-fill"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif