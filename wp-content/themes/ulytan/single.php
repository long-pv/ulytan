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

if (in_array($post_type, [
	'form_ctv',
	'contact_info',
	'form_contribute',
	'faqs',
	'typical_customers',
	'our_partners',
	'staff',
	'activity_videos',
	'download_documents',
	'signup_download',
])) {
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

<section class="secSpace pt-3">
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

					<?php
					$allowed_post_types = [
						'form_nga',
						'form_trung',
						'form_nhat',
						'form_han',
						'form_phap',
						'form_duc',
						'form_anh',
						'form_arap',
						'form_la_tinh',
						'form_rumani',
						'form_ucraina',
						'form_tiep',
						'form_bungari',
						'form_khac'
					];
					if (in_array($post_type, $allowed_post_types)) {
						$danh_sach_tai_lieu = get_field('danh_sach_tai_lieu') ?? [];
						if ($danh_sach_tai_lieu) {
					?>
							<div class="news_documents_list">
								<?php
								foreach ($danh_sach_tai_lieu as $key => $item) {
									if ($item['file_tai_xuong']) {
										$post_id = $item['file_tai_xuong'];
										$file_tai_lieu = get_field('file_tai_lieu', $post_id) ?? '';
										$mo_ta = get_field('mo_ta', $post_id) ?? '';
										$type = $file_tai_lieu['subtype'] ?? '';
										$url = $file_tai_lieu["url"] ?? '';
								?>
										<div class="news_documents_item">
											<div class="news_documents_item_title">
												<?php echo get_the_title($post_id); ?>
											</div>

											<div class="news_documents_item_file">
												<?php
												if ($type == "pdf") {
													echo do_shortcode('[pdf-embedder url="' . $url . '"]');
												} elseif ($type == "vnd.openxmlformats-officedocument.wordprocessingml.document" || $type == "vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
													echo do_shortcode('[embeddoc url="' . $url . '" viewer="microsoft"]');
												}
												?>
											</div>

											<div class="news_documents_item_btn">
												<?php
												if (!empty($_COOKIE["user_dang_ky_tai_xuong"]) && $_COOKIE["user_dang_ky_tai_xuong"] == 'da_dang_ky') {
												?>
													<a download href="<?php echo $url; ?>" class="btn_tai_xuong_modal_download btn_tai_xuong_modal">
														Tải xuống
													</a>
												<?php
												} else {
												?>
													<a data-url="<?php echo $url; ?>" href="javascript:void(0);" class="btn_tai_xuong_modal_popup btn_tai_xuong_modal" data-toggle="modal" data-target="#popup_tai_xuong_file">
														Tải xuống
													</a>
													<a download href="<?php echo $url; ?>" class="btn_tai_xuong_modal_download btn_tai_xuong_modal" style="display: none;">
														Tải xuống
													</a>
												<?php
												}
												?>
											</div>

											<div class="news_documents_item_btn editor">
												<?php echo $mo_ta; ?>
											</div>
										</div>
								<?php
									}
								}
								?>
							</div>
					<?php
						}
					}
					?>
				</div>

				<section class="bg-light-1 secSpace--bottom-1 single_post_mxh_1">
					<div class="container_1">
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
			</div>
			<div class="col-lg-3">
				<div class="sidebar_lien_he">
					<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
						<div class="page_contact_title">
							Giảm 10% khi đăng ký sử dụng từ 2 dịch vụ
							<span class="arrow_blink">
								<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.5 0H27.5V20H39.6L20 39.6L0.400002 20H12.5V0Z" fill="#FFD503" />
								</svg>
							</span>
						</div>

						<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
						<input type="hidden" name="ten_trang" value="Trang bài viết">
						<input type="hidden" name="id_trang" value="trang_bai_viet">

						<?php
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
								'key_input' => 'services_1',
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
								'key_input' => 'services_2',
								'mo_ta' => 'Dịch vụ này dành cho người Việt Nam đi lao động tại nước ngoài như Úc, Nhật, Hàn, Nga, Pháp, Đức, Mỹ, Canada, Anh, New Zealand v.v.'
							],
							[
								'raw_name' => 'Tư vấn du học quốc tế',
								'show_input' => true,
								'key_input' => 'services_3',
								'mo_ta' => 'Tư vấn cho du học sinh Việt Nam học tại nước ngoài'
							],
							[
								'raw_name' => 'Đào tạo ngoại ngữ',
								'show_input' => true,
								'key_input' => 'services_4',
								'mo_ta' => 'Đào tạo ngoại ngữ hơn 15 ngôn ngữ cho người nước ngoài sống tại Việt Nam cũng như người Việt Nam sống tại Nước ngoài'
							],
							[
								'raw_name' => 'Du lịch quốc tế',
								'show_input' => true,
								'key_input' => 'services_5',
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
						?>
						<div class="page_contact_scroll">
							<div class="page_contact_service">
								<!-- <div class="page_contact_subtitle">
								Bạn sử dụng dịch vụ nào sau đây
							</div> -->

								<table class="page_contact_service_table">
									<thead>
										<tr>
											<th width="20">
												<!-- Chọn -->
											</th>
											<th style="text-align: center;">
												Dịch vụ
											</th>
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
								<div class="page_contact_subtitle">
									Thông tin cá nhân
								</div>

								<div class="row row_16">
									<div class="col-12">
										<label class="contact_label" for="">
											1. Họ và tên*
										</label>
										<input type="text" name="full_name" class="contact_input" placeholder="Nhập họ và tên">
									</div>
									<div class="col-12">
										<label class="contact_label" for="">
											2. Số điện thoại*
										</label>
										<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
									</div>
									<div class="col-12">
										<label class="contact_label" for="">
											3. Địa chỉ Email
										</label>
										<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sale@ulytan.com">
									</div>
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
					<?php
					// comment_form();
					// Kiểm tra xem bài viết có cho phép bình luận không
					if (comments_open() || get_comments_number()) {
						comments_template(); // Gọi file comments.php
					}
					?>
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
if (in_array($post_type, $allowed_post_types)) {
?>
	<div class="modal fade popup_tai_xuong_file" id="popup_tai_xuong_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#757575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M15 9L9 15" stroke="#757575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M9 9L15 15" stroke="#757575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<div class="modal-body">
					<div class="content_body">
						<div class="popup_tai_xuong_file_title">
							Bạn vui lòng điền thông tin để tải xuống

							<div class="svg-container">
								<svg width="38" height="50" viewBox="0 0 38 50" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.9114 0.319336H26.0894V24.986H37.5264L19.0004 49.1593L0.474365 24.986H11.9114V0.319336Z" fill="#E94235" />
								</svg>
							</div>
						</div>
						<form id="form_tai_xuong_file" action="" method="post">
							<div class="page_contact_info">
								<div class="row row_16">
									<div class="col-lg-4">
										<label class="contact_label" for="">
											1. Họ và tên *
										</label>
										<input type="text" name="full_name" class="contact_input" placeholder="Nhập họ và tên">
									</div>
									<div class="col-lg-4">
										<label class="contact_label" for="">
											2. Số điện thoại *
										</label>
										<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
									</div>
									<div class="col-lg-4">
										<label class="contact_label" for="">
											3. Địa chỉ Email
										</label>
										<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sale@ulytan.com">
									</div>
									<div class="col-12 page_ctv_step_16">
										<div class="page_ctv_form_group">
											<label for="" class="page_ctv_form_label">
												4. Mục đích sử dụng *
											</label>

											<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
											<input type="hidden" name="ten_trang" value="Tài liệu upload">
											<input type="hidden" name="id_trang" value="trang_tai_lieu">

											<div class="page_contact_service">
												<table class="page_contact_service_table">
													<!-- <thead>
														<tr>
															<th width="20">
															</th>
															<th style="text-align: center;">
																Dịch vụ
															</th>
														</tr>
													</thead> -->
													<tbody>
														<?php
														foreach ($services as $key => $service) {
															$slug = convert_to_slug($service['raw_name']); // Chuyển đổi name thành slug

															echo '<tr>';
															echo '<td class="td_checkbox">';
															echo '<input type="checkbox" name="services[]" class="contact_checkox" value="' . esc_attr($slug) . '">';
															echo '</td>';

															echo '<td>';
															echo '<strong>Để ' . esc_html($service['raw_name']) . '</strong>';
															echo $service['mo_ta'] ? '<div style="font-style:italic;">(' . $service['mo_ta'] . ')</div>' : '';

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


														$slug = convert_to_slug('Mục đích khác'); // Chuyển đổi name thành slug

														echo '<tr>';
														echo '<td class="td_checkbox">';
														echo '<input type="checkbox" name="services[]" class="contact_checkox" value="' . esc_attr($slug) . '">';
														echo '</td>';

														echo '<td>';
														echo '<strong>Mục đích khác</strong>';
														echo '</td>';
														echo '</tr>';
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<div class="col-12 mt-3 d-flex justify-content-center">
										<input type="submit" class="contact_submit" value="Gửi">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>

<style>
	#ajax-loader {
		z-index: 100000000 !important;
	}
</style>

<?php
get_footer();
?>
<script>
	$(document).ready(function() {
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
					// required: true,
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
				if ($('#page_contact_form input[name="services[]"]:checked').length == 0) {
					alert("Vui lòng chọn ít nhất một dịch vụ.");
					return false;
				}

				var hasError = false;
				$('#page_contact_form .td_group .td_input').each(function() {
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

		$('#page_contact_form input[name="services[]"]').on('change', function() {
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

		// Thêm phương thức kiểm tra tùy chỉnh
		$.validator.addMethod("phoneVN", function(value, element) {
			return this.optional(element) || /^0\d{9}$/.test(value);
		}, "Số điện thoại phải bắt đầu bằng số 0.");

		var data_download_btn = '';
		$('.btn_tai_xuong_modal_popup').on('click', function() {
			data_download_btn = $(this).data('url');
		});

		$("#form_tai_xuong_file").validate({
			rules: {
				full_name: {
					required: true,
				},
				phone: {
					required: true,
					digits: true,
					minlength: 10,
					maxlength: 10,
					phoneVN: true,
				},
				email: {
					// required: true,
					customEmail: true,
				},
				purpose: {
					required: true,
				}
			},
			messages: {
				full_name: {
					required: "Vui lòng nhập họ và tên",
				},
				phone: {
					required: "Vui lòng nhập số điện thoại",
					digits: "Chỉ được phép chứa các chữ số",
					minlength: "Số điện thoại phải có đủ 10 ký tự",
					maxlength: "Số điện thoại không được vượt quá 10 ký tự"
				},
				email: {
					required: "Vui lòng nhập địa chỉ email",
					email: "Vui lòng nhập một địa chỉ email hợp lệ"
				},
				purpose: {
					required: "Vui lòng nhập mục đích sử dụng",
				}
			},
			submitHandler: function(form) {
				if ($('#form_tai_xuong_file input[name="services[]"]:checked').length == 0) {
					alert("Vui lòng chọn ít nhất một dịch vụ.");
					return false;
				}

				var hasError = false;
				$('#form_tai_xuong_file .td_group .td_input').each(function() {
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
				formData.append("action", "dang_ky_tai_xuong");

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
							$('.btn_tai_xuong_modal_download').show();
							$('.btn_tai_xuong_modal_popup').remove();
							$('#popup_tai_xuong_file').modal('hide');
							// Tạo thẻ `a` ẩn và kích hoạt tải xuống
							var link = document.createElement("a");
							link.href = data_download_btn;
							link.download = data_download_btn.split('/').pop();
							document.body.appendChild(link);
							link.click();
							document.body.removeChild(link);
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
	});
</script>