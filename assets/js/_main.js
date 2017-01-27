(function($){var Roots={common:{init:function(){
if(screen.width>760){	
$(window).bind("load", function(){
	$('.tooltipo').hover(function(){
		$('.zwing', this).toggle('slideDown');
	}); 
	$('.tooltipo .zwing').each(function() {
	var tofer = $(this).height();
	$(this).css('top', -tofer); 
	});
}); 
} 
	$(document).ready(function(){if(screen.width>760){$(".regular").slick({slidesToShow:2,slidesToScroll:2,autoplay:true,autoplaySpeed:6000,dots:true,});}else{$(".regular").slick({slidesToShow:1,slidesToScroll:1,autoplay:true,autoplaySpeed:6000,dots:true,});}if(screen.width>760){$(".the-clients").slick({slidesToShow:6,slidesToScroll:1,autoplay:true,autoplaySpeed:4000,dots:true,});}else{$(".the-clients").slick({slidesToShow:2,slidesToScroll:1,autoplay:true,autoplaySpeed:4000,dots:true,});}if(screen.width>760){$(".the-part").slick({slidesToShow:6,slidesToScroll:1,autoplay:true,autoplaySpeed:5000,});}else{$(".the-part").slick({slidesToShow:2,slidesToScroll:1,autoplay:true,autoplaySpeed:5000,});}equalheight=function(container){var currentTallest=0,currentRowStart=0,rowDivs=new Array(),$el,topPosition=0;$(container).each(function(){$el=$(this);$($el).height('auto')
topPostion=$el.position().top;if(currentRowStart!=topPostion){for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest);}rowDivs.length=0;currentRowStart=topPostion;currentTallest=$el.height();rowDivs.push($el);}else{rowDivs.push($el);currentTallest=(currentTallest<$el.height())?($el.height()):(currentTallest);}for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest);}});}
if(screen.width>760){
		$(window).load(function(){
			equalheight('.pimage a img');equalheight('.content .the-equal');equalheight('.clearfix .kotlink');
		});$(window).resize(function(){equalheight('.pimage a img');equalheight('.content .the-equal');equalheight('.clearfix .kotlink');});
}});$(document).scroll(function(e){var scrollTop=$(document).scrollTop();$bcontent=$(".wrapper-banner").innerHeight();if(scrollTop>$bcontent){console.log(scrollTop);$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');$('.navbar').addClass('smaller-icn');}else{$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');$('.navbar').removeClass('smaller-icn');}});}},portfolio:{init:function(){}},home:{init:function(){$(function(){
	$(window).bind("load", function(){
		var pulHe = $('.aw-vibanner').innerHeight();
		var potHe = $('.row.step-one').height() * 1.2;
		var slHe = pulHe - potHe;
		$('#da-slider').css('min-height', slHe);
	});
	$('#da-slider').cslider({autoplay:true,interval:5000,bgincrement:450});});$(document).ready(function(){function setHeight(){windowHeight=$(window).innerHeight();$('.forheight').css('height',windowHeight);$('.tinggi-pul').css('height',windowHeight);};setHeight();$(window).resize(function(){setHeight();});});$(document).scroll(function(e){var scrollTop=$(document).scrollTop();$wcontent=$(window).height();if(scrollTop>$wcontent){console.log(scrollTop);$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');$('.navbar').addClass('smaller-icn');}else{$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');$('.navbar').removeClass('smaller-icn');}});}},about_us:{init:function(){}}};var UTIL={fire:function(func,funcname,args){var namespace=Roots;funcname=(funcname===undefined)?'init':funcname;if(func!==''&&namespace[func]&&typeof namespace[func][funcname]==='function'){namespace[func][funcname](args);}},loadEvents:function(){UTIL.fire('common');$.each(document.body.className.replace(/-/g,'_').split(/\s+/),function(i,classnm){UTIL.fire(classnm);});}};$(document).ready(UTIL.loadEvents);})(jQuery); 