<div class="col-md-6 col-12">
    <div class="accordion" id="accordionExample">
        <h2 class="product-title">{{ $product->name }}</h2>
        <div class="text-center">
            <p class="text-uppercase w-50 mx-auto">{{ $product->description }}</p>
        </div>
        <div class="mb-1">
            <div class="card rounded border-0">
                <div class="card-header bg-white border-dark" id="headingOne">
                    <div class="window-size">
                        <label>Window Width (Inch):</label>
                        <div class="size-select">
                            <select class="mb-2" name="width1" wire:model.live="width1">
                                @for ($i = 0; $i <= 100; $i += 1)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <select class="mb-2" name="width2" wire:model.live="width2">
                                <option value="0">0</option>
                                <option value="0.125">1/8</option>
                                <option value="0.25">1/4</option>
                                <option value="0.5">1/2</option>
                            </select>
                        </div>
                        <label>Window Height (Inch):</label>
                        <div class="size-select">
                            <select name="height1" wire:model.live="height1">
                                @for ($i = 0; $i <= 100; $i += 1)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <select name="height2" wire:model.live="height2">
                                <option value="0">0</option>
                                <option value="0.25">1/4</option>
                                <option value="0.5">1/2</option>
                                <option value="0.75">3/4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($colorPros) != 0)
                <div class="card rounded border-0 color">
                    <div class="card-header bg-white border-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left d-flex" type="button"
                                data-toggle="collapse" data-target="#collapseOne0" aria-expanded="true"
                                aria-controls="collapseOne0">
                                <span class="flex-grow-1 text-dark">Fabric color</span>
                                <div class="show-img-text d-flex">
                                    <div id="selectedText0" class="text-show text-muted flex-grow-1">
                                    </div>
                                    <div class="">
                                        <img id="selectedImage0" src="" alt="Selected Image"
                                            class="img-show img-fluid ml-1">
                                    </div>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne0" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="d-flex flex-row bd-highlight mb-3 mt-3" id="myUL">
                                {{-- @dd($colorPros) --}}
                                @foreach ($colorPros as $value)
                                    <li class="color-option text-center">
                                        <input type="radio" id="{{ 'option' . $value->id }}" name="image-radio"
                                            wire:model.live="selectedValues.color" class="radio-img"
                                            value="{{ $value->id }}" {{-- onclick="selectImage('{{ asset('storage/' . $value->fabriccolor) }}', '{{ $value->color->name }}', '0'); scrollToView(this)" --}}>
                                        <label for="{{ 'option' . $value->id }}" class="radio-img-label">
                                            <img src="{{ asset('storage/' . $value->fabriccolor) }}"
                                                alt="{{ $value->name }}">
                                            <span class="text-dark">{{ $value->name ?? $value->color->name }}</span>
                                            </br>
                                            @if ($value->priceNew == 0)
                                            @else
                                                <span class="text-dark"
                                                    style="text-decoration: underline;">{{ $value->priceNew }}$</span>
                                            @endif
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @include('client.partials.prante-item-product', [
                'id_product' => $product->id,
            ])

        </div>
    </div>
    <div class="row mb-2 border-bottom border-dark mx-3">
        <div class="col-8">
            <p class="text-uppercase font-weight-bolder pl-0 mb-0 h3 d-block d-md-none">
                Total Price:</p>
            <p class="text-uppercase font-weight-bolder pl-5 d-sm-block d-none h3">
                Total Price:</p>
        </div>
        <div class="col-4">
            <p class="mb-0 h2"><span id="total">{{ $totalPrice * $amount }}</span>$</p>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col-3 px-0 mx-0 size-select">
            <select class="w-100" wire:model.live="amount">
                @for ($i = 1; $i <= 100; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-9 pr-0">
            @if (($width1 + $width2) * ($height1 + $height2) > 0)
                <a id="customizeBuyButton" class="btn w-100 p-2 text-white bg-dark border border-dark"
                    wire:click.prevent="add">
                    Add to bag
                </a>
            @else
                <a id="customizeBuyButton" class="btn w-100 p-2 text-white bg-dark border border-dark" disabled>
                    Add to bag
                </a>
            @endif
        </div>
    </div>
</div>
