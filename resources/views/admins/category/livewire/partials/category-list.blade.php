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
                        @if ($childCategory->is_product_category)
                        <i class="fa-solid fa-cart-shopping mr-1"></i>
                        @else
                        <i class="fa-solid fa-plus mr-1"></i>
                        @endif
                        {{ $childCategory->name }}
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow-none pt-0">
                    <div class="row mb-1">
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal"
                                data-target="#crudCategoryModal" data-category-id="{{ $childCategory->id }}" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-danger btn-block" data-toggle="modal"
                                data-target="#crudCategoryModal" data-category-id="{{ -$childCategory->id }}" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            @if ($childCategory->post != 1)
                                <button type="button" class="btn btn-sm btn-success btn-block"
                                    wire:click="selectPost({{ $childCategory->id }})">
                                    <i class="fa-solid fa-check"></i> Select This category belongs to post
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-secondary btn-block"
                                    wire:click="noselectPost({{ $childCategory->id }})">
                                    <i class="fa-solid fa-check"></i> Deselect This category belongs to post
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            @if (!$childCategory->is_product_category)
                                <button type="button" class="btn btn-sm btn-success btn-block"
                                    wire:click="toggleProductCate({{ $childCategory->id }})">
                                    <i class="fa-solid fa-check"></i> Select This as Product Category
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-secondary btn-block"
                                    wire:click="toggleProductCate({{ $childCategory->id }})">
                                    <i class="fa-solid fa-check"></i> Deselect This as Product Category
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
