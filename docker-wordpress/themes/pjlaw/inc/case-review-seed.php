<?php
if (!defined('ABSPATH')) exit;

/**
 * One-shot migration of the previously hardcoded homepage LEGAL CASE
 * testimonial cards into the pj_case_review post type. Runs once, guarded by
 * an option flag.
 *
 * Each card maps to: post_title (card title), post_excerpt (client quote),
 * featured image (card image, from assets/images/home/case-N.png), and the
 * _pj_review_tag / _pj_review_lawyer meta. The lawyer avatar is left empty so
 * the frontend falls back to the shared assets/images/home/lawyer-avatar.png.
 */
function pjlaw_seed_case_reviews() {
    if (get_option('pjlaw_case_reviews_seeded')) return;

    $quote  = '덕분에 이혼도 양육권도 형사사건 결과도 모두 원하던 방향 이상으로 최상의 결과를 얻었네요. 진심으로 감사드립니다.';
    $reviews = array(
        array('image' => 'case-1.png'),
        array('image' => 'case-2.png'),
        array('image' => 'case-3.png'),
        array('image' => 'case-4.png'),
    );

    $menu_order = 0;
    foreach ($reviews as $data) {
        $post_id = wp_insert_post(array(
            'post_type'    => 'pj_case_review',
            'post_title'   => '이혼 양육권 소송 의뢰인',
            'post_excerpt' => $quote,
            'post_status'  => 'publish',
            'menu_order'   => $menu_order++,
        ));
        if (is_wp_error($post_id) || !$post_id) continue;

        update_post_meta($post_id, '_pj_review_tag', '이혼소송후기');
        update_post_meta($post_id, '_pj_review_lawyer', '이시완 변호사');

        // Attach featured image from theme assets
        $image_path = get_template_directory() . '/assets/images/home/' . $data['image'];
        if (file_exists($image_path)) {
            $upload = wp_upload_bits($data['image'], null, file_get_contents($image_path));
            if (!$upload['error']) {
                $attachment_id = wp_insert_attachment(array(
                    'post_mime_type' => wp_check_filetype($data['image'])['type'],
                    'post_title'     => sanitize_file_name($data['image']),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                ), $upload['file'], $post_id);
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $metadata = wp_generate_attachment_metadata($attachment_id, $upload['file']);
                wp_update_attachment_metadata($attachment_id, $metadata);
                set_post_thumbnail($post_id, $attachment_id);
            }
        }
    }

    update_option('pjlaw_case_reviews_seeded', true);
}
add_action('init', 'pjlaw_seed_case_reviews', 20);
