<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ulytan
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5PCPQMFP');
	</script>
	<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
	<?php
	// hook body content
	wp_body_open();
	?>
	<?php
	if (!is_page_template('page-form.php')) :
	?>
		<header id="header" class="header">
			<div class="container">
				<div class="header__inner">
					<div class="row">
						<div class="col-6 col-lg-1">
							<a href="<?php echo home_url(); ?>" class="header__logo">
								<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.png'; ?>
								<img src="<?php echo $logo_url; ?>" alt="logo">
							</a>
						</div>

						<div class="col-6 col-lg-11">
							<div class="header__navInner">
								<!-- menu PC -->
								<?php
								// if (is_page_template('page-dich_thuat_cong_chung.php')) {
								// 	if (has_nav_menu('menu-2')) {
								// 		wp_nav_menu(
								// 			array(
								// 				'theme_location' => 'menu-2',
								// 				'container' => 'nav',
								// 				'container_class' => 'header__menupc',
								// 				'depth' => 3,
								// 			)
								// 		);
								// 	}
								// } else {
								if (has_nav_menu('menu-1')) {
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'container' => 'nav',
											'container_class' => 'header__menupc',
											'depth' => 3,
										)
									);
								}
								// }

								?>
								<!-- end -->

								<!-- button toggle menu mobile -->
								<div class="header__toggle">
									<span class="header__toggleItem header__toggleItem--open"></span>
									<span class="header__toggleItem header__toggleItem--close"></span>
								</div>
								<!-- end -->

								<?php
								// if (!is_page_template('page-dich_thuat_cong_chung.php')) :
								/*
								?>
								<div class="header_line">
								</div>

								<div class="form_search">
									<form role="search" method="get" action="<?php echo home_url('/'); ?>">
										<input type="text" name="s" placeholder="Tìm kiếm..."
											value="<?php the_search_query(); ?>" required />
										<button type="submit" aria-label="button icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path fill="#900101"
													d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
											</svg>
										</button>
									</form>
								</div>
								<?php
								//endif; 
								*/
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- menu Mobile -->
			<div class="header__menusp">
				<?php
				// if (is_page_template('page-dich_thuat_cong_chung.php')) {
				// 	if (has_nav_menu('menu-2')) {
				// 		wp_nav_menu(
				// 			array(
				// 				'theme_location' => 'menu-2',
				// 				'container' => 'nav',
				// 				'container_class' => 'header__menuspInner',
				// 				'depth' => 2,
				// 			)
				// 		);
				// 	}
				// } else {
				if (has_nav_menu('menu-1')) {
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => 'nav',
							'container_class' => 'header__menuspInner',
							'depth' => 3,
						)
					);
				}
				// }

				?>
			</div>
		</header>
	<?php endif; ?>

	<main class="mainBodyContent">