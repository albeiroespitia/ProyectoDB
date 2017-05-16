$(document).ready(function(){

	$('.ulItem1').click(function(){
		var scrollProduct = $('.productSection').offset().top;
		$('html, body').animate({scrollTop:scrollProduct},2000);		
	})

	$('.ulItem2').click(function(){
		var scrollProjects = $('.projectsSection').offset().top
		$('html, body').animate({scrollTop:scrollProjects},2000);		
	})

	$('.ulItem3').click(function(){
		var scrollService = $('.serviceSection').offset().top
		$('html, body').animate({scrollTop:scrollService},2000);		
	})

})