@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN TABLE widget-->
            <div class="widget box light-grey">
                <div class="blue widget-title">
                    <h4><i class="icon-table"></i> {{ $font->title }}</h4>
                </div>
                <div class="widget-body">

                    <div class="form-horizontal">

                        @if ($font->image != '')
                            <div class="control-group">
                                <div class="controls line">{{ HTML::image($font->image, '', array('width'=> '400')) }}</div>
                            </div>
                        @endif

                        <div class="control-group">
                            <label class="control-label">URL</label>
                            <div class="controls line">
                                {{ Str::title($font->url) }}
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls line">
                                {{ Str::title($font->status) }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created By</label>
                            <div class="controls line">
                                {{ $font->author() }}
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!-- END TABLE widget-->
        </div>
    </div>
@stop
