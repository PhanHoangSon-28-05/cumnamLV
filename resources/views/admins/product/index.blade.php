@extends('admins.layout.master')
@section('title', 'Product')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('products.index') }}" class="breadcrumb-item">Product</a>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    @if (Session::has('success'))
        <div class="alert alert-success alert-styled-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger alert-styled-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('fail') }}
        </div>
    @endif
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title floar-left d-inline">Product</h5>
                <a href="{{ route('products.create') }}" type="button" class="btn btn-success float-right">
                    Add New
                </a>
            </div>

            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                {{-- <div class="datatable-header">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input
                                type="search" class="" placeholder="Type to filter..."
                                aria-controls="DataTables_Table_0"></label></div>
                    <div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select
                                name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></label></div>
                </div> --}}
                <div class="datatable-scroll">
                    <table class="table table-striped" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th>S/N</th>
                                <th class="sorting sorting_asc">Name</th>
                                <th class="sorting">Catergory</th>
                                <th class="sorting">Picture</th>
                                <th class="sorting">Item</th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($product_list) --}}
                            @if (count($product_list) > 0)
                                @foreach ($product_list as $value)
                                    <tr class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="sorting_1">{{ $value->name }}</td>
                                        @if ($value->cate)
                                            <td>{{ $value->cate->name }}</td>
                                        @else
                                            <td>There are no categories!!!</td>
                                        @endif

                                        <td scope="row" class="text-center">
                                            <button type="button" class="btn btn-sm rounded-0 btn-success text-uppercase"
                                                data-toggle="modal" data-target="#imageProduct"
                                                data-product-id={{ $value->id }} title="List Image">
                                                <i class="fa-regular fa-images"></i>
                                            </button>
                                        </td>
                                        <td scope="row" class="text-center">
                                            <a href="{{ route('products.item', $value->id) }}" class="btn btn-light"><i
                                                    class="fa-solid fa-sitemap"></i>
                                            </a>
                                            {{-- <livewire:product.product-item :id_product="$value->id" />
                                            <button type="button" class="btn btn-light" data-toggle="modal"
                                                data-target="#modal_remote_{{ $value->id }}">
                                                <i class="fa-solid fa-sitemap"></i>
                                            </button> --}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('products.edit', $value->id) }}"
                                                class="btn btn-sm btn-primary" title="Edit"><i
                                                    class="fa-solid fa-pen"></i></a>
                                            <a href="{{ route('products.destroy', $value->id) }}"
                                                class="btn btn-sm btn-danger" title="Delete"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No Product Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="datatable-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
    @livewire('product.product-image-crud')

@endsection
