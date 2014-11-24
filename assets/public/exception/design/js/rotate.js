(function ( $ ) {
	var activeEl = '';
	var position = '';
	var connect = '';
	var showDeg = '';
	$.fn.rotate = function( options ) {
		// option
        var settings = $.extend({
			connectRotate: '',
        }, options );
		
		return this.each(function(){
			var $this = jQuery(this); // this El
			var showDegEl = document.createElement('span');
			var connectEl = jQuery(settings.connectRotate); // El connect
			var controlEl = document.createElement('span'); // create El control rotate
				
			// check position css 
			if($this.css('position') != 'relative' && $this.css('position') != 'absolute'){
				$this.addClass('pl_rotate_content');
			}
			
			jQuery(controlEl).addClass('pl_rotate_control').attr({'title': 'rotate'});
			jQuery(showDegEl).addClass('pl_rotate_show_deg').html('0&deg;');
			$this.attr('deg', 0);
			connectEl.attr('deg', 0);
			
			jQuery(controlEl).bind('mousedown touchstart', function(e){
				e.preventDefault();
				e.stopPropagation();
				connect = connectEl;
				showDeg = jQuery(showDegEl); showDeg.fadeIn();
				activeEl = $this;
				position = $this.offset();
			})
			
			$this.append(controlEl); // append el control		
			$this.append(showDegEl); // append el show deg		
		})
	}
	
	// event mouse
	jQuery(document).bind('mousemove mouseup touchmove touchend', function(e){
		if(activeEl){
			var event = e.type;
			if(event == 'mousemove' || event == 'touchmove'){
				mouse(e, activeEl, connect, showDeg);
			} else if( event == 'mouseup' || event == 'touchend' ){
				activeEl = '';
				showDeg.fadeOut();
			}
		}
	})
	
	// get deg value
	function mouse(evt, activeEl, connect, showDeg){
		if(evt.type == 'touchmove'){
			var touch = evt.originalEvent.touches[0] || evt.originalEvent.changedTouches[0]; // touch event
			var mouse_x = touch.pageX; 
			var mouse_y = touch.pageY;
		}else{
			var mouse_x = evt.pageX  
			var mouse_y = evt.pageY;
		}
		
		var cent  = {X: activeEl.width()/2, Y: activeEl.height()/2};
		var mPos    = {X: mouse_x-position.left, Y: mouse_y-position.top};
		var getAtan = Math.atan2(mPos.X-cent.X, mPos.Y-cent.Y);
		var degree  = parseInt(-getAtan/(Math.PI/180) + 135);
		
		// call func rotate
		rotate(activeEl, degree, showDeg);
		if(connect){
			rotate(connect, degree, showDeg);
		}
    }
	
	// rotate
	function rotate(El, degree, showDeg){
		El.css('-moz-transform', 'rotate(' + degree + 'deg)');
		El.css('-webkit-transform', 'rotate(' + degree + 'deg)');
		El.css('-o-transform', 'rotate(' + degree + 'deg)');
		El.css('-ms-transform', 'rotate(' + degree + 'deg)');
		
		// update deg attr & show deg
		El.attr('deg', degree);	
		showDeg.html(degree+'&deg;');
		degree = degree * -1;
		showDeg.css('-moz-transform', 'rotate(' + degree + 'deg)');
		showDeg.css('-webkit-transform', 'rotate(' + degree + 'deg)');
		showDeg.css('-o-transform', 'rotate(' + degree + 'deg)');
		showDeg.css('-ms-transform', 'rotate(' + degree + 'deg)');
	}
}( jQuery ))