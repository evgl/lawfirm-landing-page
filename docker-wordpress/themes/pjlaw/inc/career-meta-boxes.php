<?php
if (!defined('ABSPATH')) exit;

function pjlaw_career_add_meta_boxes() {
    add_meta_box('pj_career_info', '채용 정보', 'pjlaw_career_info_cb', 'pj_career', 'normal', 'high');
    add_meta_box('pj_career_sections', '상세 섹션', 'pjlaw_career_sections_cb', 'pj_career', 'normal', 'default');
}
add_action('add_meta_boxes', 'pjlaw_career_add_meta_boxes');

function pjlaw_career_info_cb($post) {
    wp_nonce_field('pjlaw_career_meta', 'pjlaw_career_nonce');
    $type     = get_post_meta($post->ID, '_pj_career_employment_type', true);
    $start    = get_post_meta($post->ID, '_pj_career_start_date', true);
    $end      = get_post_meta($post->ID, '_pj_career_end_date', true);
    $subtitle = get_post_meta($post->ID, '_pj_career_subtitle', true);
    $field    = get_post_meta($post->ID, '_pj_career_field', true);
    $position = get_post_meta($post->ID, '_pj_career_position', true);
    $location = get_post_meta($post->ID, '_pj_career_location', true);
    $types    = array('경력', '신입/인턴');
    ?>
    <p>
        <label><?php esc_html_e('고용형태', 'pjlaw'); ?></label><br>
        <select name="pj_career_employment_type" style="width:100%">
            <?php foreach ($types as $t) : ?>
                <option value="<?php echo esc_attr($t); ?>" <?php selected($type, $t); ?>><?php echo esc_html($t); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p style="display:flex;gap:16px">
        <span style="flex:1">
            <label><?php esc_html_e('공고 시작일', 'pjlaw'); ?></label><br>
            <input type="date" name="pj_career_start_date" value="<?php echo esc_attr($start); ?>" style="width:100%">
        </span>
        <span style="flex:1">
            <label><?php esc_html_e('공고 마감일', 'pjlaw'); ?></label><br>
            <input type="date" name="pj_career_end_date" value="<?php echo esc_attr($end); ?>" style="width:100%">
        </span>
    </p>
    <p>
        <label><?php esc_html_e('포지션 부제 (상세 페이지 소제목)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_career_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width:100%">
    </p>
    <p style="display:flex;gap:16px">
        <span style="flex:1">
            <label><?php esc_html_e('분야', 'pjlaw'); ?></label><br>
            <input type="text" name="pj_career_field" value="<?php echo esc_attr($field); ?>" style="width:100%">
        </span>
        <span style="flex:1">
            <label><?php esc_html_e('직급', 'pjlaw'); ?></label><br>
            <input type="text" name="pj_career_position" value="<?php echo esc_attr($position); ?>" style="width:100%">
        </span>
        <span style="flex:1">
            <label><?php esc_html_e('근무지역', 'pjlaw'); ?></label><br>
            <input type="text" name="pj_career_location" value="<?php echo esc_attr($location); ?>" style="width:100%">
        </span>
    </p>
    <?php
}

function pjlaw_career_sections_cb($post) {
    $sections = get_post_meta($post->ID, '_pj_career_sections', true);
    if (!is_array($sections)) $sections = array();
    ?>
    <p class="description"><?php esc_html_e('각 섹션은 제목과 항목 목록으로 구성됩니다. 항목은 한 줄에 하나씩 입력하세요. (<strong> 태그 사용 가능)', 'pjlaw'); ?></p>
    <div id="pj-career-sections">
    <?php foreach ($sections as $i => $section) :
        $items_text = isset($section['items']) && is_array($section['items']) ? implode("\n", $section['items']) : '';
    ?>
        <div class="pj-career-section-row" style="margin-bottom:12px;padding:12px;border:1px solid #ddd;background:#fafafa">
            <input type="text" name="pj_career_sections[<?php echo $i; ?>][heading]" value="<?php echo esc_attr($section['heading'] ?? ''); ?>" placeholder="<?php esc_attr_e('섹션 제목 (예: 주요업무)', 'pjlaw'); ?>" style="width:100%;margin-bottom:6px">
            <textarea name="pj_career_sections[<?php echo $i; ?>][items]" rows="4" placeholder="<?php esc_attr_e('항목을 한 줄에 하나씩 입력', 'pjlaw'); ?>" style="width:100%"><?php echo esc_textarea($items_text); ?></textarea>
            <button type="button" class="button pj-career-section-remove" style="margin-top:6px"><?php esc_html_e('섹션 삭제', 'pjlaw'); ?></button>
        </div>
    <?php endforeach; ?>
    </div>
    <button type="button" class="button button-primary" id="pj-career-section-add"><?php esc_html_e('+ 섹션 추가', 'pjlaw'); ?></button>
    <script>
    (function(){
        var list = document.getElementById('pj-career-sections');
        var idx = <?php echo count($sections); ?>;
        document.getElementById('pj-career-section-add').addEventListener('click', function(){
            var row = document.createElement('div');
            row.className = 'pj-career-section-row';
            row.style.cssText = 'margin-bottom:12px;padding:12px;border:1px solid #ddd;background:#fafafa';

            var heading = document.createElement('input');
            heading.type = 'text';
            heading.name = 'pj_career_sections[' + idx + '][heading]';
            heading.placeholder = '<?php echo esc_js(__('섹션 제목 (예: 주요업무)', 'pjlaw')); ?>';
            heading.style.cssText = 'width:100%;margin-bottom:6px';

            var items = document.createElement('textarea');
            items.name = 'pj_career_sections[' + idx + '][items]';
            items.rows = 4;
            items.placeholder = '<?php echo esc_js(__('항목을 한 줄에 하나씩 입력', 'pjlaw')); ?>';
            items.style.width = '100%';

            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'button pj-career-section-remove';
            btn.style.marginTop = '6px';
            btn.textContent = '<?php echo esc_js(__('섹션 삭제', 'pjlaw')); ?>';

            row.appendChild(heading);
            row.appendChild(items);
            row.appendChild(btn);
            list.appendChild(row);
            idx++;
        });
        list.addEventListener('click', function(e){
            if (e.target.classList.contains('pj-career-section-remove')) {
                e.target.closest('.pj-career-section-row').remove();
            }
        });
    })();
    </script>
    <?php
}

function pjlaw_career_save_meta($post_id) {
    if (!isset($_POST['pjlaw_career_nonce']) || !wp_verify_nonce($_POST['pjlaw_career_nonce'], 'pjlaw_career_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_pj_career_employment_type' => 'pj_career_employment_type',
        '_pj_career_start_date'      => 'pj_career_start_date',
        '_pj_career_end_date'        => 'pj_career_end_date',
        '_pj_career_subtitle'        => 'pj_career_subtitle',
        '_pj_career_field'           => 'pj_career_field',
        '_pj_career_position'        => 'pj_career_position',
        '_pj_career_location'        => 'pj_career_location',
    );

    foreach ($fields as $meta_key => $post_key) {
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field(wp_unslash($_POST[$post_key])));
        }
    }

    if (isset($_POST['pj_career_sections']) && is_array($_POST['pj_career_sections'])) {
        $sections = array();
        foreach ($_POST['pj_career_sections'] as $raw) {
            $heading = sanitize_text_field(wp_unslash($raw['heading'] ?? ''));
            $items_raw = wp_unslash($raw['items'] ?? '');
            $items = array();
            foreach (preg_split('/\r\n|\r|\n/', $items_raw) as $line) {
                $line = wp_kses(trim($line), array('strong' => array()));
                if ($line !== '') $items[] = $line;
            }
            if ($heading !== '' || !empty($items)) {
                $sections[] = array('heading' => $heading, 'items' => $items);
            }
        }
        update_post_meta($post_id, '_pj_career_sections', $sections);
    } else {
        update_post_meta($post_id, '_pj_career_sections', array());
    }
}
add_action('save_post_pj_career', 'pjlaw_career_save_meta');
