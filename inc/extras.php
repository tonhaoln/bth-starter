<?php

/**
 * Place SVG inline
 */

function include_svg($svg_name){
	$svg = $svg_name.'.svg';
  get_template_part('dist/svgicons/inline', $svg);
}


/**
 * WP Body open
 */

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


/**
 * Menu has child add chevron down
 */
function menu_chevron($item_output, $item, $depth, $args) {
    if (in_array('menu-item-has-children', $item->classes)) {
        
    	$chevron = '<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z"/></svg></i>'; // Change the class to your font icon
        $item_output = str_replace('</a>', $chevron .'</a>', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'menu_chevron', 10, 4);


/**
 * Responsive Image Helper Function
 */
function awesome_acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}


/**
 * Move Yoast to bottom
 */
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );