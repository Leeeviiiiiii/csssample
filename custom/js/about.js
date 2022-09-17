$(document).ready(function(){
	
	$(".self_photo").mouseenter(function(){
		$("#self_img").animate({width: '25%'}, 120);
	});

	$(".self_photo").mouseleave(function(){
		$("#self_img").animate({width: '20%'}, 120);
	});
});
