$(function(){
    $(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });
});


$(document).ready(function(){
 
    $('.boton-top').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
 
    $(window).scroll(function(){
        if( $(this).scrollTop() > 0 ){
            $('.ir-arriba').slideDown(300);
        } else {
            $('.ir-arriba').slideUp(300);
        }
    });
 
});

// $( function(){
//     var arrImagenes = [ 'img-ej.jpeg','mochila1.jepg', 'mochila2.jepg'];
//     var imagenActual = 'img-ej.jpeg';
//     var tiempo = 2000;
//     var id_contenedor = 'imagenhome'

//     setInterval( function(){
//         do{
//             var randImage = arrImagenes[Math.ceil(Math.random()*(arrImagenes.length-1))];
//         }while( randImage == imagenActual )
//         imagenActual = randImage;
//         cambiarImagenFondo(imagenActual, id_contenedor);
//     }, tiempo)
// })
 
// function cambiarImagenFondo(nuevaImagen, contenedor){
//     var contenedor = $('#' + contenedor);
//     //cargar imagen primero
//     var tempImagen = new Image();
//     $(tempImagen).load( function(){
//         contenedor.css('backgroundImage', 'url('+tempImagen.src+')');
//     });
//     tempImagen.src = 'Img/' + nuevaImagen;
// }

// $( function(){
//     var arrImagenes = [ 'img-ej.jpeg','mochila1.jepg', 'mochila2.jepg' ];
//     var imagenActual = 'img-ej.jpeg';
//     var tiempo = 3000;
//     var id_contenedor = 'main-wrap'
//     setInterval( function(){
//         do{
//             var randImage = arrImagenes[Math.ceil(Math.random()*(arrImagenes.length-1))];
//         }while( randImage == imagenActual )
//         imagenActual = randImage;
//         cambiarImagenFondo(imagenActual, id_contenedor);
//     }, tiempo)
// })
 
// function cambiarImagenFondo(nuevaImagen, contenedor){
//     var contenedor = $('#' + contenedor);
//     //cargar imagen primero
//     var tempImagen = new Image();
//     $(tempImagen).load( function(){
//         contenedor.css('backgroundImage', 'url('+tempImagen.src+')');
//     });
//     tempImagen.src = 'images/' + nuevaImagen;
// }//http://www.forosdelweb.com/f13/hacer-que-background-cambie-imagen-cada-cierto-tiempo-894861/

