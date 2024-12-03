@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp


@foreach ($childCategories as $value)
    <li><a href="#">{{ $value->name }}</a></li>
@endforeach
