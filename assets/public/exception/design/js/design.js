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

		// add text =============================================
		var layout_active = "";
		$('#add_text').on('click', function(){
			var content_area_design = $('.content-area-design .design-inner .image-frame');
			if( content_area_design.length == 0 ){ 
				$.dialog({ mess: "Please choose product." });
				return; 
			}

			var text_area = $('#text-design'),
				text = text_area.val(),
				paramsStyle = {
					color: text_area.css('color'),
					fontFamily: text_area.css('font-family'),
					fontSize: parseInt(text_area.css('font-size').replace('px','')),
					fontStyle: text_area.css('font-style'),
					fontWeight: text_area.css('font-weight'),
					lineHeight: text_area.css('line-height'),
					textAlign: text_area.css('text-align'),
				},
				layout_text = $('<div>');

			layout_text
			.addClass('layout-design')
			.css(paramsStyle)
			.html("<div class='text-inner'>"+text.replace(/\r\n|\r|\n/g,"<br />")+"</div>"); // .replace(/<br\s?\/?>/g,"\n");

			content_area_design.append(layout_text);
			layout_text.on('click', function(e){
				e.stopPropagation();
				layout_active = $(this);
				$(this).addClass('active').siblings().removeClass('active');
			})
			buildLayout(layout_text, {drag: true});
		})

		// clear layout active
		$('.content-area-design').on('click', '.image-frame', function(e){
			$(this).find('.layout-design.active').removeClass('active');
			layout_active = "";
		})

		// initToolText =============================================
		function initToolText(){
			var cssText = {};

			// Textarea
			var textarea = $('#text-design');
			textarea.on('input', function(e){
				if(layout_active.length <= 0){ return; }
				layout_active.children('.text-inner').html($(this).val().replace(/\r\n|\r|\n/g,"<br />"));
			})

			// Text Format (default)
			var fontweight = $('#fontweight'),
				fontitalic = $('#fontitalic'),
				textalign = $('input[name="textalign"]');

			fontweight.on('change', function(){
				( fontweight.prop('checked') == true )? 
					cssText.fontWeight = "bold" : cssText.fontWeight = "";
				textarea.css(cssText);

				if(layout_active.length <= 0){ return; }
				layout_active.css(cssText)
			}).trigger('change')
			
			fontitalic.on('change', function(){
				( fontitalic.prop('checked') == true )? 
					cssText.fontStyle = "italic" : cssText.fontStyle = "";
				textarea.css(cssText);

				if(layout_active.length <= 0){ return; }
				layout_active.css(cssText)
			}).trigger('change')
			
			textalign.on('change', function(){
				cssText.textAlign = $('input[name="textalign"]:checked').val();
				textarea.css(cssText);

				if(layout_active.length <= 0){ return; }
				layout_active.css(cssText)
			}).trigger('change')

			// Font family (default)
			var fonts = $('select[name="fonts"]');
			fonts.on('change', function(){
				cssText.fontFamily = $('select[name="fonts"] option:selected').html();
				textarea.css(cssText);

				if(layout_active.length <= 0){ return; }
				layout_active.css(cssText)
			}).trigger('change')

			// Color
			var colorEl = $('input[name="color"]'),
				settings = {
					change: function(hex, opacity){
						cssText.color = hex;
						textarea.css(cssText);

						if(layout_active.length <= 0){ return; }
						layout_active.css(cssText)
					},
					control: 'wheel',
				};
			colorEl.minicolors(settings);
			textarea.css('color', colorEl.val());

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
			})
			.Link('lower')
			.to( $('#js-ranger-fontsize-value') )
			.on({
				slide: function(){
					var value =  $(this).val();
					cssText.fontSize = value + 'px';
					cssText.lineHeight = value + 'px';
					textarea.css(cssText);

					if(layout_active.length <= 0){ return; }
					layout_active.css(cssText)
				}
			}).trigger('slide')
		}
		initToolText();
	})
})(jQuery)