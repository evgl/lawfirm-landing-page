<?php
if (!defined('ABSPATH')) exit;

/**
 * Add custom meta boxes for pj_service
 */
function pjlaw_service_add_meta_boxes() {
    add_meta_box('pj_service_general', '일반 정보', 'pjlaw_service_general_cb', 'pj_service', 'normal', 'high');
    add_meta_box('pj_service_cards', '상세 카드 (개념/처벌/양형/민사 쟁점)', 'pjlaw_service_cards_cb', 'pj_service', 'normal', 'high');
    add_meta_box('pj_service_closing', '맺음말 섹션', 'pjlaw_service_closing_cb', 'pj_service', 'normal', 'default');
    add_meta_box('pj_service_related', '관련 콘텐츠 (아이디 입력)', 'pjlaw_service_related_cb', 'pj_service', 'side', 'default');
}
add_action('add_meta_boxes', 'pjlaw_service_add_meta_boxes');

/**
 * General meta box callback
 */
function pjlaw_service_general_cb($post) {
    wp_nonce_field('pjlaw_service_meta', 'pjlaw_service_nonce');
    $main_title = get_post_meta($post->ID, '_pj_service_main_title', true);
    ?>
    <p>
        <label><strong><?php esc_html_e('메인 타이틀 (선택, 기본값: <분야명>의 개념, 처벌수위 및 쟁점)', 'pjlaw'); ?></strong></label><br>
        <input type="text" name="pj_service_main_title" value="<?php echo esc_attr($main_title); ?>" style="width:100%;margin-top:6px" placeholder="예: 명예훼손의 개념, 처벌수위 및 쟁점">
    </p>
    <?php
}

/**
 * Repeater meta box callback for Cards
 */
function pjlaw_service_cards_cb($post) {
    $cards = get_post_meta($post->ID, '_pj_service_cards', true);
    if (!is_array($cards)) $cards = array();
    ?>
    <p class="description" style="margin-bottom:15px;">
        <?php esc_html_e('각 상세 카드를 추가하고 본문, 표 데이터, 관련 법조항을 관리합니다.', 'pjlaw'); ?><br>
        - <strong><?php esc_html_e('표 데이터', 'pjlaw'); ?></strong>: <?php esc_html_e('첫 줄은 헤더로 처리됩니다. 열은 | 기호로 구분하고 행은 줄바꿈으로 구분합니다. (예: 구분 | 핵심 쟁점)', 'pjlaw'); ?><br>
        - <strong><?php esc_html_e('관련 법조항', 'pjlaw'); ?></strong>: <?php esc_html_e('각 법조항 블록은 --- 기호로 구분합니다. 각 블록의 첫 줄은 법조항 제목이고 나머지는 내용입니다.', 'pjlaw'); ?>
    </p>
    <div id="pj-service-cards-list">
    <?php foreach ($cards as $i => $card) : ?>
        <div class="pj-service-card-row" style="margin-bottom:20px;padding:15px;border:1px solid #ccc;background:#f9f9f9;border-radius:4px;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;border-bottom:1px solid #eee;padding-bottom:8px;">
                <h4 style="margin:0;"><?php printf('카드 #%d', $i + 1); ?></h4>
                <button type="button" class="button pj-service-card-remove" style="color:#a00;border-color:#ccc;"><?php esc_html_e('카드 삭제', 'pjlaw'); ?></button>
            </div>
            <p>
                <label><strong><?php esc_html_e('카드 제목', 'pjlaw'); ?></strong></label><br>
                <input type="text" name="pj_service_cards[<?php echo $i; ?>][heading]" value="<?php echo esc_attr($card['heading'] ?? ''); ?>" style="width:100%;margin-top:4px;">
            </p>
            <p>
                <label><strong><?php esc_html_e('카드 본문', 'pjlaw'); ?></strong></label><br>
                <textarea name="pj_service_cards[<?php echo $i; ?>][content]" rows="4" style="width:100%;margin-top:4px;"><?php echo esc_textarea($card['content'] ?? ''); ?></textarea>
            </p>
            <p style="background:#fff;padding:10px;border:1px dashed #ddd;">
                <label><strong><?php esc_html_e('표 제목 (선택)', 'pjlaw'); ?></strong></label>
                <input type="text" name="pj_service_cards[<?php echo $i; ?>][table_title]" value="<?php echo esc_attr($card['table_title'] ?? ''); ?>" style="width:100%;margin-top:4px;margin-bottom:10px;"><br>
                <label><strong><?php esc_html_e('표 데이터 (선택)', 'pjlaw'); ?></strong></label><br>
                <textarea name="pj_service_cards[<?php echo $i; ?>][table_data]" rows="3" placeholder="구분 | 핵심 쟁점&#10;특정성 | 피해자가 특정되는지 여부&#10;공연성 | 불특정 다수가 인식 가능한지 여부" style="width:100%;margin-top:4px;font-family:monospace;"><?php echo esc_textarea($card['table_data'] ?? ''); ?></textarea>
            </p>
            <p style="background:#fff;padding:10px;border:1px dashed #ddd;">
                <label><strong><?php esc_html_e('관련 법조항 데이터 (선택)', 'pjlaw'); ?></strong></label><br>
                <textarea name="pj_service_cards[<?php echo $i; ?>][laws_data]" rows="4" placeholder="형법 제307조(명예훼손)&#10;① 공연히 사실을 적시하여 명예를 훼손한 자는...&#10;---&#10;형법 제309조(출판물에 의한 명예훼손)&#10;① 사람을 비방할 목적으로..." style="width:100%;margin-top:4px;font-family:monospace;"><?php echo esc_textarea($card['laws_data'] ?? ''); ?></textarea>
            </p>
        </div>
    <?php endforeach; ?>
    </div>
    <button type="button" class="button button-primary" id="pj-service-card-add" style="margin-top:10px;"><?php esc_html_e('+ 카드 추가', 'pjlaw'); ?></button>

    <script>
    (function(){
        var list = document.getElementById('pj-service-cards-list');
        var idx = <?php echo count($cards); ?>;
        
        document.getElementById('pj-service-card-add').addEventListener('click', function(){
            var row = document.createElement('div');
            row.className = 'pj-service-card-row';
            row.style.cssText = 'margin-bottom:20px;padding:15px;border:1px solid #ccc;background:#f9f9f9;border-radius:4px;';
            
            row.innerHTML = 
                '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;border-bottom:1px solid #eee;padding-bottom:8px;">' +
                    '<h4 style="margin:0;">카드 #' + (idx + 1) + '</h4>' +
                    '<button type="button" class="button pj-service-card-remove" style="color:#a00;border-color:#ccc;">카드 삭제</button>' +
                '</div>' +
                '<p>' +
                    '<label><strong>카드 제목</strong></label><br>' +
                    '<input type="text" name="pj_service_cards[' + idx + '][heading]" style="width:100%;margin-top:4px;">' +
                '</p>' +
                '<p>' +
                    '<label><strong>카드 본문</strong></label><br>' +
                    '<textarea name="pj_service_cards[' + idx + '][content]" rows="4" style="width:100%;margin-top:4px;"></textarea>' +
                '</p>' +
                '<p style="background:#fff;padding:10px;border:1px dashed #ddd;">' +
                    '<label><strong>표 제목 (선택)</strong></label>' +
                    '<input type="text" name="pj_service_cards[' + idx + '][table_title]" style="width:100%;margin-top:4px;margin-bottom:10px;"><br>' +
                    '<label><strong>표 데이터 (선택)</strong></label><br>' +
                    '<textarea name="pj_service_cards[' + idx + '][table_data]" rows="3" placeholder="구분 | 핵심 쟁점&#10;특정성 | 피해자가 특정되는지 여부" style="width:100%;margin-top:4px;font-family:monospace;"></textarea>' +
                '</p>' +
                '<p style="background:#fff;padding:10px;border:1px dashed #ddd;">' +
                    '<label><strong>관련 법조항 데이터 (선택)</strong></label><br>' +
                    '<textarea name="pj_service_cards[' + idx + '][laws_data]" rows="4" placeholder="형법 제307조(명예훼손)&#10;① 공연히 사실을 적시하여...&#10;---&#10;형법 제309조..." style="width:100%;margin-top:4px;font-family:monospace;"></textarea>' +
                '</p>';
            
            list.appendChild(row);
            idx++;
        });

        list.addEventListener('click', function(e){
            if (e.target.classList.contains('pj-service-card-remove')) {
                e.target.closest('.pj-service-card-row').remove();
                // Re-number header labels
                var rows = list.querySelectorAll('.pj-service-card-row');
                rows.forEach(function(r, i){
                    r.querySelector('h4').textContent = '카드 #' + (i + 1);
                });
            }
        });
    })();
    </script>
    <?php
}

/**
 * Closing section meta box callback
 */
function pjlaw_service_closing_cb($post) {
    $closing_title = get_post_meta($post->ID, '_pj_service_closing_title', true);
    $closing_desc  = get_post_meta($post->ID, '_pj_service_closing_content', true);
    ?>
    <p>
        <label><strong><?php esc_html_e('맺음말 제목 (기본값: 법률사무소 평정이 함께합니다)', 'pjlaw'); ?></strong></label><br>
        <input type="text" name="pj_service_closing_title" value="<?php echo esc_attr($closing_title); ?>" style="width:100%;margin-top:6px" placeholder="예: 법률사무소 평정이 함께합니다">
    </p>
    <p>
        <label><strong><?php esc_html_e('맺음말 본문 (기본값: 명예훼손은 누구나 피해자가 될 수 있는 동시에...)', 'pjlaw'); ?></strong></label><br>
        <textarea name="pj_service_closing_content" rows="6" style="width:100%;margin-top:6px" placeholder="맺음말 카드에 들어갈 본문 텍스트를 작성하세요."><?php echo esc_textarea($closing_desc); ?></textarea>
    </p>
    <?php
}

/**
 * Related posts side box callback
 */
function pjlaw_service_related_cb($post) {
    $law_info    = get_post_meta($post->ID, '_pj_service_related_law_info', true);
    $strategies  = get_post_meta($post->ID, '_pj_service_related_strategies', true);
    $cases       = get_post_meta($post->ID, '_pj_service_related_cases', true);
    ?>
    <p class="description" style="margin-bottom:10px;">
        <?php esc_html_e('각 섹션에 수동으로 노출시킬 포스트 ID들을 쉼표(,)로 구분해 입력하세요. 비워두면 자동으로 연관 분야 포스트들을 노출합니다.', 'pjlaw'); ?>
    </p>
    <p>
        <label><strong><?php esc_html_e('관련 법률정보 (블로그 글 ID)', 'pjlaw'); ?></strong></label><br>
        <input type="text" name="pj_service_related_law_info" value="<?php echo esc_attr($law_info); ?>" style="width:100%">
    </p>
    <p>
        <label><strong><?php esc_html_e('관련 대응전략 (블로그 글 ID)', 'pjlaw'); ?></strong></label><br>
        <input type="text" name="pj_service_related_strategies" value="<?php echo esc_attr($strategies); ?>" style="width:100%">
    </p>
    <p>
        <label><strong><?php esc_html_e('관련 업무사례 (사례 글 ID)', 'pjlaw'); ?></strong></label><br>
        <input type="text" name="pj_service_related_cases" value="<?php echo esc_attr($cases); ?>" style="width:100%">
    </p>
    <?php
}

/**
 * Save meta values for pj_service CPT
 */
function pjlaw_service_save_meta($post_id) {
    if (!isset($_POST['pjlaw_service_nonce']) || !wp_verify_nonce($_POST['pjlaw_service_nonce'], 'pjlaw_service_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_pj_service_main_title'      => array('key' => 'pj_service_main_title',      'cb' => 'sanitize_text_field'),
        '_pj_service_closing_title'   => array('key' => 'pj_service_closing_title',   'cb' => 'sanitize_text_field'),
        '_pj_service_closing_content' => array('key' => 'pj_service_closing_content', 'cb' => 'sanitize_textarea_field'),
        '_pj_service_related_law_info' => array('key' => 'pj_service_related_law_info', 'cb' => 'sanitize_text_field'),
        '_pj_service_related_strategies' => array('key' => 'pj_service_related_strategies', 'cb' => 'sanitize_text_field'),
        '_pj_service_related_cases'    => array('key' => 'pj_service_related_cases',    'cb' => 'sanitize_text_field'),
    );

    foreach ($fields as $meta_key => $field) {
        if (isset($_POST[$field['key']])) {
            update_post_meta($post_id, $meta_key, call_user_func($field['cb'], wp_unslash($_POST[$field['key']])));
        }
    }

    if (isset($_POST['pj_service_cards']) && is_array($_POST['pj_service_cards'])) {
        $cards = array();
        foreach ($_POST['pj_service_cards'] as $item) {
            $heading = sanitize_text_field(wp_unslash($item['heading'] ?? ''));
            $content = sanitize_textarea_field(wp_unslash($item['content'] ?? ''));
            $table_title = sanitize_text_field(wp_unslash($item['table_title'] ?? ''));
            $table_data = sanitize_textarea_field(wp_unslash($item['table_data'] ?? ''));
            $laws_data = sanitize_textarea_field(wp_unslash($item['laws_data'] ?? ''));

            if ($heading !== '' || $content !== '') {
                $cards[] = array(
                    'heading'     => $heading,
                    'content'     => $content,
                    'table_title' => $table_title,
                    'table_data'  => $table_data,
                    'laws_data'   => $laws_data,
                );
            }
        }
        update_post_meta($post_id, '_pj_service_cards', $cards);
    } else {
        update_post_meta($post_id, '_pj_service_cards', array());
    }
}
add_action('save_post_pj_service', 'pjlaw_service_save_meta');
