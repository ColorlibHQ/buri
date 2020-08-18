<?php 
/**
 * @Packge     : Buri
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'buri_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'buri' ),
        'description' => esc_html__( 'Select the theme color.', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_general_section',
        'default'     => '#d6ad86',
    )
);

// Secondary Theme color field
Epsilon_Customizer::add_field(
    'buri_secondary_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Secondary Theme Color', 'buri' ),
        'description' => esc_html__( 'Select the secondary theme color.', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_general_section',
        'default'     => '#ffb830',
    )
);

// Header social profile
Epsilon_Customizer::add_field(
    'header_top_soical_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top Social Profile Section', 'buri' ),
        'section'     => 'buri_header_section',
        'default'     => true,

    )
);

// Header Social Show/Hide
Epsilon_Customizer::add_field(
    'buri_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header Social Profile Show/Hide', 'buri' ),
        'section'     => 'buri_header_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'buri_header_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'buri_header_section',
		'label'        => esc_html__( 'Social Profile Links', 'buri' ),
        'button_label' => esc_html__( 'Add new social link', 'buri' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'default'      => [
            [
                'social_link_title' => esc_html__( 'Facebook', 'buri' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-facebook-square',
            ],
            [
                'social_link_title' => esc_html__( 'Instagram', 'buri' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-instagram',
            ],
        ],
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'buri' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Facebook',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'buri' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '#',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'buri' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-facebook-square',
			),
			
		),
	)
);

// Header color sections
Epsilon_Customizer::add_field(
    'header_color_section',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Color Section', 'buri' ),
        'section'     => 'buri_header_section',

    )
);
 
// Header background color field
Epsilon_Customizer::add_field(
    'buri_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'buri' ),
        'description' => esc_html__( 'Select the header background color.', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#d6ad86',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'buri_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#ffffff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'buri_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#d6ad86',
    )
);

// Header nav fixed menu hover color field
Epsilon_Customizer::add_field(
    'buri_header_menu_fixed_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu fixed hover color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#000000',
    )
);

// Header dropdown menu bg color field
Epsilon_Customizer::add_field(
    'buri_header_drop_menu_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu BG color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#fafafa',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'buri_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#000000',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'buri_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_header_section',
        'default'     => '#000000',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'buri_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'buri' ),
        'description' => esc_html__( 'Set post excerpt length.', 'buri' ),
        'section'     => 'buri_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'buri_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'buri' ),
        'section'     => 'buri_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'buri_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'buri' ),
        'section'     => 'buri_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'buri_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'buri' ),
        'section'     => 'buri_blog_section',
        'default'     => true
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'buri_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'buri' ),
        'section'           => 'buri_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'buri_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'buri' ),
        'section'           => 'buri_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'buri_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'buri_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'buri_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'buri' ),
        'section'     => 'buri_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'buri_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'buri' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'buri' ),
        'section'     => 'buri_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'buri_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'buri' ),
        'section'     => 'buri_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'buri' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'buri_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'buri' ),
        'section'     => 'buri_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'buri_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_footer_section',
        'default'     => '#1c1a18',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'buri_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_footer_section',
        'default'     => '#a9a9a9',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'buri_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_footer_section',
        'default'     => '#ffffff',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'buri_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_footer_section',
        'default'     => '#a9a9a9',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'buri_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'buri' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'buri_footer_section',
        'default'     => '#d6ad86',
    )
);

