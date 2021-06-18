<?php
    /*
     * Template Name: Archives
     */

    get_header();
?>

        <!-- Navigation Area
        ===================================== -->
        <?php get_template_part('nav'); ?>

        <!-- Intro Area
        ===================================== -->
        <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo get_template_directory_uri(); ?>/img/titleBackground.jpg" data-positionY="1000">
            <div class="intro-body text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pt50">
                            <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                                Archives
                            </h1>                            
                        </div>
                    </div>
                </div>
                
            </div>
        </header>

        <!-- Content Box -O Center -->
        <div class="container-fluid mt50" style="margin-right: 5%; margin-left: 5%;">
            <div class="row mb40 pb20">
                
                <!-- Tags -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Tags</h3>               
                        <?php
                            $html = "";
                            foreach(get_tags() as $tag) {
                                $tag_link = get_tag_link($tag->term_id);
                                $tag_name = $tag->name;
                                $html .= "<a href='$tag_link'>$tag_name</a><br><br>";
                            }
                            echo $html;
                        ?>
                    
                    </div>
                </div>

                <!-- Most popular posts -->
                <div class="col-md-6 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Most popular posts</h3>               
                        <?php
                            $args = array(
                                'meta_key' => 'numvisits',
                                'orderby' => 'meta_value_num', // Por defecto en DESC
                            );

                            $popular = new WP_Query($args);
                            
                            if($popular->have_posts()):
                                while($popular->have_posts()):
                                    $popular->the_post();
                        ?>
                        <a href='<?php echo get_permalink($post->ID); ?>''><?php echo $post->post_title; ?> (<?php echo get_num_visits($post->ID); //print_r($popular); ?>)</a><br><br>

                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    
                    </div>
                </div>

                <!-- Most popular posts -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Most commented posts</h3>               
                        <?php
                            $args = array(
                                'orderby' => 'comment_count', // Por defecto en DESC
                            );

                            $mostcommented = new WP_Query($args);
                            
                            if($mostcommented->have_posts()):
                                while($mostcommented->have_posts()):
                                    $mostcommented->the_post();
                        ?>
                        <a href='<?php echo get_permalink($post->ID); ?>''><?php echo $post->post_title; ?> (<?php echo get_comment_number($post->ID); ?>)</a><br><br>

                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Categories</h3>               
                        <?php 
                            echo wp_list_categories(
                                array(
                                    'title_li' => '',
                                    'show_count' => 1,
                                    'echo' => 0,
                                    'style' => 'none'
                                )
                            );
                        ?>
                    
                    </div>
                </div>

                <!-- Authors -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Authors</h3>               
                        <?php 
                            $author_args = array(
                                'optioncount' => 1,
                                'hide_empty' => 0,
                                'echo' => false,
                            );
                            echo wp_list_authors($author_args);
                        ?>
                    </div>
                </div>

                <!-- Daily posts -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Daily posts</h3>               
                        <?php wp_get_archives('show_post_count=l&type=daily'); ?>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top: -2%;">

                <!-- Monthly posts -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Monthly posts</h3>               
                        <?php wp_get_archives('show_post_count=l&type=monthly'); ?>
                    </div>
                </div>

                <!-- Yearly posts -->
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Yearly posts</h3>               
                        <?php wp_get_archives('show_post_count=l&type=yearly'); ?>
                    </div>
                </div>

                <!-- Posts by authors -->

                <?php 
                    $args = array(
                        'display_name',
                        'ID',
                    );
                    $authors = get_users($args);
                    $numauthors = count($authors);
                    $count = 1;
                    foreach($authors as $author) {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12 mb35">
                    <div class="content-box content-box-o content-box-center">                        
                        <span class="icon-tag"></span>
                        <h3>Posts by <?php echo $author->display_name; ?></h3>               
                        <?php
                            $args = array(
                                'author' => $author->ID,
                                'orderby' => 'post_date',
                                'order' => 'DESC',
                            );
                            $author_posts = get_posts($args);
                            foreach($author_posts as $my_post) {
                                echo "
                                    <a href='".get_permalink($my_post->ID)."'>".$my_post->post_title."</a><br>
                                    <br>
                                ";
                            }
                        ?>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>


<?php
    get_footer();
?>