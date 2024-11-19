<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ulytan
 */

// count view
$post_id = get_the_ID();
set_post_views($post_id);
$post_views = get_field('post_views_count', $post_id);
$arrPost = [];
array_push($arrPost, $post_id);

get_header();
?>

<section class="secSpace">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 mb-4">
				<div class="toc_block">
					<div class="toc_title">Mục lục</div>
					<div id="sticky-navigator">
					</div>
				</div>
			</div>
			<div class="col-lg-7 mb-4">
				<?php
				wp_breadcrumbs();
				?>

				<div class="single_post_editor editor">
					<h1 class="mb-3">
						<?php the_title(); ?>
					</h1>
					<div class="single_post_info mb-2">
						<div class="single_post_info_item">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
								<path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
							</svg>
							<span>
								<?php echo get_the_date('d/m/Y'); ?>
							</span>
						</div>
						<div class="single_post_info_line"></div>
						<div class="single_post_info_item">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
							</svg>

							<span>
								<?php echo $post_views . ' views'; ?>
							</span>
						</div>
					</div>
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="post_sidebar_right">
					<div class="share_post mb-4">
						<div class="share_post_title">
							Chia sẻ bài viết
						</div>
						<div class="share_post_mxh">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="share_post_mxh_item">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
									<path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
								</svg>
							</a>
							<a href="javascript:void(0);" onclick="copyToClipboard('#copy2')" class="share_post_mxh_item">
								<span id="copy2" style="display:none"><?php the_permalink(); ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
									<path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
								</svg>
							</a>
						</div>
					</div>

					<div class="receive_doc">
						<?php
						$sign_up_for_exclusive_material = get_field('sign_up_for_exclusive_material', 'option') ?? null;
						if ($sign_up_for_exclusive_material):
						?>
							<div class="share_post_title">
								Đăng ký nhận tài liệu độc quyền
							</div>
							<div class="contact_form_7">
								<?php echo do_shortcode('[contact-form-7 id="' . $sign_up_for_exclusive_material . '"]'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
if (comments_open() || get_comments_number()) :
?>
	<section class="secSpace--top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<?php comment_form(); ?>
				</div>
			</div>
		</div>
	</section>
<?php
endif;
?>

<?php
$related_services = get_field('related_services') ?? [];
if ($related_services) :
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => -1,
		'post__in' => $related_services,
		'orderby' => 'post__in',
	);
	$query = new WP_Query($args);
	if ($query->have_posts()):
?>
		<section class="secSpace related_services">
			<div class="container">
				<h2 class="home_news_title mb-4">
					Các dịch vụ liên quan
				</h2>
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
	<section class="secSpace notarized_translation_news bg-light" id="notarized_translation_news">
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

<section class="bg-light secSpace--bottom">
	<div class="container">
		<?php
		$post_id = get_the_ID();
		$session_key = "reaction_$post_id";
		$current_reaction = isset($_COOKIE[$session_key]) ? $_COOKIE[$session_key] : '';
		?>
		<div class="reaction_buttons">
			<button class="reaction_button_item like_button <?php echo $current_reaction === 'like' ? 'active' : ''; ?>" data-post-id="<?php echo $post_id; ?>">
				<span class="reaction_buttons_icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2l144 0c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48l-97.5 0c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3l0-38.3 0-48 0-24.9c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192l64 0c17.7 0 32 14.3 32 32l0 224c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32L0 224c0-17.7 14.3-32 32-32z" />
					</svg>
				</span>
				(<span class="like_count">
					<?php echo get_post_meta($post_id, 'likes', true) ?: 0; ?>
				</span>)
			</button>

			<a class="reaction_button_item" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="share_post_mxh_item">
				Share
			</a>

			<button class="reaction_button_item dislike_button <?php echo $current_reaction === 'dislike' ? 'active' : ''; ?>" data-post-id="<?php echo $post_id; ?>">
				<span class="reaction_buttons_icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path d="M313.4 479.1c26-5.2 42.9-30.5 37.7-56.5l-2.3-11.4c-5.3-26.7-15.1-52.1-28.8-75.2l144 0c26.5 0 48-21.5 48-48c0-18.5-10.5-34.6-25.9-42.6C497 236.6 504 223.1 504 208c0-23.4-16.8-42.9-38.9-47.1c4.4-7.3 6.9-15.8 6.9-24.9c0-21.3-13.9-39.4-33.1-45.6c.7-3.3 1.1-6.8 1.1-10.4c0-26.5-21.5-48-48-48l-97.5 0c-19 0-37.5 5.6-53.3 16.1L202.7 73.8C176 91.6 160 121.6 160 153.7l0 38.3 0 48 0 24.9c0 29.2 13.3 56.7 36 75l7.4 5.9c26.5 21.2 44.6 51 51.2 84.2l2.3 11.4c5.2 26 30.5 42.9 56.5 37.7zM32 384l64 0c17.7 0 32-14.3 32-32l0-224c0-17.7-14.3-32-32-32L32 96C14.3 96 0 110.3 0 128L0 352c0 17.7 14.3 32 32 32z" />
					</svg>
				</span>
				(<span class="dislike_count">
					<?php echo get_post_meta($post_id, 'dislikes', true) ?: 0; ?>
				</span>)
			</button>
		</div>
	</div>
</section>

<?php
$view_all_news = get_field('view_all_news') ?? '';
$args = array(
	'post_type' => 'post',
	'posts_per_page' => '6',
	'post__not_in' => $arrPost,
);
$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="secSpace related_posts">
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

<script>
	function copyToClipboard(selector) {
		var textElement = document.querySelector(selector);
		if (textElement) {
			var tempInput = document.createElement('input');
			tempInput.value = textElement.textContent;
			document.body.appendChild(tempInput);
			tempInput.select();

			try {
				var successful = document.execCommand('copy');
				var msg = successful ? 'Copy thành công!' : 'Copy không thành công, vui lòng thử lại.';
				alert(msg);
			} catch (err) {
				console.error('Oops, unable to copy', err);
				alert('Copy không thành công, vui lòng thử lại.');
			}

			document.body.removeChild(tempInput);
		}
	}
</script>

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


		$(document).on('click', '.reaction_buttons button', function(e) {
			e.preventDefault();

			var button = $(this);

			if (button.hasClass('active')) {
				return 0;
			}

			var post_id = button.data('post-id');
			var reaction_type = button.hasClass('like_button') ? 'like' : 'dislike';

			$.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'POST',
				data: {
					action: 'handle_reaction',
					post_id: post_id,
					reaction_type: reaction_type,
				},
				beforeSend: function() {
					$("#ajax-loader").show();
				},
				success: function(response) {
					if (response.success) {
						$('.like_count').text(response.data.likes);
						$('.dislike_count').text(response.data.dislikes);
						button.addClass('active');
						button.siblings().removeClass('active');
					} else {
						alert(response.data.message || 'Đã xảy ra lỗi!');
					}
				},
				error: function() {
					alert('Có lỗi xảy ra khi gửi dữ liệu.');
				},
				complete: function() {
					$("#ajax-loader").hide();
				},
			});
		});
	});
</script>