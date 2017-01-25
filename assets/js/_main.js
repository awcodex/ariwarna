(function($){var Roots={common:{init:function(){
	
$(window).bind("load", function(){
	$('.tooltipo').hover(function(){
		$('.zwing', this).toggle('slideDown');
	}); 
	$('.tooltipo .zwing').each(function() {
	var tofer = $(this).height();
	$(this).css('top', -tofer); 
	});
});
	$(document).ready(function(){if(screen.width>760){$(".regular").slick({slidesToShow:2,slidesToScroll:2,autoplay:true,autoplaySpeed:6000,dots:true,});}else{$(".regular").slick({slidesToShow:1,slidesToScroll:1,autoplay:true,autoplaySpeed:6000,dots:true,});}if(screen.width>760){$(".the-clients").slick({slidesToShow:6,slidesToScroll:1,autoplay:true,autoplaySpeed:4000,dots:true,});}else{$(".the-clients").slick({slidesToShow:2,slidesToScroll:1,autoplay:true,autoplaySpeed:4000,dots:true,});}if(screen.width>760){$(".the-part").slick({slidesToShow:6,slidesToScroll:1,autoplay:true,autoplaySpeed:5000,});}else{$(".the-part").slick({slidesToShow:2,slidesToScroll:1,autoplay:true,autoplaySpeed:5000,});}equalheight=function(container){var currentTallest=0,currentRowStart=0,rowDivs=new Array(),$el,topPosition=0;$(container).each(function(){$el=$(this);$($el).height('auto')
topPostion=$el.position().top;if(currentRowStart!=topPostion){for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest);}rowDivs.length=0;currentRowStart=topPostion;currentTallest=$el.height();rowDivs.push($el);}else{rowDivs.push($el);currentTallest=(currentTallest<$el.height())?($el.height()):(currentTallest);}for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest);}});}
if(screen.width>760){$(window).bind("load", function(){equalheight('.pimage a img');equalheight('.content .the-equal');equalheight('.clearfix .kotlink');});$(window).resize(function(){equalheight('.pimage a img');equalheight('.content .the-equal');equalheight('.clearfix .kotlink');});}});$(document).scroll(function(e){var scrollTop=$(document).scrollTop();$bcontent=$(".wrapper-banner").innerHeight();if(scrollTop>$bcontent){console.log(scrollTop);$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');$('.navbar').addClass('smaller-icn');}else{$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');$('.navbar').removeClass('smaller-icn');}});}},portfolio:{init:function(){}},home:{init:function(){$(function(){$('#da-slider').cslider({autoplay:true,interval:5000,bgincrement:450});});$(document).ready(function(){function setHeight(){windowHeight=$(window).innerHeight();$('.forheight').css('height',windowHeight);$('.tinggi-pul').css('height',windowHeight);};setHeight();$(window).resize(function(){setHeight();});});$(document).scroll(function(e){var scrollTop=$(document).scrollTop();$wcontent=$(window).height();if(scrollTop>$wcontent){console.log(scrollTop);$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');$('.navbar').addClass('smaller-icn');}else{$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');$('.navbar').removeClass('smaller-icn');}});}},about_us:{init:function(){}}};var UTIL={fire:function(func,funcname,args){var namespace=Roots;funcname=(funcname===undefined)?'init':funcname;if(func!==''&&namespace[func]&&typeof namespace[func][funcname]==='function'){namespace[func][funcname](args);}},loadEvents:function(){UTIL.fire('common');$.each(document.body.className.replace(/-/g,'_').split(/\s+/),function(i,classnm){UTIL.fire(classnm);});}};$(document).ready(UTIL.loadEvents);})(jQuery);
//jQuery is required to run this code
$( document ).ready(function() {

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}