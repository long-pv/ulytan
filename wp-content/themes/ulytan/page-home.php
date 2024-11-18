<?php

/**
 * Template name: Trang chủ
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

<?php
$banner = get_field('banner') ?? '';
if ($banner):
?>
	<section class="sectionBanner">
		<div class="sectionBanner__inner">
			<div id="sectionBanner__slider" class="sectionBanner__slider">
				<?php
				foreach ($banner as $index => $item):
					if ($item['image']):
				?>
						<div>
							<div class="sectionBanner__item">
								<img width="1000" height="500" src="<?php echo img_url($item['image'], 'large'); ?>" alt="Banner no <?php echo $index + 1; ?>">
							</div>
						</div>
				<?php
					endif;
				endforeach;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$about_us_video_image = get_field('about_us_video_image') ?? '';
$about_us_iframe_video = get_field('about_us_iframe_video') ?? '';
$about_us_content = get_field('about_us_content') ?? '';
if ($about_us_content || ($about_us_iframe_video && $about_us_video_image)) :
?>
	<div class="about_us secSpace">
		<div class="container">
			<h2 class="sec_title text-center">
				GIỚI THIỆU CHUNG VỀ ULYTAN
			</h2>
			<div class="row">
				<div class="col-lg-6">
					<?php
					if ($about_us_iframe_video && $about_us_video_image) {
						video_popup($about_us_iframe_video, $about_us_video_image);
					}
					?>
				</div>
				<div class="col-lg-6">
					<div class="about_us_content">
						<div class="editor">
							<?php echo get_field('about_us_content'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
$services = get_field('services') ?? [];
if ($services) {
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => -1,
		'post__in' => $services,
		'orderby' => 'post__in',
	);
} else {
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => '15',
	);
}

$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="service secSpace">
		<div class="container">
			<h2 class="sec_title text-center">
				DANH SÁCH DỊCH VỤ CỦA ULYTAN
			</h2>

			<div class="service_list">
				<div class="row row_24">
					<?php
					while ($query->have_posts()):
						$query->the_post();
					?>
						<div class="col-md-6 col-lg-4">
							<?php get_template_part('template-parts/content_service'); ?>
						</div>
					<?php
					endwhile;
					?>
				</div>
			</div>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>

<section class="home_news secSpace">
	<div class="container">
		<div class="row row_24">
			<?php
			$view_all_news = get_field('view_all_news') ?? '';
			$featured_news = get_field('featured_news') ?? [];
			if ($featured_news) {
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'post__in' => $featured_news,
					'orderby' => 'post__in',
				);
			} else {
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '2',
				);
			}

			$query = new WP_Query($args);
			if ($query->have_posts()):
			?>
				<div class="col-lg-8">
					<div class="featured_news">
						<h2 class="home_news_title mb-4">
							Tin tức nổi bật
						</h2>
						<div class="row row_24">
							<?php
							while ($query->have_posts()):
								$query->the_post();
							?>
								<div class="col-md-6">
									<?php get_template_part('template-parts/content_post'); ?>
								</div>
							<?php
							endwhile;
							?>
						</div>

						<?php

						if ($view_all_news):
						?>
							<a class="view_all_news" href="<?php echo $view_all_news; ?>">Xem tất cả</a>
						<?php endif; ?>
					</div>
				</div>
			<?php
			endif;
			wp_reset_postdata();
			?>


			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => '10',
				'order' => 'DESC',
				'meta_key' => 'post_views_count',
				'orderby' => 'meta_value_num',
			);
			$query = new WP_Query($args);
			if ($query->have_posts()):
			?>
				<div class="col-lg-4">
					<div class="most_read">
						<h2 class="home_news_title mb-4">
							Các bài đọc nhiều nhất
						</h2>
						<div class="most_read_list">
							<?php
							$index = 1;
							while ($query->have_posts()):
								$query->the_post();
							?>
								<a href="<?php the_permalink(); ?>" class="most_read_item">
									<?php echo $index . ". " . get_the_title(); ?>
								</a>
							<?php
								$index++;
							endwhile;
							?>
						</div>
					</div>
				</div>
			<?php
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php
$video_customer = get_field('video_customer') ?? [];
if ($video_customer) {
	$args = array(
		'post_type' => 'video_customer',
		'posts_per_page' => -1,
		'post__in' => $video_customer,
		'orderby' => 'post__in',
	);
} else {
	$args = array(
		'post_type' => 'video_customer',
		'posts_per_page' => 6,
	);
}

$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="video_customer secSpace bg-light">
		<div class="container">
			<h2 class="sec_title text-center">
				KHÁCH HÀNG NÓI VỀ ULYTAN
			</h2>
			<div class="video_customer_slider">
				<?php
				while ($query->have_posts()):
					$query->the_post();
				?>
					<div>
						<div class="video_customer_item">
							<?php
							$featured_image = get_field('featured_image');
							$iframe_video = get_field('iframe_video');
							video_popup($iframe_video, $featured_image);
							?>
						</div>
					</div>
				<?php
				endwhile;
				?>
			</div>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>

<?php
get_footer();
