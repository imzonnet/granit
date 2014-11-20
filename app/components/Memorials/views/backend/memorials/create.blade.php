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
                        @if (!isset($memorial))
                            <span class="hidden-480">Create Memorial</span>
                        @else
                            <span class="hidden-480">Edit Memorial</span>
                        @endif
                    </h4>
                </div>
                <div class="widget-body form">
                    <div class="tabbable widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="widget_tab1">
                                <!-- BEGIN FORM-->
                                @if (!isset($memorial))
                                {{ Form::open(array('route'=>$link_type . '.memorials.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.memorials.update', $memorial->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                    @if ($errors->has())
                                         <div class="alert alert-error hide" style="display: block;">
                                           <button data-dismiss="alert" class="close">×</button>
                                           You have some form errors. Please check below.
                                        </div>
                                    @endif

                                    @if (isset($memorial))
                                        {{ Form::hidden('id', $memorial->id) }}
                                    @endif
                                    
                                    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                        <label class="control-label">Name <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('name', (!isset($memorial)) ? Input::old('name') : $memorial->name, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                        <label class="control-label" {{ (isset($memorial)) ? 'style="line-height: 65px;"' : '' }}>Avatar <span class="red">*</span></label>
                                        <div class="controls">
                                            {{-- Form::file('image', array('class' => 'input-xlarge')) --}}
                                            {{ Form::hidden('image', (!isset($memorial)) ? Input::old('image') : $memorial->avatar) }}
                                            <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select main image</a>
                                            <span class="file-name">
                                                {{ $memorial->avatar or '' }}
                                            </span>
                                            @if($memorial)
                                            <img src='{{url($memorial->avatar)}}' width="120" height="150" />
                                            @endif
                                            {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('birthday') ? 'error' : '' }}}">
                                        <label class="control-label">Birthday <span class="red">*</span></label>
                                        <div class="controls line">
                                            <div id="datetimepicker_birthday" class="input-append">
                                                {{ Form::text('birthday', (!isset($memorial)) ? '' : $memorial->birthday, array('data-format'=>'yyyy-MM-dd hh:mm:ss', 'placeholder' => 'yyyy-MM-dd hh:mm:ss')) }}
                                                <span class="add-on">
                                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                    </i>
                                                </span>
                                            </div>
                                            {{ $errors->first('birthday', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                     
                                    <div class="control-group {{{ $errors->has('death') ? 'error' : '' }}}">
                                        <label class="control-label">Death <span class="red">*</span></label>
                                        <div class="controls line">
                                            <div id="datetimepicker_death" class="input-append">
                                                {{ Form::text('death', (!isset($memorial)) ? '' : $memorial->death, array('data-format'=>'yyyy-MM-dd hh:mm:ss', 'placeholder' => 'yyyy-MM-dd hh:mm:ss')) }}
                                                <span class="add-on">
                                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                    </i>
                                                </span>
                                            </div>
                                            {{ $errors->first('death', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="control-group {{{ $errors->has('biography') ? 'error' : '' }}}">
                                        <label class="control-label">Biography <span class="red">*</span></label>
                                        <div class="controls line">
                                           <textarea class="span12 ckeditor m-wrap" id="content" name="biography" rows="6">{{ (!isset($memorial)) ? Input::old('biography') : $memorial->biography }}</textarea>
                                           {{ $errors->first('biography', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('obituary') ? 'error' : '' }}}">
                                        <label class="control-label">Obituary <span class="red">*</span></label>
                                        <div class="controls line">
                                           <textarea class="span12 ckeditor m-wrap" id="content" name="obituary" rows="6">{{ (!isset($memorial)) ? Input::old('obituary') : $memorial->obituary }}</textarea>
                                           {{ $errors->first('obituary', '<span class="help-inline">:message</span>') }}
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
