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
                    @if (!isset($block))
                    <span class="hidden-480">Create New Block</span>
                    @else
                    <span class="hidden-480">Edit Block</span>
                    @endif
                </h4>
            </div>
            <div class="widget-body form">
                <div class="tabbable widget-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="widget_tab1">
                            <!-- BEGIN FORM-->
                            @if (!isset($block))
                            {{ Form::open(array('route'=>$link_type . '.block.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @else
                            {{ Form::open(array('route' => array($link_type . '.block.update', $block->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @endif

                            @if ($errors->has())
                            <div class="alert alert-error hide" style="display: block;">
                                <button data-dismiss="alert" class="close">×</button>
                                You have some form errors. Please check below.
                            </div>
                            @endif
                            @if (isset($block))
                            {{ Form::hidden('id', $block->id) }}
                            {{ Form::hidden('translate_id', $block->translates()->first()->id) }}
                            @endif

                            <div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
                                <label class="control-label">Block Title</label>
                                <div class="controls">
                                    {{ Form::text('title', (!isset($block)) ? Input::old('title') : $block->translates()->first()->title, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
                                <label class="control-label">Block Info<span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::text('info', (!isset($block)) ? Input::old('info') : $block->info, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('info', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
                                <label class="control-label">Block Description <span class="red">*</span></label>
                                <div class="controls line">
                                    <textarea class="span12 ckeditor m-wrap" id="content" name="description" rows="6">{{ (!isset($block)) ? Input::old('description') : $block->translates()->first()->description }}</textarea>
                                    {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('region') ? 'error' : '' }}}">
                                <label class="control-label">Region <span class="red">*</span></label>
                                <div class="controls line">
                                    {{ Form::select('region', $regions, (!isset($block)) ? Input::old('region') : $block->region, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                    {{ $errors->first('region', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('visibility') ? 'error' : '' }}}">
                                <label class="control-label">Visibility <span class="red">*</span></label>
                                <div class="controls line">
                                    {{ Form::select('visibility', ['All pages except those listed', 'Only the listed pages'], (!isset($block)) ? Input::old('visibility') : $block->visibility, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                    {{ $errors->first('visibility', '<span class="help-inline">:message</span>') }}
                                </div>
                                <div class="controls line">
                                    <textarea class="span12 m-wrap" id="pages" name="pages" rows="6">{{ (!isset($block)) ? Input::old('pages') : $block->pages }}</textarea>
                                    <small>Specify pages by using their paths. Enter one path per line.</small>
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                <label class="control-label">Status <span class="red">*</span></label>
                                <div class="controls line">
                                    {{ Form::select('status', $status, (!isset($block)) ? Input::old('status') : $block->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                    {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Order</label>
                                <div class="controls line">
                                    {{Form::text('order', !isset($block) ? Input::old('order') : $block->order, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Language</label>
                                <div class="controls line">
                                    <input type="text" disabled="disabled" value="{{ isset($block) ? $block->translates()->first()->language : current_language() }}" />
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

    MediaSelection.init('image');
</script>
@stop
