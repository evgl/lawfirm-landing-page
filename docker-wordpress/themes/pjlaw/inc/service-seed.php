<?php
if (!defined('ABSPATH')) exit;

/**
 * Seed initial services and update category descriptions
 */
function pjlaw_seed_services() {
    if (get_option('pjlaw_services_seeded')) return;

    // Update category descriptions
    $categories = array(
        'civil'       => "민사 분쟁은 철저한 법리 검토와 신속한 임시처분(가압류, 가처분)을 통해 의뢰인의 정당한 권리 및 재산권을 지키는 것이 최선입니다. 법률사무소 평정은 풍부한 소송 수행 경험을 바탕으로 최선의 민사 전략을 제안합니다.\n법률사무소 평정은 의뢰인이 겪는 다양한 법률적 분쟁에 대해 다년간 축적해 온 실무 노하우를 바탕으로 든든한 조력자가 되어 드립니다.",
        'criminal'    => "형사 사건은 초기 대응에 따라 기소 여부와 처벌 수위가 달라집니다. 첫 조사에서의 진술, 자료 제출의 순서, 표현 하나까지 모두 수사 기록으로 남는 만큼, 사건을 정확히 이해한 상태에서 신중하게 대응할 필요가 있습니다.\n법률사무소 평정은 수사 단계부터 공판 단계 전 과정에서 의뢰인에게 불리한 판단이 고착되지 않도록 관리합니다. 형사 사건에 대한 많은 경험을 바탕으로 함께하겠습니다.",
        'sexual'      => "성범죄 사건은 증거 확보가 어려운 특수성이 있어 초기 진술 및 정황 입증이 무죄와 유죄를 가르는 핵심 열쇠입니다. 피해자와 가해자 어느 측면이든 일관된 태도로 법리를 개진해야 합니다.\n평정의 형사·성범죄 전담팀은 다년간의 승소 경험을 바탕으로 의뢰인의 권리를 보호하고 억울함이 남지 않도록 빈틈없이 조력하겠습니다.",
        'divorce'     => "이혼 및 가사 분쟁은 이성적인 법리 판별뿐만 아니라 의뢰인의 깊은 정신적 상처를 치유하고 미래의 안정된 삶을 확보하는 두 가지 차원을 함께 고려해야 하는 섬세한 절차입니다.\n법률사무소 평정은 재산분할, 위자료, 양육권 등 인생의 중대한 결정에서 의뢰인 편에 서서 가장 만족스럽고 평온한 합의와 판결을 이끌어냅니다.",
        'inheritance' => "상속 및 기여분, 유류분 반환 청구는 오랜 가족 간 갈등과 복잡한 세법·재산 배분 법리가 뒤섞인 고난도 소송 분야입니다. 공정하고 신속한 분할이 갈등의 종지부를 찍습니다.\n법률사무소 평정은 상속자 간의 매끄러운 조율부터 법정 공방까지 철저한 법리 준비와 세무 분석을 연계하여 최선의 유산 권리를 확보해 드립니다.",
        'realestate'  => "부동산 및 건설 소송은 임대차 갈등, 명도 청구, 분양 대금, 재개발 지분 등 복잡한 계약 관계와 막대한 금전 가치가 얽혀 있어 신속한 가처분 집행과 확실한 소유권 증명이 최우선입니다.\n평정은 부동산 거래 실무와 법리에 능통한 소속 변호사들이 모여 의뢰인의 부동산 권리를 지키고 분쟁을 신속하게 해결하는 원스톱 솔루션을 제공합니다.",
        'corporate'   => "기업 법무 및 자문은 복잡한 상법 규정, 경영권 분쟁, 계약 리스크, 노무 이슈를 사전에 진단하고 예방하는 동반자적 자문 체계 구축이 가장 이상적입니다.\n법률사무소 평정은 정기 법률 자문부터 기업 소송, 도산 및 구조조정에 이르기까지 신속하고 밀착된 법률 컨설팅으로 비즈니스의 법적 안정성을 지켜 드립니다."
    );

    foreach ($categories as $slug => $desc) {
        $term = get_term_by('slug', $slug, 'pj_service_category');
        if ($term && !is_wp_error($term)) {
            wp_update_term($term->term_id, 'pj_service_category', array('description' => $desc));
        }
    }

    // 1. Seed detailed '명예훼손' service
    $defamation_title = '명예훼손';
    $existing = get_posts(array(
        'post_type'   => 'pj_service',
        'title'       => $defamation_title,
        'numberposts' => 1,
        'post_status' => 'any'
    ));

    if (!$existing) {
        $defamation_id = wp_insert_post(array(
            'post_type'   => 'pj_service',
            'post_title'  => $defamation_title,
            'post_status' => 'publish',
            'menu_order'  => 1
        ));

        if ($defamation_id && !is_wp_error($defamation_id)) {
            // Assign category '민사' and '형사'
            $category_ids = array();
            foreach (array('civil', 'criminal') as $slug) {
                $term = get_term_by('slug', $slug, 'pj_service_category');
                if ($term) $category_ids[] = (int) $term->term_id;
            }
            wp_set_post_terms($defamation_id, $category_ids, 'pj_service_category');

            // Assign tags
            $tag_names = array('사이버범죄', '따돌림', '분리조치', '학폭위', '생기부');
            $tag_ids = array();
            foreach ($tag_names as $tag_name) {
                $term = term_exists($tag_name, 'pj_service_tag');
                if (!$term) {
                    $term = wp_insert_term($tag_name, 'pj_service_tag');
                }
                if (!is_wp_error($term)) {
                    $tag_ids[] = (int) (is_array($term) ? $term['term_id'] : $term);
                }
            }
            wp_set_post_terms($defamation_id, $tag_ids, 'pj_service_tag');

            // Set main title meta
            update_post_meta($defamation_id, '_pj_service_main_title', '명예훼손의 개념, 처벌수위 및 쟁점');

            // Set closing block
            update_post_meta($defamation_id, '_pj_service_closing_title', '법률사무소 평정이 함께합니다');
            update_post_meta($defamation_id, '_pj_service_closing_content', "명예훼손은 누구나 피해자가 될 수 있는 동시에, 한순간의 실수로 의도치 않게 가해자로 지목될 수도 있는 사건입니다.\n특히 온라인상의 발언은 찰나의 순간에 전파되어 누군가에게는 회복하기 어려운 인격적 상처를 남기고, 다른 누군가에게는 과도한 형사 처벌과 경제적 손실이라는 위기를 불러오기도 합니다. 사건의 본질이 정당한 비판이었는지 아니면 악의적인 비방이었는지를 가려내는 일은 단순히 사실관계를 확인하는 수준을 넘어, 고도의 법리적 해석과 치밀한 논리 싸움이 동반되어야 하는 과정입니다.\n법률사무소 평정은 소중한 명예를 침해당한 피해자에게는 실효성 있는 증거 수집과 단호한 대응으로 실추된 평판을 되찾아드리고, 억울하게 고소를 당한 가해 피의자에게는 발언의 공익성과 비방 목적의 부재를 입증하여 부당한 처벌로부터 방어해 드립니다. 명예훼손 사건의 핵심인 특정성, 공연성, 위법성 조각 사유 등을 정밀하게 분석함으로써, 의뢰인이 처한 각자의 입장에서 가장 유리한 판결과 합리적인 합의를 이끌어낼 수 있는 맞춤형 전략을 구축합니다.\n법이라는 잣대가 누군가에게는 정당한 구제가 되고, 누군가에게는 가혹한 올가미가 되지 않도록 의뢰인의 권익을 최우선으로 보호합니다. 피해와 방어라는 서로 다른 입장에 서 있더라도, 결국 법률사무소 평정이 지향하는 가치는 왜곡된 사실을 바로잡고 일상의 평온을 되찾아드리는 데 있습니다.\n예기치 못한 분쟁으로 법적 조력이 간절한 순간, 평정이 쌓아온 전문성이 여러분의 명예와 일상을 지키는 든든한 방패가 되어드리겠습니다.");

            // Set cards data
            $cards = array(
                array(
                    'heading'     => '명예훼손 개념',
                    'content'     => "명예훼손은 \"공연히 사실을 적시\"하여 사람(또는 사자)의 사회적 평가를 떨어뜨리는 행위를 말합니다(형법 제307조). 내용이 진실이더라도 성립할 수 있고(사실적시 명예훼손), 허위사실이면 더 무겁게 처벌됩니다.\n온라인 게시글은 정보통신망법이 별도로 문제될 수 있으며, 이 경우 '비방할 목적'이 추가 요건이 됩니다(정보통신망법 제70조).\n또한 사실적시 명예훼손은 진실한 사실로서 오로지 공공의 이익에 관한 때 위법성이 조각되어 처벌하지 않는 예외가 있습니다(형법 제310조).",
                    'table_title' => '형사적 쟁점',
                    'table_data'  => "구분 | 핵심 쟁점\n특정성 | 피해자가 특정되는지(실명뿐 아니라 주변 정황으로 특정 가능 여부)\n공연성 | 불특정 또는 다수가 인식할 수 있는 상태인지\n사실의 적시 | 의견·평가가 아니라 구체적 사실을 드러냈는지(모욕과의 구별)\n진실/허위 | 사실적시(형법 제307조 제1항)인지 허위사실(형법 제307조 제2항)인지\n공공의 이익 | 사실적시인 경우 '진실한 사실 + 오로지 공공의 이익'이면 위법성 조각(형법 제310조)\n비방 목적 | 출판물/정보통신망 유형(형법 제309조, 정보통신망법 제70조)은 '비방 목적'이 성립요건\n의사에 반한 공소 | 형법 제307조·제309조는 피해자 의사에 반해 공소 제기 불가(반의사불벌죄, 형법 제312조 제2항)",
                    'laws_data'   => "형법 제310조(위법성의 조각) 제307조\n제1항의 행위가 진실한 사실로서 오로지 공공의 이익에 관한 때에는 처벌하지 아니한다.\n---\n형법 제312조(고소와 피해자의 의사)\n② 제307조와 제309조의 죄는 피해자의 명시한 의사에 반하여 공소를 제기할 수 없다."
                ),
                array(
                    'heading'     => '명예훼손 처벌 수위',
                    'content'     => "형법상 사실적시 명예훼손은 2년 이하 징역·금고 또는 500만원 이하 벌금, 허위사실 적시 명예훼손은 5년 이하 징역, 10년 이하 자격정지 또는 1천만원 이하 벌금입니다(형법 제307조).\n출판물 등에 의한 경우에는 비방 목적이 있으면 사실적시도 3년 이하 징역·금고 또는 700만원 이하 벌금, 허위사실은 7년 이하 징역, 10년 이하 자격정지 또는 1천만원 이하 벌금입니다(형법 제309조).\n온라인(정보통신망)으로 비방 목적으로 사실을 드러낸 경우는 3년 이하 징역 또는 3천만원 이하 벌금, 허위사실은 7년 이하 징역, 10년 이하 자격정지 또는 5천만원 이하 벌금에 처해집니다(정보통신망법 제70조).",
                    'table_title' => '',
                    'table_data'  => '',
                    'laws_data'   => "형법 제307조(명예훼손)\n① 공연히 사실을 적시하여 사람의 명예를 훼손한 자는 2년 이하의 징역이나 금고 또는 500만원 이하의 벌금에 처한다.\n② 공연히 허위의 사실을 적시하여 사람의 명예를 훼손한 자는 5년 이하의 징역, 10년 이하의 자격정지 또는 1천만원 이하의 벌금에 처한다.\n---\n형법 제309조(출판물등에 의한 명예훼손)\n① 사람을 비방할 목적으로 신문, 잡지 또는 라디오 기타 출판물에 의하여 제307조제1항의 죄를 범한 자는 3년 이하의 징역이나 금고 또는 700만원 이하의 벌금에 처한다.\n② 전항의 방법으로 제307조제2항 of 죄를 범한 자는 7년 이하의 징역, 10년 이하의 자격정지 또는 1천만원 이하의 벌금에 처한다.\n---\n정보통신망 이용촉진 및 정보보호 등에 관한 법률 제70조(벌칙)\n① 사람을 비방할 목적으로 정보통신망을 통하여 공공연하게 사실을 드러내어 다른 사람의 명예를 훼손한 자는 3년 이하의 징역 또는 3천만원 이하의 벌금에 처한다.\n② 사람을 비방할 목적으로 정보통신망을 통하여 공공연하게 거짓의 사실을 드러내어 다른 사람의 명예를 훼손한 자는 7년 이하의 징역, 10년 이하의 자격정지 또는 5천만원 이하의 벌금에 처한다."
                ),
                array(
                    'heading'     => '명예훼손 양형 기준',
                    'content'     => "대법원 양형위원회 양형기준은 '허위사실 적시 명예훼손'에 대해 권고형량 범위를 제시합니다.\n사실적시 명예훼손(형법 제307조 제1항)은 비범죄화 요구가 많은 점을 고려해 별도 양형기준을 설정하지 않았으므로, 실무에서는 행위 태양(전파가능성·피해 정도·동기 등)과 감경·가중 요소가 형에 큰 영향을 줍니다.",
                    'table_title' => '',
                    'table_data'  => "유형 | 구분 | 감경영역 | 기본영역 | 가중영역\n제1유형 | 일반 명예훼손(허위사실 적시) | 벌금형 ~ 징역 6월 | 징역 4월 ~ 1년 | 징역 6월 ~ 1년 6월\n제2유형 | 출판물등·정보통신망 이용 명예훼손(허위사실 적시) | 벌금형 ~ 징역 8월 | 징역 6월 ~ 1년 4월 | 징역 8월 ~ 2년 6월",
                    'laws_data'   => ''
                ),
                array(
                    'heading'     => '명예훼손 민사적 쟁점',
                    'content'     => "명예훼손은 형사책임과 별개로 민사상 불법행위 책임이 함께 문제될 수 있습니다.\n대표적으로 위자료(정신적 손해) 청구가 가능하고, 법원은 손해배상에 갈음하거나 손해배상과 함께 명예회복에 적당한 처분을 명할 수 있습니다(민법 제764조).\n다만 '명예회복 처분'의 내용은 사건별로 쟁점이 되며, 무엇이 명예를 침해했는지(표현의 내용·전파 범위·기간 등)와 손해의 정도가 중심으로 다뤄집니다.\n민사상 명예훼손이 성립하기 위해서는 피해자의 사회적 가치 내지 평가가 침해될 가능성이 있는 구체적 사실을 적시하여야 합니다.",
                    'table_title' => '',
                    'table_data'  => '',
                    'laws_data'   => "민법 제751조(재산 이외의 손해의 배상)\n① 타인의 신체, 자유 또는 명예를 해하거나 기타 정신상 고통을 가한 자는 재산 이외의 손해에 대하여도 배상할 책임이 있다.\n---\n민법 제764조(명예훼손의 경우의 특칙)\n타인의 명예를 훼손한 자에 대하여는 법원은 피해자의 청구에 의하여 손해배상에 갈음하거나 손해배상과 함께 명예회복에 적당한 처분을 명할 수 있다."
                )
            );
            update_post_meta($defamation_id, '_pj_service_cards', $cards);
        }
    }

    // 2. Seed skeleton services across all categories
    $skeleton_services = array(
        'civil'       => array('가등기말소', '손해배상', '부당이득금', '대여금', '매매대금', '구상', '계약금', '계약해제', '건물인도', '근저당말소', '내용증명', '가압류/가처분'),
        'criminal'    => array('감금', '강도', '강요', '공갈', '공무집행방해', '교통사고', '금융범죄', '경범죄처벌법위반'),
        'sexual'      => array('강간', '강제추행', '공연음란', '군성범죄'),
        'divorce'     => array('이혼', '양육권'),
        'inheritance' => array('가사상속', '기타가사상속'),
        'realestate'  => array('건물인도', '근저당말소'),
        'corporate'   => array('기업 일반소송', '기업도산', '기업법무', '기업자문')
    );

    $menu_order_counter = 10;
    foreach ($skeleton_services as $cat_slug => $service_list) {
        $term = get_term_by('slug', $cat_slug, 'pj_service_category');
        if (!$term) continue;

        foreach ($service_list as $service_title) {
            // Check if post already exists
            $existing_post = get_posts(array(
                'post_type'   => 'pj_service',
                'title'       => $service_title,
                'numberposts' => 1,
                'post_status' => 'any'
            ));

            if (!$existing_post) {
                $post_id = wp_insert_post(array(
                    'post_type'   => 'pj_service',
                    'post_title'  => $service_title,
                    'post_status' => 'publish',
                    'menu_order'  => $menu_order_counter++
                ));

                if ($post_id && !is_wp_error($post_id)) {
                    // Assign category term
                    wp_set_post_terms($post_id, array((int) $term->term_id), 'pj_service_category', true);
                    
                    // Add dummy card so clicking them renders a basic template
                    $dummy_cards = array(
                        array(
                            'heading'     => $service_title . ' 개요',
                            'content'     => "법률사무소 평정은 의뢰인이 당면한 " . $service_title . " 관련 법적 문제들을 세밀하게 분석하고 체계적인 대응책을 수립합니다.\n이 분야의 전문 변호사들이 권익을 보호하고 최선의 판결 및 신속한 합의를 이끌어낼 수 있도록 밀착 조력하겠습니다.",
                            'table_title' => '',
                            'table_data'  => '',
                            'laws_data'   => ''
                        )
                    );
                    update_post_meta($post_id, '_pj_service_cards', $dummy_cards);
                }
            } else {
                // If it already exists, make sure the taxonomy relation is assigned
                $post_id = $existing_post[0]->ID;
                wp_set_post_terms($post_id, array((int) $term->term_id), 'pj_service_category', true);
            }
        }
    }

    update_option('pjlaw_services_seeded', true);
}
add_action('init', 'pjlaw_seed_services', 20);
