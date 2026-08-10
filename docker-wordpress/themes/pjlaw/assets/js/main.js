/**
 * PyeongJeong Law Theme - Main JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Header scroll behavior
        initHeaderScroll();

        // Transparent Mega Menu Hover
        initMegaMenuHover();
        
        // Mobile navigation toggle
        initMobileNav();

        // Smooth scroll for anchor links
        initSmoothScroll();
        
        // Consultation form handling
        initConsultationForm();
        
        // Scroll to top
        initScrollTop();

        // Blog category filter (client-side)
        initBlogFilter();
    });

    /**
     * Initialize transparent mega menu hover pointer behavior
     */
    function initMegaMenuHover() {
        var $header = $('.header');
        var $nav    = $('.navbar-nav');
        var hoverTimer;

        if (!$nav.length) return;

        $nav.on('mouseenter', 'li, a', function() {
            clearTimeout(hoverTimer);
            $header.addClass('mega-menu-open');
        });

        $('.navbar-menu, .header').on('mouseleave', function() {
            hoverTimer = setTimeout(function() {
                $header.removeClass('mega-menu-open');
            }, 180);
        });
    }

    /**
     * Initialize mobile navigation toggle
     */
    function initMobileNav() {
        var $toggler = $('.navbar-toggler');
        var $menu    = $('.navbar-menu');

        if (!$toggler.length) return;

        $toggler.on('click', function() {
            var isOpen = $menu.hasClass('active');
            $menu.toggleClass('active');
            $toggler.toggleClass('active');
            $toggler.attr('aria-expanded', isOpen ? 'false' : 'true');
        });

        // Close menu when a nav link is clicked
        $menu.on('click', 'a', function() {
            $menu.removeClass('active');
            $toggler.removeClass('active');
            $toggler.attr('aria-expanded', 'false');
        });

        // Close on outside click
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navbar').length) {
                $menu.removeClass('active');
                $toggler.removeClass('active');
                $toggler.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Initialize header scroll behavior
     */
    function initHeaderScroll() {
        var $header = $('.header');
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        });
    }

    /**
     * Initialize scroll to top
     */
    function initScrollTop() {
        $('.scroll-top').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 800);
        });
    }


    /**
     * Initialize smooth scroll for anchor links
     */
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    }

    /**
     * Initialize consultation form
     */
    function initConsultationForm() {
        var $form = $('#consultation-form');
        
        if ($form.length) {
            $form.on('submit', function(e) {
                e.preventDefault();
                submitConsultationForm($form);
            });
        }
    }

    /**
     * Submit consultation form via AJAX
     */
    function submitConsultationForm($form) {
        var formData = {
            action: 'pjlaw_consultation',
            nonce: pjlaw_ajax.nonce,
            name: $form.find('[name="name"]').val(),
            phone: $form.find('[name="phone"]').val(),
            email: $form.find('[name="email"]').val(),
            subject: $form.find('[name="subject"]').val(),
            message: $form.find('[name="message"]').val(),
            privacy: $form.find('[name="privacy"]').is(':checked') ? 1 : 0
        };

        $.ajax({
            url: pjlaw_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $form.html('<div class="success-message"><p>' + response.data.message + '</p></div>');
                } else {
                    alert(response.data.message || 'Error submitting form');
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    }

    function initBlogFilter() {
        var $tabs     = $('.blog-tabs .blog-tab[data-cat]');
        var $services = $('.services-grid .services-grid__item[data-service]');
        if (!$tabs.length && !$services.length) return;

        var activeCat     = 'all';
        var activeService = 'all';

        // Restore filter state saved before navigating from page 2+
        var saved = sessionStorage.getItem('pjlaw_blog_filter');
        if (saved) {
            try {
                var f = JSON.parse(saved);
                activeCat     = f.cat     || 'all';
                activeService = f.service || 'all';
                if (activeCat !== 'all') {
                    $tabs.removeClass('blog-tab--active');
                    $tabs.filter('[data-cat="' + activeCat + '"]').addClass('blog-tab--active');
                }
                if (activeService !== 'all') {
                    $services.removeClass('active');
                    $services.filter('[data-service="' + activeService + '"]').addClass('active');
                }
            } catch (e) {}
            sessionStorage.removeItem('pjlaw_blog_filter');
        }

        function isPaged() {
            return window.location.search.indexOf('paged') !== -1;
        }

        function applyFilter() {
            var $realCards  = $('.blog-card:not(.blog-card--empty)');
            var $emptyCards = $('.blog-card--empty');
            var visible = 0;

            $realCards.each(function() {
                var cats     = $(this).data('cats')     ? String($(this).data('cats')).split(' ')     : [];
                var services = $(this).data('services') ? String($(this).data('services')).split(' ') : [];
                var catMatch     = activeCat     === 'all' || cats.indexOf(activeCat)         !== -1;
                var serviceMatch = activeService === 'all' || services.indexOf(activeService) !== -1;
                var show = catMatch && serviceMatch;
                $(this).toggle(show);
                if (show) visible++;
            });

            // Show enough placeholders to keep the grid at 9 slots
            var placeholdersNeeded = Math.max(0, 9 - visible);
            $emptyCards.each(function(i) {
                $(this).toggle(i < placeholdersNeeded);
            });

            var $count = $('.blog-results-count strong');
            if ($count.length) $count.text(visible + '건');

            $('.blog-pagination').toggle(activeCat === 'all' && activeService === 'all');
        }

        $tabs.on('click', function() {
            activeCat = String($(this).data('cat'));
            if (isPaged()) {
                sessionStorage.setItem('pjlaw_blog_filter', JSON.stringify({ cat: activeCat, service: activeService }));
                window.location.href = window.location.origin + window.location.pathname;
                return;
            }
            $tabs.removeClass('blog-tab--active');
            $(this).addClass('blog-tab--active');
            applyFilter();
        });

        $services.on('click', function() {
            activeService = String($(this).data('service'));
            if (isPaged()) {
                sessionStorage.setItem('pjlaw_blog_filter', JSON.stringify({ cat: activeCat, service: activeService }));
                window.location.href = window.location.origin + window.location.pathname;
                return;
            }
            $services.removeClass('active');
            $(this).addClass('active');
            applyFilter();
        });

        applyFilter();
    }

    // Intersection Observer for animations on scroll
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        $('.stat-card, .service-card, .case-card').each(function() {
            observer.observe(this);
        });
    }

})(jQuery);
