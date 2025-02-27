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
							<input type="text" class="page_ctv_form_input" name="phone" placeholder="Điền tối đa 10 số">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								4. Địa chỉ Email*
							</label>
							<input type="text" class="page_ctv_form_input" name="email" placeholder=" Ví dụ: sale@ulytan.com">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_5" style="display:none;">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								5. Bạn sẽ mời người bản địa*
							</div>
							<div class="page_ctv_form_note">
								Người nói ngôn ngữ bạn đã đăng ký*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="speak_language" value="Có"> Có
								</label>
								<label>
									<input type="radio" name="speak_language" value="Không"> Không
								</label>
							</div>
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_6" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								6. Trường tốt nghiệp*
							</label>
							<input type="text" class="page_ctv_form_input" name="graduation_school" placeholder="ĐH tốt nghiệp gần đây nhất">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_7" style="display:none;">
						<div class=" page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								7. Năm tốt nghiệp*
							</label>
							<input type="text" class="page_ctv_form_input" name="graduation_year" placeholder=" Điền dưới dạng Ngày/Tháng/Năm">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_8" style="display:none;">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								8. Đơn vị dịch thuật bạn đã từng cộng tác?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="translation_unit" value="Có"> Đã từng
								</label>
								<label>
									<input type="radio" name="translation_unit" value="Không"> Chưa từng
								</label>
							</div>
							<input type="text" class="page_ctv_form_input" name="translation_unit_name" placeholder=" Ví dụ: Dịch thuật Ulytan">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_9" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								9. Bạn hay tra từ điển nào ?*
							</label>
							<input type="text" class="page_ctv_form_input" name="dictionary" placeholder="Ví dụ: Lạc Việt">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_10" style="display:none;">
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
					<div class="col-lg-3 page_ctv_step_11" style="display:none;">
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
					<div class="col-lg-3 page_ctv_step_12" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								12. Bạn biết dịch xuôi hay ngược?*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<label><input type="checkbox" name="translation_skill[]" value="Dịch xuôi"> Dịch xuôi</label>
									<label><input type="checkbox" name="translation_skill[]" value="Dịch ngược"> Dịch ngược</label>
									<label><input type="checkbox" name="translation_skill[]" value="Cả xuôi và ngược">Cả xuôi và ngược</label>
								</div>

								<input type="text" class="page_ctv_form_hidden" name="translation_skill_val">
							</div>
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_13" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								13. Chuyên ngành đăng ký làm CTV*
							</label>
							<div class="custom_dropdown">
								<div class="custom_dropdown_button">Chọn tùy chọn</div>
								<div class="custom_dropdown_menu">
									<div class="group-language">
										<div class="root">1.Nhóm luật</div>
										<div class="item">
											<label><input type="checkbox" name="language_speciality[]" value="Luật kinh tế"> Luật kinh tế</label>
											<label><input type="checkbox" name="language_speciality[]" value="Luật dân sự"> Luật dân sự</label>
											<label><input type="checkbox" name="language_speciality[]" value="Luật quốc tế"> Luật quốc tế</label>
										</div>
									</div>

									<div class="group-language">
										<div class="root">2.Nhóm kinh tế</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Marketing"> Marketing</label>

											<label><input type="checkbox" name="language_speciality[]" value="Tài chính - Ngân hàng"> Tài chính - Ngân hàng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kế toán"> Kế toán</label>

											<label><input type="checkbox" name="language_speciality[]" value="Bảo hiểm"> Bảo hiểm</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">3.Nhóm dược học</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Dược học"> Dược học</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">4.Nhóm y học</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Sản khoa"> Sản khoa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Nội khoa"> Nội khoa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Ngoại khoa"> Ngoại khoa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Y học cổ truyền"> Y học cổ truyền</label>

											<label><input type="checkbox" name="language_speciality[]" value="Răng-hàm-mặt"> Răng-hàm-mặt</label>

											<label><input type="checkbox" name="language_speciality[]" value="Điều dưỡng"> Điều dưỡng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật Y học"> Kỹ thuật Y học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Dinh dưỡng"> Dinh dưỡng</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">5.Công nghệ thông tin</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật máy tính"> Kỹ thuật máy tính</label>

											<label><input type="checkbox" name="language_speciality[]" value="Truyền thông và mạng máy tính"> Truyền thông và mạng máy tính</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật phần mềm"> Kỹ thuật phần mềm</label>

											<label><input type="checkbox" name="language_speciality[]" value="Hệ thống thông tin"> Hệ thống thông tin</label>

											<label><input type="checkbox" name="language_speciality[]" value="Toán-tin ứng dụng"> Toán-tin ứng dụng</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">6.Nhóm Điện-điện tử</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật điện - điện tử"> Kỹ thuật điện - điện tử</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật điều khiển tự động hóa"> Kỹ thuật điều khiển tự động hóa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật điện tử truyền thông"> Kỹ thuật điện tử truyền thông</label>

											<label><input type="checkbox" name="language_speciality[]" value="Hệ thống điện"> Hệ thống điện</label>

											<label><input type="checkbox" name="language_speciality[]" value="Nhiệt điện"> Nhiệt điện</label>

											<label><input type="checkbox" name="language_speciality[]" value="Thủy điện"> Thủy điện</label>

											<label><input type="checkbox" name="language_speciality[]" value="Năng lượng hạt nhân"> Năng lượng hạt nhân</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">7.Cơ khí</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Cơ kĩ thuật"> Cơ kĩ thuật</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ kĩ thuật ô tô"> Công nghệ kĩ thuật ô tô</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật cơ khí"> Kĩ thuật cơ khí</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật hàng không"> Kĩ thuật hàng không</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật tàu thủy"> Kĩ thuật tàu thủy</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ chế tạo máy"> Công nghệ chế tạo máy</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ kĩ thuật cơ điện tử"> Công nghệ kĩ thuật cơ điện tử</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật nồi hơi"> Kĩ thuật nồi hơi</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật nhiệt nóng"> Kĩ thuật nhiệt nóng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kĩ thuật nhiệt lạnh"> Kĩ thuật nhiệt lạnh</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">8.Nhóm Khoa học và công nghệ vật liệu</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Vật liệu Polyme"> Vật liệu Polyme</label>

											<label><input type="checkbox" name="language_speciality[]" value="Vật liệu Silicat"> Vật liệu Silicat</label>

											<label><input type="checkbox" name="language_speciality[]" value="Vật liệu kim loại - Hợp kim"> Vật liệu kim loại - Hợp kim</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">9.Nhóm công nghệ sinh học</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật sinh học"> Kỹ thuật sinh học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật môi trường"> Kỹ thuật môi trường</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ thực phẩm"> Công nghệ thực phẩm</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ sinh học"> Công nghệ sinh học</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">10.Nhóm công nghệ hóa học</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Hóa vô cơ"> Hóa vô cơ</label>

											<label><input type="checkbox" name="language_speciality[]" value="Hóa hữu cơ"> Hóa hữu cơ</label>

											<label><input type="checkbox" name="language_speciality[]" value="Hóa phân tích"> Hóa phân tích</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ in và xuất bản"> Công nghệ in và xuất bản</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ hóa dầu"> Công nghệ hóa dầu</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">11.Nhóm công nghiệp mỏ-khai khoáng</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật mỏ"> Kỹ thuật mỏ</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật tuyển khoáng"> Kỹ thuật tuyển khoáng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật địa vật lí"> Kỹ thuật địa vật lí</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật trắc địa bản đồ"> Kỹ thuật trắc địa bản đồ</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">12.Nhóm xây dựng</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kiến trúc"> Kiến trúc</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quy hoạch vùng và đô thị"> Quy hoạch vùng và đô thị</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật công trình xây dựng"> Kỹ thuật công trình xây dựng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật xây dựng công trình giao thông"> Kỹ thuật xây dựng công trình giao thông</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật xây dựng công trình cầu đường"> Kỹ thuật xây dựng công trình cầu đường</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quản lý xây dựng"> Quản lý xây dựng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kinh tế xây dựng"> Kinh tế xây dựng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật công trình biển"> Kỹ thuật công trình biển</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">13.Nhóm vật lý - kỹ thuật</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Vật lý-Kỹ thuật"> Vật lý-Kỹ thuật</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">14.Nhóm khoa học tự nhiên</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Toán học"> Toán học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Khoa học đất"> Khoa học đất</label>

											<label><input type="checkbox" name="language_speciality[]" value="Vật lý học"> Vật lý học</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">15.Nông lâm - ngư nghiệp</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Khoa học cây trồng"> Khoa học cây trồng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Bảo vệ thực vật"> Bảo vệ thực vật</label>

											<label><input type="checkbox" name="language_speciality[]" value="Nông nghiệp"> Nông nghiệp</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ rau quả và cảnh quan"> Công nghệ rau quả và cảnh quan</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ sau thu hoạch"> Công nghệ sau thu hoạch</label>

											<label><input type="checkbox" name="language_speciality[]" value="Chăn nuôi"> Chăn nuôi</label>

											<label><input type="checkbox" name="language_speciality[]" value="Thú y"> Thú y</label>

											<label><input type="checkbox" name="language_speciality[]" value="Lâm sinh"> Lâm sinh</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kinh tế nông nghiệp"> Kinh tế nông nghiệp</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quản lý tài nguyên rừng"> Quản lý tài nguyên rừng</label>

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ chế biến lâm sản"> Công nghệ chế biến lâm sản</label>

											<label><input type="checkbox" name="language_speciality[]" value="Nuôi trồng thủy sản"> Nuôi trồng thủy sản</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">16.Nhóm thủy lợi</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật tài nguyên nước"> Kỹ thuật tài nguyên nước</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật công trình biển"> Kỹ thuật công trình biển</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật thủy điện và năng lượng tái tạo"> Kỹ thuật thủy điện và năng lượng tái tạo</label>

											<label><input type="checkbox" name="language_speciality[]" value="Thủy văn"> Thủy văn</label>

											<label><input type="checkbox" name="language_speciality[]" value="Cấp thoát nước"> Cấp thoát nước</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">17.Nhóm khoa học xã hội</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Chính trị học"> Chính trị học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Lịch sử"> Lịch sử</label>

											<label><input type="checkbox" name="language_speciality[]" value="Nhân học"> Nhân học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Tâm lý học"> Tâm lý học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Triết học"> Triết học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Văn học"> Văn học</label>

											<label><input type="checkbox" name="language_speciality[]" value="Xã hội học"> Xã hội học</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">18.Nhóm truyền thông-báo chí</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Công nghệ đa phương tiện"> Công nghệ đa phương tiện</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quan hệ công chúng"> Quan hệ công chúng</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">19.Nhóm công đoàn-Nhân lực</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Bảo hộ lao động"> Bảo hộ lao động</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quản trị nhân lực"> Quản trị nhân lực</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">20.Nhóm an ninh</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Điều tra trinh sát"> Điều tra trinh sát</label>

											<label><input type="checkbox" name="language_speciality[]" value="Điều tra hình sự"> Điều tra hình sự</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quản lý nhà nước về an ninh trật tự"> Quản lý nhà nước về an ninh trật tự</label>

											<label><input type="checkbox" name="language_speciality[]" value="Kỹ thuật hình sự"> Kỹ thuật hình sự</label>

											<label><input type="checkbox" name="language_speciality[]" value="Quản lý giáo dục cải tạo phạm nhân"> Quản lý giáo dục cải tạo phạm nhân</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">21.Nhóm phòng cháy chữa cháy</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Phòng cháy chữa cháy"> Phòng cháy chữa cháy</label>

											<label><input type="checkbox" name="language_speciality[]" value="Cứu hộ"> Cứu hộ</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">22.Nhóm mỹ thuật</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Hội họa"> Hội họa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Đồ họa"> Đồ họa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Thiết kế đồ họa"> Thiết kế đồ họa</label>

											<label><input type="checkbox" name="language_speciality[]" value="Điêu khắc"> Điêu khắc</label>

											<label><input type="checkbox" name="language_speciality[]" value="Lý luận, lịch sử và phê bình mỹ thuật"> Lý luận, lịch sử và phê bình mỹ thuật</label>

											<label><input type="checkbox" name="language_speciality[]" value="Gốm"> Gốm</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">23.Nhóm thể dục, thể thao</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Giáo dục thể chất"> Giáo dục thể chất</label>

											<label><input type="checkbox" name="language_speciality[]" value="Huấn luyện thể thao"> Huấn luyện thể thao</label>

											<label><input type="checkbox" name="language_speciality[]" value="Y sinh học thể dục thể thao"> Y sinh học thể dục thể thao</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">24.Nhóm âm nhạc</div>
										<div class="item">

											<label><input type="checkbox" name="language_speciality[]" value="Sáng tác âm nhạc"> Sáng tác âm nhạc</label>

											<label><input type="checkbox" name="language_speciality[]" value="Thanh nhạc"> Thanh nhạc</label>

										</div>
									</div>

									<div class="group-language">
										<div class="root">25.Nhóm Khác</div>
										<div class="item">
											<label><input type="checkbox" name="language_speciality[]" value="Khác"> Khác</label>
										</div>
									</div>
								</div>

								<input type="text" class="page_ctv_form_hidden" name="language_speciality_val">
							</div>
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_14" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								14. Bạn có dùng phần mềm dịch thuật chuyên nghiệp nào không? *
							</label>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="translation_software" value="Có"> Có
								</label>
								<label>
									<input type="radio" name="translation_software" value="Không"> Không
								</label>
							</div>
							<input type="text" class="page_ctv_form_input" name="translation_software_name" placeholder="Ví dụ: Dịch thuật trados">
						</div>
					</div>
					<div class="col-lg-3 page_ctv_step_15" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								15. Bạn có thể phiên dịch không?*
							</label>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="live_translate" value="Có"> Có
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

					<div class="col-12 page_ctv_step_16" style="display:none;">
						<div class="page_ctv_form_group">
							<label for="" class="page_ctv_form_label">
								16. Mô tả tóm tắt kinh nghiệm làm việc.
							</label>
							<textarea name="summary_description" class="page_ctv_form_textarea" placeholder="- Năm 2012 Tốt nghiệp đại học Công Đoàn
- Năm 2014 Làm việc tại công ty Ulytan
- Năm 2019 Làm việc Tại Ngân Hàng Vietcombank
- Năm 2020 v.v."></textarea>
						</div>
					</div>

					<div class="col-lg-6 page_ctv_step_17" style="display:none;">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								17. Bạn có hợp tác với phòng tư pháp quận, huyện nào?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="info_17" value="Có"> Có
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
					<div class="col-lg-6 page_ctv_step_18" style="display:none;">
						<div class="page_ctv_form_group">
							<div class="page_ctv_form_label">
								18. Bạn có hợp tác với văn phòng công chứng tư nào ko?*
							</div>
							<div class="page_ctv_form_group_radio">
								<label>
									<input type="radio" name="info_18" value="Có"> Có
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

					<div class="col-12 page_ctv_step_19" style="display:none;">
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
				<div class="mt-4 d-flex justify-content-center">
					<input type="submit" class="contact_submit" value="Đăng ký">
				</div>
			</form>
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
		// $(".custom_dropdown_button").on("click", function(e) {
		// 	e.stopPropagation();
		// 	$(".custom_dropdown_button").removeClass('down_show');
		// 	var dropdownMenu = $(this).next(".custom_dropdown_menu");
		// 	$(".custom_dropdown_menu").not(dropdownMenu).hide();
		// 	$(this).toggleClass('down_show');
		// 	dropdownMenu.toggle();
		// });

		// $(document).on("click", function() {
		// 	$(".custom_dropdown_menu").hide();
		// 	$(".custom_dropdown_button").removeClass('down_show');
		// });

		// $(".custom_dropdown_menu").on("click", function(e) {
		// 	e.stopPropagation();
		// });

		$('input[name="translation_unit"]').on('change', function() {
			if ($('input[name="translation_unit"]:checked').val() === 'Có') {
				$('input[name="translation_unit_name"]').show();
			} else {
				$('input[name="translation_unit_name"]').hide();
				$('input[name="translation_unit_name"] ~ .error').remove();
			}
		});

		$('input[name="translation_software"]').on('change', function() {
			if ($('input[name="translation_software"]:checked').val() === 'Có') {
				$('input[name="translation_software_name"]').show();
			} else {
				$('input[name="translation_software_name"]').hide();
				$('input[name="translation_software_name"] ~ .error').remove();
			}
		});

		$('input[name="live_translate"]').on('change', function() {
			if ($('input[name="live_translate"]:checked').val() === 'Có') {
				$('.live_translate_select').show();
			} else {
				$('.live_translate_select').hide();
				$('.live_translate_select ~ .error').remove();
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
					digits: true,
					minlength: 1,
					maxlength: 10
				},
				email: {
					required: true,
					email: true
				},
				speak_language: {
					required: true,
				},
				translation_unit: {
					required: true,
				},
				translation_software: {
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
				live_translate: {
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
				language_speciality_val: {
					required: true,
				},
				info_17: {
					required: true,
				},
				info_18: {
					required: true,
				},
				summary_description: {
					required: true,
				},
			},
			messages: {
				full_name: {
					required: 'Bạn chưa nhập Họ và tên',
				},
				birthdate: {
					required: 'Bạn chưa nhập Ngày sinh',
				},
				phone: {
					required: "Bạn chưa nhập Số Mobile",
					digits: "Chỉ được phép chứa các chữ số",
					minlength: "Bạn điền số điện thoại không đúng",
					maxlength: "Bạn điền số điện thoại không đúng"
				},
				email: {
					required: 'Bạn chưa nhập  Địa chỉ Email',
					email: 'Email không đúng định dạng'
				},
				speak_language: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				translation_unit: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				translation_software: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				graduation_school: {
					required: 'Bạn chưa nhập Trường tốt nghiệp',
				},
				graduation_year: {
					required: 'Bạn chưa nhập Năm tốt nghiệp',
				},
				translation_unit_name: {
					required: 'Bạn chưa nhập Đơn vị dịch thuật bạn đã từng cộng tác',
				},
				info_17_province: {
					required: 'Bạn chưa nhập Phòng tư pháp thuộc tỉnh hoặc thành phố nào?',
				},
				info_17_district: {
					required: 'Bạn chưa nhập Phòng tư pháp thuộc quận huyện nào?',
				},
				info_18_province: {
					required: 'Bạn chưa nhập Phòng công chứng thuộc tỉnh hoặc thành phố nào?',
				},
				info_18_district: {
					required: 'Bạn chưa nhập Phòng công chứng thuộc quận huyện nào?',
				},
				translation_software_name: {
					required: 'Bạn chưa nhập Bạn dùng phần mềm dịch thuật nào',
				},
				dictionary: {
					required: 'Bạn chưa nhập Bạn hay tra từ điển nào',
				},
				upload_file_1: {
					required: 'Bạn chưa nhập File',
				},
				upload_file_2: {
					required: 'Bạn chưa nhập File',
				},
				registration_language_val: {
					required: 'Bạn chưa nhập Ngôn ngữ đăng ký làm CTV',
				},
				live_translate: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				live_translate_select_val: {
					required: 'Bạn chưa nhập Bạn có thể phiên dịch không',
				},
				translation_skill_val: {
					required: 'Bạn chưa nhập Bạn biết dịch xuôi hay ngược',
				},
				how_do_you_know_val: {
					required: 'Bạn chưa nhập Bạn biết Ulytan qua đâu',
				},
				language_speciality_val: {
					required: 'Bạn chưa nhập Chuyên ngành đăng ký làm CTV',
				},
				info_17: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				info_18: {
					required: 'Bạn chưa nhập lựa chọn nào',
				},
				summary_description: {
					required: 'Bạn chưa nhập nội dung',
				},
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
							$('#modal_lien_he').modal('show');
							$("#page_ctv_form")[0].reset();
							<?php
							// $ctv_thanh_cong = get_field('ctv_thanh_cong', 'option') ?? '';
							// if ($ctv_thanh_cong) {
							// 	echo 'window.location.href = "' . get_permalink($ctv_thanh_cong) . '";';
							// } else {
							// 	echo 'window.location.href = "' . get_permalink() . '";';
							// }
							?>
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
				dropdown.find('input.page_ctv_form_hidden').val(selectedLanguages.join(', ')).trigger('change');
			});
		});

		// logic form
		$('input[name="email"], input[name="full_name"], input[name="birthdate"], input[name="phone"]').on('input', function() {
			let full_name = $('input[name="full_name"]').val();
			let birthdate = $('input[name="birthdate"]').val();
			let phone = $('input[name="phone"]').val();
			let email = $('input[name="email"]').val();

			if (full_name && birthdate && phone && email) {
				$('.page_ctv_step_5').show();
			}
		});
		$('.page_ctv_step_5').on('click', function() {
			$('.page_ctv_step_6').show();
		});
		$('input[name="graduation_school"]').on('input', function() {
			if ($(this).val()) {
				$('.page_ctv_step_7').show();
			}
		});
		$('input[name="graduation_year"]').on('input', function() {
			if ($(this).val()) {
				$('.page_ctv_step_8').show();
			}
		});
		// page_ctv_step_8
		$('.page_ctv_step_8').on('click', function() {
			$('.page_ctv_step_9').show();
		});
		$('input[name="dictionary"]').on('input', function() {
			if ($(this).val()) {
				$('.page_ctv_step_10').show();
			}
		});
		$('input[name="registration_language_val"]').on('change', function() {
			if ($(this).val()) {
				$('.page_ctv_step_11').show();
			}
		});
		$('input[name="how_do_you_know_val"]').on('change', function() {
			if ($(this).val()) {
				$('.page_ctv_step_12').show();
			}
		});
		$('input[name="translation_skill_val"]').on('change', function() {
			if ($(this).val()) {
				$('.page_ctv_step_13').show();
			}
		});
		$('input[name="language_speciality_val"]').on('change', function() {
			if ($(this).val()) {
				$('.page_ctv_step_14').show();
			}
		});
		// page_ctv_step_14
		$('.page_ctv_step_14').on('click', function() {
			$('.page_ctv_step_15').show();
		});
		$('.page_ctv_step_15').on('click', function() {
			$('.page_ctv_step_16').show();
		});
		$('.page_ctv_form_textarea').on('input', function() {
			$('.page_ctv_step_17').show();
		});
		$('.page_ctv_step_17').on('click', function() {
			$('.page_ctv_step_18').show();
		});
		$('.page_ctv_step_18').on('click', function() {
			$('.page_ctv_step_19').show();
		});
	});
</script>