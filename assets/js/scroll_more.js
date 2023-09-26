/*jQuery(function($) {
    var page = 2; // La página inicial
    var loading = false;
    var $loadmoreButton = $('#load-more-button');
    var $loadingGif = $('#loading-gif'); // Elemento del GIF de carga
    var $primaryContainer = $('#primary'); // Selector del contenedor principal que contiene tus artículos

    $loadmoreButton.on('click', function() {
        if (!loading) {
            loading = true;
            var data = {
                action: 'load_more_posts',
                page: page,
            };

            // Oculta el botón y muestra el GIF de carga
            $loadmoreButton.hide();
            $loadingGif.show();

            $.ajax({
                url: loadmoreajax.ajaxurl,
                data: data,
                type: 'POST',
                success: function(response) {
                    if (response.trim() !== '') {
                        // Agrega el nuevo contenido al contenedor de artículos existentes
                        $primaryContainer.find('#content').append(response);
                        page++;
                        loading = false;
                    } else {
                        // Si no hay más entradas, agrega una clase CSS para ocultar el botón
                        $loadmoreButton.addClass('hidden');
                    }

                    // Oculta el GIF de carga y muestra el botón nuevamente
                    $loadmoreButton.show();
                    $loadingGif.hide();
                }
            });
        }
    });
});*/
jQuery(function($) {
    var page = 2; // La página inicial
    var loading = false;
    var $loadmoreButton = $('#load-more-button');
    var $loadingGif = $('#loading-gif'); // Elemento del GIF de carga
    var $primaryContainer = $('#primary'); // Selector del contenedor principal que contiene tus artículos

    $loadmoreButton.on('click', function() {
        if (!loading) {
            loading = true;
            var data = {
                action: 'load_more_posts',
                page: page,
            };

            // Oculta el botón y muestra el GIF de carga
            $loadmoreButton.hide();
            $loadingGif.show();

            $.ajax({
                url: loadmoreajax.ajaxurl,
                data: data,
                type: 'POST',
                success: function(response) {
                    if (response.trim() !== '') {
                        // Agrega el nuevo contenido al contenedor de artículos existentes
                        $primaryContainer.find('#content').append(response);
                        page++;
                        loading = false;
                    } else {
                        // Si no hay más entradas, oculta el botón
                        $loadmoreButton.hide();
                    }

                    // Oculta el GIF de carga y muestra el botón nuevamente
                    $loadingGif.hide();
                }
            });
        }
    });
});

  
