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
                        @if (!isset($translate))
                            <span class="hidden-480">Create New Translate</span>
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
                                {{ Form::open(array('route' => array($link_type . '.product-colors.translate.update', $category->id, $lang), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}

                                <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                    <label class="control-label">Title <span class="red">*</span></label>
                                    <div class="controls">
                                        {{ Form::text('name',  trans_get($category, $lang, 'name') , array('class' => 'input-xlarge'))}}
                                        {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" name="form_save">Save</button>
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
        MediaSelection.init('filter_image');
    </script>
@stop
