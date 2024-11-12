@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

@foreach ($childCategories as $value)
    <a class="dropdown-item" href="{{ route('home.category', $value->slug) }}">{{ $value->name }}</a>
@endforeach
