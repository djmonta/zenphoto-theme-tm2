$(function() {

	$('.thumbnails figure').livingFade({ 
		maxDelay: 1,
		minSpeed: 1,
		maxSpeed: 1,
		affected: '.photoswipe',
		fadeTo: 0,
	});

	$('.thumbnails figure').livingFade({ 
		maxDelay: 2200,
		minSpeed: 1800,
		maxSpeed: 900,
		affected: '.photoswipe',
		fadeTo: 1,
	});

	$(".thumbnails figure a").fadeTo(1,1)
    .hover( 
        function(){// mouse_over
            $(this).fadeTo(120, 0.6);
        },
        function(){// mouse_out
            $(this).fadeTo(180, 1);
        }
    );
});