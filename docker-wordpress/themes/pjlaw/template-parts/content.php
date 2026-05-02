<?php
/**
 * Default Content Template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        }
        ?>
    </header>

    <div class="entry-content">
        <?php
        the_content(sprintf(
            wp_kses(
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pjlaw'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post(get_the_title())
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'pjlaw'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php pjlaw_entry_footer(); ?>
    </footer>
</article>

<?php

/**
 * Entry footer function
 */
function pjlaw_entry_footer() {
    if (is_singular()) {
        if (get_the_category_list() && in_array(get_post_type(), array('post'))) {
            echo '<div class="cat-links">' . get_the_category_list(esc_html__(', ', 'pjlaw')) . '</div>';
        }
    }
}
?>
