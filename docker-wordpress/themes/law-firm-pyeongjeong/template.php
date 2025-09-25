<?php
/**
 * Blank Template for Custom Pages
 *
 * Template Name: Blank Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post;

get_header();
?>

<main id="primary" class="site-main blank-template">
    <div class="template-placeholder" aria-live="polite">
        <?php
        if (is_user_logged_in() && current_user_can('edit_post', $post ? $post->ID : 0)) {
            echo '<p>' . esc_html__('This blank template is ready for custom content.', 'law-firm-pyeongjeong') . '</p>';
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>
