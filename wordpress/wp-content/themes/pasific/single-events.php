<?php
    $paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
    $args = array(
        'post_per_page' => 2,
        'post__not_in' => array($post_destacado_id),
        'post_type' => array('events'),
        'paged' => $paged, // Para una plantilla NO estatica, uso paged
    );

    $query = new WP_Query($args);

    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();

            // Sacamos el post

        endwhile;
    endif;

    $big = 999999999;
    echo paginate_links(array(
        'prev_text' => 'Previous Page',
        'next_text' => 'Next Page',
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $query->max_num_pages
    ));

?>