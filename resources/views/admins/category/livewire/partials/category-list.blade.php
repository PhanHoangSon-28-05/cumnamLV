@inject('categoryRepo', 'App\Repositories\Category\CategoryRepositoryInterface')

@php
    $childCategories = $categoryRepo->getChildNew($parentId);
@endphp

@foreach ($childCategories as $childCategory)
    <li class="list-group-item p-0 mb-1 ml-3">
        <div class="col-10">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
                    <span class="mb-0 font-weight-bold">
                        <i class="fa-solid fa-plus"></i> {{ $childCategory->name }}
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0 border-0 shadow-none ">
                    <button type="button" class="btn btn-sm btn-primary w-25 d-inline" data-toggle="modal"
                        data-target="#crudCategoryModal" data-category-id="{{ $childCategory->id }}" title="Edit">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger w-25 d-inline" data-toggle="modal"
                        data-target="#crudCategoryModal" data-category-id="{{ -$childCategory->id }}" title="Delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </li>
@endforeach
