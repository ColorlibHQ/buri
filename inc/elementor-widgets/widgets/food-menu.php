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
 * Buri elementor Foodd menu section widget.
 *
 * @since 1.0
 */
class Buri_Food_Menu extends Widget_Base {

	public function get_name() {
		return 'buri-food-menu';
	}

	public function get_title() {
		return __( 'Food Menu', 'buri' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'buri-elements' ];
	}

	protected function _register_controls() {
        
		// ----------------------------------------   Food Menu content ------------------------------

        // First service contents
        $this->start_controls_section(
			'food_menu_content',
			[
				'label' => __( 'Food Menu Contents', 'buri' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => esc_html__( 'Sub Title', 'buri' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Popular Menu', 'buri' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'buri' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => esc_html__( 'Delicious Food Menu', 'buri' )
            ]
        );
        $this->add_control(
            'foods', [
                'label' => __( 'Create New', 'buri' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name'  => 'item_img',
                        'label' => __( 'Food Image', 'buri' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'item_title',
                        'label' => __( 'Food Title', 'buri' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Pork Sandwich', 'buri' )
                    ],
                    [
                        'name'  => 'short_brief',
                        'label' => __( 'Short Brief', 'buri' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'They\'re wherein heaven seed hath nothing', 'buri' )
                    ],
                    [
                        'name'  => 'item_cost',
                        'label' => __( 'Item Cost', 'buri' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Form $40.00', 'buri' )
                    ],
                ],
                'default' => [
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Pork Sandwich', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $40.00', 'buri' ),
                    ],
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Roasted Marrow', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $50.00', 'buri' ),
                    ],
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Summer Cooking', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $60.00', 'buri' ),
                    ],
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Easter Delight', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $70.00', 'buri' ),
                    ],
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Tiener Schnitze', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $80.00', 'buri' ),
                    ],
                    [
                        'item_img'    => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'  => __( 'Chicken Roast', 'buri' ),
                        'short_brief' => __( 'All transportation cost we bear', 'buri' ),
                        'item_cost'   => __( 'Form $90.00', 'buri' ),
                    ],
                ]
            ]
        );

        $this->end_controls_section(); // End Food Menu content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Food Menu Color Settings ==============================
        $this->start_controls_section(
            'serv_color_sett', [
                'label' => __( 'Food Menu Color Settings', 'buri' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Sub Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        
        $this->add_control(
            'single_item_styles_sep',
            [
                'label'     => __( 'Single Menu Item Styles', 'buri' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'food_title_color', [
                'label'     => __( 'Food Title Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .single_food_item .media-body h3' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'food_txt_color', [
                'label'     => __( 'Food Text Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .single_food_item .media-body p' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'food_price_color', [
                'label'     => __( 'Food Price Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .single_food_item .media-body h5' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'food_item_border_color', [
                'label'     => __( 'Food Item Border Color', 'buri' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food_menu .single_food_item' => 'border-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->end_controls_section();

    }


    public function buri_get_single_food_item( $item_img, $item_title, $short_brief, $item_cost ) { 
        ?>
        <div class="col-sm-6 col-lg-6">
            <div class="single_food_item media">
                <?php
                    if ( $item_img ) {
                        echo wp_kses_post( $item_img );
                    }
                ?>
                <div class="media-body align-self-center">
                    <?php
                        echo '<h3>'.esc_html( $item_title ).'</h3>';

                        echo '<p>'.esc_html( $short_brief ).'</p>';

                        echo '<h5>'.esc_html( $item_cost ).'</h5>';
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    
	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $foods          = !empty( $settings['foods'] ) ? $settings['foods'] : '';
    ?>

    <!-- food_menu start-->
    <section class="food_menu">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <?php if ( $sub_title || $sec_title ) { ?>
            <div class="section_tittle">
              <p><?php echo esc_html( $sub_title )?></p>
              <h2><?php echo esc_html( $sec_title )?></h2>
            </div>
            <?php } ?>
          </div>
          <div class="col-lg-12">
            <div class="single-member">
              <div class="row">
                <?php
                    if( is_array( $foods ) && count( $foods ) > 0 ){
                        foreach ( $foods as $item ) {
                            $item_img = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image($item['item_img']['id'], 'buri_food_img_165x163', false, ['alt' => 'food image', 'class' => 'img-responsive']) : '';
                            $item_title = !empty( $item['item_title'] ) ? $item['item_title'] : '';
                            $short_brief = !empty( $item['short_brief'] ) ? $item['short_brief'] : '';
                            $item_cost = !empty( $item['item_cost'] ) ? $item['item_cost'] : '';
                            
                            $this->buri_get_single_food_item( $item_img, $item_title, $short_brief, $item_cost );
                        }
                    }
                    ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- food menu part end-->
    <?php
    }
}
