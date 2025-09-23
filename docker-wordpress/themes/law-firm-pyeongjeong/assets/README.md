# Assets Directory Structure

This directory contains all theme assets organized by type.

## Directory Structure

```
assets/
├── icons/          # SVG icons and small graphics
├── images/         # Photos, backgrounds, and larger images
└── README.md       # This file
```

## Usage Guidelines

### Icons (`assets/icons/`)
- Store SVG icons, logos, and small graphics
- Use descriptive names (e.g., `kakao-icon.svg`, `phone-icon.svg`)
- Optimize SVGs for web use
- Include proper fill colors in SVG style tags

### Images (`assets/images/`)
- Store photographs, backgrounds, and larger graphics
- Use web-optimized formats (WebP, PNG, JPEG)
- Include responsive versions when needed
- Use descriptive names with dimensions if relevant

## Referencing Assets in PHP

```php
<!-- Icons -->
<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-name.svg" alt="Description" />

<!-- Images -->
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-name.jpg" alt="Description" />
```

## Referencing Assets in CSS

```css
/* Icons */
background-image: url('assets/icons/icon-name.svg');

/* Images */
background-image: url('assets/images/image-name.jpg');
```
