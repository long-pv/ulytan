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
									<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
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
											<div>(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)</div>
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
											<input type="checkbox" name="services[]" class="contact_checkox" value="5. Dịch vụ hỗ trợ hợp pháp hóa lãnh sự">
										</td>
										<td>
											<strong>5. Dịch vụ hỗ trợ hợp pháp hóa lãnh sự</strong>
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
											<input type="checkbox" id="services_7" name="services[]" class="contact_checkox" value="7. Dịch vụ chứng nhận lãnh sự tại đại sứ quán 60 Quốc gia">
										</td>
										<td>
											<strong>7. Dịch vụ chứng nhận lãnh sự tại đại sứ quán 60 Quốc gia</strong>
											<div>(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_7" class="td_input services_7">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="8. Dịch vụ gia hạn thẻ tạm trú, cấp giấy phép lao động">
										</td>
										<td>
											<strong>8. Dịch vụ gia hạn thẻ tạm trú, cấp giấy phép lao động</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_9" name="services[]" class="contact_checkox" value="9. Dịch vụ xuất khẩu lao động">
										</td>
										<td>
											<strong>9. Dịch vụ xuất khẩu lao động</strong>
											<div>
												(Hãy điền ngắn gọn tên quốc gia. Ví dụ: Hàn Quốc)
											</div>
											<div class="td_group mt-2" style="display:none;">
												<div class="td_label mb-1">
													Quốc gia <span class="td_req">(*bắt buộc)</span>
												</div>
												<input type="text" name="services_9" class="td_input services_9">
											</div>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" id="services_10" name="services[]" class="contact_checkox" value="10. Dịch vụ du học quốc tế">
										</td>
										<td>
											<strong>10. Dịch vụ du học quốc tế</strong>
											<div>
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
											<input type="checkbox" id="services_11" name="services[]" class="contact_checkox" value="11. Dịch vụ đào tạo ngoại ngữ quốc tế">
										</td>
										<td>
											<strong>11. Dịch vụ đào tạo ngoại ngữ quốc tế</strong>
											<div>
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
											<input type="checkbox" id="services_12" name="services[]" class="contact_checkox" value="12. Dịch vụ du lịch quốc tế">
										</td>
										<td>
											<strong>12. Dịch vụ du lịch quốc tế</strong>
											<div>
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
											<input type="checkbox" name="services[]" class="contact_checkox" value="13. Dịch vụ làm evisa cho người nước ngoài vào Việt Nam">
										</td>
										<td>
											<strong>13. Dịch vụ làm evisa cho người nước ngoài vào Việt Nam</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="14. Dịch vụ Công chứng hợp đồng mua bán, cho thuê">
										</td>
										<td>
											<strong>14. Dịch vụ Công chứng hợp đồng mua bán, cho thuê</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="15. Dịch vụ xin cấp Căn cước công dân">
										</td>
										<td>
											<strong>15. Dịch vụ xin cấp Căn cước công dân</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="16. Dịch vụ bán bảo hiểm du lịch quốc tế">
										</td>
										<td>
											<strong>16. Dịch vụ bán bảo hiểm du lịch quốc tế</strong>
										</td>
									</tr>
									<tr>
										<td class="td_checkbox">
											<input type="checkbox" name="services[]" class="contact_checkox" value="17. Dịch vụ sao y bản chính">
										</td>
										<td>
											<strong>17. Dịch vụ sao y bản chính</strong>
										</td>
									</tr>
									<tr style="display:none;">
										<td></td>
										<td>
											<strong class="d-block mb-3">File đính kèm</strong>
											<div class="radio_group mb-3">
												<label class="d-block radio_group_label">
													<input type="radio" name="file_option" value="upload_file" checked> Upload file
												</label>
												<p class="radio_group_note">
													Ghi chú: Phần upload này tối đa 50 Mb và chỉ chấp nhận file có đuôi .doc, .docx, .pdf, .zip
													Nếu file năng hơn 50Mb A/c vui lòng chọn Google Driver bên dưới.
												</p>
												<input type="file" name="upload_file" accept=".doc,.docx,.pdf" id="upload_file_input">
											</div>
											<div class="radio_group">
												<label class="d-block radio_group_label">
													<input type="radio" name="file_option" value="google_driver"> Google Driver
												</label>
												<p class="radio_group_note">
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
				services_7: {
					required: "Vui lòng tên quốc gia",
				},
				services_9: {
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
			},
			submitHandler: function(form) {
				if ($('input[name="services[]"]:checked').length == 0) {
					alert("Vui lòng chọn ít nhất một dịch vụ.");
					return false;
				}

				// let file_option = $('input[name="file_option"]:checked').val();
				// if (file_option == 'upload_file') {
				// 	let upload_file = $('input[name="upload_file"]').val();

				// 	if (!upload_file) {
				// 		alert("Vui lòng nhập file của bạn");
				// 		return false;
				// 	}
				// } else if (file_option == 'google_driver') {
				// 	let google_driver = $('input[name="google_driver"]').val();

				// 	if (!google_driver) {
				// 		alert("Vui lòng nhập link google driver của bạn");
				// 		return false;
				// 	}
				// }

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
							window.location.href = "<?php echo get_permalink(); ?>";
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

		$('input[name="phone"], input[name="email"]').on("change", function() {
			if ($('input[name="phone"]').val() && $('input[name="email"]').val()) {
				$(".page_contact_service").show();
			} else {
				$(".page_contact_service").hide();
			}
		});

		$('input[name="services[]"]').on('change', function() {
			var $tdGroup = $(this).closest('tr').find('.td_group');
			$tdGroup.find('input').val('');
			if ($(this).is(':checked')) {
				$tdGroup.show(); // Hiển thị ô nhập
			} else {
				$tdGroup.hide(); // Ẩn ô nhập
			}
		});

	});
</script>