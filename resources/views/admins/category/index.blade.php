@extends('admins.layout.master')
@section('title', 'Category')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('category.index') }}" class="breadcrumb-item">Categories</a>
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


    <!-- Content area -->
    <div class="content">
        @livewire('categories.category-list')

        @livewire('categories.category-crud')
    </div>
    <!-- /content area -->
@endsection
