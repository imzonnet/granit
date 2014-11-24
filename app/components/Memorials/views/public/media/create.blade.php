<p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-media">Submit Media</button></p>
<div class="modal fade" id="form-media" tabindex="-1" role="dialog" aria-labelledby="Submit Media" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">New Guestbook</h4>
            </div>
            <div class="modal-body contact-form">
                <!-- BEGIN FORM-->
                <div class="box error-box fx animated fadeInLeft" style="display: none"></div>
                {{Form::hidden('memorial_id', $memorial->id)}}

                <div class="form-input">
                    <label class="control-label">Title <span class="red">*</span></label>
                    <div class="controls">
                        {{ Form::text('title', (!isset($media)) ? Input::old('title') : $media->title, array('class' => 'input-xlarge'))}}
                        {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>

                <div class="form-input">
                    <label class="control-label">Type <span class="red">*</span></label>
                    <div class="controls line">
                        {{ Form::select('media_type', $media_type, (!isset($media)) ? Input::old('media_type') : $media->media_type, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                        {{ $errors->first('cat_id', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>

                <div class="form-input media-image">
                    <label class="control-label">Image <span class="red">*</span></label>
                    <div class="controls">
                        {{ Form::file('name', array('id' => 'image')); }}
                        {{ $errors->first('image', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>

                <div class="form-input media-video">
                    <label class="control-label">Video URL <span class="red">*</span></label>
                    <div class="controls">
                        {{ Form::text('url', (!isset($media)) ? Input::old('url') : $media->url, array('class' => 'input-xlarge'))}}
                        {{ $errors->first('url', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-media">Save</button>
            </div>
        </div>
    </div>
</div>