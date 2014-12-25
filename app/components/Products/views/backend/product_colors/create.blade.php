@section('styles')
{{ HTML::style('assets/backend/default/plugins/bootstrap/css/bootstrap-modal.css') }}
{{ HTML::style('assets/backend/default/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('assets/backend/default/plugins/jquery-ui/jquery-ui.css') }}
@stop

@section('content')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN FORM widget-->
        <div class="widget box blue tabbable">
            <div class="blue widget-title">
                <h4>
                    <i class="icon-user"></i>
                    @if (!isset($color))
                    <span class="hidden-480">Create New Color</span>
                    @else
                    <span class="hidden-480">Edit Color</span>
                    @endif
                </h4>
            </div>
            <div class="widget-body form">
                <div class="tabbable widget-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="widget_tab1">
                            <!-- BEGIN FORM-->
                            @if (!isset($color))
                            {{ Form::open(array('route'=> [$link_type . '.product.colors.store', $product->id], 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @else
                            {{ Form::open(array('route' => [$link_type . '.product.colors.update', $product->id, $color->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @endif

                            @if ($errors->has())
                            <div class="alert alert-error hide" style="display: block;">
                                <button data-dismiss="alert" class="close">×</button>
                                You have some form errors. Please check below.
                            </div>
                            @endif
                            @if (isset($product))
                            {{ Form::hidden('product_id', $product->id) }}
                            @endif
                            @if (isset($color))
                            {{ Form::hidden('id', $color->id) }}
                            @endif

                            <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                <label class="control-label">Title <span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::text('name', (!isset($color)) ? Input::old('name') : $color->name, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>
                            <div class="control-group {{{ $errors->has('color_id') ? 'error' : '' }}}">
                                <label class="control-label">Color <span class="red">*</span></label>
                                <div class="controls">
                                    {{Form::select('color_id', $color_list, (!isset($color)) ? Input::old('color_id') : $color->color_id)}}
                                    {{ $errors->first('color_id', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>
                            <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                <label class="control-label">Image <span class="red">*</span></label>
                                <div class="controls">
                                    {{-- Form::file('image', array('class' => 'input-xlarge')) --}}
                                    {{ Form::hidden('image',(!isset($color)) ? Input::old('image') : $color->image) }}
                                    <a class="btn btn-primary insert-media" data-field-name='image' id="insert-main-image" href="#"> Select main image</a>
                                    <span class="file-name">
                                        {{ $color->image or '' }}
                                        @if(isset($color))
                                        <img src="{{url($color->image)}}" alt="" width="50px" height="50px" />
                                        @endif
                                    </span>
                                    {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('price') ? 'error' : '' }}}">
                                <label class="control-label">Price <span class="red">*</span></label>            
                                <div class="controls line">
                                    <div class="input-prepend">
                                        <span class="add-on">$</span>
                                        {{Form::text('price', (!isset($color)) ? Input::old('price') : $color->price, array('class' => 'input-xlarge', 'placeholder' => '0.0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group {{{ $errors->has('sale') ? 'error' : '' }}}">
                                <label class="control-label">Sale <span class="red">*</span></label>            
                                <div class="controls line">
                                    <div class="input-append">
                                        {{Form::text('sale', (!isset($color)) ? Input::old('sale') : $color->sale, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
                                        <span class="add-on">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group {{{ $errors->has('characteristic_price') ? 'error' : '' }}}">
                                <label class="control-label">Characteristic Price <span class="red">*</span></label>            
                                <div class="controls line">
                                    <div class="input-prepend">
                                        <span class="add-on">$</span>
                                        {{Form::text('characteristic_price', (!isset($color)) ? Input::old('characteristic_price') : $color->characteristic_price, array('class' => 'input-xlarge', 'placeholder' => '0.0'))}}
                                    </div>
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                <label class="control-label">Status <span class="red">*</span></label>
                                <div class="controls line">
                                    {{ Form::select('status', $status, (!isset($color)) ? Input::old('status') : $color->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                    {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Order</label>            
                                <div class="controls line">
                                    {{Form::text('ordering', (!isset($color)) ? Input::old('alias') : $color->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="form_save">Save</button>

                                <button type="submit" class="btn btn-success" name="form_save_new">Save &amp; New</button>

                                <button type="submit" class="btn btn-primary btn-danger" name="form_close">Close</button>
                            </div>
                            {{ Form::close() }}
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FORM widget-->
    </div>
</div>
@stop

@section('scripts')
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modalmanager.js') }}
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modal.js') }}
{{ HTML::script("assets/backend/default/plugins/ckeditor/ckeditor.js") }}
{{ HTML::script("assets/backend/default/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") }}
{{ HTML::script("assets/backend/default/scripts/media-selection.js") }}
@parent
<script>
    jQuery(document).ready(function () {
        $('#datetimepicker_start').datetimepicker({
            language: 'en',
            pick12HourFormat: false
        });
        $('#datetimepicker_end').datetimepicker({
            language: 'en',
            pick12HourFormat: false
        });
    });
    MediaExp.init();
</script>
@stop
