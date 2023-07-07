<?php

/*
Plugin Name: Componentes
Plugin URI: https://www.egt.com.co/
Description: Una extensión para mostrar opciones personalizadas
Author: Juan Pablo Ángel Amaya
Version: 1.0.0
Author URI: https://www.egt.com.co/

https://www.xecreators.pk/wpbakery-page-builder-vc_map-examples/
*/

if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}

//echo plugin_dir_path( __FILE__ ) ;
//include( plugin_dir_path( __FILE__ ) . '_shortcode.php');

add_action( 'vc_before_init', 'wpc_vc_before_init_actions2' );
function wpc_vc_before_init_actions2() {
    include( plugin_dir_path( __FILE__ ) . 'vc-testimonios.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-renta-vacacional.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-renta-diaria.php'); 


/*    include( plugin_dir_path( __FILE__ ) . 'vc-investigacion.php');
	include( plugin_dir_path( __FILE__ ) . 'vc-lo-mas-leido.php');
    include( plugin_dir_path( __FILE__ ) . 'vc-opiniones-listado.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-mas-opiniones-lateral.php');  
    include( plugin_dir_path( __FILE__ ) . 'vc-mas-investigaciones-lateral.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-mas-audivisuales-lateral.php');          
    include( plugin_dir_path( __FILE__ ) . 'vc-noticias-listado.php');  
    include( plugin_dir_path( __FILE__ ) . 'vc-noticia-destacada.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-lo-mas-reciente.php');  
    include( plugin_dir_path( __FILE__ ) . 'vc-investigacion-destacada.php');  
    include( plugin_dir_path( __FILE__ ) . 'vc-recomendados.php');
    include( plugin_dir_path( __FILE__ ) . 'vc-bacteria-slider.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-titulo-icono.php');   
    include( plugin_dir_path( __FILE__ ) . 'vc-medioambiente-listado.php'); 
    include( plugin_dir_path( __FILE__ ) . 'vc-audiovisuales-listado.php');*/ 
                             
}
/*===============================================================================================
CARGAMOS CSS
===============================================================================================*/
function wpc_community_directory_scripts() {
    wp_enqueue_style( 'slick',  plugin_dir_url( __FILE__ ) . '/slick/slick.css?'.time() );
    wp_enqueue_style( 'slick-theme',  plugin_dir_url( __FILE__ ) . '/slick/slick-theme.css?'.time() );
    wp_enqueue_style( 'wpc_community_directory_stylesheet',  plugin_dir_url( __FILE__ ) . 'styling/directory-styling.css?'.time() );
}
add_action( 'wp_enqueue_scripts', 'wpc_community_directory_scripts' );

/*===============================================================================================
CARGAMOS JS
===============================================================================================*/
function wpc_component_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'lnp-js', plugins_url('/slick/slick.min.js?'.time(),__FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'lnp2-js', plugins_url('/js/lnp-admin.js?'.time(),__FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'carrusel-interno', plugins_url('/js/carrusel-interno.js?'.time(),__FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'modal-js', plugins_url('/js/modal.js?'.time(),__FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'main', plugins_url('/js/main.js?'.time(),__FILE__ ), array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wpc_component_scripts' );



function hincha_script() {
    wp_enqueue_script( 'lnp-adm-js', plugins_url('js/lnp-admin.js?'.time(),__FILE__ ), array( 'jquery' ) );
    wp_localize_script( 'lnp-adm-js', 'ajax_var', array(
        'url'             => admin_url( 'admin-ajax.php' ),
        'nonce'           => wp_create_nonce( 'my-ajax-nonce' ),
        'site_url'        => site_url()
    )); 
}
add_action( 'admin_init','hincha_script');
/*=================================================
AJAX
=================================================*/
// Add the action hook for the Ajax
add_action('wp_ajax_get_categories_news', 'get_categories_news');
add_action('wp_ajax_admin_get_categories_news', 'get_categories_news');

function get_categories_news(){
    $postId = $_POST['postId'];
    $id_contenido = $_POST['id_contenido'];

    $taxonomyTerms = [];
    $terms = get_terms('categoria-'.$id_contenido); 
    foreach ( $terms as $term ) {
       //$taxonomyTerms += [ $term->term_id => [$term->name,$term->slug] ];
       $taxonomyTerms += [ $term->slug => $term->name ];
    }
    $valores = array(
                "select" => $taxonomyTerms,
            );

    wp_send_json($valores);

}



