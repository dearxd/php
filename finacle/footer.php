 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package finacle
*/
$finacle_footer_section = get_theme_mod('finacle_footer_section_hideshow','show');

if ($finacle_footer_section =='show') { 
?>
    <!-- Start footer Section -->
        <footer class="footer-area ">
            <div class="footer-top-section ptb-100 black-bg">
                <div class="container">
                    <div class="row">
                        <div class="widget-wrapper">
                            <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('finacle-footer-widget-area-1'); ?>
                           </div>
                           <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('finacle-footer-widget-area-2'); ?>
                           </div>
                           <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('finacle-footer-widget-area-3'); ?>
                           </div>
                           <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('finacle-footer-widget-area-4'); ?>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <?php if( get_theme_mod('finacle_footer_text') ) : ?>
                                    <p>
                                        <?php echo wp_kses_post( html_entity_decode(get_theme_mod('finacle_footer_text'))); ?>
                                    </p>
                                <?php else : 
                                    /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                                    printf( esc_html__( '%1$sPowered by %2$s%3$s', 'finacle' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'finacle' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
                                    /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                                    printf( esc_html__( 'Theme: finacle by: %1$sDesign By %2$s%3$s', 'finacle' ),'<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'finacle' ) ) .'" target="_blank">"'.esc_html__('CompanyName','finacle').'"</a>', '</span>' );
                                endif;  ?>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Section -->
    </div>
    <!-- start main wrapper area -->
   <?php } ?>

   <?php wp_footer(); ?>
</body>

</html>