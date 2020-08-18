<?php
namespace Burielementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Buri elementor reviews section widget.
 *
 * @since 1.0
 */
class Buri_Reviews extends Widget_Base {

	public function get_name() {
		return 'buri-reviews';
	}

	public function get_title() {
		return __( 'Testimonials', 'buri' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'buri-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Review Section ------------------------------
        $this->start_controls_section(
            'review_heading',
            [
                'label' => __( 'Review Contents', 'buri' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => esc_html__( 'Sub Title', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Testimonials', 'buri' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'What they said', 'buri' )
            ]
        );
        $this->add_control(
            'reviews_sep',
            [
                'label'     => __( 'Reviews', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'reviews', [
                'label' => __( 'Create New', 'buri' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'rev_txt',
                        'label' => __( 'Review Text', 'buri' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' )
                    ],
                    [
                        'name'  => 'client_img',
                        'label' => __( 'Client Image', 'buri' ),
                        'type'  => Controls_Manager::MEDIA,
                        'default'   => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'buri' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Mosan Cameron', 'buri' )
                    ],
                    [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'buri'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'buri'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'buri'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'buri'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'buri'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'buri'),
				                'icon' => 'fa fa-star',
			                ],
                        ],
                        'default'  => '5'
	                ],
                ],
                'default' => [
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Mosan Cameron', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Justine Miller', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Justine Miller', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Justine Miller', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Justine Miller', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                    [
                        'rev_txt'           => __( 'Good lights it very to above. Days image to sea over there seasons and spirit beast in greater bearing tool creepeth very behold.', 'buri' ),
                        'client_img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'       => __( 'Justine Miller', 'buri' ),
                        'reviewstar'      => '5',
                    ],
                ]
            ]
        );

        $this->end_controls_section(); // End section top content
        

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Review Heading', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Section Sub Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'single_rev_styles_sep',
            [
                'label'     => __( 'Review Single Item Styles', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'sing_item_border_color', [
                'label'     => __( 'Single Review Item Border Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .center .client_review_text p' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .review_part .center .client_review_text p:after' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'sing_item_txt_color', [
                'label'     => __( 'Review Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_single .client_review_text p' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'sing_item_reviewer_txt_color', [
                'label'     => __( 'Reviewer Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_single .client_review_text h4' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'sing_item_review_stars_color', [
                'label'     => __( 'Review Stars Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .review_icon i' => 'color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'nav_rev_styles_sep',
            [
                'label'     => __( 'Review Navigation Styles', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'rev_dot_active_col', [
                'label'     => __( 'Nav Active Dot Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        
        $this->end_controls_section();


    }
    
    public function buri_get_single_review_item( $rev_txt, $client_img, $client_name, $stars ) {
        ?>
        <div class="client_review_single">
            <div class="client_review_text">
                <p><?php echo esc_html( $rev_txt )?></p>
                <div class="client_review_img">
                    <img src="<?php echo esc_url( $client_img[0] )?>" alt="<?php echo esc_html( $client_name )?>" />
                    <h4><?php echo esc_html( $client_name )?></h4>
                    <div class="review_icon">
                        <?php
                        if (!empty( $stars )) {
                            for ($i = 1; $i <= 5; $i++) {
                                if ($stars >= $i) {
                                    echo '<i class="fa fa-star"></i>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

	protected function render() {

    // call load widget script
    $this->load_widget_script();
                
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $reviews        = !empty( $settings['reviews'] ) ? $settings['reviews'] : '';
    $dynamic_class  = is_front_page() ? 'review_part section_padding' : 'review_part section_padding';
    ?>

    <!--::review_part start::-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5">
            <div class="section_tittle">
              <p><?php echo esc_html( $sub_title )?></p>
              <h2><?php echo esc_html( $sec_title )?></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-11">
            <div class="client_review_part owl-carousel">
                <?php
                if( is_array( $reviews ) && count( $reviews ) > 0 ){
                    foreach ( $reviews as $review ) {
                        $rev_txt        = !empty( $review['rev_txt'] ) ? $review['rev_txt'] : '';
                        $client_img     = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image_src( $review['client_img']['id'], 'buri_client_img_50x50', '', array('alt' => 'client image' ) ) : '';
                        $client_name    = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                        $stars          = !empty( $review['reviewstar'] ) ? $review['reviewstar'] : '';

                        $this->buri_get_single_review_item( $rev_txt, $client_img, $client_name, $stars );
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--::review_part end::-->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var review = $('.client_review_part');
            if (review.length) {
                review.owlCarousel({
                items: 3,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: false,
                margin: 20,
                center: true,
                responsive:{
                    0:{
                        items:1,
                        dots: false
                    },
                    600:{
                        items:2,
                    },
                    1000:{
                        items:3,
                    }
                }
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }
}
