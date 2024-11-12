@inject('itemRepos', 'App\Repositories\ItemOrder\ItemRepositoryInterface')

@foreach ($orders as $value)
    @php
        $item = $itemRepos->selectItem($id_product, $value->id);
    @endphp
    @if (count($item) != 0)
        <div class="card rounded border-0 item">
            <div class="card-header">
                <h2 class="mb-0">
                </h2>
            </div>

            <div class="card-header bg-white border-dark" id="{{ 'headingOne' . $value->id }}">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left d-flex" type="button" data-toggle="collapse"
                        data-target="#{{ 'collapseOne' . $value->id }}" aria-expanded="true"
                        aria-controls="{{ 'collapseOne' . $value->id }}">
                        <span class="flex-grow-1 text-dark"> {{ $value->name }}</span>
                        <div class="show-img-text d-flex">
                            <div id="{{ 'selectedText' . $value->id }}" class="text-show text-muted flex-grow-1">
                            </div>
                            <div class="">
                                <img id="{{ 'selectedImage' . $value->id }}" src="" alt="Selected Image"
                                    class="img-show img-fluid ml-1">
                            </div>
                        </div>
                    </button>
                </h2>
            </div>

            <div id="{{ 'collapseOne' . $value->id }}" class="collapse show"
                aria-labelledby="{{ 'headingOne' . $value->id }}" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="d-flex flex-row bd-highlight mb-3 mt-3" id="myUL">
                        @include('client.partials.list-item-product', [
                            'id_product' => $product->id,
                            'id_item' => $value->id,
                            'name_item' => $value->slug,
                        ])
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endforeach
