<?php
if (!defined('ABSPATH')) exit;

/**
 * Best-effort: set a theme asset image as a post's Featured Image.
 * Copies the asset into the uploads dir and registers it as an attachment.
 * Silently no-ops if the file is missing or already set.
 */
function pjlaw_team_set_featured_from_asset($post_id, $relative_asset) {
    if (has_post_thumbnail($post_id)) return;
    $src = get_template_directory() . '/' . ltrim($relative_asset, '/');
    if (!file_exists($src)) return;

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $upload = wp_upload_bits(basename($src), null, file_get_contents($src));
    if (!empty($upload['error'])) return;

    $filetype = wp_check_filetype($upload['file'], null);
    $attach_id = wp_insert_attachment(array(
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_file_name(basename($src)),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ), $upload['file'], $post_id);
    if (is_wp_error($attach_id) || !$attach_id) return;

    $meta = wp_generate_attachment_metadata($attach_id, $upload['file']);
    wp_update_attachment_metadata($attach_id, $meta);
    set_post_thumbnail($post_id, $attach_id);
}

/**
 * One-shot migration of the previously hardcoded team members into the
 * pj_team custom post type. Runs once, guarded by an option flag.
 */
function pjlaw_seed_team_members() {
    if (get_option('pjlaw_team_seeded')) return;

    // Detail content migrated from the old static page-team-member.php.
    $tagline = "진심으로 소통하고,\n끝까지 함께하는 법률 서비스";

    $fields = array(
        array('name' => '형사', 'tags' => array('일반사기', '가사상속', '감금')),
        array('name' => '학교폭력', 'tags' => array('일반사기', '가사상속', '감금')),
    );

    $career_summary = array('부산지방법원 인턴', '법률사무소 제언');
    $edu            = array('고려대학교 졸업', '동아대학교 법학전문대학원 졸업');
    $experience     = array(
        '서울지방검찰청 검사',
        '청소년보호위원회 파견 (서울 동부지청 검사)',
        '청주지방검찰청 충주지청 부장검사',
        '서울동부지방검찰청 차장검사',
        '육군법무관',
    );
    $achievements   = array(
        '중진 국회의원 정치자금법위반 등 사건 무혐의 결정',
        '글로벌 원자력발전 설비회사 납품 관련 사기사건 무혐의 결정',
        '국립대 교수 연구비 사용 관련 사기사건 무혐의 결정',
        '조선회사 부장 협력업체 관련 배임사건 무혐의 결정',
        '시중은행장 채용비리 사건 변론',
        '대형 항공사 회장 횡령 사건 변론 등',
    );

    $specialties = array('형사법 전문', '행정법 전문');
    $tags        = array('금융범죄', '기타형사', '교통사고');

    // Latest published cases become each member's 업무사례 sample selection.
    $case_posts = get_posts(array(
        'post_type'      => 'legal_case',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
    ));
    $case_ids = is_array($case_posts) ? $case_posts : array();

    $members = array(
        array('name' => '이시완', 'photo' => 'assets/images/team/member-1.png'),
        array('name' => '공선영', 'photo' => 'assets/images/team/member-2.png'),
    );

    $menu_order = 0;
    foreach ($members as $data) {
        $existing = get_posts(array(
            'post_type'   => 'pj_team',
            'title'       => $data['name'],
            'numberposts' => 1,
            'post_status' => 'any',
        ));
        if ($existing) continue;

        $post_id = wp_insert_post(array(
            'post_type'   => 'pj_team',
            'post_title'  => $data['name'],
            'post_status' => 'publish',
            'menu_order'  => $menu_order++,
        ));
        if (is_wp_error($post_id) || !$post_id) continue;

        update_post_meta($post_id, '_pj_team_role', '변호사');
        update_post_meta($post_id, '_pj_team_tagline', $tagline);
        update_post_meta($post_id, '_pj_team_specialties', $specialties);
        update_post_meta($post_id, '_pj_team_tags', $tags);
        update_post_meta($post_id, '_pj_team_fields', $fields);
        update_post_meta($post_id, '_pj_team_career_summary', $career_summary);
        update_post_meta($post_id, '_pj_team_edu', $edu);
        update_post_meta($post_id, '_pj_team_experience', $experience);
        update_post_meta($post_id, '_pj_team_achievements', $achievements);
        update_post_meta($post_id, '_pj_team_case_ids', $case_ids);

        pjlaw_team_set_featured_from_asset($post_id, $data['photo']);
    }

    update_option('pjlaw_team_seeded', true);
}
add_action('init', 'pjlaw_seed_team_members', 20);
