<!-- ***** Header Area Start ***** -->
<header class="header">
    <div class="header__content row">

        <div class="header__logo">
            <?php 
            // Site Logo
            echo buri_theme_logo('logo');
            ?>
        </div> <!-- end header__logo -->
            <?php 
            if( has_nav_menu( 'social-menu' ) && buri_opt('buri_headersocial_toggle') ){
                $args = array(
                    'theme_location' => 'social-menu',
                    'container'      => '',
                    'depth'          => 1,
                    'menu_class'     => 'header__social',
                    'fallback_cb'    => 'buri_social_navwalker::fallback',
                    'walker'         => new buri_social_navwalker(),
                );  
                wp_nav_menu( $args );
            }
            ?>
        <?php 
        if( buri_opt( 'buri_hsearchform_toggle' ) ):
        ?>
        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">
            <form role="search" method="get" class="header__search-form" action="<?php echo esc_url( site_url('/') ); ?>">
                <label>
                    <span class="hide-content"><?php esc_html_e( 'Search for:', 'buri' ); ?></span>
                    <input type="search" class="search-field" placeholder="<?php esc_html_e( 'Type Keywords', 'buri' ); ?>" name="s" title="<?php esc_html_e( 'Search for:', 'buri' ); ?>" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="<?php esc_html_e( 'Search', 'buri' ); ?>">
            </form>

            <a href="#0" title="<?php esc_html_e( 'Close Search', 'buri' ); ?>" class="header__overlay-close"><?php esc_html_e( 'Close', 'buri' ); ?></a>

        </div>  <!-- end header__search -->
        <?php 
        endif;
        ?>

        <a class="header__toggle-menu" href="#0" title="Menu"><span><?php esc_html_e( 'Menu', 'buri' ); ?></span></a>

        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6"><?php esc_html_e( 'Site Navigation', 'buri' ); ?></h2>
                <?php 
                if( has_nav_menu( 'primary-menu' ) ){
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'header__nav',
                        'fallback_cb'    => 'buri_bootstrap_navwalker::fallback',
                        'walker'         => new buri_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"><?php esc_html_e( 'Close', 'buri' ); ?></a>

        </nav> <!-- end header__nav-wrap -->

    </div> <!-- header-content -->
</header> <!-- header -->