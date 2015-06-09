$(window).load(function() {
	$('#canvas-mycribhunt').css('display', 'block');
	$('#cribmap-container').css('display', 'block');
	//$('#site-wrap-detallecrib').css('display', 'block');
    $(".se-pre-con").fadeOut();
});
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

	$('.bxslider').bxSlider({
	    pagerCustom: '#bx-pager',
	    onSliderLoad: function(){
        $("#site-wrap-detallecrib").css("visibility", "visible");
        $(".se-pre-con").fadeOut();
      }
	});

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
	        error:function() {

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
