<?php
function buri_event_metabox( $meta_boxes ) {

	$buri_prefix = '_buri_';
	$meta_boxes[] = array(
		'id'        => 'event_single_metaboxs',
		'title'     => esc_html__( 'Event Single Metabox', 'buri' ),
		'post_types'=> array( 'event' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $buri_prefix . 'short_brief',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Event Short Brief', 'buri' ),
				'placeholder' => esc_html__( 'Event Short Brief', 'buri' ),
			),
			array(
				'id'    => $buri_prefix . 'event_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Event Date', 'buri' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $buri_prefix . 'event_cost',
				'type'  => 'text',
				'name'  => esc_html__( 'Event Cost', 'buri' ),
				'placeholder' => esc_html__( 'Event Cost', 'buri' ),
			),
			array(
				'id'    => $buri_prefix . 'event_organizer',
				'type'  => 'text',
				'name'  => esc_html__( 'Event Organizer', 'buri' ),
				'placeholder' => esc_html__( 'Event Organizer', 'buri' ),
			),
			array(
				'id'    => $buri_prefix . 'event_review',
				'type'  => 'button_group',
				'name'  => esc_html__( 'Place Review', 'buri' ),
				'options' => [
					'1' => '<i class="dashicons dashicons-star-filled"></i>',
					'2' => '<i class="dashicons dashicons-star-filled"></i>',
					'3' => '<i class="dashicons dashicons-star-filled"></i>',
					'4' => '<i class="dashicons dashicons-star-filled"></i>',
					'5' => '<i class="dashicons dashicons-star-filled"></i>',
				],
				'inline'	=> true,
				'multiple'	=> false,
			),
			array(
				'type' => 'divider',
			),
			array(
				'id'    => $buri_prefix . 'book_url',
				'type'  => 'text',
				'name'  => esc_html__( 'Book Ticket URL', 'buri' ),
				'placeholder' => esc_html__( 'Book Ticket URL', 'buri' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'buri_event_metabox' );