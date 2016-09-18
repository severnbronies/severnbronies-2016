<?php 

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_57d6fa0383da1',
		'title' => 'Landing page',
		'fields' => array (
			array (
				'key' => 'field_57d6fa370688b',
				'label' => 'Child pages',
				'name' => 'page_children',
				'type' => 'relationship',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'page',
					1 => 'meet',
				),
				'taxonomy' => array (
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
					2 => 'taxonomy',
				),
				'elements' => array (
					0 => 'featured_image',
				),
				'min' => 1,
				'max' => '',
				'return_format' => 'object',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'landing-page.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;