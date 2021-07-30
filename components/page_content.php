<?php
$section_name = 'page_content';

$component_fields = array(
	'block_accordion'
);

function template_component_fields() {
	global $section_name;
	global $component_fields;
  	if(have_rows($section_name)){
	    while ( have_rows($section_name) ) { the_row();  
	    	foreach ($component_fields as $component_field) {        
	        	if ( get_row_layout() == $component_field){  
	          		get_template_part(COMPONENT_PATH.$component_field.'/'.$component_field);
	        	}
	      	}
	    }
  	}
}

$layouts = array();
foreach ($component_fields as $component_field) {	 
	$data = include get_template_directory() . '/components/'.$component_field.'/fields.php';
   	$layouts[$data['key']] = $data;
}

if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => $section_name.'_group_5e96ae027e400',
		'title' => 'Content',
		'fields' => array(
			array(
				'key' => $section_name.'_field_5e96ae089fc1f',
				'label' => 'Content',
				'name' => $section_name,
				'type' => 'flexible_content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
	      	'layouts' => $layouts,
				'button_label' => 'Add Block',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tickets',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'the_content',
		),
		'active' => true,
		'description' => '',
	)
);

endif;