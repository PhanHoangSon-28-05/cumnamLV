@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp


@foreach ($childCategories as $value)
    @if ($value->post == 0)
        <li class="text-dark"><a href="{{ URL::route('home.category', $value->slug) }}">{{ $value->name }}</a></li>
    @elseif ($value->post == 1)
        <li class="text-dark"><a href="{{ URL::route('home.category-post', $value->slug) }}">{{ $value->name }}</a></li>
    @else
        <li class="text-dark"><a href="#">{{ $value->name }}</a></li>
    @endif
@endforeach
