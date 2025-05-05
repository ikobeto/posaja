<div>
    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
        <div class="modal-dialog {{ $size }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $modalId }}Label">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('show-bootstrap-modal', function(data) {
                var modal = new bootstrap.Modal(document.getElementById(data.modalId));
                modal.show();
            });
    
            Livewire.on('hide-bootstrap-modal', function(data) {
                var modal = bootstrap.Modal.getInstance(document.getElementById(data.modalId));
                modal.hide();
            });
        });
    </script>
    @endpush
</div>
