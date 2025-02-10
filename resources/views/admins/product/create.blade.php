@extends('admins.layout.master')
@section('title', 'Product')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('products.index') }}" class="breadcrumb-item">Product</a>
                    <a href="#" class="breadcrumb-item">Create Product</a>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="card-header">
                    <h5 class="title" id="exampleModalLabel">
                        Create product
                    </h5>
                </div>

                <div class="body">
                    <div class="container-fluid">
                        <div class="row px-3">
                            <div class="col-6 pl-0">
                                <label class="crud-label mx-1 p-0">Name:</label>
                                <div class="p-0 input-group">
                                    <input type="text" class="form-control crud-input" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-2 pl-0">
                                <label class="crud-label mx-1 p-0">Price new ($):</label>
                                <div class="p-0 input-group">
                                    <input type="text" class="form-control" name="from" value="0"
                                        placeholder="Recipient's username" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                </div>
                                @error('from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-2 pl-0">
                                <label class="crud-label mx-1 p-0">Price old ($):</label>
                                <div class="p-0 input-group">
                                    <input type="text" class="form-control crud-input" name="fromOLD" value="0">
                                </div>
                                @error('fromOLD')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-2 p-0">
                                <label class="crud-label mx-1 p-0">Promotion ($):</label>
                                <div class="p-0 input-group">
                                    <input type="text" class="form-control crud-input" name="promotion" value="0">
                                </div>
                                @error('promotion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Catergory:</label>
                            <div class="input-group">
                                <select class="form-control" name="id_cate">
                                    <option value="0">---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Description:</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control crud-input" name="description"></textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">About:</label>
                            <div class="col-12 p-0">
                                <textarea name="about" value="" id="editor-full" rows="4" cols="4">{{ old('about') }}
						            </textarea>
                            </div>
                            @error('about')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Details</label>
                            <div class="col-12 p-0">
                                <textarea name="details" value="" id="editor-full1" rows="4" cols="4">{{ old('details') }}</textarea>
                            </div>
                            @error('details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Materials Care:</label>
                            <div class="col-12 p-0">
                                <textarea name="materials_care" value="" id="editor-full2" rows="4" cols="4">{{ old('materials_care') }}</textarea>
                            </div>
                            @error('materials_care')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Shipping & Received</label>
                            <div class="col-12 p-0">
                                <textarea name="shipping_received" value="" id="editor-full3" rows="4" cols="4">{{ old('shipping_received') }}</textarea>
                            </div>
                            @error('shipping_received')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="footer px-3 mt-2">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
