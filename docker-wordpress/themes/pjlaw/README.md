# PyeongJeong Law Theme

## Overview

This is a professional WordPress theme designed for PyeongJeong Law Firm. It implements a modern, responsive landing page with sections for services, statistics, case studies, and consultation CTAs.

## Theme Details

- **Theme Name:** PyeongJeong Law
- **Version:** 1.0.0
- **Author:** Design Team
- **License:** GPL-2.0-or-later
- **Text Domain:** pjlaw

## File Structure

```
pjlaw/
├── assets/
│   ├── css/
│   │   └── main.css          # Extended styling for all sections
│   ├── images/               # Image assets
│   └── js/
│       └── main.js           # Theme JavaScript
├── template-parts/
│   ├── content.php           # Main content template
│   └── content-none.php      # No content template
├── front-page.php            # Homepage/landing page template
├── header.php                # Header template
├── footer.php                # Footer template
├── index.php                 # Main template
├── functions.php             # Theme functions
├── style.css                 # Theme stylesheet (with theme metadata)
└── README.md                 # This file
```

## Key Features

### 1. **Responsive Design**
- Mobile-first approach
- Breakpoints at 1024px and 768px for tablets
- Extra-small breakpoint at 480px for phones

### 2. **Landing Page Sections**

#### Hero Section
- Full-width background image
- Overlay with title and subtitle
- Sticky header with navigation

#### Logo Section
- Branded background color (#003d99)
- Logo and text display

#### Overview Section
- Call-to-action for services
- Light background styling

#### Business Areas (Services)
- Grid layout showcasing 4 practice areas
- Hover effects on cards
- Service descriptions

#### Statistics Section
- Three main statistics (staff, cases, consultations)
- Icon and data display
- Dark background

#### Legal Cases Section
- Showcase of successful cases
- Image, title, description, lawyer name
- Hover animations

#### CTA Section
- Two main calls-to-action
- Consultation request and directions

#### Footer
- Multi-column layout
- Navigation links by category
- Contact information
- Copyright notice

### 3. **Custom Post Types**
- `legal_case` - For showcasing successful cases

### 4. **JavaScript Features**
- Mobile menu toggle
- Smooth scroll for anchor links
- AJAX consultation form submission
- Intersection Observer for scroll animations

### 5. **Performance Optimizations**
- Efficient CSS loading
- Minimal JavaScript
- Image optimization-ready
- Security headers

## Installation

1. Upload the `pjlaw` folder to `/wp-content/themes/`
2. Log in to WordPress admin
3. Navigate to Appearance > Themes
4. Click "Activate" on the PyeongJeong Law theme

## Customization

### Colors
Edit the CSS variables and color values in:
- `assets/css/main.css`
- `style.css`

Main colors:
- Primary Blue: `#0066cc`
- Dark Blue: `#003d99`
- Dark Background: `#1a1a1a`
- Light Background: `#f9f9f9`

### Typography
Font family: `Noto Sans KR` (loaded from Google Fonts)

### Adding Custom Logo
1. Go to Appearance > Customize > Site Identity
2. Upload your logo
3. The theme will display it in the header

### Modifying Sections
- Edit `front-page.php` for homepage layout
- Edit `assets/css/main.css` for section styling
- Edit `functions.php` to customize post types and features

## Navigation Menus

The theme supports:
- **Primary Menu** - Main navigation in header
- **Footer Menu** - Footer navigation (optional)

Configure menus in Appearance > Menus

## Sidebar/Widget Areas

- **Header Contact** - Widget area in header
- **Footer Column 1** - First footer column (reserved)

Register additional widget areas in `functions.php`

## Template Hierarchy

WordPress will use templates in this order:

1. `front-page.php` - For homepage
2. `single-legal_case.php` (if created) - For single legal case post
3. `single.php` (if created) - For single posts
4. `archive.php` (if created) - For archive pages
5. `index.php` - Default fallback

## Security

The theme includes:
- Security headers (X-Content-Type-Options, X-Frame-Options, etc.)
- Proper escaping of output
- Nonce verification for forms
- Input sanitization

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Accessibility

- Semantic HTML
- ARIA labels where needed
- Focus states for keyboard navigation
- Color contrast compliance

## Dependencies

### Fonts
- Noto Sans KR (Google Fonts)

### Icons
- Font Awesome 6.0.0

### Scripts
- jQuery (WordPress built-in)

## Troubleshooting

### Images not displaying
- Ensure images are uploaded to `/assets/images/`
- Check file permissions
- Verify image paths in `front-page.php`

### Styles not applying
- Clear WordPress cache if using a caching plugin
- Ensure `assets/css/main.css` is being enqueued
- Check browser cache (Ctrl+Shift+R)

### JavaScript not working
- Verify jQuery is loaded
- Check browser console for errors
- Ensure nonce is correctly set

## Support

For issues or customization needs, contact the design team.

## Changelog

### Version 1.0.0
- Initial theme release
- Responsive landing page design
- Legal case custom post type
- Mobile menu toggle
- AJAX form submission ready
- Accessibility features
- Security headers

## License

This theme is licensed under the GPL-2.0-or-later license. See LICENSE file for details.
