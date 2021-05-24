<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    // echo $get_user_meta($curauth->ID, 'facebook', true);
    // echo $get_user_meta($curauth->ID, 'descripcion', true);

    get_header();


    echo $curauth->display_name(); // Para sacar el nombre de usuario
    $curauth->first_name(); // Para sacar el nombre
    $curauth->last_name(); // Para sacar el apellido

    get_user_meta($curauth->ID, 'description', true); // Para sacar la descripción tenemos que hacerlo con el ID del autor como argumento en el método get_user_meta

    // Para evitar un fallo en el layout si el autor no tiene imagen
    $my_path = get_user_meta($curauth->ID, 'picture', true);

    if(strlen($my_path) > 0){
        $profilepic = get_template_directory_uri().$my_path;
    }else{
        $profilepic = get_template_directory_uri().'/ruta/de/defaultimage.jpg';
    }

    // Get author's last posts
    $args = array(
        'posts_per_page'=>4,
        'author' =>$curauth->ID,
    );

    $query = new WP_Query($args);
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post(); // A partir de aquí ya tenemos acceso al post y a sus propiedades.
        endwhile;
    else:
        echo "Not posts published yet...";
    endif;

    wp_reset_query();
    

    // Sacar tags
?>

        <!-- Page Loader
        ===================================== -->
		<div id="pageloader" class="bg-grad-animation-1">
			<div class="loader-item">
                <img src="<?php get_template_directory_uri(); ?>/assets/img/other/oval.svg" alt="page loader">
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
        <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="" data-positionY="1000">
            <div class="intro-body text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pt50">
                            <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                                About Our Company
                                <small class="color-light alpha7">More about us</small>
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
                            <a class="button button-sm button-pasific mt20 hover-ripple-out animated" data-animation="slideInRight" data-animation-delay="100">See posts</a>
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
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill1', true); ?></span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-blood-mary center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill2V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill2', true); ?></span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-mojito center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill3V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill3', true); ?></span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-tripper center-block" data-value=".<?php echo get_user_meta($curauth->ID, 'skill4V', true); ?>" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title"><?php echo get_user_meta($curauth->ID, 'skill4', true); ?></span>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>   




<?php
    get_footer();
?>