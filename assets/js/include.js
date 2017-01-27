
// Load posts via AJAX
	$(".post-link").click(function(e) {
		e.preventDefault();
		$("#project-container").html('<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h3>Image OTW ... </h3></div><div class="modal-body entry-content"><div class="loadingfoo"></div></div></div></div>');
		//   return false;
	  // $("#loading-animation").show();
		var post_id = $(this).attr('rel');
		var ajaxURL = site.ajaxurl;
		$.ajax({
			type: 'POST',
			url: ajaxURL,
			data: {"action": "load-content", post_id: post_id },
			success: function(response) {
				$("#project-container").html(response);
			   // $("#loading-animation").hide();
			return false;
			}
		});
	});  
var ppp = 6; // Post per page 
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    var ajaxURL = site.ajaxurl;
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajaxURL,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                $("#more_posts").attr("disabled",false);
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
   // return false;
}
 
$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
	 $("#more_posts").addClass('stoper'); 
    load_posts();
});  

$(window).on('scroll', function(){
    if($('body').scrollTop()+$(window).height() > $('footer').offset().top){
        if(!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))){
                load_posts();
        }
    }
});