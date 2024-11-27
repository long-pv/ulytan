<?php

/**
 * ulytan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ulytan
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.08');
}

/**
 * size image
 */
if (!defined('THUMBNAIL_SIZE')) {
	define('THUMBNAIL_SIZE', 400);
}
if (!defined('MEDIUM_SIZE')) {
	define('MEDIUM_SIZE', 800);
}
if (!defined('LARGE_SIZE')) {
	define('LARGE_SIZE', 1200);
}

/**
 * no image
 */
if (!defined('NO_IMAGE')) {
	define('NO_IMAGE', get_template_directory_uri() . '/assets/images/no_image.jpg');
}

// config security
if (!defined('AUTOMATIC_UPDATER_DISABLED')) {
	define('AUTOMATIC_UPDATER_DISABLED', true);
}

if (!defined('WP_AUTO_UPDATE_CORE')) {
	define('WP_AUTO_UPDATE_CORE', false);
}

// if (!defined('DISALLOW_FILE_MODS')) {
// 	define('DISALLOW_FILE_MODS', true);
// }

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ulytan_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ulytan, use a find and replace
		* to change 'ulytan' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('ulytan', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ulytan'),
			'menu-2' => esc_html__('Dịch thuật công chứng', 'ulytan'),
		)
	);

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
			'ulytan_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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

	// set size image default
	if (get_option('thumbnail_size_w') != THUMBNAIL_SIZE) {
		update_option('thumbnail_size_w', THUMBNAIL_SIZE);
		update_option('thumbnail_size_h', THUMBNAIL_SIZE);
	}

	if (
		get_option('medium_size_w') != MEDIUM_SIZE
	) {
		update_option('medium_size_w', MEDIUM_SIZE);
		update_option('medium_size_h', MEDIUM_SIZE);
	}

	if (get_option('large_size_w') != LARGE_SIZE) {
		update_option('large_size_w', LARGE_SIZE);
		update_option('large_size_h', LARGE_SIZE);
	}
}
add_action('after_setup_theme', 'ulytan_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ulytan_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ulytan_content_width', 640);
}
add_action('after_setup_theme', 'ulytan_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ulytan_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ulytan'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ulytan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ulytan_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ulytan_scripts()
{
	wp_enqueue_style('ulytan-style', get_stylesheet_uri(), array(), _S_VERSION);

	// add vendor js
	wp_enqueue_script('ulytan-script-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), _S_VERSION, true);

	// validate
	wp_enqueue_script('ulytan-script-validate', get_template_directory_uri() . '/assets/inc/validate/validate.js', array(), _S_VERSION, true);

	// scroll smooth hash id element
	wp_enqueue_script('ulytan-script-scroll_smooth', get_template_directory_uri() . '/assets/js/scroll_smooth.js', array(), _S_VERSION, true);

	// stickyNavigator
	wp_enqueue_script('ulytan-script-stickyNavigator', get_template_directory_uri() . '/assets/js/jquery-stickyNavigator.js', array(), _S_VERSION, true);

	//add custom main css/js
	wp_enqueue_style('ulytan-style-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
	wp_enqueue_script('ulytan-script-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'ulytan_scripts');

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/security.php';
