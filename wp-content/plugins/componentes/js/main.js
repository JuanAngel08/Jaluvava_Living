
+(function ($) {
  $(function(){
    /*HOME*/
    console.log('lnp admin js 2');

    
//Function close main

    jQuery(document).ready(function($) {
 
      $('#menu-menu li').click(function() {
        // Ocultar el elemento #site-navigation al hacer clic en un elemento <li>
        $('.menu-toggle').attr('aria-expanded', 'false');
        $('nav.main-navigation.mobile-menu-control-wrapper').removeClass('toggled');
        $('nav.main-navigation.has-menu-bar-items.sub-menu-right').removeClass('toggled');
        $('htm.js_active vc_mobile vc_transform').removeClass('mobile-menu-open');
      });
      
      
    })
  });
})(jQuery);







