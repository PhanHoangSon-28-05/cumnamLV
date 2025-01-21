
@extends('admins.layout.master')
@section('title', 'Product Homne')

@section('content')
    <!-- Page Product Homne -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('producthome.index') }}" class="breadcrumb-item">Product</a>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                </div>
            </div>
        </div>
    </div>
    <!-- /page Product Homne -->


    <!-- Content area -->
    <div class="content">
        @livewire('producthome.producthome-show')
    </div>
    <!-- /content area -->
@endsection
