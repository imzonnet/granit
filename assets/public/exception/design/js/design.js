/* design.js */


!(function($){
	$(function(){
		// tool (tabs switch)
		$('.js-tabs').each(function(){
			var thisEl = $(this);
			thisEl.find('[data-tabs]').on('click', function(){
				var tab_name = $(this).data('tabs');

				$(this).parent('li').addClass('active').siblings().removeClass('active');
				thisEl.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})
		})

		// Select product cat
		$('[name="product_cat"]').change(function(){
			var thisEl = $(this),
				value = thisEl.val();

			
		})
	})
})(jQuery)