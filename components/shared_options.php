<?php

function get_component_options($name) {
	$option = (get_sub_field($name) ? get_sub_field($name) : null);
	return $option;
}



////////////////////////////
// --> LAYOUT OPTIONS --> //
////////////////////////////

function get_template_margin_options($key){
  return array(
    'key' => 'field_margin_options'.$key,
    'label' => 'Margins',
    'name' => 'margins',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'margin-none' => 'None',
      'margin-top' => 'Top',
      'margin-bottom' => 'Bottom',
      'margin-y' => 'Both',
      'margin-top-lg' => 'Top•Larger',
      'margin-bottom-lg' => 'Bottom•Larger',
      'margin-y-lg' => 'Both•Larger',
    ),
    'allow_null' => 0,
    'default_value' => 'margin-y-lg',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}

function get_template_padding_options($key){
  return array(
    'key' => 'field_padding_options'.$key,
    'label' => 'Paddings',
    'name' => 'paddings',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'padding-none' => 'None',
      'padding-top' => 'Top',
      'padding-bottom' => 'Bottom',
      'padding-y' => 'Both',
      'padding-top-lg' => 'Top•Larger',
      'padding-bottom-lg' => 'Bottom•Larger',
      'padding-y-lg' => 'Both•Larger',
    ),
    'allow_null' => 0,
    'default_value' => 'padding-none',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}

function get_template_width_options($key){
  return array(
    'key' => 'field_width_options'.$key,
    'label' => 'Width',
    'name' => 'width',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'full-width' => 'Full width',
      'medium-width' => 'Medium width',
      'limited-width' => 'Limited width',      
    ),
    'allow_null' => 0,
    'default_value' => 'full-width',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}



////////////////////////////
// --> HEADER OPTIONS --> //
////////////////////////////

function get_template_show_header($key){
  return array(
  'key' => $key.'field_show_header',
    'label' => 'Show Header',
    'name' => 'show_header',
    'type' => 'true_false',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'message' => '',
    'default_value' => 0,
    'ui' => 1,
    'ui_on_text' => 'Show',
    'ui_off_text' => 'Hide',
  );
}

function get_template_header($key){
  return array(
    'key' => $key.'field_header',
    'label' => 'Header',
    'name' => 'header',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
        array(
          array(
            'field' => $key.'field_show_header',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
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
  );
}

function get_template_header_size_options($key){
  return array(
    'key' => 'field_header_size_options'.$key,    
    'label' => 'Header Size',
    'name' => 'header_size',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
      array(
        array(
          'field' => $key.'field_show_header',
          'operator' => '==',
          'value' => '1',
        ),
      ),
    ),
    'choices' => array(
      'h2' => 'h2',
      'h3' => 'h3',
      'h4' => 'h4',
      'h5' => 'h5',
    ),
    'allow_null' => 0,
    'default_value' => 'h2', 
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}

function get_template_header_font_options($key){
  return array(
    'key' => 'field_header_font_options'.$key,
    'label' => 'Header Font',
    'name' => 'header_font',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
      array(
        array(
          'field' => $key.'field_show_header',
          'operator' => '==',
          'value' => '1',
        ),
      ),
    ),
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'text-header' => 'Header Font',
      'text-body' => 'Body Font',      
    ),
    'allow_null' => 0,
    'default_value' => 'text-header',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}

function get_template_header_color_options($key){
  return array(
    'key' => 'field_header_color_options'.$key,
    'label' => 'Header Colour',
    'name' => 'header_colour',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
      array(
        array(
          'field' => $key.'field_show_header',
          'operator' => '==',
          'value' => '1',
        ),
      ),
    ),
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'choices' => array(
      'text-primary' => 'Primary',
      'text-secondary' => 'Secondary',
      'text-body' => 'Body',
    ),
    'allow_null' => 0,
    'default_value' => 'text-primary',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}

function get_template_header_alignment_options($key){
  return array(
    'key' => 'field_header_alignment_options'.$key,
    'label' => 'Header Alignment',
    'name' => 'header_alignment',
    'type' => 'button_group',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
      array(
        array(
          'field' => $key.'field_show_header',
          'operator' => '==',
          'value' => '1',
        ),
      ),
    ),
    'choices' => array(
      'text-left' => 'Left',
      'text-center' => 'Center',
      'text-right' => 'Right',
    ),
    'allow_null' => 0,
    'default_value' => 'text-left',
    'layout' => 'horizontal',
    'return_format' => 'value',
  );
}



/////////////////////////
// --> TAB OPTIONS --> //
/////////////////////////

function get_template_content_tab($key) {
  return array(
    'key' => 'field_content_tab'.$key,
    'label' => 'Content',
    'name' => '',
    'type' => 'tab',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'placement' => 'top',
    'endpoint' => 0,
  );
}

function get_template_options_tab($key) {
  return array(
    'key' => 'field_options_tab'.$key,
    'label' => 'Options',
    'name' => '',
    'type' => 'tab',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'placement' => 'top',
    'endpoint' => 0,
  );
}



///////////////////////////////
// --> OPTIONS FUNCTIONS --> //
///////////////////////////////

function get_template_global_options($key) {
  $margin   = get_template_margin_options($key);  
  $padding   = get_template_padding_options($key);  
  $width   = get_template_width_options($key);  

  $full_options = array();
  array_push($full_options, $margin, $padding, $width);
  return $full_options;
}

function get_template_header_options($key) {
  $show_header = get_template_show_header($key);
  $header_size = get_template_header_size_options($key);
  $header_font = get_template_header_font_options($key);
  $header_color = get_template_header_color_options($key);
  $header_alignment = get_template_header_alignment_options($key);

  $full_options = array();
  array_push($full_options, $show_header, $header_size, $header_font, $header_color, $header_alignment);
  return $full_options;
}