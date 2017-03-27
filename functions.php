<?php
/**
 * Sparkle Store functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sparkle_Store
 */

if ( ! function_exists( 'sparklestore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparklestore_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sparkle Store, use a find and replace
	 * to change 'sparklestore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sparklestore', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set up the WordPress core woocommerce 
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_image_size( 'sparklestore-logo', 190, 60 );	
	add_theme_support( 'custom-logo', array( 'size' => 'sparklestore-logo' ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('sparklestore-home-blog', 350, 230, true);	
	add_image_size('sparklestore-cat-collection-image', 285, 370, true);	
	add_image_size('sparklestore-cat-image', 300, 470, true);	
	add_image_size('sparklestore-blogs', 760, 385, true);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'sparkleprimary' => esc_html__( 'Primary', 'sparklestore' ),
		'sparklecategory' => esc_html__( 'Category', 'sparklestore' ),		
		'sparkletopmenu' => esc_html__( 'Top Menu', 'sparklestore' ),
		'sparklefootermenu' => esc_html__( 'Footer Menu', 'sparklestore' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sparklestore_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sparklestore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sparklestore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sparklestore_content_width', 640 );
}
add_action( 'after_setup_theme', 'sparklestore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sparklestore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar Widget Area', 'sparklestore' ),
		'id'            => 'sparklesidebarone',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="spstore widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar Widget Area', 'sparklestore' ),
		'id'            => 'sparklesidebartwo',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="spstore widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Sparkle: Main Widget Area', 'sparklestore' ),
		'id'            => 'sparklemainwidgetarea',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="spstore widget-title">',
		'after_title'   => '</h2>',
	));	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area One', 'sparklestore' ),
		'id'            => 'sparklefooterareaone',
		'before_widget' => '<section id="%1$s" class="widget footer-column %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Two', 'sparklestore' ),
		'id'            => 'sparklefooterareatwo',
		'before_widget' => '<section id="%1$s" class="widget footer-column %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Three', 'sparklestore' ),
		'id'            => 'sparklefooterareathree',
		'before_widget' => '<section id="%1$s" class="widget footer-column %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Four', 'sparklestore' ),
		'id'            => 'sparklefooterareafour',
		'before_widget' => '<section id="%1$s" class="widget footer-column %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

}
add_action( 'widgets_init', 'sparklestore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sparklestore_scripts() {

	$sparklestore_theme = wp_get_theme();
	$theme_version = $sparklestore_theme->get( 'Version' );

	/* Sparklestore Google Font */
	$sparklestore_font_args = array(
        'family' => 'Open+Sans:700,600,800,400|Poppins:400,300,500,600,700',
    );
    wp_enqueue_style('sparklestore-google-fonts', add_query_arg( $sparklestore_font_args, "//fonts.googleapis.com/css" ) );

   /* Sparkle Store Font Awesome */
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', esc_attr( $theme_version ) );

    /* Sparkle Store Lightslider CSS */
    wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.css' );

    /* Sparkle Store Main Style */
    wp_enqueue_style( 'sparklestore-style', get_stylesheet_uri() );  
  
    /* Sparkle Store html5 */
    wp_enqueue_script('html5', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), esc_attr( $theme_version ), false);
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    /* Sparkle Store Respond */
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), esc_attr( $theme_version ), false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    /* Sparkle Store Video Promo Video */
    wp_enqueue_script('jquery-youtubebackground', get_template_directory_uri() . '/assets/js/jquery.youtubebackground.js', array('jquery'), esc_attr( $theme_version ), true);

    /* Sparkle Store Lightslider */
    wp_enqueue_script('lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.js', array('jquery'), esc_attr( $theme_version ), true);

    /* Sparkle Store Theme Custom js */
    wp_enqueue_script('sparklestore-common', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), esc_attr( $theme_version ), true);
    wp_localize_script( 'sparklestore-common', 'sparklestore_tabs_ajax_action', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );

    /* Sparkle Store Jquery Section Start */
    wp_enqueue_script( 'sparklestore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version ), true );
    wp_enqueue_script( 'sparklestore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'sparklestore_scripts' );


/**
 * Admin Enqueue scripts and styles.
**/
if ( ! function_exists( 'sparklestore_admin_scripts' ) ) {

    function sparklestore_admin_scripts($hook) {

        if (function_exists('wp_enqueue_media')){
          wp_enqueue_media();
        }
		wp_enqueue_script('sparklestore-media-uploader', get_template_directory_uri() . '/assets/js/sparklestore-admin.js', array( 'jquery', 'customize-controls' ) );
		wp_localize_script('sparklestore-media-uploader', 'sparklestore_remove', array(
		  'upload' => __('Upload', 'sparklestore'),
		  'remove' => __('Remove', 'sparklestore')
		));
        wp_enqueue_style( 'sparklestore-style-admin', get_template_directory_uri() . '/assets/css/sparklestore-admin.css');   
    }

}
add_action('admin_enqueue_scripts', 'sparklestore_admin_scripts');

/**
 * Require init.
**/
require  trailingslashit( get_template_directory() ).'sparklethemes/init.php';