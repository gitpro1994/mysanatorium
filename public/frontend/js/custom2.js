$(document).ready(function (){
	var help_block = $(".help--block");
	var help_block_height = help_block.height();
	help_block_height = help_block_height + 100;
	help_block_height = "-"+help_block_height+"px";
	help_block.css({marginTop: help_block_height});
});
$(document).scroll(function (){
	var help_block = $(".help--block");
	var video = $("#video_container");
	var head = $(".head-main");
	var scroll = $(window).scrollTop();
	var help_block_height = help_block.height();
	help_block_height = help_block_height + 168;
	if((scroll > help_block_height) && (help_block.css("display") != "none"))  {
		help_block_height = "-"+help_block_height+"px";
		help_block.stop().hide().animate({ marginTop: help_block_height}, 0);
		video.stop().animate({ marginTop: '0px'}, 0);
		head.stop().animate({ marginTop: '0px'}, 0);
		$("body").stop().animate({scrollTop:68}, 0);
	}
});
function showing(element,action) {
	var help_block = $(".help--block");
	var video = $("#video_container");
	var head = $(".head-main");
	var help_block_height = help_block.height();
	help_block_height = help_block_height + 100;
	if(action == "open") {
		help_block_height = help_block_height+"px";
		help_block.stop().show().animate({ marginTop: '68px'}, 400);
		video.stop().animate({ marginTop: help_block_height}, 400);
		head.stop().animate({ marginTop: help_block_height}, 400);
		$("body").stop().animate({scrollTop:68}, '400')
	} else if (action == "close") {
		help_block_height = "-"+help_block_height+"px";
		help_block.stop().hide().animate({ marginTop: help_block_height}, 0);
		video.stop().animate({ marginTop: '0px'}, 0);
		head.stop().animate({ marginTop: '0px'}, 0);
		$("body").stop().animate({scrollTop:0}, 0);
	}
	
}