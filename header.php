<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="profile" href="https://gmpg.org/xfn/11">	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;600&display=swap" rel="stylesheet">
	<!-- / Google Fonts -->	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site-wrap">

<a class="visually-hidden-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'bth-starter' ); ?></a>

<?php get_template_part( TEMPLATE_PATH . 'header/site-header' ); ?>