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

$post_type = get_post_type($post_id);

if (in_array($post_type, ['form_ctv', 'contact_info', 'form_contribute', 'faqs'])) {
	wp_redirect(home_url());
	exit;
}

if ($post_type == 'service') {
	$landing_page = get_field('lien_ket_den_trang_landing_page') ?? '';
	if ($landing_page) {
		wp_redirect($landing_page);
		exit;
	}
}

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
			<div class="col-lg-6 mb-4">
				<?php
				wp_breadcrumbs();
				?>

				<div class="single_post_editor editor">
					<h1 class="mb-3">
						<?php the_title(); ?>
					</h1>

					<div class="single_post_info_block mb-3">
						<div class="single_post_info_author">
							<?php
							$ten_tac_gia = get_field('ten_tac_gia', 'option') ?? '';
							$link_trang_tac_gia = get_field('link_trang_tac_gia', 'option') ?? '';
							$tieu_de_hien_thi_tham_dinh = get_field('tieu_de_hien_thi_tham_dinh', 'option') ?? '';
							$nguoi_tham_dinh_chat_luong = get_field('nguoi_tham_dinh_chat_luong', 'option') ?? '';
							?>
							<div class="post_author">
								<?php if ($ten_tac_gia): ?>
									<a href="<?php echo $link_trang_tac_gia ?: 'javascriot:void(0);'; ?>" class="author">
										<?php echo $ten_tac_gia; ?>
									</a>
								<?php endif; ?>
							</div>

							<?php if ($nguoi_tham_dinh_chat_luong) : ?>
								<div class="appraisal">
									<span class="label">
										<?php echo $tieu_de_hien_thi_tham_dinh; ?>
									</span>
									<span class="people">
										<?php echo $nguoi_tham_dinh_chat_luong; ?>
									</span>
								</div>
							<?php endif; ?>
						</div>

						<div class="single_post_info">
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
					</div>
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-lg-3 right_sticky">
				<div class="sidebar_lien_he">
					<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
						<div class="page_contact_title">
							Giảm 10% khi đăng ký sử dụng từ 2 dịch vụ trở lên
						</div>

						<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
						<input type="hidden" name="ten_trang" value="<?php the_title(); ?>">

						<div class="page_contact_service">
							<div class="page_contact_subtitle">
								Bạn sử dụng dịch vụ nào sau đây
							</div>

							<table class="page_contact_service_table">
								<thead>
									<tr>
										<th width="30">Chọn</th>
										<th>Dịch vụ</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="1. Dịch vụ dịch thuật công chứng">
										</td>
										<td>
											<strong>1. Dịch vụ dịch thuật công chứng</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="#services_2" name="services[]" class="contact_checkox" value="2. Dịch vụ xin cấp visa đa quốc gia">
										</td>
										<td>
											<strong>2. Dịch vụ xin cấp visa đa quốc gia</strong>
											<div class="td_checkbox_desc">(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_2" class="td_input services_2">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="3. Dịch vụ xin cấp, đổi, gia hạn hộ chiếu">
										</td>
										<td>
											<strong>3. Dịch vụ xin cấp, đổi, gia hạn hộ chiếu</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="4. Dịch vụ làm lý lịch tư pháp">
										</td>
										<td>
											<strong>4. Dịch vụ làm lý lịch tư pháp</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="5. Dịch vụ hỗ trợ hợp pháp hoá lãnh sự">
										</td>
										<td>
											<strong>5. Dịch vụ hỗ trợ hợp pháp hoá lãnh sự</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="6. Dịch vụ đổi bằng lái xe quốc tế">
										</td>
										<td>
											<strong>6. Dịch vụ đổi bằng lái xe quốc tế</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_7" name="services[]" class="contact_checkox" value="7. Dịch vụ chứng thực lãnh sự tại đại sứ quán 60 Quốc Gia">
										</td>
										<td>
											<strong>7. Dịch vụ chứng thực lãnh sự tại đại sứ quán 60 Quốc Gia</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="8. Dịch vụ xin cấp gia hạn thẻ tạm trú">
										</td>
										<td>
											<strong>8. Dịch vụ xin cấp gia hạn thẻ tạm trú</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_9" name="services[]" class="contact_checkox" value="9. Dịch vụ xin cấp giấy phép lao động.">
										</td>
										<td>
											<strong>9. Dịch vụ xin cấp giấy phép lao động.</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_10" name="services[]" class="contact_checkox" value="10. Dịch vụ xuất khẩu lao động">
										</td>
										<td>
											<strong>10. Dịch vụ xuất khẩu lao động</strong>
											<div class="td_checkbox_desc">
												(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)
											</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_10" class="td_input services_10">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_11" name="services[]" class="contact_checkox" value="11. Dịch vụ du học quốc tế">
										</td>
										<td>
											<strong>11. Dịch vụ du học quốc tế</strong>
											<div class="td_checkbox_desc">
												(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)
											</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_11" class="td_input services_11">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_12" name="services[]" class="contact_checkox" value="12. Dịch vụ đào tạo ngoại ngữ">
										</td>
										<td>
											<strong>12. Dịch vụ đào tạo ngoại ngữ</strong>
											<div class="td_checkbox_desc">
												(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)
											</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_12" class="td_input services_12">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_13" name="services[]" class="contact_checkox" value="13. Dịch vụ du lịch quốc tế">
										</td>
										<td>
											<strong>13. Dịch vụ du lịch quốc tế</strong>
											<div class="td_checkbox_desc">
												(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)
											</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_13" class="td_input services_13">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="14. Dịch vụ tư vấn hỗ trợ evisa cho người nước ngoài vào Việt Nam">
										</td>
										<td>
											<strong>14. Dịch vụ tư vấn hỗ trợ evisa cho người nước ngoài vào Việt Nam</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="15. Dịch vụ bán bảo hiểm du lịch quốc tế">
										</td>
										<td>
											<strong>15. Dịch vụ bán bảo hiểm du lịch quốc tế</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="16. Dịch vụ bán vé máy bay trong nước và quốc tế">
										</td>
										<td>
											<strong>16. Dịch vụ bán vé máy bay trong nước và quốc tế</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="17. Dịch vụ tư vấn hỗ trợ làm thẻ doanh nhân Apec">
										</td>
										<td>
											<strong>17. Dịch vụ tư vấn hỗ trợ làm thẻ doanh nhân Apec</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="18. Dịch vụ chứng minh tài chính (cho visa du lịch, xuất khẩu lao động)">
										</td>
										<td>
											<strong>18. Dịch vụ chứng minh tài chính (cho visa du lịch, xuất khẩu lao động)</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="19. Dịch vụ khai báo hải quan">
										</td>
										<td>
											<strong>19. Dịch vụ khai báo hải quan</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="20. Dịch thuật chuyên sâu">
										</td>
										<td>
											<strong>20. Dịch thuật chuyên sâu</strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="page_contact_info" style="display:none;">
							<div class="page_contact_subtitle">
								Thông tin cá nhân
							</div>

							<div class="row row_16">
								<div class="col-12">
									<label class="contact_label" for="">
										1. Số điện thoại*
									</label>
									<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
								</div>
								<div class="col-12">
									<label class="contact_label" for="">
										2. Địa chỉ Email*
									</label>
									<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sales@ulytan.vn">
								</div>
							</div>
						</div>

						<div class="mt-3 d-flex justify-content-center">
							<input type="submit" class="contact_submit" value="Đăng ký ngay">
						</div>
					</form>
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

if ($related_services) {
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => -1,
		'post__in' => $related_services,
		'orderby' => 'post__in',
	);
} else {
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => '6',
		'post__not_in' => $arrPost,
	);
}

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

<section class="bg-light-1 secSpace--bottom-1 single_post_mxh">
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

			<a href="javascript:void(0);" onclick="copyToClipboard('#copy2')" class="reaction_button_item">
				<span id="copy2" style="display:none"><?php the_permalink(); ?></span>
				Copylink
			</a>

			<a class="reaction_button_item" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="share_post_mxh_item">
				Chia sẻ lên Facebook
			</a>

			<a class="reaction_button_item" href="https://twitter.com/home?status=<?php echo the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="share_post_mxh_item">
				Chia sẻ lên X (Twitter)
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


		// Custom regex for email validation
		$.validator.addMethod(
			"customEmail",
			function(value, element) {
				var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
				return this.optional(element) || regex.test(value);
			},
			"Vui lòng nhập một địa chỉ email hợp lệ"
		);

		$("#page_contact_form").validate({
			rules: {
				phone: {
					required: true,
					digits: true,
					minlength: 1,
					maxlength: 10
				},
				email: {
					required: true,
					customEmail: true
				},
				services_2: {
					required: true,
				},
				services_7: {
					required: true,
				},
				services_9: {
					required: true,
				},
				services_10: {
					required: true,
				},
				services_11: {
					required: true,
				},
				services_12: {
					required: true,
				},
			},
			messages: {
				phone: {
					required: "Vui lòng nhập số điện thoại của bạn",
					digits: "Chỉ được phép chứa các chữ số",
					minlength: "Số điện thoại phải có ít nhất 1 ký tự",
					maxlength: "Số điện thoại không được vượt quá 10 ký tự"
				},
				email: {
					required: "Vui lòng nhập địa chỉ email của bạn",
					email: "Vui lòng nhập một địa chỉ email hợp lệ"
				},
				services_2: {
					required: "Vui lòng tên quốc gia",
				},
				services_10: {
					required: "Vui lòng tên quốc gia",
				},
				services_11: {
					required: "Vui lòng tên quốc gia",
				},
				services_12: {
					required: "Vui lòng tên quốc gia",
				},
				services_13: {
					required: "Vui lòng tên quốc gia",
				},
			},
			submitHandler: function(form) {
				if ($('input[name="services[]"]:checked').length == 0) {
					alert("Vui lòng chọn ít nhất một dịch vụ.");
					return false;
				}

				// Gửi AJAX request
				var formData = new FormData(form);
				formData.append("action", "save_contact_info");

				$.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					beforeSend: function() {
						$("#ajax-loader").show();
					},
					success: function(response) {
						if (response.success) {
							$("#page_contact_form")[0].reset();
							alert('Đăng ký thành công.');
						} else {
							alert(response.data.message);
						}
					},
					error: function() {
						alert('Có lỗi xảy ra khi gửi dữ liệu.');
					},
					complete: function() {
						$("#ajax-loader").hide();
					}
				});

				// ngăn không submit
				return false;
			}
		});

		$('input[name="services[]"]').on('change', function() {
			var $tdGroup = $(this).closest('tr').find('.td_group');
			$tdGroup.find('input').val('');
			if ($(this).is(':checked')) {
				$tdGroup.show();
			} else {
				$tdGroup.hide();
			}

			var isAnyChecked = $('input[name="services[]"]:checked').length > 0;
			if (!isAnyChecked) {
				$('.page_contact_info').hide();
				$('.page_contact_info').find('input').val('');
			} else {
				$('.page_contact_info').show();
			}
		});
	});
</script>