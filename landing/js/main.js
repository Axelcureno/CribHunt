
$(document).ready(function(){
  var imageHeight, wrapperHeight, overlap, container = $('.mainimage');
  function centerImage() {
        imageHeight = container.find('img').height();
        wrapperHeight = container.height();
        overlap = (wrapperHeight - imageHeight) / 2;
        container.find('img').css('margin-top', overlap);
        if ($height > 600) {
          $('.mainimage').css('max-height', $(window).height());
        } else {
          $('.mainimage img').css('height', $(window).height());
          container.find('img').css('margin-top', 0);
        }
    }
    $(window).on("load resize", centerImage);
    var $height = $(window).height();

    $(".registerform").submit(function(event) {
      // Stop form from submitting normally 
      event.preventDefault();
      // Get some values from elements on the page:
      var values = $(this).serialize();
      // Send the data using post and put the results in a div
        $.ajax({
            url: "registeremail.php",
            type: "post",
            data: values,
            success: function(){
                $("#result").html('Listo, ya estas registrado.');
            },
            error:function(){
                $("#result").html('Algo salió mal... Refresca la página.');
                }
           });
      });

    $('.comenzar').on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      $('html, body').animate({
                        scrollTop: $(".howitworks").offset().top
                    }, 2000);
    });
});