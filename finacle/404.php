<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package finacle
 */

get_header(); 
if ( get_header_image() ){      
    $overlay = "bg-opacity-black-80";
    $title =  "banner-wrapper";
}
else{
    $overlay = "noverlay";
    $title = "no-banner";
}
	
?>
    
<!-- ====== top-banner starts ====== -->
        <div class="banner-area banner-bg-1 ptb-100  text-center <?php echo esc_attr($overlay);?>" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="<?php echo esc_attr($title);?>">
                            <h2><?php wp_title(''); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ====== top-banner ends ====== -->
<!-- ====== page-404 starts ====== -->
<section class="page-404 pt-110 pb-140">
    <div class="container">
        <h2 class="text-center">
            <?php echo esc_html__( 'Oopsss', 'finacle' ); ?>
        </h2>
        <h3 class="text-center"><?php echo esc_html__( '404', 'finacle' ); ?></h3>
        <div class="text-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button active about-readmore "> <?php echo esc_html__( 'BACK TO HOME', 'finacle' ); ?></a>
    </div>
    </div>
</section>
<!-- ====== page-404 ends ====== -->
<?php get_footer(); ?>	