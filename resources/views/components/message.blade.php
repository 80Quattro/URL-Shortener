@props(['message'])

<div class="toast-container p-3 bottom-0 start-50 translate-middle-x" id="toastPlacement">
    <div class="toast show">
        <div class="d-flex alert alert-success m-0">
            <div class="toast-body">
                {{$message}}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>