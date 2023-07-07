<?php
/**
* Adds new shortcode "info-testimonios-listado" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


if ( ! class_exists( 'vcTestimoniosSlider' ) ) {

	class vcTestimoniosSlider {
		public function __construct() {
	            add_shortcode( 'info-testimonios-listado', array( 'vcTestimoniosSlider', 'output' ) );
			if ( function_exists( 'vc_lean_map' ) ) {
	            vc_lean_map( 'info-testimonios-listado', array( 'vcTestimoniosSlider', 'map' ) );
			}
		}

		public static function map() {

	        //echo '<pre>',var_dump( $this),'</pre>';
			$params =  array(
							array(
							    'type' => 'param_group',
							    'value' => '',
							    'param_name' => 'testimonio',
							    'params' => array(
							        array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Nombre Autor', 'Jaluvava-living'),
							            'param_name' => 'nombre_autor',
							        ),
							        array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('ID', 'Jaluvava-living'),
							            'param_name' => 'titulo_id',
							        ),
							        array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Apartamento', 'Jaluvava-living'),
							            'param_name' => 'Apartamento',
							        ),
							        array(
									  "type" => "textarea",
									  "class" => "",
									  "heading" => __( "Párrafo", "Jaluvava-living" ),
									  "param_name" => "texto",
									  "value" => __( "", "Jaluvava-living" ),
									),
									array(
									  "type" => "attach_image",
									  "class" => "",
									  "heading" => __( "Imagen Autor", "Jaluvava-living" ),
									  "param_name" => "imagen",
									  "value" => '',
									),
									array(
										"type" => "attach_image",
										"class" => "",
										"heading" => __( "Imagen Fondo", "Jaluvava-living" ),
										"param_name" => "imagenf",
										"value" => '',
									  ),
									array(
										"type" => "checkbox",
										"class" => "",
		                                "heading" => __( "¿Esta disponible?", "Jaluvava-living" ),
										"param_name" => "mostrar_leer_mas",
		                                "value" => __( 'si', 'Jaluvava-living' ),
									  ),
							    )
							) 					  
				);

			return array(
                'name'        => esc_html__( 'Testimonios', 'Jaluvava-living' ),
                'description' => esc_html__( 'Testimonios', 'Jaluvava-living' ),
				'base'        => 'vc_infobox',
                'category' => __('Componentes', 'Jaluvava-living'),
				//'icon' => 'vc_titulo1',
				"icon" => plugin_dir_url( __FILE__ ) . "/assets/grid.svg", 
				'params'      => $params,
				'js_view' => 'VcCustomElementView',
				'admin_enqueue_js' => array(
					plugins_url().'/componentes/js/vc-testimonios.js?t='.time()
				),
				/*'front_enqueue_js' => array(
					plugins_url().'/componentes/js/vc-testimonios-front.js?t='.time()
				),*/
				'custom_markup' => '<h2 class="wpb_element_title"> <i class="vc_general vc_element-icon"></i>Testimonios</h4><span class="vc_admin_label admin_label_content vc_custom-element-container" style="display: inline;"><label>Testimonios</label>: {{{ params.tipo_contenido }}} - {{{ params.inv_categoria }}} </h2>',
				
			);
		}


		/**
		* Shortcode output
		*
		*/
		public static function output( $atts, $content = null ) {
			global $post, $wp_query;
			extract(
				shortcode_atts(
					array(
						'testimonio' 	=> '',
						'mostrar_leer_mas' => '',
						'titulo_id' => '',
					),
					$atts
				)
			);

			$values = vc_param_group_parse_atts($atts['testimonio']);
			$html = '';

			$html .= '<div class="testimonios-slider columnas   ">';
				$html .= '<div class="slick ">';

					foreach($values as $data){
					  	//var_dump($data);
						$imagenf = isset($data['imagenf']) ? $data['imagenf'] : ''; 
						$imagen = $data['imagen'];
						$nombre_autor = isset($data['nombre_autor']) ? $data['nombre_autor'] : ''; 
					  	$texto = $data['texto'];
						$Apartamento = isset($data['Apartamento']) ? $data['Apartamento'] : ''; 
			
					  	$imagen = '<div class="imagen"><img src="'.wp_get_attachment_image_url($imagen,'full').'"></div>';
						$imagenf = '<div class="imagenf"><img src="'.wp_get_attachment_image_url($imagenf,'full').'"></div>';
						
					  	$html .= '
					  		<div class="testimonio-det t-'.$data['titulo_id'].' " id="t-'.$data['titulo_id'].'">
								<div class="testimonio-contenido">
									<div class="cuerpo-testimonio">
									'.$imagenf.'
						  				<div class="autor">
						  					'.$imagen.'
						  					<div class="datos">
						  						<h5>'.$nombre_autor.'</h5>
						  						<p>'.$Apartamento.'</p>
						  					</div>
											<div class="testimonio">
											<p>'.$texto.'</p>
											</div>
						  				</div>
					  				</div>
								</div>
					  		</div>
					  	';
					}

				$html .= '</div>';
			$html .= '</div>';

			$cantSlide = 3;
			$optionSlider = '';


			$html .= '<script>
				+(function ($) {
				  $(function(){
				  	urlHash = window.location.hash;//.substring(1);
				  	console.log(urlHash,$(\'.testimonios-slider\'), $(\'.testimonios-slider .testimonio-det\').index( $(urlHash) ) );
				  	var indexToGet = $(\'.testimonios-slider .testimonio-det\').index( $(urlHash) );
				  	indexToGet = (indexToGet == -1)?0:indexToGet;
				  	console.log(indexToGet);

				    $.fn.testimoniosSlider = function(){
				    	
				    	
					    $(\'.testimonios-slider .slick\').slick({
							//vertical: true,
							autoplay: true, // Inicia el desplazamiento automático
							autoplaySpeed: 2000 ,
							slidesToShow: 3, // Muestra 3 diapositivas a la vez
							slidesToScroll: 3, 
							centerMode: true,
							centerPadding: \'20px\',
							initialSlide: indexToGet,
							//focusOnSelect: true,
							//variableWidth: true,
							slidesToShow: '.$cantSlide.',
							slidesToScroll: 1,
							adaptiveHeight: true,
							responsive: [
								{
							      breakpoint: 1600,
							      settings: {
							        slidesToShow: 3,
							        //centerMode: true
							      }
							    },
							    {
							      breakpoint: 980,
							      settings: {
							        slidesToShow: 2,
							        //centerMode: true
							      }
							    },
							    {
							      breakpoint: 680,
							      settings: {
							        slidesToShow: 1,
							        //centerMode: true
							      }
							    }
							]
						});//end slider
					}
					$.fn.testimoniosSlider();


				  });
				})(jQuery);

			</script>';

			return $html;
		}
	}
}
new vcTestimoniosSlider;
