<?php
// Setup theme setting page
if (function_exists('acf_add_options_page')) {
	$name_option = 'Theme Settings';
	acf_add_options_page(
		array(
			'page_title' => $name_option,
			'menu_title' => $name_option,
			'menu_slug' => 'theme-settings',
			'capability' => 'edit_posts',
			'redirect' => false,
			'position' => 80
		)
	);
}

/**
 * Add Recommended size image to Featured Image Box    
 */
add_filter('admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction($html)
{
	if (get_post_type() === 'post') {
		$html .= '<p>Recommended size: 300x300</p>';
	}

	return $html;
}


function activate_my_plugins()
{
	$plugins = [
		'advanced-custom-fields-pro\acf.php',
		'classic-editor\classic-editor.php',
		'wp-mail-smtp\wp_mail_smtp.php',
	];

	foreach ($plugins as $plugin) {
		$plugin_path = WP_PLUGIN_DIR . '/' . $plugin;

		if (file_exists($plugin_path) && !is_plugin_active($plugin)) {
			activate_plugin($plugin);
		}
	}
}
add_action('admin_init', 'activate_my_plugins');

// stop upgrading wp cerber plugin
add_filter('site_transient_update_plugins', 'disable_plugins_update');
function disable_plugins_update($value)
{
	// disable acf pro
	if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
		unset($value->response['advanced-custom-fields-pro/acf.php']);
	}

	// disable All-in-One WP Migration
	if (isset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php'])) {
		unset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php']);
	}
	return $value;
}

/**
 * auto update plugin
 */
add_filter('auto_update_plugin', '__return_false');

function video_popup($src_iframe, $thumb = null)
{
	$url = getYoutubeEmbedUrl($src_iframe);
?>
	<div class="videoBlock">
		<div class="videoBlock__inner">
			<img class="videoBlock__img" src="<?php echo $thumb; ?>">
			<div class="videoBlock__overlay"></div>
			<div class="videoBlock__videoAction">
				<a href="javascript:void(0);" class="videoBlock__playAction" data-toggle="modal" data-target="#videoUrl"
					data-src="<?php echo $url; ?>">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9l0-176c0-8.7 4.7-16.7 12.3-20.9z" />
					</svg>
				</a>
			</div>
		</div>
	</div>
	<?php
}

function getYoutubeEmbedUrl($input)
{
	if (filter_var($input, FILTER_VALIDATE_URL)) {
		return $input;
	}

	if (preg_match('/<iframe[^>]+src=["\']([^"\']+)["\']/i', $input, $matches)) {
		$url = $matches[1];
		$parsedUrl = parse_url($url);
		$cleanUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];

		return $cleanUrl;
	}

	return NO_IMAGE;
}

function register_cpt_post_types()
{
	$cpt_list = [
		'service' => [
			'labels' => __('Dịch vụ', 'basetheme'),
			'slug' => 'dich-vu',
			'cap' => false,
			'hierarchical' => false
		],
		'video_customer' => [
			'labels' => __('Video khách hàng', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'notarization' => [
			'labels' => __('Dịch công chứng', 'basetheme'),
			'slug' => 'dich-cong-chung',
			'cap' => false,
			'hierarchical' => false
		],
		'faqs' => [
			'labels' => __('Câu hỏi thường gặp', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'contact_info' => [
			'labels' => __('Form 1 - Liên hệ (ulytan.com/lien-he/)', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'form_ctv' => [
			'labels' => __('Form 2 - Cộng tác viên (ulytan.com/tuyen-cong-tac-vien/)', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'form_contribute' => [
			'labels' => __('Form 3 - Đóng góp ý kiến', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
	];

	foreach ($cpt_list as $post_type => $data) {
		register_cpt($post_type, $data);
	}
}
add_action('init', 'register_cpt_post_types');

function register_cpt($post_type, $data = [])
{
	$hierarchical = !empty($data['hierarchical']) ? $data['hierarchical'] : false;
	$attributes = $hierarchical == true ? 'page-attributes' : '';

	$labels = [
		'name' => $data['labels'],
		'singular_name' => $data['labels'],
		'menu_name' => $data['labels'],
	];

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'rewrite'            => array(
			'slug'       => $data['slug'] ?? $post_type,
			'with_front' => false,
			'hierarchical' => true,
		),
		'menu_position' => 61,
		'supports'           => array('title', 'editor', 'thumbnail', 'revisions', 'author', $attributes),
		'show_in_nav_menus'  => true,
		'show_ui'            => true,
		'menu_icon'          => 'dashicons-admin-post',
		'archive_title' => $data['labels'],
	);

	if (!empty($data['tax'])) {
		$args['taxonomies'] = $data['tax'];
	}

	if (!empty($data['cap'])) {
		$capabilities = [
			'create_posts' => 'create_' . $post_type,
			'delete_others_posts' => 'delete_' . $post_type,
			'delete_posts' => 'delete_' . $post_type,
			'delete_private_posts' => 'delete_private_' . $post_type,
			'delete_published_posts' => 'delete_published_' . $post_type,
			'edit_others_posts' => 'edit_others_' . $post_type,
			'edit_posts' => 'edit_' . $post_type,
			'edit_private_posts' => 'edit_private_' . $post_type,
			'edit_published_posts' => 'edit_published_' . $post_type,
			'publish_posts' => 'publish_' . $post_type,
			'read_private_posts' => 'read_private_' . $post_type,
		];
		$args['capabilities'] = $capabilities;
	}

	register_post_type($post_type, $args);
}

function img_url($img = '', $size = 'medium')
{
	$size = strtolower($size);

	if (empty($size) || !in_array($size, ['thumbnail', 'medium', 'large', 'full'])) {
		$size = 'medium';
	}

	if (is_array($img) && !empty($img['ID'])) {
		$url = wp_get_attachment_image_url($img['ID'], $size);
	} elseif (is_numeric($img)) {
		$url = wp_get_attachment_image_url($img, $size);
	} elseif (filter_var($img, FILTER_VALIDATE_URL)) {
		$id = attachment_url_to_postid($img);
		$url = $id ? wp_get_attachment_image_url($id, $size) : $img;
	} else {
		$url = '';
	}
	return $url ?: NO_IMAGE;
}

/*
 * Set post views count using post meta
 */
function set_post_views($postID)
{
	$countKey = 'post_views_count';
	$count = get_post_meta($postID, $countKey, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '1');
	} else {
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}

function pagination($query = null)
{
	global $wp_query;
	$max_pages = $query ? $query->max_num_pages : $wp_query->max_num_pages;

	echo '<div class="pagination">';
	echo paginate_links(
		array(
			'total' => $max_pages,
			'current' => max(1, get_query_var('paged')),
			'end_size' => 2,
			'mid_size' => 1,
			'prev_text' => __('Trước', 'basetheme'),
			'next_text' => __('Sau', 'basetheme'),
		)
	);
	echo '</div>';

	wp_reset_postdata();
}


/**
 * Breadcrumbs
 */
function wp_breadcrumbs()
{
	$delimiter = '
	<span class="icon">
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M6.6665 11.3333L9.72861 8.58922C10.0902 8.26515 10.0902 7.73485 9.72861 7.41077L6.6665 4.66666" stroke="#818181" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</span>
	';

	$home = __('Trang chủ', 'basetheme');
	$before = '<span class="current">';
	$after = '</span>';
	if (!is_admin() && !is_home() && (!is_front_page() || is_paged())) {

		global $post;

		echo '<nav>';
		echo '<div id="breadcrumbs" class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';

		$homeLink = home_url();
		echo '<a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . ' ';

		switch (true) {
			case is_category() || is_tag() || is_tax():
				$cat_obj = get_queried_object();
				echo $before . $cat_obj->name . $after;
				break;

			case is_archive():
				$post_type = get_query_var('post_type');
				$archive_post_type = get_post_type_object($post_type);
				echo $before . $archive_post_type->archive_title . $after;
				break;

			case is_single() && !is_attachment():
				$post_type = $post->post_type;

				if ($post_type == 'post') {
					$categories = get_the_category($post->ID);

					if (!empty($categories)) {
						$first_category = $categories[0];
						echo '<a aria-label="' . $first_category->name . '" href="' . get_category_link($first_category->term_id) . '">' . $first_category->name . '</a>' . $delimiter . ' ';
					}
				}

				if ($post_type == 'product') {
					$categories = get_the_terms($post->ID, 'product_cat');

					if (!empty($categories)) {
						$first_category = $categories[0];
						echo '<a aria-label="' . $first_category->name . '" href="' . get_term_link($first_category->term_id, 'product_cat') . '">' . $first_category->name . '</a>' . $delimiter . ' ';
					}
				}

				echo $before . $post->post_title . $after;
				break;

			case is_page():
				if ($post->post_parent) {
					$parent_id = $post->ID;
					echo generate_page_parent($parent_id, $delimiter);
				}

				echo $before . get_the_title() . $after;
				break;

			case is_search():
				echo $before . 'Search' . $after;
				break;

			case is_404():
				echo $before . 'Error 404' . $after;
				break;
		}

		echo '</div>';
		echo '</nav>';
	}
} // end wp_breadcrumbs()

// Generate breadcrumbs ancestor page
function generate_page_parent($parent_id, $delimiter)
{
	$breadcrumbs = [];
	$output = '';

	while ($parent_id) {
		$page = get_post($parent_id);
		$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		$parent_id = $page->post_parent;
	}


	$breadcrumbs = array_reverse($breadcrumbs);
	array_pop($breadcrumbs);

	foreach ($breadcrumbs as $crumb) {
		$output .= $crumb . $delimiter;
	}

	return rtrim($output);
}

function custom_posts_per_page_archive($query)
{
	if (!is_admin() && $query->is_archive() && $query->is_main_query()) {
		$query->set('posts_per_page', 5);
	}
}
add_action('pre_get_posts', 'custom_posts_per_page_archive');

function custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function force_comments_open($open, $post_id)
{
	return true;
}
add_filter('comments_open', 'force_comments_open', 10, 2);

function custom_comment_form_fields($fields)
{
	$fields['author'] = '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>' .
		'<input id="author" name="author" type="text" value="" size="30" required="required" /></p>';

	$fields['email'] = '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>' .
		'<input id="email" name="email" type="email" value="" size="30" required="required" /></p>';

	$fields['url'] = '';

	return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_form_fields');

function custom_comment_form_title($defaults)
{
	$defaults['title_reply'] = 'Viết bình luận';
	return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_title');

function remove_comment_form_email_notice($defaults)
{
	$defaults['comment_notes_before'] = '';

	return $defaults;
}
add_filter('comment_form_defaults', 'remove_comment_form_email_notice');

function remove_comment_form_cookies_consent($fields)
{
	if (isset($fields['cookies'])) {
		unset($fields['cookies']);
	}
	return $fields;
}
add_filter('comment_form_fields', 'remove_comment_form_cookies_consent');

function change_comment_form_submit_button_text($defaults)
{
	$defaults['label_submit'] = 'Gửi bình luận';
	return $defaults;
}
add_filter('comment_form_defaults', 'change_comment_form_submit_button_text');

function add_custom_cf7_script()
{
	if (!is_admin() && class_exists('WPCF7')) {
	?>
		<!-- contact form 7 custom -->
		<style>
			.wpcf7-pointer-events {
				pointer-events: none !important;
			}
		</style>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".wpcf7-form").on("submit", function() {
					$('input[type="submit"]').addClass("wpcf7-pointer-events");
				});

				document.addEventListener(
					"wpcf7submit",
					function(event) {
						$('input[type="submit"]').removeClass("wpcf7-pointer-events");
					},
					false
				);
			});
		</script>
		<!-- end -->
	<?php
	}
}
add_action('wp_footer', 'add_custom_cf7_script', 99);

function accordion($data = [])
{
	if ($data):
		$key_id = mt_rand(1000, 9999);
		$accordion_id = 'accordion_' . $key_id;
		$index = 1;
	?>
		<div class="accordion" id="<?php echo $accordion_id; ?>">
			<?php
			foreach ($data as $key => $item):
				if ($item['title'] && $item['content']):
					$collapse = 'collapse_' . $key_id . '_' . $key;
					$heading = 'heading_' . $key_id . '_' . $key;
					// $expanded = ($index == 1) ? 'true' : 'false';
					$expanded = 'false';
					$attr_button = 'type="button" data-toggle="collapse" data-target="#' . $collapse . '" aria-controls="' . $collapse . '"';
					$attr_collapse = 'id="' . $collapse . '" aria-labelledby="' . $heading . '" data-parent="#' . $accordion_id . '"';
			?>
					<div class="accordion__item">
						<div class="accordion__header" id="<?php echo $heading; ?>">
							<button class="accordion__btn" aria-expanded="<?php echo $expanded; ?>" <?php echo $attr_button; ?>>
								<?php echo $item['title']; ?>
							</button>
						</div>

						<div class="collapse" <?php echo $attr_collapse; ?>>
							<div class="accordion__body editor">
								<?php echo $item['content']; ?>
							</div>
						</div>
					</div>
			<?php
					$index++;
				endif;
			endforeach;
			?>
		</div>
		<?php
	endif;
}

function filter_search_to_posts_only($query)
{
	if ($query->is_search && !is_admin() && $query->is_main_query()) {
		$query->set('post_type', array('post', 'service'));
		$query->set('posts_per_page', 25);
	}
}
add_action('pre_get_posts', 'filter_search_to_posts_only');

// The function "write_log" is used to write debug logs to a file in PHP.
function write_log($log = null, $title = 'Debug')
{
	if ($log) {
		if (is_array($log) || is_object($log)) {
			$log = print_r($log, true);
		}

		$timestamp = date('Y-m-d H:i:s');
		$text = '[' . $timestamp . '] : ' . $title . ' - Log: ' . $log . "\n";
		$log_file = WP_CONTENT_DIR . '/debug.log';
		$file_handle = fopen($log_file, 'a');
		fwrite($file_handle, $text);
		fclose($file_handle);
	}
}

// Hook để xử lý yêu cầu AJAX
add_action('wp_ajax_save_contact_info', 'save_contact_info');
add_action('wp_ajax_nopriv_save_contact_info', 'save_contact_info'); // Để cho phép người dùng chưa đăng nhập

function save_contact_info()
{
	// Lấy dữ liệu từ AJAX
	if (!empty($_POST)) {
		$data = $_POST;
		$subject = 'Form 1 - Liên hệ';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$message = 'Thông tin cá nhân:<br>';
		$message .= 'Email: ' . $data['email'] . '<br>';
		$message .= 'Số điện thoại: ' . $data['phone'] . '<br>';
		wp_mail('Sales@ulytan.com', $subject, $message, $headers);
		wp_mail('xuandxop@gmail.com', $subject, $message, $headers);

		$new_post = array(
			'post_type'   => 'contact_info',
			'post_title'  => sanitize_text_field($data['email'] . ' - ' . $data['ten_trang']),
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($new_post);

		if ($post_id) {
			if (function_exists('update_field')) {
				$services =  implode(', ', $data['services']) ?? '';
				update_field('phone', sanitize_text_field($data['phone']), $post_id);
				update_field('email', sanitize_text_field($data['email']), $post_id);
				update_field('services_list',   sanitize_text_field((string) $services), $post_id);
				update_field('services_2', sanitize_text_field($data['services_2']), $post_id);
				update_field('services_10', sanitize_text_field($data['services_10']), $post_id);
				update_field('services_11', sanitize_text_field($data['services_11']), $post_id);
				update_field('services_12', sanitize_text_field($data['services_12']), $post_id);
				update_field('services_13', sanitize_text_field($data['services_13']), $post_id);
				update_field('trang_da_gui', sanitize_text_field($data['trang_da_gui']), $post_id);
			}

			wp_send_json_success(array('message' => 'Thông tin đã được lưu thành công!'));
		} else {
			wp_send_json_error(array('message' => 'Không thể lưu thông tin'));
		}
	} else {
		wp_send_json_error(array('message' => 'Dữ liệu không hợp lệ'));
	}
	wp_die();
}


// Hook để xử lý yêu cầu AJAX
add_action('wp_ajax_save_form_ctv', 'save_form_ctv');
add_action('wp_ajax_nopriv_save_form_ctv', 'save_form_ctv'); // Để cho phép người dùng chưa đăng nhập

function save_form_ctv()
{
	// Lấy dữ liệu từ AJAX
	if (!empty($_POST)) {
		$data = $_POST;
		$subject = 'Form 2 - Cộng tác viên';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$message = 'Thông tin cá nhân:<br>';
		$message .= 'Email: ' . $data['email'] . '<br>';
		$message .= 'Số điện thoại: ' . $data['phone'] . '<br>';
		wp_mail('hr@ulytan.com', $subject, $message, $headers);
		wp_mail('xuandxop@gmail.com', $subject, $message, $headers);

		$new_post = array(
			'post_type'   => 'form_ctv',
			'post_title'  => sanitize_text_field($data['phone'] . ' - ' . $data['email']),
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($new_post);

		if ($post_id) {
			// Cập nhật ACF fields
			if (function_exists('update_field')) {
				update_field('full_name', sanitize_text_field($data['full_name']), $post_id);
				update_field('birthdate', sanitize_text_field($data['birthdate']), $post_id);
				update_field('phone', sanitize_text_field($data['phone']), $post_id);
				update_field('email', sanitize_text_field($data['email']), $post_id);
				update_field('speak_language', sanitize_text_field($data['speak_language']), $post_id);
				update_field('graduation_school', sanitize_text_field($data['graduation_school']), $post_id);
				update_field('graduation_year', sanitize_text_field($data['graduation_year']), $post_id);
				update_field('translation_unit', sanitize_text_field($data['translation_unit']), $post_id);
				update_field('translation_unit_name', sanitize_text_field($data['translation_unit_name']), $post_id);
				update_field('dictionary', sanitize_text_field($data['dictionary']), $post_id);
				update_field('registration_language_val', sanitize_text_field($data['registration_language_val']), $post_id);
				update_field('how_do_you_know_val', sanitize_text_field($data['how_do_you_know_val']), $post_id);
				update_field('translation_skill_val', sanitize_text_field($data['translation_skill_val']), $post_id);
				update_field('translation_software', sanitize_text_field($data['translation_software']), $post_id);
				update_field('translation_software_name', sanitize_text_field($data['translation_software_name']), $post_id);
				update_field('live_translate', sanitize_text_field($data['live_translate']), $post_id);
				update_field('live_translate_select_val', sanitize_text_field($data['live_translate_select_val']), $post_id);
				update_field('summary_description', sanitize_text_field($data['summary_description']), $post_id);
				update_field('info_17', sanitize_text_field($data['info_17']), $post_id);
				update_field('info_17_province', sanitize_text_field($data['info_17_province']), $post_id);
				update_field('info_17_district', sanitize_text_field($data['info_17_district']), $post_id);
				update_field('info_18', sanitize_text_field($data['info_18']), $post_id);
				update_field('info_18_province', sanitize_text_field($data['info_18_province']), $post_id);
				update_field('info_18_district', sanitize_text_field($data['info_18_district']), $post_id);
				update_field('language_speciality_val', sanitize_text_field($data['language_speciality_val']), $post_id);

				if (isset($_FILES['upload_file_1']) && !empty($_FILES['upload_file_1']['name'])) {
					$file = $_FILES['upload_file_1'];
					$upload = wp_handle_upload($file, array('test_form' => false));

					if (isset($upload['file'])) {
						$file_url = $upload['url'];
						update_field('upload_file_1', $file_url, $post_id);
					}
				}

				if (isset($_FILES['upload_file_2']) && !empty($_FILES['upload_file_2']['name'])) {
					$file = $_FILES['upload_file_2'];
					$upload = wp_handle_upload($file, array('test_form' => false));

					if (isset($upload['file'])) {
						$file_url = $upload['url'];
						update_field('upload_file_2', $file_url, $post_id);
					}
				}
			}

			wp_send_json_success(array('message' => 'Thông tin đã được lưu thành công!'));
		} else {
			wp_send_json_error(array('message' => 'Không thể lưu thông tin'));
		}
	} else {
		wp_send_json_error(array('message' => 'Dữ liệu không hợp lệ'));
	}
	wp_die();
}


// Hook để xử lý yêu cầu AJAX
add_action('wp_ajax_save_page_form', 'save_page_form');
add_action('wp_ajax_nopriv_save_page_form', 'save_page_form'); // Để cho phép người dùng chưa đăng nhập

function save_page_form()
{
	// Lấy dữ liệu từ AJAX
	if (!empty($_POST)) {
		$data = $_POST;

		if (isset($data['email']) && is_email($data['email'])) {
			$to = $data['email'];
			$subject = 'Thư cảm ơn.';
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$message = 'Cảm ơn quý khách đã đóng góp ý kiến.';

			wp_mail($to, $subject, $message, $headers);
		}

		$new_post = array(
			'post_type'   => 'form_contribute',
			'post_title'  => sanitize_text_field($data['email'] ?? 'No Email'),
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($new_post);

		if ($post_id) {
			// Cập nhật ACF fields
			if (function_exists('update_field')) {
				update_field('ho_va_ten', sanitize_text_field($data['ho_va_ten'] ?? ''), $post_id);
				update_field('so_dien_thoai', sanitize_text_field($data['so_dien_thoai'] ?? ''), $post_id);
				update_field('email', sanitize_text_field($data['email'] ?? ''), $post_id);
				update_field('ma_don_hang', sanitize_text_field($data['ma_don_hang'] ?? ''), $post_id);
				update_field('nhan_vien_tu_van', sanitize_text_field($data['nhan_vien_tu_van'] ?? ''), $post_id);
				update_field('ke_toan', sanitize_text_field($data['ke_toan'] ?? ''), $post_id);
				update_field('nhan_vien_xu_ly_don_hang', sanitize_text_field($data['nhan_vien_xu_ly_don_hang'] ?? ''), $post_id);
				update_field('ly_do', sanitize_text_field($data['ly_do'] ?? ''), $post_id);
			}

			wp_send_json_success(array('message' => 'Thông tin đã được lưu thành công!'));
		} else {
			wp_send_json_error(array('message' => 'Không thể lưu thông tin'));
		}
	} else {
		wp_send_json_error(array('message' => 'Dữ liệu không hợp lệ'));
	}
	wp_die();
}


add_action('wp_ajax_ajax_pagination_load_post', 'ajax_pagination_load_post');
add_action('wp_ajax_nopriv_ajax_pagination_load_post', 'ajax_pagination_load_post');

function ajax_pagination_load_post()
{
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

	$args = array(
		'post_type' => 'notarization',
		'posts_per_page' => 4,
		'paged' => $paged,
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) :
		while ($query->have_posts()):
			$query->the_post();
		?>
			<li>
				<a class="notarized_translation_news_item" href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</li>
	<?php
		endwhile;
	endif;
	wp_die();
}


add_action('wp_ajax_ajax_pagination', 'ajax_pagination_handler');
add_action('wp_ajax_nopriv_ajax_pagination', 'ajax_pagination_handler');
function ajax_pagination_handler()
{
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

	$args = array(
		'post_type' => 'notarization',
		'posts_per_page' => 4,
		'paged' => $paged,
	);
	$query = new WP_Query($args);

	echo paginate_links(
		array(
			'total'     => $query->max_num_pages,
			'current'   => $paged,
			'end_size' => 2,
			'mid_size' => 1,
			'prev_text' => __('Trước', 'basetheme'),
			'next_text' => __('Sau', 'basetheme'),
		)
	);
	wp_die();
}

add_action('wp_ajax_handle_reaction', 'handle_reaction');
add_action('wp_ajax_nopriv_handle_reaction', 'handle_reaction');
function handle_reaction()
{
	$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
	$reaction_type = isset($_POST['reaction_type']) ? sanitize_text_field($_POST['reaction_type']) : '';

	if (!$post_id || !in_array($reaction_type, ['like', 'dislike'])) {
		wp_send_json_error(['message' => 'Dữ liệu không hợp lệ']);
	}

	$like_meta_key = 'likes';
	$dislike_meta_key = 'dislikes';
	$session_key = "reaction_$post_id";

	// Kiểm tra trạng thái hiện tại
	$current_reaction = isset($_COOKIE[$session_key]) ? $_COOKIE[$session_key] : '';

	// Nếu trạng thái cũ khác với trạng thái hiện tại, cập nhật
	if ($current_reaction !== $reaction_type) {
		// Giảm số lượng trạng thái cũ (nếu có)
		if ($current_reaction === 'like') {
			$current_likes = get_post_meta($post_id, $like_meta_key, true) ?: 0;
			update_post_meta($post_id, $like_meta_key, max(0, $current_likes - 1));
		} elseif ($current_reaction === 'dislike') {
			$current_dislikes = get_post_meta($post_id, $dislike_meta_key, true) ?: 0;
			update_post_meta($post_id, $dislike_meta_key, max(0, $current_dislikes - 1));
		}

		// Tăng số lượng trạng thái mới
		if ($reaction_type === 'like') {
			$current_likes = get_post_meta($post_id, $like_meta_key, true) ?: 0;
			update_post_meta($post_id, $like_meta_key, $current_likes + 1);
		} elseif ($reaction_type === 'dislike') {
			$current_dislikes = get_post_meta($post_id, $dislike_meta_key, true) ?: 0;
			update_post_meta($post_id, $dislike_meta_key, $current_dislikes + 1);
		}

		// Ghi nhận trạng thái tương tác
		setcookie($session_key, $reaction_type, time() + (3600 * 24 * 30), '/');
	} else {
		wp_send_json_error(['message' => 'Trạng thái đã được cập nhật từ trước.']);
	}

	// Trả về số lượng cập nhật
	wp_send_json_success([
		'likes' => get_post_meta($post_id, $like_meta_key, true) ?: 0,
		'dislikes' => get_post_meta($post_id, $dislike_meta_key, true) ?: 0,
	]);
}

add_filter('acf/prepare_field', function ($field) {
	// Danh sách post type muốn áp dụng
	$restricted_post_types = ['form_ctv', 'contact_info', 'form_contribute'];

	// Kiểm tra nếu đang trong trang chỉnh sửa bài viết
	if (is_admin() && isset($_GET['post'])) {
		$post_id = $_GET['post'];
		$post_type = get_post_type($post_id);

		// Nếu post type nằm trong danh sách, đặt trường thành read-only
		if (in_array($post_type, $restricted_post_types)) {
			if (in_array($field['type'], ['text', 'textarea'])) {
				$field['readonly'] = true; // Tắt chỉnh sửa
			}
		}
	}

	return $field;
});

add_filter('get_user_metadata', function ($null, $object_id, $meta_key) {
	if ($meta_key === 'locale') {
		return false;
	}
	return $null;
}, 10, 3);

add_action('admin_head', function () {
	echo '<style>
        .user-language-wrap {
            display: none !important;
        }
    </style>';
});

add_action('admin_footer', function () {
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#toplevel_page_cfdb7-list .wp-menu-name').text('Form 4 - Tài liệu/ Tư vấn / Khuyến mãi');
			$('#menu-pages .wp-menu-name').text('Loại trang');
		});
	</script>
	<?php
});

function replace_comment_email_with_phone($fields)
{
	// Thêm trường nhập số điện thoại
	$fields['phone'] = '<p class="comment-form-phone_field"><label for="phone">' . __('Số điện thoại') . ' <span class="required">*</span></label><input id="phone" name="phone" type="tel" value="" size="30" /></p>';

	return $fields;
}
add_filter('comment_form_default_fields', 'replace_comment_email_with_phone');

// Lưu số điện thoại vào cơ sở dữ liệu khi người dùng gửi bình luận
function save_comment_phone_field($comment_id)
{
	if (isset($_POST['phone'])) {
		$phone = sanitize_text_field($_POST['phone']);
		add_comment_meta($comment_id, '_phone', $phone);
	}
}
add_action('comment_post', 'save_comment_phone_field');

// Hiển thị số điện thoại trong phần bình luận
function display_comment_phone($comment_text, $comment)
{
	$phone = get_comment_meta($comment->comment_ID, '_phone', true);
	if ($phone) {
		$comment_text .= '<p class="_comment_phone">Số điện thoại: ' . esc_html($phone) . '</p>';
	}
	return $comment_text;
}
add_filter('comment_text', 'display_comment_phone', 10, 2);

function add_dropdown_arrow_to_menu($items, $args)
{
	if (!empty($args->theme_location)) {
		$items = preg_replace('/(<a.*?>)(.*)<\/a>/i', '<span class="dropdown-arrow"></span>$1$2</a>', $items);
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'add_dropdown_arrow_to_menu', 10, 2);

// Chỉ áp dụng nếu trong nội dung có <h2> đầu tiên
add_filter('the_content', function ($content) {
	if (strpos($content, '<h2') !== false) {
		$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>';
		$content = preg_replace(
			'/(<h2[^>]*>)/i', // Regex tìm thẻ <h2>
			'<div class="single_toc_mb"><div class="single_toc_btn"><span class="text">Nội dung chính</span><span class="icon">' . $icon . '</span></div><div id="sticky-nav-mb" class="single_toc_content"></div></div>$1', // Chèn <div> vào trước thẻ <h2>
			$content,
			1 // Chỉ áp dụng cho lần xuất hiện đầu tiên
		);
	}
	return $content;
});

function add_export_button_with_jquery()
{
	global $pagenow, $post_type;

	$arr_post_type = ['form_ctv', 'contact_info', 'form_contribute'];

	if ($pagenow === 'edit.php' && in_array($post_type, $arr_post_type)) {
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var noti = '<?php echo isset($_POST['export_csv']) ? 'Export successfully.' : ''; ?>';
				var post_type_export = '<?php echo $post_type; ?>';
				var buttonHTML = '<div style="margin: 10px 0 20px 0;">' +
					'<form method="post">' +
					'<input type="hidden" name="post_type_export" class="button button-primary" value="' + post_type_export + '" />' +
					'<input type="submit" name="export_csv" class="button button-primary" value="Export CSV" />' +
					'<p style="color: #198754;font-weight:700;">' + noti + '</p>' +
					'</form>' +
					'</div>';

				var headerEnd = $('.wp-header-end');
				if (headerEnd.length) {
					headerEnd.after(buttonHTML);
				}
			});
		</script>
<?php
	}
}
add_action('admin_footer', 'add_export_button_with_jquery');

function handle_run_export_csv()
{
	if (!empty($_POST['export_csv']) && !empty($_POST['export_csv'])) {
		if ($_POST['post_type_export'] == 'contact_info') {
			// do_action('fetch_glueup_events_cron');
		}
		if ($_POST['post_type_export'] == 'form_ctv') {
			// do_action('update_member');
		}
		if ($_POST['post_type_export'] == 'form_contribute') {
			// do_action('update_membership_directory');
		}
	}
}
add_action('admin_init', 'handle_run_export_csv');
