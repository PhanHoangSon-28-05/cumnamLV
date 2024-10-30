<!-- Modal -->
<div class="modal fade" id="crudOrderModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                        Add New Order
                    @elseif ($action == 'update')
                        Update Order
                    @else
                        Delete Order
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container py-4" wire:loading wire:target="modalSetup">
                <div class="row align-items-center justify-content-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="ml-2">Vui lòng đợi</span>
                </div>
            </div>
            <form wire:submit.prevent="{{ $action }}">
                <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                    <div class="row">
                        <div class="mb-3 col-8 pr-3">
                            <div class="row">
                                <label class="crud-label p-0 mt-2 mb-0">Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control crud-input" wire:model.lazy="name">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <label class="crud-label p-0 mt-2 mb-0">Description:</label>
                                <div class="input-group w-100">
                                    <input type="textarea" class="form-control crud-input"
                                        wire:model.lazy="description">
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="row">
                                <label class="crud-label p-0 mb-0">Sample photo:</label>
                                <div class="input-group">
                                    <input type="file" wire:model.lazy="image" hidden id="cover_img">
                                    <label for="cover_img" class="w-100 border shadow mt-2">
                                        <img src="{{ asset($cover_img) }}" alt="" class="w-100"
                                            id="image-preview">
                                    </label>
                                </div>
                                @error('image')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ $action == 'delete' ? 'Exit' : 'Close' }}</button>
                    <button type="submit" class="btn btn-primary">
                        @if ($action == 'delete')
                            Yes
                        @elseif ($action == 'update')
                            Update
                        @else
                            Save
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#crudOrderModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-order-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudOrder', function() {
                $('#crudOrderModal').modal('hide')
            })
        })
    </script>
@endpush
