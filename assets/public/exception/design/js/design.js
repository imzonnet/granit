/* design.js */

// add job title or place birth
function addJobOrPlace(elem){ 
	var thisEl = $(elem);
		//del_el = $('<button>').addClass('design-custom-btn').attr({'type': 'button', 'onclick': 'delJobOrPlace(this)'}).html('<i class="fa fa-trash"></i>'),
		//add_job_or_place_el = $('<p class="add_job_or_place">').html('<input type="text" style="width: 255px;">').append(del_el);
	
	thisEl.addClass('visible-btn').next().css('display', 'block');
}

function delJobOrPlace(elem){
	$(elem).parent().prev().removeClass('visible-btn');
	// $(elem).parent().remove();
	$(elem).parent().find('input').val('').trigger('input');
	$(elem).parent().css('display', 'none');
}

// add Poem
function addPoem(elem){
	var thisEl = $(elem);
	thisEl.next().css('display', 'block');
	thisEl.css('display', 'none');
}
// hide Poen
function hidePoen(elem){
	var thisEl = $(elem);
	thisEl.parent().parent().parent().prev().css('display', 'block');
	thisEl.parent().parent().parent().css('display', 'none');
}

!(function($){
	$(function(){
		// tool (tabs switch) =============================================
		$('.js-tabs').each(function(){
			var thisEl = $(this);
			thisEl.find('[data-tabs]').on('click', function(e){
				var tab_name = $(this).data('tabs');

				$(this).parent('li').addClass('active').siblings().removeClass('active');
				thisEl.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})
			thisEl.children('ul').find('li a[data-tabs-action="newtab"]').on('click', function(e){			
				var $this = $(this);
					keytab = $this.data('key-tab');

				switch(keytab){
					case 'name': addMoreTabName(thisEl); break;
					case 'memorial_worlds': addMoreTabMemorial_worlds(thisEl); break;
					case 'poem': addMorePoem(thisEl); break;
				}
			})
		})

		function addMoreTabName(elem){
			var controler_tab_name = elem.children('.controler-tab-name');
				count = controler_tab_name.children('li').length,
				rand_id = Math.random().toString(36).substring(7),
				html_inner = elem.find('[data-content-tabs="tab-name-1"]').html(),
				name_tab_el = $('<li>').html('<a href="javascript:" data-tabs="tab-name-'+rand_id+'">Name '+count+'</a>'),
				content_tab_el = $('<div>').addClass('content-tab').attr('data-content-tabs', 'tab-name-'+rand_id),
				del_tab_el = $('<span>').addClass('del-tab').attr('data-del-tabs', 'tab-name-'+rand_id).html('<i class="fa fa-trash"></i> Delete');
			
			name_tab_el.children('a').click(function(){
				var tab_name = $(this).data('tabs');
				
				$(this).parent().addClass('active').siblings().removeClass('active');
				elem.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})

			del_tab_el.on('click', function(e){
				var tab_del = $(this).data('del-tabs'),
					this_tab_name = elem.find('[data-tabs="'+tab_del+'"]').parent();
				
				this_tab_name.prev().children('a').trigger('click');
				this_tab_name.remove();
				elem.find('[data-content-tabs="'+tab_del+'"]').remove();

				var layout_id = tab_del.split('-');
				$('.content-area-design .layout-id-'+layout_id[2]).remove();
			})

			controler_tab_name.children('li:last-child').before(name_tab_el).before(' ');
			elem.append(content_tab_el.html(html_inner).append(del_tab_el));
			
			content_tab_el.find('input').each(function(){
				if( $('this').attr('type') == "text" ){
					$('this').val('');
				}else if( $('this').attr('type') == "checkbox" ){
					$('this').prop('checked', false);
				}
			})

			// create layout name b-d day
			var layer_el = $('<div>').addClass('layout-item-area text-align-center layout-name-date-area layout-id-'+rand_id),
				html_inner = '<div class="layout-inner-area">';
				html_inner += '<div class="nametext"></div>';
				html_inner += '<div class="add_job_or_place"></div>';
				html_inner += '<div class="datetext">';
				html_inner += '<div class="birthdatetext"></div>';
				html_inner += '<div class="deathdatetext"></div>';
				html_inner += '</div>';
				html_inner += '</div>';
			layer_el.append(html_inner);


			layoutItem.name_date.parent().append(layer_el);
			setTextStyleEl(layer_el);
			nameDateControl(content_tab_el, layer_el);
		}

		function addMoreTabMemorial_worlds(elem){
			var controler_tab_mw = elem.children('.controler-tab-memorial-worlds');
				count = controler_tab_mw.children('li').length,
				rand_id = Math.random().toString(36).substring(7),
				html_inner = elem.find('[data-content-tabs="tab-memorial-worlds-1"]').html(),
				name_tab_el = $('<li>').html('<a href="javascript:" data-tabs="tab-memorial-worlds-'+rand_id+'">Line '+count+'</a>'),
				content_tab_el = $('<div>').addClass('content-tab').attr('data-content-tabs', 'tab-memorial-worlds-'+rand_id),
				del_tab_el = $('<span>').addClass('del-tab').attr('data-del-tabs', 'tab-memorial-worlds-'+rand_id).html('<i class="fa fa-trash"></i> Delete');

			name_tab_el.children('a').click(function(){
				var tab_name = $(this).data('tabs');
				
				$(this).parent().addClass('active').siblings().removeClass('active');
				elem.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})

			del_tab_el.on('click', function(e){
				var tab_del = $(this).data('del-tabs'),
					this_tab_name = elem.find('[data-tabs="'+tab_del+'"]').parent();
				
				this_tab_name.prev().children('a').trigger('click');
				this_tab_name.remove();
				elem.find('[data-content-tabs="'+tab_del+'"]').remove();

				var layout_id = tab_del.split('-');
				$('.content-area-design .layout-id-'+layout_id[3]).remove();
			})

			controler_tab_mw.children('li:last-child').before(name_tab_el).before(' ');
			elem.append(content_tab_el.html(html_inner).append(del_tab_el));

			content_tab_el.find('input').each(function(){
				if( $('this').attr('type') == "text" ){
					$('this').val('');
				}else if( $('this').attr('type') == "checkbox" ){
					$('this').prop('checked', false);
				}
			})

			/* Create layout Memorial */
			var layer_el = $('<div>').addClass('layout-inner-area layout-id-'+rand_id);
			lDesign.layout_memorialwords_area.append(layer_el);
			mw_control(content_tab_el, layer_el);
		}

		function addMorePoem(elem){
			var controler_tab_poem = elem.children('.controler-tab-poem');
				count = controler_tab_poem.children('li').length,
				rand_id = Math.random().toString(36).substring(7),
				html_inner = elem.find('[data-content-tabs="tab-poem-1"]').html(),
				name_tab_el = $('<li>').html('<a href="javascript:" data-tabs="tab-poem-'+rand_id+'">Line '+count+'</a>'),
				content_tab_el = $('<div>').addClass('content-tab').attr('data-content-tabs', 'tab-poem-'+rand_id),
				del_tab_el = $('<span>').addClass('del-tab').attr('data-del-tabs', 'tab-poem-'+rand_id).html('<i class="fa fa-trash"></i> Delete');

			name_tab_el.children('a').click(function(){
				var tab_name = $(this).data('tabs');
				
				$(this).parent().addClass('active').siblings().removeClass('active');
				elem.find('[data-content-tabs="'+tab_name+'"]').addClass('active').siblings().removeClass('active');
			})

			del_tab_el.on('click', function(e){
				var tab_del = $(this).data('del-tabs'),
					this_tab_name = elem.find('[data-tabs="'+tab_del+'"]').parent();
				
				this_tab_name.prev().children('a').trigger('click');
				this_tab_name.remove();
				elem.find('[data-content-tabs="'+tab_del+'"]').remove();
			})

			controler_tab_poem.children('li:last-child').before(name_tab_el).before(' ');
			elem.append(content_tab_el.html(html_inner).append(del_tab_el));

			content_tab_el.find('button').remove();
			content_tab_el.find('input').each(function(){
				if( $('this').attr('type') == "text" ){
					$('this').val('');
				}else if( $('this').attr('type') == "checkbox" ){
					$('this').prop('checked', false);
				}
			})

			/* Create layout Poem */
			var layer_el = $('<div>').addClass('layout-inner-area layout-id-'+rand_id);
			lDesign.poem.append(layer_el);
			poem_control(content_tab_el, layer_el);
		}

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
		})//.trigger('change')

		// choose product =============================================
		// $('.content-products').on('click', '.product-item', function(e){
		// 	var thisEl = $(this),
		// 		p_id = thisEl.data('product-id');

		// 	$('.design-area.right').addClass('loading-animate'); // add loading animate

		// 	$.ajax({
		// 		headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
		// 		type: "POST",
		// 		url: "design/ajax",
		// 		data: { handle: 'getLayoutProductDesign', id: p_id },
		// 		success: function(data){
		// 			var obj = $.parseJSON(data);
		// 			$('.content-area-design').html(obj.layout);

		// 			$('.design-area.right').removeClass('loading-animate'); // add loading animate
		// 		}
		// 	})
		// })

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
			if( params.drag == true ){
				ThisEl.addClass('l-move').draggable({
					start: function (event, ui) {
						var left = parseInt($(this).css('left'),10);
						left = isNaN(left) ? 0 : left;
						var top = parseInt($(this).css('top'),10);
						top = isNaN(top) ? 0 : top;
						recoupLeft = left - ui.position.left;
						recoupTop = top - ui.position.top;
					},
					drag: function( event, ui ) {
						ui.position.left = parseInt(recoupLeft + ui.position.left);
						ui.position.top = parseInt(recoupTop + ui.position.top);
					}
				});
			}

			if( params.rotate == true )
				ThisEl.rotate();

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
			.html("<div class='text-inner'>"+text.replace(/\n/g,"<br>")+"</div>");

			content_area_design.append(layout_text);
			layout_text.on('click', function(e){
				e.stopPropagation();
				layout_active = $(this);
				synLayoutText(layout_active);

				$(this).addClass('active').siblings().removeClass('active');
			})
			buildLayout(layout_text, {drag: true, rotate: true});
		})

		// clear layout active
		$('.content-area-design').on('click', '.image-frame', function(e){
			$(this).find('.layout-design.active').removeClass('active');
			layout_active = "";
		})

		// syn layout text
		function synLayoutText(thisEl){
			var layoutText = $(thisEl),
				text = layoutText.children('.text-inner').html(),
				paramsStyle = {
					color: layoutText.css('color'),
					fontFamily: layoutText.css('font-family'),
					fontSize: parseInt(layoutText.css('font-size').replace('px','')),
					fontStyle: layoutText.css('font-style'),
					fontWeight: layoutText.css('font-weight'),
					lineHeight: layoutText.css('line-height'),
					textAlign: layoutText.css('text-align'),
				},
				text_area = $('#text-design');	

			text_area.val(
					text.replace(/<br>/gi,"\n")
					.replace(/&amp;/gi, '&')
				);

			// syn font weight
			var fontweight = $('#fontweight');
			if( paramsStyle.fontWeight == 400 || paramsStyle.fontWeight == "bold" )
				fontweight.prop('checked', false).trigger('change');
			else
				fontweight.prop('checked', true).trigger('change');

			// syn font italic
			var fontitalic = $('#fontitalic');
			if( paramsStyle.fontStyle == "italic" )
				fontitalic.prop('checked', true).trigger('change');
			else
				fontitalic.prop('checked', false).trigger('change');

			// syn text align
			$('input[name="textalign"][value="'+paramsStyle.textAlign+'"]')
			.prop('checked', true).trigger('change');

			// syn font family
			$('select[name="fonts"] option[value="'+paramsStyle.fontFamily.replace(/ /gi, '+')+'"]')
			.prop('selected', true).trigger('change');

			// syn color
			$('input[name="color"]').val(rgb2hex(paramsStyle.color)).trigger('keyup');

			// syn font size
			$('#js-font-size').val(paramsStyle.fontSize).trigger('slide');
		}

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
		// initToolText();

		// conver color rgb to hex =============================================
		function rgb2hex(rgb) {
		    rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);
		    function hex(x) {
		        return ("0" + parseInt(x).toString(16)).slice(-2);
		    }
		    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
		}

		// UPDATE =============================================
		// Select product cat
		$('.product-cat-content li a').click(function(){
			var thisEl = $(this),
				catId = thisEl.data('cat-id');

			thisEl.parent().parent().addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: 'getProductByCatId', id: catId },
				success: function(data){
					var obj = $.parseJSON(data),
						content = $('.content-products');
					
					content.html(obj.layout);

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
									thisEl.parent().parent().removeClass('loading-animate'); // remove loading animate
								}
							})
						})
					}else{
						thisEl.parent().parent().removeClass('loading-animate'); // remove loading animate
					}
				}
			})
		})
		$('.product-cat-content li:first-child a').trigger('click');

		// set layout design =============================================
		var lDesign = {};
		function setLayoutDeisgn(){
			var content_area_design = $('.content-area-design');
			lDesign.layout_fitsttext_area = content_area_design.find('.layout-fitsttext-area');
			lDesign.layout_name_date_area = content_area_design.find('.layout-name-date-area');
			lDesign.layout_memorialwords_area = content_area_design.find('.layout-memorialwords-area');
			lDesign.poem = content_area_design.find('.layout-poem-area');
		}
		// choose product =============================================
		var layoutItem = {
			fitsttext: '',
			name_date: '',
			memorialwords: '',
			poem: ''
		}
		$('.content-products').on('click', '.product-item', function(e){
			var thisEl = $(this),
				p_id = thisEl.data('product-id');

			$('.design-area.right').addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: 'getProductColorByProductid', id: p_id },
				success: function(data){
					var obj = $.parseJSON(data);
					$('.content-area-design').html(obj.layout);
					layoutItem.fitsttext = $('.content-area-design').find('.layout-fitsttext-area');
					layoutItem.name_date = $('.content-area-design').find('.layout-name-date-area');
					layoutItem.memorialwords = $('.content-area-design').find('.layout-memorialwords-area');
					layoutItem.poem = $('.content-area-design').find('.layout-poem-area');

					setTextStyle();
					setLayoutDeisgn();
					// Name - Date control
					nameDateControl($('.control-name').find('[data-content-tabs="tab-name-1"]'), lDesign.layout_name_date_area.children('.layout-inner-area'));
					// Memorial worlds control
					mw_control($('.control-memorial-worlds').find('[data-content-tabs="tab-memorial-worlds-1"]'), lDesign.layout_memorialwords_area.children('.layout-inner-area'));
					// Poem control
					poem_control($('.control-poem').find('[data-content-tabs="tab-poem-1"]'), lDesign.poem.children('.layout-inner-area'));

					$('.content-area-design').find('.content-product-color ul li:first-child a').trigger('click'); // active first item
					$('.design-area.right').removeClass('loading-animate'); // add loading animate
				}
			})
		})
		// set text style tab text
		function setTextStyle(){
			var text_style = {
				color: $('input[type="radio"][name="text-color"]:checked').val(),
				fontFamily: $('input[type="radio"][name="font-family"]:checked').val(),
				fontSize: '16px',
				lineHeight: '20px'
			}

			$.each(layoutItem, function($k, $elem){
				$elem.css(text_style);

				buildLayout($elem, {drag: true})
			})
		}

		function setTextStyleEl(elem){
			var text_style = {
				color: $('input[type="radio"][name="text-color"]:checked').val(),
				fontFamily: $('input[type="radio"][name="font-family"]:checked').val(),
				fontSize: '16px',
				lineHeight: '20px'
			}

			elem.css(text_style);
			buildLayout(elem, {drag: true})
		}

		// choose product color =============================================
		$('.content-area-design').on('click', '.choose-pcolor-js', function(e){
			var main_frame_image = $('.content-area-design').find('#main-frame-image'),
				thisEl = $(this),
				pcolor_id = thisEl.data('pcolor-id'),
				pcolor_img = thisEl.data('pcolor-img');

			thisEl.parent().addClass('active').siblings().removeClass('active');

			main_frame_image.css('display', 'block').attr('src', pcolor_img);
		})

		// control tab text
		var textControlEl = {};
		function iniTextControl(){
			var textContent = $('.content-text');
			textControlEl.hide_first_text = textContent.find('input[type="checkbox"][name="hide_first_text"]');
			
			// First text
			textControlEl.first_text = textContent.find('input[type="text"][name="first_text"]');
			textControlEl.first_text.bind('input', function(){
				if(layoutItem.fitsttext.length <= 0){ return; }
				layoutItem.fitsttext.children('.layout-inner-area').html( $(this).val() );
			})

			// Name
			textControlEl.name = textContent.find('input[type="text"][name="name"]');
			textControlEl.name.bind('input', function(){ 
				if(layoutItem.name_date.length <= 0){ return; }
				layoutItem.name_date.children('.layout-inner-area').children('.nametext').html( $(this).val() );
			})

			// birthdate
			textControlEl.birthdate = textContent.find('.content-birth-death .content-birthdate');
			textControlEl.birthdate.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					var thiEl = $(this), text_date = "f";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'b-y')? ". 00" : ". 0000"; }
						text_date += '. '+value;
					})
					
					layoutItem.name_date
					.children('.layout-inner-area')
					.children('.datetext')
					.children('.birthdatetext')
					.html( text_date );
				})
			})

			// deathdate
			textControlEl.deathdate = textContent.find('.content-birth-death .content-deathdate');
			textControlEl.deathdate.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					var thiEl = $(this), text_date = "d";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'd-y')? ". 00" : ". 0000"; }
						text_date += '. '+value;
					})
					
					layoutItem.name_date
					.children('.layout-inner-area')
					.children('.datetext')
					.children('.deathdatetext')
					.html( text_date );
				})
			})

			//memorial_words
			textControlEl.memorial_words = textContent.find('input[type="text"][name="memorial_words"]');
			textControlEl.memorial_words.bind('input', function(){
				
			})
		}
		// iniTextControl();

		// ===========================================================================//
		// First text control
		$('input[name="first_text"]').bind('input', function(){
			if(!lDesign.layout_fitsttext_area) return;

			var thisEl = $(this),
				value = thisEl.val();

			lDesign.layout_fitsttext_area.children('.layout-inner-area').html(value);
		})

		// name / date control
		function nameDateControl(areaTextEl, areaLayoutEl){
			if(!lDesign.layout_name_date_area){ return; }

			var textEl = {
				name: areaTextEl.find('input[name="name"]'),
				contentBirthday: areaTextEl.find('.b-date'),
				contentDeath: areaTextEl.find('.d-date'),
				add_job_or_place: areaTextEl.find('input[name="add_job_or_place"]')
			}
			textEl.name.bind('input', function(){
				var value = $(this).val();
				// console.log(value);
				areaLayoutEl.find('.nametext').html(value);
			})

			// add_job_or_place
			textEl.add_job_or_place.bind('input', function(){
				var thisEl = $(this),
					value = thisEl.val();
				
				areaLayoutEl.find('.add_job_or_place').html(value);
			})

			// birthdate
			textEl.contentBirthday.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					var thiEl = $(this), text_date = "f";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'b-y')? " 00" : " 0000"; }
						text_date += '. '+value;
					})
					
					areaLayoutEl.find('.datetext .birthdatetext').html(text_date);
				})
			})

			// deathdate
			textEl.contentDeath.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					var thiEl = $(this), text_date = "d";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'd-y')? " 00" : " 0000"; }
						text_date += '. '+value;
					})
					
					areaLayoutEl.find('.datetext .deathdatetext').html(text_date);
				})
			})
		}

		// Memorial worlds control
		function mw_control(areaTextEl, areaLayoutEl){
			if(!lDesign.layout_memorialwords_area){ return; }

			var textEl = {
				memorial_worlds: areaTextEl.find('input[name="memorial-worlds"]')
			}

			textEl.memorial_worlds.bind('input', function(){
				var value = $(this).val();
				areaLayoutEl.html(value);
			})
		}

		// Poem control
		function poem_control(areaTextEl, areaLayoutEl){
			if(!lDesign.poem){ return; }

			var textEl = {
				poem: areaTextEl.find('input[name="poem"]')
			}

			textEl.poem.bind('input', function(){
				var value = $(this).val();
				areaLayoutEl.html(value);
			})
		}
	})
})(jQuery)
