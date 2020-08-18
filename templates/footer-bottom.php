<!-- Fotter Bottom Area -->
<div class="s-footer__bottom">
    <div class="row">
        <div class="col-full">
            <div class="s-footer__copyright">
                <?php 
                // Copy right text
                $copyText = sprintf( __( 'Copyright &copy; %s All rights reserved. | This template is made with %s by <a href="%s" target="_blank">Colorlib</a>', 'buri' ), date('Y') ,'<i class="fa fa-heart-o" aria-hidden="true"></i>', 'https://colorlib.com' );
                                            
                $setCopyright = buri_opt('buri_footer_copyright_text');
                
                if( $setCopyright ){
                    $copyText = $setCopyright;
                }
                 
                ?>
                <span><?php echo wp_kses_post( $copyText ); ?></span>
            </div>
            <?php 
            if( buri_opt('buri_backtotop_btn') ):
            ?>
            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"></a>
            </div>
            <?php 
            endif;
            ?>
        </div>
    </div>
</div> <!-- end s-footer__bottom -->
