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
                        @if (!isset($category))
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
                                @if (!isset($category))
                                {{ Form::open(array('route'=>$link_type . '.stones.icon-categories.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.stones.icon-categories.update', $category->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                    @if ($errors->has())
                                         <div class="alert alert-error hide" style="display: block;">
                                           <button data-dismiss="alert" class="close">×</button>
                                           You have some form errors. Please check below.
                                        </div>
                                    @endif

                                    @if (isset($category))
                                        {{ Form::hidden('id', $category->id) }}
                                    @endif
                                    
                                    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                        <label class="control-label">Title <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('name', (!isset($category)) ? Input::old('name') : $category->name, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
 
                                    <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                        <label class="control-label">Image <span class="red">*</span></label>
                                        <div class="controls">
                                            {{-- Form::file('image', array('class' => 'input-xlarge')) --}}
                                            {{ Form::hidden('image') }}
                                            <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select main image</a>
                                            <span class="file-name">
                                                {{ $category->image or '' }}
                                            </span>
                                            {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
                                        <label class="control-label">Description <span class="red">*</span></label>
                                        <div class="controls line">
                                           <textarea class="span12 ckeditor m-wrap" id="content" name="description" rows="6">{{ (!isset($category)) ? Input::old('description') : $category->description }}</textarea>
                                           {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                        
                                    <div class="control-group {{{ $errors->has('prent_id') ? 'error' : '' }}}">
                                        <label class="control-label">Prent </label>
                                        <div class="controls line">
                                            {{ Form::select('prent_id', $prent_id, (!isset($category)) ? Input::old('prent_id') : $category->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ $errors->first('prent_id', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                        <label class="control-label">Status <span class="red">*</span></label>
                                        <div class="controls line">
                                            {{ Form::select('status', $status, (!isset($category)) ? Input::old('status') : $category->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    

                                    <div class="control-group">
                                        <label class="control-label">Order</label>            
                                        <div class="controls line">
                                            {{Form::text('ordering', (!isset($category)) ? Input::old('ordering') : $category->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
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
            $('#datetimepicker_start').datetimepicker({
                language: 'en',
                pick12HourFormat: false
            });
            $('#datetimepicker_end').datetimepicker({
                language: 'en',
                pick12HourFormat: false
            });
        });

        MediaSelection.init('image');
    </script>
@stop
