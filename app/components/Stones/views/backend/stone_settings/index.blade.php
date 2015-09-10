@section('styles')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ URL::to('assets/backend/default/plugins/data-tables/DT_bootstrap.css') }}" />
    <!-- END PAGE LEVEL STYLES -->
@stop

@section('content')
	<div class="row-fluid">
		<div class="span12">
			<div class="widget light-gray box">
				<div class="blue widget-title">
                    <h4><i class="icon-reorder"></i> Stone Settings</h4>
                </div>
                <div class="widget-body form">
					{{ Form::open(array('route'=>$link_type . '.stones.stone-settings.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
						<fieldset>
							<legend>General settings</legend>
							<div class="control-group">
	                            <label class="control-label">Youtube Embed</label>
	                            <div class="controls">
	                            	<textarea style="width: 50%;height: 100px" name="stone_setting[youtube_embed]" class="input-large"><?php echo isset( $settings->youtube_embed ) ? $settings->youtube_embed : ''; ?></textarea> 
	                            </div>
	                        </div>
						</fieldset>
						<div class="form-actions">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop