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

<!-- Đội ngũ nhân viên -->
<?php
$title_member = get_field('title_member') ?? null;
?>

<section class="team">
	<div class="container">
		<h2 class="team__title"><?php echo $title_member; ?></h2>
		<div class="row team_row">
			<?php for ($i = 0; $i < 10; $i++): ?>
				<div class="team_col col-12 col-md-6 col-lg-3">
					<div class="team__member">
						<div class="team__image_wrapper">
							<img class="team__image"
								src="http://localhost/2025ulytan/wp-content/uploads/2024/12/tran-vu-phong.png.png"
								alt="Trần Vũ Phong">
						</div>
						<div class="team__info">
							<h3 class="team__name">Trần Vũ Phong</h3>
							<p class="team__position">SEO Leader</p>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		<div class="team__button">
			<button type="button" class="button">Xem thêm</button>
		</div>
	</div>
</section>

<!-- Tìm hiểu về chúng tôi -->
<section class="tim_hieu_them">

</section>

<?php
get_footer();
