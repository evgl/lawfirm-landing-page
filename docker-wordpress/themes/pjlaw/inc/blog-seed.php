<?php
if (!defined('ABSPATH')) exit;

/**
 * Seeds 3 sample pj_blog_post entries on first run.
 * Runs once; tracked via the pjlaw_blog_seeded option.
 */
function pjlaw_seed_blog_posts() {
    if (get_option('pjlaw_blog_seeded')) return;

    // Build service term mapping (name => slug) for proper lookup
    // WordPress sanitizes Korean names to URL-encoded slugs, so we query existing terms
    $service_slug_map = array();
    $service_terms = get_terms(array(
        'taxonomy'   => 'pj_blog_service',
        'hide_empty' => false,
    ));
    if ($service_terms && !is_wp_error($service_terms)) {
        foreach ($service_terms as $term) {
            // Store mapping from term slug back to term ID for quick lookup
            $service_slug_map[$term->slug] = $term->term_id;
        }
    }

    $posts = array(
        array(
            'title'   => '졸피뎀 처벌 수위 및 사례, 대응 방법',
            'excerpt' => '혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나, 병원 가기 귀찮아서 다른 사람 명의로 약을 타온 적 있으신가요?',
            'tags'    => array('마약', '향정신성의약품(향정)'),
            'service' => '형사',
            'image'   => 'card-01.jpg',
        ),
        array(
            'title'   => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
            'excerpt' => '단순 교통법규 위반이 아닙니다. 교통사고처리특례법상 12대 중과실에 해당하며, 피해자와 합의를 하더라도 형사처벌이 면제되지 않습니다.',
            'tags'    => array('교통사고', '무면허운전'),
            'service' => '형사',
            'image'   => 'card-02.jpg',
        ),
        array(
            'title'   => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
            'excerpt' => '특경법은 사기·횡령·배임 등 특정 경제범죄가 일정 금액을 넘는 경우 형법보다 훨씬 무겁게 처벌하도록 규정한 법률입니다.',
            'tags'    => array('형사', '특수경제범죄(특경법)'),
            'service' => '형사',
            'image'   => 'card-03.jpg',
        ),
        array(
            'title'   => '음주운전 처벌 기준과 면허 취소 대응 방법',
            'excerpt' => '음주운전은 단순 행정처분이 아닌 형사범죄입니다. 음주측정 수치에 따라 합의 여부와 관계없이 처벌받을 수 있습니다.',
            'tags'    => array('교통사고', '음주운전'),
            'service' => '형사',
            'image'   => 'card-01.jpg',
        ),
        array(
            'title'   => '강제추행죄 성립요건과 처벌 수위',
            'excerpt' => '강제추행은 폭력이나 협박으로 피해자에게 저항할 수 없게 한 상태에서 추행하는 범죄입니다. 피해자 진술이 매우 중요합니다.',
            'tags'    => array('성범죄', '강제추행'),
            'service' => '성범죄',
            'image'   => 'card-02.jpg',
        ),
        array(
            'title'   => '사기죄 구성요건과 처벌 기준 총정리',
            'excerpt' => '사기죄는 거짓 표시나 기망 행위로 상대방을 속여 금품이나 재산상 이익을 빼앗는 범죄입니다. 피해자 합의가 형량 감경에 큰 영향을 줍니다.',
            'tags'    => array('형사', '사기죄'),
            'service' => '형사',
            'image'   => 'card-03.jpg',
        ),
        array(
            'title'   => '명예훼손 고소 절차와 대응 전략',
            'excerpt' => '명예훼손은 거짓 사실 공표, 적시 사실 공표, SNS 댓글 등으로 성립될 수 있습니다. 정당한 평론이면 위법하지 않습니다.',
            'tags'    => array('형사', '명예훼손'),
            'service' => '형사',
            'image'   => 'card-01.jpg',
        ),
        array(
            'title'   => '횡령죄와 배임죄의 차이점 및 처벌 기준',
            'excerpt' => '횡령은 타인의 물건을 자신의 것으로 만드는 것이고, 배임은 직무 또는 위임 관계에서 상대방의 이익에 반하는 행위입니다.',
            'tags'    => array('형사', '횡령·배임'),
            'service' => '형사',
            'image'   => 'card-02.jpg',
        ),
        array(
            'title'   => '폭행죄와 상해죄의 차이, 합의 전략',
            'excerpt' => '폭행은 신체에 대한 직접적 행위(때리기, 밀치기), 상해는 신체 상처 발생입니다. 상해가 더 무거운 처벌을 받습니다.',
            'tags'    => array('형사', '폭행·상해'),
            'service' => '형사',
            'image'   => 'card-03.jpg',
        ),
        array(
            'title'   => '마약 소지·투약 처벌 수위와 자수 감경',
            'excerpt' => '마약 투약은 단순 소지보다 형량이 무겁습니다. 자수하면 처벌이 크게 감경되므로 신속한 법무 대응이 중요합니다.',
            'tags'    => array('마약', '약물범죄'),
            'service' => '형사',
            'image'   => 'card-01.jpg',
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

        // Assign service using slug-based lookup (name-based lookup fails due to corrupted term names)
        if (!empty($data['service']) && !empty($service_slug_map)) {
            $service_slug = sanitize_title($data['service']);
            if (isset($service_slug_map[$service_slug])) {
                wp_set_post_terms($post_id, $service_slug_map[$service_slug], 'pj_blog_service');
            }
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
add_action('init', 'pjlaw_seed_blog_posts', 20);
