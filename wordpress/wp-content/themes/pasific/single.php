<?php 
    get_header();
    the_post(); // Con esto accedemos a todas las funciones del post
    add_num_visits($post->ID); // Añadimos una visita al post que estamos visitando
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
        
        
        <!-- Search Modal Dialog Box
        ===================================== -->
        <div id="searchModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title text-center"><i class="fa fa-search fa-fw"></i> Search here</h5>
                    </div>
                    <div class="modal-body">                        
                        <form action="#" class="inline-form">
                            <input type="text" class="modal-search-input" autofocus>
                        </form>
                    </div>
                    <div class="modal-footer bg-gray">
                        <span class="text-center"><a href="#" class="color-dark">Advanced Search</a></span>
                    </div>
                </div>

            </div>
        </div>
        
        
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
                        <div class="col-md-8 col-md-offset-2">
                        
                            <div class="blog-three-mini">
                                <h2 class="color-dark"><?php the_title(); ?></h2>
                                <div class="blog-three-attrib">
                                    <i class="fa fa-calendar"></i><?php the_date(); ?> | 
                                    <i class="fa fa-pencil"></i><?php the_author_posts_link(); ?> | 
                                    <div><i class="fa fa-comment-o"></i><a href="#comments"><?php comments_number('No comments', '1 Comment', '% Comments'); ?></a></div> | 
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
                                            <span class="icon-calendar"></span><?php echo get_the_date(); ?> | 
                                            <span class=" icon-pencil"></span><a href="#"><?php the_author(); ?></a>
                                        </div>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="image">
                                        <p class="mt25">
                                            <?php the_excerpt(); ?>                          
                                        </p>
                                        <a href="#" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>

                            </div>
                            
                            
                            <!-- Comments template -->
                            <div class="blog-post-comment-container" id="comments">
                                <!-- <h5><i class="fa fa-comments-o mb25"></i> <?php comments_number('No comments', '1 Comment', '% Comments'); ?></h5> -->

                                <?php //comments_template(); ?>
                                
                                <button class="button button-default button-sm center-block button-block mt25 mb25">Load More Comments</button>
                        
                                
                            </div>
                            
                            <div class="blog-post-leave-comment">
                                <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>
                                
                                <form>
                                    <input type="text" name="name" class="blog-leave-comment-input" placeholder="name" required>
                                    <input type="email" name="name" class="blog-leave-comment-input" placeholder="email"  required>
                                    <input type="url" name="name" class="blog-leave-comment-input" placeholder="website">
                                    <textarea name="message" class="blog-leave-comment-textarea"></textarea>
                                    <button class="button button-pasific button-sm center-block mb25">Leave Comment</button>                            
                                </form>
                                
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
                    
                    <!-- Sidebar
                    ================================= -->
                    <?php
                        get_sidebar();
                    ?>
                    
                </div>                
                
            </div>
        </div>
         
        
        <!-- Newsletter Area
        =====================================-->
        <div id="newsletter" class="bg-dark2 pt50 pb50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-2">
                        <h4 class="color-light">
                            Newsletter
                        </h4>
                    </div>
                    
                    <div class="col-md-10">
                        <form name="newsletter">
                            <div class="input-newsletter-container">
                                <input type="text" name="email" class="input-newsletter" placeholder="enter your email address">
                            </div>
                            <a href="#" class="button button-sm button-pasific hover-ripple-out">Subscribe<i class="fa fa-envelope"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php get_footer(); ?>