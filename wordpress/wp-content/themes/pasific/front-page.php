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
                        $paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
                        // Sacar los últimos 3 posts publicados --- APRENDER DE MEMORIA
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'paged' => $paged
                        );

                        $query = new WP_Query($args);

                        if($query->have_posts()):
                            while($query->have_posts()):
                                $query->the_post();

                                // Sacamos la imagen del autor
                                $my_path = get_template_directory_uri().get_user_meta(get_the_author_meta( 'ID' ), 'picture', true);
                                if(does_url_exists($my_path) > 0){
                                    $profilepic = $my_path;
                                }else{
                                    $profilepic = get_template_directory_uri().'/img/author-default.jpg';
                                }

                                // Sacamos el número de comentarios
                                $comments_number = get_comments_number($post->ID);
                                if($comments_number == 0){
                                    $comments_number = "No comments";
                                }elseif($comments_number == 1){
                                    $comments_number.= " Comment";
                                }else{
                                    $comments_number.= " Comments";
                                }
                    ?>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12 mb50">

                        <div class="blog-one">
                            <div class="blog-one-header">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="blog image" class="img-responsive">
                            </div>
                            <div class="blog-one-attrib">                                
                                <img src="<?php echo $profilepic; ?>" alt="photo blog" class="blog-author-photo">
                                <span class="blog-author-name"><?php the_author_posts_link(); ?></span>
                                <span class="blog-date"><?php echo get_the_date('d-m-Y'); // Funciona mejor get_the_date que the_date por algún motivo ?></span>                                                           
                            </div>
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p class="">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="<?php the_permalink(); ?>">Read More</a>
                                <i class="fa fa-eye"></i><?php echo get_num_visits(get_the_ID()); ?>
                                <i class="fa fa-comments"></i><?php echo $comments_number; ?>
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

                <div class="row">

                    <!-- Paginación -->
                    <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="col-md-12">
                            <?php
                                the_posts_pagination(
                                    array(
                                        'mid_size' => 2,
                                        'prev_text' => 'Previous Page',
                                        'next_text' => 'Next Page',
                                        'screen_reader_text' => 'Pages:'
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>

        <?php
            get_footer();
        ?>