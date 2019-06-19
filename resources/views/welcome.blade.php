<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        
        <!-- Bootstrap --> 
        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"/>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/bower_components/font-awesome/css/font-awesome.min.css') }}"/>
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/bower_components/Ionicons/css/ionicons.min.css') }}"/>
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/dist/css/AdminLTE.min.css') }}"/>
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="{{ asset('node_modules/admin-lte/dist/css/skins/_all-skins.min.css') }}"/>
        <!-- Jquery Easy Loading -->
        <link rel="stylesheet" href="{{ asset('node_modules/jquery-easy-loading/dist/jquery.loading.min.css') }}"/>
        <!-- custom stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/custom_style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/custom_scrollbar.css') }}"/>
        
        <!-- jQuery 3 -->
        <script src="{{ asset('node_modules/admin-lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('node_modules/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('node_modules/admin-lte/dist/js/adminlte.min.js') }}"></script>
        <!-- pooper js -->
        <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
        <!-- bootbox -->
        <script src="{{ asset('node_modules/bootbox/dist/bootbox.min.js') }}"></script>
        <script src="{{ asset('node_modules/bootbox/dist/bootbox.locales.min.js') }}"></script>
        <!-- Moment -->
        <script src="{{ asset('node_modules/admin-lte/bower_components/moment/min/moment.min.js') }}"></script>
        <!-- InputMask -->
        <script src="{{ asset('node_modules/admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('node_modules/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
        <!-- Jquery Easy Loading -->
        <script src="{{ asset('node_modules/jquery-easy-loading/dist/jquery.loading.min.js') }}"></script>
        <!-- Bootstrap Validation -->
        <script src="{{ asset('node_modules/bootstrap-validator/dist/validator.min.js') }}"></script>
        
        <!-- *************************************************** -->
        <script src="{{ asset('node_modules/conva-length/dist/length.js') }}" charset="utf-8"></script>
        <script src="{{ asset('node_modules/konva/konva.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('node_modules/fabric/dist/fabric.js') }}" charset="utf-8"></script>
        <!-- *************************************************** -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
        </div>
    </body>
</html>
conva