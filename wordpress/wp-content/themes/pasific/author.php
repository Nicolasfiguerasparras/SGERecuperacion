<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

    get_header();

    // Para evitar un fallo en el layout si el autor no tiene imagen
    $my_path = get_template_directory_uri().get_user_meta($curauth->ID, 'picture', true);

    if(does_url_exists($my_path) > 0){
        $profilepic = $my_path;
    }else{
        $profilepic = get_template_directory_uri().'/img/author-default.jpg';
    }
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
                                Author page
                                <small class="color-light alpha7"><?php echo $curauth->first_name." ".$curauth->last_name; ?></small>
                            </h1>                            
                        </div>
                    </div>
                </div>
                
            </div>
        </header>
    
        <!-- About Area
        ===================================== -->
        <div id="about" class="pt75 pb50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="<?php echo $profilepic; ?>" alt="about us" class="img-responsive center-block">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h3>
                            <?php echo $curauth->display_name; ?>
                            <small class="heading heading-solid"></small>
                        </h3>
                        <p>
                            <?php echo get_user_meta($curauth->ID, 'description', true); ?> <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skill Area
        ===================================== -->
        <div id="skills"  class="pt50 pb50" style="background:url(<?php get_template_directory_uri(); ?>/assets/img/bg/bg-parallax-1.jpg)">
            <div class="container">
                <div class="row">
                    <h3 class="text-center color-light mt35 mb35">My Coding Skills</h3>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-violet center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill1V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light" style="color:black !important;"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill1', true); ?></span>
                        </div>
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-blood-mary center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill2V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light" style="color:black !important;"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill2', true); ?></span>
                        </div>
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-mojito center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill3V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light" style="color:black !important;"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill3', true); ?></span>
                        </div>
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-tripper center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill4V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light" style="color:black !important;"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill4', true); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Area
        ===================================== -->
        <div id="blog" class="bg-gray pt50 pb75">
            <div class="container">
                
                <h3>Latests posts from author</h3>
                
                <div class="row blog-masonry-2col">

                    <?php
                        // Get author's last posts
                        $args = array(
                            'posts_per_page'=>4,
                            'author' =>$curauth->ID,
                        );

                        $query = new WP_Query($args);
                        if($query->have_posts()):
                            while($query->have_posts()):
                                $query->the_post(); // A partir de aquí ya tenemos acceso al post y a sus propiedades.

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
                    <div class="col-md-6 col-sm-6 col-xs-12 blog-masonry-item mb25">
                        <div class="blog-one">
                            <div class="blog-one-header">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="image blog">
                            </div>
                            <div class="blog-one-attrib">                                
                                <img src="<?php echo $profilepic; ?>" alt="photo blog" class="blog-author-photo">
                                <span class="blog-author-name"><?php echo $curauth->first_name." ".$curauth->last_name; ?></span>                                                           
                                <span class="blog-date"><?php echo get_the_date(); ?></span>                                                          
                            </div>
                            <div class="blog-one-body">
                                <h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                <p class="">
                                    <?php echo the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="blog-one-footer">
                                <a href="<?php the_permalink(); ?>">Read More</a>
                                <i class="fa fa-eye"></i><?php echo get_num_visits($post->ID); ?>
                                <i class="fa fa-comments"></i><?php echo $comments_number ?>
                                <i class="fa fa-tags"></i>
                                <?php
                                    $tags = get_the_tags(get_the_ID());
                                    foreach($tags as $tag) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                            endwhile;
                        else:
                            echo "Not posts published yet...";
                        endif;

                        wp_reset_query();
                    ?>
                    
                </div>
                
            </div>
        </div>     

<?php
    get_footer();
?>