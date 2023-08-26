@if ($type == 'success')
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
    <i style="width: 1.5rem; margin-right: 1rem" data-feather="check-square"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($type == 'error')
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <i style="width: 1.5rem; margin-right: 1rem" data-feather="alert-triangle"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif