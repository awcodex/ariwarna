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
		var potHe = $('.row.step-one').height();
		var slHe = pulHe - potHe;
		$('#da-slider').css('min-height', slHe);
	});
	$('#da-slider').cslider({autoplay:true,interval:5000,bgincrement:450});});$(document).ready(function(){function setHeight(){windowHeight=$(window).innerHeight();$('.forheight').css('height',windowHeight);$('.tinggi-pul').css('height',windowHeight);};setHeight();$(window).resize(function(){setHeight();});});$(document).scroll(function(e){var scrollTop=$(document).scrollTop();$wcontent=$(window).height();if(scrollTop>$wcontent){console.log(scrollTop);$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');$('.navbar').addClass('smaller-icn');}else{$('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');$('.navbar').removeClass('smaller-icn');}});}},about_us:{init:function(){}}};var UTIL={fire:function(func,funcname,args){var namespace=Roots;funcname=(funcname===undefined)?'init':funcname;if(func!==''&&namespace[func]&&typeof namespace[func][funcname]==='function'){namespace[func][funcname](args);}},loadEvents:function(){UTIL.fire('common');$.each(document.body.className.replace(/-/g,'_').split(/\s+/),function(i,classnm){UTIL.fire(classnm);});}};$(document).ready(UTIL.loadEvents);})(jQuery); 

$(document).ready(function(){ 
	$(function() {
		$( "#datepicker" ).datepicker();
	});				
});


jQuery(document).ready(function() {
	//Contact
	jQuery('#first_name').on('focusout', function(event){
		var first_name = jQuery('#first_name');
		if( first_name.val() === '' ){
			first_name.addClass('required');
		} else {
			first_name.removeClass('required');
		}
	});
   
   jQuery('#last_name').on('focusout', function(event){
     var last_name = jQuery('#last_name');
     if( last_name.val() === '' ){
       last_name.addClass('required');
     } else {
       last_name.removeClass('required');
     }
   });
    
	jQuery('#email').on('focusout', function(event){
		var email = jQuery('#email');
		var vEmail = email.val();
		var cEmail = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
		if( vEmail === '' ){
			email.addClass('required');
		} else if( !cEmail.test(vEmail) ){
			email.removeClass('required');
			email.addClass('error-email');
		} else {
			email.removeClass('required error-email');
		}
	});
    
	jQuery("#btn_contact").click( function(e) {
		e.preventDefault();
		var post_data = jQuery('#form_contact').serialize();
		var form_action = '/wp-admin/admin-ajax.php'; //Directory and file name to save poses
		var form_method = jQuery('#form_contact').attr("method");
		var first_name = jQuery('#first_name');
	//	var last_name = jQuery('#last_name');
		var email = jQuery('#email');
		if( first_name.val() !== '' && email.val() !== '' ){
			$.ajax({
				type: form_method,
				url: form_action,
				cache: false,
				data: post_data,
				success: function(response) {
					jQuery("#success").fadeIn("slow");
					jQuery('#success').html('<span class="success">Message has be send!</span>');
						setTimeout( function ( ) {
							$('#success').fadeOut('slow');
						}, 10000 );
					$('#form_contact').trigger("reset");
				}
			});
		} else {
			jQuery("#node").fadeIn("slow");
				jQuery('#node').html('<span class="error">Please Fill all field to Submit data!</span>');
				setTimeout( function ( ) {
					$('#node').fadeOut('slow');
				}, 10000 );
			if(first_name.val() === ''){
				first_name.addClass('required');
			}
			// if(last_name.val() === ''){
				// last_name.addClass('required');
			// }
			if(email.val() === ''){
				email.addClass('required');
			}
		}
	});
   
   //Enroll 
   jQuery('#name').on('focusout', function(event){
     var name = jQuery('#name');
     if( name.val() === '' ){
       name.addClass('required');
     } else {
       name.removeClass('required');
     }
   }); 
   
   jQuery('#artist_band_name').on('focusout', function(event){
     var artist_band_name = jQuery('#artist_band_name');
     if( artist_band_name.val() === '' ){
       artist_band_name.addClass('required');
     } else {
       artist_band_name.removeClass('required');
     }
   });
     
  
   jQuery("#btn_enroll").click( function(e) {
     e.preventDefault();
     var post_data = jQuery('#enrollment').serialize();
     var form_action = '/wp-admin/admin-ajax.php'; //Directory and file name to save poses
     var form_method = jQuery('#enrollment').attr("method");
     var name = jQuery('#name'); 
     var artist_band_name = jQuery('#artist_band_name');
     if( name.val() !== '' && artist_band_name.val() !== '' ){
       $.ajax({
         type: form_method,
         url: form_action,
         cache: false,
         data: post_data,
         success: function(response) {
			jQuery("#success").fadeIn("slow");
            jQuery('#success').html('<span class="success">Message has be send!</span>');
		    $('#enrollment').trigger("reset");
         }
       });
     } else {
		jQuery("#node").fadeIn("slow");
       jQuery('#node').html('<span class="error">Please Fill all field to Submit data!</span>');
       if(name.val() === ''){
         name.addClass('required');
       } 
       if(artist_band_name.val() === ''){
         artist_band_name.addClass('required');
       }
     }
   });
   
 });