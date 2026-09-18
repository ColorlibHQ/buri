<?php 
/**
 * @Packge 	   : Buri
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Buri{

		
		// Theme Version
		private $buri_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '5.2';

		// Minimum PHP version required 
		private $min_php = '7.0';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new buri_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->buri_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'buri_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'buri', BURI_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 22,
				'width'       => 105,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 524,
				'default-image' => get_template_directory_uri() . '/assets/img/banner.jpg'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post' ) );
			
			// Site logo size
			add_image_size( 'buri_logo_77x20', 77, 20, true );

			// About image size
			add_image_size( 'buri_about_img_399x462', 399, 462, true );
			
			// Food Image size
			add_image_size( 'buri_food_img_165x163', 165, 163, true );
			
			// Client Image size
			add_image_size( 'buri_client_img_50x50', 50, 50, true );
			
			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'buri_widget_post_thumb', 80, 80, true );

			// Single blog post image size
			add_image_size( 'buri_single_blog_750x375', 750, 375, true );
			add_image_size( 'buri_np_thumb', 60, 60, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   	=> esc_html__( 'Main Menu', 'buri' ),
	            'quick-links'   	=> esc_html__( 'Quick Links', 'buri' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = BURI_DIR_CSS_URI;
			$jsPath  = BURI_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'gijgo-min-css',
						'file' 			=> $cssPath.'gijgo.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'nice-select-css',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'slick-css',
						'file' 			=> $cssPath.'slick.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'buri-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'popper',
						'file' 			=> $jsPath.'popper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'magnific-popup-js',
						'file' 			=> $jsPath.'jquery.magnific-popup.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'swiper-js',
						'file' 			=> $jsPath.'swiper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'owl-carousel-js',
						'file' 			=> $jsPath.'owl.carousel.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'masonry-pkgd-js',
						'file' 			=> $jsPath.'masonry.pkgd.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery-nice-select-js',
						'file' 			=> $jsPath.'jquery.nice-select.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'slick-js',
						'file' 			=> $jsPath.'slick.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'gijgo-min-js',
						'file' 			=> $jsPath.'gijgo.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'instagram-feed-js',
						'file' 			=> $jsPath.'jquery.instagramFeed.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),

					array(
						'handler'		=> 'buri-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->buri_version,
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){

			$fontUrl = '';
			
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'buri' ) ) {
				
				$font_families = array(
					'Montserrat:300,400',
					'Playfair+Display:400,700,900',
				);

				$familyArgs = array(
					'family' => htmlentities( implode( '|', $font_families ) ),
					'subset' => urlencode( 'latin, latin-text' ),
				);

				$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
			}
			
			return esc_url_raw( $fontUrl );

		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate buri theme customizer
			$buri_theme_customizer = new buri_theme_customizer();
		}
	} // End Buri Class

?>