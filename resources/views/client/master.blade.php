<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title')</title>

    <link rel="stylesheet" href="{{ URL::asset('view/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:100">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/font-face.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/header.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/style/css/logo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/noty-js/lib/noty.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('view/noty-js/lib/themes/nest.css') }}">

    <!-- Slider product -->
    <link rel="stylesheet" href="https://unpkg.com/jquery.flipster@1.1.2/dist/jquery.flipster.min.css">
    <!-- End slider pruduct -->
    <script src="{{ URL::asset('view/style/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('view/style/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.js') }}"></script>
    <script src="{{ URL::asset('view/style/ajax/libs/slick-carousel/1.6.0/slick.min.js') }}"></script>

    <!-- <link rel="stylesheet" href="style/slider/line/line.css"> -->
    @yield('style')
    @livewireStyles
    @stack('style')
</head>

<body>
    <header id="header" class="header">
        @include('client.header')
    </header>

    @yield('content')

    <footer class="mt-3 border-top border-dark">
        @include('client.footer')
    </footer>

    @include('client.search')
    @include('client.login')

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ URL::asset('view/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('view/style/js/custom.js') }}"></script>
    <script src="{{ URL::asset('view/style/js/header.js') }}"></script>
    {{-- <script src="{{ URL::asset('view/style/js/slider.js') }}"></script> --}}
    <script src="{{ URL::asset('view/noty-js/lib/noty.js') }}"></script>

    <script>
        Noty.overrideDefaults({
            theme: 'nest',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
    </script>

    @session('success')
    <script>
        new Noty({
            type: 'success',
            text: '{{ $value }}',
        }).show();
    </script>
    @endsession()

    @session('error')
    <script>
        new Noty({
            type: 'error',
            text: '{{ $value }}',
        }).show();
    </script>
    @endsession()

    @session('open-modal')
    <script>
        $('#{{ $value }}').modal('show');
    </script>
    @endif

    <script>
        $('.modal.fade').on('hidden.bs.modal', function() {
            if ($('.modal.fade.show').length > 0) {
                $('body').addClass('modal-open').css('padding-right', '15px');
            }
        });
    </script>

    @yield('script')
    @livewireScripts
    @stack('script')
</body>

</html>
