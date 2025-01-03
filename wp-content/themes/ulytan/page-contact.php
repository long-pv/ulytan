<?php

/**
 * Template name: Page contact
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
<div class="container">
	<div class="secSpace">
		<?php
		wp_breadcrumbs();
		?>
		<div class="page_contact">
			<div class="row">
				<div class="col-lg-8">
					<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
						<h2 class="page_contact_title">
							XIN MỜI ĐIỀN THÔNG TIN ĐỂ NHẬN ĐƯỢC GIÁ KHUYẾN MÃI.
						</h2>

						<input type="hidden" name="trang_da_gui" value="<?php the_permalink(); ?>">
						<input type="hidden" name="ten_trang" value="<?php the_title(); ?>">
						<input type="hidden" name="id_trang" value="<?php echo get_the_ID(); ?>">

						<div class="page_contact_service">
							<div class="page_contact_subtitle">
								Bạn sử dụng dịch vụ nào sau đây
							</div>

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
							<div class="page_contact_subtitle">
								Thông tin cá nhân
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

						<div class="mt-3 d-flex justify-content-center">
							<input type="submit" class="contact_submit" value="Gửi">
						</div>
					</form>
				</div>
				<div class="col-lg-4 mt-4 mt-lg-0">
					<div class="page_contact_sidebar">
						<h2 class="page_contact_sidebar_head">
							GIỚI THIỆU CHUNG VỀ ULYTAN
						</h2>

						<?php
						$iframe_youtube = get_field('iframe_youtube') ?? '';
						if ($iframe_youtube):
						?>
							<div class="video mb-3">
								<?php
								$iframe = getYoutubeEmbedUrl($iframe_youtube);
								?>
								<iframe src="<?php echo $iframe; ?>?autoplay=0&mute=1&modestbranding=1&showinfo=0" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
							</div>
						<?php endif; ?>


						<?php
						$content = get_field('content') ?? '';
						if ($content):
						?>
							<div class="page_contact_sidebar_content editor mb-3">
								<?php echo $content; ?>
							</div>
						<?php endif; ?>

						<?php
						$see_more = get_field('see_more') ?? '';
						if ($see_more):
						?>
							<a target="_blank" class="page_contact_see_more" href="<?php echo $see_more; ?>">
								Xem thêm
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal modal_lien_he fade" id="modal_lien_he" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body">
				<div class="modal_title">
					<?php echo get_field('tieu_de'); ?>
				</div>
				<div class="editor">
					<?php echo get_field('noi_dung'); ?>
				</div>

				<div class="chia_se_mxh">
					<?php
					$tiktok = get_field('mxh_tiktok') ?? '';
					$facebook = get_field('mxh_facebook') ?? '';
					$youtube = get_field('mxh_youtube') ?? '';

					if ($tiktok || $facebook || $youtube) :
					?>
						<div class="title">
							Tìm hiểu thêm về ULYTAN
						</div>
						<div class="list_link">
							<?php if ($tiktok): ?>
								<a href="<?php echo $tiktok; ?>" target="_blank" class="mxh_tiktok">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
									</svg>
								</a>
							<?php endif; ?>

							<?php if ($facebook): ?>
								<a href="<?php echo $facebook; ?>" target="_blank" class="mxh_fb">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
									</svg>
								</a>
							<?php endif; ?>

							<?php if ($youtube): ?>
								<a href="<?php echo $youtube; ?>" target="_blank" class="mxh_yt">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
									</svg>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>


					<div class="title">
						Chia sẻ điều này với mọi người trên
					</div>
					<?php
					$share_link = get_permalink();
					?>
					<div class="social_share_post">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_facebook mxh_fb">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
							</svg>
						</a>

						<a href="https://twitter.com/home?status=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_twitter mxh_tw">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
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