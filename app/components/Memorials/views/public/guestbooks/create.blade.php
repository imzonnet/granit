<p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-guestbook">Sign Guest Book</button></p>
<div class="modal fade" id="form-guestbook" tabindex="-1" role="dialog" aria-labelledby="Sign Guest Book" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">New Guestbook</h4>
            </div>
            <div class="modal-body contact-form">
                <!-- BEGIN FORM-->
                <div class="box error-box fx animated fadeInLeft" style="display: none">
                    
                </div>
                {{Form::hidden('memorial_id', $memorial->id)}}

                <div class="form-input {{{ $errors->has('title') ? 'error' : '' }}}">
                    <label class="control-label">Title <span class="red">*</span></label>
                    <div class="controls">
                        {{ Form::text('title', (!isset($guestbook)) ? Input::old('title') : $guestbook->title, array('class' => 'input-xlarge'))}}
                        {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>

                <div class="form-input {{{ $errors->has('content') ? 'error' : '' }}}">
                    <label class="control-label">Content <span class="red">*</span></label>
                    <div class="controls line">
                        <textarea class="span12 ckeditor m-wrap" id="content" name="content" rows="6">{{ (!isset($guestbook)) ? Input::old('content') : $guestbook->content }}</textarea>
                        {{ $errors->first('content', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-guestbook">Save changes</button>
            </div>
        </div>
    </div>
</div>