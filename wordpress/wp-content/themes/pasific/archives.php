<?php
    /*
     * Template Name: Archives
     */

    //  Obtener tags con funcion de function

    // Obtener ultimos post con wp_get_archives(array)

    // Obtener categorías con wp_list_categories('title_li=&show_count=1&echo=0')

    get_header();

?>

        <!-- Page Loader
        ===================================== -->
		<div id="pageloader" class="bg-grad-animation-1">
			<div class="loader-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/oval.svg" alt="page loader">
            </div>
		</div>
        
        <a href="#page-top" class="go-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </a>

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

        <!-- Archives
        ===================================== -->
        <div id="about" class="pt75 pb50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Tags</h3>
                            <?php 
                            // echo list_tags(10);
                            // wp_tag_cloud(); 
                            
                            $html = "";
            foreach(get_tags() as $tag) {
                $tag_link = get_tag_link($tag->term_id);
                $tag_name = $tag->name;
                $html .= "<li><a href='$tag_link'>$tag_name</a></li><br>";
            }
            echo $html;?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Latests posts</h3>
                            <?php 
                                $args = array(
                                    'type'            => 'postbypost',
                                    'before'          => '<li>',
                                    'after'           => '</li><br>',
                                );
                                wp_get_archives($args);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Categories</h3>
                            <?php echo wp_list_categories('title_li=&show_count=1&echo=0'); ?>
                        </div>
                    </div>
                    
                </div>

                <br>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Authors</h3>
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
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Daily Posts</h3>
                            <?php wp_get_archives('show_post_count=l&type=daily'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Monthly Posts</h3>
                            <?php wp_get_archives('show_post_count=l'); ?>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Yearly Posts</h3>
                            <?php wp_get_archives('show_post_count=l&type=yearly'); ?>
                        </div>
                    </div>
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

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="content-box content-box-center archiveBox">
                            <h3 class="text-center">Posts by <?php echo $author->display_name; ?></h3>
                    <?php
                            $args = array(
                                'author' => $author->ID,
                                'orderby' => 'post_date',
                                'order' => 'DESC',
                            );
                            $author_posts = get_posts($args);
                            foreach($author_posts as $my_post) {
                                echo "
                                    <li><a href='".get_permalink($my_post->ID)."'>".$my_post->post_title."</a></li>
                                    <br>
                                ";
                            }
                    ?>
                        </div>
                    </div>

                    <?php
                            $count++;
                            if($count == 2) {
                                echo "
                </div>
                <div class='row'>
                                ";
                                $count = 0;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>


<?php
    get_footer();
?>