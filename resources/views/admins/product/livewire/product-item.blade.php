<div class="content">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Fabric color</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($colorPros as $value)
                <div class="col-3 mb-2" wire:key="{{ $value->id }}">
                    <div class="card card-body h-100 pb-0">
                        <div class="row align-content-between">
                            <div class="col-auto">
                                <img src="{{ route('storages.image', ['url' => $value->image]) }}"
                                class="rounded border" width="100" height="100" alt="" style="object-fit:cover">
                            </div>
                            <div class="col">
                                <p><strong>{{ $value->name }}</strong></p>
                                <p class="text-dark">New price: {{ $value->priceNew }}</p>
                                <p class="text-dark">Old price: {{ $value->priceOld }}</p>
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#productItemCrudModal" 
                                data-item-id="{{ $value->id }}" data-order-id="{{ $value->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-sm"
                                    wire:click="deleteImage({{ $value->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-3 mb-2">
                    <div class="card card-body h-100 p-2 cursor-pointer pb-0" data-toggle="modal" data-target="#productItemCrudModal">
                        <div class="d-flex align-items-center justify-content-center h-100 rounded" style="border:5px dashed lightgray">
                            <i class="fa-regular fa-square-plus fa-2xl text-secondary my-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($orders as $value)
    <div class="card" wire:key="{{ $value->id }}">
        <div class="card-header">
            <h2 class="mb-0">{{ $value->name }}</h2>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($product_items->where('id_item', $value->id) as $item_value)
                <div class="col-3 mb-2" wire:key="{{ $value->id }}">
                    <div class="card card-body h-100 mb-0">
                        <div class="row align-content-between">
                            <div class="col-auto">
                                <img src="{{ route('storages.image', ['url' => $item_value->image]) }}"
                                class="rounded border" width="100" height="100" alt="" style="object-fit:cover">
                            </div>
                            <div class="col">
                                <p><strong>{{ $item_value->name }}</strong></p>
                                <p class="text-dark">New price: {{ $item_value->priceNew }}</p>
                                <p class="text-dark">Old price: {{ $item_value->priceOld }}</p>
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#productItemCrudModal" 
                                data-item-id="{{ $item_value->id }}" data-order-id="{{ $value->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-sm"
                                    wire:click="deleteImage({{ $item_value->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-3 mb-2">
                    <div class="card card-body h-100 p-2 cursor-pointer pb-0" data-toggle="modal" 
                    data-target="#productItemCrudModal" data-order-id="{{ $value->id }}">
                        <div class="d-flex align-items-center justify-content-center h-100 rounded" style="border:5px dashed lightgray">
                            <i class="fa-regular fa-square-plus fa-2xl text-secondary my-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
