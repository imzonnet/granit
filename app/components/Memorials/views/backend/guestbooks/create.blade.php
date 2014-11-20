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
                        @if (!isset($guestbook))
                            <span class="hidden-480">Create Guestbook of {{$memorial->name}}</span>
                        @else
                            <span class="hidden-480">Edit Guestbook of {{$memorial->name}}</span>
                        @endif
                    </h4>
                </div>
                <div class="widget-body form">
                    <div class="tabbable widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="widget_tab1">
                                <!-- BEGIN FORM-->
                                @if (!isset($guestbook))
                                {{ Form::open(array('route'=> [$link_type . '.memorial.guestbooks.store', $memorial->id], 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.memorial.guestbooks.update', $memorial->id, $guestbook->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
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
                                            {{ Form::text('title', (!isset($guestbook)) ? Input::old('title') : $guestbook->title, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('content') ? 'error' : '' }}}">
                                        <label class="control-label">Content <span class="red">*</span></label>
                                        <div class="controls line">
                                           <textarea class="span12 ckeditor m-wrap" id="content" name="content" rows="6">{{ (!isset($guestbook)) ? Input::old('content') : $guestbook->content }}</textarea>
                                           {{ $errors->first('content', '<span class="help-inline">:message</span>') }}
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
