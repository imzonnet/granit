/* design.js */


!(function($){
	$(function(){
		// tool (tabs switch) =============================================
		$('.js-tabs').each(function(){
			var thisEl = $(this);
			thisEl.find('[data-tabs]').on('click', function(){
				var tab_name = $(this).data('tabs');

				$(this).parent('li').addClass('active').siblings().removeClass('active');
				thisEl.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})
		})

		// Select product cat, icon cat =============================================
		$('[name="product_cat"], [name="icon_cat"]').change(function(){
			var thisEl = $(this),
				value = thisEl.val(),
				handle = thisEl.data('handle');

			thisEl.parent().addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: handle, id: value },
				success: function(data){
					var obj = $.parseJSON(data);
					switch(handle){
						case 'getProductsById':
							var content = $('.content-products');
							content.html(obj.layout)
							break;
						case 'getIconsById':
							var content = $('.content-icons');
							content.html(obj.layout)
							break;
					}

					var images = content.find('img'),
						count_images = images.length,
						img_complete = 0;
					
					images.fadeOut(0);

					images.each(function(){
						$(this).load(function() {
							$(this).fadeIn();
							img_complete += 1;
							if( img_complete == count_images ){
								thisEl.parent().removeClass('loading-animate'); // remove loading animate
							}
						})
					})

					
				}
			})
		}).trigger('change')

		// choose product =============================================
		$('.content-products').on('click', '.product-item', function(e){
			var thisEl = $(this),
				p_id = thisEl.data('product-id');

			$('.design-area.right').addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: 'getLayoutProductDesign', id: p_id },
				success: function(data){
					var obj = $.parseJSON(data);
					$('.content-area-design').html(obj.layout);

					$('.design-area.right').removeClass('loading-animate'); // add loading animate
				}
			})
		})
	})
})(jQuery)