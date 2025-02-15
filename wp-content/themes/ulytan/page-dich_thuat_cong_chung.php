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
	<section class="achieve_brand secSpace--bottom bg-primary pt-5" id="scroll_1">
		<div class="container">
			<h2 class="h4 text-white text-center mb-4">
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

<?php /*
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
<?php endif; */ ?>


<?php
$video_customer_title = get_field('video_customer_title') ?: 'KHÁCH HÀNG NÓI VỀ ULYTAN';
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
	<section class="video_customer secSpace" id="scroll_4">
		<div class="container">
			<h2 class="text-center text-white mb-4">
				<?php echo $video_customer_title; ?>
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
	<section class="service service_list secSpace" id="scroll_3">
		<div class="container">
			<h2 class="sec_title text-center">
				<?php echo $services_title; ?>
			</h2>

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

<div class="modal modal_landing fade" id="modal_landing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-header d-block p-0 border-0">
				<div>
					<?php
					$popup_image = get_field('anh_popup_hien_thi') ?? '';
					if ($popup_image):
					?>
						<img class="modal_landing_img" src="<?php echo $popup_image; ?>" alt="modal landing image">
					<?php
					endif;
					?>
				</div>

				<?php
				if (get_field('tieu_de_popup')) :
				?>
					<div class="page_contact_title">
						<?php echo get_field('tieu_de_popup'); ?>
					</div>
				<?php
				endif;
				?>
			</div>
			<div class="arrow-down">
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12.5 0H27.5V20H39.6L20 39.6L0.400002 20H12.5V0Z" fill="#FC0D1C" />
				</svg>
			</div>
			<div class="modal-body">
				<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
					<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
					<input type="hidden" name="ten_trang" value="<?php the_title(); ?>">
					<input type="hidden" name="id_trang" value="<?php echo get_the_ID(); ?>">

					<?php
					$type_popup = get_field('type_popup') ?? '1';
					if ($type_popup == '1') {
						$services = [
							[
								'raw_name' => 'Dịch thuật công chứng',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '2') {
						$services = [
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '4') {
						$services = [
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'mo_ta' => 'Hỗ trợ làm thể doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
								'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
							]
						];
					} elseif ($type_popup == '5') {
						$services = [
							[
								'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
								'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
							],
							[
								'raw_name' => 'Cấp visa đa quốc gia',
								'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
							],
							[
								'raw_name' => 'Bán vé máy bay',
								'mo_ta' => 'Bán vé máy bay quốc tế'
							],
							[
								'raw_name' => 'Dịch thuật công chứng',
								'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
							],
							[
								'raw_name' => 'Hợp pháp hóa lãnh sự',
								'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
							],
							[
								'raw_name' => 'Chứng thực lãnh sự',
								'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
							],
							[
								'raw_name' => 'Lý lịch tư pháp',
								'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
							],
							[
								'raw_name' => 'Đổi bằng lái xe quốc tế',
								'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
							],
							[
								'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
								'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Cấp, gia hạn giấy phép lao động',
								'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
							],
							[
								'raw_name' => 'Xuất khẩu lao động',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như, Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, Newzeland v.…v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
							],
							[
								'raw_name' => 'Xin cấp E-Visa',
								'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
							],
							[
								'raw_name' => 'Bảo hiểm du lịch quốc tế',
								'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
							],
							[
								'raw_name' => 'Đầu tư, định cư',
								'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
							],
							[
								'raw_name' => 'Thẻ APEC',
								'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân Apec cho các doanh nghiệp'
							],
							[
								'raw_name' => 'Chứng minh tài chính',
								'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
							],
							[
								'raw_name' => 'Thủ tục hải quan',
								'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
							],
							[
								'raw_name' => 'Giấy khám sức khoẻ',
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
									<th class="text-center">Dịch vụ</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$services_with_input = [
									'Cấp visa đa quốc gia',
									'Xuất khẩu lao động',
									'Tư vấn du học quốc tế',
									'Đào tạo ngoại ngữ',
									'Du lịch quốc tế'
								];

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
									if (in_array($service['raw_name'], $services_with_input)) {
										$key_input_class = isset($service['key_input']) ? esc_attr($service['key_input']) : ''; // Kiểm tra key_input
										echo '<div class="td_group mt-2" style="display:none;">';
										echo '<div class="td_checkbox_desc">(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)</div>';
										echo '<div class="td_label mb-1">';
										echo 'Quốc gia <span class="td_req">(*bắt buộc)</span>';
										echo '</div>';
										echo '<input type="text" name="quoc_gia_' . $slug . '" class="td_input ' . $key_input_class . '">';
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
								<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sale@ulytan.com">
							</div>
						</div>
					</div>
					<div class="d-none justify-content-center">
						<input type="submit" class="contact_submit contact_submit_primary" value="Đăng ký ngay">
					</div>
				</form>
			</div>
			<div class="modal-footer justify-content-center">
				<div class="d-flex justify-content-center">
					<input type="submit" class="contact_submit contact_submit_fake landingpage_popup_btn_submit" value="Đăng ký ngay">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal modal_lien_he fade show" id="modal_lien_he" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<div class="modal-body">
				<div class="modal_title">
					ULYTAN - SIÊU NHANH, THỦ TỤC SIÊU ĐƠN GIẢN </div>
				<div class="editor">
					<p style="text-align: center;"><span style="color: #339966;"><span style="font-size: 48px;">Thành công</span></span></p>
					<p style="text-align: center;"><strong>Bộ phận tư vấn của chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</strong></p>
					<p>&nbsp;</p>
					<p style="text-align: center;"><span style="font-size: 28px;"><strong>Chúc hợp tác thành công!</strong></span></p>
				</div>

				<div class="chia_se_mxh">
					<div class="title">
						Tìm hiểu thêm về ULYTAN
					</div>
					<div class="list_link">
						<a href="#" target="_blank" class="mxh_tiktok">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"></path>
							</svg>
						</a>

						<a href="#" target="_blank" class="mxh_fb">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path>
							</svg>
						</a>

						<a href="#" target="_blank" class="mxh_yt">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"></path>
							</svg>
						</a>
					</div>


					<div class="title">
						Chia sẻ điều này với mọi người trên
					</div>

					<?php
					$share_link = get_permalink();
					?>

					<div class="social_share_post">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_facebook mxh_fb">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path>
							</svg>
						</a>

						<a href="https://twitter.com/home?status=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_twitter mxh_tw">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
							</svg>
						</a>
					</div>
				</div>
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
							$('#modal_landing').modal('hide');
							$('#modal_lien_he').modal('show');
							$("#page_contact_form")[0].reset();
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