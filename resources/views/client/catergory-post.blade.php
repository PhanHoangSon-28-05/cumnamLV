@extends('client.master')
@section('title', $cate->name)

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" id="category-post">
            <div class="row content mb-3">
                <div class="col-md-12 col-12 text-center px-0">
                    <!-- Container riêng cho hình ảnh và nội dung -->
                    <div class="image-content-container position-relative">
                        <!-- Hình ảnh -->
                        @if ($cate->image != null)
                            <img src="{{ URL::route('storages.image', ['url' => $cate->image]) }}"alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @else
                            <img src="{{ URL::asset('images/placeholder/600x400.png') }}" alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @endif


                        <!-- Nội dung chữ nằm đè lên ảnh -->
                        <div class="overlay-content text-body py-5">
                            <p class="font-weight-bolder h3">{{ $cate->name }}</p>
                            <p class="">
                                @if ($cate->description)
                                    {{ $cate->description }}
                                    </br>
                                @else
                                    The content is being updated.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="post-slider">
                <div class="row">
                    @if (count($products) == 0)
                        <div class="col-12">
                            <p class="text-center">There are currently no posts.</p>
                        </div>
                    @else
                        <div class="container-fluid">
                            {{-- <div class="row">
                                <div class="col-12 text-center mb-4">
                                    <h3 class="font-weight-bold">Recent Posts</h3>
                                </div>
                            </div> --}}
                            {{-- @dd($postcates) --}}
                            @foreach ($postcates as $value)
                                <div class=" d-sm-block d-none">
                                    <div class="row align-items-center " id="personal-computer">
                                        <div class="col-md-6 post-order-1">
                                            <div class="post-content">
                                                <p class="text-muted mb-1">{{ date('F d, Y', strtotime($value->time)) }}</p>
                                                <h5>{{ $value->name }}</h5>
                                                <a href="{{ URL::route('home.post', ['slug' => $cate->slug, 'post' => $value->slug]) }}"
                                                    class="btn btn-outline-secondary mt-3">VIEW POST</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 post-order-2 text-center">
                                            @if ($value->pic != null)
                                                <img src="{{ URL::route('storages.image', ['url' => $value->pic]) }}"class="img-fluid rounded post-image"
                                                    alt="Post Image">
                                            @else
                                                <img src="{{ URL::asset('images/placeholder/600x400.png') }}"class="img-fluid rounded"
                                                    alt="Post Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="container text-center d-sm-none  d-block" id="mobi">
                                    <div class="post-container d-flex justify-content-center">
                                        @if ($value->pic != null)
                                            <img src="{{ URL::route('storages.image', ['url' => $value->pic]) }}"
                                                class="post-image" alt="Post Image">
                                        @else
                                            <img src="{{ URL::asset('images/placeholder/600x400.png') }}"
                                                class="post-image" alt="Post Image">
                                        @endif

                                        <div class="post-content">
                                            <p class="mb-1">{{ date('F d, Y', strtotime($value->time)) }}</p>
                                            <h5>{{ $value->name }}</h5>
                                            <a href="{{ URL::route('home.post', ['slug' => $cate->slug, 'post' => $value->slug]) }}"
                                                class="btn btn-outline-light">VIEW POST</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

@endsection
