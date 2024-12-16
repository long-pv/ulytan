<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ulytan
 */

get_header();
$current_category = get_queried_object();
$term_id = $current_category->term_id;
$banner_image = get_term_meta($term_id, 'banner_image', true) ?? '';
$dich_vu_lien_quan = get_term_meta($term_id, 'dich_vu_lien_quan', true) ?? [];
$img_id = $banner_image ?: (get_field('anh_banner', 'option') ?? '');

$cat_name = '';
$cat_link = '';

function get_current_archive_url()
{
	// Trường hợp Category
	if (is_category()) {
		return get_category_link(get_queried_object_id());
	}
	// Trường hợp Tag
	elseif (is_tag()) {
		return get_tag_link(get_queried_object_id());
	}
	// Trường hợp Custom Taxonomy
	elseif (is_tax()) {
		return get_term_link(get_queried_object_id());
	}
	// Trường hợp Custom Post Type Archive
	elseif (is_post_type_archive()) {
		return get_post_type_archive_link(get_post_type());
	}
}
$cat_link = get_current_archive_url();

if (is_category() || is_tag() || is_tax()) {
	$term_name = $current_category->name;
	$cat_name = $term_name;
} elseif (is_post_type_archive()) {
	$post_type = get_query_var('post_type');
	$archive_post_type = get_post_type_object($post_type);
	$cat_name = $archive_post_type->archive_title;
}

?>

<?php if ($img_id): ?>
	<div class="cat_banner_img">
		<?php echo wp_get_attachment_image($img_id, 'full'); ?>
	</div>
<?php endif; ?>

<div class="container">
	<div class="secSpace">
		<div class="row">
			<div class="col-lg-9 mb-4 mb-lg-0">
				<h2 class="archive_cat_title">
					<span>Danh sách bài viết: </span>
					<?php
					echo $cat_name;
					?>
				</h2>

				<div class="loop_post_list">
					<?php
					// list post
					while (have_posts()):
						the_post();
					?>
						<div class="loop_post_item">
							<a href="<?php the_permalink(); ?>" class="image_link">
								<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
							</a>
							<div class="content">
								<a class="title_link" href="<?php the_permalink(); ?>">
									<h3 class="title">
										<?php the_title(); ?>
									</h3>
								</a>

								<div class="desc">
									<?php echo get_the_excerpt(); ?>
								</div>

								<div class="date">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
										</svg>
									</div>
									<span class="text">
										<?php echo get_the_date('d/m/Y'); ?>
									</span>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					?>
				</div>

				<?php pagination(); ?>
			</div>

			<div class="col-lg-3">
				<div class="sidebar_lien_he">
					<form id="page_contact_form" class="page_contact_form" enctype="multipart/form-data">
						<div class="page_contact_title">
							Giảm 10% khi đăng ký sử dụng từ 2 dịch vụ trở lên
						</div>

						<input type="hidden" name="trang_da_gui" value="<?php echo $cat_link; ?>">
						<input type="hidden" name="ten_trang" value="<?php echo $cat_name; ?>">

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
								<div class="col-12">
									<label class="contact_label" for="">
										1. Số điện thoại*
									</label>
									<input type="text" name="phone" class="contact_input" placeholder="Điền tối đa 10 số">
								</div>
								<div class="col-12">
									<label class="contact_label" for="">
										2. Địa chỉ Email*
									</label>
									<input type="text" name="email" class="contact_input" placeholder="Ví dụ: sales@ulytan.vn">
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