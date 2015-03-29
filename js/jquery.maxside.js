jQuery.fn.maxSide = function(settings) {
		// if no paramaters supplied...
		settings = jQuery.extend({
			maxSide: 100
		}, settings);		
		return this.each(function(){
				var maximum = settings.maxSide;
				var thing = jQuery(this);
				var thewidth = thing.width();
	            var theheight = thing.height();
	
				if (thewidth >= theheight) {
	                if (thewidth >= maximum) {
	                    thing.attr({
	                        width: maximum
	                    });
	                }
	            }

	            if (theheight >= thewidth) {
	                if (theheight >= maximum) {
	                    thing.attr({
	                        height: maximum
	                    });
	                }
	            }
		});	
};