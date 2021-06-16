        <?php
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
        
        <!-- Intro Area
        ===================================== -->
        <header class="intro pt75 pb100 parallax-window" data-parallax="scroll" data-speed="0.5" data-position="top right" data-image-src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Audio%2C_Beats_for_Love_2019_01.jpg">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <div class="titleDegrate"><h1 class="brand-heading font-pacifico text-capitalize fs-75 color-light animated" data-animation="fadeInUp" data-animation-delay="100" style="color: white !important; font-family: 'Open Sans', sans-serif !important">Welcome to Studio DnB</h1></div>
                            <p class="intro-text text-uppercase color-light mb50 animated" data-animation="fadeInUp" data-animation-delay="200">
                                <span class="text-capitalize" style="color: white !important; font-family: 'Open Sans', sans-serif !important; font-weight: normal !important;">
                                    A DnB magazine to keep you up to date<br>
                                    on the latest discoveries<br>
                                    in this emerging genre
                                </span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="intro-direction">
                        <a href="#blogs">
                            <div class="mouse-icon"><div class="wheel"></div></div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </header>

        
        <!-- Navigation Area
        ===================================== -->        
        <?php get_template_part('nav'); ?>
        
        <!-- Blog Area
        ===================================== -->
        <div id="blogs" class="bg-gray pt75 pb75">
            <div class="container">
                
                <div class="row mb25">
                    <h3 class="text-center">                            
                        Latest From Our Blog
                        <small class="heading heading-solid center-block"> </small>
                    </h3>
                </div>
                
                <div class="row">


                    <?php
                        // Sacar los últimos 3 posts publicados --- APRENDER DE MEMORIA
                        $args = array(
                            'post_per_page' => 3,
                        );

                        $query = new WP_Query($args);

                        if($query->have_posts()):
                            while($query->have_posts()):
                                $query->the_post();
                    ?>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12 mb50">

                        <div class="blog-one">
                            <div class="blog-one-header">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="blog image" class="img-responsive">
                            </div>
                            <div class="blog-one-attrib">                                
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-1.jpg" alt="photo blog" class="blog-author-photo">
                                <span class="blog-author-name"><?php the_author(); ?></span>
                                <span class="blog-date"><?php the_date(); ?></span>                                                           
                            </div>
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="<?php the_permalink(); ?>">Read More</a>
                                <!-- <i class="fa fa-heart"></i>59 Likes
                                <i class="fa fa-comments"></i><a href="#">120 Comments</a> -->
                            </div>
                        </div>
                    </div>
                    
                    <?php
                            endwhile;
                        else:
                            echo "No post published yet...";
                        endif;

                        wp_reset_query();

                    ?>
                    
                </div>
                
            </div>
        </div>

        <?php
            get_footer();
        ?>