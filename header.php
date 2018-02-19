<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body id="cms-organic" <?php body_class(); ?>>
<div id="page-wrapper" class="<?php wp_organic_body_class();?> woocommerce-style-1">
	<header id="masthead" class="site-header">
		<?php wp_organic_header(); ?>
	</header><!-- #masthead -->
    <?php wp_organic_page_title(); ?>
	<div id="main">