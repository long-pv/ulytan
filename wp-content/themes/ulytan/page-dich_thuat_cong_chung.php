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

<div class="section_2_scroll"></div>

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

					<?php
					$type_popup = get_field('type_popup') ?? '1';
					if ($type_popup == '1') {
						$services = [
							[
								'raw_name' => 'Dịch thuật công chứng',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'show_input' => true,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'show_input' => true,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'show_input' => true,
								'key_input' => '',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'show_input' => true,
								'key_input' => '',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '2') {
						$services = [
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '4') {
						$services = [
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '5') {
						$services = [
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'show_input' => false,
								'key_input' => '',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					}
					?>

					<div class="page_contact_service">
						<table class="page_contact_service_table">
							<thead>
								<tr>
									<th width="30">Chọn</th>
									<th>Dịch vụ</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($services as $key => $service) {
									$slug = convert_to_slug($service['raw_name']); // Chuyển đổi name thành slug

									echo '<tr>';
									echo '<td class="td_checkbox">';
									echo '<input type="checkbox" name="services[]" class="contact_checkox" value="' . esc_attr($slug) . '">';
									echo '</td>';

									echo '<td>';
									echo '<strong>' . ($key + 1) . '. ' . esc_html($service['raw_name']) . '</strong>';
									echo $service['mo_ta'] ? '<div style="font-style:italic; font-size: 14px;">(' . $service['mo_ta'] . ')</div>' : '';

									// Hiển thị input bổ sung nếu show_input = true
									if ($service['show_input']) {
										echo '<div class="td_group mt-2" style="display:none;">';
										echo '<div class="td_checkbox_desc">(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)</div>';
										echo '<div class="td_label mb-1">';
										echo 'Quốc gia <span class="td_req">(*bắt buộc)</span>';
										echo '</div>';
										echo '<input type="text" name="quoc_gia_' . $slug . '" class="td_input ' . esc_attr($service['key_input']) . '">';
										echo '</div>';
									}

									echo '</td>';
									echo '</tr>';
								}
								?>
							</tbody>
						</table>
					</div>

					<div class="page_contact_info" style="display:none;">
						<div class="page_contact_subtitle text-center">
							Thông tin Liên hệ
						</div>

						<div class="row row_16">
							<div class="col-lg-4">
								<label class="contact_label" for="">
									1. Họ và tên*
								</label>
								<input type="text" name="full_name" class="contact_input" placeholder="Nhập họ và tên">
							</div>
							<div class="col-lg-4">
								<label class="contact_label" for="">
									2. Số điện thoại*
								</label>
								<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
							</div>
							<div class="col-lg-4">
								<label class="contact_label" for="">
									3. Địa chỉ Email*
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
		var sectionPassed = false;
		$(window).on('scroll', function() {
			var section = $('.section_2_scroll');
			var sectionOffset = section.offset().top + section.outerHeight();
			var windowScroll = $(window).scrollTop();

			if (windowScroll > sectionOffset && !sectionPassed) {
				sectionPassed = true;
				$('#modal_landing').modal('show');
			}
		});
		// $('#modal_landing').modal('show');

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
				full_name: {
					required: true,
				},
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
			},
			messages: {
				full_name: {
					required: "Vui lòng nhập họ và tên của bạn",
				},
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
			},
			submitHandler: function(form) {
				if ($('input[name="services[]"]:checked').length == 0) {
					alert("Vui lòng chọn ít nhất một dịch vụ.");
					return false;
				}

				var hasError = false;
				$('.td_group .td_input').each(function() {
					var input = $(this);
					var inputValue = input.val(); // Lấy giá trị của input
					var checkbox = input.closest('tr').find('input[name="services[]"]:checked');

					// Nếu input chưa có giá trị
					if (inputValue.trim() === '' && checkbox.length > 0) {
						hasError = true;
						// Nếu chưa có lỗi, thêm span.error
						if (input.next('.error').length === 0) {
							input.after('<span class="error" >Vui lòng nhập quốc gia</span>');
							input.focus();
						}
					} else {
						// Nếu đã có giá trị và có lỗi, xóa span.error
						input.next('.error').remove();
					}
				});

				// Nếu có lỗi, ngừng submit form
				if (hasError) {
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