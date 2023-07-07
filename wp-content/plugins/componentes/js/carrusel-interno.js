

+(function ($) {
  $(function(){
    /*HOME*/
    console.log('modal');
    



    //Carrusel interno function

    jQuery(document).ready(function($) {

/*
// Obtener referencias a los elementos del DOM en cada caja
const camposImagen = $('.renta-det');

camposImagen.each(function() {
  const contenedorImages = $(this).find('.contenedor-images');
  const botonAnterior = $(this).find('.anterior');
  const botonSiguiente = $(this).find('.siguiente');

  // Variables para controlar el índice de la imagen actual
  let indiceImagenActual = 0;
  const totalImagenes = contenedorImages.children().length;

  // Función para mostrar la imagen en el índice especificado
  const mostrarImagen = (indice) => {
    // Restringir el índice dentro del rango válido
    indice = Math.max(0, Math.min(indice, totalImagenes - 1));

    // Calcular el desplazamiento del contenedor de imágenes
    const desplazamiento = -indice * 100;

    // Aplicar el desplazamiento utilizando transformaciones CSS
    contenedorImages.css('transform', `translateX(${desplazamiento}%)`);

    // Actualizar el índice de la imagen actual
    indiceImagenActual = indice;
  };

  // Función para mostrar la imagen anterior
  const mostrarImagenAnterior = () => {
    mostrarImagen(indiceImagenActual - 1);
  };

  // Función para mostrar la siguiente imagen
  const mostrarImagenSiguiente = () => {
    mostrarImagen(indiceImagenActual + 1);
  };

  // Asignar controladores de eventos a los botones en cada caja
  botonAnterior.on('click', mostrarImagenAnterior);
  botonSiguiente.on('click', mostrarImagenSiguiente);
});*/

 // Obtener referencias a los elementos del DOM en cada caja
 const camposImagen = $('.renta-det');

 camposImagen.each(function() {
   const contenedorImages = $(this).find('.contenedor-images');
   const botonAnterior = $(this).find('.anterior');
   const botonSiguiente = $(this).find('.siguiente');

   // Variables para controlar el índice de la imagen actual
   let indiceImagenActual = 0;
   const totalImagenes = contenedorImages.children().length;

   // Función para mostrar la imagen en el índice especificado
   const mostrarImagen = (indice) => {
     // Calcular el índice de la imagen ajustado al rango válido
     indice = (indice + totalImagenes) % totalImagenes;

     // Calcular el desplazamiento del contenedor de imágenes
     const desplazamiento = -indice * 100;

     // Aplicar el desplazamiento utilizando transformaciones CSS
     contenedorImages.css('transform', `translateX(${desplazamiento}%)`);

     // Actualizar el índice de la imagen actual
     indiceImagenActual = indice;
   };

   // Función para mostrar la imagen anterior
   const mostrarImagenAnterior = () => {
     mostrarImagen(indiceImagenActual - 1);
   };

   // Función para mostrar la siguiente imagen
   const mostrarImagenSiguiente = () => {
     mostrarImagen(indiceImagenActual + 1);
   };

   // Asignar controladores de eventos a los botones en cada caja
   botonAnterior.on('click', mostrarImagenAnterior);
   botonSiguiente.on('click', mostrarImagenSiguiente);
 });




    }
    )





  
    

  });
})(jQuery);