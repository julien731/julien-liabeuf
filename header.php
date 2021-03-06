<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package    The_Reader
 * @author     Julien Liabeuf <julien@liabeuf.fr>
 * @license    GPL-2.0+
 * @link       https://julienliabeuf.com
 * @copyright  2016 Julien Liabeuf
 * @since      1.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

	<!doctype html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- META DATA -->
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="author" content="Julien Liabeuf">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- PINGBACK URL -->
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class( 'class-name' ); ?>>
	<!-- =========================
		 HEADER SECTION
	============================== -->
	<header class="header">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="navbar navbar-default" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'thereader' ); ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-24">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php echo home_url(); ?>">
									<?php if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									} ?>
									<h1><?php bloginfo( 'name' ); ?></h1>
								</a>
							</div>
						</div>
						<div class="col-md-24">
							<div class="collapse navbar-collapse main-navigation" id="bs-example-navbar-collapse-1">
								<?php
								wp_nav_menu( array(
									'theme_location'  => 'primary',
									'menu_class'      => 'nav navbar-nav',
									'container_class' => '',
									'container' => '',
									'walker' => new The_Reader_Menu_Walker()
								) );
								?>
							</div>
						</div>
					</div>
				</div>
			</nav><!-- .main-navigation -->
		<?php endif; ?>
	</header>
	<!-- /END HEADER SECTION  -->