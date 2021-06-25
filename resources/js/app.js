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