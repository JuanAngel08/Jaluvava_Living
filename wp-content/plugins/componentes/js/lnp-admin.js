
+(function ($) {
  $(function(){
    /*HOME*/
    console.log('lnp admin js 2');

    
//Function scroll smooth

    jQuery(document).ready(function($) {
      
      // Selecciona todos los enlaces internos que contengan un hash (#)
      $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        // Verifica si el enlace apunta a una sección interna en la misma página
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          // Obtiene el elemento al que se debe desplazar suavemente
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Verifica si el elemento existe
          if (target.length) {
            // Previene el comportamiento predeterminado del enlace
            event.preventDefault();
            // Desplaza suavemente hasta el elemento
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000, function() {
              // Realiza el enfoque en el elemento después de finalizar el desplazamiento suave (opcional)
              // target.focus();
              // Verifica si el elemento tiene el foco (opcional)
              // if (target.is(":focus")) {
              //   return false;
              // } else {
              //   target.attr('tabindex','-1');
              //   target.focus();
              // };
            });
          }
        }
      });
    });
  });
})(jQuery);







