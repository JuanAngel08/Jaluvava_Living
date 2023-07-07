<?php
/**
* Adds new shortcode "info-Diario-listado" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


if ( ! class_exists( 'vcDiarioSlider' ) ) {

	class vcDiarioSlider {
		public function __construct() {
	            add_shortcode( 'info-diario-listado', array( 'vcDiarioSlider', 'output' ) );
			if ( function_exists( 'vc_lean_map' ) ) {
	            vc_lean_map( 'info-diario-listado', array( 'vcDiarioSlider', 'map' ) );
			}
		}

		public static function map() {

	        //echo '<pre>',var_dump( $this),'</pre>';
			$params =  array(
							array(
							    'type' => 'param_group',
							    'value' => '',
							    'param_name' => 'diario',
							    'params' => array(
							        array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Nombre Propiedad', 'Jaluvava-living'),
							            'param_name' => 'nombre_Propiedad',
									),
							        array(
									  "type" => "textarea",
									  "class" => "",
									  "heading" => __( "Párrafo", "Jaluvava-living" ),
									  "param_name" => "texto",
									  "value" => __( "", "Jaluvava-living" ),
									),
									array(
									  "type" => "textfield",
									  "class" => "",
									  "heading" => __( "Cantidad Habitaciones", "Jaluvava-living" ),
									  "param_name" => "habitaciones",
									),
									array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Cantidad de baños', 'Jaluvava-living'),
							            'param_name' => 'baños',
							        ),
									array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Cantidad de camas', 'Jaluvava-living'),
							            'param_name' => 'camas',
							        ),
									array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Cantidad de huespedes', 'Jaluvava-living'),
							            'param_name' => 'huespedes',
							        ),
									array(
							            'type' => 'textfield',
							            'value' => '',
							            'heading' => __('Direccion url', 'Jaluvava-living'),
							            'param_name' => 'direccion',
							        ),
									array(
										"type" => "attach_images",
										"class" => "",
										"heading" => __( "Imagenes", "Jaluvava-living" ),
										"param_name" => "ImagenesSlider",
										"value" => '',
									  ),
									array(
										"type" => "dropdown",
										"class" => "",
		                                "heading" => __( "¿Esta disponible?", "Jaluvava-living" ),
										"param_name" => "disponibilidad",
										'value' => array(
											__( 'Seleccione',  "Jaluvava-living"  ) => '',
											__( 'si',  "Jaluvava-living"  ) => 'si',
											__( 'no',  "Jaluvava-living"  ) => 'no',)
									  ),
							    )
							) 					  
				);

			return array(
                'name'        => esc_html__( 'Diario', 'Jaluvava-living' ),
                'description' => esc_html__( 'Diario', 'Jaluvava-living' ),
				'base'        => 'vc_infobox',
                'category' => __('Componentes', 'Jaluvava-living'),
				//'icon' => 'vc_titulo1',
				"icon" => plugin_dir_url( __FILE__ ) . "/assets/grid.svg", 
				'params'      => $params,
				'js_view' => 'VcCustomElementView',
				'admin_enqueue_js' => array(
					plugins_url().'/componentes/js/vc-Diario.js?t='.time()
				),
				/*'front_enqueue_js' => array(
					plugins_url().'/componentes/js/vc-testimonios-front.js?t='.time()
				),*/
				'custom_markup' => '<h2 class="wpb_element_title"> <i class="vc_general vc_element-icon"></i>Diario</h4><span class="vc_admin_label admin_label_content vc_custom-element-container" style="display: inline;"><label>Diario</label>: {{{ params.tipo_contenido }}} - {{{ params.inv_categoria }}} </h2>',
				
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
						'diario' 	=> '',
						'mostrar_leer_mas' => '',
						'ImagenesSlider' => '',
					),
					$atts
				)
			);

		

			$values = vc_param_group_parse_atts($atts['diario']);
			$html = '';

			$html .= '<div class="diario-slider columnas   ">';
				$html .= '<div class="slick diario-slick-slide ">';

					foreach($values as $data){
					  	//var_dump($data);

						$nombre_Propiedad = isset($data['nombre_Propiedad']) ? $data['nombre_Propiedad'] : ''; 
						$texto = isset($data['texto']) ? $data['texto'] : ''; 
						$habitaciones = isset($data['habitaciones']) ? $data['habitaciones'] : ''; 
						$baños = isset($data['baños']) ? $data['baños'] : ''; 
						$camas = isset($data['camas']) ? $data['camas'] : ''; 
						$huespedes = isset($data['huespedes']) ? $data['huespedes'] : ''; 
						$direccion = isset($data['direccion']) ? $data['direccion'] : ''; 
						$ImagenesSlider = isset($data['ImagenesSlider']) ? $data['ImagenesSlider'] : ''; 	
						$disponibilidad = isset($data['disponibilidad']) ? $data['disponibilidad'] : ''; 

						if($disponibilidad == 'si'){
							$disponibilidad = 'Disponible';
						}else if ($disponibilidad  = 'no'){
							$disponibilidad = 'Reservado';
						}


						 // Obtener las imágenes seleccionadas
						 $ImagenesSlider = explode(",",$ImagenesSlider);
						 $img = "";
						 foreach ($ImagenesSlider as $ImagenSlider) {
							$img .= '<img src="'.wp_get_attachment_image_url($ImagenSlider,'full').'">';
		
						 }
					
						
						$ImagenesSlider = '<div class="imagenf"><img src="'.wp_get_attachment_image_url($ImagenesSlider,'full').'"></div>';



						
						
					  	$html .= '
						  <div class="renta-det t-'.$nombre_Propiedad.'">
								<div class="renta-contenido">
									<div class="disponibilidad-'.$disponibilidad.'">'.$disponibilidad.'</div>
									<div class="cuerpo-renta">
						 							<div class="campo-imagen" id="imagenesCarusel">
						 								<div class="contenedor-images">
															 '.$img.'
													 	</div>
													</div>	
													<button  class="anterior"><</button>
													<button class="siguiente">></button>										
						  				<div class="contenido-interno">
						  					
						  					<div class="datos">
						  						<h5>'.$nombre_Propiedad.'</h5>
						  						<p>'.$texto.'</p>
						  					</div>
											<div class="descripcion-renta">
											<ul>
												<li class="hab">  
													<a src=""  > </a>
													<span>'.$habitaciones.'</span>  
												</li>
												<li class="banos"> 
													<a src=""  > </a>
													<span>'.$baños.'</span>  
												</li>
												<li class="camas" >  
													<a src=""  > </a>
													<span>'.$camas.'</span>  
												</li>
												<li class="huespedes">  
													<a src=""  > </a>
													<span>'.$huespedes.'</span>  
												</li>
											</ul>
											</div>									
											<a class="boton-redireccion" href="' . esc_url($direccion) . '" target="_blank">Mayor Información</a>
						  				</div>
					  				</div>
								</div>
					  		</div>
					  	';
					}

				$html .= '</div>';
			$html .= '</div>';

			$cantSlide = 2;
			$optionSlider = '';


			$html .= '<script>
				+(function ($) {
				  $(function(){
				  	urlHash = window.location.hash;//.substring(1);
				  	console.log(urlHash,$(\'.diario-sliderr\'), $(\'.diario-slider .diario-det\').index( $(urlHash) ) );
				  	var indexToGet = $(\'.diario-slider .diario-det\').index( $(urlHash) );
				  	indexToGet = (indexToGet == -1)?0:indexToGet;
				  	console.log(indexToGet);

				    $.fn.testimoniosSlider = function(){
				    	
				    	
					    $(\'.diario-slider .slick\').slick({
							centerMode: true,
							centerPadding: \'0px\',
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
							        slidesToShow: 2,
							        //centerMode: true
							      }
							    },
							    {
							      breakpoint: 1000,
							      settings: {
							        slidesToShow: 1,
							        //centerMode: true
							      }
							    },
								{
									breakpoint: 768,
									settings: {
									  slidesToShow: 2,
									  //centerMode: true
									}
								  },
							    {
							      breakpoint: 600,
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



	
new vcDiarioSlider;
