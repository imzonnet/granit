<div class="content-inner">
	@if(count($icons) > 0)
		@foreach($icons as $icon)
<div class="design-item icon-item" data-icon-id="{{ $icon->id }}">
			<img src="{{ $icon->image }}" alt="{{ $icon->name }}" title="{{ $icon->name }}"/>
		</div><!--
		-->@endforeach
	@elseif
	Not item.
	@endif
	<div class="clear"></div>
</div>