<div class="deal-box">
	<?php print render($title_prefix); ?>
  	<?php print render($title_suffix); ?>
	<div class="deal-image">
		<a href="<?php print $node->field_deal_callback['und'][0]['url']; ?>" target="_blank">
		<?php print render($content['field_deal_thumbnail']); ?>
		</a>
	</div>
	<div class="deal-decs">
		<div class="deal-title">
			<a href="<?php print $node->field_deal_callback['und'][0]['url']; ?>" target="_blank"><?php print $title; ?></a>
		</div>
		<div class="deal-body">				
		<?php print render($content['body']); ?>
		</div>
		<div class="button"><?php print render($content['field_deal_callback']); ?></div>
	</div>
</div>
