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
                    <a href="{{ route('pages.index') }}" class="breadcrumb-item">Page</a>
                    <a href="#" class="breadcrumb-item">Edit Page</a>
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
            <form action="{{ route('pages.update', $page->id) }}"method="POST">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h5 class="title text-capitalize" id="exampleModalLabel">
                        Edit Page {{ $page->cate->name }}
                    </h5>
                </div>

                <div class="body">
                    <div class="container-fluid">

                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Description:</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control crud-input" name="description">{{ $page->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Paragraph 1:</label>
                            <div class="col-12 p-0">
                                <textarea name="paragraph1" value="" id="editor-full1" rows="4" cols="4">{{ $page->paragraph1 }}
						            </textarea>
                            </div>
                            @error('paragraph1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Paragraph 2:</label>
                            <div class="col-12 p-0">
                                <textarea name="paragraph2" value="" id="editor-full2" rows="4" cols="4">{{ $page->paragraph2 }}
						            </textarea>
                            </div>
                            @error('paragraph2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row px-3">
                            <label class="crud-label p-0 mt-2 mb-0">Paragraph 3:</label>
                            <div class="col-12 p-0">
                                <textarea name="paragraph3" value="" id="editor-full3" rows="4" cols="4">{{ $page->paragraph3 }}
						            </textarea>
                            </div>
                            @error('paragraph3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="footer px-3 mt-2 mb-1">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
