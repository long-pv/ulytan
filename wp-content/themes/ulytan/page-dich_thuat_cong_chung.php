<?php

/**
 * Template name: Dịch thuật công chứng
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
$price_table = get_field('price_table') ?? '';
if ($price_table) :
?>
	<section class="price_table secSpace">
		<div class="container">
			<div class="price_table_list">
				<?php foreach ($price_table as $item) : ?>
					<div class="price_table_item">
						<h2 class="sec_title price_table_title text-center">
							<?php echo $item['title']; ?>
						</h2>

						<div class="row justify-content-center">
							<div class="col-md-10 col-lg-8">
								<div class="price_table_img_block">
									<img class="price_table_img" src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="advisory secSpace bg-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="row">
					<div class="col-md-6 mb-4 mb-md-0">
						<?php
						$form_advisory = get_field('form_advisory') ?? '';
						if ($form_advisory):
						?>
							<div class="form_advisory">
								<div class="form_advisory_title">
									Hãy để lại thông tin để được tư vấn miễn phí!
								</div>
								<?php echo do_shortcode('[contact-form-7 id="' . $form_advisory . '"]'); ?>
							</div>
						<?php
						endif;
						?>
					</div>
					<div class="col-md-6">
						<div class="image_advisory_wrap">
							<img class="image_advisory" src="<?php echo get_template_directory_uri() . '/assets/images/image_advisory.png'; ?>" alt="image advisory">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
		'posts_per_page' => '3',
	);
}

$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="service secSpace">
		<div class="container">
			<h2 class="sec_title text-center">
				CÁC DỊCH VỤ BỔ SUNG
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
$faqs = get_field('faqs') ?? [];
if ($faqs):
	$args = array(
		'post_type' => 'faqs',
		'posts_per_page' => -1,
		'post__in' => $faqs,
		'orderby' => 'post__in',
	);
	$query = new WP_Query($args);
	if ($query->have_posts()):
		$data = [];

		while ($query->have_posts()):
			$query->the_post();
			$data[] = [
				'title' => get_the_title(),
				'content' => apply_filters('the_content', get_the_content()),
			];
		endwhile;
?>
		<section class="secSpace bg-light">
			<div class="container">
				<input type="text" id="searchInput" class="post_search_faqs mb-4" placeholder="Tìm kiếm câu hỏi và trả lời">
				<?php
				accordion($data);
				?>
			</div>
		</section>
<?php
	endif;
	wp_reset_postdata();
endif;
?>

<?php
$args = array(
	'post_type' => 'notarization',
	'posts_per_page' => 4,
	'paged' => 1,
);
$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="secSpace notarized_translation_news" id="notarized_translation_news">
		<div class="container">
			<h2 class="home_news_title mb-4">
				Tin tức dịch công chứng
			</h2>
			<div class="row">
				<div class="col-lg-6">
					<ul class="notarized_translation_news_list">
						<?php
						while ($query->have_posts()):
							$query->the_post();
						?>
							<li>
								<a class="notarized_translation_news_item" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</li>
						<?php
						endwhile;
						?>
					</ul>
				</div>
			</div>

			<?php
			echo '<div class="pagination justify-content-start pagination_ajax">';
			echo paginate_links(
				array(
					'total'   => $query->max_num_pages,
					'current' => 1,
					'end_size' => 2,
					'mid_size' => 1,
					'prev_text' => __('Trước', 'basetheme'),
					'next_text' => __('Sau', 'basetheme'),
				)
			);
			echo '</div>';
			?>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>

<?php
$related_posts = get_field('related_posts') ?? [];
if ($related_posts) {
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'post__in' => $related_posts,
		'orderby' => 'post__in',
	);
} else {
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 6,
	);
}

$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="secSpace--bottom related_posts">
		<div class="container">
			<h2 class="home_news_title mb-4">
				Bài viết liên quan
			</h2>
			<div class="row row_24">
				<?php
				while ($query->have_posts()):
					$query->the_post();
				?>
					<div class="col-md-6 col-lg-4">
						<?php get_template_part('template-parts/content_post'); ?>
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
?>
<script>
	jQuery(document).ready(function($) {
		$(document).on('click', '.pagination_ajax .page-numbers', function(e) {
			e.preventDefault();

			var paged_current = $('.page-numbers.current').text() ?? 1;
			paged_current = parseInt(paged_current);
			var paged = 1;

			if ($(this).hasClass('next')) {
				paged = paged_current + 1;
			} else if ($(this).hasClass('prev')) {
				paged = paged_current - 1;
			} else if ($(this).hasClass('dots')) {
				return 0;
			} else {
				paged = $(this).text() ?? 1;
			}

			$.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'POST',
				data: {
					action: 'ajax_pagination_load_post',
					paged: paged,
				},
				beforeSend: function() {
					$("#ajax-loader").show();
				},
				success: function(response) {
					$('.notarized_translation_news_list').html(response);
				},
				error: function() {
					alert('Có lỗi xảy ra khi gửi dữ liệu.');
				},
				complete: function() {
					$("#ajax-loader").hide();
				}
			});

			$.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'POST',
				data: {
					action: 'ajax_pagination',
					paged: paged,
				},
				success: function(response) {
					$('.pagination_ajax').html(response);
				},
				error: function() {
					alert('Có lỗi xảy ra khi gửi dữ liệu.');
				},
			});
		});
	});
</script>