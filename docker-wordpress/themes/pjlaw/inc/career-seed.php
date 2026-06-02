<?php
if (!defined('ABSPATH')) exit;

/**
 * One-shot migration of the previously hardcoded career postings into the
 * pj_career custom post type. Runs once, guarded by an option flag.
 */
function pjlaw_seed_career_posts() {
    if (get_option('pjlaw_careers_seeded')) return;

    // Full section set migrated from the old static page-careers-detail.php.
    $counselor_sections = array(
        array('heading' => '주요업무', 'items' => array(
            '고객에 대한 대면 안내, 전화 응대',
            '고객 관련 일정 및 정보 관리',
            '소송문건 제출, 법원 출장 등 송무보조',
            '소송 관련 일정 관리, 사건 진행 내역 관리 등',
            '변호사 일정 수행, 관리 등 비서 업무',
            '기타 수명업무',
            '*사무장 업무 없음 <strong>(사무장 없는 로펌)</strong>',
        )),
        array('heading' => '자격요건', 'items' => array(
            '고등학교 졸업이상, 졸업 예정자 지원가능',
            '경력 : 법률사무소(법무법인) 경력 6개월 이상',
        )),
        array('heading' => '우대사항', 'items' => array(
            '빠르고 정확하고 꼼꼼하신 분',
            '친절한 고객응대가 가능하신 분',
            '법률사무원 교육을 이수한 분',
            '비서직 관련 전공자 또는 자격증 보유자',
            '서비스 마인드를 갖추신 분',
            '컴퓨터 활용 능력이 우수한 분',
        )),
        array('heading' => '슬로건', 'items' => array(
            '압도적인 실력과 독보적인 승소율을 바탕으로 법적분쟁을 평정합니다.',
            '최고의 전문성을 갖춘 인재를 영입하고 그에 걸맞는 대우를 합니다.',
        )),
        array('heading' => '근무조건', 'items' => array(
            '고용형태 : 정규직(수습3개월)',
            '급여 : 면접 후 결정',
            '근무지 : 서울시 강남구 논현로 63길 71',
        )),
        array('heading' => '복지 및 혜택', 'items' => array(
            '초봉 월 300만원(협의가능)',
            '실무능력 개발에 필요한 교육비, 도서지원',
            '수평적이고 자유로운 분위기, 효율적인 업무 프로세스',
            '빠르게 성장하는 회사로 연봉 및 직책 상승 가능성이 높음',
        )),
        array('heading' => '채용절차', 'items' => array(
            '서류전형 → 1차 면접 → 2차 면접 → 최종합격',
            '면접일정은 개별 통보됩니다.',
        )),
    );

    $generic_sections = array(
        array('heading' => '주요업무', 'items' => array(
            '담당 분야 법률 자문 및 서면 작성',
            '의뢰인 상담 및 사건 진행 관리',
        )),
        array('heading' => '자격요건', 'items' => array(
            '관련 분야 경력자 우대',
            '성실하고 책임감 있는 분',
        )),
        array('heading' => '근무조건', 'items' => array(
            '고용형태 : 정규직',
            '급여 : 면접 후 결정',
        )),
    );

    $today = current_time('Y-m-d');
    $end   = function ($days) { return date('Y-m-d', strtotime('+' . $days . ' days')); };

    $posts = array(
        array(
            'title'    => '[강남구] 법률사무소 상담실장님 모십니다.',
            'category' => '사무원',
            'type'     => '신입/인턴',
            'days'     => 8,
            'subtitle' => '법률사무소 상담실장',
            'field'    => '상담실장',
            'position' => '실장',
            'location' => '서울특별시 강남구',
            'sections' => $counselor_sections,
        ),
        array(
            'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
            'category' => '변호사',
            'type'     => '경력',
            'days'     => 15,
            'subtitle' => '사내변호사',
            'field'    => '기업법무',
            'position' => '변호사',
            'location' => '서울특별시 강남구',
            'sections' => $generic_sections,
        ),
        array(
            'title'    => '법무법인(유한) 대륜 의료전문 상담실장 모집',
            'category' => '사무원',
            'type'     => '신입/인턴',
            'days'     => 8,
            'subtitle' => '의료전문 상담실장',
            'field'    => '상담실장',
            'position' => '실장',
            'location' => '서울특별시 서초구',
            'sections' => $generic_sections,
        ),
        array(
            'title'    => '평정 형사전문 변호사 채용',
            'category' => '변호사',
            'type'     => '경력',
            'days'     => 15,
            'subtitle' => '형사전문 변호사',
            'field'    => '형사',
            'position' => '변호사',
            'location' => '경기도 수원시',
            'sections' => $generic_sections,
        ),
        array(
            'title'    => '법률사무 행정직원 채용공고',
            'category' => '사무원',
            'type'     => '경력',
            'days'     => 0,
            'subtitle' => '행정직원',
            'field'    => '행정',
            'position' => '사원',
            'location' => '경기도 수원시',
            'sections' => $generic_sections,
        ),
        array(
            'title'    => '2026 평정 법률 인턴십 모집',
            'category' => '인턴십',
            'type'     => '신입/인턴',
            'days'     => 15,
            'subtitle' => '법률 인턴',
            'field'    => '인턴십',
            'position' => '인턴',
            'location' => '경기도 수원시',
            'sections' => $generic_sections,
        ),
    );

    $menu_order = 0;
    foreach ($posts as $data) {
        $existing = get_posts(array(
            'post_type'   => 'pj_career',
            'title'       => $data['title'],
            'numberposts' => 1,
            'post_status' => 'any',
        ));
        if ($existing) continue;

        $post_id = wp_insert_post(array(
            'post_type'   => 'pj_career',
            'post_title'  => $data['title'],
            'post_status' => 'publish',
            'menu_order'  => $menu_order++,
        ));
        if (is_wp_error($post_id) || !$post_id) continue;

        // Category term
        $term = term_exists($data['category'], 'pj_career_category');
        if (!$term) {
            $term = wp_insert_term($data['category'], 'pj_career_category');
        }
        if (!is_wp_error($term)) {
            $term_id = (int) (is_array($term) ? $term['term_id'] : $term);
            wp_set_post_terms($post_id, array($term_id), 'pj_career_category');
        }

        update_post_meta($post_id, '_pj_career_employment_type', $data['type']);
        update_post_meta($post_id, '_pj_career_start_date', $today);
        update_post_meta($post_id, '_pj_career_end_date', $end($data['days']));
        update_post_meta($post_id, '_pj_career_subtitle', $data['subtitle']);
        update_post_meta($post_id, '_pj_career_field', $data['field']);
        update_post_meta($post_id, '_pj_career_position', $data['position']);
        update_post_meta($post_id, '_pj_career_location', $data['location']);
        update_post_meta($post_id, '_pj_career_sections', $data['sections']);
    }

    update_option('pjlaw_careers_seeded', true);
}
add_action('init', 'pjlaw_seed_career_posts', 20);
