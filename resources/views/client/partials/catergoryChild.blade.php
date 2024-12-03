@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp


@foreach ($childCategories as $value)
    <li class="text-dark"><a href="{{ URL::route('home.category', $value->slug) }}">{{ $value->name }}</a></li>
@endforeach
