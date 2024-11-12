<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ulytan
 */

get_header();
$current_category = get_queried_object();
?>

<div class="container">
	<div class="secSpace">
		<?php wp_breadcrumbs(); ?>

		<h2 class="archive_cat_title">
			<?php echo $current_category->name; ?>
		</h2>

		<div class="row row_24">
			<?php
			// list post
			while (have_posts()):
				the_post();
			?>
				<div class="col-md-6 col-lg-4">
					<?php get_template_part('template-parts/content_post'); ?>
				</div>
			<?php
			endwhile;
			?>
		</div>

		<?php pagination(); ?>
	</div>
</div>
<?php
get_footer();
