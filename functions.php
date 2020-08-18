<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'BURI_DIR_URI' ) )
		define( 'BURI_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'BURI_DIR_ASSETS_URI' ) )
		define( 'BURI_DIR_ASSETS_URI', BURI_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'BURI_DIR_CSS_URI' ) )
		define( 'BURI_DIR_CSS_URI', BURI_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'BURI_DIR_JS_URI' ) )
		define( 'BURI_DIR_JS_URI', BURI_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('BURI_DIR_ICON_IMG_URI') )
		define( 'BURI_DIR_ICON_IMG_URI', BURI_DIR_ASSETS_URI.'img/icons/' );
	
	//DIR inc
	if( !defined( 'BURI_DIR_INC' ) )
		define( 'BURI_DIR_INC', BURI_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'BURI_DIR_ELEMENTOR' ) )
		define( 'BURI_DIR_ELEMENTOR', BURI_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'BURI_DIR_PATH' ) )
		define( 'BURI_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'BURI_DIR_PATH_INC' ) )
		define( 'BURI_DIR_PATH_INC', BURI_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'BURI_DIR_PATH_LIB' ) )
		define( 'BURI_DIR_PATH_LIB', BURI_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'BURI_DIR_PATH_CLASSES' ) )
		define( 'BURI_DIR_PATH_CLASSES', BURI_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'BURI_DIR_PATH_WIDGET' ) )
		define( 'BURI_DIR_PATH_WIDGET', BURI_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'BURI_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'BURI_DIR_PATH_ELEMENTOR_WIDGETS', BURI_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( BURI_DIR_PATH_INC . 'buri-breadcrumbs.php' );
	// Sidebar register file include
	require_once( BURI_DIR_PATH_INC . 'widgets/buri-widgets-reg.php' );
	// Post widget file include
	require_once( BURI_DIR_PATH_INC . 'widgets/buri-recent-post-thumb.php' );
	// News letter widget file include
	require_once( BURI_DIR_PATH_INC . 'widgets/buri-newsletter-widget.php' );
	//Social Links
	require_once( BURI_DIR_PATH_INC . 'widgets/buri-social-links.php' );
	// Instagram Widget
	require_once( BURI_DIR_PATH_INC . 'widgets/buri-instagram.php' );
	// Nav walker file include
	require_once( BURI_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( BURI_DIR_PATH_INC . 'buri-functions.php' );

	// Theme Demo file include
	require_once( BURI_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( BURI_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( BURI_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( BURI_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( BURI_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( BURI_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( BURI_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( BURI_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( BURI_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( BURI_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class buri dashboard
	require_once( BURI_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( BURI_DIR_PATH_INC . 'buri-commoncss.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( BURI_DIR_PATH_INC . 'buri-metabox.php' );
	}


	// Admin Enqueue Script
	function buri_admin_script(){
		wp_enqueue_style( 'buri-admin', get_template_directory_uri().'/assets/css/buri_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'buri_admin', get_template_directory_uri().'/assets/js/buri_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'buri_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Buri object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Buri Dashboard .
	 *
	 */
	
	$Buri = new Buri();
	
