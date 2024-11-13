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
					<form id="page_contact_form" class="page_contact_form">
						<h2 class="page_contact_title">
							XIN MỜI ĐIỀN THÔNG TIN ĐỂ NHẬN ĐƯỢC GIÁ KHUYẾN MÃI.
						</h2>
						<div class="page_contact_info">
							<div class="page_contact_subtitle">
								Thông tin cá nhân
							</div>

							<div class="row row_16">
								<div class="col-lg-6">
									<input type="text" name="phone">
								</div>
								<div class="col-lg-6">
									<input type="text" name="email">
								</div>
							</div>
						</div>

						<div class="page_contact_service">
							<div class="page_contact_subtitle">
								Bạn sử dụng dịch vụ nào sau đây
							</div>

							<table class="page_contact_service_table">
								<thead>
									<tr>
										<th>Cột 1</th>
										<th>Cột 2</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Hàng 1, Cột 1</td>
										<td>Hàng 1, Cột 2</td>
									</tr>
									<tr>
										<td>Hàng 2, Cột 1</td>
										<td>Hàng 2, Cột 2</td>
									</tr>
									<tr>
										<td>Hàng 3, Cột 1</td>
										<td>Hàng 3, Cột 2</td>
									</tr>
									<tr>
										<td>Hàng 4, Cột 1</td>
										<td>Hàng 4, Cột 2</td>
									</tr>
									<tr>
										<td>Hàng 5, Cột 1</td>
										<td>Hàng 5, Cột 2</td>
									</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>
				<div class="col-lg-4">
					<div class="page_contact_sidebar">
						<h2 class="page_contact_sidebar_head">
							GIỚI THIỆU CHUNG VỀ ULYTAN
						</h2>

						<div class="video">
							<?php
							$iframe_youtube = get_field('iframe_youtube') ?? '';
							$iframe = getYoutubeEmbedUrl($iframe_youtube);
							?>
							<iframe src="<?php echo $iframe; ?>?autoplay=0&mute=1&modestbranding=1&showinfo=0" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
						</div>

						<div class="page_contact_sidebar_content editor">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
