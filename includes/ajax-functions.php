<?php
// ajax-functions.php

// Función para cargar más posts
function MK20_loadmore_load_more_posts() {
    $page = $_POST['page'];

    // Define los parámetros de la consulta
    $args = array(
        'post_type' => 'moplugins', // Tipo de contenido (puedes cambiarlo a 'page' o personalizarlo)
        'posts_per_page' => 6, // Número de entradas a cargar por página
        'paged' => $page, // Página actual
    );

    // Realiza la consulta
    $query = new WP_Query($args);?> 

    <?php
// Comprueba si hay entradas
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();?>
            <li class="wp-block-post post-1430 moplugins type-moplugins status-publish has-post-thumbnail hentry category-suscripcion-parcial category-suscripcion-total tag-1-5-1 IPlugins-eu Tipo-plugin rcp-is-restricted rcp-can-access ast-article-single">

                            <div class="inherit-container-width wp-block-group fichas has-border-color has-ast-global-color-0-border-color is-layout-constrained wp-container-3 wp-block-group-is-layout-constrained" style="border-style:dashed;border-width:3px;border-radius:18px;padding-top:30px;padding-right:5px;padding-bottom:30px;padding-left:5px">

                                <h2 style="font-size:25px;" class="has-text-align-center nombre wp-block-post-title">
                                    <a href=<?php the_permalink(); ?> target="_self"><?php the_title(); ?></a>
                                </h2>

                                <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>

                                <figure style="aspect-ratio:1;width:49%;" class="wp-block-post-featured-image"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {the_post_thumbnail('medium');} ?></a></figure>

                                <div class="wp-block-group is-vertical is-content-justification-center is-nowrap is-layout-flex wp-container-2 wp-block-group-is-layout-flex" style="border-style:none;border-width:0px;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
                                    <div class="wp-block-group Franjap iniciof is-content-justification-center is-nowrap is-layout-flex wp-container-1 wp-block-group-is-layout-flex" style="justify-content: space-evenly;">
                                        <div style="font-size:12px" class="taxonomy-post_tag version wp-block-post-terms"><span class="wp-block-post-terms__prefix"><strong>Versión: <?php the_tags('', ', ', ''); ?></strong></span></div>

                                        <div style="font-size:12px" class="taxonomy-IPlugins idiomas wp-block-post-terms"><span class="wp-block-post-terms__prefix"><strong>Idiomas: <?php echo get_the_term_list(get_the_ID(), 'IPlugins', '', ', ', ''); ?></strong></span></div>

                                        <div style="font-size:12px;" class="has-text-align-right wp-block-post-date"><?php /*the_time('j \d\e F');*/echo '<strong>Fecha: <span style="color:var(--ast-global-color-0);">'.get_the_modified_date('j \d\e F').'</span></strong>';?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
        <?php }
        wp_reset_postdata();
    } else {
        // No hay más entradas, puedes ocultar el botón de carga
        echo 'No hay más entradas';
    }

// Asegúrate de terminar la ejecución
    die();
}

// Hook para que WordPress reconozca la función Ajax
add_action('wp_ajax_load_more_posts', 'MK20_loadmore_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'MK20_loadmore_load_more_posts');
