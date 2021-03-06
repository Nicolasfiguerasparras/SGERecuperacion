<?php get_header(); ?>
        
        
        <!-- Navigation Area
        ===================================== -->
        <?php get_template_part('nav'); ?>
        
        
        <!-- Subheader Area
        ===================================== -->
        <header class="bg-grad-stellar mt70">

            <div class="container">
                <div class="row mt20 mb30">
                    <div class="col-md-6 text-left">
                        <h3 class="color-light text-uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Blog Posts<small class="color-light alpha7">our entries.</small></h3>
                    </div>
                    <div class="col-md-6 text-right pt35">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li>Blog Page</li>
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

                    <div class="col-md-9">

                        <div class="row">

                            <div class="col-md-8 col-md-offset-2">

                                <div class="blog-three-mini">

                                    <!-- POST DESTACADO
                                    ===================================== -->
                                    <?php
                                        $arguments = array(
                                            'posts_per_page' => 1,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'post_format',
                                                    'field' => 'slug',
                                                    'terms' => array(
                                                        'post-format-gallery',
                                                        'post-format-link',
                                                        'post-format-video',
                                                        'post-format-audio',
                                                        'post-format-quote',
                                                        'post-format-image',
                                                    ) ,
                                                    'operator' => 'NOT IN',
                                                ),
                                            ),
                                        );

                                        $postdestacado = new WP_Query($arguments);
                                        if($postdestacado->have_posts()):
                                            while($postdestacado->have_posts()):
                                                $postdestacado->the_post();
                                                $idDestacado = get_the_ID();
                                                if(has_post_thumbnail()):
                                                    $postImage = get_the_post_thumbnail_url();
                                                else:
                                                    $postImage = get_template_directory_uri()."/img/blog/blog_default.png";
                                                endif;

                                                // Sacar el n??mero de comentarios
                                                $comments_number = get_comments_number($post->ID);
                                                if($comments_number == 0){
                                                    $comments_number = "No comments";
                                                }elseif($comments_number == 1){
                                                    $comments_number.= " Comment";
                                                }else{
                                                    $comments_number.= " Comments";
                                                }

                                    ?>
                                    
                                    

                                    <h2><a href="#"><?php the_title(); ?></a></h2>
                                    <div class="blog-three-attrib">
                                        <div><i class="fa fa-calendar"></i><?php the_date('d-m-Y'); ?></div> | 
                                        <div><i class="fa fa-pencil"></i><?php the_author_posts_link(); ?></div> | 
                                        <div><i class="fa fa-comment-o"></i><?php echo $comments_number; ?></div> | 
                                        <div><i class="fa fa-eye"></i><?php echo get_num_visits(get_the_ID()); ?></div> | 
                                        
                                    </div>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="image blog">
                                    <p class="mt25"><?php the_excerpt(); ?></p>
                                    <a href="<?php echo the_permalink(); ?>" class="button button-gray button-sm">Read More <i class="fa fa-long-arrow-right"></i></a>

                                    <?php
                                            endwhile;
                                        else:
                                            'No posts published yet...';
                                        endif;
                                        wp_reset_query();
                                    ?>
                                </div>

                            </div>


                        </div>

                        <div class="row blog-masonry-3col">

                            <?php

                                // Sacar ??ltimo post
                                $args = array(
                                    'posts_per_page' => 3,
                                    'post__not_in' => array($idDestacado),
                                );

                                $destacado = new WP_Query($args);

                                if($destacado->have_posts()):
                                    while($destacado->have_posts()):
                                        $destacado->the_post();

                                        // Sacamos la imagen del autor
                                        $my_path = get_template_directory_uri().get_user_meta(get_the_author_meta( 'ID' ), 'picture', true);
                                        if(does_url_exists($my_path) > 0){
                                            $profilepic = $my_path;
                                        }else{
                                            $profilepic = get_template_directory_uri().'/img/author-default.jpg';
                                        }

                                        // Sacar el n??mero de comentarios
                                        $comments_number = get_comments_number($post->ID);
                                        if($comments_number == 0){
                                            $comments_number = "No comments";
                                        }elseif($comments_number == 1){
                                            $comments_number.= " Comment";
                                        }else{
                                            $comments_number.= " Comments";
                                        }
                            ?>

                            <!-- Blog Item -->
                            <div class="col-md-4 col-sm-6 col-xs-12 blog-masonry-item mb25">
                                <div class="blog-one">
                                    <div class="blog-one-header">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="image blog">
                                    </div>
                                    <div class="blog-one-attrib">                                
                                        <img src="<?php echo $profilepic; ?>" alt="photo blog" class="blog-author-photo">
                                        <span class="blog-author-name"><?php the_author_posts_link(); ?></span>                                                           
                                        <span class="blog-date"><?php echo get_the_date('d-m-Y'); // Funciona mejor get_the_date que the_date por alg??n motivo ?></span>                                                          
                                    </div>
                                    <div class="blog-one-body">
                                        <h4 class="blog-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p class=""><?php the_excerpt(); ?></p>
                                    </div>
                                    <div class="blog-one-footer">
                                        <a href="<?php echo the_permalink(); ?>">Read More</a>
                                        <i class="fa fa-eye"></i><?php echo get_num_visits(get_the_ID()); ?>
                                        <i class="fa fa-comments"></i><?php echo $comments_number; ?>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php
                                    endwhile;
                                else:
                                    echo "No posts founded";
                                endif;

                            ?>
                            </div>

                            <div class="row">

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

                    <?php get_sidebar(); ?>

                </div>

            </div>

        </div>
        
        <?php get_footer(); ?>