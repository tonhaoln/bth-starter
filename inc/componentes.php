<?php 
if (class_exists('ACF')) {
	if( function_exists('acf_add_options_page') ) {  
  		acf_add_options_page();
	}
	require get_template_directory() . '/components/page_content.php';	
}