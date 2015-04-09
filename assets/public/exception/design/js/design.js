/*================================================*/

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

function switchForm(elem, type){
	if(type == "signup"){
		$('.content-form-signin').css('display', 'none');	
		$('.content-form-signup').css('display', 'block');	
	}else if(type == "signin"){
		$('.content-form-signin').css('display', 'block');	
		$('.content-form-signup').css('display', 'none');	
	}
}


!(function($){
	$(function(){
		// btn next step control
		var stepName = ["", "Add Text >>", "Add Accessories >>", "Finish", "Get a Bid"];
		$('.content-area-design').on('click', '#btn-next-step-control-js', function(){
			var $this = $(this),
				tab_active = $('.content-area-tool .controler-tab').find('.active'),
				index_num = tab_active.index() + 2;

			tab_active.next().find('a').trigger('click');
			$this.find('span').html(stepName[index_num]);

			$this.trigger('stepChange');
		})

		$('.content-area-design').on('stepChange', '#btn-next-step-control-js', function(){
			var $this = $(this);
				htmlInner = $this.find('span').html();
			(htmlInner == 'Get a Bid')? $this.addClass('getABid') : $this.removeClass('getABid');
		})

		$('#designform_email').bind('input', function(){
			var thisEl = $(this);

			$('#designform_username').val(thisEl.val());
		})

		$('#btn-use-sign-up').click(function(){
			//btn-use-sign-up-submit
			setDataSave({handle: 'formRegister'});
		})

		$('#btn-use-sign-in').click(function(){
			//btn-use-sign-up-submit
			setDataSave({handle: 'formLogin'});
		})



		/* Login Social */
		$('.sign-up-social').find('span a').bind('click', function(){
			var thisEl = $(this),
				linkLogin = thisEl.data('href');
				setDataSave({handle: 'login', link: linkLogin});
		})

		/* save desigl */
		if($('#save_design').length > 0){
			$('#save_design').bind('click', function(){
				setDataSave({handle: 'userSaveDesign'});
				$(this).addClass('btn-save-design-loading')
			})
		}
		
		// data save
		var dataSave = {
			type: "",
			pid: 0,
			cid: 0,
			ftest: {
				text: "",
				x: 0,
				y: 0
			},
			names: [],
			mwords: [],
			poem: [],
			accessories: [],
			hide_first_text: false,
			hide_memorial_worlds: false,
			font_family: "",
			painted_text: false,
			permanent_text: false,
			color: "",
		};

		/*-------Rebuild-------*/
		if(data_designed){
			var st_designed = {
				handle_type: false,
				handle_pid: false,
				handle_cid: false,
			};
		}		
		/*-------End Rebuild-------*/

		// pSearch
		$('input[name="psearch"]').bind('input', function(){
			var thisEl = $(this),
				pItem = $('.content-products .content-inner .product-item');

			if(thisEl.val().length > 0){
				pItem.each(function(){
					var thisItem = $(this),
						pName = thisItem.find('.text-ellipsis').text().toLowerCase();
					if ( pName.indexOf(thisEl.val().toLowerCase()) >= 0 ) {
					  	thisItem.css('display', 'inline-block');
					}else{
						thisItem.css('display', 'none');
					}
				})
			}else{
				pItem.css('display', 'inline-block');
			}
		})

		// accessories_search
		$('input[name="accessories_search"]').bind('input', function(){
			var thisEl = $(this),
				item_accessories = $('.accessories-cat-content .item-accessories');

			if(thisEl.val().length > 0){
				item_accessories.each(function(){
					var thisItem = $(this),
						aName = thisItem.find('.text-ellipsis').text().toLowerCase();
					if ( aName.indexOf(thisEl.val().toLowerCase()) >= 0 ){
						thisItem.css('display', 'inline-block');
					}else{
						thisItem.css('display', 'none');
					}
				})
			}else{
				item_accessories.css('display', 'inline-block');
			}
		})

		var global_params = {};
		// global_params.radio = { large: 0.14, 
		// 	medium: 0.21, 
		// 	small: 0.34};
		global_params.radio = { large: 0.106274306, 
			medium: 0.159411458, 
			small: 0.255058333}; 

		var first_text_size_real = 75;
		var name_size_real = 100;
		var name_size_small_real = 92; // fix
		var born_size_real = 70;
		var memorial_size_real = 75;
		var poem_size_real = 60;
		var job_title_real = 60;

		// size first text
		global_params.first_text = {large: global_params.radio.large * first_text_size_real, 
			medium: global_params.radio.medium * first_text_size_real, 
			small: global_params.radio.small * first_text_size_real};
		// size name
		global_params.name = {large: global_params.radio.large * name_size_real, 
			medium: global_params.radio.medium * name_size_real, 
			small: global_params.radio.small * name_size_small_real};
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
		var space_name_job_real = 32;
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
				var index_num = $(this).parent('li').index() + 1;
				$('#btn-next-step-control-js').find('span').html(stepName[index_num]);
				$('#btn-next-step-control-js').trigger('stepChange');

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

			var lDesignTop = sizeDesign.space_poem_poem;//PointToPixel(sizeDesign.space_poem_poem);// .layout-item-area
			layer_el.css('margin-top', lDesignTop+'pt');

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

		//
		function canvasOverlayFrame(params){
			var c = document.createElement('canvas'),
				ctx = c.getContext('2d'),
				imgFrame = new Image(); // image frame
			imgFrame.src = params.frame;
			imgFrame.onload = function(){
				var $thisF = this,
					fW = this.naturalWidth,
					fH = this.naturalHeight;
				c.width = fW;
				c.height = fH;
				var imgI = new Image();
				imgI.src = params.image;
				imgI.onload = function(){
					var $thisI = $(this),
						newH = this.naturalHeight/this.naturalWidth*fW;
					
					ctx.drawImage(this, 0, 0, fW, newH);
					if(!params.filter){
						ctx.drawImage($thisF, 0, 0, fW, fH);
						var result = c.toDataURL("image/png");
						params.afterHandle.call(this, result);
					}
					var imgFil = new Image();
					imgFil.src = params.filter;
					imgFil.onload = function(){
						ctx.drawImage(this, 0, 0, fW, fH);
						var imageData = ctx.getImageData(0, 0, fW, fH);
						var pixel = imageData.data;
						var r = 0, g = 1, b = 2, a = 3;
						for (var p = 0; p<pixel.length; p+=4)
						{
							if (
								pixel[p+r] == 255 &&
								pixel[p+g] == 0 &&
								pixel[p+b] == 222) // if #FF00DE then change alpha to 0
							{pixel[p+a] = 0;}
						}
						ctx.putImageData(imageData, 0, 0);
						ctx.drawImage($thisF, 0, 0, fW, fH);
						var result = c.toDataURL("image/png");
						params.afterHandle.call(this, result);
					}
				}
			}
		}

		// build layout =============================================
		var elementCurrentUpload;
		function buildLayout(ThisEl, params){
			// console.log(params);
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

			if( params.resize == true ){
				ThisEl
				.addClass('l-resize')
				.resizable({
					resize: function( event, ui ) {
						ui.element.css('height', 'auto');
					}
				});
			}

			if( params.upload == true ){
				var lUpload = $('<label>').addClass('l-upload')
				.attr({'for': 'upload-field-area', 'title': 'upload image'});
				ThisEl.append(lUpload)

				lUpload.bind('click', function(){ elementCurrentUpload = ThisEl })
			}

			if( params.rotate == true )
				ThisEl.rotate();

			delLayout(ThisEl);
		}

		$('#upload-field-area').on('change', function(e){
			var file = this,
				type = file.files[0].type,
				vali_types = [ "image/jpeg", "image/png" ];
				frameImgUrl = elementCurrentUpload.data('icon-image'),
				filterImgUrl = elementCurrentUpload.data('filter-image');

			if($.inArray( type, vali_types ) < 0){
				console.log('Not support file type: '+type); return;
			}
			elementCurrentUpload.attr('percent', '0%').addClass('ajaxhandle');
			var reader = new FileReader();
		    reader.onload = function(){
		      	var dataURL = reader.result;
	      		$.ajax({
	      			xhr: function(){
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progress", function(evt){
					      	if (evt.lengthComputable) {  
					        	var percentComplete = parseInt(evt.loaded / evt.total * 100);
					        	elementCurrentUpload.attr('percent', percentComplete+'%');				        	
					      	}
					    }, false); 
					    return xhr;
					},
	      			headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
					type: "POST",
					url: "design/ajax",
					data: { handle: 'uploadImageAccessories', data: dataURL, rooturl: root_url },
					success: function(data){
						var obj = JSON.parse(data);
						elementCurrentUpload.attr('percent', 'load...');
						var params = {
							frame: frameImgUrl,
							image: obj.layout,
							filter: filterImgUrl,
							afterHandle: function(data){
								//window.open(data);
								var img = new Image();
								img.src = obj.layout;
								img.onload = function(){
									elementCurrentUpload
									.removeAttr('percent')
									.removeClass('ajaxhandle');
									elementCurrentUpload.attr('data-image-upload', obj.layout);
									elementCurrentUpload.find('img').attr('src', data);
								}
							}
						};
				      	canvasOverlayFrame(params);
					}
	      		})
		    };
		    reader.readAsDataURL(file.files[0]);
		})

		// del layout =============================================
		function delLayout(ThisEl){
			var delEl = $('<span>').attr('title', 'remove').addClass('l-del');
			ThisEl.append(delEl);

			delEl.on('click', function(e){
				ThisEl.remove();
				updatePernamentTextAndCalcPrice();
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
					sizeDesign._first_text 	= global_params.first_text.large;
					sizeDesign._name 		= global_params.name.large;
					sizeDesign._born 		= global_params.born.large;
					sizeDesign._memorial 	= global_params.memorial.large;
					sizeDesign._poem 		= global_params.poem.large;
					sizeDesign._jobtitle 	= global_params.jobtitle.large;

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
					sizeDesign._first_text 	= global_params.first_text.medium;
					sizeDesign._name 		= global_params.name.medium;
					sizeDesign._born 		= global_params.born.medium;
					sizeDesign._memorial 	= global_params.memorial.medium;
					sizeDesign._poem 		= global_params.poem.medium;
					sizeDesign._jobtitle 	= global_params.jobtitle.medium;

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
					sizeDesign._first_text 	= global_params.first_text.small;
					sizeDesign._name 		= global_params.name.small;
					sizeDesign._born 		= global_params.born.small;
					sizeDesign._memorial 	= global_params.memorial.small;
					sizeDesign._poem 		= global_params.poem.small;
					sizeDesign._jobtitle 	= global_params.jobtitle.small;

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

			//update born font size - reduction 22.40430527%
			sizeDesign._born = sizeDesign._born - (sizeDesign._born * 22.40430527 / 100);
			//update space name/job - reduction 49.00676316%
			sizeDesign.space_name_job = sizeDesign.space_name_job - (sizeDesign.space_name_job * 49.00676316 / 100);
			//update space name/born - reduction 17.42194052%
			sizeDesign.space_name_born = sizeDesign.space_name_born - (sizeDesign.space_name_born * 17.42194052 / 100);
			//update space poem/poem - reduction 36.75466397%
			sizeDesign.space_poem_poem = sizeDesign.space_poem_poem - (sizeDesign.space_poem_poem * 36.75466397 / 100);
			
			setSizeBookmanGaramond('garamond');
		}

		function setSizeBookmanGaramond(font){
			if(font == 'garamond'){
				sizeDesign.first_text 	= sizeDesign._first_text;
				sizeDesign.name 		= sizeDesign._name;
				sizeDesign.born 		= sizeDesign._born;
				sizeDesign.memorial 	= sizeDesign._memorial;
				sizeDesign.poem 		= sizeDesign._poem;
				sizeDesign.jobtitle 	= sizeDesign._jobtitle;
			}else if(font == 'bookman'){
				sizeDesign.first_text 	= sizeDesign._first_text - (sizeDesign._first_text * 10 / 100); // reduce 10%
				sizeDesign.name 		= sizeDesign._name - (sizeDesign._name * 10 / 100); // reduce 10%
				sizeDesign.born 		= sizeDesign._born - (sizeDesign._born * 10 / 100); // reduce 10%
				sizeDesign.memorial 	= sizeDesign._memorial - (sizeDesign._memorial * 10 / 100); // reduce 10%
				sizeDesign.poem 		= sizeDesign._poem - (sizeDesign._poem * 10 /100); // reduce 10%
				sizeDesign.jobtitle 	= sizeDesign._jobtitle - (sizeDesign._jobtitle * 10 / 100); // reduce 10%
			} 

			var elemChangeSize = {
				layout_firsttext_area: $('.content-area-design').find('.layout-firsttext-area'),
				layout_name_area_nametext: $('.content-area-design .layout-name-date-area').find('.nametext'),
				layout_name_area_add_job_or_place: $('.content-area-design .layout-name-date-area').find('.add_job_or_place'),
				layout_name_area_datetext: $('.content-area-design .layout-name-date-area').find('.datetext'),
				layout_layout_memorialwords_area: $('.content-area-design').find('.layout-memorialwords-area'),
				layout_layout_poem_area: $('.content-area-design').find('.layout-poem-area'),
			}

			elemChangeSize.layout_firsttext_area.css({ fontSize: sizeDesign.first_text+'pt' });
			elemChangeSize.layout_name_area_nametext.css({ fontSize: sizeDesign.name+'pt' });
			elemChangeSize.layout_name_area_add_job_or_place.css({ fontSize: sizeDesign.jobtitle+'pt' });
			elemChangeSize.layout_name_area_datetext.css({ fontSize: sizeDesign.born+'pt' });
			elemChangeSize.layout_layout_memorialwords_area.css({ fontSize: sizeDesign.memorial+'pt' });
			elemChangeSize.layout_layout_poem_area.css({ fontSize: sizeDesign.poem+'pt' });
		}

		$('.product-cat-content li a').click(function(){
			var thisEl = $(this),
				catId = thisEl.data('cat-id'),
				size = thisEl.children('img').attr('title');
			
			dataSave.type = size;

			setSizeDefault(size); // set size
			
			thisEl.parent('li').addClass('current').siblings().removeClass('current');
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
									if($('.content-area-design #main-frame-image').length > 0){
										$('.content-products').find('.product-item').eq(0).trigger('click');
									}
								}
							})
						})
					}else{
						thisEl.parent().parent().removeClass('loading-animate'); // remove loading animate
					}

					/* ------ReDesigned------ */
					if(data_designed){
						if(st_designed.handle_pid == false){
							$('.content-products .product-item[data-product-id="'+data_designed.pid+'"]').trigger('click');
							st_designed.handle_pid = true;
							console.log(st_designed);
						}
					}
					/* ------End ReDesigned------ */
				}
			})
		})
		
		if(data_designed){
			/* ------ReDesigned------ */
			if(st_designed.handle_type == false){
				$('.product-cat-content li a[title="'+data_designed.type+'"]').trigger('click');
				st_designed.handle_type = true;
			}
			/* ------End ReDesigned------ */
		}else{
			$('.product-cat-content li:first-child a').trigger('click');
		}
		


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
		};
		var reset_items_price = true;
		$('.content-products').on('click', '.product-item', function(e){
			reset_items_price = true;

			var thisEl = $(this),
				p_id = thisEl.data('product-id'),
				p_name = thisEl.find('.text-ellipsis').text();

				dataSave.pid = p_id;

				$('.design-area.right').find('.design-title-layout').addClass('has-product').html('<h3>'+p_name+'</h3>');


			$('.design-area.right').addClass('loading-animate'); // add loading animate

			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				async: false,
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

					$('.design-area.right').removeClass('loading-animate'); // add loading animate
				
					// reset tab text
					$('[data-content-tabs="tab-text"] input[type="text"]').val('');

					if(data_designed){
						/*-----ReDesigned------*/
						if(st_designed.handle_cid == false){
							$('.content-area-design').find('.content-product-color ul li a[data-pcolor-id="'+data_designed.cid+'"]').trigger('click'); 
							var imgSrc = $('.content-area-design').find('.content-product-color ul li a[data-pcolor-id="'+data_designed.cid+'"] img').attr('src');
							st_designed.handle_cid = true;

							$('.controler-tab li a[data-tabs="tab-text"]').trigger('click');
							
							// check frame load comlepte 
							//var img = document.createElement('img');
							var img = new Image();
							img.src = imgSrc;
							img.onload = function() {
								setTimeout(function(){
									designedTextHandle();
								}, 500)
						      	
						    };
							// End check frame load comlepte
						}
						/*-----End ReDesigned------*/
					}else{
						$('.content-area-design').find('.content-product-color ul li:first-child a').trigger('click'); // active first item
					}
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
				fontWeight: 'bold',
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
				fontWeight: 'bold',
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

			dataSave.cid = pcolor_id;
			// console.log(dataSave);

			thisEl.parent().addClass('active').siblings().removeClass('active');

			main_frame_image.css('display', 'block').attr('src', root_url+pcolor_img);

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

			//tfooter-tr-content
			var footerContent = "<td></td><td></td><td></td><td><strong>Sub total</strong></td> <td class='sub-title-price' style='font-weight: bold;'>"+price_overview.item_price+"</td>"
			
			
			if(reset_items_price == true){
				price_overview.tbody_el.html(tr_frame + tr_pernament_text);
				price_overview.tfooter_content_el.html(footerContent);
				reset_items_price = false;
			}else{
				$('.tbody-design-overview .tr-frame').find('td').eq(1).html(price_overview.item_name);
				$('.tbody-design-overview .tr-frame').find('.price').html(price_overview.item_price);
				$('.tbody-design-overview .tr-frame').find('.calc-price').html(price_overview.item_price);
				$('.tbody-design-overview .pernament-text').find('.price').html(price_overview.item_characteristic_price);
			}

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
				lDesign.layout_firsttext_area.css({
					opacity: 0,
					zIndex: '-1'
				});
			}else{
				lDesign.layout_firsttext_area.css({
					opacity: 1,
					zIndex: 'initial'
				});
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
				expect_to_add_another_namelater: areaTextEl.find('input[name="expect_to_add_another_namelater"]'),
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

			textEl.expect_to_add_another_namelater.bind('change', function(){
				var $this = $(this);
				if($this.prop('checked') == true){
					areaLayoutEl.addClass('expect_to_add_another_namelater');
				}else{
					areaLayoutEl.removeClass('expect_to_add_another_namelater');
				}
			})

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

				(value.length > 0)? areaLayoutEl.find('.add_job_or_place').css('display', 'block') : areaLayoutEl.find('.add_job_or_place').css('display', 'none') ;
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
				areaLayoutEl.html('<div>'+value+'</div>');

				calcCenter(areaLayoutEl.parent()); // center memorial_worlds
			})
		}
		// Hide menorial worlds
		jQuery('input[name="hide_memorial_worlds"]').click(function(){
			var thisEl = $(this);
			if( thisEl.prop('checked') == true ){
				layoutItem.memorialwords.css({
					opacity: 0,
					zIndex: '-1'
				});
			}else{
				layoutItem.memorialwords.css({
					opacity: 1,
					zIndex: 'initial'
				});
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
				areaLayoutEl.html('<div>'+value+'</div>');

				calcCenter(areaLayoutEl.parent()); // center poem
			})
		}

		function hexToRgb(hex) {
			var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
			return result ? {
				r: parseInt(result[1], 16),
				g: parseInt(result[2], 16),
				b: parseInt(result[3], 16)
			} : null;
		}

		// change color acc
		function filterImageColor(params){
			var rgb = hexToRgb(params.color),	
				canvas = document.createElement('canvas'),
				ctx = canvas.getContext('2d'),
				img = new Image();
			img.src = params.imgUrl;
			img.onload = function(){
				var imgW = this.naturalWidth,
					imgH = this.naturalHeight;
				canvas.width = imgW;
				canvas.height = imgH;
				ctx.drawImage(this, 0, 0);
				
				var imageData = ctx.getImageData(0, 0, imgW, imgH),
					pixel = imageData.data, 
					r = 0, g = 1, b = 2, a = 3;
				
				for (var p = 0; p < pixel.length; p+=4){
					if (pixel[p+r] == 255 && pixel[p+g] == 255 && pixel[p+b] == 255){
						pixel[p+r] = rgb.r;
						pixel[p+g] = rgb.g;
						pixel[p+b] = rgb.b;
					}
				}
				ctx.putImageData(imageData, 0, 0);
				var baseUrl = canvas.toDataURL("image/png");
				params.afterHandle.call(this, baseUrl);
			}
		}

		function changeColorEngraved(color){
			if(color == ''){
				color = ($('#permanent_text').prop('checked') == true)? '#FFFFFF' : $('input[name="text-color"]:checked').val();
			}
			var $accessorieItem = $('.accessorie-item[data-icon-type="engraved"]');
			if($accessorieItem.length <= 0){ return; }
			$accessorieItem.each(function(){
				var $this = $(this),
					iconImage = $this.data('icon-image');
				var params = {
					color: color,
					imgUrl: iconImage,
					afterHandle: function(data){
						$this.find('img').attr('src', data);
					}
								
				}
				filterImageColor(params);
			})
		}

		/* color control */
		$('input[name="text-color"]').each(function(){
			$(this).bind('click', function(){
				var thisEl = $(this),
					value = thisEl.val();

				changeColorEngraved(value);
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
						thisEl.find('.nametext, .datetext, .add_job_or_place').css({ color: value })
					}
				})
			})
		})

		/* font control */
		$('input[name="font-family"]').each(function(){
			$(this).bind('click', function(){
				var thisEl = $(this),
					value = thisEl.val();

				$('.layout-item-area').each(function(){
					var thisEl = $(this);
					thisEl.css('fontFamily', value);
					if(thisEl.hasClass('layout-name-date-area')){
						thisEl.find('.nametext, .datetext, .add_job_or_place').css('fontFamily', value);
					}
				})

				if(value == 'garamonditalic'){
					setSizeBookmanGaramond('garamond');
				}else if(value == 'bookosbi'){
					setSizeBookmanGaramond('bookman');
				}
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
					filter_image = thisEl.data('filter-image'),
					icon_image = thisEl.data('icon-image'),
					accessorieEl = $('<div>'),
					htmlInner = "<img src='"+src+"'>",
					icon_type = thisEl.data('icon-type');

				accessorieEl.attr({
					'data-acc-id': thisEl.data('icon-id'),
					'data-price': thisEl.data('icon-price'),
					'data-filter-image': filter_image,
					'data-icon-image': icon_image,
					'data-icon-type': icon_type,
				}).addClass('accessorie-item').append(htmlInner);
				lDesign.layoutAccessories.append(accessorieEl);

				var params = {drag: true};
				if(icon_type == 'engraved'){ 
					params.resize = true; 
					changeColorEngraved('');
				}
				(icon_type == 'ceramic')? params.upload = true : "";

				buildLayout(accessorieEl, params);

				var tr_el = buildRowPriceOverview(accessorieEl, thisEl.children('img').attr('title'), thisEl.data('icon-price'));
				
				updatePernamentTextAndCalcPrice();

				accessorieEl.find('.l-del').bind('click', function(){
					tr_el.remove();
					resetAutoNum();
				})
			})
		}

		function buildRowPriceOverview(elemDesign, title, price){
			var tr_el = $('<tr>');
			tr_el.addClass('accessorie-row-price');
			tr_el.html("<td></td> <td>"+title+"</td> <td>1</td> <td>"+price+"</td> <td>"+price+"</td>")
			$('.tbody-design-overview').append(tr_el);

			resetAutoNum();
			return tr_el;
		}

		function resetAutoNum(){
			$('.tbody-design-overview > tr').each(function(index){
				$(this).children('td').first().html(index+1); 
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
			if($('.main-layout-accessories-area .accessorie-item').length > 0){
				$('.main-layout-accessories-area .accessorie-item').each(function(){
					subtotal += parseFloat($(this).data('price'));
				})
			}

			$('.tfooter-design-overview .tfooter-tr-content .sub-title-price, .total-price-content-layout .price-inner-num').html(subtotal.toFixed(2));
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
				changeColorEngraved(value);
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
						thisEl.find('.nametext, .datetext, .add_job_or_place').css({ color: value })
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
				changeColorEngraved(value);
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
						thisEl.find('.nametext, .datetext, .add_job_or_place').css({ color: value })
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
				if(elem.children('div').length > 0){
					elem.info.top = elem.children('div').offset().top - designParams.main_frame_image.info.offset.top + parseInt(elem.info.lineHeight);
					elem.info.left = elem.children('div').offset().left - designParams.main_frame_image.info.offset.left;
				}else{
					elem.info.top = elem.offset().top - designParams.main_frame_image.info.offset.top + parseInt(elem.info.lineHeight);
					elem.info.left = elem.offset().left - designParams.main_frame_image.info.offset.left;
				}
			}

			return elem;
		}

		function buildCanvas(){
			designParams.canvas = document.createElement('canvas');
			designParams.canvas.width = designParams.main_frame_image.width();
			designParams.canvas.height = designParams.main_frame_image.height();
			designParams.context = designParams.canvas.getContext("2d");
			designParams.context.fillStyle = "#FFFFFF";
			designParams.context.fillRect(0, 0, designParams.main_frame_image.width(), designParams.main_frame_image.height());
		}



		function drawText(context, text, x, y, lineHeight, fitWidth) {

			if (CanvasRenderingContext2D && !CanvasRenderingContext2D.renderText) {
			    // @param  letterSpacing  {float}  CSS letter-spacing property
			    CanvasRenderingContext2D.prototype.renderText = function (text, x, y, letterSpacing) {
			        if (!text || typeof text !== 'string' || text.length === 0) {
			            return;
			        }
			        
			        if (typeof letterSpacing === 'undefined') {
			            letterSpacing = 0;
			        }
			        
			        // letterSpacing of 0 means normal letter-spacing
			        
			        var characters = String.prototype.split.call(text, ''),
			            index = 0,
			            current,
			            currentPosition = x,
			            align = 1;
			        
			        if (this.textAlign === 'right') {
			            characters = characters.reverse();
			            align = -1;
			        } else if (this.textAlign === 'center') {
			            var totalWidth = 0;
			            for (var i = 0; i < characters.length; i++) {
			                totalWidth += (this.measureText(characters[i]).width + letterSpacing);
			            }
			            currentPosition = x - (totalWidth / 2);
			        }
			        while (index < text.length) {
			            current = characters[index++];
			            this.fillText(current, currentPosition, y);
			            currentPosition += (align * (this.measureText(current).width + letterSpacing));
			        }
			    }
			}
			//context.renderText(text, x, y, 0.66667);
			context.renderText(text, x, y, 0.66667);

			// fitWidth = fitWidth || 0;
			// lineHeight = lineHeight || 20;
			// var currentLine = 0;
			// var lines = text.split(/\r\n|\r|\n/);
			// for (var line = 0; line < lines.length; line++) {
			// 	if (fitWidth <= 0) {
			// 		context.fillText(lines[line], x, y + (lineHeight * currentLine));
			// 	} else {
			// 		var words = lines[line].split(' ');
			// 		var idx = 1;
			// 		while (words.length > 0 && idx <= words.length) {
			// 			var str = words.slice(0, idx).join(' ');
			// 			var w = context.measureText(str).width;
			// 			if (w > fitWidth) {
			// 				if (idx == 1) {
			// 					idx = 2;
			// 				}
			// 				context.fillText(words.slice(0, idx - 1).join(' '), x, y + (lineHeight * currentLine));
			// 				currentLine++;
			// 				words = words.splice(idx - 1);
			// 				idx = 1;
			// 			}
			// 			else
			// 			{ idx++; }
			// 		}
			// 		if (idx > 0){
			// 			console.log(words);
			// 			context.fillText(words.join(' '), x, y + (lineHeight * currentLine));
			// 		}
			// 	}
			// 	currentLine++;
			// }

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
			designParams.context.font = 'bold '+cStyle.size+' '+cStyle.font; //'40pt Calibri';
      		designParams.context.fillStyle = cStyle.color; //'blue';
		}

		function canvasBuildLayoutImg(imgEl){
			var c = document.createElement('canvas'),
				ctx = c.getContext("2d"),
				w = parseInt(imgEl.css('width')),
				h = parseInt(imgEl.css('height'));

			c.width = w;
			c.height = h;
			
			ctx.drawImage(imgEl[0], 0, 0, w, h);
			return c;
		}

		function printDesign(opts){
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
			if($('input[name="hide_first_text"]').prop('checked') == false){
				drawText(designParams.context, 
					designParams.layout_firsttext_area.info.text, 
					designParams.layout_firsttext_area.info.left, 
					designParams.layout_firsttext_area.info.top, 
					parseInt(designParams.layout_firsttext_area.info.lineHeight), 
					designParams.layout_firsttext_area.width());
			}
			// end]

			// [set main-layout-name-date-area
			var main_layout_name_date_area = $('.main-layout-name-date-area');
			main_layout_name_date_area.find('.layout-inner-area').each(function(){
				var thisEl = $(this),
					element = {};
				element.nametext = thisEl.find('.nametext div'),
				element.add_job_or_place = thisEl.find('.add_job_or_place div'),
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

					//designParams.context.textAlign = 'center';
					//thisEl.info.left = thisEl.info.left + (thisEl.width() / 2); 
					thisEl.info.left = thisEl.info.left; 
					if($('input[name="hide_memorial_worlds"]').prop('checked') == false){
						drawText(designParams.context, 
							thisEl.info.text, 
							thisEl.info.left, 
							thisEl.info.top, 
							parseInt(thisEl.info.lineHeight), 
							thisEl.innerWidth());
					}
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

					//designParams.context.textAlign = 'center';
					//thisEl.info.left = thisEl.info.left + (thisEl.width() / 2); 
					thisEl.info.left = thisEl.info.left; 

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
					y = thisEl.offset().top - designParams.main_frame_image.info.offset.top,
					w = parseInt(imgEl.css('width')),
					h = parseInt(imgEl.css('height'));
				var c_img = canvasBuildLayoutImg(imgEl);
				designParams.context.drawImage(c_img, x, y);
			})
			// end]

			//$('body').append(designParams.canvas);
			if(opts.print == true){
				var datImage = designParams.canvas.toDataURL("image/png");
				//var myWindow = window.open(datImage);
				var html = "<div class''>";
					html += "<center><img style=' padding: 10px;' src='"+datImage+"'></center>";
					html += "<div style='position: relative; margin: 30px auto; width: 70%;'><div class='logo' style='float: left;'><img src='"+root_url+"/assets/public/exception/design/images/logo.png'></div>";
					html += "<div class='info' style='float: right; font-weight: bold;'><p>Baejarhraun 26,</p><p>220 Hafnarfjordur</p><p>S. 555-3888</p><p>www.granithollin.is</p></div></div>";
					html += "</div>";
				var myWindow = window.open();
				$(myWindow.document.body).html(html);
				myWindow.print();
			}else if(opts.pdf == true){
				var datImage = designParams.canvas.toDataURL("image/jpeg");
		      	var logo_base = root_url+"/assets/public/exception/design/images/logo-white-bg.jpg";
		      	var img = new Image();
		      	img.src = logo_base;
		      	img.onload = function(){
		      		var $this = $(this),
		      			c = document.createElement('canvas'),
		      			ctx = c.getContext('2d');
	      			c.width = this.naturalWidth;
	      			c.height = this.naturalHeight;
	      			ctx.drawImage(this, 0, 0);
	      			var logoBase = c.toDataURL("image/jpeg");

	      			var pdf = new jsPDF();
			      	pdf.addImage(datImage, 'JPEG', 45, 10);
			      	pdf.addImage(logoBase, 'JPEG', 15, 160);
			      	pdf.text(155, 165, "Baejarhraun 26,");
			      	pdf.text(155, 172, "220 Hafnarfjordur");
			      	pdf.text(155, 179, "S. 555-3888");
			      	pdf.text(155, 186, "www.granithollin.is");
				    pdf.save("download.pdf");
		      	}
			}else if(opts.saveImg == true){
				var datImage = designParams.canvas.toDataURL("image/jpeg");
				return datImage;
			}

			//var datImage = designParams.canvas.toDataURL("image/png");
			//window.open(datImage);
		}
		$('#btn_print_design').bind('click', function(){
			printDesign({print: true});
		})

		// data Save handle
		function setDataSave(handle){
			// console.log(dataSave);
			designParams.content_inner_design_area = $('.content-inner-design-area');
			if(designParams.content_inner_design_area.length <= 0){ return; }
			designParams.main_frame_image = designParams.content_inner_design_area.find('img#main-frame-image');
			getInfoEl(designParams.main_frame_image, {}); 

			// hide_first_text
			dataSave.hide_first_text = $('input[name="hide_first_text"]').prop('checked');
			// hide_memorial_worlds
			dataSave.hide_memorial_worlds = $('input[name="hide_memorial_worlds"]').prop('checked');
			// font-family
			dataSave.font_family = $('input[name="font-family"]:checked').val();
			// painted_text
			dataSave.painted_text = $('input#painted_text').prop('checked');
			// permanent_text
			dataSave.permanent_text = $('input#permanent_text').prop('checked');
			// color
			(dataSave.painted_text == true)? dataSave.color = $('input[name="text-color"]:checked').val() : dataSave.color = "";		

			var _main_frame_image_top = designParams.main_frame_image.offset().top,
				_main_frame_image_left = designParams.main_frame_image.offset().left;

			// First text
			var firstEl = $('.layout-firsttext-area');
			getInfoEl(firstEl, {text: true, position: true, style: true});
			dataSave.ftest.text = $.trim(firstEl.info.text);
			dataSave.ftest.x = firstEl.offset().left - _main_frame_image_left;
			dataSave.ftest.y = firstEl.offset().top - _main_frame_image_top;
			
			// Name
			dataSave.names = []; // reset names
			var nameEl = $('.main-layout-name-date-area');
			nameEl.find('.layout-name-date-area').each(function(){
				var thisItem = $(this),
					nameItem = {name: "", 
						add_job_or_place: "", 
						b_date: "",
						d_date: "",
						offset: [{name_x: 0, name_y: 0},
								{add_job_or_place_x: 0, add_job_or_place_y: 0},
								{date_x: 0, date_y: 0},
								{content_x: 0, content_y: 0}]
						};

				nameItem.name = $.trim(thisItem.find('.nametext .text-inner').text());
				nameItem.add_job_or_place = $.trim(thisItem.find('.add_job_or_place .text-inner').text());
				nameItem.b_date = $.trim(thisItem.find('.datetext .birthdatetext').text());
				nameItem.d_date = $.trim(thisItem.find('.datetext .deathdatetext').text());

				// nameItem.y = thisItem.offset().top - designParams.main_frame_image.offset().top;
				// nameItem.x = thisItem.offset().left - designParams.main_frame_image.offset().left;

				// offset name
				nameItem.offset[0].name_y = thisItem.find('.nametext .text-inner').offset().top - _main_frame_image_top;
				nameItem.offset[0].name_x = thisItem.find('.nametext .text-inner').offset().left - _main_frame_image_left;

				// offset add_job_or_place
				nameItem.offset[1].add_job_or_place_y = thisItem.find('.add_job_or_place .text-inner').offset().top - _main_frame_image_top;
				nameItem.offset[1].add_job_or_place_x = thisItem.find('.add_job_or_place .text-inner').offset().left - _main_frame_image_left;

				// date
				nameItem.offset[2].date_y = thisItem.find('.datetext').offset().top - _main_frame_image_top;
				nameItem.offset[2].date_x = thisItem.find('.datetext').offset().left - _main_frame_image_left;

				// content
				nameItem.offset[3].content_y = thisItem.offset().top - _main_frame_image_top;
				nameItem.offset[3].content_x = thisItem.offset().left - _main_frame_image_left;

				dataSave.names.push(nameItem);
			})

			// Memorial words
			dataSave.mwords = [];
			var mwordsEl = $('.layout-memorialwords-area');
			mwordsEl.find('.layout-inner-area').each(function(){
				var thisItem = $(this),
					mwordsItem = {
						text: $.trim(thisItem.text()), 
						y: thisItem.find('div').offset().top - designParams.main_frame_image.offset().top,
						x: thisItem.find('div').offset().left - designParams.main_frame_image.offset().left,
					};
				dataSave.mwords.push(mwordsItem);
			})
			dataSave.mwords.push({
				content_y: mwordsEl.offset().top - _main_frame_image_top,
				content_x: mwordsEl.offset().left - _main_frame_image_left,
			});

			// Poem
			dataSave.poem = [];
			var poemEl = $('.layout-poem-area');
			poemEl.find('.layout-inner-area').each(function(){
				var thisItem = $(this),
					poemItem = {
						text: $.trim(thisItem.text()),
						y: thisItem.find('div').offset().top - designParams.main_frame_image.offset().top,
						x: thisItem.find('div').offset().left - designParams.main_frame_image.offset().left,
					};
				dataSave.poem.push(poemItem);
			})
			dataSave.poem.push({
				content_y: poemEl.offset().top - _main_frame_image_top,
				content_x: poemEl.offset().left - _main_frame_image_left,
			});

			// accessories
			dataSave.accessories = [];
			var accessoriesEl = $('.main-layout-accessories-area');
			accessoriesEl.find('.accessorie-item').each(function(){
				var thisItem = $(this),
					type = thisItem.data('icon-type'),
					accessoriesItem = {id: thisItem.data('acc-id'),
						icon_type: type,
						y: thisItem.offset().top - designParams.main_frame_image.offset().top,
						x: thisItem.offset().left - designParams.main_frame_image.offset().left
					};

				switch(type){
					case 'ceramic':
						var image_upload = thisItem.data('image-upload');
						accessoriesItem.imageUpload = image_upload;
						break;
					case 'engraved':
						width = thisItem.width();
						accessoriesItem.width = width;
						break;
				}
				dataSave.accessories.push(accessoriesItem);
			})

			var imgData = printDesign({saveImg: true});
			
			if(!handle.handle){
				var popup = $('.popup-wapper');
				popup.addClass('active loading');
				$_data = { handle: 'saveData', data: dataSave, image: imgData, rooturl: root_url };
			}else{
				$_data = { handle: 'saveData', data: dataSave, image: imgData, rooturl: root_url, afterFunc: handle.handle, link: handle.link };
			}
			// console.log($_data);
			$.ajax({
				headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
				type: "POST",
				url: "design/ajax",
				data: $_data,
				success: function(data){
					//console.log(data)
					var obj = JSON.parse(data);
					//console.log('link share: '+root_url+'design/edit/'+obj.layout);
					if(!handle.handle){
						popup.removeClass('loading');
						var links = getLinkShare(obj.layout);
						popup.find('a.faceook-link-share').attr('href', links.f);
						popup.find('a.twitter-link-share').attr('href', links.t);
						popup.find('a.google-link-share').attr('href', links.g);
					}else if(handle.handle == 'formRegister'){
						$('#design-form-signup').find('input[name="return_url"]').val(obj.layout);
						$('#design-form-signup').find('#btn-use-sign-up-submit').click();
					}else if(handle.handle == 'formLogin'){
						$('#design-form-signin').find('input[name="return_url"]').val(obj.layout);
						$('#design-form-signin').find('#btn-use-sign-in-submit').click();
					}else if(handle.handle == 'login'){
						//alert(obj.layout);
						 window.location.href = obj.layout;
					}else if(handle.handle == 'userSaveDesign'){
						window.location.href = obj.layout
					}
				}
			})
		}

		// popup share
		$('.close-open-popup').click(function(){
			$('.popup-wapper').removeClass('active');
		})

		function getLinkShare(link){
			var link = {
				f: "https://www.facebook.com/sharer/sharer.php?u="+link+"&t=Granit Design",
				t: "https://twitter.com/share?url="+link+"&text=Granit Design",
				g: "https://plus.google.com/share?url="+link,
			}
			return link;
		}

		$('#btn_download_pdf').bind('click', function(){
			//setDataSave();
			printDesign({pdf: true});
		})

		$('#btn_share_design').bind('click', function(){
			setDataSave({});
		})

		/*-----reDesigned-----*/	
		function designedTextHandle(){
			designParams.content_inner_design_area = $('.content-inner-design-area');
			designParams.main_frame_image = designParams.content_inner_design_area.find('img#main-frame-image');
			var _mLeft = (designParams.content_inner_design_area.width() - designParams.main_frame_image.width()) / 2;

			// first text
			if(data_designed.ftest.text.length > 0){
				$('.content-first-text-field input[name="first_text"]')
				.val(data_designed.ftest.text)
				.trigger('input');
				setTimeout(function(){
					$('.content-area-design').find('.layout-firsttext-area').css({
						left: parseInt(data_designed.ftest.x) + _mLeft + 'px',
						top: parseInt(data_designed.ftest.y) + 'px',
					}) 
				}, 200)
			}

			// name
			$.each(data_designed.names, function(index, $item){
				var contentTextEl = $('.content-text'),
					nth = index + 2;
				if(index == 0){
					var nameControlText = contentTextEl.find('.control-name .content-tab:nth-child('+nth+')');					
					var layoutDesign = $('.main-layout-name-date-area .layout-name-date-area:nth-child('+ index+1 +')');	
				}else{
					$('.controler-tab-name li:last-child a').trigger('click');
					var nameControlText = contentTextEl.find('.control-name .content-tab:nth-child('+nth+')');					
					var layoutDesign = $('.main-layout-name-date-area .layout-name-date-area:nth-child('+ index+1 +')');
				}

				nameControlText.find('input[name="name"]').val($item.name).trigger('input');
				if($item.add_job_or_place != ''){
					nameControlText.find('.btn-custom-design').click();
					nameControlText.find('input[name="add_job_or_place"]').val($item.add_job_or_place).trigger('input');
				}
				if($item.b_date != ''){
					var b_date = $item.b_date.split(". "); 
					nameControlText.find('.b-date input[name="b-d"]').val(b_date[1]).trigger('input');
					nameControlText.find('.b-date input[name="b-m"]').val(b_date[2]).trigger('input');
					nameControlText.find('.b-date input[name="b-y"]').val(b_date[3]).trigger('input');
				}
				if($item.d_date != ''){
					var d_date = $item.d_date.split(". "); 
					nameControlText.find('.d-date input[name="d-d"]').val(d_date[1]).trigger('input');
					nameControlText.find('.d-date input[name="d-m"]').val(d_date[2]).trigger('input');
					nameControlText.find('.d-date input[name="d-y"]').val(d_date[3]).trigger('input');
				}
				// console.log($item);
				setTimeout(function(){
					layoutDesign.css({
						left: parseInt($item.offset[3].content_x) + _mLeft + 'px',
						top: parseInt($item.offset[3].content_y) + 'px'
					})
				}, 200)
			})

			// Memorial words 
			//console.log(data_designed.mwords);
			if(data_designed.mwords.length > 0){
				var offsetContent = data_designed.mwords.pop(); 
				// console.log(offsetContent);
				$.each(data_designed.mwords, function(index, $item){
					var contentMwEl = $('.control-memorial-worlds'),
					nth = index + 3;
					if(index == 0){
						var mwControlText = contentMwEl.find('.content-tab:nth-child('+nth+')');					
						//var layoutDesign = $('.layout-memorialwords-area .layout-inner-area:nth-child('+ index+1 +')');	
					}else{
						$('.controler-tab-memorial-worlds li:last-child a').trigger('click');
						var mwControlText = contentMwEl.find('.content-tab:nth-child('+nth+')');					
						//var layoutDesign = $('.layout-memorialwords-area .layout-inner-area:nth-child('+ index+1 +')');	
					}

					mwControlText.find('input[name="memorial-worlds"]').val($item.text).trigger('input');
				})
				$('.layout-memorialwords-area').css({
					left: parseInt(offsetContent.content_x) + _mLeft + 'px',
					top: parseInt(offsetContent.content_y) + 'px'
				})
			}	

			// Poem
			if(data_designed.poem.length > 0){
				$('.btn-poem-js').trigger('click');

				var offsetContent = data_designed.poem.pop(); 
				$.each(data_designed.poem, function(index, $item){
					var contentPoemEl = $('.control-poem'),
					nth = index + 4;
					if(index == 0){
						var poemControlText = contentPoemEl.find('.content-tab:nth-child('+nth+')');					
					}else{
						$('.controler-tab-poem li:last-child a').trigger('click');
						var poemControlText = contentPoemEl.find('.content-tab:nth-child('+nth+')');					
					}
					poemControlText.find('input[name="poem"]').val($item.text).trigger('input');
				})
				$('.layout-poem-area').css({
					left: parseInt(offsetContent.content_x) + _mLeft + 'px',
					top: parseInt(offsetContent.content_y) + 'px'
				})
			}

			// set option text	
			var timeout = '';
			timeout = setTimeout(function(){
				
				if(data_designed.hide_first_text == 'true'){
					$('input[name="hide_first_text"]').trigger('click'); 
				}
				if(data_designed.hide_memorial_worlds == 'true'){
					$('input[name="hide_memorial_worlds"]').trigger('click'); 
				}
				if(data_designed.painted_text == 'true'){
					$('input#painted_text').trigger('click'); }
				if(data_designed.painted_text == 'true'){
					$('.content-color-text').find('input[value="'+data_designed.color+'"]').trigger('click');
					$('.content-color-text').css({
						opacity: 1,
						pointerEvents: 'auto',
					})
				}
				$('.control-fonts-content').find('input[value="'+data_designed.font_family+'"]').trigger('click');
			
				$('.controler-tab li:last-child a').trigger('click');
			}, 300);

			designedAccessoriesHandle(_mLeft);
		}

		function designedAccessoriesHandle(_mLeft){
			if(typeof data_designed.accessories !== "undefined" && data_designed.accessories.length > 0){
				$.each(data_designed.accessories, function(index, item){
					$.ajax({
						headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
						type: "POST",
						url: "design/ajax",
						data: { handle: 'getAccessories', id: item.id, x: item.x, y: item.y, itemData: item},
						success: function(data){
							if(data){
								var layout = JSON.parse(data);
									obj = JSON.parse(layout.layout);
								
								var src = obj.image,
									accessorieEl = $('<div>'),
									htmlInner = "<img src='"+root_url+src+"'>";
								accessorieEl.css({
									left: parseInt(obj.x)+_mLeft+'px',
									top: obj.y+'px',
								})
								accessorieEl.attr({
									'data-acc-id': obj.id,
									'data-price': obj.price,
									'data-icon-image': root_url+'/'+obj.image,
									'data-filter-image': '',
									'data-icon-type': obj.itemData.icon_type,
								}).addClass('accessorie-item').append(htmlInner);
								lDesign.layoutAccessories.append(accessorieEl);
								var buildLayoutParams = {drag: true};

								switch(obj.itemData.icon_type){
									case 'engraved':
										accessorieEl.css('width', obj.itemData.width+'px');
										buildLayoutParams.resize = true;
										setTimeout(changeColorEngraved(''), 500);
										break;
									case 'ceramic':
										accessorieEl.attr('data-filter-image', root_url+'/'+obj.filter_image);
										accessorieEl.attr('data-image-upload', obj.itemData.imageUpload);
										var params = {
											frame: root_url+'/'+obj.image,
											image: obj.itemData.imageUpload,
											filter: root_url+'/'+obj.filter_image,
											afterHandle: function(data){
												accessorieEl.find('img').attr('src', data);
											}
										};
								      	canvasOverlayFrame(params);
										buildLayoutParams.upload = true;
										break;
								}
								buildLayout(accessorieEl, buildLayoutParams);
								
								var tr_el = buildRowPriceOverview(accessorieEl, obj.title, obj.price);
								updatePernamentTextAndCalcPrice();
								accessorieEl.find('.l-del').bind('click', function(){
									tr_el.remove();
									resetAutoNum();
								})
							}
						}
					})
				})
			}
		}
		/*-----End reDesigned-----*/
	})
})(jQuery)
