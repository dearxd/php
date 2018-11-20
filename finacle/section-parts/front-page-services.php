<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finacle
*/
$finacle_services_title = get_theme_mod('finacle_services_title');
$finacle_services_section     = get_theme_mod( 'finacle_services_section_hideshow','hide');
  
$services_no        = 6;
$services_pages      = array();
$serviceicon     = array();
  
for( $i = 1; $i <= $services_no; $i++ ) {
   $services_pages[]    =  get_theme_mod( "finacle_services_page_$i", 1 );
   $serviceicon[]    = get_theme_mod( "finacle_page_service_icon_$i", '' );
}

$services_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $services_pages ),
    'posts_per_page' => absint($services_no),
    'orderby' => 'post__in'
); 
    
$services_query = new   wp_Query( $services_args );
if( $finacle_services_section == "show" ) :
?>
    <!-- ====== service starts ====== -->
    <div class="content-section ptb-100 gray-bg hanf-bg" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <div class="main-heading-content text-center bg-color-head">
                        <?php if($finacle_services_title !="") { ?>
                            <h2><?php echo esc_html(get_theme_mod('finacle_services_title')); ?></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="service-wrapper">
                    <?php
                        $count=0;   
                        if($services_query->have_posts()):
                        while($services_query->have_posts()) :
                        $services_query->the_post();
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fa <?php echo esc_html($serviceicon[$count]); ?>"></i>
                            </div>
                            <div class="service-text">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        $count++;
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>   
                </div>
            </div>
        </div>
    </div>
    <!-- ====== service ends ====== -->
<?php
  endif;
?>