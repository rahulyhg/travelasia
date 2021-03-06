<?php
/**
 * Travelasia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travelasia
 */

if ( ! function_exists( 'travelasia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travelasia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Travelasia, use a find and replace
		 * to change 'travelasia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelasia', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'fp-menu' => 'Front-page menu',
			'posts-menu' => 'Posts-menu'
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travelasia_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'travelasia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelasia_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travelasia_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelasia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelasia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travelasia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travelasia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travelasia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travelasia_scripts() {
	wp_enqueue_style( 'travelasia-style', get_stylesheet_uri() );

    wp_enqueue_style( 'Google-fonts', $src = 'https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700');

	wp_enqueue_style( 'linear-icons', get_template_directory_uri() . '/css/linearicons.css', array(), '2017' );

	if (is_front_page()){
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '2017' );

	wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/css/owl.theme.default.css', array(), '2017' );
    }

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '2017' );

	//wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '2017' );

	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css', array(), '2017' );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '2017' );

    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), '2017' );

    
    if (is_front_page()){
    	wp_enqueue_script( 'skyscanner_widget', 'https://widgets.skyscanner.net/widget-server/js/loader.js', array(), '20180315', true);
    }


    wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/js/vendor/jquery-2.2.4.min.js', array(), '20151215', true );

    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), '20151215', true );

    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '20151215', true );
    
    if (is_front_page()){
    wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20151215', true );
    }

    wp_enqueue_script( 'ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array(), '20151215', true );

    wp_enqueue_script( 'jq-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '20151215', true );

    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array(), '20151215', true );

    wp_enqueue_script( 'jq-ui', get_template_directory_uri() . '/js/jquery-ui.js', array(), '20151215', true );

    //wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20151215', true );

    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );
     

    wp_enqueue_script( 'travelasia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travelasia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelasia_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 *  Excerpt length
 */
function admoneo_travel_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'admoneo_travel_excerpt_length', 999 );


/**
 *  Custom posts type 
 */
function create_post_type() {

	register_post_type( 'features',
		array(
			'labels' => array(
				'name' => __( 'Features' ),
				'singular_name' => __( 'Feature' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

	register_post_type( 'packages',
		array(
			'labels' => array(
				'name' => __( 'Packages' ),
				'singular_name' => __( 'Package' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

	register_post_type( 'blog',
		array(
			'labels' => array(
				'name' => __( 'Blog-posts' ),
				'singular_name' => __( 'Blog-post' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks', 'author',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

	register_post_type( 'banner',
		array(
			'labels' => array(
				'name' => __( 'Banners' ),
				'singular_name' => __( 'Banner' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks', 'author',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

	register_post_type( 'make-pack',
		array(
			'labels' => array(
				'name' => __( 'Make-package' ),
				'singular_name' => __( 'Make-package' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks', 'author',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

	register_post_type( 'contacts',
		array(
			'labels' => array(
				'name' => __( 'Contacts' ),
				'singular_name' => __( 'Contact' )
			),
			'public' => true,
			'supports' => array('title', 'editor',  'trackbacks', 'author',  'page-attributes', 'post-formats', 'thumbnail', 'excerpt', 'custom-fields'),
			'has_archive' => true,
		)
	);

}
add_action( 'init', 'create_post_type' );

