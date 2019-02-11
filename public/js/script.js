//admin/agents page



//agent/contacts

//modal reset
$(document).ready(function() {
 	$('.modal').on('hidden.bs.modal', function () {
    	$(this).find('form').trigger('reset');
	});
});










//scroll to top
$(window).scroll(function(){
    if ($(this).scrollTop() > 20) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
}); 

$('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});