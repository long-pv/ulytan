<?php

/**
 * Template name: Page form
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

<div class="secSpace page_form bg-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-5">
				<div class="page_form_wrap">
					<div class="page_form_title">
						Hãy chia sẻ góp ý để Ulytan phục vụ bạn tốt hơn!
					</div>
					<form class="page_form_form" id="page_form_form">
						<div class="wrap-input" style="height: calc(100vh - 260px); overflow: auto;">
							<?php
							$index = 1;
							if (get_field('ho_va_ten') != '0'):
							?>
								<div class="page_form_group">
									<div class="page_form_label">
										<?php echo $index; ?>. Họ và tên <span class="page_form_no_req">(Không bắt buộc)</span>
									</div>
									<input type="text" name="ho_va_ten" class="page_form_input" placeholder="Nhập họ và tên">
								</div>
							<?php
								$index++;
							endif; ?>

							<?php
							if (get_field('so_dien_thoai') != '0'):
							?>
								<div class="page_form_group">
									<div class="page_form_label">
										<?php echo $index; ?>. Số điện thoại <span class="page_form_req">*</span>
									</div>
									<input type="text" name="so_dien_thoai" class="page_form_input" placeholder="Nhập số điện thoại">
								</div>
							<?php
								$index++;
							endif;
							?>

							<?php
							if (get_field('email') != '0'):
							?>
								<div class="page_form_group">
									<div class="page_form_label">
										<?php echo $index; ?>. Email <span class="page_form_no_req">(Không bắt buộc)</span>
									</div>
									<input type="text" name="email" class="page_form_input" placeholder="Nhập email">
								</div>
							<?php
								$index++;
							endif;
							?>

							<?php
							if (get_field('ma_don_hang') != '0'):
							?>
								<div class="page_form_group">
									<div class="page_form_label">
										<?php echo $index; ?>. Mã đơn hàng <span class="page_form_req">*</span>
									</div>
									<input type="text" name="ma_don_hang" class="page_form_input" placeholder="Nhập mã đơn hàng">
								</div>
							<?php
								$index++;
							endif;
							?>

							<div class="page_form_rating">
								<div class="page_form_label">
									<?php echo $index; ?>. Đánh giá <span class="page_form_req">*</span>
								</div>

								<?php $index++; ?>

								<div class="question_group" id="question_group">
									<div class="question" data-question="1">
										<label>1. Nhân viên tư vấn</label>
										<div class="rating">
											<span class="star" data-value="5">&#9733;</span>
											<span class="star" data-value="4">&#9733;</span>
											<span class="star" data-value="3">&#9733;</span>
											<span class="star" data-value="2">&#9733;</span>
											<span class="star" data-value="1">&#9733;</span>
										</div>
										<input type="text" name="nhan_vien_tu_van" class="rating_value">
									</div>

									<div class="question" data-question="2">
										<label>2. Kế toán</label>
										<div class="rating">
											<span class="star" data-value="5">&#9733;</span>
											<span class="star" data-value="4">&#9733;</span>
											<span class="star" data-value="3">&#9733;</span>
											<span class="star" data-value="2">&#9733;</span>
											<span class="star" data-value="1">&#9733;</span>
										</div>
										<input type="text" name="ke_toan" class="rating_value">
									</div>

									<div class="question" data-question="3">
										<label>3. Nhân viên xử lý đơn hàng</label>
										<div class="rating">
											<span class="star" data-value="5">&#9733;</span>
											<span class="star" data-value="4">&#9733;</span>
											<span class="star" data-value="3">&#9733;</span>
											<span class="star" data-value="2">&#9733;</span>
											<span class="star" data-value="1">&#9733;</span>
										</div>
										<input type="text" name="nhan_vien_xu_ly_don_hang" class="rating_value">
									</div>
								</div>
							</div>

							<div class="page_form_group">
								<div class="page_form_label">
									<?php echo $index; ?>. Lý do <span class="page_form_no_req">(Không bắt buộc)</span>
								</div>
								<textarea name="ly_do" class="page_form_area"></textarea>
							</div>
						</div>
						<div class="mt-4">
							<input type="submit" class="btn-lg contact_submit page_form_submit" value="Gửi">
						</div>
					</form>
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
		// Xử lý click để chọn sao
		$(document).on('click', '.rating .star', function() {
			var $rating = $(this).closest('.rating');
			var value = $(this).data('value'); // Lấy giá trị sao được chọn
			var $question = $rating.closest('.question');

			// Lưu giá trị vào input ẩn
			$question.find('.rating_value').val(value).trigger('change');

			// Xóa trạng thái active cũ
			$rating.find('.star').removeClass('active');

			// Duyệt qua từng sao để cập nhật trạng thái active
			$rating.find('.star').each(function(index) {
				// Vì sao có giá trị lớn nhất ở bên trái, chúng ta cần đảo ngược logic so với giá trị
				if (5 - index <= value) {
					$(this).addClass('active'); // Tô sáng sao từ 5 đến sao được chọn
				}
			});
		});

		// Custom regex for email validation
		$.validator.addMethod(
			"customEmail",
			function(value, element) {
				var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
				return this.optional(element) || regex.test(value);
			},
			"Vui lòng nhập địa chỉ email hợp lệ."
		);

		$.extend($.validator.messages, {
			required: "Vui lòng nhập giá trị."
		});

		// Thêm phương thức kiểm tra tùy chỉnh
		$.validator.addMethod("phoneVN", function(value, element) {
			return this.optional(element) || /^0\d{9}$/.test(value);
		}, "Số điện thoại phải bắt đầu bằng số 0.");

		$("#page_form_form").validate({
			rules: {
				so_dien_thoai: {
					required: true,
					digits: true,
					minlength: 10,
					maxlength: 10,
					phoneVN: true,
				},
				email: {
					customEmail: true
				},
				ma_don_hang: {
					required: true,
				},
				nhan_vien_tu_van: {
					required: true,
				},
				ke_toan: {
					required: true,
				},
				nhan_vien_xu_ly_don_hang: {
					required: true,
				},
			},
			messages: {
				so_dien_thoai: {
					digits: "Chỉ được phép chứa các chữ số",
					minlength: "Số điện thoại phải có đủ 10 ký tự",
					maxlength: "Số điện thoại không được vượt quá 10 ký tự"
				},
			},
			errorPlacement: function(error, element) {
				error.appendTo(element.closest(".page_form_group, .question"));
			},
			submitHandler: function(form) {
				// Gửi AJAX request
				var formData = new FormData(form);
				formData.append("action", "save_page_form");

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
	});
</script>