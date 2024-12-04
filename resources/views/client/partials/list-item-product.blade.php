@inject('itemRepos', 'App\Repositories\ItemOrder\ItemRepositoryInterface')

@php
    $item = $itemRepos->selectItem($id_product, $id_item);
@endphp
{{-- @dd($item) --}}
@foreach ($item as $value)
    <li class="color-option text-center">
        <input type="radio" id="{{ 'option' . $value->id }}" name="{{ $name_item }}"
            wire:model.live="selectedValues.{{ $name_item }}" class="radio-img" value="{{ $value->id }}"
            onclick="selectImage('{{ route('storages.image', ['url' => $value->image]) }}', '{{ $value->name }} </br> {{ $value->priceNew }}$', '{{ $id_item }}'); scrollToView(this)">
        <label for="{{ 'option' . $value->id }}" class="radio-img-label">
            <img src="{{ route('storages.image', ['url' => $value->image]) }}" alt="{{ $value->name }}"> </br>
            <span class="text-dark">{{ $value->name }}</span> </br>
            @if ($value->priceNew == 0)
                <span class="text-success" style="text-decoration: underline;">Free</span>
            @else
                <span class="text-dark" style="text-decoration: underline;">{{ $value->priceNew }}$</span>
            @endif
        </label>
    </li>
@endforeach
