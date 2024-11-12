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
		'duplicate-post\duplicate-post.php',
		'wordpress-seo\wp-seo.php',
		'wp-cerber\wp-cerber.php',
		'all-in-one-wp-migration-master\all-in-one-wp-migration.php',
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
		<div class="videoBlock__inner" style="background-image: url('<?php echo $thumb; ?>');">
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
			'labels' => __('Service', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
		'video_customer' => [
			'labels' => __('Video customer', 'basetheme'),
			'cap' => false,
			'hierarchical' => false
		],
	];

	// $cpt_tax = [
	//     'event_category' => [
	//         'labels' => __('Event category', 'basetheme'),
	//         'cap' => false,
	//         'post_type' => ['event']
	//     ],
	// ];

	foreach ($cpt_list as $post_type => $data) {
		register_cpt($post_type, $data);
	}

	// foreach ($cpt_tax as $ctx => $data) {
	//     register_ctx($ctx, $data);
	// }
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
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'rest_base' => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'delete_with_user' => false,
		'exclude_from_search' => true,
		'map_meta_cap' => true,
		'hierarchical' => $hierarchical,
		'rewrite' => array('slug' => $post_type, 'with_front' => true),
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author', $attributes),
		'capability_type' => 'post',
		'can_export' => true,
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

function register_ctx($ctx, $data)
{
	$labels = [
		'name' => $data['labels'],
		'singular_name' => $data['labels'],
	];

	$args = [
		"label" => $ctx,
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => $ctx, 'with_front' => true],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "car_model_id",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
		'show_tagcloud' => true,
	];

	if (!empty($data['cap'])) {
		$capabilities = [
			'manage_terms' => 'manage_' . $ctx,
			'edit_terms' => 'edit_' . $ctx,
			'delete_terms' => 'delete_' . $ctx,
			'assign_terms' => 'assign_' . $ctx,
		];
		$args['capabilities'] = $capabilities;
	}

	register_taxonomy($ctx, $data['post_type'], $args);
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
