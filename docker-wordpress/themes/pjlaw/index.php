<?php
/**
 * Main Template
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main-content" role="main">
    <div class="container">
        <div class="page-content">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                }
                
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'pjlaw'),
                    'next_text' => __('Next →', 'pjlaw'),
                ));
            } else {
                get_template_part('template-parts/content', 'none');
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
