var $container = $('#canvas-mycribhunt');
$(window).load(function() {
	$('#canvas-mycribhunt').css('display', 'block');
	$('#cribmap-container').css('display', 'block');
	$('.mdl-mega-footer').css('display', 'block');
	//$('#site-wrap-detallecrib').css('display', 'block');
    $(".se-pre-con").fadeOut();
    
	
	//Funcion de Isotope para las columnas de las casas
    //$container.imagesLoaded( function() {
    //    $container.isotope({
    //        itemSelector: '.bit-4',
    //        layoutMode: 'masonry',
    //        masonry: {
    //          columnWidth: 0
    //        }
    //    });
    //});

	$container.imagesLoaded( function(){
  		$container.isotope( {
  			itemSelector: '.bit-4',
			animationEngine: 'jquery',
			layoutMode : 'masonry',
			transformsEnabled:false ,
			animationOptions: {
                duration: 200,
                easing: 'linear',
                queue: true,
            }
		});
  	});
});

$(window).resize(function(){ 
	$container.isotope('destroy');
	$($container).isotope(  {
			itemSelector: '.bit-4',
			animationEngine: 'jquery',
			layoutMode : 'masonry',
			transformsEnabled:false ,
			animationOptions: {
                duration: 200,
                easing: 'linear',
                queue: true,
            }
		}); 
});

(function(){

	$('#cribsearch-submit').attr('disabled',true);
    $('#cribhunt-searchfield').keyup(function(){
        if($(this).val().length !=0)
            $('#cribsearch-submit').attr('disabled', false);            
        else
            $('#cribsearch-submit').attr('disabled',true);
    })

    $('#submit-parameter-cribsearch').attr('disabled',true);
    $('#cribsearch-places').keyup(function(){
        if($(this).val().length !=0)
            $('#submit-parameter-cribsearch').attr('disabled', false);            
        else
            $('#submit-parameter-cribsearch').attr('disabled',true);
    });

$('.inline-loquiero').fancybox({
	type : 'inline',
	height : '100%',
});

$('.sugerencias-inline').fancybox({
	type : 'inline',
	height : '100%',
});

$('.iniciar-sesion-fancybox').fancybox({
	type : 'iframe',
	beforeShow: function(){
  	$(".fancybox-skin").css("backgroundColor","transparent");
  	$(".fancybox-skin").css("box-shadow","none");
 	}, afterShow: function() {
  	$(".fancybox-close").css("visibility","hidden");
 	}
});
	$('.inline').fancybox({
		type : 'inline',
		height : '100%',
	});

$(".iframe-img").fancybox({
    'transitionIn'  : 'none',
    'transitionOut' : 'none',
    'type'          : 'iframe'
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
	//$('#submit-sugerencias-form').unbind('click').bind('click', function(){
	//	$('#forma-de-sugerencias').submit();
	//});
	//$('#submit-loquiero-form').unbind('click').bind('click', function(){
	//	$('#forma-de-loquiero').submit();
	//});
	$('#submit-parameter-cribsearch').on('click', function(){
		$('#parameter-cribsearch').submit();
	});
	$("#registro-usuario").submit(function(event) {
	  // Stop form from submitting normally
	  event.preventDefault();
	  // Get some values from elements on the page:
	 $('#registro-usuario input').hide();
	 $('.terminos-condiciones').hide();
	 $('.bienvenido h2').hide();
	 $('.espacio-spinner').fadeIn();
	  $('.se-pre-con').fadeIn();
	  var values = $(this).serialize();
	  // Send the data using post and put the results in a div
	    $.ajax({
	        url: 'https://' + location.host + '/registrousuario.php',
	        type: 'post',
	        data: values,
	        success: function(result){
	        	$('.resultado').html(result);
	        	if (result == 'El registro fue exitoso. Ya puedes iniciar tu sesión') {
	        		$('.bienvenido h2').fadeIn();
	        		$('.espacio-spinner').hide();
	        		$(".se-pre-con").fadeOut();
	        		$('.resultado').css('color', '#388E3C');
	        	} else {
	        		$('.espacio-spinner').hide();
	        		$('.bienvenido h2').fadeIn();
	        		$(".se-pre-con").hide();
	        		$('.resultado').css('color', '#D32F2F');
	        		$('#registro-usuario input').show();
	        		$('.terminos-condiciones').show();
	        	}
	    	},
	        error:function() {
	        }
		});
		//$(".inline").trigger('click');
	});
        $('#cribsearch-submit').attr('disabled','disabled');
        $('cribhunt-searchfield').keyup(function() {
        if($(this).val() != '') {
        	$('#cribsearch-submit').removeAttr('disabled');
        }
     });

//Script que habilida la funcion de fullscreen
//del floating action button
$('.fullscreen').on('click',function(){
	if($(this).attr('data-click-state') == 1) {
		$(this).attr('data-click-state', 0)
			$('#canvas-cribmap').css('right', '-30%');
			$('#canvas-cribmap').css('none');
	} 	else {
			$(this).attr('data-click-state', 1)
			$('#canvas-cribmap').css('right', '0');
			$('#canvas-cribmap').css('box-shadow', '0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)');
		}
});
	$('#submit-sugerencias-form').unbind('click').bind('click', function(){
	$('#forma-de-sugerencias').submit(function(event) {
	// Stop form from submitting normally
	event.preventDefault();
	// Get some values from elements on the page:
	var values = $(this).serialize();
	// Send the data using post and put the results in a div
		$.ajax({
			url: 'https://' + location.host + '/enviarsugerencias.php',
			type: 'post',
			data: values,
			success: function(result){
				$('.titulo-subtitulo-sugerencias').hide('slow');
				$('#forma-de-sugerencias').hide('slow');
				$('.resultado').html(result);
			},
			error:function(){
			}
		});
	});
});
	$('#submit-loquiero-form').unbind('click').bind('click', function(){
		$('#forma-de-loquiero').submit(function(event) {
		 $('#forma-de-loquiero').hide();
		 $('.espacio-spinner').fadeIn();
		  $('.se-pre-con').fadeIn();
		// Stop form from submitting normally
		event.preventDefault();
		// Get some values from elements on the page:
		var values = $(this).serialize();
		// Send the data using post and put the results in a div
			$.ajax({
				url: 'https://' + location.host + '/enviarloquiero.php',
				type: 'post',
				data: values,
				success: function(result){
					$('.titulo-subtitulo-loquiero').hide();
					$('#forma-de-loquiero').hide();
					$(".se-pre-con").hide();
					$('.espacio-spinner').hide();
					$('.resultado-loquiero').html(result);
				},
				error:function(){
				}
			});
		});
	});
})();
