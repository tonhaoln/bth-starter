<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bth-starter
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if (is_front_page()) { 

			template_component_fields();
			get_template_part( TEMPLATE_PATH . 'pages/front-page' ); 

		} else {
			 
			if ( have_posts() ) :

				while ( have_posts() ) :
					the_post();

					the_title('<h1>', '</h1>');
					the_content();

				endwhile;

			endif;			

		} ?>		

	<main>

<?php
get_footer();