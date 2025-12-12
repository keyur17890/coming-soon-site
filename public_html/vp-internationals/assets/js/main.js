/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - MAIN JAVASCRIPT
 * ═══════════════════════════════════════════════════════════════
 *
 * Modular JavaScript architecture with namespace pattern.
 *
 * IMPROVEMENTS IMPLEMENTED:
 * - Points 190-194: Performance (throttle, debounce, no console.log)
 * - Points 195-196: Security (input sanitization)
 * - Points 197-200: Accessibility (keyboard nav, focus trap, ARIA)
 * - Points 201-205: Code architecture (modules, namespacing)
 * - Points 206-210: Form handling
 * - Points 211-215: Scroll handling
 * - Points 216-218: GSAP integration preparation
 *
 * MODULE STRUCTURE (Point 202):
 * 1. VP Namespace
 * 2. Utilities Module
 * 3. Navigation Module
 * 4. Forms Module
 * 5. Scroll Module
 * 6. Animations Module
 * 7. Initialization
 * ═══════════════════════════════════════════════════════════════
 */

'use strict';

/* ═══════════════════════════════════════════════════════════════
   Point 201: VP NAMESPACE / MODULE PATTERN
   ═══════════════════════════════════════════════════════════════ */

const VP = window.VP || {};

/* ═══════════════════════════════════════════════════════════════
   Point 203: SELECTORS AS CONSTANTS
   ═══════════════════════════════════════════════════════════════ */

VP.SELECTORS = {
    // Header
    header: '.site-header',
    headerToggle: '.header__toggle',
    mobileMenu: '#mobile-menu',
    navLinks: '.nav__link',
    navDropdown: '.nav__dropdown',

    // Forms
    form: 'form',
    formInput: '.form-input',
    newsletterForm: '#newsletter-form',
    contactForm: '#contact-form',

    // Scroll
    backToTop: '#back-to-top',
    scrollTarget: '[data-scroll-to]',

    // Animations
    animate: '[data-animate]',

    // FAQ
    faqQuestion: '.faq__question',
    faqItem: '.faq__item',

    // General
    lazyImage: '[data-src]',
    tooltip: '[data-tooltip]'
};

/* ═══════════════════════════════════════════════════════════════
   Point 205: UTILITIES MODULE
   Points 190-193: Throttle, Debounce, Performance
   ═══════════════════════════════════════════════════════════════ */

VP.Utils = (function() {
    'use strict';

    /**
     * Point 190: Throttle function (16ms = 60fps)
     * Limits function execution rate
     *
     * @param {Function} func - Function to throttle
     * @param {number} limit - Time limit in ms (default 16ms for 60fps)
     * @returns {Function} Throttled function
     */
    function throttle(func, limit = 16) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * Point 192: Debounce function (250ms default)
     * Delays function execution until after wait period
     *
     * @param {Function} func - Function to debounce
     * @param {number} wait - Wait time in ms
     * @param {boolean} immediate - Execute immediately on first call
     * @returns {Function} Debounced function
     */
    function debounce(func, wait = 250, immediate = false) {
        let timeout;
        return function(...args) {
            const later = () => {
                timeout = null;
                if (!immediate) func.apply(this, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(this, args);
        };
    }

    /**
     * Point 200: Check prefers-reduced-motion
     *
     * @returns {boolean} True if user prefers reduced motion
     */
    function prefersReducedMotion() {
        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }

    /**
     * Point 196: Sanitize string input (basic XSS prevention)
     *
     * @param {string} str - String to sanitize
     * @returns {string} Sanitized string
     */
    function sanitizeString(str) {
        if (typeof str !== 'string') return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    /**
     * Sanitize HTML (allow safe tags)
     *
     * @param {string} html - HTML to sanitize
     * @returns {string} Sanitized HTML
     */
    function sanitizeHTML(html) {
        const allowedTags = ['b', 'i', 'em', 'strong', 'a', 'br', 'p', 'ul', 'ol', 'li'];
        const doc = new DOMParser().parseFromString(html, 'text/html');
        const elements = doc.body.querySelectorAll('*');

        elements.forEach(el => {
            if (!allowedTags.includes(el.tagName.toLowerCase())) {
                el.replaceWith(document.createTextNode(el.textContent));
            } else {
                // Remove all attributes except href on anchors
                Array.from(el.attributes).forEach(attr => {
                    if (!(el.tagName === 'A' && attr.name === 'href')) {
                        el.removeAttribute(attr.name);
                    }
                });

                // Sanitize href
                if (el.tagName === 'A' && el.href) {
                    if (!el.href.startsWith('http') && !el.href.startsWith('mailto:')) {
                        el.removeAttribute('href');
                    }
                }
            }
        });

        return doc.body.innerHTML;
    }

    /**
     * Generate unique ID
     *
     * @param {string} prefix - Optional prefix
     * @returns {string} Unique ID
     */
    function generateId(prefix = 'vp') {
        return `${prefix}-${Math.random().toString(36).substr(2, 9)}`;
    }

    /**
     * Check if element is in viewport
     *
     * @param {HTMLElement} el - Element to check
     * @param {number} offset - Offset from viewport edge
     * @returns {boolean} True if in viewport
     */
    function isInViewport(el, offset = 0) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) - offset &&
            rect.bottom >= offset
        );
    }

    /**
     * Get scroll position
     *
     * @returns {Object} {x, y} scroll position
     */
    function getScrollPosition() {
        return {
            x: window.pageXOffset || document.documentElement.scrollLeft,
            y: window.pageYOffset || document.documentElement.scrollTop
        };
    }

    /**
     * Point 204: Safe wrapper for try-catch
     *
     * @param {Function} fn - Function to execute
     * @param {*} fallback - Fallback value on error
     * @returns {*} Result or fallback
     */
    function safeExecute(fn, fallback = null) {
        try {
            return fn();
        } catch (error) {
            // Point 194: No console.log in production
            if (window.VP_DEBUG) {
                console.error('VP Error:', error);
            }
            return fallback;
        }
    }

    /**
     * Format number with commas
     *
     * @param {number} num - Number to format
     * @returns {string} Formatted number
     */
    function formatNumber(num) {
        return new Intl.NumberFormat().format(num);
    }

    /**
     * Parse URL parameters
     *
     * @returns {Object} URL parameters
     */
    function getURLParams() {
        const params = {};
        const searchParams = new URLSearchParams(window.location.search);
        for (const [key, value] of searchParams) {
            params[key] = value;
        }
        return params;
    }

    // Public API
    return {
        throttle,
        debounce,
        prefersReducedMotion,
        sanitizeString,
        sanitizeHTML,
        generateId,
        isInViewport,
        getScrollPosition,
        safeExecute,
        formatNumber,
        getURLParams
    };
})();

/* ═══════════════════════════════════════════════════════════════
   Point 202: NAVIGATION MODULE
   Points 197-199: Accessibility (keyboard nav, focus trap, ARIA)
   ═══════════════════════════════════════════════════════════════ */

VP.Navigation = (function() {
    'use strict';

    let isMenuOpen = false;
    let header = null;
    let toggle = null;
    let mobileMenu = null;
    let focusTrap = null;
    let lastFocusedElement = null;

    /**
     * Initialize navigation
     */
    function init() {
        header = document.querySelector(VP.SELECTORS.header);
        toggle = document.querySelector(VP.SELECTORS.headerToggle);
        mobileMenu = document.querySelector(VP.SELECTORS.mobileMenu);

        if (!header || !toggle || !mobileMenu) return;

        // Event listeners
        toggle.addEventListener('click', handleToggleClick);

        // Point 197: Escape key to close menu
        document.addEventListener('keydown', handleKeyDown);

        // Close menu on resize to desktop
        window.addEventListener('resize', VP.Utils.debounce(handleResize, 250));

        // Initialize dropdowns
        initDropdowns();
    }

    /**
     * Handle toggle button click
     */
    function handleToggleClick() {
        isMenuOpen ? closeMenu() : openMenu();
    }

    /**
     * Open mobile menu
     */
    function openMenu() {
        isMenuOpen = true;
        lastFocusedElement = document.activeElement;

        // Point 199: Update ARIA
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Close navigation menu');
        mobileMenu.removeAttribute('hidden');
        mobileMenu.classList.add('is-open');

        // Prevent body scroll
        document.body.style.overflow = 'hidden';

        // Point 198: Set up focus trap
        setupFocusTrap();

        // Focus first link
        const firstLink = mobileMenu.querySelector('a');
        if (firstLink) {
            setTimeout(() => firstLink.focus(), 100);
        }
    }

    /**
     * Close mobile menu
     */
    function closeMenu() {
        isMenuOpen = false;

        // Point 199: Update ARIA
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation menu');
        mobileMenu.classList.remove('is-open');

        // Re-enable body scroll
        document.body.style.overflow = '';

        // Remove focus trap
        removeFocusTrap();

        // Restore focus
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }

        // Hide menu after animation
        setTimeout(() => {
            if (!isMenuOpen) {
                mobileMenu.setAttribute('hidden', '');
            }
        }, 300);
    }

    /**
     * Point 197: Handle keyboard navigation
     *
     * @param {KeyboardEvent} e - Keyboard event
     */
    function handleKeyDown(e) {
        // Escape to close menu
        if (e.key === 'Escape' && isMenuOpen) {
            e.preventDefault();
            closeMenu();
        }
    }

    /**
     * Point 198: Set up focus trap for mobile menu
     */
    function setupFocusTrap() {
        const focusableElements = mobileMenu.querySelectorAll(
            'a[href], button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
        );

        if (focusableElements.length === 0) return;

        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        focusTrap = function(e) {
            if (e.key !== 'Tab') return;

            if (e.shiftKey) {
                // Shift + Tab
                if (document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                }
            } else {
                // Tab
                if (document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        };

        document.addEventListener('keydown', focusTrap);
    }

    /**
     * Remove focus trap
     */
    function removeFocusTrap() {
        if (focusTrap) {
            document.removeEventListener('keydown', focusTrap);
            focusTrap = null;
        }
    }

    /**
     * Handle window resize
     */
    function handleResize() {
        // Close mobile menu if viewport is desktop size
        if (window.innerWidth >= 1024 && isMenuOpen) {
            closeMenu();
        }
    }

    /**
     * Initialize dropdown menus for desktop
     */
    function initDropdowns() {
        const dropdownToggles = document.querySelectorAll('.nav__link--has-dropdown');

        dropdownToggles.forEach(toggle => {
            const dropdown = toggle.nextElementSibling;
            if (!dropdown) return;

            // Keyboard accessibility for dropdowns
            toggle.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                    toggle.setAttribute('aria-expanded', !isExpanded);
                }

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const firstLink = dropdown.querySelector('a');
                    if (firstLink) firstLink.focus();
                }
            });

            // Handle focus within dropdown
            dropdown.addEventListener('keydown', (e) => {
                const links = dropdown.querySelectorAll('a');
                const currentIndex = Array.from(links).indexOf(document.activeElement);

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % links.length;
                    links[nextIndex].focus();
                }

                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevIndex = currentIndex <= 0 ? links.length - 1 : currentIndex - 1;
                    links[prevIndex].focus();
                }

                if (e.key === 'Escape') {
                    e.preventDefault();
                    toggle.focus();
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // Public API
    return {
        init,
        openMenu,
        closeMenu,
        isOpen: () => isMenuOpen
    };
})();

/* ═══════════════════════════════════════════════════════════════
   Point 202: FORMS MODULE
   Points 206-210: Form handling
   ═══════════════════════════════════════════════════════════════ */

VP.Forms = (function() {
    'use strict';

    /**
     * Point 206: Initialize form validation
     */
    function init() {
        const forms = document.querySelectorAll('form[data-validate]');
        forms.forEach(form => initForm(form));

        // Init newsletter form specifically
        const newsletterForm = document.querySelector(VP.SELECTORS.newsletterForm);
        if (newsletterForm) {
            initForm(newsletterForm);
        }
    }

    /**
     * Initialize individual form
     *
     * @param {HTMLFormElement} form - Form element
     */
    function initForm(form) {
        const inputs = form.querySelectorAll('input, textarea, select');

        // Point 207: Real-time validation on blur and input
        inputs.forEach(input => {
            input.addEventListener('blur', () => validateField(input));
            input.addEventListener('input', VP.Utils.debounce(() => {
                if (input.classList.contains('is-invalid')) {
                    validateField(input);
                }
            }, 300));
        });

        // Form submission
        form.addEventListener('submit', handleSubmit);
    }

    /**
     * Validate individual field
     *
     * @param {HTMLInputElement} input - Input element
     * @returns {boolean} Is valid
     */
    function validateField(input) {
        const value = input.value.trim();
        const type = input.type;
        const required = input.hasAttribute('required');
        let isValid = true;
        let message = '';

        // Required check
        if (required && !value) {
            isValid = false;
            message = 'This field is required';
        }

        // Email validation
        if (isValid && type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                message = 'Please enter a valid email address';
            }
        }

        // Phone validation
        if (isValid && type === 'tel' && value) {
            const phoneRegex = /^[\+]?[(]?[0-9]{1,4}[)]?[-\s\./0-9]{6,}$/;
            if (!phoneRegex.test(value)) {
                isValid = false;
                message = 'Please enter a valid phone number';
            }
        }

        // Min length
        const minLength = input.getAttribute('minlength');
        if (isValid && minLength && value.length < parseInt(minLength)) {
            isValid = false;
            message = `Minimum ${minLength} characters required`;
        }

        // Max length
        const maxLength = input.getAttribute('maxlength');
        if (isValid && maxLength && value.length > parseInt(maxLength)) {
            isValid = false;
            message = `Maximum ${maxLength} characters allowed`;
        }

        // Point 208: Set field state
        setFieldState(input, isValid, message);

        return isValid;
    }

    /**
     * Point 208: Set field state (valid/invalid)
     *
     * @param {HTMLInputElement} input - Input element
     * @param {boolean} isValid - Validation state
     * @param {string} message - Error message
     */
    function setFieldState(input, isValid, message = '') {
        const formGroup = input.closest('.form-group');
        if (!formGroup) return;

        // Remove existing states
        input.classList.remove('is-valid', 'is-invalid');
        input.classList.remove('form-input--error', 'form-input--success');

        // Find or create error element
        let errorEl = formGroup.querySelector('.form-error');
        if (!errorEl) {
            errorEl = document.createElement('span');
            errorEl.className = 'form-error';
            errorEl.setAttribute('role', 'alert');
            errorEl.id = VP.Utils.generateId('error');
            input.setAttribute('aria-describedby', errorEl.id);
            formGroup.appendChild(errorEl);
        }

        if (isValid) {
            input.classList.add('is-valid', 'form-input--success');
            input.setAttribute('aria-invalid', 'false');
            errorEl.textContent = '';
            errorEl.hidden = true;
        } else {
            input.classList.add('is-invalid', 'form-input--error');
            input.setAttribute('aria-invalid', 'true');
            errorEl.textContent = message;
            errorEl.hidden = false;
        }
    }

    /**
     * Handle form submission
     *
     * @param {Event} e - Submit event
     */
    async function handleSubmit(e) {
        e.preventDefault();

        const form = e.target;
        const inputs = form.querySelectorAll('input, textarea, select');
        let isValid = true;

        // Validate all fields
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            // Focus first invalid field
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        // Point 196: Sanitize inputs before submission
        const formData = new FormData(form);
        for (const [key, value] of formData.entries()) {
            if (typeof value === 'string') {
                formData.set(key, VP.Utils.sanitizeString(value));
            }
        }

        // Point 209: Show loading state
        setFormLoading(form, true);

        try {
            const response = await fetch(form.action, {
                method: form.method || 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Point 210: Show success message
                showMessage(form, 'success', data.message || 'Form submitted successfully!');
                form.reset();
            } else {
                showMessage(form, 'error', data.message || 'Something went wrong. Please try again.');
            }
        } catch (error) {
            showMessage(form, 'error', 'Network error. Please check your connection and try again.');
        } finally {
            setFormLoading(form, false);
        }
    }

    /**
     * Point 209: Set form loading state
     *
     * @param {HTMLFormElement} form - Form element
     * @param {boolean} isLoading - Loading state
     */
    function setFormLoading(form, isLoading) {
        const submitBtn = form.querySelector('[type="submit"]');
        if (!submitBtn) return;

        if (isLoading) {
            submitBtn.disabled = true;
            submitBtn.dataset.originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner"></span> Submitting...';
            form.classList.add('is-loading');
        } else {
            submitBtn.disabled = false;
            submitBtn.innerHTML = submitBtn.dataset.originalText || 'Submit';
            form.classList.remove('is-loading');
        }
    }

    /**
     * Point 210: Show form message
     *
     * @param {HTMLFormElement} form - Form element
     * @param {string} type - Message type (success/error)
     * @param {string} message - Message text
     */
    function showMessage(form, type, message) {
        // Remove existing message
        const existingMessage = form.querySelector('.form-message');
        if (existingMessage) existingMessage.remove();

        // Create message element
        const messageEl = document.createElement('div');
        messageEl.className = `form-message form-message--${type}`;
        messageEl.setAttribute('role', 'alert');
        messageEl.innerHTML = `
            <svg class="form-message__icon" width="20" height="20" viewBox="0 0 20 20">
                ${type === 'success'
                    ? '<path fill="currentColor" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm-2 15l-5-5 1.41-1.41L8 12.17l7.59-7.59L17 6l-9 9z"/>'
                    : '<path fill="currentColor" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z"/>'
                }
            </svg>
            <span>${VP.Utils.sanitizeString(message)}</span>
        `;

        // Insert message
        form.insertBefore(messageEl, form.firstChild);

        // Auto-remove after 5 seconds
        setTimeout(() => {
            messageEl.classList.add('is-hiding');
            setTimeout(() => messageEl.remove(), 300);
        }, 5000);
    }

    // Public API
    return {
        init,
        validateField,
        setFieldState,
        showMessage
    };
})();

/* ═══════════════════════════════════════════════════════════════
   Point 202: SCROLL MODULE
   Points 211-215: Scroll handling
   ═══════════════════════════════════════════════════════════════ */

VP.Scroll = (function() {
    'use strict';

    let header = null;
    let lastScrollY = 0;
    let ticking = false;
    const SCROLL_THRESHOLD = 50;
    const HIDE_THRESHOLD = 5;

    /**
     * Initialize scroll handling
     */
    function init() {
        header = document.querySelector(VP.SELECTORS.header);

        // Point 191: Apply throttle to scroll handler
        window.addEventListener('scroll', handleScroll, { passive: true });

        // Initialize back to top button
        initBackToTop();

        // Initialize smooth scroll links
        initSmoothScroll();

        // Initial check
        updateHeader();
    }

    /**
     * Handle scroll event with requestAnimationFrame
     */
    function handleScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateHeader();
                ticking = false;
            });
            ticking = true;
        }
    }

    /**
     * Point 211-213: Update header state based on scroll
     */
    function updateHeader() {
        if (!header) return;

        const scrollY = VP.Utils.getScrollPosition().y;
        const scrollDelta = scrollY - lastScrollY;

        // Point 212: Add is-scrolled class after threshold
        if (scrollY > SCROLL_THRESHOLD) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }

        // Point 213: Hide on scroll down, show on scroll up
        if (scrollY > SCROLL_THRESHOLD) {
            if (scrollDelta > HIDE_THRESHOLD) {
                // Scrolling down
                header.classList.add('is-hidden');
            } else if (scrollDelta < -HIDE_THRESHOLD) {
                // Scrolling up
                header.classList.remove('is-hidden');
            }
        } else {
            header.classList.remove('is-hidden');
        }

        lastScrollY = scrollY;
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        const backToTop = document.querySelector(VP.SELECTORS.backToTop);
        if (!backToTop) return;

        // Show/hide based on scroll
        window.addEventListener('scroll', VP.Utils.throttle(() => {
            if (VP.Utils.getScrollPosition().y > 300) {
                backToTop.hidden = false;
            } else {
                backToTop.hidden = true;
            }
        }, 100), { passive: true });

        // Click handler
        backToTop.addEventListener('click', () => {
            scrollToTop();
        });
    }

    /**
     * Point 214-215: Scroll to top with smooth scroll
     */
    function scrollToTop() {
        // Point 215: Respect prefers-reduced-motion
        const behavior = VP.Utils.prefersReducedMotion() ? 'auto' : 'smooth';
        window.scrollTo({
            top: 0,
            behavior: behavior
        });
    }

    /**
     * Initialize smooth scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const href = anchor.getAttribute('href');
                if (href === '#') return;

                const target = document.querySelector(href);
                if (!target) return;

                e.preventDefault();
                scrollToElement(target);
            });
        });
    }

    /**
     * Scroll to specific element
     *
     * @param {HTMLElement} element - Target element
     * @param {number} offset - Additional offset
     */
    function scrollToElement(element, offset = 0) {
        const headerHeight = header ? header.offsetHeight : 0;
        const elementPosition = element.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerHeight - offset;

        // Point 215: Respect prefers-reduced-motion
        const behavior = VP.Utils.prefersReducedMotion() ? 'auto' : 'smooth';

        window.scrollTo({
            top: offsetPosition,
            behavior: behavior
        });

        // Update URL hash without scrolling
        history.pushState(null, '', `#${element.id}`);
    }

    // Public API
    return {
        init,
        scrollToTop,
        scrollToElement
    };
})();

/* ═══════════════════════════════════════════════════════════════
   Point 202: ANIMATIONS MODULE
   Points 216-218: GSAP Integration Preparation
   ═══════════════════════════════════════════════════════════════ */

VP.Animations = (function() {
    'use strict';

    // Point 218: Animation configuration
    const CONFIG = {
        duration: 0.8,
        stagger: 0.1,
        ease: 'power2.out',
        y: 30,
        scale: 0.95,
        opacity: 0
    };

    /**
     * Initialize animations
     */
    function init() {
        // Point 200: Check reduced motion preference first
        if (VP.Utils.prefersReducedMotion()) {
            // Show all animated elements immediately
            document.querySelectorAll(VP.SELECTORS.animate).forEach(el => {
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
            return;
        }

        // Point 217: Check if GSAP is available
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            initGSAPAnimations();
        } else {
            // Fallback to CSS animations
            initCSSAnimations();
        }
    }

    /**
     * Point 216: Initialize GSAP animations
     */
    function initGSAPAnimations() {
        gsap.registerPlugin(ScrollTrigger);

        // Set defaults
        gsap.defaults({
            duration: CONFIG.duration,
            ease: CONFIG.ease
        });

        // Animate elements with data-animate attribute
        document.querySelectorAll(VP.SELECTORS.animate).forEach(el => {
            const animationType = el.dataset.animate || 'fade-up';
            const delay = parseFloat(el.dataset.delay) || 0;

            let fromVars = { opacity: 0 };

            switch (animationType) {
                case 'fade-up':
                    fromVars.y = CONFIG.y;
                    break;
                case 'fade-down':
                    fromVars.y = -CONFIG.y;
                    break;
                case 'fade-left':
                    fromVars.x = CONFIG.y;
                    break;
                case 'fade-right':
                    fromVars.x = -CONFIG.y;
                    break;
                case 'scale':
                    fromVars.scale = CONFIG.scale;
                    break;
                case 'fade':
                default:
                    break;
            }

            gsap.from(el, {
                ...fromVars,
                delay: delay,
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    end: 'bottom 15%',
                    toggleActions: 'play none none none'
                }
            });
        });

        // Stagger animations for grids
        document.querySelectorAll('[data-animate-stagger]').forEach(container => {
            const children = container.children;
            const staggerDelay = parseFloat(container.dataset.animateStagger) || CONFIG.stagger;

            gsap.from(children, {
                opacity: 0,
                y: CONFIG.y,
                stagger: staggerDelay,
                scrollTrigger: {
                    trigger: container,
                    start: 'top 85%'
                }
            });
        });
    }

    /**
     * Fallback CSS animations using Intersection Observer
     */
    function initCSSAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        document.querySelectorAll(VP.SELECTORS.animate).forEach(el => {
            observer.observe(el);
        });
    }

    /**
     * Animate counter (for stats)
     *
     * @param {HTMLElement} el - Counter element
     * @param {number} target - Target number
     * @param {number} duration - Animation duration in ms
     */
    function animateCounter(el, target, duration = 2000) {
        if (VP.Utils.prefersReducedMotion()) {
            el.textContent = VP.Utils.formatNumber(target);
            return;
        }

        const start = 0;
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Ease out cubic
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            const current = Math.round(start + (target - start) * easeProgress);

            el.textContent = VP.Utils.formatNumber(current);

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }

    // Public API
    return {
        init,
        animateCounter,
        config: CONFIG
    };
})();

/* ═══════════════════════════════════════════════════════════════
   FAQ ACCORDION MODULE
   ═══════════════════════════════════════════════════════════════ */

VP.FAQ = (function() {
    'use strict';

    /**
     * Initialize FAQ accordion
     */
    function init() {
        const questions = document.querySelectorAll(VP.SELECTORS.faqQuestion);

        questions.forEach(question => {
            question.addEventListener('click', () => toggleAnswer(question));

            // Keyboard support
            question.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleAnswer(question);
                }
            });
        });
    }

    /**
     * Toggle FAQ answer
     *
     * @param {HTMLElement} question - Question button element
     */
    function toggleAnswer(question) {
        const item = question.closest(VP.SELECTORS.faqItem);
        const answer = item.querySelector('.faq__answer');
        const isExpanded = question.getAttribute('aria-expanded') === 'true';

        // Close other items (optional - for single open mode)
        // closeAllExcept(item);

        // Toggle current item
        question.setAttribute('aria-expanded', !isExpanded);
        answer.hidden = isExpanded;

        if (!isExpanded) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
        } else {
            answer.style.maxHeight = '0';
        }
    }

    /**
     * Close all FAQ items except specified one
     *
     * @param {HTMLElement} except - Item to keep open
     */
    function closeAllExcept(except) {
        const items = document.querySelectorAll(VP.SELECTORS.faqItem);

        items.forEach(item => {
            if (item !== except) {
                const question = item.querySelector(VP.SELECTORS.faqQuestion);
                const answer = item.querySelector('.faq__answer');

                question.setAttribute('aria-expanded', 'false');
                answer.hidden = true;
                answer.style.maxHeight = '0';
            }
        });
    }

    // Public API
    return {
        init,
        toggleAnswer
    };
})();

/* ═══════════════════════════════════════════════════════════════
   LAZY LOADING MODULE
   ═══════════════════════════════════════════════════════════════ */

VP.LazyLoad = (function() {
    'use strict';

    /**
     * Initialize lazy loading
     */
    function init() {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        loadImage(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '50px 0px'
            });

            document.querySelectorAll(VP.SELECTORS.lazyImage).forEach(img => {
                observer.observe(img);
            });
        } else {
            // Fallback for older browsers
            document.querySelectorAll(VP.SELECTORS.lazyImage).forEach(loadImage);
        }
    }

    /**
     * Load image
     *
     * @param {HTMLImageElement} img - Image element
     */
    function loadImage(img) {
        const src = img.dataset.src;
        const srcset = img.dataset.srcset;

        if (src) {
            img.src = src;
            img.removeAttribute('data-src');
        }

        if (srcset) {
            img.srcset = srcset;
            img.removeAttribute('data-srcset');
        }

        img.classList.add('is-loaded');
    }

    // Public API
    return {
        init,
        loadImage
    };
})();

/* ═══════════════════════════════════════════════════════════════
   MOBILE VIEWPORT HEIGHT FIX
   ═══════════════════════════════════════════════════════════════ */

VP.ViewportFix = (function() {
    'use strict';

    function init() {
        setVH();
        window.addEventListener('resize', VP.Utils.debounce(setVH, 100));
    }

    function setVH() {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }

    return { init };
})();

/* ═══════════════════════════════════════════════════════════════
   INITIALIZATION
   ═══════════════════════════════════════════════════════════════ */

VP.init = function() {
    'use strict';

    // Point 204: Wrap initialization in error boundary
    VP.Utils.safeExecute(() => {
        VP.Navigation.init();
    });

    VP.Utils.safeExecute(() => {
        VP.Forms.init();
    });

    VP.Utils.safeExecute(() => {
        VP.Scroll.init();
    });

    VP.Utils.safeExecute(() => {
        VP.Animations.init();
    });

    VP.Utils.safeExecute(() => {
        VP.FAQ.init();
    });

    VP.Utils.safeExecute(() => {
        VP.LazyLoad.init();
    });

    VP.Utils.safeExecute(() => {
        VP.ViewportFix.init();
    });
};

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', VP.init);
} else {
    VP.init();
}

// Export namespace
window.VP = VP;
