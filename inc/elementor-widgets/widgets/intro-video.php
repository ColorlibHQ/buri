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
class Buri_Intro_Video extends Widget_Base {

	public function get_name() {
		return 'buri-intro-video';
	}

	public function get_title() {
		return __( 'Intro Video', 'buri' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'buri-elements' ];
	}

	protected function _register_controls() {

        
        // ----------------------------------------  Intro Video content ------------------------------

        // Intro Video content
		$this->start_controls_section(
			'intro_video_contents',
			[
				'label' => __( 'Intro Video Content', 'buri' ),
			]
        );
        $this->add_control(
            'intro_video_url',
            [
                'label'         => esc_html__( 'Popup Video URL', 'buri' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'       => 'https://www.youtube.com/watch?v=pBFQdxA-apI'
                ]
            ]
        );
        $this->end_controls_section(); // End intro_video content

        /**
         * Style Tab
         * ------------------------------ Intro Video Settings ------------------------------
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
			'play_btn_animated_bg_color', [
				'label'     => __( 'Play Button Animated BG Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg .video-play-button:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'play_btn_bg_color', [
				'label'     => __( 'Play Button BG Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg .video-play-button:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'play_btn_txt_color', [
				'label'     => __( 'Play Button Text Color', 'buri' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg .ti-control-play:before' => 'color: {{VALUE}};',
				],
			]
		);
		
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Background Style', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'buri' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .intro_video_bg',
            ]
        );
        $this->end_controls_section();


	}

    
	protected function render() {
        $settings       = $this->get_settings();
        $video_url      = !empty( $settings['intro_video_url']['url'] ) ? $settings['intro_video_url']['url'] : '';
        $dynamic_class  = is_front_page() ? 'about_us section_padding' : 'about_us section_padding';
    ?>

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="intro_video_iner text-center">
              <div class="intro_video_icon">
                <a id="play-video_1" class="video-play-button popup-youtube" href="<?php echo esc_url( $video_url )?>"
                >
                    <span class="ti-control-play"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- intro_video_bg part start-->
    <?php

    }

}
