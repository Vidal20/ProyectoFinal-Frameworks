function Subscribirse() {
    alert("Acabas de suscribirte a: ");
}

$(document).ready(function() {
    var categoriasPadre = $("input[name='categoriasPadre']");
    var categoriasHija = $("input[name='categoriasHija']");

    $('.main-nav-item').click(function() {
        $('.libros').each(function() {
            $(this).addClass('oculto');
        });
        if ($(this).attr('id') != 'Entrar' && $(this).attr('id') != 'Salir') {
            $(this).addClass('activo').siblings().removeClass('activo');
            var elemento1 = $(this);
            $('.nav-item-sub').each(function() {
                if (elemento1.attr('id') == $(this).attr('id')) {
                    $(this).removeClass('oculto');
                } else {
                    $(this).addClass('oculto');
                }
            });

            for (var i = 0; i < categoriasPadre.length; i++) {
                if (elemento1.attr('id') == categoriasPadre[i].value) {
                    $('.libros').each(function() {
                        var libro = $(this);
                        //console.log("ID cat libro:",libro.attr("id"), "Nombre libro: ",libro.attr("nombre"));
                        categoriasHija.each(function() {
                            if ($(this).attr('padres') == categoriasPadre[i].value && $(this).val() == libro.attr("id")) {
                                if ($(this).attr('nombre') == libro.attr("nombreCat")) {
                                    libro.removeClass('oculto');
                                } else {
                                    libro.addClass('oculto');
                                }
                            }
                        });
                    });
                }
            }
        }
    });

    $('.nav-item-sub').click(function() {
        if ($(this).hasClass("activo")) {
            $(this).removeClass('activo');
        } else {
            var elemento1sub = $(this);
            elemento1sub.addClass('activo').siblings().removeClass('activo');
            for (var ba = 0; ba < categoriasPadre.length; ba++) {
                if (elemento1sub.attr('id') == categoriasPadre[ba].value) {
                    $('.libros').each(function() {
                        if ($(this).attr("id") == elemento1sub.attr('idChildCat')) {
                            $(this).removeClass('oculto');
                        } else {
                            $(this).addClass('oculto');
                        }
                    });
                }
            }
        }
    });
});