<?php

/**
 * Template name: Page verify
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
        setcookie("verified_email", 'da_dang_ky', time() + (365 * 24 * 60 * 60), "/");
        delete_transient("email_verification_$token");

        $status = "text-success";
        $message = "Xác minh thành công! Bạn có thể tiếp tục sử dụng website.";
    } else {
        $status = "text-danger";
        $message = "Xác minh thất bại! Token không hợp lệ hoặc đã hết hạn.";
    }
} else {
    $status = "text-warning";
    $message = "Yêu cầu không hợp lệ.";
}
ob_end_flush(); // Đẩy output ra trình duyệt
?>

<div class="container">
    <h2>Kết quả xác minh</h2>
    <p class="<?php echo esc_attr($status); ?>"><?php echo esc_html($message); ?></p>
</div>

<?php get_footer(); ?>