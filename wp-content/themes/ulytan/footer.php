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

<footer id="footer" class="footer secSpace">
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

</body>

</html>