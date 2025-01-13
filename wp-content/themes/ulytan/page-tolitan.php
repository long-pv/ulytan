<?php

/**
 * Template name: Page tolitan
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


<?php
$author_title = get_field('author_title') ?? '';
$author_subtitle = get_field('author_subtitle') ?? '';
$author_content = get_field('author_content') ?? '';
$author_image = get_field('author_image') ?? '';
if ($author_content) :
?>
	<section class="banner_author secSpace bg-primary">
		<div class="container">
			<div class="row row_24">
				<div class="col-md-6 col-lg-7 text-white">
					<?php if ($author_title) : ?>
						<div class="title">
							<h1><?php echo $author_title; ?></h1>
						</div>
					<?php endif; ?>
					<?php if ($author_subtitle) : ?>
						<div class="subtitle">
							<h6><?php echo $author_subtitle; ?></h6>
							<div>
								<svg width="121" height="3" viewBox="0 0 121 3" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect y="0.0399933" width="121" height="2.4" fill="url(#paint0_linear_2921_1027)"/>
									<defs>
									<linearGradient id="paint0_linear_2921_1027" x1="-0.000611732" y1="1.27167" x2="121.001" y2="1.20832" gradientUnits="userSpaceOnUse">
									<stop offset="0.4716" stop-color="#F7F7F7"/>
									<stop offset="0.9998" stop-color="#721326"/>
									</linearGradient>
									</defs>
								</svg>
							</div>
						</div>
					<?php endif; ?>
					<div class="editor">
						<?php echo $author_content; ?>
					</div>
				</div>
				<div class="col col-lg-1"></div>
				<?php if ($author_image) : ?>
					<div class="col-md-6 col-lg-4">
						<div class="banner_landing_img_wrap">
							<img class="banner_landing_img" src="<?php echo $author_image; ?>" alt="<?php echo $author_title; ?>">
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>



<?php
$startup_story_title = get_field('startup_story_title') ?? '';
$startup_story_content = get_field('startup_story_content') ?? '';
$startup_story_image = get_field('startup_story_image') ?? '';
$startup_story_capstion_image = get_field('startup_story_capstion_image') ?? '';
if ($startup_story_content) :
?>
	<section class="section_startup_story secSpace">
		<div class="container">
			<div class="row row_24 align-items-center">
				<?php if ($startup_story_image) : ?>
					<div class="col-md-6 col-lg-4">
						<figure>
							<img class="img-fluid" src="<?php echo $startup_story_image; ?>" alt="<?php echo $startup_story_title; ?>">
							<figcaption class="mt-3 font-weight-bold"><?php echo $startup_story_capstion_image; ?></figcaption>
						</figure>
					</div>
				<?php endif; ?>
				<div class="col-md-6 col-lg-8">
					<div class="ml-lg-4">
						<?php if ($startup_story_title) : ?>
							<div class="title">
								<h2><?php echo $startup_story_title; ?></h2>
							</div>
						<?php endif; ?>
						<div class="editor">
							<?php echo $startup_story_content; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php
$founder_title = get_field('founder_title') ?? '';
$founder_content = get_field('founder_content') ?? '';
$founder_subcontent = get_field('founder_subcontent') ?? '';
$founder_image = get_field('founder_image') ?? '';
if ($founder_content) :
?>
	<div class="container">
		<hr>
	</div>
	<section class="section_founder secSpace">
		<div class="container">
			<?php if ($founder_title) : ?>
				<div class="title text-center">
					<h2><?php echo $founder_title; ?></h2>
				</div>
			<?php endif; ?>
			<div class="editor">
				<?php echo $founder_content; ?>
			</div>

			<?php if ($founder_subcontent) : ?>
				<div class="row mt-4">
					<?php foreach ($founder_subcontent as $item) : ?>
						<div class="col-md-6 col-lg-6">
							<div class="founder_subcontent">
								<h3 class="title">
									<?php echo $item['title']; ?>
								</h3>
								<div class="editor">
									<?php echo $item['content']; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			
			<?php if ($founder_image) : ?>
				<div class="founder_image mt-4">
					<figure>
						<img class="img-fluid" src="<?php echo $founder_image; ?>" alt="<?php echo $founder_title; ?>">
					</figure>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>



<?php
$achievements_title = get_field('achievements_title') ?? '';
$achievements_content = get_field('achievements_content') ?? '';
$achievements_image = get_field('achievements_image') ?? '';
$achievements_gallery = get_field('achievements_gallery') ?? '';
if ($achievements_content) :
?>
	<div class="container">
		<hr>
	</div>
	<section class="section_achievements secSpace">
		<div class="container">
			<div class="row row_24 align-items-center">
				<?php if ($achievements_image) : ?>
					<div class="col-md-6 col-lg-6">
						<figure>
							<img class="img-fluid" src="<?php echo $achievements_image; ?>" alt="<?php echo $achievements_title; ?>">
						</figure>
					</div>
				<?php endif; ?>
				<div class="col-md-6 col-lg-6">
					<div class="ml-lg-4">
						<?php if ($achievements_title) : ?>
							<div class="title">
								<h2><?php echo $achievements_title; ?></h2>
							</div>
						<?php endif; ?>
						<div class="editor">
							<?php echo $achievements_content; ?>
						</div>
					</div>
				</div>
			</div>

			<?php if ($achievements_gallery) : ?>
				<div class="achievements_gallery mt-5">
					<div class="row">
						<?php foreach( $achievements_gallery as $image_id ): ?>
							<div class="col-6 col-lg-4">
								<img class="img-fluid mt-4" src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


<?php
$event_title = get_field('event_title') ?? '';
$event_content = get_field('event_content') ?? '';
$event_image = get_field('event_image') ?? '';
if ($event_content) :
?>
	<section class="section_event secSpace">
		<div class="container text-center">
			<?php if ($event_title) : ?>
				<div class="title">
					<h2><?php echo $event_title; ?></h2>
				</div>
			<?php endif; ?>
			<div class="editor">
				<?php echo $event_content; ?>
			</div>

			<?php if ($event_image) : ?>
				<div class="event_image mt-5">
					<div class="row">
						<?php foreach( $event_image as $image_id ): ?>
							<div class="col-6 col-lg-4">
								<img class="img-fluid mt-4" src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>



<?php
$posts_title = get_field('posts_title') ?? '';
$posts_list = get_field('posts_list') ?? '';
if ($posts_list) :
?>
	<section class="section_posts secSpace">
		<div class="container">
			<?php if ($posts_title) : ?>
				<div class="title text-center">
					<h2 class="h2 mb-4"><?php echo $posts_title; ?></h2>
				</div>
			<?php endif; ?>

			<?php if ( $posts_list ) : ?>
				<?php foreach ($posts_list as $index=>$post) : setup_postdata($post); ?>
					<?php if($index === array_key_first($posts_list)) : ?>
						<?php ob_start(); ?>
						<div class="item_post has_thumbnail shadow mb-5 bg-white">
							<?php if ( has_post_thumbnail() ) : ?>
								<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
							<div class="p-3">
								<h3 class="h4 font-italic mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<i class="small"><?php the_date(); ?></i>
								<?php the_excerpt(); ?>
							</div>
						</div>
						<?php $post_first[] = ob_get_clean(); ?>
					<?php else : ?>
						<?php ob_start(); ?>
						<div class="item_post shadow mb-4 bg-white p-3">
							<h3 class="h6 font-italic"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
						<?php $post_other[] = ob_get_clean(); ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="row">
				<div class="col-lg-6 post_first">
					<?php echo join('', $post_first); ?>
				</div>
				<div class="col-lg-6 list_post_other">
					<?php echo join('', $post_other); ?>
				</div>
			</div>
		</div>
	</section>
<?php wp_reset_postdata(); endif; ?>




<?php
$project_title = get_field('project_title') ?? '';
$project_list = get_field('project_list') ?? '';
if ($project_list) :
?>
	<section class="project_list secSpace">
		<div class="container">
			<?php if ($project_title) : ?>
				<div class="title text-center">
					<h2><?php echo $project_title; ?></h2>
				</div>
			<?php endif; ?>

			<?php if ($project_list) : ?>
				<div class="project_list_slider">
					<?php foreach ($project_list as $item) : ?>
						<div class="item">
							<div class="image_bg">
								<img class="w-100 object-fit-cover" src="<?php echo esc_url($item['image_bg']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
							</div>
							<div class="wrap-content">
								<h3 class="titile h6">
									<?php echo $item['titile']; ?>
								</h3>
								<div>
									<img class="d-inline-flex img-fluid" src="<?php echo esc_url($item['logo']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
								</div>
								<div class="editor my-3">
									<?php echo $item['content']; ?>
								</div>
								<a href="<?php echo $item['link']; ?>" class="link">Chi tiết →</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>




<?php
$fl_title = get_field('fl_title') ?? '';
$social = get_field('social') ?? '';
if ($social) :
?>
	<section class="section_social secSpace">
		<div class="container">
			<?php if ($fl_title) : ?>
				<div class="title text-center">
					<h2><?php echo $fl_title; ?></h2>
				</div>
			<?php endif; ?>

			<?php if ($social) : ?>
				<div class="social_list mt-4">
					<?php foreach ($social as $item) : ?>
						<div class="item">
							<div class="icon">
								<a href="<?php echo $item['link']; ?>" target="_blank" class="link">
									<img class="img-fluid" src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
								</a>
							</div>
							<h3 class="title h6">
								<a href="<?php echo $item['link']; ?>" target="_blank" class="link">
									<?php echo $item['title']; ?>
								</a>
							</h3>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

 
 <?php
 get_footer();
 