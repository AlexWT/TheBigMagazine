<?php

/**
 * Functions file
 *
 * For some the main file in a theme. Here we display meta informaion and the
 * header information like menus and logo.
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

// Include the Slightly Modified Options Framework
require_once ( 'admin/index.php' );

// Include the TBM Framework
require_once ( 'inc/php/TBM_Main.php' );

// Register all the widgets
require_once ( 'inc/php/widgets/main.php' );

if( ! class_exists('TBM_Functions') ) :
class TBM_Functions {

	/**
	 * Call all loading functions for the theme. They will be started right after theme setup.
	 * 
	 * @since v1.0.0
	 */
	public function __construct() {

		// Run after instalation setup.
		$this -> theme_setup();

		// Register actions using add_actions() custom function.
    	$this -> add_actions();

	}

	/**
	 * Initial theme setup
	 * 
	 * Loading scripts and stylesheets. Register custom elements
	 * and functionality in the theme.
	 * 
	 * @uses get_template_directory_uri()
	 * @uses add_theme_support()
	 * @since v1.0.0
	 */
	public function theme_setup() {

		// Custom background
		$image_directory = get_template_directory_uri() . '/img/pattern-background.png';
		add_theme_support( 'custom-background', array( 'default-image' => $image_directory ) );

		// One of the required wordpress supports.
		add_theme_support( 'automatic-feed-links' );

    	// This theme supports a variety of post formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

		//  Support post-thubnails as well!
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'large', 863, 400, true ); 		// The slider max (and all other big images.)
		add_image_size( 'medium', 300, 200, true ); 	// Default medium size
		add_image_size( 'small', 100, 100, true );		// Small size

		// Add support for custom header images
		add_theme_support( 'custom-header' ) ;

		// Editor style : Throught this, you should make the 
		// wordpress editor look like posts. (in css manner)
		add_editor_style( get_template_directory_uri() . 'editor-style.css');

		// Theme localization.
		load_theme_textdomain( 'thebigmag' );
    	load_theme_textdomain( 'thebigmag' , get_template_directory() . '/languages' );

    	// Set content width for custom media information
    	if ( ! isset( $content_width ) ) $content_width = 900;

	}

	/**
	 * Add actions and filters in wordpress theme. All the actions will be here.
	 * 
	 * @uses add_action()
	 * @uses add_filter()
	 * @since v1.0.0
	 */
	public function add_actions() {

		// Register all scripts and styles
		add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_and_styles') );

		// Register all menus.
		add_action( 'init', array( $this, 'register_menus' ) );

		// Register our Widgets
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );

		// Post title filter.
		add_filter( "wp_title", array( $this, "page_title" ) );

		// Change excerpt lenght
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 10 );

		// Add read more link instead of [...]
		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );

	}

	/**
	 * Loading scripts and stylesheets for Innocence
	 * The order of initialising bootstrap css files is important
	 * for the theme responsivness work proerly.
	 * 
	 * @uses wp_enqueue_style()
	 * @since v1.0.0
	 */
	public function load_scripts_and_styles() {

		// Include Bootstrap css/js framework.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array() );
		wp_enqueue_style( 'bootstrap' );

		// The icons from font-awesome.
		// wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array() );
		// wp_enqueue_style( 'font-awesome' );

		wp_enqueue_style( 'font-awesome' , '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array() );
		wp_enqueue_style( 'font-awesome' );

		// Get the main stylesheet for the theme.
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '2013-10-18' );
		wp_enqueue_style( 'stylesheet' );

		// Get the main stylesheet for the theme.
		wp_enqueue_style( 'dynamic', get_template_directory_uri() . '/dynamic.css.php', array(), '2013-10-18' );
		wp_enqueue_style( 'dynamic' );

		// Include the main font used - source sans pro
		wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700', array());
		wp_enqueue_style( 'font' );

		// Include jQuery from WP Core
		wp_enqueue_script( "jquery" );

		// Bootstrap.js file.
		wp_enqueue_script( "bootstrap-js", get_template_directory_uri() . "/js/bootstrap.min.js" );

		// Mansonry script. Used in blog page for organizing content.
		wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js' );

		// My little script addings for jQuery use.
		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js' );
		
	}

	/**
	 * Register navigation menu
	 * 
	 * @uses register_nav_menu()
	 * @since v1.0.0
	 */
	public function register_menus() {

		register_nav_menus( array( 
			'primary' => __( 'Main Menu', 'thebigmag' )
		) );

		register_nav_menus( array( 
			'secoundary' => __( 'Secoundary Menu', 'thebigmag' )
		) );

		register_nav_menus( array( 
			'footer' => __( 'Footer Menu', 'thebigmag' )
		) );

	}

	public function widgets_init() {

		register_sidebar( array(
			'name'          => __( 'Home Page Widget Area', 'thebigmag' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears on home page', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Single page sidebar', 'thebigmag' ),
			'id'            => 'sidebar-single',
			'description'   => __( 'Appears on single post page', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Home Page Widget Area 2', 'thebigmag' ),
			'id'            => 'sidebar-latestPosts',
			'description'   => __( 'Widget area, located right of the recent posts list. It is very narrow, so be careful with the widgets you use!', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// FOOTER SIDEBARS -----------------------------------------------------
		
		register_sidebar( array(
			'name'          => __( 'Footer Column 1', 'thebigmag' ),
			'id'            => 'sidebar-footer1',
			'description'   => __( 'Appears on footer as first column.', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Column 2', 'thebigmag' ),
			'id'            => 'sidebar-footer2',
			'description'   => __( 'Appears on footer as secound column.', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Column 3', 'thebigmag' ),
			'id'            => 'sidebar-footer3',
			'description'   => __( 'Appears on footer as third column.', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Column 4', 'thebigmag' ),
			'id'            => 'sidebar-footer4',
			'description'   => __( 'Appears on footer as forth column.', 'thebigmag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_widget( 'RecentPosts' );

	}

	/**
	 * Write the theme title. It doesnt return anything.
	 * The simple name comes, because its very natural when call it:
	 * Header::title();
	 * 
	 * @uses get_bloginfo()
	 * @uses wp_title()
	 * @uses is_home()
	 * @uses is_front_page();
	 * 
	 * @package The Big Magazine
	 * @since  v1.0.0
	 */
	public function page_title( $title, $sep = ' | ' ) {
		global $page, $paged;

		if ( is_feed() )
			return $title;

		$site_description = get_bloginfo( 'description' );

		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? $sep . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? $sep . sprintf( __( 'Page %s', 'thebigmag' ), max( $paged, $page ) ) : '';

		return $filtered_title;
	}

	/**
	 * Change the default valued for length of the post excerpt.
	 * @param  int $length The length of desired excerpt. (for all pages and all calls)
	 * @return int         Hardcoded value of the excerpt length
	 */
	public function excerpt_length( $length ) {
		return $length;
	}

	/**
	 * Change the default valued for after the post excerpt.
	 * @param  string $more Not used vcariable, wanted from WP
	 * @return string       Link for the post.
	 */
	public function excerpt_more( $more ) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
	}
	

}

$TBM_Functions = new TBM_Functions;
endif;