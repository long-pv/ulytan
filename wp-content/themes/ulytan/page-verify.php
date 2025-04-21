<?php

/**
 * Template name: Loại Page xác nhận
 * Template_name: Page verify (bỏ)
 * */
ob_start(); // Bắt đầu output buffering
get_header();

if (isset($_GET['token']) && isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
    $token = sanitize_text_field($_GET['token']);

    // Kiểm tra token trong Transient API
    $saved_email = get_transient("email_verification_$token");

    if ($saved_email && $saved_email === $email) {
        // Xác minh thành công → Đặt cookie (1 năm)
        setcookie("verified_email", 'da_dang_ky', time() + (12 * 60 * 60), "/");
        setcookie("verified_email_value", $saved_email, time() + (12 * 60 * 60), "/");
        delete_transient("email_verification_$token");

        $status = "text-success";
    } else {
        $status = "text-danger";
    }
} else {
    $status = "text-warning";
}
ob_end_flush(); // Đẩy output ra trình duyệt
?>

<div class="secSpace">
    <div class="container">
        <div class="text-center">
            <?php if ($status == 'text-success') {
                ?>
                <h2 class="sec_title">Xác minh thành công!</h2>
                <p>Từ giờ bạn có toàn quyền download tài liệu miễn phí trên website: <a
                        href="https://ulytan.com">www.ulytan.com</a></p>
                <p>Hãy liên hệ với ULYTAN gần nhất để được chứng thực bản dịch, đối với dịch vụ này, bạn sẽ tiết kiệm 80%
                    tiền dịch thuật.</p>
                <p>Để theo dõi cập nhật form mẫu mới nhất, hãy theo dõi ULYTAN trên các nền tảng mạng xã hội:</p>
                <div class="list_link" style="justify-content: center;">
                    <a href="https://facebookcom/ulytan" target="_blank" class="mxh_fb">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg>
                    </a>

                    <a href="https://tiktok.com/@ulytan" target="_blank" class="mxh_tiktok">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                        </svg>
                    </a>

                    <a href="https://youtube.com/@ulytan" target="_blank" class="mxh_yt">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                        </svg>
                    </a>
                </div>
                <?php
            } else if ($status == "text-danger") {
                ?>
                    <h2 class="sec_title">Kết quả xác minh</h2>
                    <div class="<?php echo esc_attr($status); ?>">
                        Xác minh thất bại! Token không hợp lệ hoặc đã hết hạn.
                    </div>
                <?php
            } else {
                ?>
                    <h2 class="sec_title">Kết quả xác minh</h2>
                    <div class="<?php echo esc_attr($status); ?>">
                        Yêu cầu không hợp lệ.
                    </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<style>
    .header {
        display: none !important;
    }

    .footer {
        display: none !important;
    }
</style>
<?php
get_footer();
