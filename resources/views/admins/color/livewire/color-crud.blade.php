<!-- Modal -->
<div class="modal fade" id="crudColorModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                        Add New Color
                    @elseif ($action == 'update')
                        Update Color
                    @else
                        Delete Color
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
                        <div class="input-group mb-3 col-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" class="form-control" wire:model.lazy="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Code color</span>
                                </div>
                                <input type="text" class="form-control" wire:model.lazy="code_color">
                                @error('code_color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 col-3">
                            <div style="width: 100px; height: 100px ; background-color: {{ $code_color }}"></div>
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
            $('#crudColorModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-color-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudColor', function() {
                $('#crudColorModal').modal('hide')
            })
        })
    </script>
@endpush
