$(document).ready(function() {
	$('.tab').on('click', function() {
		$('.resultado').html('');
	});
	if(undefined == $("#aceptocheck").attr('checked')){
		$('#aceptocheck').on('click', function() {
			if ($("#aceptocheck").is(':checked')) {
				$('#botonderegistro').removeAttr('disabled');
			} else {
				$('#botonderegistro').attr('disabled', 'disabled');
			}
		});
	}
	$("#registro-usuario").submit(function(event) {
	  // Stop form from submitting normally
	  event.preventDefault();
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
	$("#cribsearch").submit(function(event) {
	  // Stop form from submitting normally
	  event.preventDefault();
	  // Get some values from elements on the page:
	  var values = $(this).serialize();
	  // Send the data using post and put the results in a div
	    $.ajax({
	        url: "cribsearch.php",
	        type: "post",
	        data: values,
	        success: function(result){
	        	$('.resultado').html(result);
	    	},
	        error:function(){

	               }
		});

	});
	$("a").click(function() {
	  /* grabs URL from HREF attribute then adds an  */
	  /* ID from the DIV I want to grab data from    */
	  var myUrl = $(this).attr("href");
	  $(".site-wrap").post(myUrl + "#site-wrap-agregarcrib");
	  return false;
	});
});
        (function(){
        	var $container = $('#canvas-mycribhunt');

        	//Funcion de Isotope para las columnas de las casas
            $container.imagesLoaded( function() {
                $container.isotope({
                    itemSelector: '.bit-4',
                    layoutMode: 'masonry',
                    masonry: {
                      columnWidth: 0
                    }
                });
            });


      	$("#parameter-cribsearch").submit(function(event) {
		// Stop form from submitting normally
		event.preventDefault();
			// Get some values from elements on the page:
			var values = $(this).serialize();
			// Send the data using post and put the results in a div
				$.ajax({
					url: "parametercribsearch.php",
					type: "post",
					data: values,
					success: function(result){
						$('.resultado').html(result);
					},
					error:function(){

					}
			});

		});

        })();