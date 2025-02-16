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
$tieu_de_h1 = get_field('tieu_de_h1') ?? '';
if ($tieu_de_h1) :
?>
	<h1 class="homepage_title_h1">
		<?php echo $tieu_de_h1; ?>
	</h1>
<?php endif; ?>

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
							$about_us_iframe_video = getYoutubeEmbedUrl($about_us_iframe_video);
						?>
							<div class="videoBlock">
								<div class="videoBlock__inner" data-mh="videoBlock__inner">
									<img class="videoBlock__img" src="<?php echo $about_us_video_image; ?>">
									<div class="videoBlock__overlay"></div>
									<div class="videoBlock__videoAction">
										<a href="javascript:void(0);" class="videoBlock__playAction" data-toggle="modal" data-target="#videoUrl" data-src="<?php echo $about_us_iframe_video; ?>">
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
	<section class="service service_list secSpace--bottom">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $title_services; ?>
			</h2>

			<div class="service_list">
				<div class="row row_24">
					<?php /*
					while ($query->have_posts()):
						$query->the_post();
					?>
						<div class="col-md-6 col-lg-4">
							<?php get_template_part('template-parts/content_service'); ?>
						</div>
					<?php
					endwhile; */
					?>
				</div>
			</div>

			<div class="service_list_slider">
				<?php
				while ($query->have_posts()):
					$query->the_post();
				?>
					<div>
						<div class="service_item">
							<?php get_template_part('template-parts/content_service'); ?>
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
$title_customer = get_field('title_customer') ?? 'KHÁCH HÀNG NÓI VỀ ULYTAN';
$feedback_customer = get_field('feedback_customer') ?? [];
if ($feedback_customer) {
	$args = array(
		'post_type' => 'feedback_customer',
		'posts_per_page' => -1,
		'post__in' => $feedback_customer,
		'orderby' => 'post__in',
	);
} else {
	$args = array(
		'post_type' => 'feedback_customer',
		'posts_per_page' => 6,
	);
}

$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="video_customer secSpace">
		<div class="container">
			<h2 class="text-center text-white mb-4">
				<?php echo $title_customer; ?>
			</h2>
			<div class="video_customer_slider mb-4">
				<?php
				while ($query->have_posts()):
					$query->the_post();
				?>
					<div>
						<div class="video_customer_item">
							<?php
							// $featured_image = get_field('featured_image');
							// $iframe_video = get_field('iframe_video');
							$avatar = get_field('avatar');
							$name = get_field('name');
							$position = get_field('position');
							$incorporation = get_field('incorporation');
							$star_rating = get_field('star_rating');
							$testimonials = get_field('testimonials');
							?>
							<?php if ($name): ?>
								<div class="info_customer">
									<div class="testimonials">
										<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#ebebed" class="bi bi-quote" viewBox="0 0 16 16">
											<path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
										</svg>
										<div class="truncate">
											<p class="elementor-widget-container"><?php echo $testimonials; ?></p>
										</div>
									</div>
									<p class="star_rating">
										<?php
										for ($x = 0; $x < $star_rating; $x++) {
											echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
													<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
												</svg>';
										}
										?>
									</p>
									<div class="row no-gutters">
										<div class="col-4">
											<div class="avatar_box">
												<img class="w-100 avatar object-fit-cover border rounded" src="<?php echo $avatar; ?>">
											</div>
										</div>
										<div class="col-8">
											<div class="h4"><?php echo $name; ?></div>
											<div class="position"><?php echo $position; ?></div>
											<div class="incorporation"><?php echo $incorporation; ?></div>
										</div>
									</div>
								</div>
							<?php endif; ?>
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



<section class="home_news secSpace">
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
				<div class="col-lg-12">
					<div class="featured_news">
						<h2 class="home_news_title mb-4">
							<?php echo $title_news_1; ?>
						</h2>
						<div class="row row_24">
							<?php
							while ($query->have_posts()):
								$query->the_post();
							?>
								<div class="col-md-4">
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


			<?php /*
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
			wp_reset_postdata(); */
			?>
		</div>
	</div>
</section>


<?php
get_footer();
