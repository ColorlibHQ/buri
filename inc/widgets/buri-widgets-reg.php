<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Buri
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function buri_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'buri'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'buri'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'buri' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="single-footer-widget footer_1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'buri' ),
			'id'            => 'footer-2',
			'before_widget' => '<div class="col-xl-3 col-sm-6 col-md-2 col-lg-3"><div id="%1$s" class="single-footer-widget footer_2 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'buri' ),
			'id'            => 'footer-3',
			'before_widget' => '<div class="col-xl-3 col-sm-6 col-md-4 col-lg-3"><div id="%1$s" class="single-footer-widget footer_3 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	

}
add_action( 'widgets_init', 'buri_widgets_init' );
