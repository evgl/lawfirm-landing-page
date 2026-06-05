<?php
if (!defined('ABSPATH')) exit;

/**
 * Admin meta boxes for the pj_team (구성원) post type.
 * Mirrors inc/career-meta-boxes.php. The 업무분야 box reuses the careers
 * "상세 섹션" repeater pattern (heading + newline list).
 */
function pjlaw_team_add_meta_boxes() {
    add_meta_box('pj_team_info', '구성원 정보', 'pjlaw_team_info_cb', 'pj_team', 'normal', 'high');
    add_meta_box('pj_team_fields', '업무분야', 'pjlaw_team_fields_cb', 'pj_team', 'normal', 'default');
    add_meta_box('pj_team_detail', '구성원 상세 (대표경력 · 학력 · 경력 · 주요실적)', 'pjlaw_team_detail_cb', 'pj_team', 'normal', 'default');
    add_meta_box('pj_team_cases', '업무사례 선택', 'pjlaw_team_cases_cb', 'pj_team', 'side', 'default');
}
add_action('add_meta_boxes', 'pjlaw_team_add_meta_boxes');

/** Helper: render a textarea whose value is a stored array (one item per line). */
function pjlaw_team_list_textarea($post_id, $meta_key, $name, $rows = 4, $placeholder = '') {
    $value = get_post_meta($post_id, $meta_key, true);
    $text  = is_array($value) ? implode("\n", $value) : '';
    printf(
        '<textarea name="%1$s" rows="%2$d" placeholder="%3$s" style="width:100%%">%4$s</textarea>',
        esc_attr($name),
        (int) $rows,
        esc_attr($placeholder),
        esc_textarea($text)
    );
}

function pjlaw_team_info_cb($post) {
    wp_nonce_field('pjlaw_team_meta', 'pjlaw_team_nonce');
    $role    = get_post_meta($post->ID, '_pj_team_role', true);
    $tagline = get_post_meta($post->ID, '_pj_team_tagline', true);
    ?>
    <p>
        <label><?php esc_html_e('직위 (예: 변호사)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_team_role" value="<?php echo esc_attr($role); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('상세 페이지 타이틀 (줄바꿈 가능)', 'pjlaw'); ?></label><br>
        <textarea name="pj_team_tagline" rows="2" style="width:100%" placeholder="<?php esc_attr_e('진심으로 소통하고, 끝까지 함께하는 법률 서비스', 'pjlaw'); ?>"><?php echo esc_textarea($tagline); ?></textarea>
    </p>
    <p>
        <label><?php esc_html_e('전문분야 (카드 오버레이, 한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_specialties', 'pj_team_specialties', 3, __('형사법 전문', 'pjlaw')); ?>
    </p>
    <p>
        <label><?php esc_html_e('태그 (카드 하단, 한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_tags', 'pj_team_tags', 3, __('금융범죄', 'pjlaw')); ?>
    </p>
    <?php
}

function pjlaw_team_fields_cb($post) {
    $fields = get_post_meta($post->ID, '_pj_team_fields', true);
    if (!is_array($fields)) $fields = array();
    ?>
    <p class="description"><?php esc_html_e('각 분야는 분야명과 태그 목록으로 구성됩니다. 태그는 한 줄에 하나씩 입력하세요.', 'pjlaw'); ?></p>
    <div id="pj-team-fields">
    <?php foreach ($fields as $i => $field) :
        $tags_text = isset($field['tags']) && is_array($field['tags']) ? implode("\n", $field['tags']) : '';
    ?>
        <div class="pj-team-field-row" style="margin-bottom:12px;padding:12px;border:1px solid #ddd;background:#fafafa">
            <input type="text" name="pj_team_fields[<?php echo $i; ?>][name]" value="<?php echo esc_attr($field['name'] ?? ''); ?>" placeholder="<?php esc_attr_e('분야명 (예: 형사)', 'pjlaw'); ?>" style="width:100%;margin-bottom:6px">
            <textarea name="pj_team_fields[<?php echo $i; ?>][tags]" rows="3" placeholder="<?php esc_attr_e('태그를 한 줄에 하나씩 입력', 'pjlaw'); ?>" style="width:100%"><?php echo esc_textarea($tags_text); ?></textarea>
            <button type="button" class="button pj-team-field-remove" style="margin-top:6px"><?php esc_html_e('분야 삭제', 'pjlaw'); ?></button>
        </div>
    <?php endforeach; ?>
    </div>
    <button type="button" class="button button-primary" id="pj-team-field-add"><?php esc_html_e('+ 분야 추가', 'pjlaw'); ?></button>
    <script>
    (function(){
        var list = document.getElementById('pj-team-fields');
        var idx = <?php echo count($fields); ?>;
        document.getElementById('pj-team-field-add').addEventListener('click', function(){
            var row = document.createElement('div');
            row.className = 'pj-team-field-row';
            row.style.cssText = 'margin-bottom:12px;padding:12px;border:1px solid #ddd;background:#fafafa';

            var name = document.createElement('input');
            name.type = 'text';
            name.name = 'pj_team_fields[' + idx + '][name]';
            name.placeholder = '<?php echo esc_js(__('분야명 (예: 형사)', 'pjlaw')); ?>';
            name.style.cssText = 'width:100%;margin-bottom:6px';

            var tags = document.createElement('textarea');
            tags.name = 'pj_team_fields[' + idx + '][tags]';
            tags.rows = 3;
            tags.placeholder = '<?php echo esc_js(__('태그를 한 줄에 하나씩 입력', 'pjlaw')); ?>';
            tags.style.width = '100%';

            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'button pj-team-field-remove';
            btn.style.marginTop = '6px';
            btn.textContent = '<?php echo esc_js(__('분야 삭제', 'pjlaw')); ?>';

            row.appendChild(name);
            row.appendChild(tags);
            row.appendChild(btn);
            list.appendChild(row);
            idx++;
        });
        list.addEventListener('click', function(e){
            if (e.target.classList.contains('pj-team-field-remove')) {
                e.target.closest('.pj-team-field-row').remove();
            }
        });
    })();
    </script>
    <?php
}

function pjlaw_team_detail_cb($post) {
    ?>
    <p>
        <label><?php esc_html_e('대표경력 (한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_career_summary', 'pj_team_career_summary', 4); ?>
    </p>
    <p>
        <label><?php esc_html_e('학력 (한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_edu', 'pj_team_edu', 4); ?>
    </p>
    <p>
        <label><?php esc_html_e('경력 (한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_experience', 'pj_team_experience', 5); ?>
    </p>
    <p>
        <label><?php esc_html_e('주요실적 (한 줄에 하나씩)', 'pjlaw'); ?></label><br>
        <?php pjlaw_team_list_textarea($post->ID, '_pj_team_achievements', 'pj_team_achievements', 5); ?>
    </p>
    <?php
}

function pjlaw_team_cases_cb($post) {
    $selected = get_post_meta($post->ID, '_pj_team_case_ids', true);
    if (!is_array($selected)) $selected = array();
    $cases = get_posts(array(
        'post_type'      => 'legal_case',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
    ));
    ?>
    <p class="description"><?php esc_html_e('이 구성원의 업무사례 탭에 표시할 사례를 선택하세요.', 'pjlaw'); ?></p>
    <?php if (empty($cases)) : ?>
        <p><?php esc_html_e('등록된 업무사례가 없습니다.', 'pjlaw'); ?></p>
    <?php else : ?>
        <div style="max-height:240px;overflow:auto;border:1px solid #ddd;padding:8px">
            <?php foreach ($cases as $case) : ?>
                <label style="display:block;margin-bottom:4px">
                    <input type="checkbox" name="pj_team_case_ids[]" value="<?php echo esc_attr($case->ID); ?>" <?php checked(in_array($case->ID, $selected)); ?>>
                    <?php echo esc_html(get_the_title($case)); ?>
                </label>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php
}

function pjlaw_team_save_meta($post_id) {
    if (!isset($_POST['pjlaw_team_nonce']) || !wp_verify_nonce($_POST['pjlaw_team_nonce'], 'pjlaw_team_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Single text field
    if (isset($_POST['pj_team_role'])) {
        update_post_meta($post_id, '_pj_team_role', sanitize_text_field(wp_unslash($_POST['pj_team_role'])));
    }

    // Tagline: keep line breaks
    if (isset($_POST['pj_team_tagline'])) {
        update_post_meta($post_id, '_pj_team_tagline', sanitize_textarea_field(wp_unslash($_POST['pj_team_tagline'])));
    }

    // Plain newline-list fields → arrays
    $list_fields = array(
        '_pj_team_specialties'    => 'pj_team_specialties',
        '_pj_team_tags'           => 'pj_team_tags',
        '_pj_team_career_summary' => 'pj_team_career_summary',
        '_pj_team_edu'            => 'pj_team_edu',
        '_pj_team_experience'     => 'pj_team_experience',
        '_pj_team_achievements'   => 'pj_team_achievements',
    );
    foreach ($list_fields as $meta_key => $post_key) {
        $items = array();
        if (isset($_POST[$post_key])) {
            foreach (preg_split('/\r\n|\r|\n/', wp_unslash($_POST[$post_key])) as $line) {
                $line = sanitize_text_field(trim($line));
                if ($line !== '') $items[] = $line;
            }
        }
        update_post_meta($post_id, $meta_key, $items);
    }

    // 업무분야 repeater → array of {name, tags[]}
    if (isset($_POST['pj_team_fields']) && is_array($_POST['pj_team_fields'])) {
        $fields = array();
        foreach ($_POST['pj_team_fields'] as $raw) {
            $name = sanitize_text_field(wp_unslash($raw['name'] ?? ''));
            $tags = array();
            foreach (preg_split('/\r\n|\r|\n/', wp_unslash($raw['tags'] ?? '')) as $line) {
                $line = sanitize_text_field(trim($line));
                if ($line !== '') $tags[] = $line;
            }
            if ($name !== '' || !empty($tags)) {
                $fields[] = array('name' => $name, 'tags' => $tags);
            }
        }
        update_post_meta($post_id, '_pj_team_fields', $fields);
    } else {
        update_post_meta($post_id, '_pj_team_fields', array());
    }

    // 업무사례 selected IDs
    $case_ids = array();
    if (isset($_POST['pj_team_case_ids']) && is_array($_POST['pj_team_case_ids'])) {
        $case_ids = array_map('absint', wp_unslash($_POST['pj_team_case_ids']));
        $case_ids = array_values(array_filter($case_ids));
    }
    update_post_meta($post_id, '_pj_team_case_ids', $case_ids);
}
add_action('save_post_pj_team', 'pjlaw_team_save_meta');
