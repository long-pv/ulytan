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
		'post_type' => 'post',
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
$paged = isset($_GET['pag']) ? $_GET['pag'] : 1;
$args = array(
	'post_type' => 'notarization',
	'posts_per_page' => 4,
	'paged' => $paged,
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
			echo '<div class="pagination justify-content-start">';
			echo paginate_links(
				array(
					'total'   => $query->max_num_pages,
					'current' => $paged,
					'format'  => '?pag=%#%',
					'end_size' => 2,
					'mid_size' => 1,
					'prev_text' => __('Trước', 'basetheme'),
					'next_text' => __('Sau', 'basetheme'),
					'add_fragment' => '#notarized_translation_news',
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
<script src="<?php echo get_template_directory_uri() . '/assets/js/jquery-stickyNavigator.js'; ?>"></script>
<script>
	jQuery(document).ready(function($) {
		$('#sticky-navigator').stickyNavigator({
			wrapselector: '.single_post_editor',
			targetselector: "h2,h3"

		});

		// Kiểm tra form bình luận khi submit
		$('#commentform').submit(function(e) {
			var isValid = true;

			// Kiểm tra trường Tên
			var name = $('#author').val();
			if (name.trim() == '') {
				isValid = false;
				alert('Vui lòng nhập tên!');
			}

			// Kiểm tra trường Email
			var email = $('#email').val();
			var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
			if (email.trim() == '') {
				isValid = false;
				alert('Vui lòng nhập email!');
			} else if (!emailPattern.test(email)) {
				isValid = false;
				alert('Email không hợp lệ!');
			}

			// Kiểm tra trường Bình luận
			var comment = $('#comment').val();
			if (comment.trim() == '') {
				isValid = false;
				alert('Vui lòng nhập bình luận!');
			}

			// Nếu không hợp lệ, ngừng gửi form
			if (!isValid) {
				e.preventDefault();
			}
		});

		$('#searchInput').on('input', function() {
			var searchText = $(this).val().toLowerCase();

			// Duyệt qua tất cả các accordion-item
			$('.accordion .accordion__item').each(function() {
				var questionText = $(this).find('.accordion__btn').text().toLowerCase(); // lấy văn bản từ .accordion__btn
				var answerText = $(this).find('.accordion__body').text().toLowerCase(); // lấy văn bản từ .accordion__body

				// Kiểm tra nếu văn bản tìm kiếm tồn tại trong .accordion__btn hoặc .accordion__body
				if (questionText.includes(searchText) || answerText.includes(searchText)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
	});
</script>