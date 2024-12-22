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
$banner_content = get_field('banner_content') ?? '';
$banner_image = get_field('banner_image') ?? '';
if ($banner_content) :
?>
	<section class="banner_landing secSpace bg-primary">
		<div class="container">
			<div class="row row_24">
				<div class="col-md-6 col-lg-6">
					<div class="banner_landing_content">
						<div class="editor">
							<?php echo $banner_content; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="banner_landing_img_wrap">
						<img class="banner_landing_img" src="<?php echo $banner_image; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$choice_reason = get_field('choice_reason') ?? [];
$choice_reason_title = get_field('choice_reason_title') ?: 'LÝ DO CHỌN CHÚNG TÔI';
if ($choice_reason):
?>
	<section class="choice_reason secSpace">
		<div class="container">
			<h2 class="home_news_title text-center mb-4">
				<?php echo $choice_reason_title; ?>
			</h2>
			<div class="row row_32 justify-content-center">
				<?php foreach ($choice_reason as $key => $item) : ?>
					<div class="col-md-6 col-lg-4">
						<div class="choice_reason_item">
							<?php if ($item['icon']): ?>
								<div class="choice_reason_item_img">
									<img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
								</div>
							<?php endif; ?>
							<h3 class="choice_reason_item_title" data-mh="choice_reason_item_title">
								<?php echo $item['title']; ?>
							</h3>
							<div class="choice_reason_item_desc">
								<?php echo $item['description']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$achieve_brand_title = get_field('achieve_brand_title') ?: '“Doanh nghiệp đạt thương hiệu nổi tiếng Việt Nam với 15 năm kinh nghiệm”';
$achieve_brand_image = get_field('achieve_brand_image') ?? [];
if ($achieve_brand_image) :
?>
	<section class="achieve_brand secSpace--bottom" id="scroll_1">
		<div class="container">
			<h2 class="home_news_title text-center mb-4">
				<?php
				echo $achieve_brand_title;
				?>
			</h2>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="row justify-content-center row_24">
						<?php
						foreach ($achieve_brand_image as $item):
							if ($item['image']):
						?>
								<div class="col-md-6">
									<img class="achieve_brand_img" src="<?php echo $item['image']; ?>" alt="">
								</div>
						<?php
							endif;
						endforeach;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$customer_object = get_field('customer_object') ?? [];
$customer_object_title = get_field('customer_object_title') ?: 'ĐỐI TƯỢNG KHÁCH HÀNG CỦA ULYTAN';
if ($customer_object):
?>
	<section class="choice_reason secSpace--bottom">
		<div class="container">
			<h2 class="home_news_title text-center mb-4">
				<?php echo $customer_object_title; ?>
			</h2>
			<div class="row row_32 justify-content-center">
				<?php foreach ($customer_object as $key => $item) : ?>
					<div class="col-md-6 col-lg-4">
						<div class="choice_reason_item">
							<?php if ($item['icon']): ?>
								<div class="choice_reason_item_img">
									<img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
								</div>
							<?php endif; ?>
							<h3 class="choice_reason_item_title" data-mh="choice_reason_item_title">
								<?php echo $item['title']; ?>
							</h3>
							<div class="choice_reason_item_desc">
								<?php echo $item['description']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php
$video_customer_title = get_field('video_customer_title') ?: 'KHÁCH HÀNG NÓI VỀ ULYTAN';
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
	<section class="video_customer secSpace bg-light" id="scroll_4">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $video_customer_title; ?>
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
$use_service = get_field('use_service') ?? [];
$use_service_title = get_field('use_service_title') ?: 'DỊCH VỤ CỦA ULYTAN SỬ DỤNG KHI NÀO?';
if ($use_service):
?>
	<section class="choice_reason secSpace">
		<div class="container">
			<h2 class="home_news_title text-center mb-4">
				<?php echo $use_service_title; ?>
			</h2>
			<div class="row row_32 justify-content-center">
				<?php foreach ($use_service as $key => $item) : ?>
					<div class="col-md-6 col-lg-4">
						<div class="choice_reason_item">
							<?php if ($item['icon']): ?>
								<div class="choice_reason_item_img">
									<img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>">
								</div>
							<?php endif; ?>
							<h3 class="choice_reason_item_title" data-mh="choice_reason_item_title">
								<?php echo $item['title']; ?>
							</h3>
							<div class="editor choice_reason_item_content">
								<?php echo $item['content']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$endow_video_image = get_field('endow_video_image') ?? '';
$endow_iframe_video = get_field('endow_iframe_video') ?? '';
$endow_content = get_field('endow_content') ?? '';
if ($endow_content || ($endow_iframe_video && $endow_video_image)) :
?>
	<section class="endow secSpace bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<?php
					if ($endow_iframe_video && $endow_video_image) {
						video_popup($endow_iframe_video, $endow_video_image);
					}
					?>
				</div>
				<div class="col-lg-5">
					<div class="editor endow_content">
						<?php echo $endow_content; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
$price_table = get_field('price_table') ?? '';
if ($price_table) :
?>
	<section class="price_table secSpace" id="scroll_2">
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

<?php
$form_advisory_title = get_field('form_advisory_title') ?: 'Hãy để lại thông tin để được tư vấn miễn phí!';
$form_advisory = get_field('form_advisory') ?? '';
if ($form_advisory):
?>
	<section class="advisory secSpace bg-primary" id="scroll_6">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-6 mb-4 mb-md-0">

							<div class="form_advisory">
								<div class="form_advisory_title">
									<?php echo $form_advisory_title; ?>
								</div>
								<?php echo do_shortcode('[contact-form-7 id="' . $form_advisory . '"]'); ?>
							</div>

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
endif;
?>

<?php
$services_title = get_field('services_title') ?: 'CÁC DỊCH VỤ BỔ SUNG';
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
	<section class="service secSpace" id="scroll_3">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $services_title; ?>
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
	<section class="secSpace notarized_translation_news" id="scroll_5">
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
$related_posts_title = get_field('related_posts_title') ?: 'Bài viết liên quan';
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
				<?php echo $related_posts_title; ?>
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

<div class="modal modal_landing fade" id="modal_landing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body">
				<div>
					<?php
					$popup_image = get_field('landing_page_popup_image', 'option') ?? '';
					if ($popup_image):
					?>
						<img class="modal_landing_img" src="<?php echo $popup_image; ?>" alt="modal landing image">
					<?php
					endif;
					?>
				</div>
				<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
					<div class="page_contact_title">
						Giảm 10% khi đăng ký sử dụng từ 2 dịch vụ trở lên
					</div>

					<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
					<input type="hidden" name="ten_trang" value="<?php the_title(); ?>">

					<div class="page_contact_service">
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
						<div class="page_contact_subtitle text-center">
							Thông tin Liên hệ
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

<?php
get_footer();
?>
<script>
	jQuery(document).ready(function($) {
		$('#modal_landing').modal('show');
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