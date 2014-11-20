<div class="content-inner">
	@if(count($products) > 0)
@foreach($products as $product)
<div class="design-item product-item" data-product-id="{{ $product->id }}">
	<img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}"/>
</div><!--
-->@endforeach
	@elseif
	Not item.
	@endif
	<div class="clear"></div>
</div>