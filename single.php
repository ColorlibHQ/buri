<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package buri
 */

get_header();

$categories     = get_the_category();
$count          = count( $categories );
?>

    <section <?php post_class( 'blog_area single-post-area section_padding' ) ?> >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <?php
                        if( has_post_thumbnail() ){ ?>
                            <div class="feature-img">
                                <?php the_post_thumbnail( 'buri_single_blog_750x375', array( 'class' => 'card-img rounded-0' ) ); ?>
                            </div>
                            <?php
                        } ?>
                        <div class="blog_details">
                            <h2 class="p_title"><?php the_title(); ?></h2>
                            <?php
                            if( buri_opt( 'buri_blog_single_meta', 1 ) == 1 ) {
	                            ?>
                                <ul class="blog-info-link mt-3 mb-4">
		                            <?php if ( has_category() ) {
			                            echo '<li><i class="fa fa-tags"></i>';
			                            echo buri_post_cats();
			                            echo '</li>';
		                            }

		                            echo '<li>';
		                            echo buri_posted_comments();
		                            echo '</li>';

		                            ?>
                                </ul>
	                            <?php
                            }

	                        if( have_posts() ) :
		                        while( have_posts() ) : the_post();
                                    the_content();

                                    // Link Pages
                                    wp_link_pages(
                                        array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'buri' ),
                                            'after'  => '</div>',
                                        )
                                    );
                                    // Post visitor count 
                                    buri_set_post_views( get_the_ID() );
		                        endwhile;
                            endif;
                            if( has_tag() ){
                                echo '<div class="tag_list"><span>'.esc_html__( 'Tags:', 'buri' ).'</span>';
                                echo buri_post_tags();
                                echo '</div>';
                            }
                            
	                        ?>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <?php
                        if( buri_opt('buri_like_btn') == 1 || buri_opt('buri_blog_share') == 1 ) {
	                        ?>
                            <div class="d-sm-flex justify-content-between text-center">
		                        <?php
		                        if ( buri_opt( 'buri_like_btn' ) == 1 ) {
			                        echo get_simple_likes_button( get_the_ID() );
		                        }

		                        if ( buri_opt( 'buri_blog_share' ) == 1 ) {
			                        echo buri_social_sharing_buttons( 'social-icons' );
		                        }
		                        ?>
                            </div>

	                        <?php
                        }

                        // Post Navigation
                        buri_blog_single_post_navigation(); ?>
                    </div>

                    <?php
                    //Author Bio ===============
                    if( !empty( get_the_author_meta( 'description' ) ) ) {
	                    buri_author_bio();
                    }

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
	                    comments_template();
                    } ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();