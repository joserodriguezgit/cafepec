<?php
/**
 * WP Shop Woocommerce functions and definitions
 *
 * @package WP Shop Woocommerce
 */

if ( ! defined( 'WP_SHOP_WOOCOMMERCE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WP_SHOP_WOOCOMMERCE_VERSION', '1.0.0' );
}

function wp_shop_woocommerce_setup() {

	load_theme_textdomain( 'wp-shop-woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-shop-woocommerce' ),
			'social-menu' => esc_html__('Social Menu', 'wp-shop-woocommerce'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_shop_woocommerce_custom_background_args',
			array(
				'default-color' => '#fafafa',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
}
add_action( 'after_setup_theme', 'wp_shop_woocommerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_shop_woocommerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_shop_woocommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_shop_woocommerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_shop_woocommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-shop-woocommerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-shop-woocommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'wp-shop-woocommerce' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-shop-woocommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'wp-shop-woocommerce' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'wp-shop-woocommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'wp-shop-woocommerce' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'wp-shop-woocommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_shop_woocommerce_widgets_init' );


function wp_shop_woocommerce_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu menu',
                'menu_id'  => 'menu-social',
            ));
        endif;
    }

/**
 * Enqueue scripts and styles.
 */
function wp_shop_woocommerce_scripts() {

	// Load fonts locally
	require_once get_theme_file_path('revolution/inc/wptt-webfont-loader.php');

	$wp_shop_woocommerce_font_families = array(
		'Caveat Brush',
		'Montserrat:ital,wght@0,100..900;1,100..900',
	);
	
	$wp_shop_woocommerce_fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $wp_shop_woocommerce_font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	wp_enqueue_style('wp-shop-woocommerce-google-fonts', wptt_get_webfont_url(esc_url_raw($wp_shop_woocommerce_fonts_url)), array(), '1.0.0');
	
	// Font Awesome CSS
	wp_enqueue_style('font-awesome-5', get_template_directory_uri() . '/revolution/assets/vendors/font-awesome-5/css/all.min.css', array());

	wp_enqueue_style('owl.carousel.style', get_template_directory_uri() . '/revolution/assets/css/owl.carousel.css', array());
	
	wp_enqueue_style( 'wp-shop-woocommerce-style', get_stylesheet_uri(), array(), WP_SHOP_WOOCOMMERCE_VERSION );

	wp_style_add_data('wp-shop-woocommerce-style', 'rtl', 'replace');

	wp_enqueue_script( 'wp-shop-woocommerce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), WP_SHOP_WOOCOMMERCE_VERSION, true );

	wp_enqueue_script( 'owl.carousel.jquery', get_template_directory_uri() . '/revolution/assets/js/owl.carousel.js', array(), WP_SHOP_WOOCOMMERCE_VERSION, true );

	wp_enqueue_script( 'wp-shop-woocommerce-custom-js', get_template_directory_uri() . '/revolution/assets/js/custom.js', array('jquery'), WP_SHOP_WOOCOMMERCE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_shop_woocommerce_scripts' );

if (!function_exists('wp_shop_woocommerce_related_post')) :
    /**
     * Display related posts from same category
     *
     */
    function wp_shop_woocommerce_related_post($post_id){        
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-post"> 
                    <h2 class="post-title"><?php esc_html_e('Related Posts','wp-shop-woocommerce'); ?></h2>
                    <?php
                    $wp_shop_woocommerce_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $wp_shop_woocommerce_featured_query = new WP_Query($wp_shop_woocommerce_cat_post_args);
                    ?>
                    <div class="rel-post-wrap">
                        <?php
                        if ($wp_shop_woocommerce_featured_query->have_posts()) :

                        while ($wp_shop_woocommerce_featured_query->have_posts()) : $wp_shop_woocommerce_featured_query->the_post();
                            ?>

							<div class="card-item rel-card-item">
								<div class="card-content">
									<div class="entry-title">
										<h3>
											<a href="<?php the_permalink() ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
									<div class="entry-meta">
										<?php wp_shop_woocommerce_posted_on(); ?>
									</div>
								</div>
							</div>
                        <?php
                        endwhile;
                        ?>
                <?php
                endif;
                wp_reset_postdata();
                ?>
                </div>
                <?php
            }
        }
    }
endif;
add_action('wp_shop_woocommerce_related_posts', 'wp_shop_woocommerce_related_post', 10, 1);


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 */
function wp_shop_woocommerce_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

function wp_shop_woocommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/revolution/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/revolution/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/revolution/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/revolution/inc/customizer.php';

/**
 * TGM Plugin Activation.
 */
require get_template_directory() . '/revolution/inc/tgm/tgm.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/revolution/inc/jetpack.php';

}
/**
 * Load getstart.
 */
require get_template_directory() . '/getstarted/getstarted.php';

function wp_shop_woocommerce_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'wp_shop_woocommerce_remove_customize_register', 11 );

// Add admin notice
function wp_shop_woocommerce_admin_notice() { 
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'wp_shop_woocommerce_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();

    if( !$meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } 
		
		if($current_screen->base != 'appearance_page_wp_shop_woocommerce_guide' ) { ?>
			<div class="notice notice-success">
				<h2><?php esc_html_e('Hey, Thank you for installing WP Shop Woocommerce Theme!', 'wp-shop-woocommerce'); ?><span><a class="info-link" href="<?php echo esc_url( admin_url( 'themes.php?page=wp_shop_woocommerce_guide' ) ); ?>"><?php esc_html_e('Click Here for more Details', 'wp-shop-woocommerce'); ?></a></span></h2>
				<p class="dismiss-link"><strong><a href="?wp_shop_woocommerce_admin_notice=1"><?php esc_html_e( 'Dismiss', 'wp-shop-woocommerce' ); ?></a></strong></p>
			</div>
			<?php
		}

	}
}

add_action( 'admin_notices', 'wp_shop_woocommerce_admin_notice' );

if( ! function_exists( 'wp_shop_woocommerce_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function wp_shop_woocommerce_update_admin_notice(){
    if ( isset( $_GET['wp_shop_woocommerce_admin_notice'] ) && $_GET['wp_shop_woocommerce_admin_notice'] = '1' ) {
        update_option( 'wp_shop_woocommerce_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'wp_shop_woocommerce_update_admin_notice' );


add_action('after_switch_theme', 'wp_shop_woocommerce_setup_options');
function wp_shop_woocommerce_setup_options () {
    update_option('wp_shop_woocommerce_admin_notice', FALSE );
}

/**
 * Custom logo
 */



/**
 * Custom logo
 */

function wp_shop_woocommerce_custom_css() {
?>
	<style type="text/css" id="custom-theme-colors" >
        :root {
           
            --wp_shop_woocommerce_logo_width: <?php echo absint(get_theme_mod('wp_shop_woocommerce_logo_width')); ?> ;   
        }
        .main-header .site-branding {
            max-width:<?php echo esc_html(get_theme_mod('wp_shop_woocommerce_logo_width')); ?>px ;    
        }         
	</style>
<?php
}
add_action( 'wp_head', 'wp_shop_woocommerce_custom_css' );

define('WP_SHOP_WOOCOMMERCE_FREE_SUPPORT',__('https://wordpress.org/support/theme/wp-shop-woocommerce/','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_PRO_SUPPORT',__('https://www.revolutionwp.com/support/revolution-wp/','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_REVIEW',__('https://wordpress.org/support/theme/wp-shop-woocommerce/reviews/#new-post','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_BUY_NOW',__('https://www.revolutionwp.com/wp-themes/woocommerce-wordpress-theme/','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_LIVE_DEMO',__('https://www.revolutionwp.com/wpdemo/shop-cart-woocommerce-pro/','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_PRO_DOC',__('https://www.revolutionwp.com/wpdocs/shop-cart-woocommerce-pro/','wp-shop-woocommerce'));
define('WP_SHOP_WOOCOMMERCE_LITE_DOC',__('https://www.revolutionwp.com/wpdocs/shop-cart-woocommerce-free/','wp-shop-woocommerce'));
