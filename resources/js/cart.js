

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
		$( '<a class="btn btn-outline-primary" href="/cart">View Cart</a>' ).insertAfter(btn);
		$('#nCartItems').html(parseInt($('#nCartItems').html())+1);
	});
});