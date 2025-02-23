<!-- Modal -->
<div class="modal fade" id="crudPageModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" wire:loading.remove>
                    Add New Page
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container py-4" wire:loading>
                <div class="row align-items-center justify-content-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="ml-2">Loading...</span>
                </div>
            </div>
            <form wire:submit.prevent="create"> {{--   --}}
                <div class="modal-body pt-0" wire:loading.remove>
                    <h2 class="crud-label mb-0">Category:</h2>
                    <div class="container">
                        <div class="row">
                            @foreach ($categories as $category)
                                @if (!in_array($category->id, $pages))
                                    <div class="form-check form-check-inline col-4 pr-0 mr-0">
                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                            wire:model="listcategories">
                                        <label class="form-check-label h5 text-capitalize">{{ $category->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @error('listcategories')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer" wire:loading.remove>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('closeCrudPage', function() {
                $('#crudPageModal').modal('hide')
            })
        })
    </script>
@endpush
