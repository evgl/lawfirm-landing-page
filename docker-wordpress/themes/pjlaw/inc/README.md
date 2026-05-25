# `inc/` — Theme Module Files

This folder contains blog post infrastructure for the PyeongJeong Law WordPress theme. These files handle:
- Admin UI for editing blog post metadata
- Sample data seeding for blog posts
- Content population for blog articles

---

## Files

### `blog-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_blog_post` metadata.

**What it provides:**
- **Hero Section** — custom hero image URL and title override for blog posts
- **Intro Section** — subtitle and introductory text
- **FAQ** — dynamic list of frequently asked questions (add/remove via JavaScript)
- **Related Content** — comma-separated post IDs to link to related strategies, cases, and articles

**How it runs:** Automatically loaded by WordPress via `functions.php`.

**When to use:** No manual action required. This file activates automatically whenever someone opens the WordPress admin editor for a blog post. All metadata is saved with proper sanitization and nonce verification.

---

### `blog-seed.php`

**Purpose:** Creates 3 sample blog posts on initial theme activation.

**What it provides:**
- 3 pre-populated `pj_blog_post` entries with titles, excerpts, tags, and featured images
- Automatic setup so the blog page has content to display from day one
- Idempotent — runs only once via the `pjlaw_blog_seeded` WordPress option

**How it runs:** Automatically on first WordPress page load after theme activation (hooks into WordPress `init`).

**When to use:** No manual action required. The sample posts (IDs 13, 15, 17) are created automatically the first time you start the WordPress site.

To reset and re-run seeding (e.g. after a database reset):
```bash
docker compose exec wordpress wp --allow-root option delete pjlaw_blog_seeded
```
Then reload the WordPress site and the posts will be created again.

---

### `blog-content-seed-content.php`

**Purpose:** Populates the article content (body HTML) for the 3 sample blog posts created by `blog-seed.php`.

**What it provides:**
- Full HTML article text on Korean camera crime law (카메라등이용촬영죄)
- 4 chapters plus conclusion with legal references, checklists, and Q&A
- Theme asset URLs (images, icons) automatically resolved using `get_template_directory_uri()`

**How it runs:** **Manual WP-CLI command only** — this file is NOT auto-loaded.

**When to use:** Run this command once after `blog-seed.php` has created the posts:

```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

This populates the `post_content` field for posts 13, 15, and 17, allowing `single-pj_blog_post.php` to render the full article when visitors navigate to blog post detail pages.

---

## Execution Order

| Step | File | Type | When |
|------|------|------|------|
| 1 | `blog-seed.php` | Automatic | First site load after theme activation |
| 2 | `blog-meta-boxes.php` | Automatic | Always available when editing posts in WordPress admin |
| 3 | `blog-content-seed-content.php` | Manual | After step 1, run the WP-CLI command |

**Note:** Step 3 depends on step 1 having completed. Steps 1 and 2 require no developer action.

---

## Common Tasks

**To edit blog post metadata (hero image, intro text, FAQ, related posts):**
- Go to WordPress admin → Blog → Edit a post
- Scroll down to see the meta boxes populated by `blog-meta-boxes.php`

**To reset sample posts:**
```bash
# Delete the seeded flag to force re-creation on next page load
docker compose exec wordpress wp --allow-root option delete pjlaw_blog_seeded
```

**To repopulate article content:**
```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

**To check if sample posts exist:**
```bash
docker compose exec wordpress wp --allow-root post list --post_type=pj_blog_post
```
