<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'buri' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( buri_opt( 'buri_footer_copyright_text' ) ) ? buri_opt( 'buri_footer_copyright_text' ) : $copyText;
    $footer_logo = get_theme_mod( 'footer_logo' );
    $footer_logo_src = wp_get_attachment_image_src( $footer_logo, 'buri_logo_77x20' );
    $footer_class = buri_opt( 'buri_footer_widget_toggle' ) == 1 ? 'footer-area' : 'footer-area no-widget';
    ?>
    

    <!-- footer part start-->
    
    <footer class="<?php echo esc_attr( $footer_class )?>">
        <?php
            if( buri_opt( 'buri_footer_widget_toggle' ) == 1 ) {
        ?>
        <div class="container">
            <div class="row justify-content-between">
                <?php
                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        echo '<div class="col-xl-3 col-sm-6 col-md-3 col-lg-3">';
                            if( !empty( $footer_logo ) ) {
                                echo '<a href="'. esc_url( home_url('/') ) .'" class="buri-footer-logo"> <img src="'. $footer_logo_src[0] .'" alt="footer logo"> </a>';    
                            }
                            dynamic_sidebar( 'footer-1' );
                        echo '</div>';
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }
                ?>
            </div>
        </div>
        <?php
            } 
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>