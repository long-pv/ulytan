<?php

/**
 * Template name: Video customer
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ulytan
 */

get_header();
?>
<div class="container">
	<div class="secSpace">
		<?php
		wp_breadcrumbs();
		?>
		<h2 class="sec_title text-center">
			<?php the_title(); ?>
		</h2>
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'video_customer',
			'posts_per_page' => 9,
			'paged' => $paged,
		);
		$query = new WP_Query($args);
		if ($query->have_posts()):
		?>
			<div class="row row_24">
				<?php

				while ($query->have_posts()):
					$query->the_post();
				?>
					<div class="col-md-6 col-lg-4">
						<div class="video_customer_item">
							<?php
							$featured_image = get_field('featured_image');
							$iframe_video = get_field('iframe_video');
							video_popup($iframe_video, $featured_image);
							?>
							<h3 class="video_customer_title">
								<?php the_title(); ?>
							</h3>
						</div>
					</div>
				<?php
				endwhile;
				?>
			</div>

			<?php pagination($query); ?>
		<?php
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>

<?php
get_footer();
