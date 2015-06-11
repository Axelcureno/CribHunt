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
      event.preventDefault();
      
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
$('.canvas-cribhunt').height($(window).height() - 225);
	
$('.sugerencias-inline').fancybox({
	type : 'inline',
	height : '100%',
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

	$("#forma-de-sugerencias").submit(function(event) {
	// Stop form from submitting normally
	event.preventDefault();
	// Get some values from elements on the page:
	//var values = $(this).serialize();
	// Send the data using post and put the results in a div
	//	$.ajax({
	//		url: "parametercribsearch.php",
	//		type: "post",
	//		data: values,
	//		success: function(result){
	//			$('.resultado').html(result);
	//		},
	//		error:function(){
	//
	//		}
	//	});
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
