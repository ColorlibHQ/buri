<?php
namespace Burielementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Buri elementor banner section widget.
 *
 * @since 1.0
 */
class Buri_Banner extends Widget_Base {

	public function get_name() {
		return 'buri-banner';
	}

	public function get_title() {
		return __( 'Banner', 'buri' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'buri-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'buri' ),
            ]
        );
        $this->add_control(
            'banner_title',
            [
                'label'         => esc_html__( 'Banner Title', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Expensive but the best', 'buri' )
            ]
        );
        $this->add_control(
            'banner_sub_title',
            [
                'label'         => esc_html__( 'Banner Sub Title', 'buri' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Modern restaurant in center of the city', 'buri' )
            ]
        );
        $this->add_control(
            'anchor_txt_sep',
            [
                'label'     => __( 'Button Contents', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'book a table', 'buri' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'buri' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Banner Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Text Style', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label'     => __( 'Sub Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anchor_txt_col_sep',
            [
                'label'     => __( 'Button Style', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'anc_txt_color', [
                'label'     => __( 'Button Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anc_bg_color', [
                'label'     => __( 'Button BG Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anc_txt_hvr_color', [
                'label'     => __( 'Button Hover Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'anc_bg_hvr_color', [
                'label'     => __( 'Button Hover BG Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_bg_img_sep',
            [
                'label'     => __( 'Section Background', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'buri' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $banner_title = !empty( $settings['banner_title'] ) ? $settings['banner_title'] : '';
        $banner_sub_title = !empty( $settings['banner_sub_title'] ) ? $settings['banner_sub_title'] : '';
        $button_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $button_url = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
    ?>

    <!-- banner part start-->
    <section class="banner_part">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="banner_text">
              <div class="banner_text_iner">
                <h5><?php echo esc_html( $banner_title )?></h5>
                <h1><?php echo esc_html( $banner_sub_title )?></h1>
                <a href="<?php echo esc_url( $button_url )?>" class="btn_1"><?php echo esc_html( $button_label )?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner part start-->
    <?php
    }
	
}
