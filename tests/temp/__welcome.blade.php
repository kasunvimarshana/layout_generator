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
            
            <!-- ========================================================================= -->
            <div id="container"></div>
            <!-- ========================================================================= -->
            
            <!-- ========================================================================= -->
            <!-- script>
                var width = window.innerWidth;
                var height = window.innerHeight;

                var stage = new Konva.Stage({
                    container: 'container',
                    width: width,
                    height: height
                });

                var layer = new Konva.Layer();
                stage.add(layer);

                var text = new Konva.Text({
                    x: 50,
                    y: 70,
                    fontSize: 30,
                    text: 'Rotate me',
                    draggable: true
                });
                layer.add(text);

                var tr1 = new Konva.Transformer({
                    node: text,
                    centeredScaling: true,
                    rotationSnaps: [0, 90, 180, 270],
                    resizeEnabled: false
                });
                layer.add(tr1);

                layer.draw();
            </script -->
            <!-- ========================================================================= -->
            
            <!-- ========================================================================= -->
            <script>
                var width = window.innerWidth;
                var height = window.innerHeight;

                var stage = new Konva.Stage({
                    container: 'container',
                    width: width,
                    height: height
                });

                var layer = new Konva.Layer();

                var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple'];

                for (var i = 0; i < 6; i++) {
                    var box = new Konva.Rect({
                        x: i * 30 + 50,
                        y: i * 18 + 40,
                        fill: colors[i],
                        stroke: 'black',
                        strokeWidth: 4,
                        draggable: true,
                        width: 100,
                        height: 50
                    });

                    box.on('dragstart', function() {
                        this.moveToTop();
                        layer.draw();
                    });

                    box.on('dragmove', function() {
                        document.body.style.cursor = 'pointer';
                    });
                    /*
                    * dblclick to remove box for desktop app
                    * and dbltap to remove box for mobile app
                    */
                    box.on('dblclick dbltap', function() {
                        this.destroy();
                        layer.draw();
                    });

                    box.on('mouseover', function() {
                        document.body.style.cursor = 'pointer';
                    });
                    box.on('mouseout', function() {
                        document.body.style.cursor = 'default';
                    });
                    
                    layer.add(box);
                    
                    var transformerObj = new Konva.Transformer({
                        node: box,
                        centeredScaling: true,
                        rotationSnaps: [0, 90, 180, 270],
                        resizeEnabled: false
                    });

                    layer.add(transformerObj);
                }

                // add the layer to the stage
                stage.add(layer);
                
                /////////////////////////////////////////
                /*document.getElementById('up').addEventListener(
                    'click',
                    function() {
                        box.moveUp();
                        layer.draw();
                    },
                    false
                );*/
                /////////////////////////////////////////
            </script>
            <!-- ========================================================================= -->
            
        </div>
    </body>
</html>