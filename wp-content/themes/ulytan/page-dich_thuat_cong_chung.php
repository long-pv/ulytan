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
							if ($item['image']) {
						?>
								<div class="col-md-6">
									<img class="achieve_brand_img" src="<?php echo $item['image']; ?>" alt="<?php echo $item['tieu_de_anh']; ?>">
									<?php
									if ($item['tieu_de_anh']) {
									?>
										<div class="achieve_brand_img_tieu_de"><?php echo $item['tieu_de_anh']; ?></div>
									<?php
									}
									?>
								</div>
						<?php
							}
						endforeach;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

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


<section class="secSpace--top">
	<div class="container">
		<?php
		$post_id = get_the_ID();
		$session_key = "reaction_$post_id";
		$current_reaction = isset($_COOKIE[$session_key]) ? $_COOKIE[$session_key] : '';
		?>
		<div class="reaction_buttons landingpage_share_mxh_wrap">
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

			<!-- facebook -->
			<a class="reaction_button_item single_post_share_mxh_icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
					<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
				</svg>
			</a>

			<!-- Twitter (X) -->
			<a class="reaction_button_item single_post_share_mxh_icon" href="https://twitter.com/home?status=<?php echo the_permalink(); ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
					<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
				</svg>
			</a>

			<!-- linkedin -->
			<a class="reaction_button_item single_post_share_mxh_icon" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_link; ?>&title=text" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
					<path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
				</svg>
			</a>

			<!-- zalo -->
			<a class="reaction_button_item single_post_share_mxh_icon" href="https://zalo.me/share?url=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;">
				<svg width="60" height="52" viewBox="0 0 60 52" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_2548_12)">
						<path d="M9.44623 51.4406H5.31347L8.23583 48.5182C9.81154 46.9425 10.7955 44.8931 11.0601 42.6698C6.94829 39.9715 3.94159 36.4215 2.3321 32.3502C0.723758 28.282 0.521645 23.8037 1.74768 19.3992C3.21873 14.1143 6.66903 9.29725 11.4628 5.83531C16.6721 2.07345 23.1571 0.0849609 30.2168 0.0849609C39.1101 0.0849609 46.6062 2.64007 51.8943 7.47389C56.6583 11.8287 59.282 17.7028 59.282 24.0142C59.282 27.0804 58.6576 30.064 57.4263 32.8819C56.1521 35.7979 54.2863 38.3943 51.8807 40.5988C46.5855 45.4517 39.0941 48.0169 30.2166 48.0169C26.9211 48.0169 23.4822 47.5769 20.4119 46.7696C17.5058 49.7509 13.5677 51.4406 9.44623 51.4406Z" fill="black" />
						<path d="M16.0936 27.9243C18.0397 27.9243 19.8698 27.9115 21.6871 27.9243C22.7053 27.9372 23.2594 28.3611 23.3626 29.1703C23.4785 30.1851 22.8857 30.8659 21.7773 30.8788C19.6894 30.9044 17.6144 30.8916 15.5265 30.8916C14.9207 30.8916 14.3279 30.9173 13.7221 30.8788C12.9746 30.8402 12.24 30.6861 11.8791 29.9154C11.5182 29.1446 11.776 28.451 12.2658 27.8216C14.2506 25.3039 16.2482 22.7734 18.2459 20.2557C18.3619 20.1016 18.4779 19.9474 18.5939 19.8061C18.465 19.5878 18.2846 19.6905 18.1299 19.6777C16.738 19.6648 15.3332 19.6777 13.9412 19.6648C13.619 19.6648 13.2968 19.6263 12.9875 19.5621C12.2529 19.3951 11.8018 18.6629 11.9693 17.9436C12.0853 17.4555 12.472 17.0573 12.9617 16.9416C13.271 16.8646 13.5933 16.826 13.9155 16.826C16.2096 16.8132 18.5166 16.8132 20.8107 16.826C21.2231 16.8132 21.6226 16.8646 22.0222 16.9673C22.8986 17.2628 23.2723 18.072 22.9244 18.9198C22.615 19.652 22.1253 20.2814 21.6355 20.9108C19.9472 23.056 18.2588 25.1883 16.5704 27.3078C16.4287 27.4748 16.2998 27.6418 16.0936 27.9243Z" fill="white" />
						<path d="M31.02 21.1544C31.3288 20.7539 31.6504 20.3791 32.178 20.2757C33.1944 20.069 34.1466 20.728 34.1594 21.7618C34.198 24.3462 34.1852 26.9307 34.1594 29.5151C34.1594 30.187 33.722 30.7815 33.0915 30.9753C32.4482 31.2208 31.7148 31.027 31.2902 30.4713C31.0714 30.2 30.9814 30.1483 30.6726 30.3938C29.5017 31.35 28.1764 31.518 26.7482 31.0528C24.4579 30.3033 23.5187 28.5072 23.2613 26.3233C22.9911 23.9586 23.776 21.9427 25.8861 20.7022C27.636 19.6555 29.4116 19.7459 31.02 21.1544ZM26.4651 25.871C26.4909 26.4396 26.671 26.9823 27.0055 27.4346C27.7003 28.365 29.0256 28.5589 29.9649 27.8611C30.1193 27.7448 30.2608 27.6026 30.3895 27.4346C31.11 26.4525 31.11 24.8373 30.3895 23.8552C30.0292 23.3512 29.4631 23.054 28.8584 23.0411C27.443 22.9506 26.4523 24.049 26.4651 25.871ZM39.9366 25.9486C39.8337 22.6276 42.0082 20.1465 45.0962 20.0561C48.3772 19.9527 50.7704 22.1624 50.8733 25.3929C50.9763 28.6622 48.9819 30.9753 45.9068 31.2854C42.5486 31.6214 39.8851 29.1791 39.9366 25.9486ZM43.1662 25.6384C43.1404 26.2846 43.3334 26.9177 43.7194 27.4475C44.4271 28.3779 45.7524 28.5589 46.6788 27.8352C46.8203 27.7318 46.9361 27.6026 47.0519 27.4734C47.7982 26.4913 47.7982 24.8373 47.0648 23.8552C46.7045 23.3641 46.1384 23.054 45.5336 23.0411C44.144 22.9636 43.1662 24.0232 43.1662 25.6384ZM38.8043 23.3771C38.8043 25.38 38.8172 27.3829 38.8043 29.3859C38.8172 30.3033 38.0967 31.0658 37.1831 31.0916C37.0287 31.0916 36.8615 31.0787 36.7071 31.0399C36.0637 30.8719 35.5748 30.187 35.5748 29.3729V19.0998C35.5748 18.4925 35.5619 17.8981 35.5748 17.2907C35.5877 16.2957 36.2181 15.6496 37.1703 15.6496C38.1481 15.6367 38.8043 16.2828 38.8043 17.3166C38.8172 19.3324 38.8043 21.3612 38.8043 23.3771Z" fill="white" />
					</g>
					<defs>
						<clipPath id="clip0_2548_12">
							<rect width="60" height="52" fill="white" />
						</clipPath>
					</defs>
				</svg>
			</a>

			<!-- copy link -->
			<a href="javascript:void(0);" onclick="copyToClipboard('#copy2')" class="reaction_button_item single_post_share_mxh_icon">
				<span id="copy2" style="display:none"><?php the_permalink(); ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
					<path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
				</svg>
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

<?php
$hien_thi_popup = get_field('hien_thi_popup') ?? '1';
if ($hien_thi_popup != "0"):
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
						} elseif ($type_popup == '3') {
							$services = [
								[
									'raw_name' => 'Chứng thực lãnh sự',
									'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
								],
								[
									'raw_name' => 'Hợp pháp hóa lãnh sự',
									'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
								],
								[
									'raw_name' => 'Dịch thuật công chứng',
									'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '6') {
							$services = [
								[
									'raw_name' => 'Lý lịch tư pháp',
									'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '7') {
							$services = [
								[
									'raw_name' => 'Đổi bằng lái xe quốc tế',
									'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
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
									'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
									'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Cấp, gia hạn giấy phép lao động',
									'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '8') {
							$services = [
								[
									'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
									'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Lý lịch tư pháp',
									'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
								],
								[
									'raw_name' => 'Cấp, gia hạn giấy phép lao động',
									'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Giấy khám sức khoẻ',
									'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
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
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Đổi bằng lái xe quốc tế',
									'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
								],
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
								]
							];
						} elseif ($type_popup == '9') {
							$services = [
								[
									'raw_name' => 'Cấp, gia hạn giấy phép lao động',
									'mo_ta' => 'Hỗ trợ thủ tục này cho người có quốc tịch nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Lý lịch tư pháp',
									'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
								],
								[
									'raw_name' => 'Xin cấp, gia hạn thẻ tạm trú',
									'mo_ta' => 'Hỗ trợ này dành cho người nước ngoài sinh sống và làm việc tại Việt Nam'
								],
								[
									'raw_name' => 'Giấy khám sức khoẻ',
									'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
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
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ Xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Đổi bằng lái xe quốc tế',
									'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
								],
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
								]
							];
						} elseif ($type_popup == '10') {
							$services = [
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Giấy khám sức khoẻ',
									'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
								],
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
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
									'raw_name' => 'Dịch thuật công chứng',
									'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
								],
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
								],
								[
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
								]
							];
						} elseif ($type_popup == '11') {
							$services = [
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'raw_name' => 'Giấy khám sức khoẻ',
									'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
								],
								[
									'raw_name' => 'Dịch thuật công chứng',
									'mo_ta' => 'Dịch thuật có công chứng từ tiếng Việt sang tiếng nước ngoài và ngược lại lấy nhanh'
								],
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
								],
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
								],
								[
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
								]
							];
						} elseif ($type_popup == '12') {
							$services = [
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '13') {
							$services = [
								[
									'raw_name' => 'Du lịch quốc tế',
									'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '14') {
							$services = [
								[
									'raw_name' => 'Xin cấp E-Visa',
									'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
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
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
								],
								[
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
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
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
								],
								[
									'raw_name' => 'Du lịch quốc tế',
									'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '15') {
							$services = [
								[
									'raw_name' => 'Bảo hiểm du lịch quốc tế',
									'mo_ta' => 'Bán bảo hiểm du lịch quốc tế cho các cá nhân và tổ chức với giá hợp lý'
								],
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
								],
								[
									'raw_name' => 'Du lịch quốc tế',
									'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
								],
								[
									'raw_name' => 'Xin cấp E-Visa',
									'mo_ta' => 'Hỗ trợ thủ tục cấp E-Visa cho người nước ngoài vào Việt Nam'
								],
								[
									'raw_name' => 'Đầu tư, định cư',
									'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
								],
								[
									'raw_name' => 'Thẻ APEC',
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '16') {
							$services = [
								[
									'raw_name' => 'Đầu tư, định cư',
									'mo_ta' => 'Tư vấn đầu tư, định cư ra nước ngoài cho người Việt Nam cũng như cho các công ty, tổ chức nước ngoài đầu tư vào Việt Nam'
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
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'raw_name' => 'Thẻ APEC',
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '17') {
							$services = [
								[
									'raw_name' => 'Thẻ APEC',
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
						} elseif ($type_popup == '18') {
							$services = [
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
								],
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Chứng thực lãnh sự',
									'mo_ta' => 'Hỗ trợ chứng thực tại đại sứ quán để các giấy tờ có thể sử dụng hợp pháp ở Việt Nam cũng như nhiều quốc gia khác nhau'
								],
								[
									'raw_name' => 'Hợp pháp hóa lãnh sự',
									'mo_ta' => 'Hỗ trợ hợp pháp hoá, để giấy tờ có giá trị pháp lý sử dụng trên toàn thế giới'
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
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '19') {
							$services = [
								[
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
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
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
								],
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
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
						} elseif ($type_popup == '20') {
							$services = [
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
								],
								[
									'raw_name' => 'Cấp visa đa quốc gia',
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Du lịch quốc tế',
									'mo_ta' => 'Tổ chức tour cho cá nhân và tổ chức của Việt Nam đi ra nước ngoài'
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
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
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
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
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
						} elseif ($type_popup == '21') {
							$services = [
								[
									'raw_name' => 'Giấy khám sức khoẻ',
									'mo_ta' => 'Hỗ trợ cấp giấy khám sức khoẻ để làm Visa đi nước ngoài hoặc cho người nước ngoài làm giấy phép lao động, thẻ tạm trú tại Việt Nam'
								],
								[
									'raw_name' => 'Lý lịch tư pháp',
									'mo_ta' => 'Hỗ trợ xin cấp phiếu lý lịch tư pháp các loại lấy nhanh'
								],
								[
									'raw_name' => 'Xuất khẩu lao động',
									'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand, v.v.'
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
									'mo_ta' => 'Hỗ trợ xin cấp và gia hạn visa hơn 60 quốc gia'
								],
								[
									'raw_name' => 'Cấp, đổi, gia hạn hộ chiếu',
									'mo_ta' => 'Hỗ trợ xin cấp, đổi và gia hạn hộ chiếu lấy nhanh'
								],
								[
									'raw_name' => 'Đổi bằng lái xe quốc tế',
									'mo_ta' => 'Hỗ trợ để tài xế sử dụng bằng lái xe đã được đổi, có thể lái xe ở nhiều quốc gia trên toàn thế giới'
								],
								[
									'raw_name' => 'Tư vấn du học quốc tế',
									'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
								],
								[
									'raw_name' => 'Đào tạo ngoại ngữ',
									'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại nước ngoài'
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
									'mo_ta' => 'Hỗ trợ làm thẻ doanh nhân APEC cho các doanh nghiệp'
								],
								[
									'raw_name' => 'Chứng minh tài chính',
									'mo_ta' => 'Dịch vụ dành cho người Việt Nam muốn chứng minh tài chính để xin visa du học, du lịch, xuất khẩu lao động'
								],
								[
									'raw_name' => 'Bán vé máy bay',
									'mo_ta' => 'Bán vé máy bay quốc tế'
								],
								[
									'raw_name' => 'Thủ tục hải quan',
									'mo_ta' => 'Hỗ trợ khai báo, xử lý thủ tục xuất nhập khẩu'
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
<?php
endif;
?>

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

<style>
	#ajax-loader {
		z-index: 100000000 !important;
	}
</style>

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

		// chức năng like và dislike
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