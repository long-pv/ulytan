<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id($post_id);
$categories = get_the_category($post_id);
?>
<article id="post-<?php echo $post_id; ?>" class="single_post">
    <a href="<?php the_permalink(); ?>" class="imgGroup single_post_img">
        <picture>
            <source media="(min-width:992px)" srcset="<?php echo img_url($thumbnail_id, 'medium'); ?>">
            <img src="<?php echo img_url($thumbnail_id, 'thumbnail'); ?>" alt="<?php the_title(); ?>">
        </picture>
    </a>
    <div class="single_post_content">
        <?php if (!empty($categories)): ?>
            <div class="single_post_cats">
                <?php foreach ($categories as $category): ?>
                    <a href="<?php echo get_category_link($category->term_id); ?>" class="single_post_cats_item">
                        <?php echo $category->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <a href="d-flex" href="<?php the_permalink(); ?>">
            <h3 class="single_post_title mb-0 wow" data-mh="title">
                <?php the_title(); ?>
            </h3>
        </a>
        <p class="single_post_desc mb-0">
            <?php echo get_the_excerpt(); ?>
        </p>
    </div>
</article>