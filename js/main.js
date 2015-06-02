$(document).ready(function() {
	$('.inline').fancybox({
		type : 'inline',
		height : '100%',
	});
	$('.fancy-img').fancybox();
	$('.tab').on('click', function() {
		$('.resultado').html('');
	});
	if(undefined === $("#aceptocheck").attr('checked')){
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
		$(".inline").trigger('click');
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
	
	$("#parameter-cribsearch").submit(function(event) {
	  // Stop form from submitting normally
	  event.preventDefault();
	  // Get some values from elements on the page:
	  var values = $(this).serialize();
	  // Send the data using post and put the results in a div
	    $.ajax({
	        url: "uploadcrib.php",
	        type: "post",
	        data: values,
	        success: function(result){
	        	$('.resultado').html(result);
	    	},
	        error:function(){

	        }
		});

	});

$(".crib-item").click(function(){
	event.preventDefault();
    // Load the content of the page referenced in the a-tags href
    //$(".site-wrap").load($(this).attr("href"));
    // Prevent browsers default behavior to follow the link when clicked
    //return false;
});

});
        (function(){
        	var $container = $('#canvas-mycribhunt');
        	var $containerlistacribs = $('#canvas-mycribhunt');

        	//Funcion de Isotope para las columnas de las casas
            $container.imagesLoaded( function() {
                $container.isotope({
                    itemSelector: '.bit-4',
                    layoutMode: 'fitRows',
                    masonry: {
                      columnWidth: 0
                    }
                });
            });
            $containerlistacribs.imagesLoaded( function() {
                $container.isotope({
                    itemSelector: '.bit-4',
                    layoutMode: 'fitRows',
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
