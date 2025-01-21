@push('style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .crud-input,
        .input-group-text {
            border-color: rgb(158, 158, 158);
        }

        .crud-label {
            font-weight: bold;
        }
    </style>
@endpush

<div>
    <div class="modal fade" id="crudClientModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                        @if ($action == 'create')
                            Add New Image Client
                        @elseif ($action == 'update')
                            Update Image Client
                        @elseif ($action == 'delete')
                            Delete Image Client
                        @endif
                    </h5>
                </div>

                <div class="container py-4" wire:loading wire:target="modalSetup">
                    <div class="row align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="{{ $action }}">
                    <div class="modal-body" wire:loading.remove wire:target="modalSetup">

                        @if ($action == 'delete')
                            <div class="container-fluid">
                                <div class="row">
                                    <span>
                                        Do you want to delete client "{{ $stt }}"?</span>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <label class="crud-label p-0 mt-2 mb-0">Thứ tự client</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control crud-input" wire:model.lazy="stt">
                                    </div>
                                    @error('stt')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <label class="crud-label p-0 mt-2 mb-0">Title:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control crud-input" wire:model.lazy="title">
                                    </div>
                                    @error('title')
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
                                <div class="row">
                                    <label class="crud-label p-0 mt-2 mb-0">Cover Image:</label>
                                    <div class="input-group">
                                        <input type="file" wire:model="pic" hidden id="cover_img">
                                        <label for="cover_img" class="w-100 border shadow mt-2">
                                            <img src="{{ asset($cover_img) }}" alt="" class="w-100"
                                                id="image-preview">
                                        </label>
                                    </div>
                                    @error('pic')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer mt-2" wire:loading.remove wire:target="modalSetup">
                        <button type="button" class="btn btn-sm btn-secondary"
                            data-dismiss="modal">{{ $action == 'delete' ? 'Hủy' : 'Đóng' }}</button>
                        <button type="submit"
                            class="btn btn-sm btn-primary">{{ $action == 'delete' ? 'Đồng ý' : 'Lưu' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#crudClientModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-client-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudClient', function() {
                $('#crudClientModal').modal('hide')
            })

        })
    </script>
@endpush
