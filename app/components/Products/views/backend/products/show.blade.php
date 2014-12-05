@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN TABLE widget-->
            <div class="widget box light-grey">
                <div class="blue widget-title">
                    <h4><i class="icon-table"></i> {{ $product->title }}</h4>
                </div>
                <div class="widget-body">

                    <div class="form-horizontal">

                        @if ($product->thumbnail != '')
                            <div class="control-group">
                                <div class="controls line">{{ HTML::image($product->thumbnail, '', array('max-width'=> '400')) }}</div>
                            </div>
                        @endif

                        <div class="control-group">
                            <label class="control-label">Alias</label>
                            <div class="controls line">
                                {{ $product->alias }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls line">
                                {{ $product->description }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls line">
                                {{ Str::title($product->status) }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created By</label>
                            <div class="controls line">
                                {{ $product->author() }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Created At</label>
                            <div class="controls line">
                                {{ $product->created_at }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Updated At</label>
                            <div class="controls line">
                                {{ $product->updated_at }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END TABLE widget-->
        </div>
    </div>
@stop
