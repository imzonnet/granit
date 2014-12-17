<div class="content-inner">
	<div class="content-inner-design-area">
		<center><img id="main-frame-image" src="" style="display: none;"/></center>
		<div class="layout-item-area text-align-center layout-fitsttext-area">
			<div class="layout-inner-area">
				<!-- first text -->
			</div>
		</div>
		<div class="layout-item-area text-align-center layout-name-date-area">
			<div class="layout-inner-area">
				<div class="nametext">
					<!-- name text -->
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
		<div class="layout-item-area text-align-center layout-memorialwords-area">
			<div class="layout-inner-area"></div>
		</div>
	</div>
	@if(count($productcolors) > 0)
	<div class="content-product-color">
		<h4>Select Color:</h4>
		<ul>
			@foreach($productcolors as $pcolor)
			<li>
				<a class="choose-pcolor-js" href="javascript:" data-pcolor-id="{{ $pcolor->id }}" data-pcolor-img="{{ $pcolor->image }}">
					<img src="{{ $pcolor->thumbnail }}" title="{{ $pcolor->name }}" alt="{{ $pcolor->name }}"/>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>