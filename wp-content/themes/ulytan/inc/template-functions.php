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
		'news_documents' => [
			'labels' => __('Tin tức tài liệu', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'download_documents' => [
			'labels' => __('Tài liệu tải xuống', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'executive_board' => [
			'labels' => __('Ban điều hành', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'staff' => [
			'labels' => __('Đội ngũ nhân viên', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'typical_customers' => [
			'labels' => __('Khách hàng tiêu biểu', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'our_partners' => [
			'labels' => __('Đối tác của chúng tôi', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'service' => [
			'labels' => __('Dịch vụ', 'basetheme'),
			'slug' => 'dich-vu',
			'cap' => false,
			'hierarchical' => false
		],
		'activity_videos' => [
			'labels' => __('Video hoạt động', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'video_customer' => [
			'labels' => __('Video khách hàng', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'feedback_customer' => [
			'labels' => __('Feedback khách hàng', 'basetheme'),
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
		'signup_download' => [
			'labels' => __('Form 5 - Đăng ký tải xuống', 'basetheme'),
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
	$fields['author'] = '<p class="comment-form-author"><label for="author">Họ và tên <span class="required">*</span></label>' .
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
		$message .= 'Họ và tên: ' . $data['full_name'] . '<br>';
		$message .= 'Email: ' . $data['email'] . '<br>';
		$message .= 'Số điện thoại: ' . $data['phone'] . '<br>';

		// các dịch vụ
		if ($data['services']) {
			$message .= 'Dịch vụ: <br>';
			$services = (array) $data['services'];

			foreach ($services as $item) {
				$text = str_replace("_", " ", $item);
				$message .= ' - ' . $text . '<br>';
			}
		}

		wp_mail('Sales@ulytan.com', $subject, $message, $headers);
		// wp_mail('xuandxop@gmail.com', $subject, $message, $headers);

		$new_post = array(
			'post_type'   => 'contact_info',
			'post_title'  => sanitize_text_field($data['email'] . ' - ' . $data['ten_trang']),
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($new_post);

		if ($post_id) {
			if (function_exists('update_field')) {
				$services =  implode(', ', $data['services']) ?? '';
				update_field('full_name', sanitize_text_field($data['full_name']), $post_id);
				update_field('phone', sanitize_text_field($data['phone']), $post_id);
				update_field('email', sanitize_text_field($data['email']), $post_id);
				update_field('services_list',   sanitize_text_field((string) $services), $post_id);
				update_field('services_2', sanitize_text_field($data['services_2']), $post_id);
				update_field('services_10', sanitize_text_field($data['services_10']), $post_id);
				update_field('services_11', sanitize_text_field($data['services_11']), $post_id);
				update_field('services_12', sanitize_text_field($data['services_12']), $post_id);
				update_field('services_13', sanitize_text_field($data['services_13']), $post_id);
				update_field('trang_da_gui', sanitize_text_field($data['trang_da_gui']), $post_id);

				if (!empty($data)) {
					// Chuyển mảng thành chuỗi JSON (nếu cần thiết, bạn có thể lưu trực tiếp mảng tùy theo loại trường trong ACF)
					$json_data = json_encode($data, JSON_UNESCAPED_UNICODE);

					// Sử dụng hàm update_field của ACF để lưu dữ liệu vào trường meta của bài viết với ID 123
					update_field('post_data', $json_data, $post_id);
				}

				$ten_trang = $data['ten_trang']; // Tên term cần xử lý
				$id_trang = $data['id_trang']; // Tên term cần xử lý

				if (!empty($ten_trang) && !empty($post_id)) {
					// Kiểm tra xem term đã tồn tại hay chưa
					$term = get_term_by('name', $ten_trang, 'loai_page'); // 'loai_page' là taxonomy

					if (!$term) {
						// Nếu term chưa tồn tại, tiến hành tạo mới
						$result = wp_insert_term(
							$ten_trang, // Tên của term
							'loai_page' // Taxonomy
						);

						if (is_wp_error($result)) {
							return;
						} else {
							// Lấy ID của term vừa tạo thành công
							$term_id = $result['term_id'];
							update_term_meta($term_id, 'page_id', $id_trang);
						}
					} else {
						// Nếu term đã tồn tại, lấy ID của term đó
						$term_id = $term->term_id;
						update_term_meta($term_id, 'page_id', $id_trang);
					}

					// Gắn bài viết vào term
					$update_result = wp_set_post_terms(
						$post_id, // ID bài viết
						$term_id, // ID của term hoặc mảng ID
						'loai_page', // Taxonomy
						false // False để thay thế các term hiện tại
					);
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
		$message .= 'Họ và tên: ' . $data['full_name'] . '<br>';
		$message .= 'Email: ' . $data['email'] . '<br>';
		$message .= 'Số điện thoại: ' . $data['phone'] . '<br>';

		wp_mail('hr@ulytan.com', $subject, $message, $headers);
		// wp_mail('xuandxop@gmail.com', $subject, $message, $headers);

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
	$restricted_post_types = ['form_ctv', 'contact_info', 'form_contribute', 'signup_download'];

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
			$('#menu-posts a[href="edit-tags.php?taxonomy=category"]').text('Danh mục - Tin hữu ích');
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
	if (is_single()) {
		if (strpos($content, '<h2') !== false) {
			$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>';
			$content = preg_replace(
				'/(<h2[^>]*>)/i', // Regex tìm thẻ <h2>
				'<div class="single_toc_mb"><div class="single_toc_btn"><span class="text">Nội dung chính</span><span class="icon">' . $icon . '</span></div><div id="sticky-nav-mb" class="single_toc_content"></div></div>$1', // Chèn <div> vào trước thẻ <h2>
				$content,
				1 // Chỉ áp dụng cho lần xuất hiện đầu tiên
			);
		}
	}
	return $content;
});

function add_export_button_with_jquery()
{
	global $pagenow, $post_type;

	$arr_post_type = ['form_ctv', 'contact_info', 'form_contribute'];

	if ($pagenow === 'edit.php' && in_array($post_type, $arr_post_type)) {
		// Lấy danh sách terms trong taxonomy 'loai_page' nếu post type là contact_info
		$terms = [];
		if ($post_type === 'contact_info') {
			$terms = get_terms(array(
				'taxonomy'   => 'loai_page',
				'hide_empty' => false,
			));
		}
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var noti = '<?php echo isset($_POST['export_csv']) ? 'Export successfully.' : ''; ?>';
				var post_type_export = '<?php echo $post_type; ?>';

				var selectHTML = '';
				<?php if ($post_type === 'contact_info') : ?>
					// Tạo danh sách <option> từ các terms nếu là contact_info
					selectHTML = '<select name="loai_page_select" class="button button-secondary" style="margin-right: 10px;">';
					<?php if (!empty($terms)) : ?>
						<?php foreach ($terms as $term) : ?>
							selectHTML += '<option value="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>';
						<?php endforeach; ?>
					<?php endif; ?>
					selectHTML += '</select>';
				<?php endif; ?>

				var buttonHTML = '<div style="margin: 10px 0 20px 0;">' +
					'<form method="post">' +
					'<input type="hidden" name="post_type_export" value="' + post_type_export + '" />' +
					selectHTML +
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
			contact_info_export_data_csv();
		}
		if ($_POST['post_type_export'] == 'form_ctv') {
			form_ctv_export_data_csv();
		}
		if ($_POST['post_type_export'] == 'form_contribute') {
			form_contribute_export_data_csv();
		}
	}
}
add_action('admin_init', 'handle_run_export_csv');

function contact_info_export_data_csv()
{
	// Delete cached html
	ob_clean();

	$type_popup = 0;

	$current_time = date("d.m.Y"); // get the current time
	$output_handle = @fopen('php://output', 'w');
	fwrite($output_handle, "\xEF\xBB\xBF"); // display Vietnamese text
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header('Content-Type: text/x-csv; charset=utf-8');

	$loai_page_select = $_POST['loai_page_select'] ?? ''; // Lấy giá trị của loại page (nếu có)
	$args = array(
		'post_type'      => 'contact_info', // Post type cần lấy
		'posts_per_page' => -1,             // Lấy tất cả bài viết
		'post_status'    => 'publish',      // Chỉ lấy bài đã xuất bản
	);

	// Thêm điều kiện lọc theo loại page nếu có lựa chọn
	if (!empty($loai_page_select)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'loai_page',   // Taxonomy cần lọc
				'field'    => 'id',        // Lọc theo slug
				'terms'    => $loai_page_select, // Giá trị của loại page (slug)
			),
		);

		$meta_key = 'page_id';
		$page_id = get_term_meta($loai_page_select, $meta_key, true);
		$type_popup = get_field('type_popup', $page_id) ?? 0;
	} else {
		fclose($output_handle);
		die();
	}

	if ($type_popup == '1') {
		$output_filename = '1.Dịch thuật công chứng_' . $current_time . '.csv';
	} elseif ($type_popup == '2') {
		$output_filename = '2.Hợp pháp hoá lãnh sự_' . $current_time . '.csv';
	} elseif ($type_popup == '3') {
		$output_filename = '3.Chứng thực lãnh sự_' . $current_time . '.csv';
	} elseif ($type_popup == '4') {
		$output_filename = '4.Cấp Visa đa quốc gia_' . $current_time . '.csv';
	} elseif ($type_popup == '5') {
		$output_filename = '5.Cấp đổi ra hạn Hộ chiếu_' . $current_time . '.csv';
	} elseif ($type_popup == '6') {
		$output_filename = '6.Lý lịch tư pháp_' . $current_time . '.csv';
	} elseif ($type_popup == '7') {
		$output_filename = '7.Đổi bằng lái xe quốc tế_' . $current_time . '.csv';
	} elseif ($type_popup == '8') {
		$output_filename = '8.Xin cấp, gia hạn thẻ tạm trú_' . $current_time . '.csv';
	} elseif ($type_popup == '9') {
		$output_filename = '9.Cấp, gia hạn giấy phép lao động_' . $current_time . '.csv';
	} elseif ($type_popup == '10') {
		$output_filename = '10.Xuất khẩu lao động_' . $current_time . '.csv';
	} elseif ($type_popup == '11') {
		$output_filename = '11.Tư vấn du học quốc tế_' . $current_time . '.csv';
	} elseif ($type_popup == '12') {
		$output_filename = '12.Đào tạo ngoại ngữ_' . $current_time . '.csv';
	} elseif ($type_popup == '13') {
		$output_filename = '13.Du lịch quốc tế_' . $current_time . '.csv';
	} elseif ($type_popup == '14') {
		$output_filename = '14.Xin cấp E-Visa_' . $current_time . '.csv';
	} elseif ($type_popup == '15') {
		$output_filename = '15.Bảo hiểm du lịch quốc tế_' . $current_time . '.csv';
	} elseif ($type_popup == '16') {
		$output_filename = '16.Đầu tư, định cư_' . $current_time . '.csv';
	} elseif ($type_popup == '17') {
		$output_filename = '17.Thẻ APEC_' . $current_time . '.csv';
	} elseif ($type_popup == '18') {
		$output_filename = '18.Chứng minh tài chính_' . $current_time . '.csv';
	} elseif ($type_popup == '19') {
		$output_filename = '19.Thủ tục hải quan_' . $current_time . '.csv';
	} elseif ($type_popup == '20') {
		$output_filename = '20.Bán vé máy bay_' . $current_time . '.csv';
	} elseif ($type_popup == '21') {
		$output_filename = '21.Giấy khám sức khoẻ_' . $current_time . '.csv';
	}
	// không thuộc trường hợp nào
	else {
		$output_filename = 'Form liên hệ_' . $current_time . '.csv';
	}
	header('Content-Disposition: attachment;filename=' . $output_filename);

	// Thực hiện query
	$query = new WP_Query($args);

	if ($type_popup == '1') {
		// Create CSV file and write data
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Dịch thuật công chứng',
			'2. Hợp pháp hóa lãnh sự',
			'3. Chứng thực lãnh sự',
			'4. Cấp visa đa quốc gia',
			'5. Cấp, đổi, gia hạn hộ chiếu',
			'6. Lý lịch tư pháp',
			'7. Đổi bằng lái xe quốc tế',
			'8. Xin cấp, gia hạn thẻ tạm trú',
			'9. Cấp, gia hạn giấy phép lao động',
			'10. Xuất khẩu lao động',
			'11. Tư vấn du học quốc tế',
			'12. Đào tạo ngoại ngữ',
			'13. Du lịch quốc tế',
			'14. Xin cấp E-Visa',
			'15. Bảo hiểm du lịch quốc tế',
			'16. Đầu tư, định cư',
			'17. Thẻ APEC',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . $post_data['phone'] ?? '',              // Số điện thoại
						$post_data['email'] ?? '',              // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tếa')] : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'],       // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'),          // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '2') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Hợp pháp hóa lãnh sự',
			'2. Dịch thuật công chứng',
			'3. Chứng thực lãnh sự',
			'4. Cấp visa đa quốc gia',
			'5. Cấp, đổi, gia hạn hộ chiếu',
			'6. Lý lịch tư pháp',
			'7. Đổi bằng lái xe quốc tế',
			'8. Xin cấp, gia hạn thẻ tạm trú',
			'9. Cấp, gia hạn giấy phép lao động',
			'10. Xuất khẩu lao động',
			'11. Tư vấn du học quốc tế',
			'12. Đào tạo ngoại ngữ',
			'13. Du lịch quốc tế',
			'14. Xin cấp E-Visa',
			'15. Bảo hiểm du lịch quốc tế',
			'16. Đầu tư, định cư',
			'17. Thẻ APEC',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . $post_data['phone'] ?? '',              // Số điện thoại
						$post_data['email'] ?? '',              // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tếa')] : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'],       // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'),          // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '4') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Cấp visa đa quốc gia',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Bán vé máy bay',
			'4. Thủ tục hải quan',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Dịch thuật công chứng',
			'8. Lý lịch tư pháp',
			'9. Đổi bằng lái xe quốc tế',
			'10. Xin cấp, gia hạn thẻ tạm trú',
			'11. Cấp, gia hạn giấy phép lao động',
			'12. Xuất khẩu lao động',
			'13. Tư vấn du học quốc tế',
			'14. Đào tạo ngoại ngữ',
			'15. Du lịch quốc tế',
			'16. Xin cấp E-Visa',
			'17. Bảo hiểm du lịch quốc tế',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Chứng minh tài chính',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . $post_data['phone'] ?? '',              // Số điện thoại
						$post_data['email'] ?? '',              // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tếa')] : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'],       // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'),          // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '5') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Cấp, đổi, gia hạn hộ chiếu',
			'2. Cấp visa đa quốc gia',
			'3. Bán vé máy bay',
			'4. Dịch thuật công chứng',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . $post_data['phone'] ?? '',              // Số điện thoại
						$post_data['email'] ?? '',              // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tếa')] : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'],       // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'),          // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '3') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'6. Chứng thực lãnh sự',
			'5. Hợp pháp hóa lãnh sự',
			'4. Dịch thuật công chứng',
			'2. Cấp visa đa quốc gia',
			'1. Cấp, đổi, gia hạn hộ chiếu',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'3. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '6') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Lý lịch tư pháp',
			'2. Cấp visa đa quốc gia',
			'3. Cấp, đổi, gia hạn hộ chiếu',
			'4. Bán vé máy bay',
			'5. Dịch thuật công chứng',
			'6. Hợp pháp hóa lãnh sự',
			'7. Chứng thực lãnh sự',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '7') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Đổi bằng lái xe quốc tế',
			'2. Dịch thuật công chứng',
			'3. Hợp pháp hóa lãnh sự',
			'4. Chứng thực lãnh sự',
			'5. Cấp visa đa quốc gia',
			'6. Cấp, đổi, gia hạn hộ chiếu',
			'7. Lý lịch tư pháp',
			'8. Xin cấp, gia hạn thẻ tạm trú',
			'9. Cấp, gia hạn giấy phép lao động',
			'10. Xuất khẩu lao động',
			'11. Tư vấn du học quốc tế',
			'12. Đào tạo ngoại ngữ',
			'13. Du lịch quốc tế',
			'14. Xin cấp E-Visa',
			'15. Bảo hiểm du lịch quốc tế',
			'16. Đầu tư, định cư',
			'17. Thẻ APEC',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '8') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Xin cấp, gia hạn thẻ tạm trú',
			'2. Lý lịch tư pháp',
			'3. Cấp, gia hạn giấy phép lao động',
			'4. Giấy khám sức khoẻ',
			'5. Dịch thuật công chứng',
			'6. Hợp pháp hóa lãnh sự',
			'7. Chứng thực lãnh sự',
			'8. Cấp visa đa quốc gia',
			'9. Cấp, đổi, gia hạn hộ chiếu',
			'10. Đổi bằng lái xe quốc tế',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Bán vé máy bay',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '9') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Cấp, gia hạn giấy phép lao động',
			'2. Lý lịch tư pháp',
			'3. Xin cấp, gia hạn thẻ tạm trú',
			'4. Giấy khám sức khoẻ',
			'5. Dịch thuật công chứng',
			'6. Hợp pháp hóa lãnh sự',
			'7. Chứng thực lãnh sự',
			'8. Cấp visa đa quốc gia',
			'9. Cấp, đổi, gia hạn hộ chiếu',
			'10. Đổi bằng lái xe quốc tế',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Bán vé máy bay',
			'Trang đã gửi',
			'Thời gian',
		];


		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '10') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Xuất khẩu lao động',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Giấy khám sức khoẻ',
			'4. Bán vé máy bay',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Cấp visa đa quốc gia',
			'8. Lý lịch tư pháp',
			'9. Đổi bằng lái xe quốc tế',
			'10. Xin cấp, gia hạn thẻ tạm trú',
			'11. Cấp, gia hạn giấy phép lao động',
			'12. Dịch thuật công chứng',
			'13. Tư vấn du học quốc tế',
			'14. Đào tạo ngoại ngữ',
			'15. Du lịch quốc tế',
			'16. Xin cấp E-Visa',
			'17. Bảo hiểm du lịch quốc tế',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Chứng minh tài chính',
			'21. Thủ tục hải quan',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '11') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Tư vấn du học quốc tế',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Cấp visa đa quốc gia',
			'4. Hợp pháp hóa lãnh sự',
			'5. Chứng thực lãnh sự',
			'6. Giấy khám sức khoẻ',
			'7. Dịch thuật công chứng',
			'8. Bán vé máy bay',
			'9. Lý lịch tư pháp',
			'10. Đổi bằng lái xe quốc tế',
			'11. Xin cấp, gia hạn thẻ tạm trú',
			'12. Cấp, gia hạn giấy phép lao động',
			'13. Xuất khẩu lao động',
			'14. Đào tạo ngoại ngữ',
			'15. Du lịch quốc tế',
			'16. Xin cấp E-Visa',
			'17. Bảo hiểm du lịch quốc tế',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Chứng minh tài chính',
			'21. Thủ tục hải quan',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '12') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Đào tạo ngoại ngữ',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Tư vấn du học quốc tế',
			'4. Cấp visa đa quốc gia',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Dịch thuật công chứng',
			'8. Lý lịch tư pháp',
			'9. Đổi bằng lái xe quốc tế',
			'10. Xin cấp, gia hạn thẻ tạm trú',
			'11. Cấp, gia hạn giấy phép lao động',
			'12. Xuất khẩu lao động',
			'13. Du lịch quốc tế',
			'14. Xin cấp E-Visa',
			'15. Bảo hiểm du lịch quốc tế',
			'16. Đầu tư, định cư',
			'17. Thẻ APEC',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '13') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Du lịch quốc tế',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Cấp visa đa quốc gia',
			'4. Bán vé máy bay',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Dịch thuật công chứng',
			'8. Lý lịch tư pháp',
			'9. Đổi bằng lái xe quốc tế',
			'10. Xin cấp, gia hạn thẻ tạm trú',
			'11. Cấp, gia hạn giấy phép lao động',
			'12. Xuất khẩu lao động',
			'13. Tư vấn du học quốc tế',
			'14. Đào tạo ngoại ngữ',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);


				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '14') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Xin cấp E-Visa',
			'2. Xin cấp, gia hạn thẻ tạm trú',
			'3. Cấp, gia hạn giấy phép lao động',
			'4. Bán vé máy bay',
			'5. Thủ tục hải quan',
			'6. Dịch thuật công chứng',
			'7. Hợp pháp hóa lãnh sự',
			'8. Chứng thực lãnh sự',
			'9. Cấp visa đa quốc gia',
			'10. Cấp, đổi, gia hạn hộ chiếu',
			'11. Lý lịch tư pháp',
			'12. Đổi bằng lái xe quốc tế',
			'13. Xuất khẩu lao động',
			'14. Tư vấn du học quốc tế',
			'15. Đào tạo ngoại ngữ',
			'16. Du lịch quốc tế',
			'17. Bảo hiểm du lịch quốc tế',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Chứng minh tài chính',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '15') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Bảo hiểm du lịch quốc tế',
			'2. Chứng minh tài chính',
			'3. Du lịch quốc tế',
			'4. Cấp, đổi, gia hạn hộ chiếu',
			'5. Cấp visa đa quốc gia',
			'6. Bán vé máy bay',
			'7. Hợp pháp hóa lãnh sự',
			'8. Chứng thực lãnh sự',
			'9. Dịch thuật công chứng',
			'10. Lý lịch tư pháp',
			'11. Đổi bằng lái xe quốc tế',
			'12. Xin cấp, gia hạn thẻ tạm trú',
			'13. Cấp, gia hạn giấy phép lao động',
			'14. Xuất khẩu lao động',
			'15. Tư vấn du học quốc tế',
			'16. Đào tạo ngoại ngữ',
			'17. Xin cấp E-Visa',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Thủ tục hải quan',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '16') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Đầu tư, định cư',
			'2. Dịch thuật công chứng',
			'3. Hợp pháp hóa lãnh sự',
			'4. Chứng thực lãnh sự',
			'5. Cấp visa đa quốc gia',
			'6. Cấp, đổi, gia hạn hộ chiếu',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Thẻ APEC',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '17') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Thẻ APEC',
			'2. Cấp, đổi, gia hạn hộ chiếu',
			'3. Cấp visa đa quốc gia',
			'4. Dịch thuật công chứng',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Chứng minh tài chính',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '18') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Chứng minh tài chính',
			'2. Xuất khẩu lao động',
			'3. Tư vấn du học quốc tế',
			'4. Cấp visa đa quốc gia',
			'5. Cấp, đổi, gia hạn hộ chiếu',
			'6. Chứng thực lãnh sự',
			'7. Hợp pháp hóa lãnh sự',
			'8. Dịch thuật công chứng',
			'9. Lý lịch tư pháp',
			'10. Đổi bằng lái xe quốc tế',
			'11. Xin cấp, gia hạn thẻ tạm trú',
			'12. Cấp, gia hạn giấy phép lao động',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Thủ tục hải quan',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '19') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Thủ tục hải quan',
			'2. Dịch thuật công chứng',
			'3. Hợp pháp hóa lãnh sự',
			'4. Chứng thực lãnh sự',
			'5. Cấp visa đa quốc gia',
			'6. Cấp, đổi, gia hạn hộ chiếu',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Bán vé máy bay',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '20') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Bán vé máy bay',
			'2. Cấp visa đa quốc gia',
			'3. Cấp, đổi, gia hạn hộ chiếu',
			'4. Du lịch quốc tế',
			'5. Dịch thuật công chứng',
			'6. Hợp pháp hóa lãnh sự',
			'7. Chứng thực lãnh sự',
			'8. Thủ tục hải quan',
			'9. Lý lịch tư pháp',
			'10. Đổi bằng lái xe quốc tế',
			'11. Xin cấp, gia hạn thẻ tạm trú',
			'12. Cấp, gia hạn giấy phép lao động',
			'13. Xuất khẩu lao động',
			'14. Tư vấn du học quốc tế',
			'15. Đào tạo ngoại ngữ',
			'16. Xin cấp E-Visa',
			'17. Bảo hiểm du lịch quốc tế',
			'18. Đầu tư, định cư',
			'19. Thẻ APEC',
			'20. Chứng minh tài chính',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Dịch vụ theo thứ tự trong $column_title
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	} elseif ($type_popup == '21') {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Giấy khám sức khoẻ',
			'2. Lý lịch tư pháp',
			'3. Xuất khẩu lao động',
			'4. Xin cấp, gia hạn thẻ tạm trú',
			'5. Cấp, gia hạn giấy phép lao động',
			'6. Dịch thuật công chứng',
			'7. Hợp pháp hóa lãnh sự',
			'8. Chứng thực lãnh sự',
			'9. Cấp visa đa quốc gia',
			'10. Cấp, đổi, gia hạn hộ chiếu',
			'11. Đổi bằng lái xe quốc tế',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Bán vé máy bay',
			'21. Thủ tục hải quan',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . ($post_data['phone'] ?? ''), // Số điện thoại
						$post_data['email'] ?? '', // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] ?? '') : '',
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] ?? '') : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? ($post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tế')] ?? '') : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'] ?? '', // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'), // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	}
	// không gặp trường hợp nào 
	else {
		$column_title = [
			'STT',
			'Họ tên',
			'Phone',
			'Email',
			'1. Cấp, đổi, gia hạn hộ chiếu',
			'2. Cấp visa đa quốc gia',
			'3. Bán vé máy bay',
			'4. Dịch thuật công chứng',
			'5. Hợp pháp hóa lãnh sự',
			'6. Chứng thực lãnh sự',
			'7. Lý lịch tư pháp',
			'8. Đổi bằng lái xe quốc tế',
			'9. Xin cấp, gia hạn thẻ tạm trú',
			'10. Cấp, gia hạn giấy phép lao động',
			'11. Xuất khẩu lao động',
			'12. Tư vấn du học quốc tế',
			'13. Đào tạo ngoại ngữ',
			'14. Du lịch quốc tế',
			'15. Xin cấp E-Visa',
			'16. Bảo hiểm du lịch quốc tế',
			'17. Đầu tư, định cư',
			'18. Thẻ APEC',
			'19. Chứng minh tài chính',
			'20. Thủ tục hải quan',
			'21. Giấy khám sức khoẻ',
			'Trang đã gửi',
			'Thời gian',
		];

		fputcsv(
			$output_handle,
			$column_title
		);

		$index = 1;

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$post_data_json = get_field('post_data') ?? '';
				$post_data = json_decode($post_data_json, true);
				$post_data = (array) $post_data;
				$services = $post_data['services'] ?? [];

				// Ghi dữ liệu
				fputcsv(
					$output_handle,
					[
						// STT và thông tin người dùng
						$index,
						$post_data['full_name'] ?? '',
						"'" . $post_data['phone'] ?? '',              // Số điện thoại
						$post_data['email'] ?? '',              // Email

						// Các dịch vụ từ 1 đến 21
						in_array(convert_to_slug('Cấp, đổi, gia hạn hộ chiếu'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp visa đa quốc gia'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Cấp visa đa quốc gia')] : '',
						in_array(convert_to_slug('Bán vé máy bay'), $services) ? 'x' : '',
						in_array(convert_to_slug('Dịch thuật công chứng'), $services) ? 'x' : '',
						in_array(convert_to_slug('Hợp pháp hóa lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng thực lãnh sự'), $services) ? 'x' : '',
						in_array(convert_to_slug('Lý lịch tư pháp'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đổi bằng lái xe quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xin cấp, gia hạn thẻ tạm trú'), $services) ? 'x' : '',
						in_array(convert_to_slug('Cấp, gia hạn giấy phép lao động'), $services) ? 'x' : '',
						in_array(convert_to_slug('Xuất khẩu lao động'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Xuất khẩu lao động')] : '',
						in_array(convert_to_slug('Tư vấn du học quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Tư vấn du học quốc tế')] : '',
						in_array(convert_to_slug('Đào tạo ngoại ngữ'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Đào tạo ngoại ngữ')] : '',
						in_array(convert_to_slug('Du lịch quốc tế'), $services) ? $post_data['quoc_gia_' . convert_to_slug('Du lịch quốc tếa')] : '',
						in_array(convert_to_slug('Xin cấp E-Visa'), $services) ? 'x' : '',
						in_array(convert_to_slug('Bảo hiểm du lịch quốc tế'), $services) ? 'x' : '',
						in_array(convert_to_slug('Đầu tư, định cư'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thẻ APEC'), $services) ? 'x' : '',
						in_array(convert_to_slug('Chứng minh tài chính'), $services) ? 'x' : '',
						in_array(convert_to_slug('Thủ tục hải quan'), $services) ? 'x' : '',
						in_array(convert_to_slug('Giấy khám sức khoẻ'), $services) ? 'x' : '',

						// Trang đã gửi và thời gian
						$post_data['trang_da_gui'],       // Trang đã gửi
						"'" . get_the_date('d/m/Y H:i'),          // Thời gian
					]
				);

				$index++;
			}
		}
		wp_reset_postdata();
	}

	// Close output file stream
	fclose($output_handle);

	die();
}

function form_ctv_export_data_csv()
{
	// Delete cached html
	ob_clean();

	$current_time = date("d.m.Y"); // get the current time
	$output_filename = 'Form 2 Tuyển CTV_' . $current_time . '.csv';
	$output_handle = @fopen('php://output', 'w');
	fwrite($output_handle, "\xEF\xBB\xBF"); // display Vietnamese text
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header('Content-Type: text/x-csv; charset=utf-8');
	header('Content-Disposition: attachment;filename=' . $output_filename);

	// Create CSV file and write data
	$column_title = [
		"STT",
		"1.Họ tên",
		"2.Ngày sinh",
		"3.Phone",
		"4.Email",
		"5.Bạn sẽ mời người bản địa? (Không)",
		"5.Bạn sẽ mời người bản địa? (Có)",
		"6.Trường tốt nghiệp",
		"7.Năm tốt nghiệp",
		"8.Đơn vị dịch thuật bạn đã từng cộng tác? (Chưa từng)",
		"8.Đơn vị dịch thuật bạn đã từng cộng tác? (Đã từng)",
		"9.Bạn hay tra từ điển nào?",
		"10.Ngôn ngữ đăng ký làm CTV",
		"11.Bạn biết Ulytan qua đâu?",
		"12.Bạn biết dịch xuôi hay ngược?",
		"13.Chuyên ngành đăng ký làm CTV",
		"14.Bạn có dùng phần mềm dịch thuật nào không? (Không)",
		"14.Bạn có dùng phần mềm dịch thuật nào không? (Có)",
		"15.Bạn có thể phiên dịch không? (Không)",
		"15.Bạn có thể phiên dịch không? (Có)",
		"16.Mô tả tóm tắt kinh nghiệm làm việc",
		"17.Bạn có hợp tác với phòng tư pháp quận, huyện nào? (Không)",
		"17.Bạn có hợp tác với phòng tư pháp quận, huyện nào? (Có)",
		"17.1-Phòng tư pháp thuộc tỉnh hoặc thành phố nào?",
		"17.2-Phòng tư pháp thuộc quận huyện nào?",
		"18.Bạn có hợp tác với văn phòng công chứng tư nào không? (Không)",
		"18.Bạn có hợp tác với văn phòng công chứng tư nào không? (Có)",
		"18.Phòng công chứng thuộc tỉnh hoặc thành phố nào?",
		"18.Phòng công chứng thuộc quận huyện nào?",
		"19.Upload file 1",
		"19.Upload file 2",
		"20.Thời gian"
	];

	fputcsv(
		$output_handle,
		$column_title
	);

	$args = array(
		'post_type'      => 'form_ctv', // Post type cần lấy
		'posts_per_page' => -1,             // Lấy tất cả bài viết
		'post_status'    => 'publish',      // Chỉ lấy bài đã xuất bản
	);

	$query = new WP_Query($args);

	$count = 1;

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			fputcsv(
				$output_handle,
				[
					$count, // "STT",
					// hàng 1
					get_field('full_name') ?? '', //  "Họ tên",
					"'" . get_field('birthdate') ?? '', // "Ngày sinh",
					"'" . get_field('phone') ?? '', // "Phone",
					get_field('email') ?? '', // "Email",

					// hàng 2
					get_field('speak_language') == 'Không' ? 'x' : "", // "Bạn sẽ mời người bản địa? (Không)",
					get_field('speak_language') == 'Có' ? 'x' : "", // "Bạn sẽ mời người bản địa? (Có)",
					get_field('graduation_school') ?? '', // "Trường tốt nghiệp",
					get_field('graduation_year') ?? '', // "Năm tốt nghiệp",
					get_field('translation_unit') == 'Không' ? 'x' : "", // "Đơn vị dịch thuật bạn đã từng cộng tác? (Chưa từng)",
					get_field('translation_unit') == 'Có' ? (get_field('translation_unit_name') ?? '') : "", // "Đơn vị dịch thuật bạn đã từng cộng tác? (Đã từng)",

					// hàng 3
					get_field('dictionary') ?? '', // "Bạn hay tra từ điển nào?",
					get_field('registration_language_val') ?? '', // "Ngôn ngữ đăng ký làm CTV",
					get_field('how_do_you_know_val') ?? '', //  "Bạn biết Ulytan qua đâu?",
					get_field('translation_skill_val') ?? '', //  "Bạn biết dịch xuôi hay ngược?",

					// hàng 4
					get_field('language_speciality_val') ?? '', // "Chuyên ngành đăng ký làm CTV",
					get_field('translation_software') == 'Không' ? 'x' : "", // "14.Bạn có dùng phần mềm dịch thuật nào không? (Không)",
					get_field('translation_software') == 'Có' ? (get_field('translation_software_name') ?? '') : "", // "14.Bạn có dùng phần mềm dịch thuật nào không? (Có)",
					get_field('live_translate') == 'Không' ? 'x' : "", //  "15.Bạn có thể phiên dịch không? (Không)",
					get_field('live_translate') == 'Có' ? (get_field('live_translate_select_val') ?? '') : '', // "15.Bạn có thể phiên dịch không? (Có)",

					// hàng 5
					get_field('summary_description') ?? '', // "16.Mô tả tóm tắt kinh nghiệm làm việc",

					// hàng 6
					get_field('info_17') == 'Không' ? 'x' : "", // "17.Bạn có hợp tác với phòng tư pháp quận, huyện nào? (Không)",
					get_field('info_17') == 'Có' ? 'x' : "", // "17.Bạn có hợp tác với phòng tư pháp quận, huyện nào? (Có)",
					get_field('info_17_province') ?? '', // "17.1-Phòng tư pháp thuộc tỉnh hoặc thành phố nào?",
					get_field('info_17_district') ?? '', // "17.2-Phòng tư pháp thuộc quận huyện nào?",
					get_field('info_18') == 'Không' ? 'x' : "", // "18.Bạn có hợp tác với văn phòng công chứng tư nào không? (Không)",
					get_field('info_18') == 'Không' ? 'x' : "", // "18.Bạn có hợp tác với văn phòng công chứng tư nào không? (Có)",
					get_field('info_18_province') ?? '', //  "18.Phòng công chứng thuộc tỉnh hoặc thành phố nào?",
					get_field('info_18_district') ?? '', // "18.Phòng công chứng thuộc quận huyện nào?",

					// hàng 7
					get_field('upload_file_1') ?? '', // "19.Upload file 1",
					get_field('upload_file_2') ?? '', // "19.Upload file 2",
					"'" . get_the_date('d/m/Y H:i'), // "20.Thời gian"
				],
			);

			$count++;
		}
		wp_reset_postdata();
	}

	// Close output file stream
	fclose($output_handle);

	die();
}

function form_contribute_export_data_csv()
{
	// Delete cached html
	ob_clean();

	$current_time = date("Y_m_d_H_i_s"); // get the current time
	$output_filename = 'export_data_form_3_dong_gop_y_kien_' . $current_time . '.csv';
	$output_handle = @fopen('php://output', 'w');
	fwrite($output_handle, "\xEF\xBB\xBF"); // display Vietnamese text
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header('Content-Type: text/x-csv; charset=utf-8');
	header('Content-Disposition: attachment;filename=' . $output_filename);

	// Create CSV file and write data
	$column_title = [
		'Họ và tên',
		'Số điện thoại',
		'Email',
		'Mã đơn hàng',
		'Nhân viên tư vấn',
		'Kế toán',
		'Nhân viên xử lý đơn hàng',
		'Lý do',
		'Thời gian',
	];

	fputcsv(
		$output_handle,
		$column_title
	);

	$args = array(
		'post_type'      => 'form_contribute', // Post type cần lấy
		'posts_per_page' => -1,             // Lấy tất cả bài viết
		'post_status'    => 'publish',      // Chỉ lấy bài đã xuất bản
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			fputcsv(
				$output_handle,
				[
					get_field('ho_va_ten') ?? '',
					"'" . get_field('so_dien_thoai') ?? '',
					get_field('email') ?? '',
					"'" . get_field('ma_don_hang') ?? '',
					get_field('nhan_vien_tu_van') ?? '',
					get_field('ke_toan') ?? '',
					get_field('nhan_vien_xu_ly_don_hang') ?? '',
					get_field('ly_do') ?? '',
					"'" . get_the_date('d/m/Y H:i'),
				],
			);
		}
		wp_reset_postdata();
	}

	// Close output file stream
	fclose($output_handle);

	die();
}
function create_loai_page_taxonomy()
{
	// Đăng ký taxonomy 'loai_page'
	$labels = array(
		'name'              => _x('Loại Page', 'taxonomy general name'),
		'singular_name'     => _x('Loại Page', 'taxonomy singular name'),
		'search_items'      => __('Tìm Loại Page'),
		'all_items'         => __('Tất cả Loại Page'),
		'parent_item'       => __('Loại Page cha'),
		'parent_item_colon' => __('Loại Page cha:'),
		'edit_item'         => __('Chỉnh sửa Loại Page'),
		'update_item'       => __('Cập nhật Loại Page'),
		'add_new_item'      => __('Thêm mới Loại Page'),
		'new_item_name'     => __('Tên mới của Loại Page'),
		'menu_name'         => __('Loại Page'),
	);

	$args = array(
		'hierarchical'      => true, // True nếu muốn hiển thị dạng phân cấp (giống category)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'loai_page'), // Đường dẫn của taxonomy
	);

	// Gắn taxonomy 'loai_page' với post type 'contact_info'
	register_taxonomy('loai_page', array('contact_info'), $args);
}

// Gắn hàm vào action init
add_action('init', 'create_loai_page_taxonomy');

function convert_to_slug($string)
{
	$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string); // Loại bỏ ký tự đặc biệt
	$string = trim($string); // Loại bỏ khoảng trắng thừa
	$string = mb_strtolower($string); // Chuyển thành chữ thường
	$string = preg_replace('/\s+/', '_', $string); // Thay thế khoảng trắng bằng dấu gạch dưới
	$string = stripVN($string);
	return $string;
}

function stripVN($str)
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);

	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	$str = preg_replace("/(Đ)/", 'D', $str);
	return $str;
}

// Bật lại trạng thái bình luận
add_filter('comments_open', '__return_true');
add_filter('pings_open', '__return_true');

add_action('wp_enqueue_scripts', function () {
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
});

function custom_comments_format($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class('mb-3'); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment_body" id="div-comment-<?php comment_ID(); ?>">
			<div class="comment_author">
				<?php echo get_comment_author(); ?>
			</div>
			<div class="comment_date">
				<?php echo get_comment_date('d/m/Y h:i:s'); ?>
			</div>
			<div class="comment_text">
				<?php echo '=> ' . get_comment_text(); ?>
			</div>

			<div class="comment_meta">
				<?php
				comment_reply_link(array_merge($args, array(
					'reply_text' => 'Trả lời',
					'depth'      => $depth,
					'max_depth'  => $args['max_depth']
				)));
				?>
			</div>
		</div>
	</li>
<?php
}

// Hook để xử lý yêu cầu AJAX
add_action('wp_ajax_dang_ky_tai_xuong', 'dang_ky_tai_xuong');
add_action('wp_ajax_nopriv_dang_ky_tai_xuong', 'dang_ky_tai_xuong');

function dang_ky_tai_xuong()
{
	// Lấy dữ liệu từ AJAX
	if (!empty($_POST)) {
		$data = $_POST;

		if (isset($data['email']) && is_email($data['email'])) {
			$to = $data['email'];
			$subject = 'Thư cảm ơn.';
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$message = 'Cảm ơn quý khách đã đăng ký tải xuống.';

			wp_mail($to, $subject, $message, $headers);
		}

		$new_post = array(
			'post_type'   => 'signup_download',
			'post_title'  => sanitize_text_field($data['email'] ?? 'No Email'),
			'post_status' => 'publish',
		);
		$post_id = wp_insert_post($new_post);

		if ($post_id) {
			// Cập nhật ACF fields
			update_field('ho_va_ten', sanitize_text_field($data['full_name'] ?? ''), $post_id);
			update_field('so_dien_thoai', sanitize_text_field($data['phone'] ?? ''), $post_id);
			update_field('email', sanitize_text_field($data['email'] ?? ''), $post_id);
			update_field('muc_dich_su_dung', sanitize_text_field($data['purpose'] ?? ''), $post_id);

			// set cookie để lưu thông tin khách hàng
			$cookie_name = "user_dang_ky_tai_xuong";
			$cookie_value = "da_dang_ky";
			$expiration = time() + (30 * 24 * 60 * 60); // 30 ngày
			setcookie($cookie_name, $cookie_value, $expiration, "/");

			wp_send_json_success(array('message' => 'Thông tin đã được lưu thành công!'));
		} else {
			wp_send_json_error(array('message' => 'Không thể lưu thông tin'));
		}
	} else {
		wp_send_json_error(array('message' => 'Dữ liệu không hợp lệ'));
	}
	wp_die();
}
