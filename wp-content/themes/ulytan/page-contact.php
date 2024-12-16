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
								<a href="<?php echo $tiktok; ?>" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
									</svg>
								</a>
							<?php endif; ?>

							<?php if ($facebook): ?>
								<a href="<?php echo $facebook; ?>" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
										<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
									</svg>
								</a>
							<?php endif; ?>

							<?php if ($youtube): ?>
								<a href="<?php echo $youtube; ?>" target="_blank">
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
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_facebook">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
								<path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
							</svg>
						</a>

						<a href="https://twitter.com/home?status=<?php echo $share_link; ?>" onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;" class="social_share_post_twitter">
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