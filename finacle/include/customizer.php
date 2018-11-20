<?php
/**
 * finacle Theme Customizer
 *
*/

function finacle_customize_register( $wp_customize ) {

	// finacle theme choice options
	if (!function_exists('finacle_section_choice_option')) :
		function finacle_section_choice_option()
		{
			$finacle_section_choice_option = array(
				'show' => esc_html__('Show', 'finacle'),
				'hide' => esc_html__('Hide', 'finacle')
			);
			return apply_filters('finacle_section_choice_option', $finacle_section_choice_option);
		}
	endif;
	
	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('finacle_sanitize_select') ) :
		function finacle_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function finacle_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel('frontpage', 
	    array(
            'title' => esc_html__('Finacle Options', 'finacle'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);

/** Header Section Settings Start **/

    $wp_customize->add_section('header_info', 
        array(
            'title'       => __('Header Section', 'finacle'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 40
        )
    );
  
    $wp_customize->add_setting(
    'finacle_header_section_hideshow',
    array(
        'default'           => 'show',
        'sanitize_callback' => 'finacle_sanitize_select',
    )
    );

    $finacle_header_section_hide_show_option = finacle_section_choice_option();

    $wp_customize->add_control('finacle_header_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Header Option', 'finacle'),
            'description' => esc_html__('Show/hide option for Header Section.', 'finacle'),
            'section'     => 'header_info',
            'choices'     => $finacle_header_section_hide_show_option,
            'priority'    => 1
        )
    );
  
  
    $wp_customize->add_setting('finacle_header_email_value', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_header_email_value',
        array(
            'label'    => __('Email', 'finacle'),
            'section'  => 'header_info',
            'priority' => 3
        )
    );
  
  
    $wp_customize->add_setting('finacle_header_phone_value', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_header_phone_value',
         array(
            'label'     => __('Contact', 'finacle'),
            'section'   => 'header_info',
            'priority'  => 4
        )
     );


    $wp_customize->add_setting('finacle_header_social_link_1', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('finacle_header_social_link_1', 
        array(
            'label'   => esc_html__('Facebook URL', 'finacle'),
            'section' => 'header_info',
            'priority'  => 1
        )
    );

    $wp_customize->add_setting('finacle_header_social_link_2', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('finacle_header_social_link_2', 
        array(
            'label'   => esc_html__('Twitter URL', 'finacle'),
            'section' => 'header_info',
            'priority'  => 1
        )
    );

    $wp_customize->add_setting('finacle_header_social_link_3', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('finacle_header_social_link_3', 
        array(
            'label'   => esc_html__('Linkedin URL', 'finacle'),
            'section' => 'header_info',
            'priority'  => 1
        )
    );

    $wp_customize->add_setting('finacle_header_social_link_4', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('finacle_header_social_link_4', 
        array(
            'label'   => esc_html__('Youtube URL', 'finacle'),
            'section' => 'header_info',
            'priority'  => 1
        )
    );

    $wp_customize->add_setting('finacle_header_social_link_5', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('finacle_header_social_link_5', 
        array(
            'label'   => esc_html__('RSS URL', 'finacle'),
            'section' => 'header_info',
            'priority'  => 1
        )
    );

 /** Header Section Settings end **/
     

	/** Slider Section Settings starts **/
   
    // Panel - Slider Section 1
    $wp_customize->add_section('sliderinfo', 
        array(
	        'title'   => esc_html__('Home Slider Section', 'finacle'),
	        'description' => '',
		    'panel' => 'frontpage',
	        'priority'    => 140
        )
    );

	
    $slider_no = 3;
	for( $i = 1; $i <= $slider_no; $i++ ) {
		$finacle_slider_page =   'finacle_slider_page_' .$i;
		$finacle_slider_btntxt = 'finacle_slider_btntxt_' . $i;
		$finacle_slider_btnurl = 'finacle_slider_btnurl_' .$i;
		 

		$wp_customize->add_setting( $finacle_slider_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'finacle_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $finacle_slider_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'finacle' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $finacle_slider_btntxt,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $finacle_slider_btntxt,
			array(
				'label'    			=> esc_html__( 'Slider Button Text','finacle' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( $finacle_slider_btnurl,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( $finacle_slider_btnurl,
			array(
				'label'    			=> esc_html__( 'Button URL', 'finacle' ),
				'section'  			=> 'sliderinfo',
				'priority' 			=> 100,
			)
		);
    }
    /** Slider Section Settings end **/

    /** Aboutus Section Settings Start **/

    $wp_customize->add_section('aboutus',              
        array(
            'title'       => esc_html__('About Us Section', 'finacle'),          
            'description' => '',             
            'panel'       => 'frontpage',      
            'priority'    => 140,
        )
    );
    
    $wp_customize->add_setting('finacle_aboutus_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'finacle_sanitize_select',
        )
    );

    $finacle_aboutus_section_hide_show_option = finacle_section_choice_option();

    $wp_customize->add_control('finacle_aboutus_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('About Us Option', 'finacle'),
            'description' => esc_html__('Show/hide option for About Section.', 'finacle'),
            'section'     => 'aboutus',
            'choices'     => $finacle_aboutus_section_hide_show_option,
            'priority'    => 1
        )
    );


    // About Us Title

    $wp_customize->add_setting('finacle_aboutus_title',
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
     );

    $wp_customize->add_control('finacle_aboutus_title', 
        array(
            'label'    => __('About Us Title', 'finacle'),
            'section'  => 'aboutus',
            'priority' => 1
        )
    );

    

    // About Us
   
  
    $wp_customize->add_setting( 'finacle_aboutus_page',
        array(
            'default'           => 1,
            'sanitize_callback' => 'finacle_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( 'finacle_aboutus_page',
        array(
            'label'        => esc_html__( 'About Us Page ', 'finacle' ) .$i,
            'section'      => 'aboutus',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );
    
    $wp_customize->add_setting( 'finacle_aboutus_btntxt',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 'finacle_aboutus_btntxt',
			array(
				'label'    			=> esc_html__( 'Aboutus Button Text','finacle' ),
				'section'  			=> 'aboutus',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( 'finacle_aboutus_btnurl',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 'finacle_aboutus_btnurl',
			array(
				'label'    			=> esc_html__( 'Button URL', 'finacle' ),
				'section'  			=> 'aboutus',
				'priority' 			=> 100,
			)
		);
   
    /** About Us Section Settings End **/

    /** Services Section Settings Start **/
		
		$wp_customize->add_section('services',              
			array(
				'title' => esc_html__('Home service Section', 'finacle'),          
				'description' => '',             
				'panel' => 'frontpage',		 
				'priority' => 150,
			)
		);
			
		$wp_customize->add_setting('finacle_services_section_hideshow',
			array(
				'default' => 'hide',
				'sanitize_callback' => 'finacle_sanitize_select',
			)
		);

		$finacle_services_section_hide_show_option = finacle_section_choice_option();

		$wp_customize->add_control('finacle_services_section_hideshow',
			array(
				'type' => 'radio',
				'label' => esc_html__('Services Option', 'finacle'),
				'description' => esc_html__('Show/hide option Section.', 'finacle'),
				'section' => 'services',
				'choices' => $finacle_services_section_hide_show_option,
				'priority' => 1
			)
		);
 
    // services title
    $wp_customize->add_setting('finacle_services_title', 
    	array(
		    'default'   => '',
		    'type'      => 'theme_mod',
		    'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_services_title', 
    	array(
		    'label'   => esc_html__('Service Section Title', 'finacle'),
		    'section' => 'services',
		    'priority'  => 3
        )
    );

    
	
    $services_no = 3;
	for( $i = 1; $i <= $services_no; $i++ ) {
		$finacle_servicespage = 'finacle_services_page_' . $i;
		$serviceicon = 'finacle_page_service_icon_' . $i;
		
		// Setting - Feature Icon
		$wp_customize->add_setting( $serviceicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $serviceicon,
			array(
				'label'    			=> esc_html__( 'Service Icon ', 'finacle' ).$i,
				'description' =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','finacle'),
				'section'  			=> 'services',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( $finacle_servicespage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'finacle_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $finacle_servicespage,
			array(
				'label'    			=> esc_html__( 'Services Page ', 'finacle' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
    }
    
   /** Services Section Settings End **/

    
   /** Project Section Settings Start **/

	$wp_customize->add_section('projects',              
		array(
			'title' => esc_html__('Project Section', 'finacle'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 160,
		)
	);
		
	$wp_customize->add_setting('finacle_projects_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'finacle_sanitize_select',
	    )
    );

    $finacle_projects_section_hide_show_option = finacle_section_choice_option();

    $wp_customize->add_control('finacle_projects_section_hideshow',
		array(
		    'type' => 'radio',
		    'label' => esc_html__('Projects Option', 'finacle'),
		    'description' => esc_html__('Show/hide option Section.', 'finacle'),
		    'section' => 'projects',
		    'choices' => $finacle_projects_section_hide_show_option,
		    'priority' => 1
		)
	);
    // projects title
    $wp_customize->add_setting('finacle_projects_title', 
    	array(
		    'default'   => '',
		    'type'      => 'theme_mod',
		    'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_projects_title', 
    	array(
		    'label'   => esc_html__('Projects Section Title', 'finacle'),
		    'section' => 'projects',
		    'priority'  => 3
        )
    );

    $wp_customize->add_setting('finacle_projects_subtitle', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_projects_subtitle', 
        array(
            'label'   => esc_html__('Projects Section Subtitle', 'finacle'),
            'section' => 'projects',
            'priority'  => 3
        )
    );
	
    $projects_no = 6;
	for( $i = 1; $i <= $projects_no; $i++ ) {
		$finacle_projectspage = 'finacle_projects_page_' . $i;
		
		$wp_customize->add_setting( $finacle_projectspage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'finacle_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $finacle_projectspage,
			array(
				'label'    			=> esc_html__( 'Projects Page ', 'finacle' ) .$i,
				'section'  			=> 'projects',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
    }

    /** Project Section Settings End **/


     /** Blog Section Settings Start **/
            
            
	$wp_customize->add_section('finacle-blog_info', 
		array(
		    'title'   => esc_html__('Home Blog Section', 'finacle'),
		    'description' => '',
			'panel' => 'frontpage',
		    'priority'    => 170
        )
	);
	
	$wp_customize->add_setting('finacle_blog_section_hideshow',
	    array(
	        'default' => 'show',
	        'sanitize_callback' => 'finacle_sanitize_select',
	    )
	);
    
    $finacle_blog_section_hide_show_option = finacle_section_choice_option();
    
    $wp_customize->add_control('finacle_blog_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Blog Option', 'finacle'),
	        'description' => esc_html__('Show/hide option for Blog Section.', 'finacle'),
	        'section' => 'finacle-blog_info',
	        'choices' => $finacle_blog_section_hide_show_option,
	        'priority' => 1
	    )
    );
	
	$wp_customize->add_setting('finacle_blog_title', 
		array(
		    'default'   => '',
		    'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
        )
	);

    $wp_customize->add_control('finacle_blog_title', 
    	array(
            'label'   => esc_html__('Blog Title', 'finacle'),
            'section' => 'finacle-blog_info',
            'priority'  => 1
        )
    );

    $wp_customize->add_setting('finacle_blog_subtitle', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('finacle_blog_subtitle', 
        array(
            'label'   => esc_html__('Blog Subtitle', 'finacle'),
            'section' => 'finacle-blog_info',
            'priority'  => 1
        )
    );
    
    /** Blog Section Settings End **/

     
    /** CallOut Section Settings Start **/


    $wp_customize->add_section('finacle_footer_contact', 
    	array(
		    'title'   => esc_html__('Callout Section', 'finacle'),
		    'description' => '',
		    'panel' => 'frontpage',
		    'priority'    => 170
        )
    );
	
	$wp_customize->add_setting('finacle_contact_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'finacle_sanitize_select',
	    )
    );

    $finacle_contact_s_hideshow = finacle_section_choice_option();
    
    $wp_customize->add_control('finacle_contact_section_hideshow',
		array(
	        'type' => 'radio',
	        'label' => esc_html__('Footer Callout', 'finacle'),
	        'description' => esc_html__('Show/hide option for Footer Callout Section.', 'finacle'),
	        'section' => 'finacle_footer_contact',
	        'choices' => $finacle_contact_s_hideshow,
	        'priority' => 5
		)
	);

	$wp_customize->add_setting('ctah_heading', 
		array(
		    'default'   => '',
		    'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
        )
	);

    $wp_customize->add_control('ctah_heading', 
    	array(
		    'label'   => esc_html__('Callout Text', 'finacle'),
		    'section' => 'finacle_footer_contact',
		    'priority'  => 8
        )
    );

    $wp_customize->add_setting('ctah_btn_url', 
    	array(
		    'default'   =>'',
		    'type'      => 'theme_mod',
		    'sanitize_callback'	=> 'esc_url_raw'
        )
    );

    $wp_customize->add_control('ctah_btn_url', 
    	array(
		    'label'   => esc_html__('Button URL', 'finacle'),
		    'section' => 'finacle_footer_contact',
		    'priority'  => 10
        )
    );

    $wp_customize->add_setting('ctah_btn_text', 
    	array(
		    'default'   => '',
		    'type'      => 'theme_mod',
		    'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('ctah_btn_text', 
    	array(
		    'label'   => esc_html__('Button Text', 'finacle'),
		    'section' => 'finacle_footer_contact',
		    'priority'  => 12
        )
    );

     /** Callout Section Settings End **/


    /** Footer Section Settings Start **/

    $wp_customize->add_section('finacle_footer_info',
        array(
            'title'       => __('Footer Section', 'finacle'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 180
        )
    );

    $wp_customize->add_setting('finacle_footer_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'finacle_sanitize_select',
        )
    );

    $finacle_footer_section_hide_show_option = finacle_section_choice_option();

    $wp_customize->add_control('finacle_footer_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Footer Option', 'finacle'),
            'description' => esc_html__('Show/hide option for Footer Section.', 'finacle'),
            'section'     => 'finacle_footer_info',
            'choices'     => $finacle_footer_section_hide_show_option,
            'priority'    => 1
        ) 
    );


    $wp_customize->add_setting('finacle_footer_text',
         array(
            'default'             => '',
            'type'                => 'theme_mod',
            'sanitize_callback'   => 'wp_kses_post'
        )
    );

    $wp_customize->add_control('finacle_footer_text',
         array(
            'label'    => __('Copyright', 'finacle'),
            'section'  => 'finacle_footer_info',
            'type'     => 'textarea',
            'priority' => 2
    ));

    /** Footer Section Settings End **/

}
add_action( 'customize_register', 'finacle_customize_register' );

