/* design.js */
!(function($){
	$(function(){
		// init =============================================
		function init(){
			var cssText = {};

			// Textarea
			var textarea = $('#text-design');

			// Text Format
			var fontweight = $('#fontweight');
			( fontweight.prop('checked') == true )? cssText.fontWeight = "bold" : "";
			var fontitalic = $('#fontitalic');
			( fontitalic.prop('checked') == true )? cssText.fontFamily = "italic" : "";
			var textalign = $('input[name="textalign"]');
			cssText.fontStyle = textalign.val();
			
			// Text Format (event)
			fontweight.on('click', function(){
				( fontweight.prop('checked') == true )? 
					cssText.fontWeight = "bold" : cssText.fontWeight = "";
				textarea.css(cssText);
			})
			fontitalic.on('click', function(){
				( fontitalic.prop('checked') == true )? 
					cssText.fontFamily = "italic" : cssText.fontFamily = "";
				textarea.css(cssText);
			})
			textalign.on('click', function(){
				cssText.fontStyle = textalign.val();
				alert(cssText.fontStyle);
				textarea.css(cssText);
			})


			// Color
			var colorEl = $('input[name="color"]'),
				settings = {
					animationSpeed: 50,
					animationEasing: 'swing',
					change: null,
					changeDelay: 0,
					control: 'wheel',
					defaultValue: '',
					hide: null,
					hideSpeed: 100,
					inline: false,
					letterCase: 'lowercase',
					opacity: false,
					position: 'bottom left',
					show: null,
					showSpeed: 100,
					theme: 'default',
				};
			colorEl.minicolors(settings);
			cssText.color = colorEl.val();

			// Font size
			var controlFontSizeEl = $('#js-font-size');
			controlFontSizeEl.noUiSlider({
				start: [ controlFontSizeEl.data('size-default') ],
				step: 1,
				range: {
					'min': [ controlFontSizeEl.data('size-start') ],
					'max': [ controlFontSizeEl.data('size-end') ]
				},
				format: wNumb({
					decimals: 0
				})
			}).Link('lower').to( $('#js-ranger-fontsize-value') );
			cssText.color = controlFontSizeEl.data('size-default');

			textarea.css(cssText);
		}
		init();

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

					if(count_images > 0){
						images.each(function(){
							$(this).load(function() {
								$(this).fadeIn();
								img_complete += 1;
								if( img_complete == count_images ){
									thisEl.parent().removeClass('loading-animate'); // remove loading animate
								}
							})
						})
					}else{
						thisEl.parent().removeClass('loading-animate'); // remove loading animate
					}
					
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

		// choose icon =============================================
		$('.content-icons').on('click', '.icon-item', function(e){

			var content_area_design = $('.content-area-design .design-inner .image-frame');
			if( content_area_design.length == 0 ){ 
				$.dialog({ mess: "Please choose product." });
				return; 
			}

			var thisEl = $(this),
				imgEl = thisEl.children('img'),
				imgSrc = imgEl.attr('src'),
				layout_icon = $('<div>').addClass('layout-design').html('<img src="'+imgSrc+'"/>');
			
			content_area_design.append(layout_icon);
			buildLayout(layout_icon, {drag: true});
		})

		// build layout =============================================
		function buildLayout(ThisEl, params){
			if( params.drag == true )
				ThisEl.addClass('l-move').draggable();

			delLayout(ThisEl);
		}

		// del layout =============================================
		function delLayout(ThisEl){
			var delEl = $('<span>').attr('title', 'remove').addClass('l-del');
			ThisEl.append(delEl);

			delEl.on('click', function(e){
				ThisEl.remove();
			})
		}
	})
})(jQuery)