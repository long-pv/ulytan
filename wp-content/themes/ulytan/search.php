<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ulytan
 */

get_header();
?>
<div class="container">
	<div class="secSpace">
		<?php wp_breadcrumbs(); ?>

		<h2 class="archive_cat_title">
			Kết quả tìm kiếm cho: <?php echo get_search_query(); ?>
		</h2>

		<?php if (have_posts()): ?>
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
		<?php else: ?>
			<p>Không tìm thấy sản phẩm nào.</p>
		<?php endif; ?>
		<?php pagination(); ?>
	</div>
</div>
<?php
get_footer();
