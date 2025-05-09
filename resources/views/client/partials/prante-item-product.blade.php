@inject('itemRepos', 'App\Repositories\ItemOrder\ItemRepositoryInterface')

@foreach ($orders as $value)
    @php
        $item = $itemRepos->selectItem($id_product, $value->id);
    @endphp
    @if (count($item) != 0)
    <div class="row mb-2 border-top border-dark">
        <div class="col">
            <div class="collapsed" data-toggle="collapse" data-target="{{ '#selectItem' . $value->id }}" aria-expanded="false" type="button">
                <h4 class="d-flex align-items-center mt-2">
                    <span class="badge badge-pill badge-secondary mr-1">{{ $sn++ }}</span>
                    <span style="font-weight: 900">{{ $value->name }}</span>
                </h4>
            </div>

            <div class="collapse show" id="{{ 'selectItem' . $value->id }}" wire:ignore.self>
                <ul class="d-flex flex-row pb-2" style="overflow-x: auto">
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
