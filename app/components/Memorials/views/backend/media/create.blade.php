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
                        @if (!isset($media))
                            <span class="hidden-480">Create Media of {{$memorial->name}}</span>
                        @else
                            <span class="hidden-480">Edit Media of {{$memorial->name}}</span>
                        @endif
                    </h4>
                </div>
                <div class="widget-body form">
                    <div class="tabbable widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="widget_tab1">
                                <!-- BEGIN FORM-->
                                @if (!isset($media))
                                {{ Form::open(array('route'=> [$link_type . '.memorial.media.store', $memorial->id], 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.memorial.media.update', $memorial->id, $media->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                    @if ($errors->has())
                                         <div class="alert alert-error hide" style="display: block;">
                                           <button data-dismiss="alert" class="close">×</button>
                                           You have some form errors. Please check below.
                                        </div>
                                    @endif

                                    {{Form::hidden('memorial_id', $memorial->id)}}
                                    
                                    <div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
                                        <label class="control-label">Title <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('title', (!isset($media)) ? Input::old('title') : $media->title, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('media_type') ? 'error' : '' }}}">
                                        <label class="control-label">Type <span class="red">*</span></label>
                                        <div class="controls line">
                                            {{ Form::select('media_type', $type, (!isset($media)) ? Input::old('media_type') : $media->media_type, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ $errors->first('cat_id', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                        <label class="control-label">Image <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::hidden('image',(!isset($media)) ? Input::old('image') : $media->image) }}
                                            <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select main image</a>
                                            <span class="file-name">
                                                {{ $media->image or '' }}
                                            </span>
                                            {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('url') ? 'error' : '' }}}">
                                        <label class="control-label">Video URL <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('url', (!isset($media)) ? Input::old('url') : $media->url, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('url', '<span class="help-inline">:message</span>') }}
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
        jQuery(document).ready(function() {
            $('#datetimepicker_birthday').datetimepicker({
                language: 'en',
                pick12HourFormat: true
            });
            $('#datetimepicker_death').datetimepicker({
                language: 'en',
                pick12HourFormat: true
            });
        });

        MediaSelection.init('image');
    </script>
@stop
