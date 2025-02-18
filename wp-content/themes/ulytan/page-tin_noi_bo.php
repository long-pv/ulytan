<?php

/**
 * Template name: Tin nội bộ
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

<section class="secSpace video_hoat_dong">
	<div class="container">
		<?php
		wp_breadcrumbs();
		?>

		<h2 class="sec_title text-center">
			<?php echo get_field('tieu_de_1'); ?>
		</h2>

		<?php
		$activity_videos_array = [];
		$index = 1;
		$index_arr = 1;

		$args = array(
			'post_type' => 'activity_videos',
			'posts_per_page' => -1,
		);
		$query = new WP_Query($args);
		if ($query->have_posts()):

			while ($query->have_posts()):
				$query->the_post();

				$title = get_the_title();
				$image = get_field('image') ?? '';
				$desc = get_field('mo_ta') ?? '';
				$iframe = get_field('iframe_youtube') ?? '';

				if ($title && $image && $iframe) :
					$iframe_video = getYoutubeEmbedUrl($iframe);

					$activity_videos_array[$index_arr][] = [
						'title' => $title,
						'image' => $image,
						'desc' => $desc,
						'iframe' => $iframe_video,
					];

					if (($index % 2 == 0) && ($index % 3 == 0)) {
						$index_arr++;
					}

					$index++;
				endif;
			endwhile;
		endif;
		wp_reset_postdata();
		?>

		<div class="video_hoat_dong_slider">
			<?php
			if ($activity_videos_array):
				foreach ($activity_videos_array as $item_1):
			?>
					<div>
						<div class="video_hoat_dong_loop">
							<div class="row video_hoat_dong_loop_row">
								<?php
								if ($item_1) :
									foreach ($item_1 as $item_2):
								?>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="video_hoat_dong_item">
												<?php
												video_popup($item_2['iframe'], $item_2['image']);
												?>
												<h3 class="video_hoat_dong_item_title">
													<?php echo $item_2['title']; ?>
												</h3>
												<div class="video_hoat_dong_item_desc">
													<?php echo $item_2['desc']; ?>
												</div>
											</div>
										</div>
								<?php
									endforeach;
								endif;
								?>
							</div>
						</div>
					</div>
			<?php
				endforeach;
			endif;
			?>
		</div>
	</div>
</section>


<section class="secSpace--bottom hinh_anh_hoat_dong">
	<div class="container">
		<h2 class="sec_title text-center">
			<?php echo get_field('tieu_de_2'); ?>
		</h2>

		<?php
		$danh_sach_hinh_anh = get_field('danh_sach_hinh_anh') ?? [];
		$index = 1;
		if ($danh_sach_hinh_anh):
		?>
			<div class="row hinh_anh_hoat_dong_row">
				<?php
				foreach ($danh_sach_hinh_anh as $key => $item):
				?>
					<div class="col-12 col-md-6 hinh_anh_hoat_dong_col <?php echo ($index > 15) ? 'd-none' : ''; ?>">
						<div class="hinh_anh_hoat_dong_img_block">
							<img src="<?php echo $item; ?>" alt="hình ảnh <?php echo $key + 1; ?>">
						</div>
					</div>
				<?php
					$index++;
				endforeach;
				?>
			</div>

			<?php
			if ($index > 15) :
			?>
				<div class="hinh_anh_hoat_dong_btn_block">
					<button type="button" class="hinh_anh_hoat_dong_btn">
						Xem thêm
					</button>
				</div>
			<?php endif; ?>
		<?php
		endif;
		?>
	</div>
</section>

<?php
get_footer();
