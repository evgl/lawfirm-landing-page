/**
 * Main JavaScript File for Law Firm Pyeongjeong Theme
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // Global variables
    let isScrolling = false;
    let lastScrollTop = 0;
    let scrollTimer = null;

    /**
     * Document Ready Functions
     */
    $(document).ready(function() {
        initializeTheme();
        bindEvents();
        handleAccessibility();
    });

    /**
     * Window Load Functions
     */
    $(window).on('load', function() {
        hideLoadingOverlay();
        initializeAnimations();
    });

    /**
     * Initialize Theme Components
     */
    function initializeTheme() {
        initMobileMenu();
        initScrollToTop();
        initQuickMenu();
        initSmoothScroll();
        initConsultationForms();
        initModalSystem();
        initFormValidation();
        initHeaderScroll();
    }

    /**
     * Bind Event Listeners
     */
    function bindEvents() {
        // Window events
        $(window).on('scroll', throttle(handleScroll, 16));
        $(window).on('resize', debounce(handleResize, 250));
        
        // Form events
        $('form').on('submit', handleFormSubmission);
        $('.consultation-form input, .consultation-form select, .consultation-form textarea').on('blur', validateField);
        
        // Modal events
        $('.modal-close, .modal-overlay').on('click', closeModal);
        $(document).on('keydown', handleKeydown);
        
        // Search form
        $('.hero-search form').on('submit', handleHeroSearch);
        
        // Quick menu interactions
        $('.quick-menu-item').on('click', handleQuickMenuClick);
        
        // Practice area cards hover effects
        $('.practice-area-card').on('mouseenter', handleCardHover);
        $('.practice-area-card').on('mouseleave', handleCardLeave);
    }

    /**
     * Mobile Menu Initialization
     */
    function initMobileMenu() {
        const $menuToggle = $('.mobile-menu-toggle');
        const $navigation = $('.main-navigation');
        
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            
            $navigation.toggleClass('active');
            $('body').toggleClass('menu-open');
            
            // Update icon
            const $icon = $(this).find('i');
            if ($navigation.hasClass('active')) {
                $icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                $icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close mobile menu on outside click
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on link click
        $('.main-navigation a').on('click', function() {
            closeMobileMenu();
        });
    }

    /**
     * Close Mobile Menu
     */
    function closeMobileMenu() {
        $('.mobile-menu-toggle').attr('aria-expanded', 'false');
        $('.main-navigation').removeClass('active');
        $('body').removeClass('menu-open');
        $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
    }

    /**
     * Scroll to Top Functionality
     */
    function initScrollToTop() {
        const $backToTop = $('.back-to-top, .scroll-to-top');
        
        $backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
        });
    }

    /**
     * Quick Menu Initialization
     */
    function initQuickMenu() {
        const $quickMenu = $('.quick-menu');
        
        // Position quick menu based on viewport
        function positionQuickMenu() {
            const windowHeight = $(window).height();
            const menuHeight = $quickMenu.outerHeight();
            const headerHeight = $('.site-header').outerHeight();
            const footerHeight = $('.site-footer').outerHeight();
            const availableHeight = windowHeight - headerHeight - footerHeight;
            
            if (menuHeight > availableHeight) {
                $quickMenu.addClass('compact');
            } else {
                $quickMenu.removeClass('compact');
            }
        }

        positionQuickMenu();
        $(window).on('resize', positionQuickMenu);

        // Hide quick menu on scroll for mobile
        let quickMenuTimer;
        $(window).on('scroll', function() {
            if ($(window).width() <= 768) {
                $quickMenu.addClass('hidden');
                clearTimeout(quickMenuTimer);
                quickMenuTimer = setTimeout(function() {
                    $quickMenu.removeClass('hidden');
                }, 1000);
            }
        });
    }

    /**
     * Smooth Scroll Initialization
     */
    function initSmoothScroll() {
        $('a[data-scroll-to]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this).data('scroll-to');
            const $target = $('#' + target);
            
            if ($target.length) {
                const headerHeight = $('.site-header').outerHeight();
                const offsetTop = $target.offset().top - headerHeight - 20;
                
                $('html, body').animate({
                    scrollTop: offsetTop
                }, 800, 'swing', function() {
                    // Focus on target for accessibility
                    $target.focus();
                });
            }
        });
    }

    /**
     * Consultation Forms Initialization
     */
    function initConsultationForms() {
        // Phone number formatting
        $('input[type="tel"]').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length >= 3 && value.length <= 7) {
                value = value.replace(/(\d{3})(\d{1,4})/, '$1-$2');
            } else if (value.length >= 8) {
                value = value.replace(/(\d{3})(\d{4})(\d{1,4})/, '$1-$2-$3');
            }
            $(this).val(value);
        });

        // Case type dependent fields
        $('select[name="case_type"]').on('change', function() {
            const caseType = $(this).val();
            const $form = $(this).closest('form');
            
            // Remove existing dynamic fields
            $form.find('.dynamic-field').remove();
            
            // Add case-specific fields
            if (caseType === 'criminal') {
                addCriminalFields($form);
            } else if (caseType === 'civil') {
                addCivilFields($form);
            } else if (caseType === 'family') {
                addFamilyFields($form);
            }
        });

        // Auto-save form data to localStorage
        $('.consultation-form input, .consultation-form select, .consultation-form textarea').on('input change', function() {
            const formId = $(this).closest('form').attr('id');
            const fieldName = $(this).attr('name');
            const fieldValue = $(this).val();
            
            if (formId && fieldName) {
                localStorage.setItem(`${formId}_${fieldName}`, fieldValue);
            }
        });

        // Restore form data from localStorage
        $('.consultation-form').each(function() {
            const formId = $(this).attr('id');
            if (formId) {
                const $form = $(this);
                $form.find('input, select, textarea').each(function() {
                    const fieldName = $(this).attr('name');
                    if (fieldName) {
                        const savedValue = localStorage.getItem(`${formId}_${fieldName}`);
                        if (savedValue && $(this).attr('type') !== 'checkbox') {
                            $(this).val(savedValue);
                        }
                    }
                });
            }
        });
    }

    /**
     * Add Criminal Case Specific Fields
     */
    function addCriminalFields($form) {
        const criminalFields = `
            <div class="form-group dynamic-field">
                <label for="criminal-stage">수사/재판 단계 <span class="required">*</span></label>
                <select id="criminal-stage" name="criminal_stage" class="form-control" required>
                    <option value="">선택해주세요</option>
                    <option value="investigation">수사단계</option>
                    <option value="prosecution">기소단계</option>
                    <option value="trial">재판단계</option>
                    <option value="appeal">항소/상고</option>
                </select>
            </div>
            <div class="form-group dynamic-field">
                <label for="criminal-urgency">긴급도</label>
                <select id="criminal-urgency" name="criminal_urgency" class="form-control">
                    <option value="">선택해주세요</option>
                    <option value="urgent">긴급 (24시간 이내)</option>
                    <option value="normal">보통 (1-3일)</option>
                    <option value="later">여유 (1주일 이내)</option>
                </select>
            </div>
        `;
        
        $form.find('textarea[name="message"]').closest('.form-group').before(criminalFields);
    }

    /**
     * Add Civil Case Specific Fields
     */
    function addCivilFields($form) {
        const civilFields = `
            <div class="form-group dynamic-field">
                <label for="civil-amount">분쟁금액 (원)</label>
                <input type="text" id="civil-amount" name="civil_amount" class="form-control" placeholder="예: 10,000,000">
            </div>
            <div class="form-group dynamic-field">
                <label for="civil-opponent">상대방 유무</label>
                <select id="civil-opponent" name="civil_opponent" class="form-control">
                    <option value="">선택해주세요</option>
                    <option value="individual">개인</option>
                    <option value="corporation">법인/단체</option>
                    <option value="unknown">미정</option>
                </select>
            </div>
        `;
        
        $form.find('textarea[name="message"]').closest('.form-group').before(civilFields);
    }

    /**
     * Add Family Law Specific Fields
     */
    function addFamilyFields($form) {
        const familyFields = `
            <div class="form-group dynamic-field">
                <label for="family-type">가족법 유형</label>
                <select id="family-type" name="family_type" class="form-control">
                    <option value="">선택해주세요</option>
                    <option value="divorce">이혼</option>
                    <option value="custody">양육권</option>
                    <option value="inheritance">상속</option>
                    <option value="adoption">입양</option>
                    <option value="other">기타</option>
                </select>
            </div>
            <div class="form-group dynamic-field">
                <label for="family-children">자녀 유무</label>
                <select id="family-children" name="family_children" class="form-control">
                    <option value="">선택해주세요</option>
                    <option value="yes">있음</option>
                    <option value="no">없음</option>
                </select>
            </div>
        `;
        
        $form.find('textarea[name="message"]').closest('.form-group').before(familyFields);
    }

    /**
     * Modal System Initialization
     */
    function initModalSystem() {
        // Open modal triggers
        $('[data-modal]').on('click', function(e) {
            e.preventDefault();
            const modalId = $(this).data('modal');
            openModal(modalId);
        });

        // Consultation modal trigger from various buttons
        $('.consultation-trigger, .btn-consultation').on('click', function(e) {
            e.preventDefault();
            openModal('consultation-modal');
        });
    }

    /**
     * Open Modal
     */
    function openModal(modalId) {
        const $modal = $('#' + modalId);
        if ($modal.length) {
            $modal.show().attr('aria-hidden', 'false');
            $('body').addClass('modal-open');
            
            // Focus on first form element
            setTimeout(function() {
                $modal.find('input, select, textarea').first().focus();
            }, 100);
            
            // Trap focus within modal
            trapFocus($modal);
        }
    }

    /**
     * Close Modal
     */
    function closeModal(e) {
        if (e) {
            e.preventDefault();
        }
        
        $('.modal').hide().attr('aria-hidden', 'true');
        $('body').removeClass('modal-open');
        
        // Return focus to trigger button
        $('.modal-trigger:focus').blur();
    }

    /**
     * Form Validation Initialization
     */
    function initFormValidation() {
        // Custom validation messages in Korean
        const validationMessages = {
            required: '필수 입력 항목입니다.',
            email: '올바른 이메일 주소를 입력해주세요.',
            tel: '올바른 전화번호를 입력해주세요.',
            minlength: function(length) {
                return `최소 ${length}자 이상 입력해주세요.`;
            },
            pattern: '올바른 형식으로 입력해주세요.'
        };

        // Real-time validation
        $('.consultation-form input[required], .consultation-form select[required], .consultation-form textarea[required]').on('blur', function() {
            validateField($(this));
        });

        // Remove validation on focus
        $('.consultation-form input, .consultation-form select, .consultation-form textarea').on('focus', function() {
            $(this).removeClass('error');
            $(this).next('.error-message').remove();
        });
    }

    /**
     * Validate Individual Field
     */
    function validateField($field) {
        const value = $field.val().trim();
        const fieldType = $field.attr('type');
        const isRequired = $field.prop('required');
        const fieldName = $field.attr('name');
        
        // Remove previous error
        $field.removeClass('error');
        $field.next('.error-message').remove();
        
        let isValid = true;
        let errorMessage = '';

        // Required field check
        if (isRequired && !value) {
            isValid = false;
            errorMessage = '필수 입력 항목입니다.';
        }
        // Email validation
        else if (fieldType === 'email' && value && !isValidEmail(value)) {
            isValid = false;
            errorMessage = '올바른 이메일 주소를 입력해주세요.';
        }
        // Phone validation
        else if (fieldType === 'tel' && value && !isValidPhone(value)) {
            isValid = false;
            errorMessage = '올바른 전화번호를 입력해주세요.';
        }
        // Name validation (no special characters)
        else if (fieldName === 'name' && value && !/^[가-힣a-zA-Z\s]+$/.test(value)) {
            isValid = false;
            errorMessage = '이름에는 한글, 영문, 공백만 입력 가능합니다.';
        }

        if (!isValid) {
            $field.addClass('error');
            $field.after(`<span class="error-message">${errorMessage}</span>`);
        }

        return isValid;
    }

    /**
     * Form Submission Handler
     */
    function handleFormSubmission(e) {
        e.preventDefault();
        
        const $form = $(this);
        const formData = new FormData($form[0]);
        
        // Validate all required fields
        let isFormValid = true;
        $form.find('input[required], select[required], textarea[required]').each(function() {
            if (!validateField($(this))) {
                isFormValid = false;
            }
        });

        // Check privacy consent
        if (!$form.find('input[name="privacy_consent"]:checked').length) {
            isFormValid = false;
            showNotification('개인정보 수집 및 이용에 동의해주세요.', 'error');
        }

        if (!isFormValid) {
            showNotification('입력 정보를 확인해주세요.', 'error');
            return false;
        }

        // Show loading
        showLoadingOverlay();
        
        // Add AJAX data
        formData.append('action', 'law_firm_consultation');
        formData.append('nonce', law_firm_ajax.nonce);

        // Submit via AJAX
        $.ajax({
            url: law_firm_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                hideLoadingOverlay();
                
                if (response.success) {
                    showNotification(response.data.message, 'success');
                    $form[0].reset();
                    
                    // Clear localStorage
                    const formId = $form.attr('id');
                    if (formId) {
                        Object.keys(localStorage).forEach(function(key) {
                            if (key.startsWith(formId + '_')) {
                                localStorage.removeItem(key);
                            }
                        });
                    }
                    
                    // Close modal if in modal
                    if ($form.closest('.modal').length) {
                        closeModal();
                    }
                    
                    // Scroll to top
                    $('html, body').animate({ scrollTop: 0 }, 600);
                } else {
                    showNotification(response.data.message || '오류가 발생했습니다.', 'error');
                }
            },
            error: function() {
                hideLoadingOverlay();
                showNotification('서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.', 'error');
            }
        });
    }

    /**
     * Header Scroll Behavior
     */
    function initHeaderScroll() {
        const $header = $('.site-header');
        let lastScrollTop = 0;
        
        $(window).on('scroll', function() {
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 100) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
            
            // Hide/show header on scroll
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                $header.addClass('hidden');
            } else {
                $header.removeClass('hidden');
            }
            
            lastScrollTop = scrollTop;
        });
    }

    /**
     * Handle Scroll Events
     */
    function handleScroll() {
        const scrollTop = $(window).scrollTop();
        
        // Show/hide back to top button
        if (scrollTop > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
        
        // Parallax effects for hero section
        if ($('.hero-section').length) {
            const heroHeight = $('.hero-section').outerHeight();
            if (scrollTop < heroHeight) {
                const translateY = scrollTop * 0.5;
                $('.hero-section .hero-content').css({
                    'transform': `translateY(${translateY}px)`,
                    'opacity': 1 - (scrollTop / heroHeight) * 0.5
                });
            }
        }
        
        // Animate elements on scroll
        $('.section').each(function() {
            const $section = $(this);
            const sectionTop = $section.offset().top;
            const sectionHeight = $section.outerHeight();
            const windowHeight = $(window).height();
            
            if (scrollTop + windowHeight > sectionTop + 100 && scrollTop < sectionTop + sectionHeight) {
                $section.addClass('in-view');
            }
        });
    }

    /**
     * Handle Window Resize
     */
    function handleResize() {
        // Close mobile menu on resize to desktop
        if ($(window).width() > 768) {
            closeMobileMenu();
        }
        
        // Recalculate quick menu position
        initQuickMenu();
        
        // Adjust hero section height
        if ($('.hero-section').length) {
            const windowHeight = $(window).height();
            const headerHeight = $('.site-header').outerHeight();
            $('.hero-section').css('min-height', windowHeight - headerHeight);
        }
    }

    /**
     * Handle Accessibility
     */
    function handleAccessibility() {
        // Skip links
        $('.skip-link').on('click', function(e) {
            e.preventDefault();
            const target = $(this).attr('href');
            $(target).focus();
        });

        // Keyboard navigation for mobile menu
        $('.mobile-menu-toggle').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        // ARIA live regions for dynamic content
        if (!$('#aria-live-region').length) {
            $('body').append('<div id="aria-live-region" aria-live="polite" aria-atomic="true" class="sr-only"></div>');
        }
    }

    /**
     * Handle Keydown Events
     */
    function handleKeydown(e) {
        // Close modal on Escape
        if (e.key === 'Escape') {
            closeModal();
        }
        
        // Handle tab trapping in modals
        if (e.key === 'Tab' && $('.modal:visible').length) {
            trapFocus($('.modal:visible'), e);
        }
    }

    /**
     * Trap Focus Within Element
     */
    function trapFocus($element, e) {
        const focusableElements = $element.find('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        const firstElement = focusableElements.first();
        const lastElement = focusableElements.last();
        
        if (!e) {
            firstElement.focus();
            return;
        }
        
        if (e.shiftKey) {
            if (document.activeElement === firstElement[0]) {
                lastElement.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === lastElement[0]) {
                firstElement.focus();
                e.preventDefault();
            }
        }
    }

    /**
     * Initialize Animations
     */
    function initializeAnimations() {
        // Fade in animations for cards
        $('.practice-area-card, .attorney-card, .post-card').each(function(index) {
            const $card = $(this);
            setTimeout(function() {
                $card.addClass('animate-fade-in');
            }, index * 100);
        });

        // Counter animations for statistics
        $('.counter').each(function() {
            const $counter = $(this);
            const target = parseInt($counter.data('target'), 10);
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(function() {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                $counter.text(Math.floor(current));
            }, 16);
        });
    }

    /**
     * Handle Hero Search
     */
    function handleHeroSearch(e) {
        const query = $(this).find('input[name="s"]').val().trim();
        
        if (!query) {
            e.preventDefault();
            showNotification('검색어를 입력해주세요.', 'warning');
            return false;
        }
        
        // Add loading state
        $(this).find('button').prop('disabled', true);
        $(this).find('button i').removeClass('fa-search').addClass('fa-spinner fa-spin');
        
        // Allow form submission to proceed
    }

    /**
     * Handle Quick Menu Clicks
     */
    function handleQuickMenuClick(e) {
        const $item = $(this);
        
        // Add click effect
        $item.addClass('clicked');
        setTimeout(function() {
            $item.removeClass('clicked');
        }, 300);
        
        // Track analytics
        if (typeof gtag !== 'undefined') {
            const action = $item.find('span').text() || $item.attr('title') || 'Quick Menu Click';
            gtag('event', 'click', {
                'event_category': 'Quick Menu',
                'event_label': action
            });
        }
    }

    /**
     * Handle Card Hover Effects
     */
    function handleCardHover() {
        $(this).addClass('hover');
    }

    function handleCardLeave() {
        $(this).removeClass('hover');
    }

    /**
     * Utility Functions
     */
    
    /**
     * Email Validation
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Phone Validation (Korean format)
     */
    function isValidPhone(phone) {
        const phoneRegex = /^(01[016789]|02|0[3-9]\d)-?\d{3,4}-?\d{4}$/;
        return phoneRegex.test(phone);
    }

    /**
     * Show Loading Overlay
     */
    function showLoadingOverlay() {
        $('#loading-overlay').fadeIn(300).attr('aria-hidden', 'false');
    }

    /**
     * Hide Loading Overlay
     */
    function hideLoadingOverlay() {
        $('#loading-overlay').fadeOut(300).attr('aria-hidden', 'true');
    }

    /**
     * Show Notification
     */
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        $('.notification').remove();
        
        const notificationHtml = `
            <div class="notification notification-${type}" role="alert" aria-live="assertive">
                <div class="notification-content">
                    <i class="fas ${getNotificationIcon(type)}" aria-hidden="true"></i>
                    <span>${message}</span>
                    <button class="notification-close" aria-label="알림 닫기">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        `;
        
        $('body').prepend(notificationHtml);
        
        const $notification = $('.notification');
        
        // Auto-hide after 5 seconds
        setTimeout(function() {
            $notification.fadeOut(300, function() {
                $(this).remove();
            });
        }, 5000);
        
        // Close button
        $notification.find('.notification-close').on('click', function() {
            $notification.fadeOut(300, function() {
                $(this).remove();
            });
        });
        
        // Update ARIA live region
        $('#aria-live-region').text(message);
    }

    /**
     * Get Notification Icon
     */
    function getNotificationIcon(type) {
        switch(type) {
            case 'success':
                return 'fa-check-circle';
            case 'error':
                return 'fa-exclamation-circle';
            case 'warning':
                return 'fa-exclamation-triangle';
            default:
                return 'fa-info-circle';
        }
    }

    /**
     * Throttle Function
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }

    /**
     * Debounce Function
     */
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    /**
     * Format Number with Commas (Korean style)
     */
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // Initialize lazy loading
    initLazyLoading();

})(jQuery);