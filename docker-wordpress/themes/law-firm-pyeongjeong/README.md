# Law Firm Pyeongjeong WordPress Theme

## 🏛️ Theme Overview

**Law Firm Pyeongjeong** is a professional WordPress theme specially created for Korean law firms. Built based on 9 design mockups provided, it enables you to create modern and professional legal services websites.

### 📋 Key Features

- **Fully Responsive Design** - Optimized user experience across all devices
- **Full Korean Language Support** - UI/UX specialized for Korean law firms
- **Professional Design** - Navy color scheme that conveys trust and legal professionalism
- **SEO Optimized** - Structured data and meta tags for search engine optimization
- **Accessibility Compliant** - WCAG 2.1 AA standards compliance
- **Performance Optimized** - Fast loading speeds and efficient code structure

## 🎨 Design Foundation

Implemented based on the following 9 page designs:

1. **Homepage** - Hero section, search, consultation booking
2. **Online Consultation** - Multi-step consultation request form
3. **Success Stories** - Case results table with attorney information
4. **Practice Areas** - Legal service categories
5. **Legal Information** - News and legal guides
6. **Firm Information** - Introduction and practice areas
7. **Awards & Credentials** - Certificates and achievement showcase
8. **Contact** - Office information and contact methods
9. **Location** - Map and directions

## 🚀 Quick Installation

### 1. Theme Upload

```bash
# Upload via FTP or File Manager
wp-content/themes/law-firm-pyeongjeong/
```

### 2. Activate in WordPress Admin

1. WordPress Admin → Appearance → Themes
2. Find "Law Firm Pyeongjeong" theme
3. Click **Activate**

### 3. Basic Setup

#### Menu Configuration
```
WordPress Admin → Appearance → Menus

Primary Menu:
- About (Homepage)
- Practice Areas (Practice Areas Archive)
- Attorneys (Attorneys Archive) 
- Success Cases (Legal Cases Archive)
- Consultation (Consultation Page)

Footer Menu:
- Privacy Policy
- Terms of Service
- Sitemap
```

#### Widget Configuration
```
WordPress Admin → Appearance → Widgets

Header Contact: Top contact information
Footer Column 1-4: Footer information sections
```

## 📄 Page Templates

### Homepage (index.php)
- Hero section with search
- Main practice areas section
- Success stories table
- Attorney introductions
- Online consultation form

### Consultation Page (page-consultation.php)
```
Template selection when creating page: "Consultation Page"

Included features:
- Consultation process (4 steps)
- Detailed consultation request form
- Contact method guidance
- Frequently Asked Questions (FAQ)
```

### Contact Page (page-contact.php)
```
Template selection when creating page: "Contact Page"

Included features:
- Office information
- Map (Naver Maps integration)
- Detailed directions
- Business hours and quick inquiry form
```

## 🎛️ Customizer Settings

WordPress Admin → Appearance → Customize

### Law Firm Settings
```php
Law Firm Phone Number: 02-554-6674
Office Address: Seoul Gangnam-gu Nonhyeon-ro 63-gil 7, Geumseong Building 6F
Business Hours: Weekday Hours | 10:00 - 19:00
               24/7 Consultation Available
```

### Logo Upload
- Site Identity → Logo → Upload Image
- Recommended size: 300x80px (PNG format)

## 📝 Custom Post Types

Content types automatically created when theme is activated:

### 1. Attorneys
```
WordPress Admin → Attorneys → Add New

Fields:
- Position/Title
- Phone Number  
- Email
- Education
- Years of Experience
- Bar Admission
- Specialties (Taxonomy)
```

### 2. Legal Cases
```
WordPress Admin → Legal Cases → Add New

Fields:
- Case Result (Won/Settled/Dismissed)
- Settlement/Award Amount
- Case Duration
- Lead Attorney
- Completion Date
- Case Type (Taxonomy)
```

### 3. Practice Areas
```
WordPress Admin → Practice Areas → Add New

Fields:
- Icon Class (Font Awesome)
- Display Order
- Featured on Homepage
```

### 4. Testimonials
```
WordPress Admin → Testimonials → Add New

Fields:
- Client Name
- Testimonial Content
- Rating
```

## 🎨 Style Customization

### CSS Variables Usage
```css
:root {
    /* Brand Colors */
    --primary-navy: #2B3D66;
    --primary-blue: #4A90E2;
    --accent-blue: #5BA8F5;
    
    /* Typography */
    --font-primary: 'Noto Sans KR', sans-serif;
    --font-size-base: 16px;
    
    /* Spacing */
    --container-max-width: 1200px;
    --section-padding: 80px 0;
}
```

### Additional CSS
```
WordPress Admin → Appearance → Customize → Additional CSS

Or

Edit wp-content/themes/law-firm-pyeongjeong/style.css
```

## ⚡ JavaScript Features

### Main Functions
```javascript
// Mobile Menu
initMobileMenu()

// Scroll to Top
initScrollToTop()

// Smooth Scroll
initSmoothScroll()

// Consultation Form Handler
initConsultationForms()

// Modal System
initModalSystem()

// Form Validation
initFormValidation()
```

### AJAX Form Processing
- Asynchronous consultation form processing
- Real-time validation
- Korean error messages
- Auto-save functionality

## 🔧 Developer Guide

### Hooks and Filters

#### Custom Hooks
```php
// After consultation form submission
do_action('law_firm_after_consultation_submit', $consultation_id);

// Before displaying attorney information
apply_filters('law_firm_attorney_display_data', $attorney_data);
```

#### Utility Functions
```php
// Get attorney information
law_firm_get_attorney($attorney_id)

// Get featured practice areas
law_firm_get_featured_practice_areas($limit)

// Get recent successful cases
law_firm_get_recent_cases($limit)

// Format case amounts
law_firm_format_case_amount($amount)
```

### Template Override

Creating a child theme:
```php
// wp-content/themes/law-firm-pyeongjeong-child/style.css
/*
Theme Name: Law Firm Pyeongjeong Child
Template: law-firm-pyeongjeong
Version: 1.0
*/

@import url("../law-firm-pyeongjeong/style.css");

/* Add custom styles */
```

```php
// wp-content/themes/law-firm-pyeongjeong-child/functions.php
<?php
function law_firm_child_enqueue_styles() {
    wp_enqueue_style('parent-style', 
        get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'law_firm_child_enqueue_styles');
```

## 🌐 Multilingual Support

### Translation Files
```
wp-content/themes/law-firm-pyeongjeong/languages/
├── law-firm-pyeongjeong.pot (Template)
├── ko_KR.po (Korean)
└── ko_KR.mo (Korean Compiled)
```

### Adding New Translations
```php
// functions.php
load_theme_textdomain('law-firm-pyeongjeong', 
    get_template_directory() . '/languages');
```

## 🔧 Troubleshooting

### Common Issues

#### 1. Menu not displaying
```
Solution: WordPress Admin → Appearance → Menus
Assign menu to "Primary Menu" location
```

#### 2. Consultation form not working
```
Check:
- JavaScript errors (Browser Developer Tools)
- AJAX URL configuration
- Server PHP error logs
```

#### 3. Custom post types not visible
```
Solution: 
WordPress Admin → Settings → Permalinks → Save Changes
(permalink flush)
```

#### 4. Broken images
```
Check:
- Image file paths
- Server permissions (755/644)
- WordPress media regeneration
```

## 📱 Performance Optimization

### Recommended Settings

#### Caching
```
LiteSpeed Cache Plugin Settings:
- Page Cache: Enable
- Image Optimization: Enable  
- CSS/JS Minification: Enable
```

#### Image Optimization
```
Recommended Image Sizes:
- Attorney Profiles: 300x400px
- Case Thumbnails: 400x300px
- Hero Background: 1920x1080px
```

## 🚀 Deployment Guide

### Production Checklist

#### Security
- [ ] Update WordPress to latest version
- [ ] Update plugins to latest versions
- [ ] Set strong admin passwords
- [ ] Remove unnecessary plugins
- [ ] Disable debug mode

#### Performance
- [ ] Complete image optimization
- [ ] Configure caching plugins
- [ ] Enable GZIP compression
- [ ] Setup CDN (optional)

#### SEO
- [ ] Install Google Analytics
- [ ] Register Google Search Console
- [ ] Submit XML sitemap
- [ ] Optimize meta tags and descriptions

#### Functionality Testing
- [ ] All pages working properly
- [ ] Test consultation form submission
- [ ] Mobile responsive testing  
- [ ] Browser compatibility testing
- [ ] Contact links functionality testing

## 📞 Support

### Technical Support
- Theme Issues: GitHub Issues
- Customization Requests: Separate Inquiry
- Update Notifications: Check theme changelog

### Additional Development
For additional features based on this theme:
- Booking system integration
- Payment system integration
- Advanced search functionality
- Multilingual site development
- Performance optimization consulting

---

## 📄 License

This theme is distributed under the GPL v2 license.

**© 2024 Law Firm Pyeongjeong Theme. All rights reserved.**