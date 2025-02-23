@extends('admins.layout.master')
@section('title', 'Page')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route(\App\Models\Page::INDEX) }}" class="breadcrumb-item">Page</a>
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
        <livewire:pages.page-list />
        <livewire:pages.page-crud />
        <livewire:pages.page-image-crud />

        {{-- @livewire('pages.page-crud') --}}
    </div>
    <!-- /content area -->
@endsection
