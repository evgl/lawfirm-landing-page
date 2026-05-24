<?php
if (!defined('ABSPATH')) exit;

/**
 * Seeds 3 sample pj_blog_post entries on first run.
 * Runs once; tracked via the pjlaw_blog_seeded option.
 */
function pjlaw_seed_blog_posts() {
    if (get_option('pjlaw_blog_seeded')) return;

    $posts = array(
        array(
            'title'   => '졸피뎀 처벌 수위 및 사례, 대응 방법',
            'excerpt' => '혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나, 병원 가기 귀찮아서 다른 사람 명의로 약을 타온 적 있으신가요?',
            'tags'    => array('마약', '향정신성의약품(향정)'),
            'image'   => 'card-01.jpg',
        ),
        array(
            'title'   => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
            'excerpt' => '단순 교통법규 위반이 아닙니다. 교통사고처리특례법상 12대 중과실에 해당하며, 피해자와 합의를 하더라도 형사처벌이 면제되지 않습니다.',
            'tags'    => array('교통사고', '무면허운전'),
            'image'   => 'card-02.jpg',
        ),
        array(
            'title'   => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
            'excerpt' => '특경법은 사기·횡령·배임 등 특정 경제범죄가 일정 금액을 넘는 경우 형법보다 훨씬 무겁게 처벌하도록 규정한 법률입니다.',
            'tags'    => array('형사', '특수경제범죄(특경법)'),
            'image'   => 'card-03.jpg',
        ),
    );

    foreach ($posts as $data) {
        // Skip if a post with this title already exists
        $existing = get_posts(array(
            'post_type'   => 'pj_blog_post',
            'title'       => $data['title'],
            'numberposts' => 1,
            'post_status' => 'any',
        ));
        if ($existing) continue;

        $post_id = wp_insert_post(array(
            'post_type'    => 'pj_blog_post',
            'post_title'   => $data['title'],
            'post_excerpt' => $data['excerpt'],
            'post_status'  => 'publish',
            'post_content' => '',
        ));

        if (is_wp_error($post_id) || !$post_id) continue;

        // Assign tags (create terms if they don't exist)
        $term_ids = array();
        foreach ($data['tags'] as $tag_name) {
            $term = term_exists($tag_name, 'pj_blog_tag');
            if (!$term) {
                $term = wp_insert_term($tag_name, 'pj_blog_tag');
            }
            if (!is_wp_error($term)) {
                $term_ids[] = (int) (is_array($term) ? $term['term_id'] : $term);
            }
        }
        if ($term_ids) {
            wp_set_post_terms($post_id, $term_ids, 'pj_blog_tag');
        }

        // Attach featured image from theme assets
        $image_path = get_template_directory() . '/assets/images/blog/' . $data['image'];
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

    update_option('pjlaw_blog_seeded', true);
}
add_action('init', 'pjlaw_seed_blog_posts');
