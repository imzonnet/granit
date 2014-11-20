@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN TABLE widget-->
            <div class="widget box light-grey">
                <div class="blue widget-title">
                    <h4><i class="icon-table"></i> {{ $memorial->name }}</h4>
                </div>
                <div class="widget-body">

                    <div class="form-horizontal">
                        @if ($memorial->avatar != '')
                            <div class="control-group">
                                <div class="controls line">{{ HTML::image($memorial->avatar, '') }}</div>
                            </div>
                        @endif
                        
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls line">
                                {{ $memorial->name }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Birthday</label>
                            <div class="controls line">
                                {{ $memorial->birthday }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Death</label>
                            <div class="controls line">
                                {{ $memorial->death }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Biography</label>
                            <div class="controls line">
                                {{ $memorial->biography }}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Obituary</label>
                            <div class="controls line">
                                {{ $memorial->obituary }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created By</label>
                            <div class="controls line">
                                {{ $memorial->author() }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created At</label>
                            <div class="controls line">
                                {{ $memorial->created_at }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Updated At</label>
                            <div class="controls line">
                                {{ $memorial->updated_at }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END TABLE widget-->
        </div>
    </div>
@stop
