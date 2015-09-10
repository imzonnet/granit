<div class="design-title-layout">
	{{trans('Stones::design.stones.design.choose_a_gravestone')}}
</div>
<div class="content-area-design">
	<!-- Load ajax content -->
	<div class="design-info">
		<div class="video-content">
		<?php echo ( $settings->youtube_embed ) ? $settings->youtube_embed : ''; ?>
		</div>
		<img style="width: 100%;" src="<?php echo Request::root().'/'; ?>assets/public/exception/design/images/start-design-img.png"/>
	</div>
</div>
