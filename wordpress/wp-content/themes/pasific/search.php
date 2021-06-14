<?php
    get_header();

    global $numposts;
    $numposts = 0;

    if(isset($_GET['s'])){
        $words = $_GET['s'];
    }

    $numposts = $wp_the_query->found_posts;
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
                        <h3 class="color-light text-uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Results for:<small class="color-light alpha7"><?php echo $words; ?> (<?php echo $numposts; ?> posts founded).</small></h3>
                    </div>
                    <div class="col-md-6 text-right pt35">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li>Search</li>
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
                            
                            <!--AQUI SE MUESRTAN LOS RESULTADOS EN FORMA DE TABLA CON UN LOOP-->
                            <?php 
                            if (have_posts() ):
                                echo '<table class="table table-hover">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Post</th>
                                            <th scope="col">Author</th>
                                        </tr>';
                                while( have_posts() ):
                                    the_post();
                                    get_template_part('content', 'tab');
                                endwhile;
                                echo "</table>";
                            else:
                                echo "No posts found...";
                            endif;
                            
                            ?>
                            
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