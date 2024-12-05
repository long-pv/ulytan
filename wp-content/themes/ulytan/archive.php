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
$term_id = $current_category->term_id;
$banner_image = get_term_meta($term_id, 'banner_image', true) ?? '';
$dich_vu_lien_quan = get_term_meta($term_id, 'dich_vu_lien_quan', true) ?? [];
?>

<?php if ($banner_image): ?>
	<div class="cat_banner_img">
		<?php echo wp_get_attachment_image($banner_image, 'full'); ?>
	</div>
<?php endif; ?>

<div class="container">
	<div class="secSpace">
		<div class="row">
			<div class="col-lg-9 mb-4 mb-lg-0">
				<h2 class="archive_cat_title">
					<span>Danh sách bài viết: </span>
					<?php
					if (is_category() || is_tag() || is_tax()) {
						$term_name = $current_category->name;
						echo $term_name;
					} elseif (is_post_type_archive()) {
						$post_type = get_query_var('post_type');
						$archive_post_type = get_post_type_object($post_type);
						echo $archive_post_type->archive_title;
					}
					?>
				</h2>

				<div class="loop_post_list">
					<?php
					// list post
					while (have_posts()):
						the_post();
					?>
						<div class="loop_post_item">
							<a href="<?php the_permalink(); ?>" class="image_link">
								<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
							</a>
							<div class="content">
								<a class="title_link" href="<?php the_permalink(); ?>">
									<h3 class="title">
										<?php the_title(); ?>
									</h3>
								</a>

								<div class="desc">
									<?php echo get_the_excerpt(); ?>
								</div>

								<div class="date">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
										</svg>
									</div>
									<span class="text">
										<?php echo get_the_date('d/m/Y'); ?>
									</span>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					?>
				</div>

				<?php pagination(); ?>
			</div>

			<div class="col-lg-3">
				<h2 class="archive_cat_title">
					Dịch vụ liên quan
				</h2>
				<?php
				if ($dich_vu_lien_quan) {
					$args = array(
						'post_type' => 'service',
						'posts_per_page' => -1,
						'post__in' => $dich_vu_lien_quan,
						'orderby' => 'post__in',
					);
				} else {
					$args = array(
						'post_type' => 'service',
						'posts_per_page' => '5',
					);
				}

				$query = new WP_Query($args);
				if ($query->have_posts()):
				?>
					<div class="row row_24">
						<?php
						while ($query->have_posts()):
							$query->the_post();
						?>
							<div class="col-md-6 col-lg-12">
								<?php get_template_part('template-parts/content_service'); ?>
							</div>
						<?php
						endwhile;
						?>
					</div>
				<?php
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
