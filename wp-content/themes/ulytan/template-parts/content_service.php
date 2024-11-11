<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id($post_id);
$categories = get_the_category($post_id);
?>
<article id="post-<?php echo $post_id; ?>" class="single_service">
    <a href="<?php the_permalink(); ?>" class="imgGroup single_service_img">
        <picture>
            <source media="(min-width:992px)" srcset="<?php echo img_url($thumbnail_id, 'medium'); ?>">
            <img src="<?php echo img_url($thumbnail_id, 'thumbnail'); ?>" alt="<?php the_title(); ?>">
        </picture>
    </a>
    <div class="single_service_content">
        <a class="d-flex" href="<?php the_permalink(); ?>">
            <h3 class="single_service_title" data-mh="single_service_title">
                <?php the_title(); ?>
            </h3>
        </a>
    </div>
</article>