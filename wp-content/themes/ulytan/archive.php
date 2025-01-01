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
										3. Địa chỉ Email*
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