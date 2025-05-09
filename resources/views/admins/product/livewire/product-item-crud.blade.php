<div wire:ignore.self id="productItemCrudModal" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" wire:loading wire:target="modalSetup">
            <div class="row">
                <div class="col text-center py-5">
                    <span class="spinner">
                        <i class="fa-solid fa-spinner fa-xl"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="modal-content" wire:loading.remove wire:target="modalSetup">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if ($order)
                        {{ $order->name }}
                    @else
                        Fabric color
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="row mb-2">
                            <div class="col">
                                <label class="crud-label">Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control crud-input" wire:model="name">
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if (!$order)
                        <div class="row mb-2">
                            <div class="col">
                                <label class="crud-label">Color:</label>
                                <div class="input-group">
                                    <select class="form-control" wire:model="id_color">
                                        <option value="0">---</option>
                                        @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('price_new')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col">
                                <label class="crud-label">Price New:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control crud-input" wire:model="priceNew">
                                </div>
                                @error('priceNew')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label class="crud-label">Price Old:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control crud-input" wire:model="priceOld">
                                </div>
                                @error('priceOld')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        @if (!$order)
                        <div class="row mb-2">
                            <label class="crud-label">Fabric color:</label>
                            <div class="input-group">
                                <input type="file" wire:model="fabriccolor" hidden id="cover_fabriccolor">
                                <label for="cover_fabriccolor" class="border shadow">
                                    <img src="{{ asset($cover_fabriccolor) }}" alt="" class="img-fluid">
                                </label>
                            </div>
                            @error('fabriccolor')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <div class="row mb-2">
                            <label class="crud-label">Sample photo:</label>
                            <div class="input-group">
                                <input type="file" wire:model="image" hidden id="cover_img">
                                <label for="cover_img" class="border shadow">
                                    <img src="{{ asset($cover_img) }}"alt="" class="img-fluid">
                                </label>
                            </div>
                            @error('image')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="{{ $action }}">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#productItemCrudModal').on('show.bs.modal', function(e) {
                var item_id = e.relatedTarget.getAttribute('data-item-id') ?? 0;
                var order_id = e.relatedTarget.getAttribute('data-order-id') ?? 0;
                @this.call('modalSetup', item_id, order_id);
            });
        });
    </script>
@endpush

@script
    <script>
        $wire.on('close-modal', function(e) {
            $('#productItemCrudModal').modal('hide');
        });
    </script>
@endscript