<?php

/**
 * Template name: Page tuyển CTV
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
		<div class="page_ctv">
			<div class="page_ctv_content editor">
				<?php the_content(); ?>
			</div>

			<form id="page_ctv_form" class="page_ctv_form" action="">
				<div class="page_ctv_form_header">
					<div class="page_ctv_form_title">
						HÃY ĐIỀN ĐẦY ĐỦ THÔNG TIN BÊN DƯỚI ĐỂ GIA NHẬP VÀO ĐỘI NGŨ DỊCH GIẢ TÀI NĂNG CỦA ULYTAN ?
					</div>
				</div>
				<div class="row row_24">
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								1. Họ và tên*
							</label>
							<input type="text" class="page_ctv_form_input" name="full_name" placeholder="Ví du:Phạm Kim Dung">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								2. Ngày sinh*
							</label>
							<input type="text" class="page_ctv_form_input" name="birthdate" placeholder="Điền dưới dạng: Ngày/Tháng/Năm">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								3. Số Mobile*
							</label>
							<input type="text" class="page_ctv_form_input" name="phone" placeholder="Điền tối đa 11 số">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								4. Địa chỉ Email*
							</label>
							<input type="text" class="page_ctv_form_input" name="email" placeholder=" Ví dụ: sales@ulytan.vn">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								5. Bạn sẽ mời người bản địa*
							</div>
							<div class="page_ctv_form_note">
								Người nói ngôn ngữ bạn đã đăng ký*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="speak_language" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="speak_language" value="Không"> Không
								</label>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								6. Trường tốt nghiệp*
							</label>
							<input type="text" class="page_ctv_form_input" name="graduation_school" placeholder="ĐH tốt nghiệp gần đây nhất">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								7. Năm tốt nghiệp*
							</label>
							<input type="text" class="page_ctv_form_input" name="graduation_year" placeholder=" Điền dưới dạng Ngày/Tháng/Năm">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								8. Đơn vị dịch thuật bạn đã từng cộng tác?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="translation_unit" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="translation_unit" value="Không"> Không
								</label>
							</div>
							<input type="text" class="page_ctv_form_input" name="translation_unit_name" placeholder=" Ví dụ: Dịch thuật Ulytan">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								9. Bạn hay tra từ điển nào ?*
							</label>
							<input type="text" class="page_ctv_form_input" name="dictionary" placeholder="Ghi ngắn gọn tên từ điển VD: Lạc Việt">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								10. Ngôn ngữ đăng ký làm CTV*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Anh"> Tiếng Anh</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Nga"> Tiếng Nga</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Pháp"> Tiếng Pháp</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Đức"> Tiếng Đức</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Nhật"> Tiếng Nhật</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Hàn Quốc"> Tiếng Hàn Quốc</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Trung Quốc"> Tiếng Trung Phồn thể</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Trung Quốc"> Tiếng Trung giản thể</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Nga"> Tiếng Nga</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Tây Ba Nha"> Tiếng Tây Ba Nha</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Bồ Ba Nha"> Bồ Ba Nha</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Italia"> Tiếng Italia</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Séc"> Tiếng Séc</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Bỉ"> Tiếng Bỉ </label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Canada "> Tiếng Canada </label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Hà Lan"> Tiếng Hà Lan</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng La Tinh"> Tiếng La Tinh</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Ba Lan"> Tiếng Ba Lan</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Ucraina"> Tiếng Ucraina</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Bungari"> Tiếng Bungari</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Belarus"> Tiếng Belarus</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Thổ Nhĩ Kỳ"> Tiếng Thổ Nhĩ Kỳ</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng A Rập"> Tiếng A Rập"</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Lào"> Tiếng Lào</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Thái Lan"> Tiếng Thái Lan</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Campuchia"> Tiếng Campuchia</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng Myanmar "> Tiếng Myanmar</label>
									<label><input type="checkbox" name="registration_language[]" value="Tiếng khác"> Tiếng khác</label>
								</div>

								<input type="text" class="page_ctv_form_hidden" name="registration_language_val">
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								11. Bạn biết Ulytan qua đâu?*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<!-- how_do_you_know -->
									<label><input type="checkbox" name="how_do_you_know[]" value="Bạn bè giới thiệu"> Bạn bè giới thiệu</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Facebook"> Facebook</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Google search"> Google search</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Email"> Email</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Youtube"> Youtube</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Báo chí"> Báo chí</label>
									<label><input type="checkbox" name="how_do_you_know[]" value="Khác"> Khác</label>
								</div>
								<input type="text" class="page_ctv_form_hidden" name="how_do_you_know_val">
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								12. Bạn biết dịch xuôi hay ngược?*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<label><input type="checkbox" name="translation_skill[]" value="Dịch xuôi"> Dịch xuôi</label>
									<label><input type="checkbox" name="translation_skill[]" value="Dịch ngược"> Dịch ngược</label>
									<label><input type="checkbox" name="translation_skill[]" value="Cả 2"> Cả 2</label>
								</div>

								<input type="text" class="page_ctv_form_hidden" name="translation_skill_val">
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								13. Chuyên ngành đăng ký làm CTV*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<label class="custom_dropdown_item" for="option1">
										<input type="checkbox" id="option1"> Tùy chọn 1
									</label>
									<label class="custom_dropdown_item" for="option2">
										<input type="checkbox" id="option2"> Tùy chọn 2
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								14. Bạn dùng phần mềm dịch thuật nào ?*
							</label>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="translation_software" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="translation_software" value="Không"> Không
								</label>
							</div>
							<input type="text" class="page_ctv_form_input" name="translation_software_name" placeholder=" Ví dụ: Dịch thuật Ulytan">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								15. Bạn có thể phiên dịch không?*
							</label>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="live_translate" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="live_translate" value="Không"> Không
								</label>
							</div>
							<div class="custom_dropdown live_translate_select">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<label><input type="checkbox" class="live_translate_select[]" value="Phiên dịch cabin"> Phiên dịch cabin</label>
									<label><input type="checkbox" class="live_translate_select[]" value="Phiên dịch song song"> Phiên dịch song song</label>
									<label><input type="checkbox" class="live_translate_select[]" value="Các loại hình khác"> Các loại hình khác</label>
								</div>

								<input type="text" class="page_ctv_form_hidden" name="live_translate_select_val">
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								16. Mô tả tóm tắt kinh nghiệm làm việc.
							</label>
							<textarea name="summary_description" class="page_ctv_form_textarea"></textarea>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								17. Bạn có hợp tác với phòng tư pháp quận, huyện nào?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="info_17" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="info_17" value="Không"> Không
								</label>
							</div>
							<div class="page_ctv_form_note">
								(Nếu cộng tác với nhiều phòng thì ghi ngắn gọn và cách nhau bởi dấu phẩy)
							</div>
							<div class="page_ctv_form_group page_ctv_form_group_info_17">
								<div class="page_ctv_form_group_item">
									<label for="" class="page_ctv_form_label">
										Phòng tư pháp thuộc tỉnh hoặc thành phố nào?
									</label>
									<input type="text" class="page_ctv_form_input" name="info_17_province" placeholder="VD: Tỉnh Vĩnh Phúc, TP Hà Nội">
								</div>
								<div class="page_ctv_form_group_item">
									<label for="" class="page_ctv_form_label">
										Phòng tư pháp thuộc quận huyện nào?
									</label>
									<input type="text" class="page_ctv_form_input" name="info_17_district" placeholder="VD: Huyện Bình Xuyên, Quận Đống Đa">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								18. Bạn có hợp tác với văn phòng công chứng tư nào ko?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="info_18" value="Có" checked> Có
								</label>
								<label>
									<input type="radio" name="info_18" value="Không"> Không
								</label>
							</div>
							<div class="page_ctv_form_note">
								(Nếu cộng tác với nhiều phòng thì ghi ngắn gọn và cách nhau bởi dấu phẩy, vd: Phòng công chứng tư Ulytan)
							</div>
							<div class="page_ctv_form_group page_ctv_form_group_info_18">
								<div class="page_ctv_form_group_item">
									<label for="" class="page_ctv_form_label">
										Phòng công chứng thuộc tỉnh hoặc thành phố nào?
									</label>
									<input type="text" class="page_ctv_form_input" name="info_18_province" placeholder="VD: Tỉnh Vĩnh Phúc, TP Hà Nội">
								</div>
								<div class="page_ctv_form_group_item">
									<label for="" class="page_ctv_form_label">
										Phòng công chứng thuộc quận huyện nào?
									</label>
									<input type="text" class="page_ctv_form_input" name="info_18_district" placeholder="VD: Huyện Bình Xuyên, Quận Đống Đa">
								</div>
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="page_ctv_form_group_file">
							<div class="page_contact_subtitle">
								Gửi tài liệu cả bản dịch lẫn bản gốc bạn đã dịch cho ULYTAN
							</div>
							<div class="mb-3">
								Chỉ gửi các file có đuôi: .doc, .docx, .pdf hoặc .zip
							</div>
							<div class="page_ctv_form_group mb-4">
								<label for="" class="page_ctv_form_label">
									Tài liệu gửi tối thiểu 10 trang :
								</label>
								<input type="file" name="upload_file_1" class="page_ctv_form_upload_file" accept=".doc,.docx,.pdf">
							</div>
							<div class="page_ctv_form_group">
								<label for="" class="page_ctv_form_label">
									Gửi cho chúng tôi hồ sơ bản scan của bạn bao gồm 1.Bằng (Nếu có), 2.Chứng minh thư, 3. CV:
								</label>
								<input type="file" name="upload_file_2" class="page_ctv_form_upload_file" accept=".doc,.docx,.pdf">
							</div>
						</div>
					</div>
				</div>
				<div class="mt-4">
					<input type="submit" class="contact_submit" value="Đăng ký">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
get_footer();
?>
<script>
	jQuery(document).ready(function($) {
		$(".custom_dropdown_button").on("click", function(e) {
			e.stopPropagation();
			var dropdownMenu = $(this).next(".custom_dropdown_menu");
			$(".custom_dropdown_menu").not(dropdownMenu).hide();

			dropdownMenu.toggle();
		});

		$(document).on("click", function() {
			$(".custom_dropdown_menu").hide();
		});

		$(".custom_dropdown_menu").on("click", function(e) {
			e.stopPropagation();
		});

		$('input[name="translation_unit"]').on('change', function() {
			if ($('input[name="translation_unit"]:checked').val() === 'Có') {
				$('input[name="translation_unit_name"]').show();
			} else {
				$('input[name="translation_unit_name"]').hide();
			}
		});

		$('input[name="translation_software"]').on('change', function() {
			if ($('input[name="translation_software"]:checked').val() === 'Có') {
				$('input[name="translation_software_name"]').show();
			} else {
				$('input[name="translation_software_name"]').hide();
			}
		});

		$('input[name="live_translate"]').on('change', function() {
			if ($('input[name="live_translate"]:checked').val() === 'Có') {
				$('.live_translate_select').show();
			} else {
				$('.live_translate_select').hide();
			}
		});

		$('input[name="info_17"]').on('change', function() {
			if ($('input[name="info_17"]:checked').val() === 'Có') {
				$('.page_ctv_form_group_info_17').show();
			} else {
				$('.page_ctv_form_group_info_17').hide();
			}
		});

		$('input[name="info_18"]').on('change', function() {
			if ($('input[name="info_18"]:checked').val() === 'Có') {
				$('.page_ctv_form_group_info_18').show();
			} else {
				$('.page_ctv_form_group_info_18').hide();
			}
		});

		$("#page_ctv_form").validate({
			rules: {
				full_name: {
					required: true,
				},
				birthdate: {
					required: true,
				},
				birthdate: {
					required: true,
				},
				phone: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				speak_language: {
					required: true,
				},
				graduation_school: {
					required: true,
				},
				graduation_year: {
					required: true,
				},
				translation_unit_name: {
					required: function() {
						return $('input[name="translation_unit"]:checked').val() == "Có" ? true : false;
					},
				},
				info_17_province: {
					required: function() {
						return $('input[name="info_17"]:checked').val() == "Có" ? true : false;
					},
				},
				info_17_district: {
					required: function() {
						return $('input[name="info_17"]:checked').val() == "Có" ? true : false;
					},
				},
				info_18_province: {
					required: function() {
						return $('input[name="info_18"]:checked').val() == "Có" ? true : false;
					},
				},
				info_18_district: {
					required: function() {
						return $('input[name="info_18"]:checked').val() == "Có" ? true : false;
					},
				},
				translation_software_name: {
					required: function() {
						return $('input[name="translation_software"]:checked').val() == "Có" ? true : false;
					},
				},
				dictionary: {
					required: true,
				},
				upload_file_1: {
					required: true,
				},
				upload_file_2: {
					required: true,
				},
				registration_language_val: {
					required: true,
				},
				live_translate_select_val: {
					required: true,
				},
				translation_skill_val: {
					required: true,
				},
				how_do_you_know_val: {
					required: true,
				},
			},
			messages: {
				// full_name: {
				// 	required: "Vui lòng nhập họ và tên",
				// },
				// birthdate: {
				// 	required: "Vui lòng nhập ngày sinh",
				// },
				// email: {
				// 	required: "Vui lòng nhập địa chỉ email của bạn",
				// 	email: "Vui lòng nhập một địa chỉ email hợp lệ"
				// },
			},
			errorPlacement: function(error, element) {
				error.appendTo(element.closest(".page_ctv_form_group, .page_ctv_form_group_item"));
			},
			submitHandler: function(form) {
				// Gửi AJAX request
				var formData = new FormData(form);
				formData.append("action", "save_form_ctv");

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

		$('.custom_dropdown').each(function() {
			var dropdown = $(this);
			dropdown.find('input[type="checkbox"]').on('change', function() {
				var selectedLanguages = [];
				dropdown.find('input[type="checkbox"]:checked').each(function() {
					selectedLanguages.push($(this).val());
				});
				dropdown.find('input.page_ctv_form_hidden').val(selectedLanguages.join(', '));
			});
		});
	});
</script>