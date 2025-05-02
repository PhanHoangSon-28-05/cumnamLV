@extends('admins.layout.master')
@section('title', 'Post')

@push('style')
<style>
    .editor {
        display: none;
    }
</style>
@endpush

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Home</a>
                    <a href="{{ route('posts.index') }}" class="breadcrumb-item">Post</a>
                    <a href="#" class="breadcrumb-item">Edit Post</a>
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
        <div class="card pb-2">
            <form action="{{ route('posts.update', $post->id) }}"method="POST">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h5 class="title" id="exampleModalLabel">
                        Edit Post
                    </h5>
                </div>

                <div class="body">
                    <div class="container-fluid px-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col">
                                        <label class="crud-label">Name:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control crud-input" name="name"
                                                value="{{ $post->name }}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="crud-label">Catergory:</label>
                                        <div class="input-group">
                                            <select class="form-control" name="category_id">
                                                <option value="0">---</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="crud-label">Description:</label>
                                        <div class="input-group">
                                            <textarea type="text" class="form-control crud-input" 
                                            name="description">{{ $post->description }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="crud-label p-0 mt-2 mb-0">Cover Image:</label>
                                <div class="input-group">
                                    <input type="file" name="pic" hidden id="cover_img">
                                    <label for="cover_img" class="w-100 border shadow mt-2">
                                        <img src="{{ route('storages.image', ['url' => $post->pic]) }}" alt=""
                                            class="w-100" id="image-preview">
                                    </label>
                                </div>
                                @error('pic')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="crud-label p-0 mt-2 mb-0">Details</label>
                                <textarea name="detail" value="" class="editor" rows="4" cols="4">{{ $post->detail }}</textarea>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row px-3">

                        </div>
                    </div>
                </div>
                <div class="footer px-3 mt-2">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="{{ asset('admins/assets/js/tinymce-options.js') }}"></script>
<script>
    $(document).ready(function() {
        tinymce.init(options);
    });
</script>
@endpush