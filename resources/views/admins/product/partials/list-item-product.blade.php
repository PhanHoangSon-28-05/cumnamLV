@inject('itemRepos', 'App\Repositories\ItemOrder\ItemRepositoryInterface')

@php
    $item = $itemRepos->selectItem($id_product, $id_item);
@endphp

@foreach ($item as $value)
    <div class="mr-1">
        <div class="card card-body">
            <div class="media">
                @if ($id_pro_item == $value->id)
                    <div class="media-body">
                        <div class="row">
                            <label class="crud-label p-0 mt-2 mb-0">Name:</label>
                            <div class="input-group">
                                <input type="text" class="form-control crud-input" wire:model="Newname">
                            </div>
                            @error('Newname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="crud-label p-0 mt-2 mb-0">Price
                                New:</label>
                            <div class="input-group w-100">
                                <input type="number" class="form-control crud-input" wire:model="NewpriceNew">
                            </div>
                            @error('NewpriceNew')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="crud-label p-0 mt-2 mb-0">Price
                                Old:</label>
                            <div class="input-group w-100">
                                <input type="number" class="form-control crud-input" wire:model="NewpriceOld">
                            </div>
                            @error('NewpriceOld')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click="update"type="submit" class="btn btn-primary mt-2">
                            Update
                        </button>
                        <button wire:click="cancelEdit"type="submit" class="btn btn-primary mt-2">
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
                            <button type="button" class="btn btn-sm" wire:click="edit({{ $value->id }})">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-sm" wire:click="deleteImage({{ $value->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="ml-3">
                    <a href="#">
                        <img src="{{ route('storages.image', [$value->image]) }}" class="rounded" width="100"
                            height="100" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
