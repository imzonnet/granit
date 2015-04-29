<div class="content-inner">
	<div class="content-inner-design-area">
		<center><img id="main-frame-image" src="" style="display: none;"/></center>
		<div class="layout-item-area text-align-center layout-firsttext-area" data-drag-off="true">
			<div class="layout-inner-area">
				<!-- first text -->
			</div>
		</div>
		<div class="main-layout-name-date-area">
			<div class="layout-item-area text-align-center layout-name-date-area" data-drag-off="true">
				<div class="layout-inner-area">
					<div class="nametext">
						<!-- name text -->
						<div class="text-inner"></div>
					</div>
					<div class="add_job_or_place">
						<!-- add job or place -->
						<div class="text-inner"></div>
					</div>
					<div class="datetext">
						<div class="birthdatetext">
							<!-- birth date text -->
						</div><!--
						--><div class="deathdatetext">
							<!-- death date text -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="layout-item-area text-align-center layout-memorialwords-area" data-drag-off="true">
			<div class="layout-inner-area">
				<div class="layout-memorialwords-area-item">
					<!-- memorial words -->
				</div>
			</div>
		</div>
		<div class="layout-item-area text-align-center layout-poem-area" data-drag-off="true">
			<div class="layout-inner-area">
				<div class="layout-poem-item">
					<!-- Poem -->
				</div>
			</div>
		</div>
		<div class="main-layout-accessories-area">
			
		</div>
	</div>
	@if(count($productcolors) > 0)
	<div class="content-product-color">
		<h4>Color</h4>
		<ul>
			@foreach($productcolors as $pcolor)
			<?php 
				if($pcolor->extra_field){
					$extra_field = json_decode($pcolor->extra_field);
					if(isset($extra_field->lineOne) && isset($extra_field->lineTwo)){
						$attr = "data-border-line='{$pcolor->extra_field}'";
					}
				}
			?>
			<li>
				<a class="choose-pcolor-js" href="javascript:" <?php echo (isset($attr))? $attr : ""; ?> data-pcolor-id="{{ $pcolor->id }}" data-pcolor-img="{{ $pcolor->image }}" data-price="{{ $pcolor->price }}" data-characteristic-price="{{ $pcolor->characteristic_price }}" data-name="{{ $pcolor->name }}">
					<!-- <img src="{{ $pcolor->thumbnail }}" title="{{ $pcolor->name }}" alt="{{ $pcolor->name }}"/> -->
					<img src="<?php echo Request::root().'/'; ?>{{ $pcolor->color->icon }}" title="{{ $pcolor->name }}" alt="{{ $pcolor->name }}"/>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>

<div class="total-price-content-layout">
	<p>{{trans('Stones::design.stones.design.total_price')}}</p>
	<h4>Kr. <span class="price-inner-num"></span></h4>
</div>
<div class="btn-next-step-control" id="btn-next-step-control-js">
	<span>{{trans('Stones::design.stones.design.add_text')}} >></span>
</div>