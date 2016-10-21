<?php
/**
 * The template for displaying the sidebar
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

<!-- =========================
				 RIGHT SIDEBAR
			============================== -->
<div class="col-md-6 hidden-sm hidden-xs">
	<aside class="right-sidebar">
		<?php if ( is_active_sidebar( 'main' ) ) { ?>
			<ul id="sidebar">
				<?php dynamic_sidebar( 'main' ); ?>
			</ul>
		<?php } ?>
	</aside>
</div>
<!-- /END RIGHT SIDEBAR -->
