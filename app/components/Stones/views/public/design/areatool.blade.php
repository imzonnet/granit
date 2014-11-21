<div class="content-area-tool js-tabs">
	<ul class="controler-tab">
		<li class='active'><a href="javascript:" data-tabs="tab-product">Select product</a></li>
		<li><a href="javascript:" data-tabs="tab-graphics">Graphics</a></li>
		<li><a href="javascript:" data-tabs="tab-text">Text</a></li>
	</ul>
	<div class="content-tab center active" data-content-tabs="tab-product">
		Select Categories: {{ Form::select('product_cat', $product_cat, '', array('data-handle' => 'getProductsById')) }}
		<div class="line-design"></div>
		<div class="content-products">
			<!-- Ajax load item -->
		</div>
	</div>
	<div class="content-tab center" data-content-tabs="tab-graphics">
		Select Categories: {{ Form::select('icon_cat', $icon_cat, '', array('data-handle' => 'getIconsById')) }}
		<div class="line-design"></div>
		<div class="content-icons">
			<!-- Ajax load item -->
		</div>
	</div>
	<div class="content-tab center" data-content-tabs="tab-text">
		<div class="content-text">
			<textarea id="text-design" class="text-design"></textarea>
			<div class="control-text-format">
				<ul>
					<li>
						<input class="hidden" type="checkbox" id="fontweight" name="fontweight"/>
						<label for="fontweight"><i class="fa fa-bold"></i></label>
					</li>
					<li>
						<input class="hidden" type="checkbox" id="fontitalic" name="fontitalic"/>
						<label for="fontitalic"><i class="fa fa-italic"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textalignleft" name="textalign" id="textalignleft" checked="true"/>
						<label for="textalignleft"><i class="fa fa-align-left"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textaligncenter" name="textalign" id="textaligncenter"/>
						<label for="textaligncenter"><i class="fa fa-align-center"></i></label>
					</li>
					<li>
						<input class="hidden" type="radio" id="textalignright" name="textalign" id="textalignright"/>
						<label for="textalignright"><i class="fa fa-align-right"></i></label>
					</li>
				</ul>
			</div>
			<div class="control-font-style">
				
			</div>
			<div class="control-font-size"></div>
			<div class="line-design"></div>
			<button class="btn" id="add_text">Add Text</button>
		</div>	
	</div>
</div>