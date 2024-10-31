@inject('itemRepos', 'App\Repositories\ItemOrder\ItemRepositoryInterface')

@php
    $item = $itemRepos->selectItem($id_product, $id_item);
@endphp

@foreach ($item as $value)
    <div class="col-xl-3 col-lg-6">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <div class="media-title font-weight-semibold">{{ $value->name }}</div>
                    <p class="text-dark">New price: {{ $value->priceNew }}</p>
                    <p class="text-dark">Old price: {{ $value->priceOld }}</p>
                </div>

                <div class="ml-3">
                    <a href="#">
                        <img src="{{ asset('storage/' . $value->image) }}" class="rounded" width="100" height="100"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
