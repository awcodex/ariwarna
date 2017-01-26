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
	
	$(document).ready( function() {

	var itemSelector = '.grid-item'; 

	var $container = $('#container').isotope({
		itemSelector: itemSelector,
		masonry: {
		  // columnWidth: itemSelector,
		  // isFitWidth: true
		}
	});

	//Ascending order
	var responsiveIsotope = [
		[480, 4],
		[720, 6]
	];

	var itemsPerPageDefault = 8;
	var itemsPerPage = defineItemsPerPage();
	var currentNumberPages = 1;
	var currentPage = 1;
	var currentFilter = '*';
	var filterAtribute = 'data-filter';
	var pageAtribute = 'data-page';
	var pagerClass = 'isotope-pager';

	function changeFilter(selector) {
		$container.isotope({
			filter: selector
		});
	}


	function goToPage(n) {
		currentPage = n;

		var selector = itemSelector;
			selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
			selector += '['+pageAtribute+'="'+currentPage+'"]';

		changeFilter(selector);
	}

	function defineItemsPerPage() {
		var pages = itemsPerPageDefault;

		for( var i = 0; i < responsiveIsotope.length; i++ ) {
			if( $(window).width() <= responsiveIsotope[i][0] ) {
				pages = responsiveIsotope[i][1];
				break;
			}

			

		}

		return pages;
	}
	
	function setPagination() {

		var SettingsPagesOnItems = function(){

			var itemsLength = $container.children(itemSelector).length;
			
			var pages = Math.ceil(itemsLength / itemsPerPage);
			var item = 1;
			var page = 1;
			var selector = itemSelector;
				selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
			
			$container.children(selector).each(function(){
				if( item > itemsPerPage ) {
					page++;
					item = 1;
				}
				$(this).attr(pageAtribute, page);
				item++;
			});

			currentNumberPages = page;

		}();

		var CreatePagers = function() {

			var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);

			$isotopePager.html('');
			
			for( var i = 0; i < currentNumberPages; i++ ) {
				var $pager = $('<a href="javascript:void(0);" class="pager" '+pageAtribute+'="'+(i+1)+'"></a>');
					$pager.html(i+1);
					
					$pager.click(function(){
						$('.pager').css('class', 'active')
						var page = $(this).eq(0).attr(pageAtribute);
						goToPage(page);
					});

				$pager.appendTo($isotopePager);
			}

			$container.after($isotopePager);

		}();

	}

	setPagination();
	goToPage(1);

	//Adicionando Event de Click para as categorias
	$('.filters a').click(function(){
		var filter = $(this).attr(filterAtribute);
		currentFilter = filter;

		setPagination();
		goToPage(1);


	});

	//Evento Responsivo
	$(window).resize(function(){
		itemsPerPage = defineItemsPerPage();
		setPagination();
		goToPage(1);
	});
});
$('#portMenu li').click(function() {
      $("li.active").removeClass("active");
      $(this).addClass('active');
});
$(document).ready(function(){
$("a.pager:first").addClass('active');
$('a.pager').click(function() {
      $("a.pager").removeClass("active");
      $(this).addClass('active');
});
});