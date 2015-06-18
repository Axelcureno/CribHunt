$(window).load(function() {
	$('#canvas-mycribhunt').css('display', 'block');
	$('#cribmap-container').css('display', 'block');
	//$('#site-wrap-detallecrib').css('display', 'block');
    $(".se-pre-con").fadeOut();
});
$(window).resize(function(){
	$('.canvas-cribhunt').height($(window).height() - 225);
});
(function (window, $) {
  $(function() {   
    $('.ripple').on('click', function (event) {
      //event.preventDefault();
      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;
      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));
      window.setTimeout(function(){
        $div.remove();
      }, 2000);
    });
    
  });
})(window, jQuery);

$(document).ready(function() {
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
    })
$('.canvas-cribhunt').height($(window).height() - 225);
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
	$('#submit-sugerencias-form').on('click', function(){
		$('#forma-de-sugerencias').submit();
	});
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
	        url: 'http://' + location.host + '/registrousuario.php',
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
		$(".inline").trigger('click');
	});
        $('#cribsearch-submit').attr('disabled','disabled');
        $('cribhunt-searchfield').keyup(function() {
        if($(this).val() != '') {
        	$('#cribsearch-submit').removeAttr('disabled');
        }
     });
});
(function(){
	var $container = $('#canvas-mycribhunt');
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

//Script que habilida la funcion de fullscreen
//del floating action button
$('.fullscreen').on('click',function(){
 
if($(this).attr('data-click-state') == 1) {
	$(this).attr('data-click-state', 0)
 		$('#parameter-search').css('width', '70%');
		$('.canvas-cribhunt').css('width', '70%');
		$('#canvas-cribmap').css('width', '30%');
		$('.crib-grid').removeClass('bit-6').addClass('bit-4');
} 	else {
		$(this).attr('data-click-state', 1)
		$('#parameter-search').css('width', '100%');
		$('.canvas-cribhunt').css('width', '100%');
		$('#canvas-cribmap').css('width', '0');
		$('.crib-item').css('display', 'block');
		var $container = $('#canvas-mycribhunt');
		$container.isotope('reloadItems');
		$('.crib-grid').removeClass('bit-4').addClass('bit-6');
	}
});
	$('#forma-de-sugerencias').submit(function(event) {
	// Stop form from submitting normally
	event.preventDefault();
	// Get some values from elements on the page:
	var values = $(this).serialize();
	// Send the data using post and put the results in a div
		$.ajax({
			url: 'http://' + location.host + '/enviarsugerencias.php',
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
})();
