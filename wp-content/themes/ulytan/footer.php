<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ulytan
 */

?>

</main>
<!-- end main body -->

<?php
/* if (is_page_template('page-contact-test.php')) :
?>
    <div class="headquarters secSpace">
        <div class="container">
            <div class="headquarters_list">
                <?php
                $headquarters = get_field('headquarters', 'option') ?? [];
                if ($headquarters):
                    foreach ($headquarters as $index_item => $item):
                ?>
                        <div class="headquarters_item">

                            <h3 class="headquarters_item_title">
                                <a class="d-flex justify-content-between" data-toggle="collapse" href="#headquarters<?php echo $index_item; ?>" role="button" aria-expanded="false" aria-controls="headquarters<?php echo $index_item; ?>">
                                    <span><?php echo $item['title']; ?></span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </span>
                                </a>
                            </h3>
                            <div class="collapse multi-collapse" id="headquarters<?php echo $index_item; ?>">
                                <div class="headquarters_item_content">
                                    <?php
                                    if ($item['address_maps']):
                                        foreach ($item['address_maps'] as $address_maps_item):
                                    ?>
                                            <div class="row mb-5">
                                                <div class="col-lg-7">
                                                    <div class="editor">
                                                        <?php echo $address_maps_item['content']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="headquarters_item_iframe">
                                                        <?php echo $address_maps_item['google_map']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
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
<?php endif; */ ?>


<?php
$tieu_de_1 = get_field('tieu_de_1', 'option') ?: 'LIÊN HỆ';
$tieu_de_2 = get_field('tieu_de_2', 'option') ?: 'Dịch vụ tại ulytan';
$tieu_de_3 = get_field('tieu_de_3', 'option') ?: 'Tuyển dụng';
$tieu_de_4 = get_field('tieu_de_4', 'option') ?: 'Chính sách';
$tieu_de_5 = get_field('tieu_de_5', 'option') ?: 'Khách hàng thân thiết';
$tieu_de_6 = get_field('tieu_de_1', 'option') ?: 'Kết nối với chúng tôi';
$thong_tin_doanh_nghiep = get_field('thong_tin_doanh_nghiep', 'option') ?? '';
?>
<footer class="secSpace footer footer_bg bg-primary">
    <div class="container">
        <div class="row footer_row row_24">
            <div class="col-lg-3">
                <div>
                    <h3 class="footer_title">
                        <?php echo $tieu_de_1; ?>
                    </h3>
                    <div class="footer_info">
                        <?php echo $thong_tin_doanh_nghiep; ?>
                    </div>
                </div>

                <div class="mt-3 mt-lg-4">
                    <h3 class="footer_title">
                        <?php echo $tieu_de_6; ?>
                    </h3>
                    <div class="footer_mxh">
                        <?php
                        $facebook = get_field('facebook', 'option') ?: 'javascript:void(0);';
                        if ($facebook):
                            ?>
                            <a href="<?php echo $facebook; ?>" target=" _blank" class="footer_mxh_item">
                                <svg width="35" height="35" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="24" cy="24" r="20" fill="#3B5998" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M29.315 16.9578C28.6917 16.8331 27.8498 16.74 27.3204 16.74C25.8867 16.74 25.7936 17.3633 25.7936 18.3607V20.1361H29.3774L29.065 23.8137H25.7936V35H21.3063V23.8137H19V20.1361H21.3063V17.8613C21.3063 14.7453 22.7708 13 26.4477 13C27.7252 13 28.6602 13.187 29.8753 13.4363L29.315 16.9578Z"
                                        fill="white" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php
                        $youtube = get_field('youtube', 'option') ?: 'javascript:void(0);';
                        if ($youtube):
                            ?>
                            <a href="<?php echo $youtube; ?>" target=" _blank" class="footer_mxh_item">
                                <svg width="35" height="36" viewBox="0 0 35 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.600098" width="35" height="35" rx="17.5" fill="#FC0D1C" />
                                    <g clip-path="url(#clip0_4191_267)">
                                        <path
                                            d="M19.3124 20.7072V22.5912C19.3124 22.99 19.1963 23.1894 18.9641 23.1894C18.8272 23.1894 18.6933 23.1239 18.5624 22.993V20.3055C18.6933 20.1745 18.8272 20.109 18.9641 20.109C19.1963 20.109 19.3124 20.3084 19.3124 20.7072ZM22.3302 20.7162V21.1269H21.5266V20.7162C21.5266 20.3114 21.6606 20.109 21.9284 20.109C22.1963 20.109 22.3302 20.3114 22.3302 20.7162ZM13.7052 18.7697H14.6606V17.9305H11.8749V18.7697H12.8124V23.8501H13.7052V18.7697ZM16.2766 23.8501H17.0713V19.4394H16.2766V22.8144C16.0981 23.0644 15.9284 23.1894 15.7677 23.1894C15.6606 23.1894 15.5981 23.1269 15.5802 23.0019C15.5743 22.984 15.5713 22.8799 15.5713 22.6894V19.4394H14.7766V22.9305C14.7766 23.2221 14.8005 23.4394 14.8481 23.5822C14.9195 23.8025 15.0921 23.9126 15.3659 23.9126C15.6516 23.9126 15.9552 23.7311 16.2766 23.368V23.8501ZM20.107 22.5287V20.7697C20.107 20.3352 20.0802 20.0406 20.0266 19.8858C19.9255 19.5525 19.7141 19.3858 19.3927 19.3858C19.0951 19.3858 18.8183 19.5465 18.5624 19.868V17.9305H17.7677V23.8501H18.5624V23.4215C18.8302 23.7489 19.107 23.9126 19.3927 23.9126C19.7141 23.9126 19.9255 23.7489 20.0266 23.4215C20.0802 23.2608 20.107 22.9632 20.107 22.5287ZM23.1249 22.4394V22.3233H22.3124C22.3124 22.6269 22.3064 22.8084 22.2945 22.868C22.2528 23.0822 22.1338 23.1894 21.9374 23.1894C21.6636 23.1894 21.5266 22.984 21.5266 22.5733V21.7965H23.1249V20.8769C23.1249 20.4066 23.0445 20.0614 22.8838 19.8412C22.6516 19.5376 22.3362 19.3858 21.9374 19.3858C21.5326 19.3858 21.2141 19.5376 20.982 19.8412C20.8153 20.0614 20.732 20.4066 20.732 20.8769V22.4215C20.732 22.8918 20.8183 23.237 20.9909 23.4572C21.2231 23.7608 21.5445 23.9126 21.9552 23.9126C22.3838 23.9126 22.7052 23.7549 22.9195 23.4394C23.0266 23.2787 23.0891 23.118 23.107 22.9572C23.1189 22.9037 23.1249 22.7311 23.1249 22.4394ZM17.6963 14.2876V12.4126C17.6963 12.0019 17.5683 11.7965 17.3124 11.7965C17.0564 11.7965 16.9284 12.0019 16.9284 12.4126V14.2876C16.9284 14.7043 17.0564 14.9126 17.3124 14.9126C17.5683 14.9126 17.6963 14.7043 17.6963 14.2876ZM24.1159 20.993C24.1159 22.3858 24.0386 23.4275 23.8838 24.118C23.8005 24.4691 23.6278 24.7638 23.3659 25.0019C23.104 25.24 22.8005 25.3769 22.4552 25.4126C21.36 25.5376 19.7082 25.6001 17.4999 25.6001C15.2915 25.6001 13.6397 25.5376 12.5445 25.4126C12.1993 25.3769 11.8942 25.24 11.6293 25.0019C11.3644 24.7638 11.1933 24.4691 11.1159 24.118C10.9612 23.4513 10.8838 22.4096 10.8838 20.993C10.8838 19.6001 10.9612 18.5584 11.1159 17.868C11.1993 17.5168 11.3719 17.2221 11.6338 16.984C11.8957 16.7459 12.2022 16.606 12.5534 16.5644C13.6427 16.4453 15.2915 16.3858 17.4999 16.3858C19.7082 16.3858 21.36 16.4453 22.4552 16.5644C22.8005 16.606 23.1055 16.7459 23.3704 16.984C23.6353 17.2221 23.8064 17.5168 23.8838 17.868C24.0386 18.5346 24.1159 19.5763 24.1159 20.993ZM15.2052 9.6001H16.1159L15.0356 13.1626V15.5822H14.1427V13.1626C14.0594 12.7221 13.8778 12.0912 13.5981 11.2697C13.3778 10.6566 13.1844 10.1001 13.0177 9.6001H13.9641L14.5981 11.9483L15.2052 9.6001ZM18.5088 12.5733V14.1358C18.5088 14.618 18.4255 14.9691 18.2588 15.1894C18.0326 15.493 17.7171 15.6447 17.3124 15.6447C16.9136 15.6447 16.6011 15.493 16.3749 15.1894C16.2082 14.9632 16.1249 14.612 16.1249 14.1358V12.5733C16.1249 12.0971 16.2082 11.7489 16.3749 11.5287C16.6011 11.2251 16.9136 11.0733 17.3124 11.0733C17.7171 11.0733 18.0326 11.2251 18.2588 11.5287C18.4255 11.7489 18.5088 12.0971 18.5088 12.5733ZM21.4999 11.1269V15.5822H20.6874V15.0912C20.3719 15.4602 20.0653 15.6447 19.7677 15.6447C19.4939 15.6447 19.3183 15.5346 19.2409 15.3144C19.1933 15.1715 19.1695 14.9483 19.1695 14.6447V11.1269H19.982V14.4037C19.982 14.6001 19.985 14.7043 19.9909 14.7162C20.0088 14.8471 20.0713 14.9126 20.1784 14.9126C20.3391 14.9126 20.5088 14.7846 20.6874 14.5287V11.1269H21.4999Z"
                                            fill="#FFFFFF" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4191_267">
                                            <rect width="13.72" height="16" fill="white"
                                                transform="matrix(1 0 0 -1 10.6399 25.6001)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php
                        $tiktok = get_field('tiktok', 'option') ?: 'javascript:void(0);';
                        if ($tiktok):
                            ?>
                            <a href="<?php echo $tiktok; ?>" target="_blank" class="footer_mxh_item">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="35" height="35" rx="17.5" fill="black" />
                                    <path
                                        d="M24.731 13.13V16.0675C24.218 16.0179 23.554 15.901 22.8168 15.6301C21.8553 15.2769 21.1392 14.7935 20.6712 14.419V20.3577L20.6598 20.3391C20.6677 20.4569 20.6712 20.5764 20.6712 20.6977C20.6712 23.6475 18.2785 26.0476 15.3356 26.0476C12.3928 26.0476 10 23.6467 10 20.6977C10 17.7487 12.3928 15.3468 15.3356 15.3468C15.6235 15.3468 15.906 15.3698 16.1824 15.4141V18.31C15.9166 18.2144 15.6323 18.163 15.3356 18.163C13.9423 18.163 12.8078 19.2998 12.8078 20.6977C12.8078 22.0956 13.9423 23.2323 15.3356 23.2323C16.7289 23.2323 17.8635 22.0947 17.8635 20.6977C17.8635 20.6454 17.8626 20.5932 17.8591 20.541V9H20.7878C20.7984 9.24877 20.809 9.49932 20.8187 9.74809C20.8381 10.2377 21.012 10.7078 21.3149 11.0929C21.6707 11.5453 22.1952 12.0712 22.9333 12.4908C23.6238 12.883 24.2719 13.0512 24.731 13.1309V13.13Z"
                                        fill="#FFFFFF" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <?php /* ?>
<div class="col-lg-6">
<div class="dich_vu_block">
<h3 class="footer_title">
<?php echo $tieu_de_2; ?>
</h3>

<div>
<div class="row">
<div class="col-lg-6">

  <?php
  $dich_vu_cot_1 = get_field('dich_vu_cot_1', 'option') ?? [];

  if ($dich_vu_cot_1):
      $args = array(
          'post_type' => 'service',
          'posts_per_page' => -1,
          'post__in' => $dich_vu_cot_1,
          'orderby' => 'post__in',
      );

      $query = new WP_Query($args);
      if ($query->have_posts()):
  ?>
          <div class="footer_list">
              <?php
              while ($query->have_posts()):
                  $query->the_post();
              ?>
                  <a href="<?php the_permalink(); ?>" class="footer_item_link">
                      <span class="icon">
                          <svg width="15" height="15" viewBox="0 0 15 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" />
                          </svg>
                      </span>

                      <?php the_title(); ?>
                  </a>
              <?php
              endwhile;
              ?>
          </div>
  <?php
      endif;
  endif;
  wp_reset_postdata();
  ?>
</div>
<div class="col-lg-6 mt-3 mt-lg-0">
  <?php
  $dich_vu_cot_2 = get_field('dich_vu_cot_2', 'option') ?? [];

  if ($dich_vu_cot_2):
      $args = array(
          'post_type' => 'service',
          'posts_per_page' => -1,
          'post__in' => $dich_vu_cot_2,
          'orderby' => 'post__in',
      );

      $query = new WP_Query($args);
      if ($query->have_posts()):
  ?>
          <div class="footer_list">
              <?php
              while ($query->have_posts()):
                  $query->the_post();
              ?>
                  <a href="<?php the_permalink(); ?>" class="footer_item_link">
                      <span class="icon">
                          <svg width="15" height="15" viewBox="0 0 15 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" />
                          </svg>
                      </span>

                      <?php the_title(); ?>
                  </a>
              <?php
              endwhile;
              ?>
          </div>
  <?php
      endif;
  endif;
  wp_reset_postdata();
  ?>
</div>
</div>
</div>
</div>
</div>
<?php */ ?>

            <div class="col-lg-4">
                <?php
                /*
                $danh_sach_van_phong = get_field('danh_sach_van_phong', 'option') ?? [];
                if ($danh_sach_van_phong):
                    foreach ($danh_sach_van_phong as $item):
                ?>
                        <div class="danh_sach_van_phong_item mb-4">
                            <h3 class="footer_title">
                                <?php echo $item['title']; ?>
                            </h3>
                            <div class="headquarters_item_content editor">
                                <?php echo $item['content']; ?>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                */

                $van_phong_plugins = get_field('van_phong_plugins', 'option') ?? '';
                if ($van_phong_plugins) {
                    ?>
                    <h3 class="footer_title">
                        Danh sách văn phòng
                    </h3>
                    <?php echo $van_phong_plugins; ?>
                    <?php
                }
                ?>
            </div>

            <div class="col-lg-2">
                <div>
                    <h3 class="footer_title">
                        <?php echo $tieu_de_3; ?>
                    </h3>

                    <?php
                    $tuyen_dung = get_field('tuyen_dung', 'option') ?? [];

                    if ($tuyen_dung):
                        $args = array(
                            'post_type' => ['post', 'page'],
                            'posts_per_page' => -1,
                            'post__in' => $tuyen_dung,
                            'orderby' => 'post__in',
                        );

                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            ?>
                            <div class="footer_list">
                                <?php
                                while ($query->have_posts()):
                                    $query->the_post();
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="footer_item_link">
                                        <span class="icon">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" />
                                            </svg>
                                        </span>

                                        <?php the_title(); ?>
                                    </a>
                                    <?php
                                endwhile;
                                ?>
                            </div>
                            <?php
                        endif;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="mt-3 mt-lg-4">
                    <h3 class="footer_title">
                        <?php echo $tieu_de_4; ?>
                    </h3>

                    <?php
                    $chinh_sach = get_field('chinh_sach', 'option') ?? [];

                    if ($chinh_sach):
                        $args = array(
                            'post_type' => ['post', 'page'],
                            'posts_per_page' => -1,
                            'post__in' => $chinh_sach,
                            'orderby' => 'post__in',
                        );

                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            ?>
                            <div class="footer_list">
                                <?php
                                while ($query->have_posts()):
                                    $query->the_post();
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="footer_item_link">
                                        <span class="icon">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" />
                                            </svg>
                                        </span>

                                        <?php the_title(); ?>
                                    </a>
                                    <?php
                                endwhile;
                                ?>
                            </div>
                            <?php
                        endif;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>

            </div>

            <div class="col-lg-3">
                <h3 class="footer_title">
                    <?php echo $tieu_de_5; ?>
                </h3>

                <?php
                $form_khuyen_mai = get_field('form_khuyen_mai', 'option') ?? null;
                if ($form_khuyen_mai):
                    ?>
                    <div class="footer_form">
                        <div class="arrow-down">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 0H27.5V20H39.6L20 39.6L0.400002 20H12.5V0Z" fill="#FFD503" />
                            </svg>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="' . $form_khuyen_mai . '" class="footer-form"]'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        $chung_nhan_dmca = get_field('chung_nhan_dmca', 'option') ?? '';
        if ($chung_nhan_dmca):
            ?>
            <div class="chung_nhan_dcma">
                <a target="_blank" href="<?php echo $chung_nhan_dmca; ?>" class="link">
                    <?php $logo_url = get_template_directory_uri() . '/assets/images/dmca-badge.png'; ?>
                    <img src="<?php echo $logo_url; ?>" alt="dcma">
                </a>
            </div>
        <?php endif; ?>
    </div>
</footer>

<div id="ajax-loader" style="display: none;">
    <!--<div class="spinner"></div>
    <div class="loading-wrapper">
        <div class="loading-spinner">
            <div></div><div></div><div></div><div></div><div></div><div></div>
            <div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>-->
    <div class='global-spinner-container'>
        <div class='spinners'>
            <div class='bar1'></div>
            <div class='bar2'></div>
            <div class='bar3'></div>
            <div class='bar4'></div>
            <div class='bar5'></div>
            <div class='bar6'></div>
            <div class='bar7'></div>
            <div class='bar8'></div>
            <div class='bar9'></div>
            <div class='bar10'></div>
            <div class='bar11'></div>
            <div class='bar12'></div>
        </div>
        <div class='spinner-message'>Loading...</div>
    </div>
</div>

<!-- modal video -->
<div class="modal modalVideo fade" id="videoUrl" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close modalVideo__close" data-dismiss="modal" aria-label="Close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6" stroke="#333333" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M18 18L6 6" stroke="#333333" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>

            <div class="modal-body p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$popup_thanh_cong_form = get_field('popup_thanh_cong_form', 'option') ?? [];
$popup_tieude = $popup_thanh_cong_form['tieu_de'] ?: 'ULYTAN - SIÊU NHANH, THỦ TỤC SIÊU ĐƠN GIẢN';
$popup_noidung = $popup_thanh_cong_form['noi_dung'] ?: 'Thành công! Bộ phận tư vấn của chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Chúc hợp tác thành công!';
$popup_mxh = $popup_thanh_cong_form['mxh'] ?: [];
?>
<div class="modal modal_lien_he modal_form_footer fade" id="modal_form_footer" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="modal_title">
                    <?php echo $popup_tieude; ?>
                </div>
                <div class="editor">
                    <?php echo $popup_noidung; ?>
                </div>

                <div class="chia_se_mxh">
                    <?php
                    $tiktok = $popup_mxh['mxh_tiktok'] ?? '';
                    $facebook = $popup_mxh['mxh_facebook'] ?? '';
                    $youtube = $popup_mxh['mxh_youtube'] ?? '';

                    if ($tiktok || $facebook || $youtube):
                        ?>
                        <div class="title">
                            Tìm hiểu thêm về ULYTAN
                        </div>
                        <div class="list_link">
                            <?php if ($tiktok): ?>
                                <a href="<?php echo $tiktok; ?>" target="_blank" class="mxh_tiktok">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if ($facebook): ?>
                                <a href="<?php echo $facebook; ?>" target="_blank" class="mxh_fb">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if ($youtube): ?>
                                <a href="<?php echo $youtube; ?>" target="_blank" class="mxh_yt">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                    <div class="title">
                        Chia sẻ điều này với mọi người trên
                    </div>
                    <?php
                    $share_link = get_permalink();
                    ?>
                    <div class="social_share_post">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_link; ?>"
                            onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                            class="social_share_post_facebook mxh_fb">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                            </svg>
                        </a>

                        <a href="https://twitter.com/home?status=<?php echo $share_link; ?>"
                            onclick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                            class="social_share_post_twitter mxh_tw">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<?php
$menu_dich_vu = get_field('menu_dich_vu', 'option') ?? [];
$mo_ta_dich_vu_nhom_1 = get_field('mo_ta_dich_vu_nhom_1', 'option') ?? '';
// $args = array(
//     'post_type'      => 'service',
//     'posts_per_page' => 40,
//     'post_status'    => 'publish',
// );

// $query = new WP_Query($args);
$menu_html = '';
$menu_html_mb = '';

// if ($query->have_posts()):
if ($menu_dich_vu):
    $menu_html_mb .= '<ul class="sub-menu">';

    $menu_html .= '<div class="sub_menu_dich_vu">';
    // $menu_html .= '<div class="title">Dịch vụ</div>';
    if ($mo_ta_dich_vu_nhom_1) {
        $menu_html .= '<div class="desc">' . $mo_ta_dich_vu_nhom_1 . '</div>';
        $menu_html_mb .= '<div class="sub_menu_dich_vu_desc_mb">' . $mo_ta_dich_vu_nhom_1 . '</div>';
    }
    $menu_html .= '<div class="row list_dich_vu">';
    // while ($query->have_posts()) : $query->the_post();
    // $menu_html .= '<div class="col-lg-4" id="menu-item-' . get_the_ID() . '">';
    // $menu_html .= '<a class="dich_vu_item" rel=”nofollow” href="' . get_permalink() . '">';
    // $menu_html .= '<div class="item_title line-2">' . get_the_title() . '</div>';
    // $menu_html .= '<div class="item_desc">' . (get_field('mo_ta_tren_menu') ?: 'Dịch thuật công chứng lấy ngay, lấy tận nơi') . '</div>';
    foreach ($menu_dich_vu as $key => $item) {
        // $menu_html .= '<div class="col-lg-4" id="menu-item-' . get_the_ID() . '">';
        $menu_html .= '<div class="col-lg-4" id="menu-item-' . $key . '">';
        $menu_html .= '<div class="dich_vu_item">';
        $menu_html .= '<a rel=”nofollow” href="' . $item['link'] . '" class="item_title line-2">' . $item['tieu_de'] . '</a>';
        $menu_html .= '<div class="item_desc">' . ($item['mo_ta'] ?: 'Dịch thuật công chứng lấy ngay, lấy tận nơi') . '</div>';
        $menu_html .= '</div>';
        $menu_html .= '</div>';

        $menu_html_mb .= '<li>';
        // $menu_html_mb .= '<a class="dich_vu_item_link_mb" rel=”nofollow” href="' . get_permalink() . '">';
        $menu_html_mb .= '<a class="dich_vu_item_link_mb" rel=”nofollow” href="' . $item['link'] . '">';
        $menu_html_mb .= '<span class="title">';
        // $menu_html_mb .= get_the_title();
        $menu_html_mb .= $item['tieu_de'];
        $menu_html_mb .= '</span>';
        $menu_html_mb .= '<span class="desc">';
        // $menu_html_mb .= get_field('mo_ta_tren_menu') ?: 'Dịch thuật công chứng lấy ngay, lấy tận nơi';
        $menu_html_mb .= $item['mo_ta'] ?: 'Dịch thuật công chứng lấy ngay, lấy tận nơi';
        $menu_html_mb .= '</span>';
        $menu_html_mb .= '</a>';
        $menu_html_mb .= '</li>';
    }
    // endwhile;

    $menu_html .= '</div>';
    $menu_html .= '</div>';

    $menu_html_mb .= '</ul>';
endif;
wp_reset_postdata();
?>

<script>
    jQuery(document).ready(function ($) {
        var menu_dich_vu = '<?php echo $menu_html; ?>';
        var menu_dich_vu_mb = '<?php echo $menu_html_mb; ?>';
        $('.header__menupc ul.menu li.menu_dich_vu').addClass('menu-item-has-children');
        $('.header__menupc ul.menu li.menu_dich_vu').append(menu_dich_vu);
        $('.header__menusp ul.menu li.menu_dich_vu').addClass('menu-item-has-children');
        $('.header__menusp ul.menu li.menu_dich_vu').append(menu_dich_vu_mb);
    });

    document.addEventListener('wpcf7beforesubmit', function (event) {
        document.getElementById("ajax-loader").style.display = "block";
    });

    document.addEventListener('wpcf7submit', function (event) {
        document.getElementById("ajax-loader").style.display = "none";
    });
</script>

</body>

</html>