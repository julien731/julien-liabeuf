<?php
/**
 * The template for displaying an author's biography
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

<!-- ABOUT THIS AUTHOR -->
<div class="about-author">
	<div class="row">
		<div class="col-sm-4 hidden-xs">
			<div class="thumb">
				<?php
				/**
				 * Filter the The Reader author bio avatar size.
				 *
				 * @since 1.0
				 *
				 * @param int $size The avatar height and width size in pixels.
				 */
				$author_bio_avatar_size = apply_filters( 'the_reader_author_bio_avatar_size', 96 );
				$avatar_url             = get_avatar_url( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
				<img src="<?php echo $avatar_url; ?>>" alt="<?php the_author_meta( 'display_name' ); ?>" class="img-responsive">
			</div>
		</div>
		<div class="col-sm-20">
			<div class="desc">
				<h5>About This Author</h5>
				<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
			</div>
		</div>
	</div>
</div> <!-- end of .about-author -->
