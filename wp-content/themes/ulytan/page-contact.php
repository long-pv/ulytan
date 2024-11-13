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
						<div class="page_contact_info">
							<div class="page_contact_subtitle">
								Thông tin cá nhân
							</div>

							<div class="row row_16">
								<div class="col-lg-6">
									<label class="contact_label" for="">
										1. Số điện thoại*
									</label>
									<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 11 số">
								</div>
								<div class="col-lg-6">
									<label class="contact_label" for="">
										2. Địa chỉ Email*
									</label>
									<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sales@ulytan.vn">
								</div>
							</div>
						</div>

						<div class="page_contact_service" style="display:none;">
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
											<input type="checkbox" name="services[]" class="contact_checkox" value="Dịch thuật thường">
										</td>
										<td>
											<strong>I. Dịch thuật thường</strong>
											<div>(Chỉ dịch thuật thông thường mà không cần công chứng)</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Dịch thuật công chứng">
										</td>
										<td>
											<strong>II. Dịch thuật công chứng</strong>
											<div>(Dịch thuật kèm công chứng)</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Sao y bản chính">
										</td>
										<td>
											<strong>III. Sao y bản chính</strong>
											<div>(Nghĩa là sao y các bản khác giống 100% bản gốc, sau đó các cơ quan có thẩm quyền đóng dấu chứng thực lên các bản sao)</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Công chứng bản dịch">
										</td>
										<td>
											<strong>IV. Công chứng bản dịch ?</strong>
											<div>(Đã có bản dịch kèm bản gốc và chỉ cần công chứng) </div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Hiệu đính">
										</td>
										<td>
											<strong>V. Hiệu đính</strong>
											<div>(Đã có bản dịch nhưng chưa chuẩn cần các chuyên gia của Ulytan chỉnh sửa, hiệu đính lại) </div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Hợp pháp hóa, chứng thực lãnh sự hồ sơ Việt Nam cấp để sử dụng ở nước ngoài">
										</td>
										<td>
											<strong>VI. Hợp pháp hóa, chứng thực lãnh sự hồ sơ Việt Nam cấp để sử dụng ở nước ngoài</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="Hợp pháp hóa, chứng thực lãnh sự hồ sơ của nước ngoài cấp để sử dụng ở Việt Nam">
										</td>
										<td>
											<strong>VII. Hợp pháp hóa, chứng thực lãnh sự hồ sơ của nước ngoài cấp để sử dụng ở Việt Nam</strong>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<strong class="d-block mb-3">File đính kèm</strong>
											<div class="radio_group mb-3">
												<label class="d-block">
													<input type="radio" name="file_option" value="upload_file" checked> Upload file
												</label>
												<p>
													Ghi chú: Phần upload này tối đa 50 Mb và chỉ chấp nhận file có đuôi .doc, .docx, .pdf, .zip
													Nếu file năng hơn 50Mb A/c vui lòng chọn Google Driver bên dưới.
												</p>
												<input type="file" name="upload_file" accept=".doc,.docx,.pdf" id="upload_file_input">
											</div>
											<div class="radio_group">
												<label class="d-block">
													<input type="radio" name="file_option" value="google_driver"> Google Driver
												</label>
												<p>
													Ghi chú: Anh chị vui lòng truy cập https://www.google.com/drive ==> Tài file ==> Copy đường link và dán vào ô bên dưới.
												</p>
												<input type="text" name="google_driver" class="contact_input" placeholder="Nhập link google driver">
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="mt-3 d-flex justify-content-center">
							<input type="submit" class="contact_submit" value="Đăng ký">
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

<?php
get_footer();
?>
<script>
	jQuery(document).ready(function($) {
		function toggleInputFields() {
			var selectedOption = $('input[name="file_option"]:checked').val();

			if (selectedOption === 'upload_file') {
				$('input[name="upload_file"]').show();
				$('input[name="google_driver"]').hide();
			} else if (selectedOption === 'google_driver') {
				$('input[name="google_driver"]').show();
				$('input[name="upload_file"]').hide();
			}
		}
		toggleInputFields();
		$('input[name="file_option"]').on('change', toggleInputFields);

		$('#upload_file_input').on('change', function() {
			var file = this.files[0];
			if (file) {
				// Kiểm tra kích thước tối đa 2MB
				if (file.size > 2 * 1024 * 1024) { // 2MB
					alert('Kích thước file không được vượt quá 2MB');
					this.value = ''; // Reset input nếu không đúng quy định
					return;
				}
			}
		});

		$("#page_contact_form").validate({
			rules: {
				phone: {
					required: true,
					digits: true,
					minlength: 1,
					maxlength: 11
				},
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				phone: {
					required: "Vui lòng nhập số điện thoại của bạn",
					digits: "Chỉ được phép chứa các chữ số",
					minlength: "Số điện thoại phải có ít nhất 1 ký tự",
					maxlength: "Số điện thoại không được vượt quá 11 ký tự"
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

				let file_option = $('input[name="file_option"]:checked').val();
				if (file_option == 'upload_file') {
					let upload_file = $('input[name="upload_file"]').val();

					if (!upload_file) {
						alert("Vui lòng nhập file của bạn");
						return false;
					}
				} else if (file_option == 'google_driver') {
					let google_driver = $('input[name="google_driver"]').val();

					if (!google_driver) {
						alert("Vui lòng nhập link google driver của bạn");
						return false;
					}
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
							alert('Thông tin đã được gửi thành công!');
							form.reset();
						} else {
							alert('Có lỗi xảy ra, vui lòng thử lại.');
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

		$('input[name="phone"], input[name="email"]').on("change", function() {
			if ($('input[name="phone"]').valid() && $('input[name="email"]').valid()) {
				$(".page_contact_service").show();
			} else {
				$(".page_contact_service").hide();
			}
		});

	});
</script>