<?php
    get_header();
    the_post(); // Con esto accedemos a todas las funciones del post
    add_num_visits($post->ID); // Añadimos una visita al post que estamos visitando
    $comments_number = get_comments_number($post->ID);
    if($comments_number == 0){
        $comments_number = "No comments";
    }elseif($comments_number == 1){
        $comments_number.= " Comment";
    }else{
        $comments_number.= " Comments";
    }
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
        
        
        <!-- Subheader Area
        ===================================== -->
        <header class="bg-grad-stellar mt70">

            <div class="container">
                <div class="row mt20 mb30">
                    <div class="col-md-6 text-left">
                        <h3 class="color-light text-uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Blog Post</small></h3>
                    </div>
                    <div class="col-md-6 text-right pt35">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog Page</a></li>
                            <li>Blog Post</li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>

        <!-- Blog Area
        ===================================== -->
        <div id="blog" class="pt20 pb50">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-9 mt25">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="blog-three-mini">
                                    <h2 class="color-dark"><?php the_title(); ?></h2>
                                    <div class="blog-three-attrib">
                                        <i class="fa fa-calendar"></i><?php the_date('m-d-Y'); ?> | 
                                        <i class="fa fa-pencil"></i><?php the_author_posts_link(); ?> | 
                                        <div><i class="fa fa-comment-o"></i><a href="#comments"><?php echo $comments_number; ?></a></div> | 
                                        <div><i class="fa fa-eye"></i><?php echo get_num_visits($post->ID); ?></div> | 
                                    </div>

                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image Carousel" class="img-responsive">
                                    <?php the_content(); ?>
                                    
                                    <div class="blog-post-read-tag mt50">
                                        <i class="fa fa-tags"></i> Tags:
                                        <?php
                                        $tags = get_the_tags($post->ID);
                                            foreach($tags as $tag) {
                                                echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                                            }
                                        ?>
                                    </div>
                                    
                                </div>

                                <!-- Related posts -->
                                <?php
                                    $related_query = new WP_Query(
                                                                    array(
                                                                        'post_type' => 'post',
                                                                        'category__in' => wp_get_post_categories(get_the_ID()),
                                                                        'post__not_in' => array(get_the_ID()),
                                                                        'posts_per_page' => 3,
                                                                        'orderby' => 'date',
                                                                    )
                                                                );
                                    if($related_query->have_posts()):
                                ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h5 class="bg-gray pt5 bp10 pl10">Related Articles</h5>
                                    </div>
                                    <!--Blog Post -->
                                    <?php
                                        while($related_query->have_posts()):
                                            $related_query->the_post();
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                                        <div class="blog-three">
                                            <h4 class="blog-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <div class="blog-three-attrib">
                                                <span class="icon-calendar"></span><?php echo get_the_date('d-m-Y'); ?> | 
                                                <span class=" icon-pencil"></span><?php the_author_posts_link(); ?>
                                            </div>
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="image">
                                            <p class="mt25">
                                                <?php the_excerpt(); ?>                          
                                            </p>
                                            <a href="<?php echo the_permalink(); ?>" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    endif;
                                    ?>

                                </div>

                                <div class="blog-post-leave-comment">
                                    <h5><i class="fa fa-comments-o mb25"></i> <?php echo $comments_number; ?></h5>
                                    <?php 
                                        $args = array(
                                            'walker'            => null,
                                            'max_depth'         => '',
                                            'style'             => 'ul',
                                            'callback'          => null,
                                            'end-callback'      => null,
                                            'type'              => 'all',
                                            'page'              => '',
                                            'per_page'          => '',
                                            'avatar_size'       => 32,
                                            'reverse_top_level' => null,
                                            'reverse_children'  => '',
                                            'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
                                            'short_ping'        => false,   // @since 3.6
                                            'echo'              => false     // boolean, default is true
                                        );
                                        $comments = wp_list_comments($args);
                                    ?>
                                    <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>
                                    
                                    <!-- Comments template -->
                                    <?php comments_template(); ?>
                                    
                                </div>

                                <!-- Blog Paging
                                ===================================== -->
                                <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                                    <div class="col-md-6">
                                        <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward">Old Entries</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                       
                        
                    </div>
                    
                    
                   <?php 
                        get_sidebar();   
                    ?>                     
                    
                </div>                
                
            </div>
        </div>

<?php
    get_footer();
?>