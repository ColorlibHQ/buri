<?php 
/**
 * @Packge     : Buri
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function buri_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Site icon callback
=========================================================*/

function buri_site_icon(){
	if ( ! has_site_icon() ) {
		$html = '';
		$icon_path = BURI_DIR_ASSETS_URI . 'img/favicon.png';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="32x32">';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="192x192">';
		$html .= '<link rel="apple-touch-icon-precomposed" href="' . esc_url ( $icon_path ) . '">';
		$html .= '<meta name="msapplication-TileImage" content="' . esc_url ( $icon_path ) . '">';

		return $html;
	} else {
		return;
	}
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function buri_meta( $id = '', $buri_value_type = true ){
    
    $value = get_post_meta( get_the_ID(), '_buri_'.$id, $buri_value_type );
    
    return $value;
}


/*=========================================================
	Body support function
=========================================================*/
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/*=========================================================
	Project iner images function
=========================================================*/
function buri_get_project_iner_imgs( $project_iner_imgs ) {
	$count = 1;
	$project_img_src = '';
    foreach ( $project_iner_imgs as $project_img ) {
        if ( $count == 1 ) {
            $project_img_src .= wp_get_attachment_image( $project_img, 'buri_project_inner_img_750x750', false, array( 'alt' => 'project iner image'. $count ) );
        } else {
            $project_img_src .= wp_get_attachment_image( $project_img, 'buri_project_inner_img_750x750', false, array( 'alt' => 'project iner image'. $count, 'class' => 'mt-4' ) );
        }
        $count++;
	}
	return $project_img_src;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function buri_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'buri_excerpt_length' ) ) {
	function buri_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'buri_posted_comments' ) ) {
    function buri_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','buri');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','buri');
            } else {
                $comments = esc_html__( '1 Comment','buri' );
            }
            $comments = '<i class="ti-comments"></i> '. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'buri' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function buri_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function buri_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'buri' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'buri' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Specific Social icons overwritten by flaticon
====================================================*/

function buri_social_icon_overwrite_by_flaticon( $social_icon ){
	switch ( $social_icon ) {
		case ($social_icon == 'fa fa-facebook' || $social_icon == 'fa fa-facebook-f'):
			$social_icon = 'flaticon-facebook';
			break;
		case ($social_icon == 'fa fa-twitter'):
			$social_icon = 'flaticon-twitter';
			break;
		case ($social_icon == 'fa fa-skype'):
			$social_icon = 'flaticon-skype';
			break;
		case ($social_icon == 'fa fa-instagram'):
			$social_icon = 'flaticon-instagram';
			break;
		
		default:
			$social_icon = $social_icon;
			break;
	}

	return $social_icon;
}

/*====================================================
	Theme logo
====================================================*/
function buri_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'buri_logo_77x20' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt="buri logo"></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a><span>'. esc_html( get_bloginfo('description') ) .'</span></h2>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Get Menu name
================================================*/
function buri_get_menu_name( $menu_location = 'primary-menu' ) {
	$menu_locations = get_nav_menu_locations();
	
	$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
	
	$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
	
	return esc_html($menu_name);
}


/*================================================
    Page Title Bar
================================================*/
function buri_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="breadcrumb_tittle">
						<?php
							if ( function_exists( 'buri_breadcrumbs' ) ) {
								buri_breadcrumbs();
							}
						?>
						<h2>
							<?php
							if ( is_category() ) {
								single_cat_title( __('Category: ', 'buri') );

							} elseif ( is_tag() ) {
								single_tag_title( __('Tag Archive for - ', 'buri') );

							} elseif ( is_archive() ) {
								echo get_the_archive_title();

							} elseif ( is_page() ) {
								echo get_the_title();

							} elseif ( is_search() ) {
								echo esc_html__( 'Search for: ', 'buri' ) . get_search_query();

							} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
								echo  get_the_title();

							} elseif ( is_home() ) {
								echo esc_html__( 'Blog', 'buri' );

							} elseif ( is_404() ) {
								echo esc_html__( '404 error', 'buri' );

							}
							?>
						</h2>
					</div>
				</div>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function buri_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function buri_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function buri_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' && ! is_front_page() ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'"> <i class="ti-bookmark"></i> '.esc_html( $value->name ).'</a>';
			}else{
				$getCat[] = '<i class="ti-bookmark"></i>'.esc_html( $value->name );
			}
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function buri_sidebar_opt(){

    $sidebarOpt = buri_opt( 'buri_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function buri_themify_icon(){
    return[
        'flaticon-love-and-romance'     => __('Flaticon Love and Romance', 'buri'),
        'flaticon-leaf'      			=> __('Flaticon Leaf', 'buri'),
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function buri_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm class:btn_1 "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'buri_contact7_form_content', 10, 2 );


// Set the title
function mod_contact7_form_title( $template ) {
	$template->set_title( 'Contact Us' );
	return $template;
}

add_filter( 'wpcf7_contact_form_default_pack', 'mod_contact7_form_title');



/*============================================================
	Pagination
=============================================================*/
function buri_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'buri' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'buri' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('buri_blog_single_post_navigation') ) {
	function buri_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'buri_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'buri' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'buri' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'buri_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function buri_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Buri Comment Template Callback
 ====================================================*/
function buri_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'buri' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'buri'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'buri' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'buri' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'buri_replace_reply_link_class');
function buri_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function buri_latest_blog( $pNumber = 3, $post_cat = '', $post_order = 'DESC' ){
	
	function buri_get_catname_link() {
		$buri_cat = '';
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$buri_cat .= '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"  class="category_btn">' . esc_html( $categories[0]->name ) . '</a>';
		}
		return $buri_cat;
	}
	
	$lBlog = new WP_Query( array(
		'post_type'      => 'post',
		'category_name'	 => $post_cat,
		'posts_per_page' => $pNumber,
		'order'			 => $post_order
    ) );

    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post();
		?>

		<div class="col-sm-6 col-lg-4 col-xl-4">
			<div class="single-home-blog">
				<div class="card">
					<?php
						if( has_post_thumbnail() ){
							the_post_thumbnail( 'buri_latest_blog_360x363', ['alt' => get_the_title(), 'class' => 'card-img-top' ] );
						}
					?>
					<div class="card-body">
						<ul>
							<li> <?php echo buri_posted_comments();?></li>
							<li> <?php echo get_simple_likes_button( get_the_ID() );?></li>
						</ul>
						<a href="<?php the_permalink(); ?>">
							<h5 class="card-title"><?php the_title(); ?></h5>
						</a>
						<a href="<?php the_permalink(); ?>" class="btn_3"><?php echo _e('read more', 'buri')?></a>
					</div>
				</div>
			</div>
		</div>
        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function buri_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$facebookURL= 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="ti-facebook"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}




/*================================================
    Buri Custom Posts
================================================*/
function buri_custom_posts() {
	
	// Events Custom Post
	
	$labels = array(
		'name'               => _x( 'Events', 'post type general name', 'buri' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'buri' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'buri' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'buri' ),
		'add_new'            => _x( 'Add New', 'event', 'buri' ),
		'add_new_item'       => __( 'Add New Event', 'buri' ),
		'new_item'           => __( 'New Event', 'buri' ),
		'edit_item'          => __( 'Edit Event', 'buri' ),
		'view_item'          => __( 'View Event', 'buri' ),
		'all_items'          => __( 'All Events', 'buri' ),
		'search_items'       => __( 'Search Events', 'buri' ),
		'parent_item_colon'  => __( 'Parent Events:', 'buri' ),
		'not_found'          => __( 'No events found.', 'buri' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'buri' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'buri' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
	);

	register_post_type( 'event', $args );

}
add_action( 'init', 'buri_custom_posts' );



/*=========================================================
    Events Section
========================================================*/
function buri_event_section( $event_title = 'Upcoming Event', $read_more_txt = 'Plan Details', $pNumber = 3 ){ 
	$events = new WP_Query( array(
		'post_type' => 'event',
		'posts_per_page'=> $pNumber,

	) );

	if( $events->have_posts() ) {
		while ( $events->have_posts() ) {
			$events->the_post();
			$short_brief		= buri_meta( 'short_brief' );
			$event_date			= buri_meta( 'event_date' );
			$event_cost			= buri_meta( 'event_cost' );
			$event_organizer	= buri_meta( 'event_organizer' );
			$event_review		= buri_meta( 'event_review' );
			?>
			<div class="single_event_slider">
				<div class="row justify-content-end">
					<div class="col-lg-6 col-md-6">
						<div class="event_slider_content">
							<h5><?php echo esc_html( $event_title )?></h5>
							<h2><?php the_title()?></h2>
							<p><?php echo esc_html( $short_brief )?></p>
							<p><?php _e( 'Date:', 'buri' )?> <span><?php echo esc_html( $event_date )?></span> </p>
							<p><?php _e( 'Cost:', 'buri' )?> <span><?php echo esc_html( $event_cost	 )?></span> </p>
							<p><?php _e( 'Organizer:', 'buri' )?> <span> <?php echo esc_html( $event_organizer )?></span> </p>
							<div class="rating">
								<span><?php _e( 'Rating:', 'buri' )?></span>
								<div class="place_review">
									<?php
										if ( $event_review > 0 ) {
											for ( $i = 1; $i <= $event_review; $i++ ) {
												echo '<a href="#"><i class="fa fa-star"></i></a>';
											}
										}
									?>
								</div>
							</div>
							<a href="<?php the_permalink()?>" class="btn_1"><?php echo esc_html( $read_more_txt )?></a>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

