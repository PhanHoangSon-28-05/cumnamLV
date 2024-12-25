@extends('client.master')
@section('title', $post->name)

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" id="content-post">
            <div class="row content mb-3">
                <div class="col-md-12 col-12 text-center px-0">
                    <!-- Container riêng cho hình ảnh và nội dung -->
                    <div class="image-content-container position-relative">
                        <!-- Hình ảnh -->
                        @if ($post->pic != null)
                            <img src="{{ URL::route('storages.image', ['url' => $post->pic]) }}"alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @else
                            <img src="{{ URL::asset('images/placeholder/600x400.png') }}" alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @endif
                        {{-- <div class="overlay-content text-body py-5">
                            <p class="font-weight-bolder h3">{{ $post->name }}</p>
                            <p class="">
                                @if ($post->description)
                                    {{ $post->description }}
                                @else
                                    The content is being updated.
                                @endif
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="content">
                {{-- <div class="share-buttons">
                    <span>Share it—</span>
                    <a href="#"><img src="https://via.placeholder.com/20" alt="Pinterest"></a>
                    <a href="#"><img src="https://via.placeholder.com/20" alt="Twitter"></a>
                    <a href="#"><img src="https://via.placeholder.com/20" alt="Facebook"></a>
                </div> --}}
                <h1>{{ $post->name }}</h1>
                <p>{{ date('F d, Y', strtotime($post->time)) }}</p>
                <p>
                    {!! $post->detail !!}
                </p>
            </div>
        </section>
    </main>

@endsection
