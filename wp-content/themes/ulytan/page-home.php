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
				?>
					<div>
						<div class="sectionBanner__item">
							<img width="1000" height="500" src="<?php echo $item['image']; ?>" alt="Banner no <?php echo $index + 1; ?>">
						</div>
					</div>
				<?php
				endforeach;
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<div class="about_us secSpace">
	<div class="container">
		<h2 class="sec_title text-center mb-4">
			GIỚI THIỆU CHUNG VỀ ULYTAN
		</h2>
		<div class="row">
			<div class="col-lg-6">
				<?php
				$about_us_video_image = get_field('about_us_video_image');
				$about_us_iframe_video = get_field('about_us_iframe_video');
				video_popup($about_us_iframe_video, $about_us_video_image);
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

<section class="service secSpace">
	<div class="container">
		<h2 class="sec_title text-center mb-4">
			DANH SÁCH DỊCH VỤ CỦA ULYTAN
		</h2>

		<div class="service_list">
			<div class="row row_24">
				<?php
				$args = array(
					'post_type' => 'service',
					'posts_per_page' => '15',
				);
				$query = new WP_Query($args);
				if ($query->have_posts()):
					while ($query->have_posts()):
						$query->the_post();
				?>
						<div class="col-md-6 col-lg-4">
							<?php get_template_part('template-parts/content_service'); ?>
						</div>
				<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<section class="home_news secSpace">
	<div class="container">
		<div class="row row_24">
			<div class="col-lg-8">
				<div class="featured_news">
					<h2 class="home_news_title mb-4">
						Tin tức nổi bật
					</h2>
					<div class="row row_24">
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => '2',
						);
						$query = new WP_Query($args);
						if ($query->have_posts()):
							while ($query->have_posts()):
								$query->the_post();
						?>
								<div class="col-md-6">
									<?php get_template_part('template-parts/content_post'); ?>
								</div>
						<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae omnis eveniet, ut dolores eum incidunt id cupiditate odio ea, aut dolorem nesciunt officiis ad sapiente. Est porro aliquam totam ea.
			</div>
		</div>
	</div>
</section>


<?php
get_footer();
