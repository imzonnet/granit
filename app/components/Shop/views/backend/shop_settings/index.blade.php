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
                    <h4><i class="icon-reorder"></i>{{ trans('Shop::cms.shop.shop_settings') }}</h4>
                </div>
                <div class="widget-body form">
					{{ Form::open(array('route'=>$link_type . '.shop.settings.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
						<fieldset>
							<legend>{{ trans('Shop::cms.shop.paypal_api') }}</legend>
							<div class="control-group">
	                            <label class="control-label">{{ trans('Shop::cms.shop.pp_user') }}</label>
	                            <div class="controls">
	                            	<input type="text" name="shop_setting[pp_user]" value="<?php echo isset( $settings->pp_user ) ? $settings->pp_user : ''; ?>" /> 
	                            </div>
	                        </div>
	                        <div class="control-group">
	                            <label class="control-label">{{ trans('Shop::cms.shop.pp_password') }}</label>
	                            <div class="controls">
	                            	<input type="password" name="shop_setting[pp_password]" value="<?php echo isset( $settings->pp_password ) ? $settings->pp_password : ''; ?>" /> 
	                            </div>
	                        </div>
	                        <div class="control-group">
	                            <label class="control-label">{{ trans('Shop::cms.shop.pp_signature') }}</label>
	                            <div class="controls">
	                            	<input type="text" name="shop_setting[pp_signature]" value="<?php echo isset( $settings->pp_signature ) ? $settings->pp_signature : ''; ?>" /> 
	                            </div>
	                        </div>
	                        <div class="control-group">
	                            <label class="control-label">{{ trans('Shop::cms.shop.sandbox') }}</label>
	                            <div class="controls">
	                            	<?php 
	                            		$pp_sandbox_arr = array( 'No', 'Yes' );
	                            		foreach( $pp_sandbox_arr as $k => $sandbox_item ) :
											if( isset( $settings->pp_sandbox ) ) :
												$checked = ( $settings->pp_sandbox == $k ) ? 'checked' : '';
											else :
												$checked = ( $k == 1 ) ? 'checked' : '';
											endif;
									?>

		                            	<label style="display: inline-block; vertical-align: middle; margin-right: 10px;">
			                            	<input type="radio" name="shop_setting[pp_sandbox]" <?php echo $checked; ?> value="<?php echo $k; ?>" /> 
			                            	<?php echo $sandbox_item; ?>
			                            </label>

	                            	<?php 
	                            		endforeach; 
	                            	?>
	                            </div>
	                        </div>
	                        <div class="control-group">
	                        	<label class="control-label">{{ trans('Shop::cms.shop.currency_code') }}</label>
	                        	<div class="controls">
	                        		<?php 
	                        			$currencies = array(
											'AUD' => array(
												'label' => 'Australian Dollar',
												'format' => '$ %s',
											),
											'CAD' => array(
												'label' => 'Canadian Dollar',
												'format' => '$ %s',
											),
											'EUR' => array(
												'label' => 'Euro',
												'format' => '€ %s',
											),
											'GBP' => array(
												'label' => 'Pound Sterling',
												'format' => '£ %s',
											),
											'JPY' => array(
												'label' => 'Japanese Yen',
												'format' => '¥ %s',
											),
											'USD' => array(
												'label' => 'U.S. Dollar',
												'format' => '$ %s',
											),
											'NZD' => array(
												'label' => 'N.Z. Dollar',
												'format' => '$ %s',
											),
											'CHF' => array(
												'label' => 'Swiss Franc',
												'format' => '%s Fr',
											),
											'HKD' => array(
												'label' => 'Hong Kong Dollar',
												'format' => '$ %s',
											),
											'SGD' => array(
												'label' => 'Singapore Dollar',
												'format' => '$ %s',
											),
											'SEK' => array(
												'label' => 'Swedish Krona',
												'format' => '%s kr',
											),
											'DKK' => array(
												'label' => 'Danish Krone',
												'format' => '%s kr',
											),
											'PLN' => array(
												'label' => 'Polish Zloty',
												'format' => '%s zł',
											),
											'NOK' => array(
												'label' => 'Norwegian Krone',
												'format' => '%s kr',
											),
											'HUF' => array(
												'label' => 'Hungarian Forint',
												'format' => '%s Ft',
											),
											'CZK' => array(
												'label' => 'Czech Koruna',
												'format' => '%s Kč',
											),
											'ILS' => array(
												'label' => 'Israeli New Sheqel',
												'format' => '₪ %s',
											),
											'MXN' => array(
												'label' => 'Mexican Peso',
												'format' => '$ %s',
											),
											'BRL' => array(
												'label' => 'Brazilian Real',
												'format' => 'R$ %s',
											),
											'MYR' => array(
												'label' => 'Malaysian Ringgit',
												'format' => 'RM %s',
											),
											'PHP' => array(
												'label' => 'Philippine Peso',
												'format' => '₱ %s',
											),
											'TWD' => array(
												'label' => 'New Taiwan Dollar',
												'format' => 'NT$ %s',
											),
											'THB' => array(
												'label' => 'Thai Baht',
												'format' => '฿ %s',
											),
											'TRY' => array(
												'label' => 'Turkish Lira',
												'format' => 'TRY %s', // Unicode is ₺ but this doesn't seem to be widely supported yet (introduced Sep 2012)
											),
										);
									?>
	                        		<select name="shop_setting[pp_currencyCodeType]" class="form-control">
										<?php foreach( $currencies as $c_code => $c_item ){
											if( isset( $settings->pp_currencyCodeType ) ) {
												$selected = ( $c_code == $settings->pp_currencyCodeType ) ? 'selected' : '';
											}else{
												$selected = ( $c_code == 'USD' ) ? 'selected' : '';
											}
											echo '<option '. $selected .' value="'. $c_code .'">'. sprintf( $c_item['format'], $c_item['label'] ) .'</option>';
										} ?>
									</select>
	                        	</div>
	                        </div>
						</fieldset>
						<div class="form-actions">
                            <button class="btn btn-primary" type="submit">{{ trans('Shop::cms.shop.save') }}</button>
                        </div>
                    {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{ URL::to("assets/backend/default/plugins/data-tables/jquery.dataTables.js") }}"></script>
    <script type="text/javascript" src="{{ URL::to("assets/backend/default/plugins/data-tables/DT_bootstrap.js") }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @parent
    <script src="{{ URL::to('assets/backend/default/scripts/table-managed.js') }}"></script>
    <script>
       	jQuery(document).ready(function() {
          	TableManaged.init();
       	});
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop