@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp


@foreach ($childCategories as $value)
    @if ($value->post == 0)
        <p><a class="text-dark"
                href="@if (in_array($value->id, $pages)) {{ URL::route('home.pages', $value->slug) }} @else{{ URL::route('home.category', $value->slug) }} @endif">{{ $value->name }}</a>
        </p>
    @elseif ($value->post == 1)
        <p><a class="text-dark" href="{{ URL::route('home.category-post', $value->slug) }}">{{ $value->name }}</a></p>
    @else
        <p><a class="text-dark"
                href="@if (in_array($value->id, $pages)) {{ URL::route('home.pages', $value->slug) }} @endif">{{ $value->name }}</a>
        </p>
    @endif
@endforeach
