$(document).ready(function() {
	new jBox('Tooltip', {
		attach: '.hover',
	  	theme: 'TooltipDark',
	  	animation: 'zoomOut',
	  	getContent: 'data-jbox-content'
	});
});

  