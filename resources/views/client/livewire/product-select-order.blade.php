<div class="col-md-6 col-12">
    <div class="row mb-2">
        <div class="col">
            <h2 class="product-title">{{ $product->name }}</h2>
            <div class="rating-reviews ml-3">
                <span class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                    @if ($i-1 < $showStars['sum'] && $showStars['sum'] < $i)
                        ⯪
                    @elseif ($i <= $showStars['sum'])
                        ★
                    @elseif ($i >= $showStars['sum'])
                        ☆
                    @endif
                    @endfor
                </span>
                <span class="reviews ml-2">{{ $showStars['sum'] }} ({{ $showStars['count'] }} reviews)</span>
            </div>
            <div class="ml-3 mt-2">
                <p class="card-text card-price h1">
                    <span class="font-weight-bolder text-black">
                        ${{ $product->from }}
                    </span>
                    @if ($product->fromOLD)
                    <s class="text-muted ml-4">${{ $product->fromOLD }}</s>
                    @endif
                </p>
            </div>
        </div>
    </div>

    @php($sn = 1)
    @if ($colorPros && count($colorPros) != 0)
    <div class="row mb-2 border-top border-dark">
        <div class="col">
            <div class="collapsed" data-toggle="collapse" data-target="#selectColor" aria-expanded="false" type="button">
                <h4 class="d-flex align-items-center mt-2">
                    <span class="badge badge-pill badge-secondary mr-1">{{ $sn++ }}</span>
                    <span style="font-weight: 900">Color</span>
                </h4>
            </div>

            <div class="collapse show" id="selectColor" wire:ignore.self>
                <ul class="d-flex flex-row pb-2" style="overflow-x: auto">
                    @foreach ($colorPros as $value)
                    <li class="color-option text-center border">
                        <input type="radio" id="{{ 'option' . $value->id }}" name="image-radio"
                            wire:model.live="selectedValues.color" class="radio-img"
                            value="{{ $value->id }}" >
                        <label for="{{ 'option' . $value->id }}" class="radio-img-label">
                            <img src="{{ asset('storage/' . $value->fabriccolor) }}" alt="{{ $value->name }}" 
                            width="120" height="100" style="object-fit:cover"> <br>
                            <span class="text-dark">{{ $value->name ?? $value->color->name }}</span>
                            </br>
                            @if ($value->priceNew == 0)
                            @else
                            <span class="text-dark" style="text-decoration: underline;">{{ $value->priceNew }}$</span>
                            @endif
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="row mb-2 border-top border-dark">
        <div class="col">
            <div class="collapsed" data-toggle="collapse" data-target="#selectSize" aria-expanded="false" type="button">
                <h4 class="d-flex align-items-center mt-2">
                    <span class="badge badge-pill badge-secondary mr-1">{{ $sn++ }}</span>
                    <span style="font-weight: 900">Size</span>
                </h4>
            </div>

            <div class="collapse show" id="selectSize" wire:ignore.self>
                <div class="text-center pb-2">
                    <label>Window Width (Inch):</label>
                    <div class="size-select">
                        <select class="border border-dark" name="width1" wire:model.live="width1">
                            @for ($i = 0; $i <= 100; $i += 1)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select class="border border-dark" name="width2" wire:model.live="width2">
                            <option value="0">0</option>
                            <option value="0.125">1/8</option>
                            <option value="0.25">1/4</option>
                            <option value="0.5">1/2</option>
                        </select>
                    </div>
                    <label class="mt-2">Window Height (Inch):</label>
                    <div class="size-select">
                        <select class="border border-dark" name="height1" wire:model.live="height1">
                            @for ($i = 0; $i <= 100; $i += 1)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select class="border border-dark" name="height2" wire:model.live="height2">
                            <option value="0">0</option>
                            <option value="0.25">1/4</option>
                            <option value="0.5">1/2</option>
                            <option value="0.75">3/4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('client.partials.prante-item-product', [
        'id_product' => $product->id,
    ])

    <div class="row mb-2 border-bottom border-dark">
        <div class="col-8">
            <p class="text-uppercase font-weight-bolder pl-0 mb-0 h3 d-block d-md-none">
                Total Price:</p>
            <p class="text-uppercase font-weight-bolder pl-5 d-sm-block d-none h3">
                Total Price:</p>
        </div>
        <div class="col-4">
            <p class="mb-0 h2">
                <span id="total">{{ $totalPrice }}</span>$
            </p>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col-3 px-0 mx-0 size-select">
            <select class="w-100 border border-dark" wire:model.live="amount">
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
