@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN TABLE widget-->
            <div class="widget box light-grey">
                <div class="blue widget-title">
                    <h4><i class="icon-table"></i> {{ $media->title }}</h4>
                </div>
                <div class="widget-body">

                    <div class="form-horizontal">

                        <div class="control-group">
                            <label class="control-label">Type</label>
                            <div class="controls line">
                                {{ $media->media_type }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Image</label>
                            <div class="controls line">
                                {{ $media->image }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Video URL</label>
                            <div class="controls line">
                                {{ $media->url }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created By</label>
                            <div class="controls line">
                                {{ $media->author() }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created At</label>
                            <div class="controls line">
                                {{ $media->created_at }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Updated At</label>
                            <div class="controls line">
                                {{ $media->updated_at }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END TABLE widget-->
        </div>
    </div>
@stop
