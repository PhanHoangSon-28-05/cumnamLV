<div class="content" wire:ignore.self>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $name_pro }}</h5>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        </div>
        <div class="modal-body">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">
                            Fabric color
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row bd-highlight">
                            <div class="row">
                                @foreach ($colorPros as $value)
                                    <div class="mr-1">
                                        <div class="card card-body">
                                            <div class="media">
                                                @if ($id_pro_item == $value->id)
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <label class="crud-label p-0 mt-2 mb-0">Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control crud-input"
                                                                    wire:model="Newname">
                                                            </div>
                                                            @error('Newname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <label class="crud-label p-0 mt-2 mb-0">Color:</label>
                                                            <div class="input-group">
                                                                <select class="form-control" wire:model="Newid_color">
                                                                    <option value="0">---</option>
                                                                    @foreach ($colors as $color)
                                                                        <option value="{{ $color->id }}"
                                                                            {{ $Newid_color == $color->id ? 'selected' : '' }}>
                                                                            {{ $color->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="crud-label p-0 mt-2 mb-0">Price
                                                                New:</label>
                                                            <div class="input-group w-100">
                                                                <input type="number" class="form-control crud-input"
                                                                    wire:model="NewpriceNew">
                                                            </div>
                                                            @error('NewpriceNew')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <label class="crud-label p-0 mt-2 mb-0">Price
                                                                Old:</label>
                                                            <div class="input-group w-100">
                                                                <input type="number" class="form-control crud-input"
                                                                    wire:model="NewpriceOld">
                                                            </div>
                                                            @error('NewpriceOld')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <button wire:click="update"type="submit"
                                                            class="btn btn-primary mt-2">
                                                            Update
                                                        </button>
                                                        <button wire:click="cancelEdit"type="submit"
                                                            class="btn btn-primary mt-2">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="media-body">
                                                        <div class="media-title font-weight-semibold">
                                                            {{ $value->name }}
                                                        </div>
                                                        <p class="text-dark">New price: {{ $value->priceNew }}</p>
                                                        <p class="text-dark">Old price: {{ $value->priceOld }}</p>
                                                        <div class="d-flex flex-row bd-highlight">
                                                            <button type="button" class="btn btn-sm"
                                                                wire:click="edit({{ $value->id }})">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm"
                                                                wire:click="deleteImage({{ $value->id }})">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="ml-3">
                                                    <a href="#">
                                                        <img src="{{ asset('storage/' . $value->image) }}"
                                                            class="rounded" width="100" height="100"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="" style="display: block;">
                                    <div class="text-left">
                                        <a class="btn btn-secondary" data-toggle="collapse" href="#color"
                                            role="button" aria-expanded="false" aria-controls="color" wire:ignore.self
                                            wire:click="resetColumn()"><i class="fa-regular fa-image"></i></a>
                                    </div>
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="color" wire:ignore.self>
                                            <div class="card card-body">
                                                <form wire:submit.prevent="create">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="mb-3 col-8 pr-3">
                                                                <div class="row">
                                                                    <label
                                                                        class="crud-label p-0 mt-2 mb-0">Name:</label>
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control crud-input"
                                                                            wire:model="name">
                                                                    </div>
                                                                    @error('name')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row">
                                                                    <label
                                                                        class="crud-label p-0 mt-2 mb-0">Color:</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control"
                                                                            wire:model="id_color">
                                                                            <option value="0">---</option>
                                                                            @foreach ($colors as $color)
                                                                                <option value="{{ $color->id }}">
                                                                                    {{ $color->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="crud-label p-0 mt-2 mb-0">Price
                                                                        New:</label>
                                                                    <div class="input-group w-100">
                                                                        <input type="number"
                                                                            class="form-control crud-input"
                                                                            wire:model="priceNew">
                                                                    </div>
                                                                    @error('priceNew')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row">
                                                                    <label class="crud-label p-0 mt-2 mb-0">Price
                                                                        Old:</label>
                                                                    <div class="input-group w-100">
                                                                        <input type="number"
                                                                            class="form-control crud-input"
                                                                            wire:model="priceOld">
                                                                    </div>
                                                                    @error('priceOld')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-4">
                                                                <div class="row">
                                                                    <label class="crud-label p-0 mb-0">Fabric
                                                                        color:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" wire:model="fabriccolor"
                                                                            hidden id="cover_fabriccolor">
                                                                        <label for="cover_fabriccolor"
                                                                            class="w-100 border shadow mt-2">
                                                                            <img src="{{ asset($cover_fabriccolor) }}"
                                                                                alt="" class="w-100"
                                                                                id="image-preview">
                                                                        </label>
                                                                    </div>
                                                                    @error('image')
                                                                        <span class="error">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row">
                                                                    <label class="crud-label p-0 mb-0">Sample
                                                                        photo:</label>
                                                                    <div class="input-group">
                                                                        <input type="file" wire:model="image"
                                                                            hidden id="cover_img">
                                                                        <label for="cover_img"
                                                                            class="w-100 border shadow mt-2">
                                                                            <img src="{{ asset($cover_img) }}"
                                                                                alt="" class="w-100"
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
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($orders as $value)
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                {{ $value->name }}
                            </h2>
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-row bd-highlight">
                                <div class="row">
                                    @include('admins.product.partials.list-item-product', [
                                        'id_product' => $id_product,
                                        'id_item' => $value->id,
                                    ])

                                    <div class="" style="display: block;">
                                        <div class="text-left">
                                            <a class="btn btn-secondary" data-toggle="collapse"
                                                href="#{{ $value->slug }}" role="button" aria-expanded="false"
                                                aria-controls="{{ $value->slug }}" wire:ignore.self
                                                wire:click="resetColumn()"><i class="fa-regular fa-image"></i></a>
                                        </div>
                                        <div class="col">
                                            <div class="collapse multi-collapse" id="{{ $value->slug }}"
                                                wire:ignore.self>
                                                <div class="card card-body">
                                                    <form wire:submit.prevent="create">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-3 col-8 pr-3">
                                                                    <div class="row">
                                                                        <label
                                                                            class="crud-label p-0 mt-2 mb-0">Name:</label>
                                                                        <div class="input-group">
                                                                            <input type="text"
                                                                                class="form-control crud-input"
                                                                                wire:model="name">
                                                                        </div>
                                                                        @error('name')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="crud-label p-0 mt-2 mb-0">Price
                                                                            New:</label>
                                                                        <div class="input-group w-100">
                                                                            <input type="number"
                                                                                class="form-control crud-input"
                                                                                wire:model="priceNew">
                                                                        </div>
                                                                        @error('priceNew')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row">
                                                                        <label class="crud-label p-0 mt-2 mb-0">Price
                                                                            Old:</label>
                                                                        <div class="input-group w-100">
                                                                            <input type="number"
                                                                                class="form-control crud-input"
                                                                                wire:model="priceOld">
                                                                        </div>
                                                                        @error('priceOld')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-4">
                                                                    <div class="row">
                                                                        <label class="crud-label p-0 mb-0">Sample
                                                                            photo:</label>
                                                                        <div class="input-group">
                                                                            <input type="file" wire:model="image"
                                                                                hidden id="cover_img">
                                                                            <label for="cover_img"
                                                                                class="w-100 border shadow mt-2">
                                                                                <img src="{{ asset($cover_img) }}"
                                                                                    alt="" class="w-100"
                                                                                    id="image-preview">
                                                                            </label>
                                                                        </div>
                                                                        @error('image')
                                                                            <span
                                                                                class="error">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary"
                                                            wire:click="setItemId({{ $value->id }})">
                                                            Save
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="collapse"]').on('click', function() {
                console.log('Button clicked'); // Thêm dòng này
                var target = $(this).attr('href');
                $('.collapse').not(target).collapse('hide');
                $(target).collapse('toggle');
            });
        });
    </script>
@endpush
