/* ==================================================
   accordion
================================================== */
$(function($){
	
	$('#accordionArea .accordion-body').hide(); 
	$('.acc_trigr:first').addClass('active').next().show(); 
	$('#accordionArea .accordion-heading').click(function(){
	if( $(this).next().is(':hidden') ) {
		$('.accordion-heading').removeClass('active').next().slideUp(); 
		$(this).toggleClass('active').next().slideDown(); 
	}
	return false;
	});
	
$('#accordionArea .accordion-body').hide(); 
$('#accordionArea .accordion-heading:first').addClass('active').next().show(); 
$('#accordionArea .accordion-heading').click(function(){
	if( $(this).next().is(':hidden') ) {
		$('#accordionArea .accordion-heading').removeClass('active').next().slideUp(); 
		$(this).toggleClass('active').next().slideDown(); 
	}
	return false; 
});


$("select").wrap("<div class='style-select'></div>");
$('.style-select .form-control').addClass("select");
/* ==================================================
   select
================================================== */	
$('select.select').each(function(){
	var title = $(this).attr('title');
	if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
	$(this)
	.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
	.after('<span class="select">' + title + '</span>')
	.change(function(){
		val = $('option:selected',this).text();
		$(this).next().text(val);
	})
});

/* ==================================================
   toggle
================================================== */	
$("#toggleArea .accordion-body").hide();
$('#toggleArea .togglize').click(function(){
	$(this).siblings(".accordion-body").slideToggle("slow");
	return false;
});

});