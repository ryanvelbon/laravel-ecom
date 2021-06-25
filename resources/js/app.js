// require('./bootstrap');


// To make a form submitted using Ajax, simply add class "ajax-form"
$(".ajax-form").on("submit", function(event){

	event.preventDefault();

	var url = $(this).attr("action");
	var formData= $(this).serialize();

	$.post(url, formData, function(data){
		console.log(data);
	});
});



$(".add-to-cart-form").on("submit", function(event){

	event.preventDefault();
	var btn = $(this).find('button[type="submit"]');
	var originalBtnText = btn.html();

	btn.prop('disabled', true);
	btn.html('adding...');

	var url = $(this).attr("action");
	var formData= $(this).serialize();

	$.post(url, formData, function(data){
		console.log(data);
		btn.prop('disabled', false);
		btn.html(originalBtnText);
		if(!btn.hasClass("already-clicked")){
			$( '<a class="btn btn-outline-primary" href="/cart">View Cart</a>' ).insertAfter(btn);
		}
		btn.addClass("already-clicked");
		$('#nCartItems').html(parseInt($('#nCartItems').html())+1);
	});
});