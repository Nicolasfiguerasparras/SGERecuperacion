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
        <header class="intro pt75 pb100 parallax-window" data-parallax="scroll" data-speed="0.5" data-position="top right" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/img-bg-9.jpg">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <h1 class="brand-heading font-pacifico text-capitalize fs-75 color-light animated" data-animation="fadeInUp" data-animation-delay="100">I am Pasific H.</h1>
                            <p class="intro-text text-uppercase color-light mb50 animated" data-animation="fadeInUp" data-animation-delay="200">
                                <span class="text-capitalize">
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit<br>
                                    sed quia consequuntur magni dolores eos qui ratione<br>voluptatem sequi nesciun
                                </span>
                            </p>
                            <a class="button button-md button-gray animated" data-animation="fadeInUp" data-animation-delay="700">Hire Me Now <i class="fa fa-download ml10"></i></a>
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
                        <!-- <small class="heading-desc text-lowercase">
                            Last posts published on our website
                        </small> -->
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
        
        <!-- Welcome Area
        ===================================== -->
        <div id="welcome" class="pt75">
            <div class="container">
                <div class="row mb30">
                    <h3 class="text-center">                            
                        Welcome to My Site
                        <small class="heading-desc">
                            Lorem ipsum dolor sit amet consectetur adipiscing elit morbi sagittis.
                        </small>
                        <small class="heading heading-solid center-block"> </small>
                    </h3>
                </div>
                <div class="row">
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <span class="icon-layers color-pasific"></span>
                                <h4>Senior Programmer</h4>
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <span class="icon-bike color-pasific"></span>
                                <h4>Bike Lover</h4>
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <span class="icon-camera color-pasific"></span>
                                <h4>Photographer</h4>
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <span class="icon-briefcase color-pasific"></span>
                                <h4>Co-Founder</h4>
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
                   
        
        <!-- Portfolio Area
        ===================================== -->
        <div id="portfolioGrid">
            <div class="pt50">&nbsp;</div>
            <div class="container pb75">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="filters text-center  mt25 mb50">
                            <li><a class="active" data-filter="*">All Projects</a></li>                          
                            <li><a class="" data-filter=".html">HTMl</a></li>
                            <li><a class="" data-filter=".wordpress">Wordpress</a></li>
                            <li><a class="" data-filter=".woocommerce">WooCommerce</a></li>
                            <li><a class="" data-filter=".joomla">Joomla</a></li>
                            <li><a class="" data-filter=".magento">Magento</a></li>
                            <li><a class="" data-filter=".shopify">Shopify</a></li>
                        </ul>
                        
                        <div class="portfolio center-block">

                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 wordpress woocommerce" data-category="">
                                <a href="assets/img/portfolio/preview/1.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-1.jpg" alt="portfolio woocommerce" class="img-responsive">                                
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 joomla html">
                                <a href="assets/img/portfolio/preview/2.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-3.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 wordpress joomla">
                                <a href="assets/img/portfolio/preview/img-370x165-1.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-2.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 html wordpress">
                                <a href="assets/img/portfolio/preview/3.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-4.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 html joomla wordpress">
                                <a href="assets/img/portfolio/preview/4.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-6.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 html joomla">
                                <a href="assets/img/portfolio/preview/5.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-5.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 wordpress woocommerce">
                                <a href="assets/img/portfolio/preview/6.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-7.jpg" alt="portfolio woocommerce" class="img-responsive">                                
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 joomla html">
                                <a href="assets/img/portfolio/preview/7.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-8.jpg" alt="portfolio woocommerce" class="img-responsive">
                            </div>
                            
                            <div class="portfolio-item col-md-4 col-sm-4 col-xs-4 wordpress woocommerce">
                                <a href="assets/img/portfolio/preview/1.jpg" class="magnific-popup">
                                    <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                </a>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/thumbs/img-550x350-1.jpg" alt="portfolio woocommerce" class="img-responsive">                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>    
        
        
        <!-- Fun Fact Area
        ===================================== -->
        <div id="fact" class="pt75 pb75">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center mb25">                        
                        <h3 class="text-center">                            
                            Better Solution for Web HTML5 Template
                            <small class="heading-desc text-lowercase">
                                Lorem ipsum dolor sit amet consectetur adipiscing.
                            </small>
                        </h3>                 
                        
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="fact">                                    
                                    <div class="fact-number timer" data-perc="387">
                                        <span class="factor color-black"></span>
                                    </div>                                    
                                    <span class="fact-title">Projects Completed</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="fact">
                                    <div class="fact-number timer" data-perc="578">
                                        <span class="factor color-black"></span>
                                    </div>
                                    <span class="fact-title">Happy Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>       
                    
                    <div class="col-md-3 col-md-push-6">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="fact">
                                    <div class="fact-number timer" data-perc="175">
                                        <span class="factor color-black"></span>
                                    </div>
                                    <span class="fact-title">Coffee Cups</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="fact">
                                    <div class="fact-number timer" data-perc="350">
                                        <span class="factor color-black"></span>
                                    </div>
                                    <span class="fact-title">Cupcakes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-md-pull-3 text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/img-other-8.png" alt="macbook" class="img-responsive">
                        <a href="#" class="button button-md button-pasific hover-ripple-out">Hire Me Now</a>
                        <a href="#" class="button button-md button-dark hover-ripple-out">Download Cv</a>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        
        <!-- Price Area
        ===================================== -->
        <div id="price" class="bg-gray pt75 pb75">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center mb50">
                        <h3 class="text-center">                            
                           Family Price for Premium Service
                            <small class="heading-desc text-lowercase">
                                Lorem ipsum dolor sit amet consectetur adipiscing elit morbi sagittis.
                            </small>
                            <small class="heading heading-solid center-block"> </small>
                        </h3>  
                    </div>
                </div>
                
                <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="pulse" data-animation-delay="500">
						<div class="price price-one bg-light">
							<div class="price-header">
								<h4>Design</h4>
								<span><sup>$</sup>49</span>
							</div>
							<div class="price-body">
								<ul>
									<li>Logo Design</li>
									<li>Web Design</li>
								</ul>
							</div>
							<div class="price-footer">
								<a href="#" class="button button-sm button-rounded button-pasific hover-ripple-out">Order Now</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="pulse" data-animation-delay="1000">
						<div class="price price-one active">
							<div class="price-header">
								<h4>Website</h4>
								<span><sup>$</sup>59</span>
							</div>
							<div class="price-body">
								<ul>
									<li>HTML/CSS</li>
									<li>Wordpress</li>
								</ul>
							</div>
							<div class="price-footer">
								<a href="#" class="button button-sm button-rounded button-purple hover-ripple-out">Order Now</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="pulse" data-animation-delay="700">
						<div class="price price-one bg-light">
							<div class="price-header">
								<h4>eCommerce</h4>
								<span><sup>$</sup>69</span>
							</div>
							<div class="price-body">
								<ul>
									<li>WooCommerce</li>
									<li>Shopify</li>
								</ul>
							</div>
							<div class="price-footer">
								<a href="#" class="button button-sm button-rounded button-blue hover-ripple-out">Order Now</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6 col-xs-12 animated" data-animation="pulse" data-animation-delay="900">
						<div class="price price-one bg-light">
							<div class="price-header">
								<h4>Custom</h4>
								<span><sup>$</sup>79</span>
							</div>
							<div class="price-body">
								<ul>
									<li>Website</li>
									<li>Graphic</li>
								</ul>
							</div>
							<div class="price-footer">
								<a href="#" class="button button-sm button-rounded button-cyan hover-ripple-out">Order Now</a>
							</div>
						</div>
					</div>
			
				</div>
                
            </div>
        </div>
                
       
        <!-- General Content Area
        ===================================== -->
        <div id="general-content-1" class="pt75 pb50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="general-content">
                            <h3 class="mb25">
                                Mobile Optimized
                            </h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui 
                                ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia 
                                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                            <a class="button button-md button-pasific hover-ripple-out">Purchase Now</a>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/img-other-13.png" alt="browser iphone" class="img-responsive pull-right">
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        <!-- General Content Area
        ===================================== -->
        <div id="general-content-2" class="pt50 pb50 bt-solid-1">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/img-other-15.png" alt="browser iphone" class="img-responsive pull-left">
                    </div>
                    
                    <div class="col-md-6">
                        <div class="general-content">
                            <h3 class="mb25">
                                Online Store Ready
                            </h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui 
                                ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia 
                                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                            <a class="button button-md button-pasific hover-ripple-out">Purchase Now</a>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
        
        
        <!-- Skill Area
        ===================================== -->
        <div id="skills"  class="pt50 pb50" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/bg-parallax-1.jpg)">
            <div class="container">
                <div class="row">
                    <h3 class="text-center color-light mt35 mb35">My Coding Skills</h3>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-violet center-block" data-value=".65" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title">HTML</span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-blood-mary center-block" data-value=".8" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title">CSS</span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-mojito center-block" data-value=".75" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title">PHP</span>
                        </div>                      
                    </div>

                    <div class="col-md-3 -col-sm-6 col-xs-12">                  
                        <div class="circle-progress circle-progress-bg-grad-tripper center-block" data-value=".7" data-size="150" data-thickness="20">
                            <span class="circle-progress-value color-light"></span>
                            <span class="circle-progress-title">Wordpress</span>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
                
        
        <!-- Service Area
        ===================================== -->
        <div id="service" class="pt75">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">                            
                           I Develope Modern Website &amp; App.
                            <small class="heading-desc text-lowercase">
                               We design and developer html, wordpress, shopify, mobile app, etc.
                            </small>
                            <small class="heading heading-solid center-block"> </small>
                        </h3>
                    </div>
                </div>
                
                <div class="row mt30">                    

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <i class="fa fa-wordpress"></i>
                            <h4>Wordpress</h4>               
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>     
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <i class="fa fa-joomla"></i>
                            <h4>Joomla</h4>               
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>     
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <i class="fa fa-drupal"></i>
                            <h4>Drupal</h4>               
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>     
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-box content-box-center">                        
                            <i class="fa fa-html5"></i>
                            <h4>HTML5</h4>               
                            <p>Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>
                      
                        </div>     
                    </div>
                    
                </div>    
                
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 mt50">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/img-other-11.png" alt="web browser" class="img-responsive">
                    </div>
                </div>
                
            </div>
        </div>
        
        
        <!-- Clients Area
        ===================================== -->
        <div id="client" class="bg-dark2 pt50 pb25 bb-solid-1">
            <div class="container">

                <div class="row">
                          
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/paypal-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="350">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/evernote-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="300">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/microsoft-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="250">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/smashing-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="200">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/mashable-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="150">
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/guardian-gray.png" alt="client logo" class="img-responsive center-block animated" data-animation="fadeIn" data-animation-delay="100">
                    </div>
          
                </div>
                
            </div>
        </div>
        
            
        <!-- Contact Us Area
        =====================================-->
        <div id="contact" class="pt75 pb75 bt-solid-1">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">                            
                           Get In Touch With Us.
                            <small class="heading-desc text-lowercase">
                               Please feel free to say anything here. Our staff will reply as soon as possible. Anything!
                            </small>
                            <small class="heading heading-solid center-block"> </small>
                        </h3>
                    </div>
                </div>
                
                <div class="row mt50">
                    <form name="contactform" id="contactForm" method="post" action="http://myboodesign.com/pasific/assets/php/send.php">
                        
                        <!-- sender name start -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" name="senderName" id="senderName" class="input-md input-rounded form-control" placeholder="fullname" maxlength="100" required>
                            </div>
                        </div>
                        <!-- sender name end -->
                        
                        <!-- sender email start -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <input type="email" name="senderEmail" id="senderEmail" class="input-md input-rounded form-control" placeholder="email address" maxlength="100" required>
                            </div>
                        </div>
                        <!-- sender email end -->
                        
                        <!-- sender website start -->
                        <div class="col-md-3 col-sm-3 col-xs-6">                            
                            <div class="form-group">
                                <input type="url" name="senderWebsite" id="senderWebsite" class="input-md input-rounded form-control" placeholder="http://" maxlength="100">
                            </div>
                        </div>
                        <!-- sender website end -->
                        
                        <!-- security check human start -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" name="senderHuman" id="senderHuman" class="input-md input-rounded form-control" placeholder="" required>
                                <input type="hidden" name="checkHuman_a" id="checkHuman_a">
                                <input type="hidden" name="checkHuman_b" id="checkHuman_b">
                            </div>
                        </div>
                        <!-- security check human end -->
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <textarea class="form-control" name="message" id="message" rows="7" required></textarea>
                            <button type="submit" name="sendMessage" id="sendMessage" class="button-3d button-md button-pasific hover-ripple-out mt20 center-block">Send Message</button>
                        </div>
                        
                        <div id="sendingMessage" class="statusMessage sending-message"><p>Sending your message. Please wait...</p></div>
                        <div id="successMessage" class="statusMessage success-message"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
                        <div id="failureMessage" class="statusMessage failure-message"><p>There was a problem sending your message. Please try again.</p></div>
                        <div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>
                        
                    </form>
                </div>
                
            </div>
        </div>       
        
        
        <!-- Testimonial Area
        ===================================== -->
        <div id="testimonial" class="bg-gray pt50 pb25 bb-solid-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="owlSectionThreeItem" class="owl-carousel">

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-1.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Pasific template is the best template so far. So easy to customize and clean code. Recommended!
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Martin Smith <a href="#">Smashingmagazine.com   </a>
                                </div>
                            </div>

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-2.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Quisque mollis lacus augue, a hendrerit leo tristique vitae. Mauris non ipsum molestie sagittis elit ac vulputate odio.
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Steve Austin <a href="#">envato.com   </a>
                                </div>
                            </div>

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-3.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Fusce quam augue, gravida tincidunt dui nec, tempor iaculis justo. 
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Johny English <a href="#">themeforest.net   </a>
                                </div>
                            </div>

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-1.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Pasific template is the best template so far. So easy to customize and clean code. Recommended!
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Martin Smith <a href="#">Smashingmagazine.com   </a>
                                </div>
                            </div>

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-2.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Quisque mollis lacus augue, a hendrerit leo tristique vitae. Mauris non ipsum molestie sagittis elit ac vulputate odio.
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Steve Austin <a href="#">envato.com   </a>
                                </div>
                            </div>

                            <!-- Testimonial Item -->
                            <div class="testimonial testimonial-center">
                                <div class="testimonial-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/photo-3.jpg" alt="testimonial author" class="img-responsive img-circle">
                                </div>
                                <div class="testimonial-body">
                                    <p>
                                        Fusce quam augue, gravida tincidunt dui nec, tempor iaculis justo. 
                                    </p>
                                </div>
                                <div class="testimonial-footer">
                                    <i class="fa fa-quote-left"></i>
                                    Johny English <a href="#">themeforest.net   </a>
                                </div>
                            </div>                        


                        </div>                     

                    </div>

                </div>
            </div>
        </div>
        
        
        <!-- Newsletter Area
        =====================================-->
        <div id="newsletter" class="bg-dark2 pt75 pb75">
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

        <?php
            get_footer();
        ?>