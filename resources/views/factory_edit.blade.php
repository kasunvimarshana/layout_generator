@extends('layouts.home_layout')

@section('section_stylesheet')
    @parent
    <!-- ColourPicker -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" />
@endsection

@section('section_script_main')
    @parent
@endsection

@section('content')
<!-- row -->
<div class="row">
    
    <!-- col -->
    <div class="col-sm-12">
        
        <!-- accordion -->
        <div class="panel-group" id="accordion">
            
            <!-- panel -->
            <div id="collapseOneParent" class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#collapseOneParent" href="#collapseOne"><span class="glyphicon glyphicon-plus"></span> Edit Factory</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- --- -->
                        <!-- row -->
                        <div class="row">

                            <!-- col -->
                            <div class="col-sm-12">
                                <!-- form -->
                                <!-- urlencode(val) -->
                                <form action="{!! route('factory.update', ['factory' => $factory->name]) !!}" method="POST" class="col-sm-8" autocomplete="off" id="form1" enctype="multipart/form-data">
                                    @csrf
                                    <!-- form-group -->
                                    <div class="form-group col-sm-12">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <!-- p class="form-control-static"></p -->
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $factory->name }}" required/>
                                        </div>
                                        <!-- span id="form-control" class="help-block"></span -->
                                    </div>
                                    <!-- /.form-group -->
                                    
                                    <!-- form-group -->
                                    <div class="form-group col-sm-12">
                                        <label for="colour" class="col-sm-2 control-label">Colour</label>
                                        <div class="col-sm-10">
                                            <div id="colour_input_group" class="input-group colorpicker-component">
                                                <!-- p class="form-control-static"></p -->
                                                <input type="text" class="form-control" id="colour" name="colour" placeholder="Colour" value="{{ $factory->colour }}" required/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>
                                        <!-- span id="form-control" class="help-block"></span -->
                                    </div>
                                    <!-- /.form-group -->

                                    <!-- form-group -->
                                    <div class="form-group col-sm-12">
                                        <!-- btn-toolbar -->
                                        <div class="col col-sm-12">
                                            <!-- div class="btn-group btn-group-lg pull-right" -->
                                                <button type="submit" class="btn btn-primary pull-right" id="submit">Submit</button>
                                            <!-- /div -->
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                </form>
                                <!-- /.form -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                        <!-- --- -->
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.accordion -->
        
    </div>
    <!-- /.col -->
    
</div>
<!-- /.row -->
@endsection

@section('section_script')
    @parent
    <!-- ColourPicker -->
    <script src="{{ asset('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

    <script>
    $(function() {
        "use strict";
        
        var defaultColour_1 = "rgba(255, 255, 255, 1)";
        
        $("#colour_input_group").colorpicker({
            format: 'rgba',
            //color: "{{ old('colour') }}",
            //inline: false,
            //container: '#colour_input_group'
        });
        
        $("#colour_input_group").colorpicker('setValue', defaultColour_1);
        //$("#colour_input_group").colorpicker('setValue', "{!! old('colour') !!}");
        @isset($factory->colour)
            $("#colour_input_group").colorpicker('setValue', "{{ $factory->colour }}");
        @endisset
    });
    </script>
@endsection