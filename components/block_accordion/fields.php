<?php 
require_once  get_theme_file_path( '/components/shared_options.php' );

$key = 'block_accordion';

$contents_tab = get_template_content_tab($key);
$header = get_template_header($key);

$options_tab = get_template_options_tab($key);
$global_options = get_template_global_options($key);
$header_options = get_template_header_options($key);

$subfields = array(
	$contents_tab, $header,
	array(
		'key' => $key.'field_accordion',
		'label' => 'Accordion',
		'name' => 'accordion',
		'type' => 'repeater',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'collapsed' => '',
		'min' => 0,
		'max' => 0,
		'layout' => 'table',
		'button_label' => '',
		'sub_fields' => array(
			array(
				'key' => $key.'subfield_question',
				'label' => 'Question',
				'name' => 'question',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => $key.'subfield_answer',
				'label' => 'Answer',
				'name' => 'answer',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
		),
	),		
);

array_push($subfields, $options_tab);

foreach($header_options as $header_option){
 array_push($subfields, $header_option);
}

foreach($global_options as $global_option){
  array_push($subfields, $global_option);
}

return array(
  'key' => $key,
  'name' => $key,
  'label' => 'Accordion',
  'display' => 'block',
  'sub_fields' => $subfields
);