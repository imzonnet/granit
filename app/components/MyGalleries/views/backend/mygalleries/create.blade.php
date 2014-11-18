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
                        @if (!isset($mygallery))
                            <span class="hidden-480">Create New MyGallery</span>
                        @else
                            <span class="hidden-480">Edit MyGallery</span>
                        @endif
                    </h4>
                </div>
                <div class="widget-body form">
                    <div class="tabbable widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="widget_tab1">
                                <!-- BEGIN FORM-->
                                @if (!isset($mygallery))
                                {{ Form::open(array('route'=>$link_type . '.MyGalleries.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.MyGalleries.update', $mygallery->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                    @if ($errors->has())
                                         <div class="alert alert-error hide" style="display: block;">
                                           <button data-dismiss="alert" class="close">×</button>
                                           You have some form errors. Please check below.
                                        </div>
                                    @endif
                                    @if (isset($mygallery))
                                        {{ Form::hidden('id', $mygallery->id) }}
                                    @endif
                                    
                                     <div class="control-group {{{ $errors->has('product_code') ? 'error' : '' }}}">
                                        <label class="control-label">Code <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('product_code', (!isset($product)) ? Input::old('product_code') : $product->product_code, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('product_code', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                        <label class="control-label">Title <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('name', (!isset($product)) ? Input::old('name') : $product->name, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
 
                                    <div class="control-group {{{ $errors->has('alias') ? 'error' : '' }}}">
                                        <label class="control-label">Alias</label>
                                        <div class="controls">
                                            {{ Form::text('alias', (!isset($product)) ? Input::old('alias') : $product->alias, array('class' => 'input-xlarge'))}}
                                            <div class="help-inline">Leave blank for automatic alias</div>
                                            {{ $errors->first('alias', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('cat_id') ? 'error' : '' }}}">
                                        <label class="control-label">Category <span class="red">*</span></label>
                                        <div class="controls line">
                                            {{ Form::select('cat_id', $categories, (!isset($product)) ? Input::old('cat_id') : $product->cat_id, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ HTML::link("$link_type/product-categories/create", "Add Category", array('class'=>'btn btn-mini mb-15')) }}
                                            {{ $errors->first('cat_id', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('image') ? 'error' : '' }}}">
                                        <label class="control-label">Image <span class="red">*</span></label>
                                        <div class="controls">
                                            {{-- Form::file('image', array('class' => 'input-xlarge')) --}}
                                            {{ Form::hidden('image') }}
                                            <a class="btn btn-primary insert-media" id="insert-main-image" href="#"> Select main image</a>
                                            <span class="file-name">
                                                {{ $product->image or '' }}
                                            </span>
                                            {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls line">
                                            <a class="btn btn-primary insert-media" id="insert-media" href="#"> Insert Media</a>
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
                                        <label class="control-label">Description <span class="red">*</span></label>
                                        <div class="controls line">
                                           <textarea class="span12 ckeditor m-wrap" id="content" name="description" rows="6">{{ (!isset($product)) ? Input::old('description') : $product->description }}</textarea>
                                           {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    
                                    <div class="control-group {{{ $errors->has('price') ? 'error' : '' }}}">
                                        <label class="control-label">Price <span class="red">*</span></label>            
                                        <div class="controls line">
                                            <div class="input-append">
                                            {{Form::text('price', (!isset($product)) ? Input::old('price') : $product->price, array('class' => 'input-xlarge', 'placeholder' => '0.0'))}}
                                            <span class="add-on">$</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                        <label class="control-label">Status <span class="red">*</span></label>
                                        <div class="controls line">
                                            {{ Form::select('status', $status, (!isset($product)) ? Input::old('status') : $product->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Order</label>            
                                        <div class="controls line">
                                            {{Form::text('ordering', (!isset($product)) ? Input::old('alias') : $product->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
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
