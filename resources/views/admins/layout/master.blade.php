<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('admins/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('admins/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ URL::asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <!-- /fontawesome -->

    <!-- Core JS files -->
    <script src="{{ URL::asset('admins/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ URL::asset('admins/global_assets/js/plugins/forms/inputs/typeahead/handlebars.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/forms/inputs/alpaca/alpaca.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/forms/inputs/alpaca/price_format.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/ui/prism.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/tables/datatables/extensions/key_table.min.js') }}">
    </script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/notifications/noty.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/plugins/ui/dragula.min.js') }}"></script>

    <script src="{{ URL::asset('admins/assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/alpaca_advanced.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/datatables_extension_key_table.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/editor_ckeditor_material.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/colors_success.js') }}"></script>
    <script src="{{ URL::asset('admins/global_assets/js/demo_pages/components_collapsible.js') }}"></script>
    <!-- /theme JS files -->
    @yield('style')

    @livewireStyles
    @stack('style')

</head>

<body>
    <!-- Main navbar -->
    @include('admins.layout.navbar')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('admins.layout.sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">
                @yield('content')
            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    @livewireScripts
    @stack('script')
    @yield('scripts')

</body>

</html>
