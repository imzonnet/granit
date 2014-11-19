
<div class="content-area-tool js-tabs">
	<ul class="controler-tab">
		<li class='active'><a href="#!" data-tabs="tab-product">Select product</a></li>
		<li><a href="#!" data-tabs="tab-graphics">Graphics</a></li>
		<li><a href="#!" data-tabs="tab-text">Text</a></li>
	</ul>
	<div class="content-tab center active" data-content-tabs="tab-product">
		Select Categories: {{ Form::select('product_cat', $product_cat) }}
		<div class="line-design"></div>
		<div class="content-products">
			<!-- Ajax load item -->
		</div>
	</div>
	<div class="content-tab center" data-content-tabs="tab-graphics">
		Graphics
	</div>
	<div class="content-tab center" data-content-tabs="tab-text">
		Text
	</div>
</div>