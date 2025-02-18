<?php

/**
 * Template name: Giới thiệu về Ulytan
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
<!-- Banner -->
<?php
$banner_title = get_field('banner_title') ?? null;
$banner_desc = get_field('banner_desc') ?? null;
?>
<section class="banner">
	<?php if ($banner_title): ?>
		<div class="gioithieu_banner">
			<div class="container">
				<div class="row">
					<div class="col-10">
						<h1 class="gioithieu_banner__title"><?php echo $banner_title; ?></h1>
						<?php if ($banner_desc): ?>
							<div class="gioithieu_banner__desc">
								<?php echo $banner_desc; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>

<!-- PDF -->
<?php
$title_pdf = get_field('title_pdf') ?? null;

$link_pdf = get_field('link_pdf') ?? null;
?>
<section class="file_pdf">
	<div class="container">
		<h6 class="file_pdf_title text-center">
			<?php echo $title_pdf; ?>
		</h6>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="file_pdf_inner">
					<?php echo $link_pdf;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Câu truyện thương hiệu -->
<?php
$subtitle_brand = get_field('subtitle_brand') ?? null;
$brand_title = get_field('brand_title') ?? null;
$brand_content = get_field('brand_content') ?? null;
?>
<section class="thuong_hieu">
	<div class="container">
		<div class="thuong_hieu_inner">
			<h6 class="thuong_hieu_subtitle"><?php echo $subtitle_brand; ?></h6>
			<h2 class="thuong_hieu_title"><?php echo $brand_title; ?></h2>
			<div class="thuong_hieu_content editor">
				<?php echo $brand_content; ?>
			</div>
		</div>
	</div>
</section>

<!-- Giá trị doanh nghiệp -->
<?php
$subtitle_business = get_field('subtitle_business') ?? '';
$title_business = get_field('title_business') ?? '';
$desc_business = get_field('desc_business') ?? '';
$content_business = get_field('content_business') ?? [];
?>
<section class="gia_tri">
	<div class="container">
		<div class="gia_tri_container">
			<h6 class="gia_tri_subtitle"><?php echo $subtitle_business; ?></h6>
			<h2 class="gia_tri_title"><?php echo $title_business; ?></h2>
			<p class="gia_tri_desc editor">
				<?php echo $desc_business; ?>
			</p>
			<div class="row gia_tri_row">
				<?php
				if ($content_business && is_array($content_business)):
					foreach ($content_business as $content_item): ?>
						<div class="gia_tri_col col-12 col-md-6 col-lg-4">
							<div class="gia_tri_content_item" data-mh="gia_tri_content_item">
								<img class="gia_tri_content_item_img" src="<?php echo $content_item['image'] ?>" alt="">
								<div class="gia_tri_content_item_title">
									<?php echo $content_item['title'] ?>
								</div>
								<p class="gia_tri_content_item_desc">
									<?php echo $content_item['content'] ?>
								</p>
							</div>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
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
			<h6 class="doi_ngu_subtitle"><?php echo $subtitle_team; ?></h6>
			<h2 class="doi_ngu_title"><?php echo $title_team; ?></h2>
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

<!-- Văn hóa công ty -->
<?php
$subtitle_culture = get_field('subtitle_culture') ?? null;
$title_culture = get_field('title_culture') ?? null;
$desc_culture = get_field('desc_culture') ?? null;
$content_cultures = get_field('content_culture') ?? [];
?>
<section class="van_hoa">
	<div class="container">
		<div class="van_hoa_container">
			<h6 class="van_hoa_subtitle"><?php echo $subtitle_culture; ?></h6>
			<h2 class="van_hoa_title"><?php echo $title_culture; ?></h2>
			<p class="van_hoa_desc">
				<?php echo $desc_culture; ?>
			</p>
			<div class="row van_hoa_row">
				<?php
				if ($content_cultures && is_array($content_cultures)):
					foreach ($content_cultures as $content_culture):
				?>
						<div class="van_hoa_col col-12 col-md-6 col-lg-4">
							<div class="van_hoa_content_item" data-mh="van_hoa_content_item">
								<div class="van_hoa_content_item_img">
									<img src="<?php echo $content_culture['image'] ?>" alt="">
								</div>
								<div class="van_hoa_content_item_title">
									<?php echo $content_culture['title'] ?>
								</div>
								<p class="van_hoa_content_item_desc">
									<?php echo $content_culture['content'] ?>
								</p>
							</div>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<!-- Đối tác của chúng tôi -->
<?php
$args = array(
	'post_type' => 'our_partners',
	'posts_per_page' => -1,
);
$query = new WP_Query($args);
if ($query->have_posts()):
?>
	<section class="secSpace doi_tac_ulytan bg-light">
		<div class="container">
			<h2 class="sec_title text-center">
				Đối tác của chúng tôi
			</h2>

			<div class="doi_tac_ulytan_slider">
				<?php
				while ($query->have_posts()):
					$query->the_post();
				?>
					<div>
						<div class="about_us_video doi_tac_ulytan_item">
							<?php
							$image = get_field('image') ?? '';
							$iframe = get_field('iframe_youtube') ?? '';
							if ($image && $iframe) :
								$iframe_url = getYoutubeEmbedUrl($iframe);
							?>
								<div class="videoBlock">
									<div class="videoBlock__inner" data-mh="videoBlock__inner">
										<img class="videoBlock__img" src="<?php echo $image; ?>">
										<div class="videoBlock__overlay"></div>
										<div class="videoBlock__videoAction">
											<a href="javascript:void(0);" class="videoBlock__playAction" data-toggle="modal" data-target="#videoUrl" data-src="<?php echo $iframe_url; ?>">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9l0-176c0-8.7 4.7-16.7 12.3-20.9z"></path>
												</svg>
											</a>
										</div>
									</div>
								</div>
							<?php
							endif;
							?>
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
<!-- end -->

<!-- Thành tựu -->
<?php
$title_achievement = get_field('title_achievement') ?? null;
$thanh_tuu_bg = get_field('thanh_tuu_bg') ?? '';
$content_achievements = get_field('content_achievement') ?? [];
?>
<section class="thanh_tuu" style="background-image: url('<?php echo $thanh_tuu_bg; ?>');">
	<div class="container">
		<div class="thanh_tuu_container">
			<h2 class="thanh_tuu_title"><?php echo $title_achievement; ?></h2>
			<div class="row thanh_tuu_row">
				<?php
				if ($content_achievements && is_array($content_achievements)) :
					foreach ($content_achievements as $item):
						if ($item['title'] && $item['desc']):
				?>
							<div class="thanh_tuu_col col-12 col-md-6 col-lg-4">
								<div class="thanh_tuu_content_item" data-mh="thanh_tuu_content_item">
									<div class="thanh_tuu_content_item_title">
										<?php echo $item['title']; ?>
									</div>
									<div class="thanh_tuu_content_item_desc">
										<?php echo $item['desc']; ?>
									</div>
								</div>
							</div>
				<?php
						endif;
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<!-- Kiến thức nhận được -->
<?php
$title_knowledge = get_field('title_knowledge') ?? null;
$content_knowledge = get_field('content_knowledge') ?? [];
?>
<section class="kien_thuc">
	<div class="container">
		<h2 class="kien_thuc_title text-center mb-4 mb-lg-5"><?php echo $title_knowledge; ?></h2>
		<?php
		if ($content_knowledge && is_array($content_knowledge)) :
		?>
			<!-- Tab Titles -->
			<ul class="nav nav-tabs justify-content-center" role="tablist">
				<?php $tab_index = 1; ?>
				<?php foreach ($content_knowledge as $index => $tab): ?>
					<li class="nav-item">
						<a class="nav-link <?php echo ($index === 0) ? 'active' : ''; ?>" data-toggle="tab"
							href="#tab-<?php echo $tab_index; ?>" role="tab">
							<?php echo esc_html($tab['title_tab']); ?>
						</a>
					</li>
					<?php $tab_index++; ?>
				<?php endforeach; ?>
			</ul>

			<!-- Tab Content -->
			<div class="tab-content">
				<?php $tab_index = 1; ?>
				<?php foreach ($content_knowledge as $index => $tab): ?>
					<div class="tab-pane <?php echo ($index === 0) ? 'active' : ''; ?>" id="tab-<?php echo $tab_index; ?>"
						role="tabpanel">
						<div class="row">
							<div class="col-12 col-lg-9">
								<div class="content editor">
									<?php echo $tab['content']; ?>
								</div>
								<div class="kien_thuc_button">
									<?php if (!empty($tab['button_1']["url"]) && !empty($tab['button_1']["title"])): ?>
										<a class="button button_1" href="<?php echo $tab['button_1']["url"]; ?>">
											<?php echo $tab['button_1']["title"]; ?>
										</a>
									<?php endif; ?>

									<?php if (!empty($tab['button_2']["url"]) && !empty($tab['button_2']["title"])): ?>
										<a class="button button_2" href="<?php echo $tab['button_2']["url"]; ?>">
											<?php echo $tab['button_2']["title"]; ?>
										</a>
										<!--  -->
									<?php endif; ?>
								</div>
							</div>
							<div class="col-12 col-lg-3 mt-4 mt-lg-0">
								<?php if (!empty($tab['image'])): ?>
									<img src="<?php echo esc_url($tab['image']); ?>" class="img-fluid">
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php $tab_index++; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
