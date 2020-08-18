<?php
namespace Burielementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Buri elementor section widget.
 *
 * @since 1.0
 */
class Buri_About extends Widget_Base {

	public function get_name() {
		return 'buri-about';
	}

	public function get_title() {
		return __( 'About', 'buri' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'buri-elements' ];
	}

	protected function _register_controls() {

        
        // ----------------------------------------  About content ------------------------------

        // About content
		$this->start_controls_section(
			'about_contents',
			[
				'label' => __( 'About Content', 'buri' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => esc_html__( 'Section Sub Title', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'about us', 'buri' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'buri' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Delicious food provider since 1990', 'buri' )
            ]
        );

        $this->add_control(
            'about_txt',
            [
                'label'         => esc_html__( 'About Text', 'buri' ),
                'description'   => esc_html__('Use <br> tag for line break', 'buri'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Good lights it very to above. Days image to sea. Over there seasons and spirit beast in. Greater bearing creepeth very behold fourth night morning seed moved.</p><p>Good lights it very to above. Days image to sea. Over seasons and spirit beast in over greater bearing creepeth.</p>', 'buri' )
            ]
        );
        $this->add_control(
            'btn_content_sec_sep',
            [
                'label'     => __( 'Button Content', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label'         => esc_html__( 'Button Label', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'learn more', 'buri' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'         => esc_html__( 'Button URL', 'buri' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'       => '#'
                ]
            ]
        );
        $this->end_controls_section(); // End about content
        

        // Right content
        $this->start_controls_section(
			'img_content_section',
			[
				'label' => __( 'Right Image', 'buri' ),
			]
        );
        $this->add_control(
            'about_img',
            [
                'label'         => esc_html__( 'Upload Image', 'buri' ),
                'type'          => Controls_Manager::MEDIA,
                'show_external' => false,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section(); // End item content

        /**
         * Style Tab
         * ------------------------------ About Settings ------------------------------
         *
         */


        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'sub_title_color', [
				'label'     => __( 'Sub Title Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_title_col', [
				'label'     => __( 'Title Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_color', [
				'label'     => __( 'Text Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text p' => 'color: {{VALUE}};',
				],
			]
		);
		
        $this->end_controls_section();


        // Button Style ==============================
        $this->start_controls_section(
            'btn_styles', [
                'label' => __( 'Button Style', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'btn_color', [
				'label'     => __( 'Button Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_3' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'btn_bg_color', [
				'label'     => __( 'Button BG Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_3' => 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'btn_hvr_styles_sep',
            [
                'label'     => __( 'Hover Styles', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'btn_hvr_color', [
				'label'     => __( 'Button Hover Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_3:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);
        $this->add_control(
			'btn_hvr_bg_color', [
				'label'     => __( 'Button Hover BG Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .btn_3:hover' => 'background-color: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

    
	protected function render() {
        $settings       = $this->get_settings();
        $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
        $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $about_content  = !empty( $settings['about_txt'] ) ? $settings['about_txt'] : '';
        $btn_label      = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
        $btn_url        = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        $about_img      = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'buri_about_img_399x462', false, array( 'alt' => 'about left image' ) ) : '';
        $dynamic_class  = is_front_page() ? 'about_part' : 'about_part single_about_page padding_bottom';
    ?>

    <!-- about part start-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12">
            <div class="about_part_iner">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="about_text">
                    <?php
                        echo '<h5>'.esc_html( $sub_title ).'</h5>';
                        
                        echo '<h2>'.esc_html( $sec_title ).'</h2>';
                        
                        if ( $about_content ) {
                            echo wp_kses_post( wpautop( $about_content ) );
                        }

                        echo '<a href="'.esc_url( $btn_url ).'" class="btn_3">'.esc_html( $btn_label ).'</a>';
                    ?>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="about_img">
                        <?php
                            if( $about_img ){
                                echo wp_kses_post( $about_img );
                            }
                        ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about part end-->
    <?php

    }

}
