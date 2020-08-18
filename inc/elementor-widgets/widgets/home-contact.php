<?php
namespace Burielementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * buri elementor home contact section widget.
 *
 * @since 1.0
 */
class Buri_Home_Contact extends Widget_Base {

    public function get_name() {
        return 'buri-home-contact';
    }

    public function get_title() {
        return __( 'Home Contact', 'buri' );
    }

    public function get_icon() {
        return ' eicon-instagram-comments';
    }

    public function get_categories() {
        return [ 'buri-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Info', 'buri' ),
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label'     => esc_html__( 'Section Title', 'buri' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Contact Us', 'buri')
            ]
        );

        $this->add_control(
            'contact_infos', [
                'label'         => __( 'Contact Infos', 'buri' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Contact Info', 'buri' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'address', 'buri' )
                    ],
                    [
                        'name'    => 'desc',
                        'label'   => __( 'Contact Descriptions', 'buri' ),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => esc_html__( '240, Kings street, New York city USA', 'buri' )
                    ],
                    [
                        'name'    => 'desc2',
                        'label'   => __( 'Contact Descriptions 2', 'buri' ),
                        'type'    => Controls_Manager::TEXTAREA,
                    ],
                ],
                'default'   => [
                    [
                        'label' => esc_html__( 'ADDRESS', 'buri' ),
                        'desc'  => esc_html__( '240, Kings street, New York city USA', 'buri' ),
                        'desc2'  => ''
                    ],               
                    [
                        'label' => esc_html__( 'WE ARE OPEN', 'buri' ),
                        'desc'  => esc_html__( 'Mon - Fri (9.00-19.00)', 'buri' ),
                        'desc2'  => esc_html__( 'Sat - Sun (9.00-19.00)', 'buri' )
                    ],               
                    [
                        'label' => esc_html__( 'RESERVATION', 'buri' ),
                        'desc'  => esc_html__( '+880 367 251 167', 'buri' ),
                        'desc2'  => esc_html__( 'barires@contact.com', 'buri' )
                    ],               
                ]
            ]
        );

        $this->end_controls_section(); // End Contact Info

        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label'     => __( 'Section Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_part .contact_part_iner h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Sub Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_part .contact_part_iner .single_contact_part h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_color', [
                'label'     => __( 'Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home-contact .contact_part_iner .single_contact_part p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .contact_part.home-contact',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

    $settings       = $this->get_settings();
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $contact_infos  = !empty( $settings['contact_infos'] ) ? $settings['contact_infos'] : '';
    ?>

    <!--::contact part start::-->
    <section class="contact_part home-contact section_padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact_part_iner">
              <h3><?php echo esc_html( $sec_title ) ?></h3>
              <?php 
                if( is_array( $contact_infos ) && count( $contact_infos ) > 0 ) {
                    foreach( $contact_infos as $info ) {
                        $label = !empty( $info['label'] ) ? $info['label'] : '';
                        $desc  = !empty( $info['desc'] ) ? $info['desc'] : '';
                        $desc2 = !empty( $info['desc2'] ) ? $info['desc2'] : '';
                        ?>
                        <div class="single_contact_part">
                            <?php
                                echo '<h5>'.esc_html($label).'</h5>';
                                echo '<p>'.esc_html($desc).'</p>';
                                if ( $desc2 ) {
                                    echo '<p>'.esc_html($desc2).'</p>';
                                }
                            ?>
                        </div>
                        <?php 
                    }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--::contact part end::-->
    <?php
    }   
}