<!-- Modal -->
<div class="modal fade" id="crudCategoryModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'create')
                        Add New Category
                    @elseif ($action == 'update')
                        Update Category
                    @else
                        Delete Category
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
                    <span class="ml-2">Loading</span>
                </div>
            </div>
            <form wire:submit.prevent="{{ $action }}">
                <div class="modal-body" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'delete')
                        <div class="container-fluid">
                            <div class="row">
                                <span>Do you want to delete "{{ $name }}"?</span>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="input-group mb-3 col-6">
                                <div class="input-group-prepend mr-1">
                                    <span class="input-group-text" id="basic-addon1">Numerical order</span>
                                </div>
                                <input type="number" class="form-control" wire:model.lazy="stt">
                                {{-- @error('stt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            <div class="input-group mb-3 col-6">
                                <div class="input-group-prepend mr-1">
                                    <label class="input-group-text" for="inputGroupSelect01">Parent item</label>
                                </div>
                                <select class="custom-select text-uppercase" wire:model.lazy="parent_id"
                                    id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    @foreach ($categories as $value)
                                        <option value="{{ $value->id }}" class="">{{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Name</label>
                                        <input type="text" class="form-control" wire:model.lazy="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Description:</label>
                                        <textarea type="text" class="form-control" wire:model.lazy="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="input-group-tex">Content:</label>
                                        <textarea type="text" class="form-control" wire:model.lazy="content"></textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="is_product_category" 
                                            wire:model.live="is_product_category">
                                            <label class="custom-control-label" for="is_product_category">
                                                <strong>Product Category</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-4">
                                <label>Sample photo:</label>
                                <div class="input-group">
                                    <input type="file" wire:model.lazy="pic" hidden id="cover_img" accept="image/*">
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
                <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ $action == 'delete' ? 'Exit' : 'Close' }}</button>
                    <button type="submit" class="btn {{ $action == 'delete' ? 'btn-danger' : 'btn-primary' }}">
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
            $('#crudCategoryModal').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-category-id') ?? 0
                @this.call('modalSetup', id)
            })

            $(document).on('closeCrudCategory', function() {
                $('#crudCategoryModal').modal('hide')
            })
        })
    </script>
@endpush
