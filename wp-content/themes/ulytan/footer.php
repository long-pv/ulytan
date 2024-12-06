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
if (!is_page_template('page-dich_thuat_cong_chung.php') && !is_page_template('page-form.php')) :
?>
    <div class="headquarters secSpace">
        <div class="container">
            <div class="headquarters_list">
                <?php
                $headquarters = get_field('headquarters', 'option') ?? [];
                if ($headquarters):
                    foreach ($headquarters as $item):
                ?>
                        <div class="headquarters_item">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h3 class="headquarters_item_title">
                                        <?php echo $item['title']; ?>
                                    </h3>

                                    <div class="headquarters_item_content editor">
                                        <?php echo $item['content']; ?>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="headquarters_item_iframe">
                                        <?php echo $item['google_map']; ?>
                                    </div>
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
<?php endif; ?>


<?php
$tieu_de_1 = get_field('tieu_de_1', 'option') ?: 'LIÊN HỆ';
$tieu_de_2 = get_field('tieu_de_2', 'option') ?: 'Dịch vụ tại ulytan';
$tieu_de_3 = get_field('tieu_de_3', 'option') ?: 'Tuyển dụng';
$tieu_de_4 = get_field('tieu_de_4', 'option') ?: 'Chính sách';
$tieu_de_5 = get_field('tieu_de_5', 'option') ?: 'Nhận khuyến mãi';
$tieu_de_6 = get_field('tieu_de_1', 'option') ?: 'Kết nối với chúng tôi';
$thong_tin_doanh_nghiep = get_field('thong_tin_doanh_nghiep', 'option') ?? '';
?>
<footer class="secSpace footer footer_bg">
    <div class="container">
        <div class="row footer_row row_24">
            <div class="col-lg-3">
                <div>
                    <h3 class="footer_title">
                        <?php echo $tieu_de_1; ?>
                    </h3>
                    <div class="editor footer_info">
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
                                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.600098" width="35" height="35" rx="17.5" fill="black" fill-opacity="0.1" />
                                    <g clip-path="url(#clip0_4191_264)">
                                        <path d="M21.496 9.70727V12.0644H20.0942C19.5823 12.0644 19.2371 12.1716 19.0585 12.3858C18.88 12.6001 18.7907 12.9216 18.7907 13.3501V15.0376H21.4067L21.0585 17.6805H18.7907V24.4573H16.0585V17.6805H13.7817V15.0376H16.0585V13.0912C16.0585 11.9841 16.368 11.1254 16.9871 10.5153C17.6061 9.90519 18.4305 9.60013 19.4603 9.60013C20.3353 9.60013 21.0139 9.63585 21.496 9.70727Z" fill="#900101" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4191_264">
                                            <rect width="9.15" height="16" fill="white" transform="matrix(1 0 0 -1 12.9299 25.6001)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php
                        $youtube = get_field('youtube', 'option') ?: 'javascript:void(0);';
                        if ($youtube):
                        ?>
                            <a href="<?php echo $youtube; ?>" target=" _blank" class="footer_mxh_item">
                                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.600098" width="35" height="35" rx="17.5" fill="black" fill-opacity="0.1" />
                                    <g clip-path="url(#clip0_4191_267)">
                                        <path d="M19.3124 20.7072V22.5912C19.3124 22.99 19.1963 23.1894 18.9641 23.1894C18.8272 23.1894 18.6933 23.1239 18.5624 22.993V20.3055C18.6933 20.1745 18.8272 20.109 18.9641 20.109C19.1963 20.109 19.3124 20.3084 19.3124 20.7072ZM22.3302 20.7162V21.1269H21.5266V20.7162C21.5266 20.3114 21.6606 20.109 21.9284 20.109C22.1963 20.109 22.3302 20.3114 22.3302 20.7162ZM13.7052 18.7697H14.6606V17.9305H11.8749V18.7697H12.8124V23.8501H13.7052V18.7697ZM16.2766 23.8501H17.0713V19.4394H16.2766V22.8144C16.0981 23.0644 15.9284 23.1894 15.7677 23.1894C15.6606 23.1894 15.5981 23.1269 15.5802 23.0019C15.5743 22.984 15.5713 22.8799 15.5713 22.6894V19.4394H14.7766V22.9305C14.7766 23.2221 14.8005 23.4394 14.8481 23.5822C14.9195 23.8025 15.0921 23.9126 15.3659 23.9126C15.6516 23.9126 15.9552 23.7311 16.2766 23.368V23.8501ZM20.107 22.5287V20.7697C20.107 20.3352 20.0802 20.0406 20.0266 19.8858C19.9255 19.5525 19.7141 19.3858 19.3927 19.3858C19.0951 19.3858 18.8183 19.5465 18.5624 19.868V17.9305H17.7677V23.8501H18.5624V23.4215C18.8302 23.7489 19.107 23.9126 19.3927 23.9126C19.7141 23.9126 19.9255 23.7489 20.0266 23.4215C20.0802 23.2608 20.107 22.9632 20.107 22.5287ZM23.1249 22.4394V22.3233H22.3124C22.3124 22.6269 22.3064 22.8084 22.2945 22.868C22.2528 23.0822 22.1338 23.1894 21.9374 23.1894C21.6636 23.1894 21.5266 22.984 21.5266 22.5733V21.7965H23.1249V20.8769C23.1249 20.4066 23.0445 20.0614 22.8838 19.8412C22.6516 19.5376 22.3362 19.3858 21.9374 19.3858C21.5326 19.3858 21.2141 19.5376 20.982 19.8412C20.8153 20.0614 20.732 20.4066 20.732 20.8769V22.4215C20.732 22.8918 20.8183 23.237 20.9909 23.4572C21.2231 23.7608 21.5445 23.9126 21.9552 23.9126C22.3838 23.9126 22.7052 23.7549 22.9195 23.4394C23.0266 23.2787 23.0891 23.118 23.107 22.9572C23.1189 22.9037 23.1249 22.7311 23.1249 22.4394ZM17.6963 14.2876V12.4126C17.6963 12.0019 17.5683 11.7965 17.3124 11.7965C17.0564 11.7965 16.9284 12.0019 16.9284 12.4126V14.2876C16.9284 14.7043 17.0564 14.9126 17.3124 14.9126C17.5683 14.9126 17.6963 14.7043 17.6963 14.2876ZM24.1159 20.993C24.1159 22.3858 24.0386 23.4275 23.8838 24.118C23.8005 24.4691 23.6278 24.7638 23.3659 25.0019C23.104 25.24 22.8005 25.3769 22.4552 25.4126C21.36 25.5376 19.7082 25.6001 17.4999 25.6001C15.2915 25.6001 13.6397 25.5376 12.5445 25.4126C12.1993 25.3769 11.8942 25.24 11.6293 25.0019C11.3644 24.7638 11.1933 24.4691 11.1159 24.118C10.9612 23.4513 10.8838 22.4096 10.8838 20.993C10.8838 19.6001 10.9612 18.5584 11.1159 17.868C11.1993 17.5168 11.3719 17.2221 11.6338 16.984C11.8957 16.7459 12.2022 16.606 12.5534 16.5644C13.6427 16.4453 15.2915 16.3858 17.4999 16.3858C19.7082 16.3858 21.36 16.4453 22.4552 16.5644C22.8005 16.606 23.1055 16.7459 23.3704 16.984C23.6353 17.2221 23.8064 17.5168 23.8838 17.868C24.0386 18.5346 24.1159 19.5763 24.1159 20.993ZM15.2052 9.6001H16.1159L15.0356 13.1626V15.5822H14.1427V13.1626C14.0594 12.7221 13.8778 12.0912 13.5981 11.2697C13.3778 10.6566 13.1844 10.1001 13.0177 9.6001H13.9641L14.5981 11.9483L15.2052 9.6001ZM18.5088 12.5733V14.1358C18.5088 14.618 18.4255 14.9691 18.2588 15.1894C18.0326 15.493 17.7171 15.6447 17.3124 15.6447C16.9136 15.6447 16.6011 15.493 16.3749 15.1894C16.2082 14.9632 16.1249 14.612 16.1249 14.1358V12.5733C16.1249 12.0971 16.2082 11.7489 16.3749 11.5287C16.6011 11.2251 16.9136 11.0733 17.3124 11.0733C17.7171 11.0733 18.0326 11.2251 18.2588 11.5287C18.4255 11.7489 18.5088 12.0971 18.5088 12.5733ZM21.4999 11.1269V15.5822H20.6874V15.0912C20.3719 15.4602 20.0653 15.6447 19.7677 15.6447C19.4939 15.6447 19.3183 15.5346 19.2409 15.3144C19.1933 15.1715 19.1695 14.9483 19.1695 14.6447V11.1269H19.982V14.4037C19.982 14.6001 19.985 14.7043 19.9909 14.7162C20.0088 14.8471 20.0713 14.9126 20.1784 14.9126C20.3391 14.9126 20.5088 14.7846 20.6874 14.5287V11.1269H21.4999Z" fill="#900101" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4191_267">
                                            <rect width="13.72" height="16" fill="white" transform="matrix(1 0 0 -1 10.6399 25.6001)" />
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
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="35" height="35" rx="17.5" fill="black" fill-opacity="0.1" />
                                    <path d="M24.731 13.13V16.0675C24.218 16.0179 23.554 15.901 22.8168 15.6301C21.8553 15.2769 21.1392 14.7935 20.6712 14.419V20.3577L20.6598 20.3391C20.6677 20.4569 20.6712 20.5764 20.6712 20.6977C20.6712 23.6475 18.2785 26.0476 15.3356 26.0476C12.3928 26.0476 10 23.6467 10 20.6977C10 17.7487 12.3928 15.3468 15.3356 15.3468C15.6235 15.3468 15.906 15.3698 16.1824 15.4141V18.31C15.9166 18.2144 15.6323 18.163 15.3356 18.163C13.9423 18.163 12.8078 19.2998 12.8078 20.6977C12.8078 22.0956 13.9423 23.2323 15.3356 23.2323C16.7289 23.2323 17.8635 22.0947 17.8635 20.6977C17.8635 20.6454 17.8626 20.5932 17.8591 20.541V9H20.7878C20.7984 9.24877 20.809 9.49932 20.8187 9.74809C20.8381 10.2377 21.012 10.7078 21.3149 11.0929C21.6707 11.5453 22.1952 12.0712 22.9333 12.4908C23.6238 12.883 24.2719 13.0512 24.731 13.1309V13.13Z" fill="#900101" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
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
                                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" fill="#111111" />
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
                                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" fill="#111111" />
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
            <div class="col-lg-3">
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
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" fill="#111111" />
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

                    if ($chinh_sach) :
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
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.2358 4.29053C13.3817 4.43636 13.4546 4.61344 13.4546 4.82178C13.4546 5.03011 13.3817 5.20719 13.2358 5.35303L7.57959 11.0093L6.51709 12.0718C6.37126 12.2176 6.19417 12.2905 5.98584 12.2905C5.77751 12.2905 5.60042 12.2176 5.45459 12.0718L4.39209 11.0093L1.56396 8.18115C1.41813 8.03532 1.34521 7.85824 1.34521 7.6499C1.34521 7.44157 1.41813 7.26449 1.56396 7.11865L2.62646 6.05615C2.7723 5.91032 2.94938 5.8374 3.15771 5.8374C3.36605 5.8374 3.54313 5.91032 3.68896 6.05615L5.98584 8.36084L11.1108 3.22803C11.2567 3.08219 11.4338 3.00928 11.6421 3.00928C11.8504 3.00928 12.0275 3.08219 12.1733 3.22803L13.2358 4.29053Z" fill="#111111" />
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
                        <?php echo $tieu_de_5; ?>
                    </h3>

                    <?php
                    $form_khuyen_mai = get_field('form_khuyen_mai', 'option') ?? null;
                    if ($form_khuyen_mai):
                    ?>
                        <div class="footer_form">
                            <?php echo do_shortcode('[contact-form-7 id="' . $form_khuyen_mai . '"]'); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</footer>

<div id="ajax-loader" style="display: none;">
    <div class="spinner"></div>
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

<?php wp_footer(); ?>

<?php
$args = array(
    'post_type'      => 'service',
    'posts_per_page' => 40,
    'post_status'    => 'publish',
    // 'order'          => 'ASC',
);

$query = new WP_Query($args);
$menu_html = '';

if ($query->have_posts()) :
    $menu_html .= '<div class="sub_menu_dich_vu">';
    $menu_html .= '<div class="title">Dịch vụ</div>';
    $menu_html .= '<div class="desc">ULYTAN cung cấp dịch vụ dịch thuật cho rất nhiều thứ tiếng với 63 quốc gia hiện nay, cùng với nhiều dịch vụ khác như đổi bằng lái xe, xin visa quốc tế, ...</div>';
    $menu_html .= '<div class="row list_dich_vu">';
    while ($query->have_posts()) : $query->the_post();
        $menu_html .= '<div class="col-lg-3" id="menu-item-' . get_the_ID() . '">';
        $menu_html .= '<a class="dich_vu_item" href="' . get_permalink() . '">';
        $menu_html .= '<div class="item_title">' . get_the_title() . '</div>';
        $menu_html .= '<div class="item_desc">' . (get_field('mo_ta_tren_menu') ?: 'Dịch thuật công chứng lấy ngay, lấy tận nơi') . '</div>';
        $menu_html .= '</a>';
        $menu_html .= '</div>';
    endwhile;
    $menu_html .= '</div>';
    $menu_html .= '</div>';
endif;
wp_reset_postdata();
?>

<script>
    jQuery(document).ready(function($) {
        var menu_dich_vu = '<?php echo $menu_html; ?>';
        $('#menu-menu-1 li.menu_dich_vu').addClass('menu-item-has-children');
        $('#menu-menu-1 li.menu_dich_vu').append(menu_dich_vu);
    });
</script>

</body>

</html>