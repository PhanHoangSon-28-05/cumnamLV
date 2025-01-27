<!-- Modal -->
<div class="modal fade" id="imageProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" wire:loading.remove wire:target="getData">
                    Product:
                    {{ $name }}
                </h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="row flex-row-reverse">
                    <div class="col-md-4">
                        <form wire:submit.prevent="updateImage">
                            <div class="">
                                <label class="crud-label">Add photos (Max: 20 photos)</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" multiple id="imageUpload"
                                        wire:model="images" rules="mimes:jpeg,png">
                                </div>
                                @if ($images)
                                    @foreach ($images as $image)
                                        <img src="{{ $image->temporaryUrl() }}" class="w-25 mb-2">
                                    @endforeach
                                @endif
                                @error('images.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="col-md-8" wire:ignore.self wire:loading.remove>
                        @if ($this->product_id != null)
                            <div id="imageProductData" class="row">
                                {{-- @dd($imagesData) --}}
                                @if (isset($imagesData))
                                    @foreach ($imagesData as $image)
                                        <div class="d-inline mb-2">
                                            <div class="col-3">
                                                <div class="shadow rounded">
                                                    {{-- <img src="{{ URL::asset('storage/'.$image->image) }}" alt="" width="100px"> --}}
                                                    <img src="{{ route('storages.image', ['url' => $image->image]) }}"
                                                        alt="" width="100px">
                                                    <div class="d-flex flex-row bd-highlight">
                                                        @if ($image->image != $product->pic)
                                                            <button type="button"
                                                                class="btn btn-sm btn-success bd-highlight"
                                                                wire:click="selectImage({{ $image->id }})">
                                                                <i class="fa-solid fa-check"></i>
                                                            </button>
                                                        @endif
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger bd-highlight"
                                                            wire:click="deleteImage({{ $image->id }})">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {
            $('#imageProduct').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.getAttribute('data-product-id')
                @this.call('getData', id)
            })

            $(document).on('closeCrudProduct', function() {
                $('#imageProduct').modal('hide')
            })
            Livewire.on('clearFileInput', function() {
                $('#imageUpload').val('');
            })
        });
    </script>
@endpush
