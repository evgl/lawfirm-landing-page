<?php
if (!defined('ABSPATH')) exit;

/**
 * One-shot migration of the previously hardcoded case entries into the
 * legal_case post type. Runs once, guarded by an option flag.
 *
 * Practice area (category) is assigned as a pj_case_category term — its name
 * is shown on the card and its slug is the data-type tab filter key. No image
 * is attached; page-cases.php falls back to assets/images/cases/case-base.jpg
 * when a case has no featured image (matching the original markup).
 */
function pjlaw_seed_case_posts() {
    if (get_option('pjlaw_cases_seeded')) return;

    $cases = array(
        array(
            'badge'    => '승소',
            'category' => '성범죄',
            'label'    => 'seungso',
            'title'    => '아청법 위반 혐의로 기소당했으나 변호인 조력을 통해 기소유예 처분을 받은 성범죄 사례',
            'desc'     => '아청법 위반 혐의로 기소당해 성범죄 변호사의 조력을 구하셨습니다. 법무법인 평정은 피의자 신분의 의뢰인을 대리했습니다.',
        ),
        array(
            'badge'    => '승소',
            'category' => '형사',
            'label'    => 'kisooyue',
            'title'    => '폭행 혐의로 수사를 받던 중 변호인의 적극적 대응으로 불기소 처분을 받은 형사 사례',
            'desc'     => '피의자 신분으로 경찰 조사를 받게 되어 형사 전문 변호사를 선임했습니다. 증거 분석과 진술 조력으로 불기소 처분을 이끌어냈습니다.',
        ),
        array(
            'badge'    => '승소',
            'category' => '민사',
            'label'    => 'seungso',
            'title'    => '계약 불이행으로 인한 손해배상 청구 소송에서 원고 승소 판결을 받은 민사 사례',
            'desc'     => '거래처의 계약 위반으로 큰 손해를 입어 법적 조치를 취했습니다. 치밀한 증거 수집과 법리 구성으로 전액 손해배상을 받았습니다.',
        ),
        array(
            'badge'    => '승소',
            'category' => '이혼',
            'label'    => 'kisooyue',
            'title'    => '장기 별거 상태에서 재산분할 및 위자료 청구 소송으로 정당한 권리를 찾은 사례',
            'desc'     => '배우자의 귀책 사유로 혼인 파탄에 이르렀고, 재산분할 및 위자료 청구를 통해 의뢰인의 정당한 몫을 확보했습니다.',
        ),
        array(
            'badge'    => '승소',
            'category' => '상속',
            'label'    => 'seungso',
            'title'    => '유류분 침해를 주장하며 제기한 유류분반환청구 소송에서 승소 판결을 받은 사례',
            'desc'     => '부모님 사망 후 특정 상속인에게 재산이 편중되어 유류분 침해가 발생했습니다. 법원의 적절한 심리를 통해 유류분을 회복했습니다.',
        ),
        array(
            'badge'    => '승소',
            'category' => '부동산',
            'label'    => 'kisooyue',
            'title'    => '전세보증금 반환 거부에 맞서 법적 절차를 통해 전액 반환 받은 부동산 사례',
            'desc'     => '임대차 계약 종료 후 임대인이 보증금 반환을 거부해 법적 조치를 취했습니다. 신속한 법원 절차로 전액 반환 판결을 받았습니다.',
        ),
    );

    $menu_order = 0;
    foreach ($cases as $data) {
        $existing = get_posts(array(
            'post_type'   => 'legal_case',
            'title'       => $data['title'],
            'numberposts' => 1,
            'post_status' => 'any',
        ));
        if ($existing) continue;

        $post_id = wp_insert_post(array(
            'post_type'    => 'legal_case',
            'post_title'   => $data['title'],
            'post_excerpt' => $data['desc'],
            'post_status'  => 'publish',
            'post_content' => '',
            'menu_order'   => $menu_order++,
        ));
        if (is_wp_error($post_id) || !$post_id) continue;

        $term = term_exists($data['category'], 'pj_case_category');
        if (!is_wp_error($term) && $term) {
            $term_id = (int) (is_array($term) ? $term['term_id'] : $term);
            wp_set_post_terms($post_id, array($term_id), 'pj_case_category');
        }

        update_post_meta($post_id, '_pj_case_badge', $data['badge']);
        update_post_meta($post_id, '_pj_case_label', $data['label']);
    }

    update_option('pjlaw_cases_seeded', true);
}
add_action('init', 'pjlaw_seed_case_posts', 20);
