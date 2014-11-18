$(document).ready(function() {
	$('.tab').on('click', function() {
		$('.resultado').html('');
	});

	$("#registro-usuario").submit(function(event) {
	  // Stop form from submitting normally
	  event.preventDefault();

	  $password  = $('#password').val();
	  $password2 = $('#password2').val();

	  // Get some values from elements on the page:
	  var values = $(this).serialize();
	  // Send the data using post and put the results in a div
	    $.ajax({
	        url: "registrousuario.php",
	        type: "post",
	        data: values,
	        success: function(result){
	        	$('.resultado').html(result);
	    	},
	        error:function(){

	               }
		});

	});
});