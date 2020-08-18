<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php 
            echo buri_site_icon();
            wp_head(); 
        ?>
    </head>
    <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo buri_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item justify-content-end',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav',
                                    'walker'         => new buri_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }
                            
                            $social_profile = buri_opt( 'buri_social_profile_toggle' );
                                if( $social_profile == 1 ) {
                                    $social_icons = buri_opt( 'buri_header_social' );
                                    ?> 
                                    <div class="social_icon d-none d-lg-block">
                                        <?php
                                        if ( is_array( $social_icons ) ) {
                                            for ( $i = 0; $i < count($social_icons); $i++ ) {
                                                $social_icon = $social_icons[$i]['social_icon'];
                                                ?>
                                                <a href="<?php echo esc_url($social_icons[$i]['social_url']);?>"><i class="<?php echo esc_html( $social_icon );?>"></i></a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php 
                                } 
                            ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'buri_page_titlebar' ) ){
	    buri_page_titlebar();
    }

