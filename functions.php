<?php

require get_template_directory() . '/router/dependency.php';
require get_template_directory() . '/custom-posts-and-category/post.php';
require get_template_directory() . '/custom-posts-and-category/category.php';

if ( ! function_exists( 'example_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function example_theme_setup() {

		add_theme_support('woocommerce');
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on example theme, use a find and replace
		 * to change 'example-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'example-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );



		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'example_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
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
endif;
add_action( 'after_setup_theme', 'example_theme_setup' );


function baseTheme() {
    // wp_enqueue_script('barba', 'https://unpkg.com/@barba/core', array(), '1.0', true);
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css','1.0',false);
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css','1.0',false);

	wp_enqueue_script('axious', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js', array(), '1.0', true);
    // wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array(), '1.0', true);
    wp_enqueue_script('base-theme-scripts', get_theme_file_uri('dist/app.js'), array(), '1.0', true);
    wp_enqueue_style('base-theme-style', get_theme_file_uri('dist/app.css'),array(),'1.0',false);
    wp_localize_script('base-theme-scripts', 'pizzascripts', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
    ));
}
add_action('wp_enqueue_scripts', 'baseTheme');

function register_navwalker(){
	require_once get_template_directory() . '/vendor/bootstrap/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_theme_support( 'menus' );

register_nav_menus( array(
    'primary' => 'Primary Menu',
) );

if ( class_exists( 'WooCommerce' ) ) {
	// code that requires WooCommerce

	add_filter('wp_nav_menu_items','add_to_second_menu', 10, 2);
function add_to_second_menu( $items, $args ) {
    if( $args->theme_location == 'primary')  {
        $items .=   '
		<li class = "menu-item nav-item cart-wrapper">
		<a class="cart-customlocation nav-link" href="' . wc_get_cart_url() . ' " title="" > ' .sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) .' – ' . WC()->cart->get_cart_total()  .' </a>
		</li>

				';
    }
    return $items;
}


/**
 * Show cart contents / total Ajax
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
		<li class = "menu-item nav-item cart-wrapper">
	<a class="cart-customlocation nav-link" href="<?php echo wc_get_cart_url(); ?>" title=""><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>
		</li>

	
	<?php
$fragments['.cart-wrapper'] = ob_get_clean();
	return $fragments;
}
  } 



//include acf

// define( 'MY_ACF_PATH', get_stylesheet_directory() . '/vendor/acf/' );
// define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/vendor/acf/' );

// // Include the ACF plugin.
// include_once( MY_ACF_PATH . 'acf.php' );

// // Customize the url setting to fix incorrect asset URLs.
// add_filter('acf/settings/url', 'my_acf_settings_url');
// function my_acf_settings_url( $url ) {
//     return MY_ACF_URL;
// }


// require_once  get_template_directory() . '/vendor/acf/acf.php';

// // (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return true;
// }

require_once  get_template_directory() . '/custom-posts-and-category/advance-custom-fields.php';


require_once get_template_directory() . '/router/classes/class-routes.php';


Routes::map('example/:example', function($params){
    $query = 'posts_per_page=1&post_type='.$params['example'];
    Routes::load('uniquepage.php', $params, $query, 200);
});



require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Alexlytle/WebFieldTheme/',
	__FILE__,
	'https://webfielddesign.com/'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');


