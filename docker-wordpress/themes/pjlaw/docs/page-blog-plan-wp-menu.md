# Plan: Convert `page-blog.php` to a Dynamic, Admin-Managed Blog

## Context

The current `themes/pjlaw/page-blog.php` template renders a blog listing with **all data hardcoded** inside a `$cards` PHP array, plus hardcoded tabs, service-grid items, popular-tag chips, results count and pagination. The detail page (`page-blog-post.php`) is also static and is linked via a `?title=` query argument hack (no real permalink).

We want to move every piece of editorial data into the WordPress admin so that a non-developer can **add, edit, remove, and re-order** blog posts and their taxonomies through a dedicated admin menu — and the front-end template will read from the database dynamically.

---

## 1. Analysis of the Current Hardcoded Structure

### 1.1 Per-card data (from `$cards` array in `page-blog.php`)

Each card in the grid currently has the following fields:

| Field     | Type             | Current example                                              | Notes                                       |
| --------- | ---------------- | ------------------------------------------------------------ | ------------------------------------------- |
| `image`   | string           | `card-01.jpg`                                                | File in `/assets/images/blog/`              |
| `tags`    | array of strings | `['마약', '향정신성의약품(향정)']`                           | 1–N chips above title                       |
| `title`   | string           | `졸피뎀 처벌 수위 및 사례, 대응 방법`                        | Card heading                                |
| `excerpt` | string           | `혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나...`           | Multi-line, uses `\n` rendered via `nl2br`  |

The card links to `/blog/post/?title=<urlencoded title>` — i.e. the title is used as the identifier. This needs to become a real permalink.

### 1.2 Page-level hardcoded data (also in `page-blog.php`)

| Section                  | Hardcoded content                                                                 |
| ------------------------ | --------------------------------------------------------------------------------- |
| Hero title & background  | Korean H1 + `/assets/images/blog/hero.png`                                        |
| Popular tag chips        | `#사이버범죄 #따돌림 #분리조치 #학폭위 #생기부`                                   |
| Tabs (top filter)        | `전체` · `법률정보` · `대응전략`                                                  |
| Services grid (4–8 icons)| `이혼`, `상속`, `부동산`, `기업` (and `마약`, `교통사고`, `형사` in the card data) |
| Results count            | `총 134건의 검색 결과가 있습니다`                                                 |
| Pagination               | Hardcoded 1–5 with non-functional `#` links                                       |

### 1.3 Detail-page data (`page-blog-post.php`) that must also become dynamic

| Field                | Notes                                                            |
| -------------------- | ---------------------------------------------------------------- |
| Hero image           | Currently `post-hero.png`                                        |
| Hero title (H1)      | `몰카 카메라등이용촬영죄 ...`                                    |
| Intro subtitle (H2)  | Repeats title in larger form                                     |
| Intro paragraph      | Long lead-in text                                                |
| Main body content    | Long rich-text body (currently entirely hardcoded HTML)          |
| FAQ items (×3)       | Q-prefixed short questions                                       |
| Related response strategies, related cases, related articles | Sidebar cards            |
| Prev / Next links    | Currently `#` placeholders                                       |

### 1.4 Final WordPress data model

Map each piece of data to either a **WP core field**, a **taxonomy**, or a **custom meta field**:

| Source field                | Maps to                                                              |
| --------------------------- | -------------------------------------------------------------------- |
| `title`                     | Post title (WP core)                                                 |
| `excerpt`                   | Post excerpt (WP core, with line-break preservation)                 |
| `image` (card image)        | Featured image (WP core, `_thumbnail_id`)                            |
| Hero image (detail page)    | Custom meta `_pj_blog_hero_image` (or reuse featured image)          |
| Body content                | Post content (WP core, the_content) — rich Gutenberg editor          |
| Intro subtitle              | Custom meta `_pj_blog_intro_subtitle`                                |
| Intro paragraph             | Custom meta `_pj_blog_intro_text` (textarea)                         |
| Tags (chip-list on card)    | Custom taxonomy `pj_blog_tag` (or reuse built-in `post_tag`)         |
| Top-level tab category      | Custom taxonomy `pj_blog_category` (`법률정보` · `대응전략` · …)     |
| Service-grid filter         | Custom taxonomy `pj_blog_service` (`이혼`, `상속`, `부동산`, …)      |
| FAQ items                   | Repeater meta `_pj_blog_faq` (array of `{question}`)                 |
| Related strategies/cases    | Either: auto-derived via taxonomy match, OR repeater post-relations  |
| Publish/sort order          | `post_date` and `menu_order` (WP core)                               |
| Slug / permalink            | Post slug (WP core)                                                  |

---

## 2. High-Level Checkpoints

> Each checkpoint below is a self-contained PR-sized chunk. Tasks inside are small enough to be assigned individually.

---

### ✅ Checkpoint 1 — Register the Custom Post Type

Goal: A new `블로그` menu appears in the WP admin sidebar with the standard `All Posts / Add New` items.

- [ ] In `functions.php`, inside `pjlaw_register_post_types()`, register `pj_blog_post` CPT.
- [ ] Configure labels (Korean + English): `name`, `singular_name`, `add_new`, `edit_item`, `view_item`, `search_items`, `not_found`, `menu_name = 블로그`.
- [ ] Set `public => true`, `show_in_rest => true` (enables Gutenberg), `has_archive => false`.
- [ ] Set `menu_icon => 'dashicons-edit-page'` (or `dashicons-welcome-write-blog`).
- [ ] Set `menu_position` to put it just below `legal_case`.
- [ ] Enable `supports => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes']`.
- [ ] Set `rewrite => ['slug' => 'blog/post', 'with_front' => false]` so URLs match the existing `/blog/post/...` pattern.
- [ ] Add `flush_rewrite_rules()` hook on theme activation/deactivation.
- [ ] Smoke test: confirm menu appears, can create/edit/delete posts in admin.

---

### ✅ Checkpoint 2 — Register the Custom Taxonomies

Goal: Editors can categorize each post by **Category** (tab), **Service area** (icon grid), and **Tag** (chip).

- [ ] Register `pj_blog_category` (hierarchical = true, like categories).
    - Seed default terms: `법률정보`, `대응전략`.
    - Attach to `pj_blog_post` CPT.
    - `show_in_rest => true`, `show_admin_column => true`.
- [ ] Register `pj_blog_service` (hierarchical = true).
    - Seed default terms: `이혼`, `상속`, `부동산`, `기업`, `마약`, `교통사고`, `형사`.
    - Add a custom term meta for the **icon SVG path** so each service term carries its own icon (matches the icons currently in `/assets/icons/services/`).
    - Use `add_action('pj_blog_service_add_form_fields')` and `..._edit_form_fields` to render an icon picker (URL or media uploader).
    - `show_admin_column => true`.
- [ ] Register `pj_blog_tag` (hierarchical = false, like tags).
    - No seed needed; editors add free-form.
    - `show_admin_column => true`.
- [ ] Smoke test each taxonomy in the admin (Add term, Edit term, Assign to a post).

> **Alternative decision to confirm**: instead of `pj_blog_tag` we could reuse WP's built-in `post_tag` by attaching it to the CPT. The plan assumes a dedicated taxonomy to keep the data fully isolated from any regular WordPress posts that may exist elsewhere on the site.

---

### ✅ Checkpoint 3 — Custom Meta Fields (Sidebar Boxes)

Goal: Capture the editorial fields that don't fit the WP core schema.

- [ ] Create a `inc/blog-meta-boxes.php` file and require it from `functions.php`.
- [ ] Add meta box **"Hero (detail page)"** with:
    - `Hero image override` (media uploader, optional — defaults to featured image)
    - `Hero title override` (text input, optional — defaults to post title)
- [ ] Add meta box **"Intro section"** with:
    - `Intro subtitle` (text input)
    - `Intro text` (textarea)
- [ ] Add meta box **"FAQ items"** with:
    - Repeater UI for 0–N items, each with a `Question` text field
    - Use simple JS (no plugin dependency) to add/remove rows; persist as a serialized array under `_pj_blog_faq`
- [ ] Add meta box **"Related content (manual override)"** with:
    - Post-picker for `Related response strategies` (multi-select of `legal_case` or `pj_blog_post`)
    - Post-picker for `Related cases` (multi-select of `legal_case`)
    - Post-picker for `Related articles` (multi-select of `pj_blog_post`)
    - If left empty, the front-end will auto-derive related items by matching taxonomies.
- [ ] Implement the save handler:
    - Verify nonce
    - Verify user `current_user_can('edit_post', $post_id)`
    - Sanitize each field (`sanitize_text_field`, `sanitize_textarea_field`, `absint`, `array_map`)
    - Store under prefixed meta keys (`_pj_blog_*`)
- [ ] Smoke test: create a post, fill every field, save, reload, confirm persistence.

---

### ✅ Checkpoint 4 — Admin List UX Enhancements

Goal: Editors can scan, sort and filter posts in `Admin → 블로그 → All` without clicking into each one.

- [ ] Add custom columns to the list table:
    - `Thumbnail` (featured image, 60px)
    - `Title`
    - `Category` (taxonomy column auto-rendered)
    - `Service` (taxonomy column auto-rendered)
    - `Tags` (taxonomy column auto-rendered)
    - `Date`
- [ ] Make `Title` and `Date` sortable.
- [ ] Add a taxonomy dropdown filter above the list (`restrict_manage_posts` hook) for each of the 3 taxonomies.
- [ ] Enable Quick Edit support for taxonomy assignment.
- [ ] Add a `?orderby=menu_order` interface (drag-and-drop optional, future improvement).

---

### ✅ Checkpoint 5 — Data Migration (Seeding)

Goal: The 3 currently hardcoded sample cards become real DB posts so the page looks identical after the switchover.

- [ ] Upload `card-01.jpg`, `card-02.jpg`, `card-03.jpg` and `hero.png` from `/assets/images/blog/` into the WordPress Media Library.
- [ ] Create 3 `pj_blog_post` entries matching the existing `$cards` array (title, excerpt, featured image, tags, service term).
- [ ] Migrate the long body content currently hardcoded in `page-blog-post.php` into the matching post's content area.
- [ ] Optional: write a one-shot WP-CLI command `wp pj-blog seed` under `inc/cli/` so the seeding is repeatable in staging/CI.
- [ ] Verify on the front-end (after Checkpoint 6) that the rendered page is visually identical to the old hardcoded version.

---

### ✅ Checkpoint 6 — Refactor `page-blog.php` to Use `WP_Query`

Goal: Replace every hardcoded value in the listing template with a dynamic query.

- [ ] **Cards grid** — Replace the hardcoded `$cards` array with:
    ```php
    $query_args = [
        'post_type'      => 'pj_blog_post',
        'posts_per_page' => 9,
        'paged'          => max(1, (int) get_query_var('paged')),
        'post_status'    => 'publish',
        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
    ];
    // Apply ?cat / ?service / ?s filters from $_GET, sanitized via tax_query/s.
    $blog_query = new WP_Query($query_args);
    ```
    Then `while ($blog_query->have_posts())` loop and pull `get_the_post_thumbnail_url()`, `get_the_title()`, `get_the_excerpt()`, `get_the_terms($post, 'pj_blog_tag')`, `get_permalink()`.
- [ ] **Tabs** — Replace the 3 hardcoded `<div class="blog-tab">` with a loop over `get_terms('pj_blog_category')`. Active state derived from `$_GET['cat']`.
- [ ] **Services grid** — Replace the 4 hardcoded `<a class="services-grid__item">` with a loop over `get_terms('pj_blog_service')`. Pull each term's icon URL from term meta. Active state derived from `$_GET['service']`.
- [ ] **Popular tag chips** in the search section — pull top N most-used `pj_blog_tag` terms via `get_terms('pj_blog_tag', ['orderby'=>'count', 'order'=>'DESC', 'number'=>5])`.
- [ ] **Results count** — Replace `134` with `$blog_query->found_posts`.
- [ ] **Pagination** — Replace the hardcoded 1–5 with `paginate_links()`, then map the output into the existing markup (`.blog-pagination__number`, `.blog-pagination__arrow--prev/next/prev-double/next-double`).
- [ ] **Hero background image** — pull from a theme option (see Checkpoint 9) or keep file-based, but stop hardcoding.
- [ ] Remove the `add_query_arg('title', ...)` link pattern; use `get_permalink()` instead.
- [ ] Run `wp_reset_postdata()` after the loop.

---

### ✅ Checkpoint 7 — Refactor the Detail Page

Goal: `page-blog-post.php` becomes `single-pj_blog_post.php` and reads from the post object.

- [ ] Copy `page-blog-post.php` → `single-pj_blog_post.php`.
- [ ] Replace `$_GET['title']` lookup with `the_title()`, `the_content()`, `the_post_thumbnail()`, etc.
- [ ] Render FAQ items by looping over `get_post_meta($post->ID, '_pj_blog_faq', true)`.
- [ ] Render intro subtitle / intro text from `_pj_blog_intro_subtitle` / `_pj_blog_intro_text`.
- [ ] Wire up **Prev / Next** with `get_previous_post()` / `get_next_post()` (scoped to same `pj_blog_category` for relevance).
- [ ] Wire up sidebar **Related strategies / cases / articles**:
    - If manual override meta exists, render those.
    - Else auto-derive: `WP_Query` of same `pj_blog_category` or `pj_blog_service`, exclude current post, `posts_per_page => 3`.
- [ ] Remove the old `page-blog-post.php` (or keep it as a thin redirect to the new canonical URL for any externally cached links).
- [ ] Add a 301 redirect in `functions.php` for old `/blog/post/?title=...` URLs to the new permalink for the matching post.

---

### ✅ Checkpoint 8 — Filtering, Search, and URL State

Goal: The tabs, service grid, search bar, and tag chips all change the listing.

- [ ] **Phase 8a — Server-rendered (default, no JS dependency)**:
    - Tab clicks set `?cat=<slug>`, refreshing the page.
    - Service icon clicks set `?service=<slug>`.
    - Tag chip clicks set `?tag=<slug>`.
    - Search box submits `?s=<query>`; `WP_Query` honors `s` natively.
    - All filters compose (cat + service + s + tag) using `tax_query['relation' => 'AND']`.
- [ ] **Phase 8b — AJAX upgrade (optional, post-MVP)**:
    - Register `wp_ajax_pj_blog_filter` (and `nopriv_`).
    - Return only the inner `.blog-grid` HTML.
    - Update the URL via `history.pushState` so deep-links still work.
- [ ] Make sure active states (`.blog-tab--active`, `.services-grid__item.active`) are derived from current `$_GET` values, not hardcoded.

---

### ✅ Checkpoint 9 — Optional Page Settings (Customizer or Options Page)

Goal: Move the remaining "global" hardcoded strings (hero background, hero title, hero subtitle text) into the admin.

- [ ] Add an `Appearance → Customize → Blog Page` section with:
    - Hero background image (image control)
    - Hero eyebrow text
    - Hero H1 (with line-break support)
    - Search placeholder text
- [ ] Read these values in `page-blog.php` via `get_theme_mod()`.
- [ ] Provide sensible defaults that match the current hardcoded values.

---

### ✅ Checkpoint 10 — Permalinks, SEO, Performance

- [ ] Verify `/blog/post/<slug>/` permalinks work after a `Settings → Permalinks → Save` flush.
- [ ] Register custom `add_image_size('pj-blog-card', 386, 218, true)` matching the card aspect ratio, use it in the listing.
- [ ] Add `loading="lazy"` to all card images.
- [ ] Add Open Graph / Twitter Card meta on `single-pj_blog_post.php`.
- [ ] Wrap the listing `WP_Query` in a 5-minute transient when no filters are active.
- [ ] Sanity check Lighthouse on `/blog/` before vs. after.

---

### ✅ Checkpoint 11 — Testing & QA

- [ ] **Admin CRUD**: create, edit, trash, restore, permanently delete a post. Verify each field persists.
- [ ] **Taxonomy CRUD**: add/edit/delete a category, service, and tag term. Verify front-end picks up changes immediately.
- [ ] **Listing**: with 0 posts → empty state; with 1 post; with > 9 posts → pagination.
- [ ] **Filters**: each tab, service, tag, and search query individually and in combination.
- [ ] **Detail page**: featured image, intro, body, FAQ, prev/next, all 3 sidebars.
- [ ] **Permalinks**: `/blog/post/<slug>/` resolves, old `?title=` URLs redirect 301.
- [ ] **Capabilities**: an Editor role can manage posts; a Subscriber cannot.
- [ ] **Locale**: all strings wrapped in `__('...', 'pjlaw')` render correctly in Korean.
- [ ] **Responsive**: card grid, tabs, and pagination look correct at 1024 / 768 / 480 px.
- [ ] **Browser matrix**: Chrome, Safari, Firefox, Edge, iOS Safari, Chrome Android.

---

### ✅ Checkpoint 12 — Documentation & Handoff

- [ ] Update `themes/pjlaw/README.md`:
    - Add `pj_blog_post` to the Custom Post Types section.
    - Add a short "Editing the Blog" guide for non-developers.
- [ ] Add inline PHPDoc to every new function in `functions.php` / `inc/`.
- [ ] Add a screenshot walkthrough (`docs/admin-blog-guide.md`) showing where to click for each field.
- [ ] Note the rewrite-rule flush requirement on first deploy.

---

## 3. Deliverables Summary

By the end of all checkpoints we will have:

1. A `블로그` menu in WP admin with full CRUD.
2. Three taxonomies: `pj_blog_category` (tabs), `pj_blog_service` (icon grid, with per-term icon), `pj_blog_tag` (chips).
3. A `single-pj_blog_post.php` template replacing the static `page-blog-post.php`.
4. A fully dynamic `page-blog.php` that lists, filters, paginates, and searches DB content.
5. A migration that preserves the current visual state.
6. Optional Customizer controls for the page-level chrome (hero, search placeholder).
7. Docs and tests so the marketing team can run the blog without developer involvement.

---

## 4. Open Questions to Confirm Before Coding

1. Should `pj_blog_post` slug be `/blog/post/<slug>/` (matches existing URL pattern) or `/blog/<slug>/` (cleaner)?
2. Should we reuse the built-in `post_tag` / `category` taxonomies, or keep this fully isolated under `pj_blog_*`? *Plan currently assumes isolated.*
3. Should "Related response strategies" pull from existing `legal_case` CPT, or do we need a separate `response_strategy` CPT? *Plan assumes `legal_case` for cases, and same `pj_blog_post` for strategies/articles unless told otherwise.*
4. Are the FAQ items always exactly 3 (as currently hardcoded), or variable? *Plan assumes variable, via repeater.*
5. Do we need a draft/preview workflow for editors, or publish-immediately?
