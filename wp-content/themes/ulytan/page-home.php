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
$about_us_title = get_field('about_us_title') ?? 'GIỚI THIỆU CHUNG VỀ ULYTAN';
$about_us_video_image = get_field('about_us_video_image') ?? '';
$about_us_iframe_video = get_field('about_us_iframe_video') ?? '';
$about_us_content = get_field('about_us_content') ?? '';
if ($about_us_content || ($about_us_iframe_video && $about_us_video_image)) :
?>
	<div class="about_us secSpace">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $about_us_title; ?>
			</h2>
			<div class="row">
				<div class="col-lg-6">
					<div class="about_us_video">
						<?php
						if ($about_us_iframe_video && $about_us_video_image) {
							// video_popup($about_us_iframe_video, $about_us_video_image);
						?>
							<div class="videoBlock">
								<div class="videoBlock__inner" data-mh="videoBlock__inner">
									<img class="videoBlock__img" src="http://localhost/wp/ulytan/wp-content/uploads/2024/11/wp_dummy_content_generator_469.jpg">
									<div class="videoBlock__overlay"></div>
									<div class="videoBlock__videoAction">
										<a href="javascript:void(0);" class="videoBlock__playAction" data-toggle="modal" data-target="#videoUrl" data-src="https://www.youtube.com/embed/okz5RIZRT0U">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9l0-176c0-8.7 4.7-16.7 12.3-20.9z"></path>
											</svg>
										</a>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_us_content" data-mh="videoBlock__inner">
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
$title_services = get_field('title_services') ?? 'DANH SÁCH DỊCH VỤ CỦA ULYTAN';
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
	<section class="service secSpace--bottom">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $title_services; ?>
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

<section class="home_news secSpace--bottom">
	<div class="container">
		<div class="row row_24">
			<?php
			$title_news_1 = get_field('title_news_1') ?? 'Tin tức nổi bật';
			$title_news_2 = get_field('title_news_2') ?? 'Các bài đọc nhiều nhất';
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
							<?php echo $title_news_1; ?>
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
							<?php echo $title_news_2; ?>
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
$title_customer = get_field('title_customer') ?? 'KHÁCH HÀNG NÓI VỀ ULYTAN';
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
				<?php echo $title_customer; ?>
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
