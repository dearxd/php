<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package finacle
*/
?>
<!doctype html>
<html class="no-js"<?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!--Shortcut icon-->
    <?php if(!empty($finacle_themes['upload_image_favicon']['url'])) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url( $finacle_themes['upload_image_favicon']['url']); ?>" />
    <?php } ?>
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Start Preloader -->
    <div class="preloader">
        <div class="preloader-wrapper">
            <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
    <!-- start main wrapper area -->
    <div class="main-wrapper">
        <!-- Start Header Style Section -->
        <header>

            <!-- start header top area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <?php  
                             $finacle_header_section = get_theme_mod('finacle_header_section_hideshow' ,'show');
                             if ($finacle_header_section =='show') { 
                             $finacle_phone_value = get_theme_mod('finacle_header_phone_value');
                             $finacle_email_value = get_theme_mod('finacle_header_email_value');
                             $finacle_social_link_1 = get_theme_mod('finacle_header_social_link_1');
                             $finacle_social_link_2 = get_theme_mod('finacle_header_social_link_2');
                             $finacle_social_link_3 = get_theme_mod('finacle_header_social_link_3');
                             $finacle_social_link_4 = get_theme_mod('finacle_header_social_link_4');
                             $finacle_social_link_5 = get_theme_mod('finacle_header_social_link_5');
                        ?>
                        <div class="col-md-8 col-sm-8">
                            <ul class="header-top-left">
                                <?php if (!empty($finacle_email_value)) { ?>
                                    <li>
                                        <a href="#"><i class="fa fa-envelope-o"></i> <?php echo esc_html($finacle_email_value); ?></a>
                                    </li>
                                <?php } ?>
                                <span class="top-sep"></span>
                                <?php if (!empty($finacle_phone_value)) { ?>
                                    <span class="top-sep hidden-xs top"></span>
                                    <li class="hidden-xs">
                                        <a href="#"><i class="fa fa-phone"></i> <?php echo esc_html($finacle_phone_value); ?> </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <ul class="social-bookmarks">
                                <?php 
                                    if (!empty($finacle_social_link_1)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($finacle_social_link_1); ?>">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>    
                                <?php } 
                                    if (!empty($finacle_social_link_2)) { ?>
                                    <li>    
                                        <a href="<?php echo esc_url($finacle_social_link_2); ?>">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>   
                                <?php } 
                                    if (!empty($finacle_social_link_3)) { ?>
                                    <li>  
                                        <a href="<?php echo esc_url($finacle_social_link_3); ?>">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>    
                                <?php } 
                                    if (!empty($finacle_social_link_4)) { ?>
                                     <li>
                                        <a href="<?php echo esc_url($finacle_social_link_4); ?>">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                <?php } 
                                    if (!empty($finacle_social_link_5)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($finacle_social_link_5); ?>">
                                            <i class="fa fa-rss" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End header top area -->
            <div class="header-area sticky-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                                <?php if (has_custom_logo()) : ?> 
                                    <h2>
                                        <?php the_custom_logo(); ?>
                                    </h2>
                                <?php else : ?>
                                        <h2>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                                <span class="site-title" ><?php bloginfo( 'title' ); ?></span>
                                            </a>
                                        </h2>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-10 hidden-xs hidden-sm mainmenu-main-wrapper">
                            <div class="menu-area add-search">
                                <nav>
                                    
                                    <?php wp_nav_menu(
                                        array(
                                            'container' => 'ul', 
                                            'theme_location'    => 'primary', 
                                            'menu_class'        => 'navbar-nav', 
                                            'items_wrap'        => '<ul class="main-menu hover-style-one clearfix">%3$s</ul>',
                                            'fallback_cb'       => 'finacle_wp_bootstrap_navwalker::fallback',
                                            'walker'            => new finacle_wp_bootstrap_navwalker()
                                        )
                                    ); 
                                    ?>    
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-menu-area">
            <div class="logo">
                <?php if (has_custom_logo()) : ?> 
                    <h2><?php the_custom_logo(); ?></h2>
                <?php else : ?>
                    <h2>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                            <span class="site-title" ><?php bloginfo( 'title' ); ?></span>
                        </a>
                    </h2>
                <?php endif;?>
            </div>

            <div class="mobile-menu-custom">
                <?php wp_nav_menu(
                        array(
                            'container' => 'ul', 
                            'theme_location'    => 'primary', 
                            'menu_class'        => 'navbar-nav', 
                            'items_wrap'        => '<ul class="navbar-nav">%3$s</ul>',
                            'fallback_cb'       => 'finacle_wp_bootstrap_navwalker::fallback',
                            'walker'            => new finacle_wp_bootstrap_navwalker()
                        )
                    ); 
                ?>  
           </div>
        </div>
       <!-- ====== header ends ====== -->