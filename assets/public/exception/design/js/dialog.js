// Author Hieu Huynh
// Date 27.7.14
// POPUP USE $.dialog({ mess: "Hello world." });
// Params  title(title dialog), mess(message dialog), confirm(call func after confirm), width(width dialog)

!(function($){
	String.prototype.format = function () {
		var args = arguments;
		return this.replace(/\{\{|\}\}|\{(\d+)\}/g, function (m, n) {
			if (m == "{{") { return "{"; }
			if (m == "}}") { return "}"; }
			return args[n];
		});
	};
	
	function dialog($opts){
		$opts = $.extend({
			title	: 'Message',
			mess	: '...',
			confirm	: '',
			width	: '55%'
		}, $opts);
		this.init($opts);
	}

	dialog.prototype = {
		init: function($opts){
			var parent	= this,
				dialog	= $('<div>'),
				content	= $('<div>'),
				c_btn	= $('<div>'),
				ok 		= $('<button>'),
				cancel 	= $('<button>');
			
			ok.addClass('btn_ok').html('OK');
			cancel.addClass('btn_cancel').html('Cancel');
			
			c_btn
			.addClass('btn_control')
			.append(ok);
			if($opts.confirm){ 
				c_btn.append(cancel);
				cancel.click(function(){ parent.handle_cancel(dialog); })
				ok.click(function(){
					parent.handle_confirm(dialog, $opts)
				})
			}else{
				ok.click(function(){ parent.handle_cancel(dialog); })
			}
			
			content
			.addClass('dialogcontent')
			.css({ width: $opts.width })
			.html('<div class="dialogmessage"><h4>{0}</h4><p>{1}</p></div>'.format($opts.title, $opts.mess))
			.append(c_btn)
			
			dialog
			.addClass('_mydialog')
			.append(content)
			
			$(document.body).append(dialog);
			
			// animate
			setTimeout(function(){ content.addClass('in'); }, 50)
		},
		handle_confirm: function(elem, $opts){
			this.handle_cancel(elem);
			$opts.confirm.call();
		},
		handle_cancel: function(elem){
			elem.children('.dialogcontent').removeClass('in');
			elem.fadeOut(300, function(){
				elem.remove();
			})
		}
	}
	
	$.dialog = function($opts){
		new dialog($opts);
	}
})(jQuery)