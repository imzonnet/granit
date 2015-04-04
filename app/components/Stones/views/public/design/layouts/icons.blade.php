<div class="content-inner">
	@if(count($icons) > 0)
		@foreach($icons as $icon)
		<?php 
			$filter_image = (!empty($icon->filter_image))? Request::root().'/'.$icon->filter_image : "";
		?>
<div class="design-item icon-item" data-icon-image="<?php echo Request::root().'/'; ?>{{ $icon->image }}" data-icon-type="{{ $icon->type }}" data-filter-image="<?php echo $filter_image; ?>" data-icon-id="{{ $icon->id }}" data-icon-price="{{ $icon->price }}">
			<img src="<?php echo Request::root().'/'; ?>{{ $icon->image }}" alt="{{ $icon->name }}" title="{{ $icon->name }}"/>
		</div><!--
		-->@endforeach
	@elseif
	Not item.
	@endif
	<div class="clear"></div>
</div>