<?php
/**
 * WP Shop Woocommerce Theme Customizer
 *
 * @package WP Shop Woocommerce
 */

function wp_shop_woocommerce_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wp_shop_woocommerce_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wp_shop_woocommerce_customize_partial_blogdescription',
			)
		);
	}

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('wp_shop_woocommerce_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Shop Woocommerce Theme Options', 'wp-shop-woocommerce'),
	));

	/*
	* Customizer top header section
	*/

	$wp_customize->add_setting(
		'wp_shop_woocommerce_site_title_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_site_title_text',
		array(
			'label'       => __('Enable Title', 'wp-shop-woocommerce'),
			'description' => __('Enable or Disable Title from the site', 'wp-shop-woocommerce'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'wp_shop_woocommerce_site_tagline_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_site_tagline_text',
		array(
			'label'       => __('Enable Tagline', 'wp-shop-woocommerce'),
			'description' => __('Enable or Disable Tagline from the site', 'wp-shop-woocommerce'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'wp_shop_woocommerce_logo_width',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '150',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_logo_width',
		array(
			'label'       => __('Logo Width in PX', 'wp-shop-woocommerce'),
			'section'     => 'title_tagline',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 100,
	             'max' => 300,
	             'step' => 1,
	         ),
		)
	);

	/*Top Header Options*/
	$wp_customize->add_section('wp_shop_woocommerce_topbar_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Top Header Options', 'wp-shop-woocommerce'),
		'panel'       => 'wp_shop_woocommerce_panel',
	));


	/*Top Header Phone Text*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_header_info_phone',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_header_info_phone',
		array(
			'label'       => __('Edit Phone No ', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_topbar_section',
			'type'        => 'text',
		)
	);

	/*Top Header Phone Text*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_header_info_email',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_header_info_email',
		array(
			'label'       => __('Edit Email Address ', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_topbar_section',
			'type'        => 'text',
		)
	);

	/*Top Header Text*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_header_topbar_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_header_topbar_text',
		array(
			'label'       => __('Edit Header Text ', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_topbar_section',
			'type'        => 'text',
		)
	);

	/*
	* Customizer main header section
	*/

	/*Main Header Options*/
	$wp_customize->add_section('wp_shop_woocommerce_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'wp-shop-woocommerce'),
		'panel'       => 'wp_shop_woocommerce_panel',
	));




	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('wp_shop_woocommerce_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'wp-shop-woocommerce'),
		'panel'       => 'wp_shop_woocommerce_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'wp-shop-woocommerce'),
			'description' => __('Checked to show the main slider', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_slider_section',
			'type'        => 'checkbox',
		)
	);

	for ($i=1; $i <= 3; $i++) { 

		/*Main Slider Image*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'wp_shop_woocommerce_slider_image'.$i, 
				array(
			        'label' => __('Edit Slider Image ', 'wp-shop-woocommerce') .$i,
			        'description' => __('Edit the slider image.', 'wp-shop-woocommerce'),
			        'section' => 'wp_shop_woocommerce_slider_section',
				)
			)
		);

		/*Main extra Slider Heading*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_xtra_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_slider_xtra_heading'.$i,
			array(
				'label'       => __('Edit Extra Heading Text ', 'wp-shop-woocommerce') .$i,
				'description' => __('Edit the slider Extra heading text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_slider_heading'.$i,
			array(
				'label'       => __('Edit Heading Text ', 'wp-shop-woocommerce') .$i,
				'description' => __('Edit the slider heading text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_slider_text'.$i,
			array(
				'label'       => __('Edit Content Text ', 'wp-shop-woocommerce') .$i,
				'description' => __('Edit the slider content text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 Text*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_button1_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_slider_button1_text'.$i,
			array(
				'label'       => __('Edit Button #1 Text ', 'wp-shop-woocommerce') .$i,
				'description' => __('Edit the slider button text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 URL*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_slider_button1_link'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_slider_button1_link'.$i,
			array(
				'label'       => __('Edit Button #1 URL ', 'wp-shop-woocommerce') .$i,
				'description' => __('Edit the slider button url.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_slider_section',
				'type'        => 'url',
			)
		);

	}

	/*
	* Customizer About Us section
	*/
	/*About Us Options*/
	$wp_customize->add_section('wp_shop_woocommerce_product_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Product Category Option', 'wp-shop-woocommerce'),
		'panel'       => 'wp_shop_woocommerce_panel',
	));

	/*Product Enable Option*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_enable_product',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_enable_product',
		array(
			'label'       => __('Enable Product Section', 'wp-shop-woocommerce'),
			'description' => __('Select the category from dropdown', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_product_section',
			'type'        => 'checkbox',
		)
	);

	/*Portfolio Image*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_category_image',
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'wp_shop_woocommerce_category_image', 
				array(
			        'label' => __('Edit Portfolio Image ', 'wp-shop-woocommerce') ,
			        'description' => __('Edit the category image.', 'wp-shop-woocommerce'),
			        'section' => 'wp_shop_woocommerce_product_section',
				)
			)
		);

		/*Portfolio Heading*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_product_sale_heading',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_product_sale_heading',
			array(
				'label'       => __('Edit Sale Heading', 'wp-shop-woocommerce') ,
				'description' => __('Edit Product Sale text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'text',
			)
		);

		/*Portfolio Heading*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_product_discount_text',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_product_discount_text',
			array(
				'label'       => __('Edit Discount Text', 'wp-shop-woocommerce') ,
				'description' => __('Edit Product Discount text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'text',
			)
		);

		/*Portfolio Content*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_product_heading_text',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_product_heading_text',
			array(
				'label'       => __('Edit Heading', 'wp-shop-woocommerce') ,
				'description' => __('Edit product heading text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'text',
			)
		);

		/*Portfolio Content*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_product_sub_heading_text',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_product_sub_heading_text',
			array(
				'label'       => __('Edit Sub Heading', 'wp-shop-woocommerce') ,
				'description' => __('Edit Product heading text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'text',
			)
		);

		/*Portfolio Button*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_category_button1_text',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_category_button1_text',
			array(
				'label'       => __('Edit Button Text', 'wp-shop-woocommerce') ,
				'description' => __('Edit portfolio button text.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'text',
			)
		);

		/*Portfolio Button Link*/
		$wp_customize->add_setting(
			'wp_shop_woocommerce_category_button1_link',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'wp_shop_woocommerce_category_button1_link',
			array(
				'label'       => __('Edit Button Link ', 'wp-shop-woocommerce') ,
				'description' => __('Edit portfolio button link.', 'wp-shop-woocommerce'),
				'section'     => 'wp_shop_woocommerce_product_section',
				'type'        => 'url',
			)
		);

	/*Event Heading*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_event_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_event_heading',
		array(
			'label'       => __('Edit Section Heading', 'wp-shop-woocommerce'),
			'description' => __('Edit product section heading', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_product_section',
			'type'        => 'text',
		)
	);

	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('wp_shop_woocommerce_best_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'wp_shop_woocommerce_sanitize_choices',
	));
	$wp_customize->add_control('wp_shop_woocommerce_best_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Product Category','wp-shop-woocommerce'),
		'section' => 'wp_shop_woocommerce_product_section',
	));

	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('wp_shop_woocommerce_footer_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'wp-shop-woocommerce'),
		'panel'       => 'wp_shop_woocommerce_panel',
	));


	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'wp-shop-woocommerce'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'wp_shop_woocommerce_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'wp-shop-woocommerce'),
			'description' => __('Checked to enable Go To Top option.', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'wp_shop_woocommerce_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'wp_shop_woocommerce_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'wp-shop-woocommerce'),
			'description' => __('Edit the Footer Copyright Section.', 'wp-shop-woocommerce'),
			'section'     => 'wp_shop_woocommerce_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'wp_shop_woocommerce_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wp_shop_woocommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wp_shop_woocommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_shop_woocommerce_customize_preview_js() {
	wp_enqueue_script( 'wp-shop-woocommerce-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), WP_SHOP_WOOCOMMERCE_VERSION, true );
}
add_action( 'customize_preview_init', 'wp_shop_woocommerce_customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class WP_Shop_Woocommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'WP_Shop_Woocommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new WP_Shop_Woocommerce_Customize_Section_Pro( $manager,'wp_shop_woocommerce_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'WP Shop Woocommerce', 'wp-shop-woocommerce' ),
			'pro_text' => esc_html__( 'Buy Pro', 'wp-shop-woocommerce' ),
			'pro_url'  => esc_url('https://www.revolutionwp.com/wp-themes/woocommerce-wordpress-theme/'),
		) )	);

				// Register sections.
		$manager->add_section( new WP_Shop_Woocommerce_Customize_Section_Pro( $manager,'wp_shop_woocommerce_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'WP Shop Woocommerce', 'wp-shop-woocommerce' ),
			'pro_text' => esc_html__( 'Buy Pro', 'wp-shop-woocommerce' ),
			'pro_url'    => esc_url( WP_SHOP_WOOCOMMERCE_BUY_NOW ),
		) )	);

		// Register sections.
		$manager->add_section( new WP_Shop_Woocommerce_Customize_Section_Pro( $manager,'wp_shop_woocommerce_lite_documentation', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Lite Documentation', 'wp-shop-woocommerce' ),
			'pro_text' => esc_html__( 'Instruction', 'wp-shop-woocommerce' ),
			'pro_url'    => esc_url( WP_SHOP_WOOCOMMERCE_LITE_DOC ),
		) )	);

		$manager->add_section( new WP_Shop_Woocommerce_Customize_Section_Pro( $manager, 'wp_shop_woocommerce_live_demo', array(
		    'priority'   => 1,
		    'title'      => esc_html__( 'Pro Theme Demo', 'wp-shop-woocommerce' ),
		    'pro_text'   => esc_html__( 'Live Preview', 'wp-shop-woocommerce' ),
		    'pro_url'    => esc_url( WP_SHOP_WOOCOMMERCE_LIVE_DEMO ),
		) ) );	
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'wp-shop-woocommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'wp-shop-woocommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
WP_Shop_Woocommerce_Customize::get_instance();