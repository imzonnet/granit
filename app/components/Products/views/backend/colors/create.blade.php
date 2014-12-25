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
                    <span class="hidden-480">Create New Category</span>
                    @else
                    <span class="hidden-480">Edit Category</span>
                    @endif
                </h4>
            </div>
            <div class="widget-body form">
                <div class="tabbable widget-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="widget_tab1">
                            <!-- BEGIN FORM-->
                            @if (!isset($color))
                            {{ Form::open(array('route'=>$link_type . '.product-colors.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @else
                            {{ Form::open(array('route' => array($link_type . '.product-colors.update', $color->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @endif

                            @if ($errors->has())
                            <div class="alert alert-error hide" style="display: block;">
                                <button data-dismiss="alert" class="close">×</button>
                                You have some form errors. Please check below.
                            </div>
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

                            <div class="control-group {{{ $errors->has('icon') ? 'error' : '' }}}">
                                <label class="control-label">Thumbnail <span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::hidden('icon', (!isset($color)) ? Input::old('icon') : $color->icon) }}
                                    <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select main image</a>
                                    <span class="file-name">
                                        {{ $color->icon or '' }}
                                        @if(isset($color))
                                        <img src="{{url($color->icon)}}" alt="" />
                                        @endif
                                    </span>
                                    {{ $errors->first('icon', '<span class="help-inline">:message</span>') }}
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
