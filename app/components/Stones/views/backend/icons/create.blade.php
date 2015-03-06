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
                        @if (!isset($icon))
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
                                @if (!isset($icon))
                                    {{ Form::open(array('route'=>$link_type . '.stones.icons.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                    {{ Form::open(array('route' => array($link_type . '.stones.icons.update', $icon->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                @if ($errors->has())
                                    <div class="alert alert-error hide" style="display: block;">
                                        <button data-dismiss="alert" class="close">×</button>
                                        You have some form errors. Please check below.
                                    </div>
                                @endif

                                @if (isset($icon))
                                    {{ Form::hidden('id', $icon->id) }}
                                @endif

                                <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                    <label class="control-label">Title <span class="red">*</span></label>

                                    <div class="controls">
                                        {{ Form::text('name', (!isset($icon)) ? Input::old('name') : $icon->name, array('class' => 'input-xlarge'))}}
                                        {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                    <label class="control-label">Image <span class="red">*</span></label>

                                    <div class="controls">
                                        {{-- Form::file('image', array('class' => 'input-xlarge')) --}}
                                        {{ Form::hidden('image', (!isset($icon)) ? Input::old('image') : $icon->image) }}
                                        <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select
                                            main image</a>
                                            <span class="file-name">
                                                {{ $icon->image or '' }}
                                            </span>
                                        {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="control-group {{{ $errors->has('customize') ? 'error' : '' }}}">
                                    <label class="control-label">Customize <span class="red">*</span></label>

                                    <div class="controls">
                                        {{ Form::checkbox('customize', 1, (  !isset($icon) ? Input::old('customize') : $icon->customize ) == 1 ? true : false,array('class' => 'input-xlarge'))}}
                                        {{ $errors->first('customize', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="control-group {{{ $errors->has('price') ? 'error' : '' }}}">
                                    <label class="control-label">Price <span class="red">*</span></label>

                                    <div class="controls line">
                                        {{ Form::text('price', (!isset($icon)) ? Input::old('price') : $icon->price, array('class' => 'input-xlarge', 'placeholder' => '10.00')) }}
                                        {{ $errors->first('price', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="control-group {{{ $errors->has('cat_id') ? 'error' : '' }}}">
                                    <label class="control-label">Icon category <span class="red">*</span></label>

                                    <div class="controls line">
                                        {{ Form::select('cat_id', $categories, (!isset($icon)) ? Input::old('cat_id') : $icon->cat_id, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                        <a href="{{URL::route($link_type .'.stones.icon-categories.create')}}"
                                           class="btn btn-mini mb-15">Create categories</a>
                                        {{ $errors->first('cat_id', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                    <label class="control-label">Status <span class="red">*</span></label>

                                    <div class="controls line">
                                        {{ Form::select('status', $status, (!isset($icon)) ? Input::old('status') : $icon->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                        {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Order</label>

                                    <div class="controls line">
                                        {{Form::text('ordering', (!isset($icon)) ? Input::old('ordering') : $icon->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary" name="form_save">Save</button>

                                    <button type="submit" class="btn btn-success" name="form_save_new">Save &amp; New
                                    </button>

                                    <button type="submit" class="btn btn-primary btn-danger" name="form_close">Close
                                    </button>
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

        MediaSelection.init('image');
    </script>
@stop
