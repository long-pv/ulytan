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
			<section class="secSpace--bottom">
				<h2 class="home_news_title mb-3">
					Tin tức
				</h2>
				<div class="row row_24">
					<?php
					while (have_posts()):
						the_post();

						if (get_post_type() == 'post') :
					?>
							<div class="col-md-6 col-lg-3">
								<?php get_template_part('template-parts/content_post'); ?>
							</div>
					<?php
						endif;
					endwhile;
					?>
				</div>
			</section>
		<?php else: ?>
			<p>Không tìm thấy sản phẩm nào.</p>
		<?php endif; ?>

		<?php if (have_posts()): ?>
			<section class="secSpace">
				<h2 class="home_news_title mb-3">
					Dịch vụ
				</h2>
				<div class="row row_24">
					<?php
					// list post
					while (have_posts()):
						the_post();

						if (get_post_type() == 'service') :
					?>
							<div class="col-md-6 col-lg-3">
								<?php get_template_part('template-parts/content_service'); ?>
							</div>
					<?php
						endif;
					endwhile;
					?>
				</div>
			</section>
		<?php else: ?>
			<p>Không tìm thấy sản phẩm nào.</p>
		<?php endif; ?>

		<?php pagination(); ?>
	</div>
</div>
<?php
get_footer();
