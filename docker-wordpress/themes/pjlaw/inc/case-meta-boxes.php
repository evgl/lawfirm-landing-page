<?php
if (!defined('ABSPATH')) exit;

function pjlaw_case_add_meta_boxes() {
    add_meta_box('pj_case_info', '사례 정보', 'pjlaw_case_info_cb', 'legal_case', 'side', 'high');
}
add_action('add_meta_boxes', 'pjlaw_case_add_meta_boxes');

function pjlaw_case_info_cb($post) {
    wp_nonce_field('pjlaw_case_meta', 'pjlaw_case_nonce');
    $badge = get_post_meta($post->ID, '_pj_case_badge', true);
    $label = get_post_meta($post->ID, '_pj_case_label', true);
    if ($label === '') $label = 'seungso';
    $labels = array(
        'seungso'  => '승소 (seungso)',
        'kisooyue' => '기소유예 (kisooyue)',
    );
    ?>
    <p>
        <label><?php esc_html_e('결과 배지 (예: 승소)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_case_badge" value="<?php echo esc_attr($badge); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('라벨 오버레이 이미지', 'pjlaw'); ?></label><br>
        <select name="pj_case_label" style="width:100%">
            <?php foreach ($labels as $value => $text) : ?>
                <option value="<?php echo esc_attr($value); ?>" <?php selected($label, $value); ?>><?php echo esc_html($text); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p class="description"><?php esc_html_e('카드 본문은 발췌(요약), 대표 이미지는 카드 이미지로 표시됩니다. 분야는 우측 분야 박스에서 선택하세요.', 'pjlaw'); ?></p>
    <?php
}

function pjlaw_case_save_meta($post_id) {
    if (!isset($_POST['pjlaw_case_nonce']) || !wp_verify_nonce($_POST['pjlaw_case_nonce'], 'pjlaw_case_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['pj_case_badge'])) {
        update_post_meta($post_id, '_pj_case_badge', sanitize_text_field(wp_unslash($_POST['pj_case_badge'])));
    }
    if (isset($_POST['pj_case_label'])) {
        $label = sanitize_text_field(wp_unslash($_POST['pj_case_label']));
        $allowed = array('seungso', 'kisooyue');
        update_post_meta($post_id, '_pj_case_label', in_array($label, $allowed, true) ? $label : 'seungso');
    }
}
add_action('save_post_legal_case', 'pjlaw_case_save_meta');
