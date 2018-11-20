<?php 
// To display About Us section on front page

    $finacle_aboutus_section = get_theme_mod('finacle_aboutus_section_hideshow','hide');
    $finacle_aboutus_title =  get_theme_mod('finacle_aboutus_title');  

    $finacle_aboutus_btntxt   =  get_theme_mod('finacle_aboutus_btntxt');
    $finacle_aboutus_btnurl  =  get_theme_mod('finacle_aboutus_btnurl');  
    $aboutus_pages[]          =  get_theme_mod( "finacle_aboutus_page", 1 );

    $aboutus_no    = 6;
    
    $aboutus_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $aboutus_pages ),
        'posts_per_page' => absint($aboutus_no),
        'orderby' => 'post__in'
    ); 
    
    $aboutus_query = new wp_Query( $aboutus_args );
     
    if( $finacle_aboutus_section == "show") :

?>
<!-- About Section -->

         <div class="content-section ptb-100">
            <div class="container">
                <div class="row">
                    <?php
                        if($aboutus_query->have_posts()) :
                           $aboutus_query->the_post();
                    ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="about-left about-left-three">
                                    <?php if($finacle_aboutus_title !="") { ?>
                                         <h1><?php echo esc_html(get_theme_mod('finacle_aboutus_title')); ?></h1>
                                    <?php } ?>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_content(); ?>
                                    <?php if (!empty($finacle_aboutus_btntxt)) { ?> 
                                        <a href="<?php echo esc_url($finacle_aboutus_btnurl); ?>" class="button active about-readmore"><?php echo esc_html($finacle_aboutus_btntxt); ?>
                                        </a>
                                    <?php } ?>
                            </div>
                            <div class="about-right about-right-three">
                            <?php if(has_post_thumbnail()) { ?>
                                <div class="about-thumb">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </div>
                        </div>
                            <?php
                                }
                                endif;
                                wp_reset_postdata();
                            ?> 
                </div>
            </div>
        </div>
            <!-- End about Section -->
    <?php
      endif;
    ?>

                