@push('style')
    <style>
        /* .dropdown-menu-right {
                                                    width:
                                                } */
    </style>
@endpush

<div>
    <div class="card">
        <div class="card-header py-1">
            <h5 class="card-title floar-left d-inline">Categories</h5>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#crudCategoryModal"
                wire:ignore.self>
                Add New
            </button>
        </div>

        <div class="list" wire:poll.keep-alive.10s>
            <ul class="list-group">
                @foreach ($categories as $value)
                    <li class="list-group-item p-0 mb-1">
                        <div class="col-10">
                            <div class="btn-group dropright">

                                {{-- <button type="button" class="btn btn-secondary btn-icon"><i
                                        class="icon-grid-alt"></i></button> --}}
                                <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
                                    <span class="mb-0 font-weight-bold">{{ $value->stt }}.
                                        {{ $value->name }}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right p-0 border-0 shadow-none ">
                                    <button type="button" class="btn btn-sm btn-primary w-25 d-inline"
                                        data-toggle="modal" data-target="#crudCategoryModal"
                                        data-category-id="{{ $value->id }}" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger w-25 d-inline"
                                        data-toggle="modal" data-target="#crudCategoryModal"
                                        data-category-id="{{ -$value->id }}" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </li>
                    @include('admins.category.livewire.partials.category-list', [
                        'parentId' => $value->id,
                    ])
                @endforeach
            </ul>
        </div>
    </div>
</div>
