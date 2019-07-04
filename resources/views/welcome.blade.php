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
                    height: height,
                    scale: {
                        x: 1, 
                        y: 1
                    }
                });
                
                stage.getContainer().style.backgroundColor = 'red';

                var layer = new Konva.Layer({
                    scale: {
                        x: 3, 
                        y: 3
                    }
                });
                
                //stage.add(layer);
                
                //////////////////////////////////////////////////////////////////////////////////////////////////
                var boxObjCanvas = new Konva.Rect({
                        x: (width / 2),
                        y: (height / 2),
                        fill: 'rgba(100, 50, 200, 0.6)',
                        stroke: 'black',
                        strokeWidth: 4,
                        draggable: true,
                        width: 900,
                        height: 900
                    });
                
                layer.add(boxObjCanvas);
                
                //boxObjCanvas.toCanvas();
                //////////////////////////////////////////////////////////////////////////////////////////////////

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

              var rect = new Konva.Rect({
                x: 160,
                y: 60,
                width: 100,
                height: 90,
                fill: 'red',
                name: 'rect',
                stroke: 'black',
                draggable: true
              });
              layer.add(rect);

              var MAX_WIDTH = 200;
              // create new transformer
              var tr = new Konva.Transformer({
                boundBoxFunc: function(oldBoundBox, newBoundBox) {
                  // "boundBox" is an object with
                  // x, y, width, height and rotation properties
                  // transformer tool will try to fit node into that box
                  // "width" property here is a visible width of the object
                  // so it equals to rect.width() * rect.scaleX()

                  // the logic is simple, if new width is too big
                  // we will return previous state
                  if (Math.abs(newBoundBox.width) > MAX_WIDTH) {
                    return oldBoundBox;
                  }

                  return newBoundBox;
                }
              });
              layer.add(tr);
              tr.attachTo(rect);
              layer.draw();
            </script -->
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

              var rect = new Konva.Rect({
                x: 160,
                y: 60,
                width: 100,
                height: 90,
                fill: 'red',
                name: 'rect',
                stroke: 'black',
                draggable: true
              });
              layer.add(rect);

              var MAX_WIDTH = 200;
              // create new transformer
              var tr = new Konva.Transformer({
                keepRatio: true,
                boundBoxFunc: function(oldBoundBox, newBoundBox) {
                  // "boundBox" is an object with
                  // x, y, width, height and rotation properties
                  // transformer tool will try to fit node into that box
                  // "width" property here is a visible width of the object
                  // so it equals to rect.width() * rect.scaleX()

                  // the logic is simple, if new width is too big
                  // we will return previous state
                  if (Math.abs(newBoundBox.width) > MAX_WIDTH) {
                    return oldBoundBox;
                  }

                  return newBoundBox;
                }
              });
              layer.add(tr);
              tr.attachTo(rect);
              layer.draw();
                
            /////////////////////////////////////////////////////////////////////////////////////
            var button = new Konva.Group({
                x: stage.width() / 2,
                y: stage.height() / 2
            });

            var offset = 10;
            var text = new Konva.Text({
                x: offset,
                y: offset,
                text: 'press me!',
                // as we don't really need text on hit graph we can set:
                listening: false
            });
            var buttonRect = new Konva.Rect({
                width: text.width() + offset * 2,
                height: text.height() + offset * 2,
                fill: 'grey',
                shadowColor: 'black'
            });
            button.add(buttonRect, text);

            button.on('click tap', function() {
                alert('button clicked');
            });

            layer.add(button);
            //stage.add(layer);
            /////////////////////////////////////////////////////////////////////////////////////
                
              
            var text = new Konva.Text({
                x: 5,
                y: 5
            });
            layer.add(text);
            updateText();
                
            rect.on('transformstart', function() {
                console.log('transform start');
            });

            rect.on('dragmove', function() {
                updateText();
            });
            rect.on('transform', function() {
                updateText();
                console.log('transform');
            });

            rect.on('transformend', function() {
                console.log('transform end');
            });

            function updateText() {
                var lines = [
                    'x: ' + rect.x(),
                    'y: ' + rect.y(),
                    'rotation: ' + rect.rotation(),
                    'width: ' + rect.width(),
                    'height: ' + rect.height(),
                    'scaleX: ' + rect.scaleX(),
                    'scaleY: ' + rect.scaleY()
                ];
                text.text(lines.join('\n'));
                layer.batchDraw();
            }
            
            /*
            function downloadURI(uri, name) {
                var link = document.createElement('a');
                link.download = name;
                link.href = uri;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                delete link;
            }
                
            document.getElementById('save').addEventListener(
                'click',
                function() {
                    var dataURL = stage.toDataURL({ pixelRatio: 3 });
                    downloadURI(dataURL, 'stage.png');
                },
                false
            );
            */
            </script -->
            <!-- ========================================================================= -->
            
        </div>
    </body>
</html>