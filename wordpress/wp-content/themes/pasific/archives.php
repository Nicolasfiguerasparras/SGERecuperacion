<?php
    /*
     * Template Name: Archives
     */

    //  Obtener tags con funcion de function

    // Obtener ultimos post con wp_get_archives(array)

    // Obtener categorías con wp_list_categories('title_li=&show_count=1&echo=0')

?>

<li>
    <h4>Tags</h4>
    <?php echo list_tags(10); ?>
</li>

<li>
    <h4>Últimos posts</h4>
    <?php 
        $args = array(

        );
        wp_get_archives($args); 
    
    ?>
</li>

<li>
    <h4>Categorias</h4>
    <?php wp_list_categories('title_li=&show_count=1&echo=0'); ?>
</li>

<li>
    <h4>Authors</h4>
    <?php wp_list_authors('optioncount=1&hide_empty=0'); ?>
</li>

<li>
    <h4>Daily Posts</h4>
    <ul>
        <?php wp_get_archives('show_post_count=l&type=daily'); ?>
    </ul>
</li>

<li>
    <h4>Monthly Posts</h4>
    <ul>
        <?php wp_get_archives('show_post_count=l'); ?>
    </ul>
</li>

<li>
    <h4>Yearly Posts</h4>
    <ul>
        <?php wp_get_archives('show_post_count=l&type=yearly'); ?>
    </ul>
</li>