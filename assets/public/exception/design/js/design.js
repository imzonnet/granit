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
	$(elem).parent().find('input[name="add_job_or_place"]').val('').trigger('input');
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

	thisEl.parent().parent().parent().find('.del-tab').trigger('click');
	thisEl.parent().parent().parent().find('input[type="text"]').val('').trigger('input');
	thisEl.parent().parent().parent().parent().prev().css('display', 'block');
	thisEl.parent().parent().parent().parent().css('display', 'none');
}

!(function($){
	$(function(){
		var global_params = {};
		// global_params.radio = { large: 0.14, 
		// 	medium: 0.21, 
		// 	small: 0.34};
		global_params.radio = { large: 0.108333333, 
			medium: 0.1625, 
			small: 0.26}; 

		var first_text_size_real = 75;
		var name_size_real = 100;
		var born_size_real = 70;
		var memorial_size_real = 75;
		var poem_size_real = 60;
		var job_title_real = 75;

		// size first text
		global_params.first_text = {large: global_params.radio.large * first_text_size_real, 
			medium: global_params.radio.medium * first_text_size_real, 
			small: global_params.radio.small * first_text_size_real};
		// size name
		global_params.name = {large: global_params.radio.large * name_size_real, 
			medium: global_params.radio.medium * name_size_real, 
			small: global_params.radio.small * name_size_real};
		// size born
		global_params.born = {large: global_params.radio.large * born_size_real, 
			medium: global_params.radio.medium * born_size_real, 
			small: global_params.radio.small * born_size_real};
		// size memorial
		global_params.memorial = {large: global_params.radio.large * memorial_size_real, 
			medium: global_params.radio.medium * memorial_size_real, 
			small: global_params.radio.small * memorial_size_real};
		// size poem
		global_params.poem = {large: global_params.radio.large * poem_size_real, 
			medium: global_params.radio.medium * poem_size_real, 
			small: global_params.radio.small * poem_size_real};
		// size job title
		global_params.jobtitle = {large: global_params.radio.large * job_title_real, 
			medium: global_params.radio.medium * job_title_real, 
			small: global_params.radio.small * job_title_real};

		var space_first_name_real = 50;
		var space_name_born_real = 45;
		var space_name1_name2_real = 65;
		var space_name_memorial_real = 80;
		var space_memorial_poem_real = 34;
		var space_name_job_real = 30;
		var space_poem_poem_real = 32;
		var space_memorial_memorial_real = 32;

		// space first name
		global_params.space_first_name = {large: global_params.radio.large * space_first_name_real,
			medium: global_params.radio.medium * space_first_name_real,
			small: global_params.radio.small * space_first_name_real};
		// space name born
		global_params.space_name_born = {large: global_params.radio.large * space_name_born_real,
			medium: global_params.radio.medium * space_name_born_real,
			small: global_params.radio.small * space_name_born_real};
		// space name1 name2
		global_params.space_name1_name2 = {large: global_params.radio.large * space_name1_name2_real,
			medium: global_params.radio.medium * space_name1_name2_real,
			small: global_params.radio.small * space_name1_name2_real};
		// space name memorial
		global_params.space_name_memorial = {large: global_params.radio.large * space_name_memorial_real,
			medium: global_params.radio.medium * space_name_memorial_real,
			small: global_params.radio.small * space_name_memorial_real};
		// space memorial poem
		global_params.space_memorial_poem = {large: global_params.radio.large * space_memorial_poem_real,
			medium: global_params.radio.medium * space_memorial_poem_real,
			small: global_params.radio.small * space_memorial_poem_real};
		// space memorial poem
		global_params.space_name_job = {large: global_params.radio.large * space_name_job_real,
			medium: global_params.radio.medium * space_name_job_real,
			small: global_params.radio.small * space_name_job_real};
		// space poem poem
		global_params.space_poem_poem = {large: global_params.radio.large * space_poem_poem_real,
			medium: global_params.radio.medium * space_poem_poem_real,
			small: global_params.radio.small * space_poem_poem_real};
		// space memorial memorial
		global_params.space_memorial_memorial = {large: global_params.radio.large * space_memorial_memorial_real,
			medium: global_params.radio.medium * space_memorial_memorial_real,
			small: global_params.radio.small * space_memorial_memorial_real};

		// console.log(global_params);


		// set default
		$('.font-size-control').val('16');

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
				name_tab_el = $('<li>').html('<a href="javascript:" data-tabs="tab-name-'+rand_id+'"><i class="fa fa-user"></i> Name '+count+'</a>'),
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

				updatePernamentTextAndCalcPrice();
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
			var layer_el = $('<div>').attr('data-drag-off', 'true').addClass('layout-item-area text-align-center layout-name-date-area layout-id-'+rand_id),
				html_inner = '<div class="layout-inner-area">';
				html_inner += '<div class="nametext"><div class="text-inner"></div></div>';
				html_inner += '<div class="add_job_or_place"><div class="text-inner"></div></div>';
				html_inner += '<div class="datetext">';
				html_inner += '<div class="birthdatetext"></div>';
				html_inner += '<div class="deathdatetext"></div>';
				html_inner += '</div>';
				html_inner += '</div>';
			layer_el.append(html_inner);

			var lDesignTop = layoutItem.name_date.parent().find('.layout-item-area:last-child').position().top + layoutItem.name_date.parent().find('.layout-item-area:last-child').height() + PointToPixel(sizeDesign.space_name1_name2);// .layout-item-area
			layer_el.css('top', lDesignTop+'px');

			layoutItem.name_date.parent().append(layer_el);
			name_tab_el.find('a').trigger('click'); // new tab active
			setTextStyleEl(layer_el); 
			nameDateControl(content_tab_el, layer_el.children('.layout-inner-area'));
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
				updatePernamentTextAndCalcPrice();
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

			var lDesignTop = PointToPixel(sizeDesign.space_memorial_memorial);// .layout-item-area
			layer_el.css('margin-top', lDesignTop+'px');

			lDesign.layout_memorialwords_area.append(layer_el);
			name_tab_el.find('a').trigger('click'); // new tab active
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

				var layout_id = tab_del.split('-');
				$('.content-area-design .layout-id-'+layout_id[2]).remove();
				updatePernamentTextAndCalcPrice();
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

			var lDesignTop = PointToPixel(sizeDesign.space_poem_poem);// .layout-item-area
			layer_el.css('margin-top', lDesignTop+'px');

			lDesign.poem.append(layer_el);
			name_tab_el.find('a').trigger('click'); // new tab active
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
						// console.log(_left - ui.position.left, _top - ui.position.top);
						if(ThisEl.data('drag-off') == true){ ThisEl.data('drag-off', false); }

						if($('#move_all_text').prop('checked') == true){
							var addTop = $(this).position().top - ui.position.top,
								addLeft = $(this).position().left - ui.position.left;
							
							$('.layout-item-area').each(function(){
								var thisEl = $(this),
									left =	thisEl.position().left - addLeft,
									top = thisEl.position().top - addTop;
								thisEl.css({
									top: top+'px',
									left: left+'px',
								})
							})
						}else{
							ui.position.left = parseInt(recoupLeft + ui.position.left);
							ui.position.top = parseInt(recoupTop + ui.position.top);
						}
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
					//fontStyle: text_area.css('font-style'),
					// fontWeight: text_area.css('font-weight'),
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
					//fontStyle: layoutText.css('font-style'),
					// fontWeight: layoutText.css('font-weight'),
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
		var sizeDesign = {};
		function setSizeDefault(size){
			switch(size.toLowerCase()){
				case 'large':
					sizeDesign.first_text 	= global_params.first_text.large;
					sizeDesign.name 		= global_params.name.large;
					sizeDesign.born 		= global_params.born.large;
					sizeDesign.memorial 	= global_params.memorial.large;
					sizeDesign.poem 		= global_params.poem.large;
					sizeDesign.jobtitle 	= global_params.jobtitle.large;

					sizeDesign.space_first_name = global_params.space_first_name.large;
					sizeDesign.space_name_born = global_params.space_name_born.large;
					sizeDesign.space_name1_name2 = global_params.space_name1_name2.large;
					sizeDesign.space_name_memorial = global_params.space_name_memorial.large;
					sizeDesign.space_memorial_poem = global_params.space_memorial_poem.large;
					sizeDesign.space_name_job = global_params.space_name_job.large;
					sizeDesign.space_poem_poem = global_params.space_poem_poem.large;
					sizeDesign.space_memorial_memorial = global_params.space_memorial_memorial.large;
					break;
				case 'medium':
					sizeDesign.first_text 	= global_params.first_text.medium;
					sizeDesign.name 		= global_params.name.medium;
					sizeDesign.born 		= global_params.born.medium;
					sizeDesign.memorial 	= global_params.memorial.medium;
					sizeDesign.poem 		= global_params.poem.medium;
					sizeDesign.jobtitle 	= global_params.jobtitle.medium;

					sizeDesign.space_first_name = global_params.space_first_name.medium;
					sizeDesign.space_name_born = global_params.space_name_born.medium;
					sizeDesign.space_name1_name2 = global_params.space_name1_name2.medium;
					sizeDesign.space_name_memorial = global_params.space_name_memorial.medium;
					sizeDesign.space_memorial_poem = global_params.space_memorial_poem.medium;
					sizeDesign.space_name_job = global_params.space_name_job.medium;
					sizeDesign.space_poem_poem = global_params.space_poem_poem.medium;
					sizeDesign.space_memorial_memorial = global_params.space_memorial_memorial.medium;
					break;
				case 'small':
					sizeDesign.first_text 	= global_params.first_text.small;
					sizeDesign.name 		= global_params.name.small;
					sizeDesign.born 		= global_params.born.small;
					sizeDesign.memorial 	= global_params.memorial.small;
					sizeDesign.poem 		= global_params.poem.small;
					sizeDesign.jobtitle 	= global_params.jobtitle.small;

					sizeDesign.space_first_name = global_params.space_first_name.small;
					sizeDesign.space_name_born = global_params.space_name_born.small;
					sizeDesign.space_name1_name2 = global_params.space_name1_name2.small;
					sizeDesign.space_name_memorial = global_params.space_name_memorial.small;
					sizeDesign.space_memorial_poem = global_params.space_memorial_poem.small;
					sizeDesign.space_name_job = global_params.space_name_job.small;
					sizeDesign.space_poem_poem = global_params.space_poem_poem.small;
					sizeDesign.space_memorial_memorial = global_params.space_memorial_memorial.small;
					break;
			}
			//console.log(sizeDesign);
		}

		$('.product-cat-content li a').click(function(){
			var thisEl = $(this),
				catId = thisEl.data('cat-id'),
				size = thisEl.children('img').attr('title');
			
			setSizeDefault(size); // set size
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
			lDesign.layout_firsttext_area = content_area_design.find('.layout-firsttext-area');
			lDesign.layout_name_date_area = content_area_design.find('.layout-name-date-area');
			lDesign.layout_memorialwords_area = content_area_design.find('.layout-memorialwords-area');
			lDesign.poem = content_area_design.find('.layout-poem-area'),
			lDesign.layoutAccessories = content_area_design.find('.main-layout-accessories-area');;
		}
		// choose product =============================================
		var layoutItem = {
			firsttext: '',
			name_date: '',
			memorialwords: '',
			poem: '',
		}

		$('.content-products').on('click', '.product-item', function(e){
			var thisEl = $(this),
				p_id = thisEl.data('product-id'),
				p_name = thisEl.find('.text-ellipsis').text();

				$('.design-area.right').find('.design-title-layout').addClass('has-product').html('<h3>'+p_name+'</h3>');


			$('.design-area.right').addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: 'getProductColorByProductid', id: p_id },
				success: function(data){
					var obj = $.parseJSON(data);
					$('.content-area-design').html(obj.layout);
					layoutItem.firsttext = $('.content-area-design').find('.layout-firsttext-area');
					layoutItem.name_date = $('.content-area-design').find('.layout-name-date-area');
					layoutItem.name = $('.content-area-design').find('.layout-name-date-area .nametext');
					layoutItem.add_job_or_place = $('.content-area-design').find('.layout-name-date-area .add_job_or_place');
					layoutItem.date = $('.content-area-design').find('.layout-name-date-area .datetext');
					layoutItem.memorialwords = $('.content-area-design').find('.layout-memorialwords-area');
					layoutItem.poem = $('.content-area-design').find('.layout-poem-area');
					// layoutItem.layoutAccessories = $('.content-area-design').find('.main-layout-accessories-area');

					setTextStyle();
					setLayoutDeisgn();
					setSpace();
					// Name - Date control
					nameDateControl($('.control-name').find('[data-content-tabs="tab-name-1"]'), lDesign.layout_name_date_area.children('.layout-inner-area'));
					// Memorial worlds control
					mw_control($('.control-memorial-worlds').find('[data-content-tabs="tab-memorial-worlds-1"]'), lDesign.layout_memorialwords_area.children('.layout-inner-area'));
					// Poem control
					poem_control($('.control-poem').find('[data-content-tabs="tab-poem-1"]'), lDesign.poem.children('.layout-inner-area'));

					$('.content-area-design').find('.content-product-color ul li:first-child a').trigger('click'); // active first item
					$('.design-area.right').removeClass('loading-animate'); // add loading animate
				
					// reset tab text
					$('[data-content-tabs="tab-text"] input[type="text"]').val('');
				}
			})
		})

		function PointToPixel(point){    
            return (point * 96 / 72);   
        }

		// set space text
		function setSpace(){
			var spaceFirsttext = 100;
			// first/name
			var first_name = spaceFirsttext+PointToPixel(sizeDesign.first_text)+PointToPixel(sizeDesign.space_first_name);
			layoutItem.name_date.css({
				top: first_name+'px',
			})

			// name/memory
			var name_memory = first_name+PointToPixel(sizeDesign.name)+PointToPixel(sizeDesign.space_name_born)+PointToPixel(sizeDesign.born)+PointToPixel(sizeDesign.space_name_memorial);
			layoutItem.memorialwords.css({
				top: name_memory+'px',
			})

			// memory/poem
			var memory_poem = name_memory+PointToPixel(sizeDesign.memorial)+PointToPixel(sizeDesign.space_memorial_poem);
			layoutItem.poem.css({
				top: memory_poem+'px',
			})
		}

		// set text style tab text
		function setTextStyle(){
			var text_style = {
				//color: $('input[type="radio"][name="text-color"]:checked').val(),
				color: '#FFFFFF',
				fontFamily: $('input[type="radio"][name="font-family"]:checked').val(),
				//fontWeight: 'bold',
				//lineHeight: 'normal',
				//fontStyle: 'italic'
			}

			// set Style
			layoutItem.firsttext.css(text_style).css({
				'fontSize': sizeDesign.first_text+'pt',
				'lineHeight': sizeDesign.first_text+'pt',
			});
			layoutItem.name.css(text_style).css({
				'fontSize': sizeDesign.name+'pt',
				'lineHeight': sizeDesign.name+'pt',
			});
			layoutItem.date.css(text_style).css({
				'fontSize': sizeDesign.born+'pt',
				'lineHeight': sizeDesign.born+'pt',
				'marginTop': sizeDesign.space_name_born+'pt',
			});
			layoutItem.memorialwords.css(text_style).css({
				'fontSize': sizeDesign.memorial+'pt',
				'lineHeight': sizeDesign.memorial+'pt',
			});
			layoutItem.poem.css(text_style).css({
				'fontSize': sizeDesign.poem+'pt',
				'lineHeight': sizeDesign.poem+'pt',
			});
			layoutItem.add_job_or_place.css(text_style).css({
				'fontSize': sizeDesign.jobtitle+'pt',
				'lineHeight': sizeDesign.jobtitle+'pt',
				'marginTop': sizeDesign.space_name_job+'pt',
			})
			// end set Style


			buildLayout(layoutItem.firsttext, {drag: true}) // first text drag
			buildLayout(layoutItem.name_date, {drag: true}) // name date drag
			buildLayout(layoutItem.memorialwords, {drag: true}) // memorialwords drag
			buildLayout(layoutItem.poem, {drag: true}) // poem drag

			// $.each(layoutItem, function($k, $elem){
			// 	buildLayout($elem, {drag: true, resizefont: true})
			// })
		}

		function setTextStyleEl(elem){
			// console.log(elem.attr('class'));
			if($('#permanent_text').prop('checked') == true){
				var color = '#FFFFFF';
			}else{
				var color = $('input[type="radio"][name="text-color"]:checked').val();
			}
			var text_style = {
				color: color,
				fontFamily: $('input[type="radio"][name="font-family"]:checked').val(),
				//fontSize: '16px',
				//lineHeight: 'normal',
				//fontWeight: 'bold',
				//fontStyle: 'italic'
			}
			if(elem.hasClass('layout-name-date-area')){ 
				elem.find('.nametext').css(text_style).css({
					'fontSize': sizeDesign.name+'pt',
					'lineHeight': sizeDesign.name+'pt',
				});
				elem.find('.datetext').css(text_style).css({
					'fontSize': sizeDesign.born+'pt',
					'lineHeight': sizeDesign.born+'pt',
					'margin-top': sizeDesign.space_name_born+'pt',
				});
				elem.find('.add_job_or_place').css(text_style).css({
					'fontSize': sizeDesign.jobtitle+'pt',
					'lineHeight': sizeDesign.jobtitle+'pt',
					'marginTop': sizeDesign.space_name_job+'pt',
				});
			}else{
				elem.css(text_style);
			}
			// elem.css(text_style);
			buildLayout(elem, {drag: true})
		}

		// choose product color =============================================
		var price_overview = {
			tbody_el: $('.tbody-design-overview', '.table'),
			tfooter_content_el: $('.tfooter-tr-content', '.table'),
			item_name: '',
			item_price: 0,
			item_characteristic_price: 0
		}

		$('.content-area-design').on('click', '.choose-pcolor-js', function(e){
			var main_frame_image = $('.content-area-design').find('#main-frame-image'),
				thisEl = $(this),
				pcolor_id = thisEl.data('pcolor-id'),
				pcolor_img = thisEl.data('pcolor-img');

			thisEl.parent().addClass('active').siblings().removeClass('active');

			main_frame_image.css('display', 'block').attr('src', pcolor_img);

			// design price update
			price_overview.item_name = thisEl.data('name'),
			price_overview.item_price = thisEl.data('price'),
			price_overview.item_characteristic_price = thisEl.data('characteristic-price');
			var tr_frame = "<tr class='tr-frame'>";
				tr_frame += "<td>1</td>";
				tr_frame += "<td>"+price_overview.item_name+"</td>";
				tr_frame += "<td class='qty'>1</td>";
				tr_frame += "<td class='price'>"+price_overview.item_price+"</td>";
				tr_frame += "<td class='calc-price'>"+price_overview.item_price+"</td>";
				tr_frame += "</tr>";
			var tr_pernament_text = "<tr class='pernament-text'>";
				tr_pernament_text += "<td>2</td>";
				tr_pernament_text += "<td>Pernament Text</td>";
				tr_pernament_text += "<td class='qty'>0</td>";
				tr_pernament_text += "<td class='price'>"+price_overview.item_characteristic_price+"</td>";
				tr_pernament_text += "<td class='calc-price'>0</td>";
				tr_pernament_text += "</tr>";
			price_overview.tbody_el.html(tr_frame + tr_pernament_text);

			//tfooter-tr-content
			var footerContent = "<td></td><td></td><td></td><td><strong>Sub total</strong></td> <td class='sub-title-price' style='font-weight: bold;'>"+price_overview.item_price+"</td>"
			price_overview.tfooter_content_el.html(footerContent);

			// update price overview
			updatePernamentTextAndCalcPrice();
		})

		// control tab text
		var textControlEl = {};
		function iniTextControl(){
			var textContent = $('.content-text');
			textControlEl.hide_first_text = textContent.find('input[type="checkbox"][name="hide_first_text"]');
			
			// First text
			textControlEl.first_text = textContent.find('input[type="text"][name="first_text"]');
			textControlEl.first_text.bind('input', function(){
				if(layoutItem.firsttext.length <= 0){ return; }
				layoutItem.firsttext.children('.layout-inner-area').html( $(this).val() );
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
			if(!lDesign.layout_firsttext_area) return;

			var thisEl = $(this),
				value = thisEl.val();

			lDesign.layout_firsttext_area.children('.layout-inner-area').html(value);
			calcCenter(lDesign.layout_firsttext_area);
		})

		$('.site-control-first-text span').bind('click', function(){
			var	currenSize = parseInt(lDesign.layout_firsttext_area.css('font-size')),
				new_size = currenSize;

			if( $(this).hasClass('size-plus') ){ new_size = currenSize + 1; }
			else{ new_size = currenSize - 1; }

			lDesign.layout_firsttext_area.css({
				fontSize: new_size + 'px',
				lineHeight: new_size + 'px',
			})
		})

		function controlFontSize(controlEl, applyEl){
			$(controlEl).find('span').bind('click', function(){
				var	currenSize = parseInt(applyEl.css('font-size')),
					new_size = currenSize;

				if( $(this).hasClass('size-plus') ){ new_size = currenSize + 1; }
				else{ new_size = currenSize - 1; }

				$(this).parent().find('span').attr('title', new_size+'px');

				applyEl.css({
					fontSize: new_size + 'px',
					lineHeight: new_size + 2 + 'px',
				})
			})
		}

		$('input[name="font-size-name"]').bind('input', function(){
			var value = $(this).val();
			lDesign.layout_firsttext_area.css({
				fontSize: value + 'px',
				lineHeight: value + 'px'
			})
		})
		// Hide first text
		$('input[name="hide_first_text"]').click(function(){
			var thisEl = $(this);
			if( thisEl.prop('checked') == true ){
				lDesign.layout_firsttext_area.css('display', 'none');
			}else{
				lDesign.layout_firsttext_area.css('display', 'block');
			}
		})


		// change font size
		function setFontSize(inputEl, elem){
			inputEl.bind('input', function(){
				var value = $(this).val();
				elem.css({
					fontSize: value + 'px',
					lineHeight: value + 'px'
				});
			})
		}

		// name / date control
		function nameDateControl(areaTextEl, areaLayoutEl){
			if(!lDesign.layout_name_date_area){ return; }

			var textEl = {
				name: areaTextEl.find('input[name="name"]'),
				contentBirthday: areaTextEl.find('.b-date'),
				contentDeath: areaTextEl.find('.d-date'),
				add_job_or_place: areaTextEl.find('input[name="add_job_or_place"]'),
				font_size__name: areaTextEl.find('input[name="font-size--name"]'),
				font_size_add_job_or_place: areaTextEl.find('input[name="font-size-add-job-or-place"]'),
				font_size_b_d_date: areaTextEl.find('input[name="font-size-b-d-date"]'),
			}

			// textEl.font_size__name.bind('input', function(){
			// 	var value = $(this).val();
			// 	areaLayoutEl.find('.nametext').css({
			// 		fontSize: value + 'px',
			// 		lineHeight: value + 'px'
			// 	});
			// })
			setFontSize(textEl.font_size__name, areaLayoutEl.find('.nametext'));
			setFontSize(textEl.font_size_add_job_or_place, areaLayoutEl.find('.add_job_or_place'));
			setFontSize(textEl.font_size_b_d_date, areaLayoutEl.find('.datetext'));

			/* 2 */
			controlFontSize(areaTextEl.find('.site-control-name'), areaLayoutEl.find('.nametext'));
			controlFontSize(areaTextEl.find('.site-control-add-job-or-place'), areaLayoutEl.find('.add_job_or_place'));
			controlFontSize(areaTextEl.find('.site-control-b-d-date'), areaLayoutEl.find('.datetext'));


			textEl.name.bind('input', function(){
				var value = $(this).val();
				// console.log(value);
				areaLayoutEl.find('.nametext').children('.text-inner').html(value);
				calcCenter(areaLayoutEl.parent()); // center name
			})

			// add_job_or_place
			textEl.add_job_or_place.bind('input', function(){
				var thisEl = $(this),
					value = thisEl.val();
				
				areaLayoutEl.find('.add_job_or_place').children('.text-inner').html(value);

				calcCenter(areaLayoutEl.parent()); // center add_job_or_place
			})

			// birthdate
			textEl.contentBirthday.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					// console.log(parseInt($(this).val()));
					$(this).val( (isNaN(parseInt($(this).val())) == true)? "" : parseInt($(this).val()) );
					var thiEl = $(this), text_date = "f";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'b-y')? " 00" : " 0000"; }
						text_date += '. '+value;
					})
					
					areaLayoutEl.find('.datetext .birthdatetext').html(text_date);

					calcCenter(areaLayoutEl.parent()); // center birthdatetext
				})
			})

			// deathdate
			textEl.contentDeath.find('input[type="text"]').each(function(){
				$(this).bind('input', function(){
					$(this).val( (isNaN(parseInt($(this).val())) == true)? "" : parseInt($(this).val()) );
					var thiEl = $(this), text_date = "d";

					thiEl.parent().children('input[type="text"]').each(function(){
						var name = $(this).attr('name'),
							value = $(this).val();

						if(!value){ value = (name != 'd-y')? " 00" : " 0000"; }
						text_date += '. '+value;
					})
					
					areaLayoutEl.find('.datetext .deathdatetext').html(text_date);

					calcCenter(areaLayoutEl.parent()); // center deathdatetext
				})
			})
		}

		// Memorial worlds control
		function mw_control(areaTextEl, areaLayoutEl){
			if(!lDesign.layout_memorialwords_area){ return; }

			var textEl = {
				memorial_worlds: areaTextEl.find('input[name="memorial-worlds"]'),
				font_size_memorial_worlds: areaTextEl.find('input[name="font-size-memorial-worlds"]')
			}

			setFontSize(textEl.font_size_memorial_worlds, areaLayoutEl);

			/* 2 */
			controlFontSize(areaTextEl.find('.site-control-memorial-worlds'), areaLayoutEl);

			// calc Top
			textEl.memorial_worlds.bind('focus', function(){
				var last_name_date_el = $('.main-layout-name-date-area .layout-name-date-area:last-child'),
					n_top = last_name_date_el.position().top + last_name_date_el.height() + PointToPixel(sizeDesign.space_name_memorial);
				
				if($(this).val().length > 0){ return; }
				if(areaLayoutEl.parent().data('drag-off') == false){ return; }
				areaLayoutEl.parent().css('top', n_top+'px');
			})

			textEl.memorial_worlds.bind('input', function(e){
				var value = $(this).val();
				areaLayoutEl.html(value);

				calcCenter(areaLayoutEl.parent()); // center memorial_worlds
			})
		}
		// Hide menorial worlds
		jQuery('input[name="hide_memorial_worlds"]').click(function(){
			var thisEl = $(this);
			if( thisEl.prop('checked') == true ){
				layoutItem.memorialwords.css('display', 'none');
			}else{
				layoutItem.memorialwords.css('display', 'block');
			}
		})

		// Poem control
		function poem_control(areaTextEl, areaLayoutEl){
			if(!lDesign.poem){ return; }

			var textEl = {
				poem: areaTextEl.find('input[name="poem"]'),
				font_size_poem: areaTextEl.find('input[name="font-size-poem"]'),
			}

			setFontSize(textEl.font_size_poem, areaLayoutEl);

			/* 2 */
			controlFontSize(areaTextEl.find('.site-control-poem'), areaLayoutEl);

			// calc Top
			textEl.poem.bind('focus', function(){
				var layout_memorialwords_area_el = $('.layout-memorialwords-area'),
					n_top = layout_memorialwords_area_el.position().top + layout_memorialwords_area_el.height() + PointToPixel(sizeDesign.space_memorial_poem);
				
				if($(this).val().length > 0){ return; }
				if(areaLayoutEl.parent().data('drag-off') == false){ return; }
				areaLayoutEl.parent().css('top', n_top+'px');
			})

			textEl.poem.bind('input', function(){
				var value = $(this).val();
				areaLayoutEl.html(value);

				calcCenter(areaLayoutEl.parent()); // center poem
			})
		}

		/* color control */
		$('input[name="text-color"]').each(function(){
			$(this).bind('click', function(){
				var thisEl = $(this),
					value = thisEl.val();
				//console.log(layoutItem);
				// $.each(layoutItem, function($k, $elem){
				// 	$elem.css('color', value);
				// 	if( $elem.hasClass('layout-name-date-area') ){
				// 		$elem.parent().find('.layout-name-date-area').css('color', value);
				// 	}
				// })

				$('.layout-item-area').each(function(){
					var thisEl = $(this);
					thisEl.css({ color: value });
					if(thisEl.hasClass('layout-name-date-area')){
						thisEl.find('.nametext, .datetext').css({ color: value })
					}
				})
			})
		})

		/* font control */
		$('input[name="font-family"]').each(function(){
			$(this).bind('click', function(){
				var thisEl = $(this),
					value = thisEl.val();
				$.each(layoutItem, function($k, $elem){
					$elem.css('fontFamily', value);
					if( $elem.hasClass('layout-name-date-area') ){
						$elem.parent().find('.layout-name-date-area').css('fontFamily', value);
					}
				})
			})
		})

		/* Chose Accessories */
		$('.accessories-cat-content .item-accessories').bind('click', function(){
			var thisEl = $(this),
				c_id = thisEl.data('id');

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: { handle: 'getIconsById', id: c_id },
				success: function(data){
					// console.log(data);
					var obj = $.parseJSON(data);
					$('.accessories-content')
					.addClass('active')
					.children('.accessories-content-inner')
					.html(obj.layout);
					$('.accessories-content').find('.icon-item').each(function(){
						chooseAccessorie($(this));
					})
				}
			})
		})
		$('#btn-accessories-back').click(function(){
			$(this).parent().removeClass('active');
		})
		// choose accessories
		function chooseAccessorie(elem){
			elem.bind('click', function(){
				var thisEl = $(this);
					src = thisEl.find('img').attr('src'),
					accessorieEl = $('<div>'),
					htmlInner = "<img src='"+src+"'>";

				accessorieEl.addClass('accessorie-item').append(htmlInner);
				lDesign.layoutAccessories.append(accessorieEl);

				buildLayout(accessorieEl, {drag: true});
			})
		}

		// countPernamentText ================================
		//var inputs = data_content_tabs.find('input[name="first_text"], input[name="name"], input[name="name"], input[name="add_job_or_place"], input[name="b-m"], input[name="b-y"], input[name="d-d"], input[name="d-m"], input[name="d-y"], input[name="memorial-worlds"], input[name="poem"]');
		function updatePernamentTextAndCalcPrice(){
			var inputs = $('div[data-content-tabs="tab-text"]').find('input[name="first_text"], input[name="name"], input[name="name"], input[name="add_job_or_place"], input[name="b-m"], input[name="b-y"], input[name="d-d"], input[name="d-m"], input[name="d-y"], input[name="memorial-worlds"], input[name="poem"]'),
				textLength = 0;
			inputs.each(function(){
				var $this = $(this),
					text = $this.val(),
					arr = text.split(' ');
				
				$.each(arr, function(index, value){
					textLength += value.length;
				})
			})
			var priceEl = $('.tbody-design-overview .pernament-text .price');
			$('.tbody-design-overview .pernament-text .qty').html(textLength);
			var priceCalc = textLength * parseInt(priceEl.html());
			$('.tbody-design-overview .pernament-text .calc-price').html(priceCalc);
			var subtotal = priceCalc + parseInt($('.tbody-design-overview .tr-frame .calc-price').html());
			$('.tfooter-design-overview .tfooter-tr-content .sub-title-price').html(subtotal);
		}
		$('div[data-content-tabs="tab-text"]').on('input', 'input[name="first_text"], input[name="name"], input[name="name"], input[name="add_job_or_place"], input[name="b-m"], input[name="b-y"], input[name="d-d"], input[name="d-m"], input[name="d-y"], input[name="memorial-worlds"], input[name="poem"]', function(){
			updatePernamentTextAndCalcPrice();
		})

		$('.content-color-text').css({
			opacity: 0.4,
			pointerEvents: 'none',
		})
		
		$('#permanent_text').click(function(){
			if($(this).prop('checked') == true){
				$('.content-color-text').css({
					opacity: 0.4,
					pointerEvents: 'none',
				})

				var value = '#FFFFFF';
				// $.each(layoutItem, function($k, $elem){
				// 	$elem.css('color', value);
				// 	if( $elem.hasClass('layout-name-date-area') ){
				// 		$elem.parent().find('.layout-name-date-area').css('color', value);
				// 	}
				// })
				$('.layout-item-area').each(function(){
					var thisEl = $(this);
					thisEl.css({ color: value });
					if(thisEl.hasClass('layout-name-date-area')){
						thisEl.find('.nametext, .datetext').css({ color: value })
					}
				})
			}
		})

		$('#painted_text').click(function(){
			if($(this).prop('checked') == true){
				$('.content-color-text').css({
					opacity: 1,
					pointerEvents: 'auto',
				})

				var value = $('[name="text-color"]:checked').val();
				// $.each(layoutItem, function($k, $elem){
				// 	$elem.css('color', value);
				// 	if( $elem.hasClass('layout-name-date-area') ){
				// 		$elem.parent().find('.layout-name-date-area').css('color', value);
				// 	}
				// })
				$('.layout-item-area').each(function(){
					var thisEl = $(this);
					thisEl.css({ color: value });
					if(thisEl.hasClass('layout-name-date-area')){
						thisEl.find('.nametext, .datetext').css({ color: value })
					}
				})
			}
		})

		var content_area_design = $('.content-area-design');
		function calcCenter($contentEl){
			var st = $contentEl.data('drag-off');
			if(st == false){ return; }

			var content_area_design_w = content_area_design.width(),
				contentEl_w = $contentEl.width(),
				newX = (content_area_design_w / 2) - (contentEl_w / 2);
			$contentEl.css({
				left: newX+'px',
			})
		}

		// Build image canvas ================================
		var designParams = {}
		function getInfoEl(elem, info){
			elem.info = {};
			elem.info.offset = elem.offset();
			if(info.text == true){ elem.info.text = elem.text(); }
			if(info.style == true){ 
				elem.info.color = elem.css('color'); 
				elem.info.fontFamily = elem.css('font-family'); 
				elem.info.fontSize = elem.css('font-size'); 
				elem.info.lineHeight = elem.css('line-height'); 
			}
			if(info.position == true){
				elem.info.top = elem.offset().top - designParams.main_frame_image.info.offset.top + parseInt(elem.info.lineHeight);
				elem.info.left = elem.offset().left - designParams.main_frame_image.info.offset.left;
			}

			return elem;
		}

		function buildCanvas(){
			designParams.canvas = document.createElement('canvas');
			designParams.canvas.width = designParams.main_frame_image.width();
			designParams.canvas.height = designParams.main_frame_image.height();
			designParams.context = designParams.canvas.getContext("2d");
		}

		function drawText(context, text, x, y, lineHeight, fitWidth) {
			fitWidth = fitWidth || 0;
			lineHeight = lineHeight || 20;
			var currentLine = 0;
			var lines = text.split(/\r\n|\r|\n/);
			for (var line = 0; line < lines.length; line++) {
				if (fitWidth <= 0) {
					context.fillText(lines[line], x, y + (lineHeight * currentLine));
				} else {
					var words = lines[line].split(' ');
					var idx = 1;
					while (words.length > 0 && idx <= words.length) {
						var str = words.slice(0, idx).join(' ');
						var w = context.measureText(str).width;
						if (w > fitWidth) {
							if (idx == 1) {
								idx = 2;
							}
							context.fillText(words.slice(0, idx - 1).join(' '), x, y + (lineHeight * currentLine));
							currentLine++;
							words = words.splice(idx - 1);
							idx = 1;
						}
						else
						{ idx++; }
					}
					if (idx > 0)
						context.fillText(words.join(' '), x, y + (lineHeight * currentLine));
				}
				currentLine++;
			}
		}

		var cStyle = {
			font: '',
			size: '16px',
			color: '#333'
		}
		function canvasStyleText(params){
			if( params.font ){ cStyle.font = params.font; }
			if( params.size ){ cStyle.size = params.size; }
			if( params.color ){ cStyle.color = params.color; }

			//designParams.context.font = 'italic '+cStyle.size+' '+cStyle.font; //'40pt Calibri';
			designParams.context.font = ' '+cStyle.size+' '+cStyle.font; //'40pt Calibri';
      		designParams.context.fillStyle = cStyle.color; //'blue';
		}

		function canvasBuildLayoutImg(imgEl){
			var c = document.createElement('canvas'),
				ctx= c.getContext("2d");

			c.width = parseInt(imgEl.css('width'));
			c.height = parseInt(imgEl.css('height'));
			ctx.drawImage(imgEl[0], 0, 0);
			return c;
		}

		function printDesign(){
			designParams.content_inner_design_area = $('.content-inner-design-area');
			if(designParams.content_inner_design_area.length <= 0){ return; }
			// [set main_frame_image
			designParams.main_frame_image = designParams.content_inner_design_area.find('img#main-frame-image');
			getInfoEl(designParams.main_frame_image, {}); 

			buildCanvas();
			designParams.context.drawImage(designParams.main_frame_image[0], 0, 0);
			// end]

			// [set layout_firsttext_area
			designParams.layout_firsttext_area = designParams.content_inner_design_area.find('.layout-firsttext-area .layout-inner-area');
			getInfoEl(designParams.layout_firsttext_area, {text: true, style: true, position: true});
			
			canvasStyleText({
					font: designParams.layout_firsttext_area.info.fontFamily,
					size: designParams.layout_firsttext_area.info.fontSize,
					color: designParams.layout_firsttext_area.info.color
				})
			drawText(designParams.context, 
				designParams.layout_firsttext_area.info.text, 
				designParams.layout_firsttext_area.info.left, 
				designParams.layout_firsttext_area.info.top, 
				parseInt(designParams.layout_firsttext_area.info.lineHeight), 
				designParams.layout_firsttext_area.innerWidth());
			// end]

			// [set main-layout-name-date-area
			var main_layout_name_date_area = $('.main-layout-name-date-area');
			main_layout_name_date_area.find('.layout-inner-area').each(function(){
				var thisEl = $(this),
					element = {};
				element.nametext = thisEl.find('.nametext'),
				element.add_job_or_place = thisEl.find('.add_job_or_place'),
				element.birthdatetext = thisEl.find('.birthdatetext'),
				element.deathdatetext = thisEl.find('.deathdatetext');

				$.each(element, function(index, elem){
					var text = $.trim(elem.text());
					if(text != ''){
						getInfoEl(elem, {text: true, style: true, position: true});
						canvasStyleText({
							font: elem.info.fontFamily,
							size: elem.info.fontSize,
							color: elem.info.color
						})

						if(elem.hasClass('nametext') || elem.hasClass('add_job_or_place')){ 
							designParams.context.textAlign = 'center';
							elem.info.left = elem.info.left + (elem.width() / 2); 
							elem.info.text = elem.children('.text-inner').text();
						}

						if(elem.hasClass('deathdatetext')){ 
							elem.info.left = elem.info.left + 20; }

						drawText(designParams.context, 
							elem.info.text, 
							elem.info.left, 
							elem.info.top, 
							parseInt(elem.info.lineHeight), 
							elem.innerWidth());

						// set default canvas
						if(elem.hasClass('nametext') || elem.hasClass('add_job_or_place')){ 
							designParams.context.textAlign = 'left'; }
					}
				})
			})
			// end]
			
			// [ set layout-memorialwords-area
			var layout_memorialwords_area = $('.layout-memorialwords-area');
			layout_memorialwords_area.find('.layout-inner-area').each(function(){
				var thisEl = $(this),
					text = $.trim(thisEl.text());
				
				if(text != ''){
					getInfoEl(thisEl, {text: true, style: true, position: true});
					canvasStyleText({
						font: thisEl.info.fontFamily,
						size: thisEl.info.fontSize,
						color: thisEl.info.color
					})

					designParams.context.textAlign = 'center';
					thisEl.info.left = thisEl.info.left + (thisEl.width() / 2); 

					drawText(designParams.context, 
						thisEl.info.text, 
						thisEl.info.left, 
						thisEl.info.top, 
						parseInt(thisEl.info.lineHeight), 
						thisEl.innerWidth());

					designParams.context.textAlign = 'left';
				}
			})
			// end]

			// [ set layout-poem-area
			var layout_memorialwords_area = $('.layout-poem-area');
			layout_memorialwords_area.find('.layout-inner-area').each(function(){
				var thisEl = $(this),
					text = $.trim(thisEl.text());
				
				if(text != ''){
					getInfoEl(thisEl, {text: true, style: true, position: true});
					canvasStyleText({
						font: thisEl.info.fontFamily,
						size: thisEl.info.fontSize,
						color: thisEl.info.color
					})

					designParams.context.textAlign = 'center';
					thisEl.info.left = thisEl.info.left + (thisEl.width() / 2); 

					drawText(designParams.context, 
						thisEl.info.text, 
						thisEl.info.left, 
						thisEl.info.top, 
						parseInt(thisEl.info.lineHeight), 
						thisEl.innerWidth());

					designParams.context.textAlign = 'left';
				}
			})
			// end]

			// [set main-layout-accessories-area
			var main_layout_accessories_area = $('.main-layout-accessories-area');
			main_layout_accessories_area.find('.accessorie-item').each(function(){
				var thisEl = $(this);
					imgEl = thisEl.find('img'),
					x = thisEl.offset().left - designParams.main_frame_image.info.offset.left,
					y = thisEl.offset().top - designParams.main_frame_image.info.offset.top;

				var c_img = canvasBuildLayoutImg(imgEl);
				designParams.context.drawImage(c_img, x, y);
			})
			// end]

			//$('body').append(designParams.canvas);
			var datImage = designParams.canvas.toDataURL("image/png");
			window.open(datImage);
		}
		$('#btn_print_design').bind('click', function(){
			printDesign();
		})
	})
})(jQuery)
