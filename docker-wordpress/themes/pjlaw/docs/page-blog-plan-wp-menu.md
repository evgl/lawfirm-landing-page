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

- [x] In `functions.php`, inside `pjlaw_register_post_types()`, register `pj_blog_post` CPT.
- [x] Configure labels (Korean + English): `name`, `singular_name`, `add_new`, `edit_item`, `view_item`, `search_items`, `not_found`, `menu_name = 블로그`.
- [x] Set `public => true`, `show_in_rest => true` (enables Gutenberg), `has_archive => false`.
- [x] Set `menu_icon => 'dashicons-edit-page'`.
- [x] Set `menu_position => 6` (just below `legal_case`).
- [x] Enable `supports => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes']`.
- [x] Set `rewrite => ['slug' => 'blog/post', 'with_front' => false]`.
- [x] Add `flush_rewrite_rules()` hook on theme activation/deactivation.
- [ ] Smoke test: confirm menu appears, can create/edit/delete posts in admin.

#### Review
- **File changed:** `functions.php` — added `pj_blog_post` CPT block inside `pjlaw_register_post_types()` (lines 136–155) and two `register_activation_hook`/`register_deactivation_hook` calls after the `init` action.
- **Impact:** Minimal — 20 lines added inside an existing function, 2 hook lines appended.
- **Note:** Smoke test (admin UI) requires a running WordPress instance.

---

### ✅ Checkpoint 2 — Register the Custom Taxonomies

Goal: Editors can categorize each post by **Category** (tab), **Service area** (icon grid), and **Tag** (chip).

- [x] Register `pj_blog_category` (hierarchical = true, like categories).
    - [x] Seed default terms: `법률정보`, `대응전략`.
    - [x] Attach to `pj_blog_post` CPT.
    - [x] `show_in_rest => true`, `show_admin_column => true`.
- [x] Register `pj_blog_service` (hierarchical = true).
    - [x] Seed default terms: `이혼`, `상속`, `부동산`, `기업`, `마약`, `교통사고`, `형사`.
    - [x] Register `_pj_service_icon` term meta (URL string) via `register_term_meta`.
    - [ ] Icon picker in admin form fields (deferred — can add later via term meta UI).
    - [x] `show_admin_column => true`.
- [x] Register `pj_blog_tag` (hierarchical = false, like tags).
    - [x] `show_admin_column => true`.
- [ ] Smoke test each taxonomy in the admin (Add term, Edit term, Assign to a post).

> **Alternative decision confirmed**: using dedicated `pj_blog_*` taxonomies to keep data isolated from built-in WP post types.

#### Review
- **File changed:** `functions.php` — added `pjlaw_register_blog_taxonomies()` (3 taxonomies + term meta) and `pjlaw_seed_blog_terms()` at the end of the file (~65 lines).
- **Impact:** Minimal — 2 new functions appended, no existing code touched.
- **Simplification:** Icon admin form fields (add/edit hooks) deferred as they're not needed for front-end functionality; the `_pj_service_icon` meta is registered and editable once per term.

---

### ✅ Checkpoint 3 — Custom Meta Fields (Sidebar Boxes)

Goal: Capture the editorial fields that don't fit the WP core schema.

- [x] Create `inc/blog-meta-boxes.php` and require it from `functions.php`.
- [x] Add meta box **"히어로 섹션"** with hero image URL + hero title override.
- [x] Add meta box **"인트로 섹션"** with intro subtitle (text) + intro text (textarea).
- [x] Add meta box **"FAQ"** with repeater UI (JS add/remove rows, no plugin), persisted as `_pj_blog_faq` array.
- [x] Add meta box **"관련 콘텐츠"** with three text fields for comma-separated post IDs (strategies, cases, articles).
- [x] Save handler: nonce verify, `current_user_can` check, field sanitization, `update_post_meta`.
- [ ] Smoke test: create a post, fill every field, save, reload, confirm persistence.

#### Review
- **Files changed:** New `inc/blog-meta-boxes.php` (~120 lines) + 1 `require_once` line in `functions.php`.
- **Impact:** Minimal — entirely isolated in its own file; no existing code modified except the one require line.
- **Simplification:** Related content uses simple comma-separated post ID text fields instead of a complex post-picker UI. The front-end auto-derives related posts when fields are empty.

---

### ✅ Checkpoint 4 — Admin List UX Enhancements

Goal: Editors can scan, sort and filter posts in `Admin → 블로그 → All` without clicking into each one.

- [x] Custom columns: thumbnail (60px), title, category, service, tags, date.
- [x] Taxonomy dropdown filters above the list (`restrict_manage_posts` hook) for all 3 taxonomies.
- [ ] Make `Title` and `Date` sortable (WP auto-sorts by date; Title sort deferred).
- [ ] Quick Edit taxonomy support (deferred — WP provides basic Quick Edit by default).
- [ ] Drag-and-drop `menu_order` interface (future improvement).

#### Review
- **File changed:** `functions.php` — 3 functions appended at end (~45 lines): `pjlaw_blog_columns`, `pjlaw_blog_column_content`, `pjlaw_blog_tax_filters`.
- **Impact:** Minimal — no existing code touched, all hooks scoped to `pj_blog_post` screen only.

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

- [x] **Cards grid** — `$cards` array replaced with `WP_Query` on `pj_blog_post`, 9 per page, ordered by `menu_order` then `date`. Loop uses `the_permalink()`, `get_the_post_thumbnail_url()`, `get_the_excerpt()`, `get_the_terms()`. `wp_reset_postdata()` called after loop.
- [x] **Tabs** — Dynamic `get_terms('pj_blog_category')` loop; "전체" tab active when no `$_GET['cat']`; links use `add_query_arg`.
- [x] **Services grid** — Dynamic `get_terms('pj_blog_service')` loop; icon from `_pj_service_icon` term meta with "전체" fallback; active state from `$_GET['service']`.
- [x] **Popular tag chips** — `get_terms('pj_blog_tag', orderby=>count, number=>5)` rendered as clickable `<a>` links with `?tag=<slug>`.
- [x] **Results count** — `$blog_query->found_posts` (integer).
- [x] **Pagination** — `paginate_links()` with `$blog_query->max_num_pages`.
- [x] `add_query_arg('title', ...)` link pattern removed; `the_permalink()` used instead.
- [ ] **Hero background image** — still file-based (deferred to Checkpoint 9 Customizer).
- [ ] **Filtering via URL** — server-side URL params (`?cat`, `?service`, `?tag`, `?s`) wired into `tax_query`; active states derived from `$_GET` values (implemented as part of this checkpoint).

#### Review
- **File changed:** `page-blog.php` — 7 surgical replacements; structure/HTML/CSS classes untouched.
- **Impact:** Minimal per change — each replacement is self-contained and scoped to one section.
- **Note:** Services grid items without a `_pj_service_icon` term meta will render with an empty icon div until icons are uploaded via the admin.

---

### ✅ Checkpoint 7 — Refactor the Detail Page

Goal: `page-blog-post.php` becomes `single-pj_blog_post.php` and reads from the post object.

- [x] Created `single-pj_blog_post.php` (new clean dynamic template, not a copy of the hardcoded one).
- [x] Hero: featured image (or `_pj_blog_hero_image` override) + post title (or `_pj_blog_hero_title` override).
- [x] Intro: renders `_pj_blog_intro_subtitle` + `_pj_blog_intro_text` when present.
- [x] Body: `the_content()` for Gutenberg-authored content.
- [x] FAQ: loop over `_pj_blog_faq` array when present.
- [x] Prev/Next: `get_previous_post()` / `get_next_post()`.
- [x] Sidebar: 3 cards (strategies, cases, articles) — manual override meta or auto-derived by taxonomy match.
- [x] `functions.php` routing updated: `blog/post/*` → `single-pj_blog_post.php` first; other `blog/*` still routes to legacy `page-blog-post.php`.
- [ ] `page-blog-post.php` kept as-is (legacy template for static preview; can be removed later).
- [ ] 301 redirect for old `?title=` URLs (deferred — no existing indexed URLs to protect yet).

#### Review
- **Files changed:** New `single-pj_blog_post.php` (~170 lines) + routing update in `functions.php` (5 lines replaced).
- **Impact:** Minimal — new file is independent; legacy `page-blog-post.php` untouched; routing change is additive.
- **Simplification:** Template was written clean from scratch rather than adapting the 583-line hardcoded file, resulting in a much shorter, maintainable template. The ToC and chapter-numbered content structure (from the old template) will live inside `the_content()` as Gutenberg blocks when editors author real posts.

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
