$(function() {
	$(".fancybox").fancybox({
		
		padding: 20,
		margin: 60,
		loop: false,
		
		openEffect: 'fade',
		openSpeed: 500,
		openEasing: 'easeInQuart',

		closeEffect: 'fade',
		closeSpeed: 500,
		closeEasing: 'easeOutCirc',

		nextEffect: 'fade',
		nextSpeed: 780,
		nextEasing: 'easeOutCirc',

		prevEffect: 'fade',
		prevSpeed: 780,
		prevEasing: 'easeOutCirc',
		
		
		helpers: {
			title : {
				type : 'outside'
			},
			overlay : {
				speedIn : 400,
				css : {
						'background' : 'rgba(111, 91, 80, 0.6)'
					},
				closeClick: false
			},
		}
	});
});
