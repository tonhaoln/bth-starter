<?php 
function starter_classes( $classes ) {

// @codingStandardsIgnoreStart
// Allows for incorrect snake case like is_IE to be used without throwing errors.
global $is_IE;

// If it's IE, add a class.
if ( $is_IE ) {
  $classes[] = 'ie';
}
// @codingStandardsIgnoreEnd

// Give all pages a unique class.
if ( is_page() ) {
  $classes[] = 'page-' . basename( get_permalink() );
}

// Adds a class of hfeed to non-singular pages.
if ( ! is_singular() ) {
  $classes[] = 'hfeed';
}

// Adds a class of group-blog to blogs with more than 1 published author.
if ( is_multi_author() ) {
  $classes[] = 'group-blog';
}

// Are we on mobile?
// PHP CS wants us to use jetpack_is_mobile instead, but what if we don't have Jetpack installed?
// Allows for using wp_is_mobile without throwing an error.
// @codingStandardsIgnoreStart
if ( wp_is_mobile() ) {
  $classes[] = 'mobile';
}
// @codingStandardsIgnoreEnd

// Adds "no-js" class. If JS is enabled, this will be replaced (by javascript) to "js".
$classes[] = 'no-js';

return $classes;
}
add_filter( 'body_class', 'starter_classes' );

/**
 * Customize the [...] on the_excerpt();
 *
 * @param string $more The current $more string.
 * @return string Replace with "Read More..."
 */
function starter_excerpt_more( $more ) {
	return sprintf( ' <a class="more-link" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), esc_html__( 'Read more...', '_s' ) );
}
add_filter( 'excerpt_more', 'starter_excerpt_more' );

/**
 * Enable custom mime types.
 *
 * @param array $mimes Current allowed mime types.
 * @return array Updated allowed mime types.
 */
function starter_custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'starter_custom_mime_types' );