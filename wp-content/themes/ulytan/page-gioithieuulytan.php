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
							<p class="gioithieu_banner__desc">
								<?php echo $banner_desc; ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>

<!-- PDF -->
<?php
$link_pdf = get_field('link_pdf') ?? null;
?>

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
$subtitle_business = get_field('subtitle_business') ?? null;
$title_business = get_field('title_business') ?? null;
$desc_business = get_field('desc_business') ?? null;
$content_business = get_field('content_business') ?? null;
?>
<section class="gia_tri">
	<div class="container">
		<h6 class="gia_tri_subtitle"><?php echo $subtitle_business; ?></h6>
		<h2 class="gia_tri_title"><?php echo $title_business; ?></h2>
		<p class="gia_tri_desc editor">
			<?php echo $desc_business; ?>
		</p>
		<div class="row gia_tri_row">
			<?php foreach ($content_business as $content_item): ?>
				<div class="col-lg-4">
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
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Đội ngũ -->
<?php
$subtitle_team = get_field('subtitle_team') ?? null;
$title_team = get_field('title_team') ?? null;
$members = get_field('members') ?? null;
?>

<section class="doi_ngu">
	<div class="container">
		<h6 class="doi_ngu_subtitle"><?php echo $subtitle_team; ?></h6>
		<h2 class="doi_ngu_title"><?php echo $title_team; ?></h2>
		<div class="row doi_ngu_row">
			<?php foreach ($members as $member): ?>
				<div class="col-4 mb-5">
					<div class="team-member">
						<div class="team-member_wrapper">
							<div class="team-member__image-wrapper">
								<div class="team-member__circle team-member__circle--light"></div>
								<div class="team-member__circle team-member__circle--dark"></div>
								<?php if (!empty($member['img_member'])): ?>
									<img class="team_memeber__image" src="<?php echo $member['img_member']; ?>"
										alt="Đỗ Anh Việt">
								<?php endif; ?>
							</div>
							<div class="team-member__content">
								<div class="team-member__name">Đỗ Anh Việt</div>
								<div class="team-member__position">CEO & Head of Product</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Văn hóa công ty -->
<?php
$subtitle_culture = get_field('subtitle_culture') ?? null;
$title_culture = get_field('title_culture') ?? null;
$desc_culture = get_field('desc_culture') ?? null;
$content_cultures = get_field('content_culture') ?? null;
?>
<section class="van_hoa">
	<div class="container">
		<h6 class="van_hoa_subtitle"><?php echo $subtitle_culture; ?></h6>
		<h2 class="van_hoa_title"><?php echo $title_culture; ?></h2>
		<p class="van_hoa_desc">
			<?php echo $desc_culture; ?>
		</p>
		<div class="row van_hoa_row">
			<?php foreach ($content_cultures as $content_culture): ?>
				<div class="col-lg-4">
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
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Thành tựu -->
<?php
$title_achievement = get_field('title_achievement') ?? null;
$content_achievements = get_field('content_achievement') ?? null;
?>
<section class="thanh_tuu">
	<div class="container">
		<h2 class="thanh_tuu_title"><?php echo $title_achievement; ?></h2>
		<div class="row thanh_tuu_row">
			<?php foreach ($content_achievements as $content_achievement): ?>
				<div class="col-lg-4">
					<div class="thanh_tuu_content_item" data-mh="thanh_tuu_content_item">
						<div class="thanh_tuu_content_item_title">
							<?php echo $content_achievement['title'] ?>
						</div>
						<div class="thanh_tuu_content_item_desc">
							<?php echo $content_achievement['desc'] ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Kiến thức nhận được -->
<?php
$title_knowledge = get_field('title_knowledge') ?? null;
$content_knowledge = get_field('content_knowledge') ?? null;
?>
<section class="kien_thuc">
	<div class="container text-center">
		<h2><?php echo $title_knowledge; ?></h2>
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
					type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile"
					type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact"
					type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
			<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
		</div>
	</div>
</section>

<?php
get_footer();
