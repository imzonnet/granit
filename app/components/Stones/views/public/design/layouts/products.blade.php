<div class="content-inner">
	@if(count($products) > 0)
@foreach($products as $product)
<div class="design-item product-item" data-product-id="{{ $product->id }}" title="{{ $product->name }}">
	<!-- <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" title="{{ $product->name }}"/> -->
	<img src="<?php echo Request::root().'/'; ?>{{ $product->productColor->first()->image }}" alt="{{ $product->name }}" />
	<p class="text-ellipsis">{{ $product->name }}</p>
</div><!--
-->@endforeach
	@elseif
	{{trans('Stones::design.stones.design.not_item')}}
	@endif
	<div class="clear"></div>
</div>