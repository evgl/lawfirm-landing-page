/**
 * PyeongJeong Law Theme - Main JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Mobile menu toggle
        initMobileMenu();
        
        // Header scroll behavior
        initHeaderScroll();
        
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
     * Initialize mobile menu
     */
    function initMobileMenu() {
        var $toggle = $('#navbar-toggle');
        var $menu = $('.navbar-menu');

        $toggle.on('click', function() {
            $menu.toggleClass('active');
            $toggle.toggleClass('active');
        });

        // Close menu when a link is clicked
        $menu.find('a').on('click', function() {
            $menu.removeClass('active');
            $toggle.removeClass('active');
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

        function applyFilter() {
            var $cards  = $('.blog-card');
            var visible = 0;
            $cards.each(function() {
                var cats     = $(this).data('cats')     ? String($(this).data('cats')).split(' ')     : [];
                var services = $(this).data('services') ? String($(this).data('services')).split(' ') : [];
                var catMatch     = activeCat     === 'all' || cats.indexOf(activeCat)         !== -1;
                var serviceMatch = activeService === 'all' || services.indexOf(activeService) !== -1;
                var show = catMatch && serviceMatch;
                $(this).toggle(show);
                if (show) visible++;
            });
            var $count = $('.blog-results-count strong');
            if ($count.length) $count.text(visible + '건');
        }

        $tabs.on('click', function() {
            activeCat = String($(this).data('cat'));
            $tabs.removeClass('blog-tab--active');
            $(this).addClass('blog-tab--active');
            applyFilter();
        });

        $services.on('click', function() {
            var href = $(this).data('href');
            if (href) window.location.href = href;
        });
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
