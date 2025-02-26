@extends('client.master')
@section('title', 'about-us')

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <main id="content-wrapper" class="main-v2 text-body">
        <section class="container-fluid" id="about-us">
            <div class="row content mb-3">
                <div class="col-md-12 col-12 text-center px-0">
                    <!-- Container riêng cho hình ảnh và nội dung -->
                    <div class="image-content-container position-relative">
                        <!-- Hình ảnh -->
                        @if ($page->image != null)
                            <img src="{{ URL::route('storages.image', ['url' => $page->image]) }}"alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @else
                            <img src="{{ URL::asset('images/placeholder/600x400.png') }}" alt="Category Image"
                                class="img-fluid w-100 rounded">
                        @endif

                        {{-- <img src="{{ URL::asset('images/placeholder/600x400.png') }}" alt="Category Image"
                            class="img-fluid w-100 rounded"> --}}
                        <!-- Nội dung chữ nằm đè lên ảnh -->
                        <div class="overlay-content text-body py-5">
                            <p class="font-weight-bolder h3">{{ $page->name }}</p>
                            {{-- <p class="font-weight-bolder h3"> Comes standard with Metal Valance.</p> --}}
                            <p class="">
                                @if ($page->description)
                                    {{ $page->description }}
                                    </br>
                                @else
                                    The content is being updated.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                {!! $page->content !!}
            </div>

        </section>
    </main>

@endsection
