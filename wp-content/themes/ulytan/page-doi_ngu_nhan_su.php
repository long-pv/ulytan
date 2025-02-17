<?php

/**
 * Template name: Đội ngũ nhân sự
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

<!-- Banner Đội ngũ -->
<?php
$image_banner_team = get_field('image_banner_team') ?? null;
$title_banner_team = get_field('title_banner_team') ?? null;
?>

<section class="banner_doingu">
	<div class="banner_doingu_inner">
		<?php if ($image_banner_team): ?>
			<img class="banner_doingu_img" src="<?php echo $image_banner_team; ?>" alt="">
			<div class="banner_doingu_wrapper">
				<div class="container">
					<div class="row banner_doingu_row">
						<div class="col-10">
							<h1 class="banner_doingu_title"><?php echo $title_banner_team; ?></h1>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- Đội ngũ -->
<?php
$subtitle_team = get_field('subtitle_team') ?? null;
$title_team = get_field('title_team') ?? null;
$members = get_field('members') ?? null;

$args = array(
	'post_type' => 'executive_board',
	'posts_per_page' => -1,
);
$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="doi_ngu">
		<div class="container">
			<h2 class="doi_ngu_title_h2">
				Đội ngũ nhân viên
			</h2>
			<div class="row doi_ngu_row">
				<?php
				while ($query->have_posts()):
					$query->the_post();
					$image = get_field('image') ?? '';
					$chuc_vu = get_field('chuc_vu') ?? '';
				?>
					<div class="doi_ngu_col col-12 col-md-6 col-lg-4">
						<div class="team-member">
							<div class="team-member_wrapper">
								<div class="team-member__image-wrapper">
									<div class="team-member__circle team-member__circle--light"></div>
									<div class="team-member__circle team-member__circle--dark"></div>
									<img class="team_memeber__image" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
								</div>
								<div class="team-member__content">
									<div class="team-member__name">
										<?php the_title(); ?>
									</div>
									<div class="team-member__position">
										<?php echo $chuc_vu; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				?>
			</div>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>

<!-- Đội ngũ nhân viên -->
<?php
$args = array(
	'post_type' => 'staff',
	'posts_per_page' => -1,
);

$query = new WP_Query($args);
if ($query->have_posts()):
	$index = 1;
?>
	<section class="team staff_section">
		<div class="container">
			<h2 class="team__title">
				Đội ngũ nhân viên
			</h2>

			<div class="row team_row">
				<?php
				while ($query->have_posts()):
					$query->the_post();
					$title = get_the_title();
					$image = get_field('image') ?? '';
					$chuc_vu = get_field('chuc_vu') ?? '';
					if ($title && $image && $chuc_vu):
				?>
						<div class="team_col col-12 col-md-6 col-lg-3 staff_item <?php echo ($index > 8) ? 'd-none' : ''; ?>">
							<div class="team__member staff_item_inner">
								<div class="team__image_wrapper staff_item_img_block">
									<img class="team__image" src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
								</div>
								<div class="team__info">
									<h3 class="team__name">
										<?php echo $title; ?>
									</h3>
									<p class="team__position">
										<?php echo $chuc_vu; ?>
									</p>
								</div>
							</div>
						</div>
				<?php
						$index++;
					endif;
				endwhile;
				?>
			</div>
			<?php
			if ($index > 9) :
			?>
				<div class="team__button">
					<button type="button" class="button staff_btn_xem_them">
						Xem thêm
					</button>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>
<!-- end -->

<!-- Tìm hiểu về chúng tôi -->
<?php
$title_about_us = get_field('title_about_us') ?? null;
$link_about_us = get_field('link_about_us') ?? null;
$image_about_us = get_field('image_about_us') ?? null;
?>
<section class="tim_hieu_them">
	<div class="container">
		<div class="tim_hieu_them_inner">
			<div class="row row_24">
				<div class="col-12 col-lg-7">
					<h2 class="tim_hieu_them_title"><?php echo $title_about_us; ?></h2>
					<?php if (!empty($link_about_us["url"]) && !empty($link_about_us["title"])): ?>
						<a class="tim_hieu_them_button" href="<?php echo $link_about_us["url"]; ?>">
							<?php echo $link_about_us["title"]; ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="col-12 col-lg-5 text-center text-lg-right">
					<?php if (!empty($image_about_us)): ?>
						<img src="<?php echo esc_url($image_about_us); ?>" class="tim_hieu_them_img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
