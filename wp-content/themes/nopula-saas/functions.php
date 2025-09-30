<?php
/**
 * Nopula SaaS Theme Functions
 *
 * @package Nopula_SaaS
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function nopula_saas_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nopula-saas'),
        'footer'  => __('Footer Menu', 'nopula-saas'),
    ));
}
add_action('after_setup_theme', 'nopula_saas_setup');

/**
 * Enqueue scripts and styles
 */
function nopula_saas_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('nopula-saas-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('nopula-saas-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    
    // Add blog category filtering and header scroll effects
    wp_add_inline_script('nopula-saas-script', '
        document.addEventListener("DOMContentLoaded", function() {
            // Add scroll effect to header
            window.addEventListener("scroll", function() {
                const header = document.querySelector(".site-header");
                const rootStyles = getComputedStyle(document.documentElement);
                const bgPrimary = rootStyles.getPropertyValue("--bg-primary").trim();
                
                if (window.scrollY > 100) {
                    header.style.background = bgPrimary;
                    header.style.backgroundImage = 
                        "radial-gradient(circle at 20% 80%, rgba(0, 255, 255, 0.1) 0%, transparent 50%), " +
                        "radial-gradient(circle at 80% 20%, rgba(255, 0, 255, 0.1) 0%, transparent 50%), " +
                        "radial-gradient(circle at 40% 40%, rgba(0, 255, 0, 0.05) 0%, transparent 50%)";
                    header.style.backdropFilter = "blur(10px)";
                } else {
                    header.style.background = bgPrimary;
                    header.style.backgroundImage = 
                        "radial-gradient(circle at 20% 80%, rgba(0, 255, 255, 0.1) 0%, transparent 50%), " +
                        "radial-gradient(circle at 80% 20%, rgba(255, 0, 255, 0.1) 0%, transparent 50%), " +
                        "radial-gradient(circle at 40% 40%, rgba(0, 255, 0, 0.05) 0%, transparent 50%)";
                    header.style.backdropFilter = "blur(10px)";
                }
            });
            
            // Blog category filtering
            document.querySelectorAll(".category-btn").forEach(function(btn) {
                btn.addEventListener("click", function() {
                    const category = this.getAttribute("data-category");
                    const posts = document.querySelectorAll(".blog-post");
                    const loadMoreBtn = document.getElementById("load-more-btn");
                    const loadMoreContainer = document.getElementById("load-more-container");
                    
                    // Update active button
                    document.querySelectorAll(".category-btn").forEach(function(b) {
                        b.classList.remove("active");
                    });
                    this.classList.add("active");
                    
                    // Filter posts with animation
                    posts.forEach(function(post, index) {
                        const postCategory = post.getAttribute("data-category");
                        const shouldShow = category === "all" || postCategory === category;
                        
                        if (shouldShow) {
                            // Show post with animation
                            post.style.display = "block";
                            post.style.opacity = "0";
                            post.style.transform = "translateY(20px)";
                            post.style.transition = "opacity 0.3s ease, transform 0.3s ease";
                            
                            setTimeout(function() {
                                post.style.opacity = "1";
                                post.style.transform = "translateY(0)";
                            }, index * 50);
                        } else {
                            // Hide post with animation
                            post.style.opacity = "0";
                            post.style.transform = "translateY(-20px)";
                            post.style.transition = "opacity 0.3s ease, transform 0.3s ease";
                            
                            setTimeout(function() {
                                post.style.display = "none";
                            }, 300);
                        }
                    });
                    
                    // Show/hide load more button based on visible posts
                    setTimeout(function() {
                        const visiblePosts = document.querySelectorAll(".blog-post[style*=\"display: block\"], .blog-post:not([style*=\"display: none\"])");
                        if (visiblePosts.length <= 6 && category !== "all") {
                            if (loadMoreContainer) {
                                loadMoreContainer.style.display = "none";
                            }
                        } else {
                            if (loadMoreContainer) {
                                loadMoreContainer.style.display = "block";
                            }
                        }
                    }, 500);
                });
            });
            
            // Dot Navigator functionality
            const dotNavigator = document.getElementById("dot-navigator");
            const dotNavItems = document.querySelectorAll(".dot-nav-item");
            const sections = document.querySelectorAll("section[id]");
            
            if (dotNavigator && dotNavItems.length > 0) {
                // Smooth scrolling for dot navigation
                dotNavItems.forEach(function(item) {
                    item.addEventListener("click", function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute("href").substring(1);
                        const targetSection = document.getElementById(targetId);
                        
                        if (targetSection) {
                            const headerHeight = document.querySelector(".site-header").offsetHeight;
                            const targetPosition = targetSection.offsetTop - headerHeight - 20;
                            
                            window.scrollTo({
                                top: targetPosition,
                                behavior: "smooth"
                            });
                        }
                    });
                });
                
                // Update active dot based on scroll position
                function updateActiveDot() {
                    let current = "";
                    const headerHeight = document.querySelector(".site-header").offsetHeight;
                    
                    sections.forEach(function(section) {
                        const sectionTop = section.offsetTop - headerHeight - 100;
                        const sectionHeight = section.offsetHeight;
                        
                        if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                            current = section.getAttribute("id");
                        }
                    });
                    
                    dotNavItems.forEach(function(item) {
                        item.classList.remove("active");
                        if (item.getAttribute("data-section") === current) {
                            item.classList.add("active");
                        }
                    });
                }
                
                // Throttle scroll events for better performance
                let scrollTimeout;
                window.addEventListener("scroll", function() {
                    if (scrollTimeout) {
                        clearTimeout(scrollTimeout);
                    }
                    scrollTimeout = setTimeout(updateActiveDot, 10);
                });
                
                // Initial call to set active dot
                updateActiveDot();
            }
            
            // Load More Posts functionality
            const loadMoreBtn = document.getElementById("load-more-btn");
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener("click", function() {
                    const currentPage = parseInt(this.getAttribute("data-page"));
                    const maxPages = parseInt(this.getAttribute("data-max-pages"));
                    const blogGrid = document.getElementById("blog-grid");
                    const btnText = this.querySelector(".btn-text");
                    const btnLoading = this.querySelector(".btn-loading");
                    
                    // Get current active filter
                    const activeFilter = document.querySelector(".category-btn.active");
                    const currentCategory = activeFilter ? activeFilter.getAttribute("data-category") : "all";
                    
                    // Show loading state
                    btnText.style.display = "none";
                    btnLoading.style.display = "inline";
                    this.disabled = true;
                    
                    // Make AJAX request
                    const formData = new FormData();
                    formData.append("action", "load_more_posts");
                    formData.append("page", currentPage + 1);
                    formData.append("category", currentCategory);
                    formData.append("nonce", "' . wp_create_nonce('load_more_posts') . '");
                    
                    fetch("' . admin_url('admin-ajax.php') . '", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Add new posts to grid
                            blogGrid.insertAdjacentHTML("beforeend", data.data.html);
                            
                            // Update page number
                            this.setAttribute("data-page", currentPage + 1);
                            
                            // Hide button if no more posts
                            if (!data.data.has_more || currentPage + 1 >= maxPages) {
                                this.style.display = "none";
                            }
                            
                            // Animate new posts
                            const newPosts = blogGrid.querySelectorAll(".blog-post:not(.animated)");
                            newPosts.forEach(function(post, index) {
                                setTimeout(function() {
                                    post.style.opacity = "0";
                                    post.style.transform = "translateY(30px)";
                                    post.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                                    post.classList.add("animated");
                                    
                                    setTimeout(function() {
                                        post.style.opacity = "1";
                                        post.style.transform = "translateY(0)";
                                    }, 100);
                                }, index * 100);
                            });
                        } else {
                            console.error("Error loading more posts:", data.data);
                            alert("Error loading more posts. Please try again.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Error loading more posts. Please try again.");
                    })
                    .finally(function() {
                        // Reset button state
                        btnText.style.display = "inline";
                        btnLoading.style.display = "none";
                        loadMoreBtn.disabled = false;
                    });
                });
            }
            
            // Get Started Modal functionality
            const getStartedBtn = document.getElementById("get-started-btn");
            const modal = document.getElementById("get-started-modal");
            const modalClose = document.getElementById("modal-close");
            const contactForm = document.getElementById("get-started-form");
            
            if (getStartedBtn && modal) {
                // Open modal
                getStartedBtn.addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.classList.add("active");
                    document.body.style.overflow = "hidden";
                    
                    // Focus first input
                    const firstInput = modal.querySelector("input[required]");
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 300);
                    }
                });
                
                // Close modal
                function closeModal() {
                    modal.classList.remove("active");
                    document.body.style.overflow = "";
                    contactForm.reset();
                }
                
                modalClose.addEventListener("click", closeModal);
                
                // Close on overlay click
                modal.addEventListener("click", function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
                
                // Close on Escape key
                document.addEventListener("keydown", function(e) {
                    if (e.key === "Escape" && modal.classList.contains("active")) {
                        closeModal();
                    }
                });
                
                // Form submission
                if (contactForm) {
                    contactForm.addEventListener("submit", function(e) {
                        e.preventDefault();
                        
                        const submitBtn = this.querySelector("button[type=\"submit\"]");
                        const btnText = submitBtn.querySelector(".btn-text");
                        const btnLoading = submitBtn.querySelector(".btn-loading");
                        
                        // Show loading state
                        btnText.style.display = "none";
                        btnLoading.style.display = "flex";
                        submitBtn.disabled = true;
                        
                        // Get form data
                        const formData = new FormData(this);
                        formData.append("action", "submit_contact_form");
                        formData.append("nonce", "' . wp_create_nonce('contact_form_nonce') . '");
                        
                        // Submit form via AJAX
                        fetch("' . admin_url('admin-ajax.php') . '", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                showNotification("Thank you! We\'ll be in touch soon.", "success");
                                closeModal();
                            } else {
                                // Show error message
                                showNotification(data.data || "Something went wrong. Please try again.", "error");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            showNotification("Network error. Please try again.", "error");
                        })
                        .finally(function() {
                            // Reset button state
                            btnText.style.display = "inline";
                            btnLoading.style.display = "none";
                            submitBtn.disabled = false;
                        });
                    });
                }
            }
            
            // Notification system
            function showNotification(message, type) {
                const notification = document.createElement("div");
                notification.className = "notification notification-" + type;
                notification.innerHTML = `
                    <div class="notification-content">
                        <span class="notification-icon">${type === "success" ? "✓" : "⚠"}</span>
                        <span class="notification-message">${message}</span>
                    </div>
                `;
                
                document.body.appendChild(notification);
                
                // Show notification
                setTimeout(() => notification.classList.add("show"), 100);
                
                // Hide notification
                setTimeout(() => {
                    notification.classList.remove("show");
                    setTimeout(() => notification.remove(), 300);
                }, 4000);
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'nopula_saas_scripts');

/**
 * Fallback menu for primary navigation
 */
function nopula_saas_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="' . esc_url(home_url('/services')) . '" class="dropdown-toggle">Services <span class="dropdown-arrow">▼</span></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="' . esc_url(home_url('/services')) . '">All Services</a></li>';
    echo '<li><a href="' . esc_url(home_url('/web-development')) . '">Web Development</a></li>';
    echo '<li><a href="' . esc_url(home_url('/enterprise-software')) . '">Enterprise Software</a></li>';
    echo '<li><a href="' . esc_url(home_url('/ecommerce-solutions')) . '">E-commerce Solutions</a></li>';
    echo '<li><a href="' . esc_url(home_url('/ai-machine-learning')) . '">AI & Machine Learning</a></li>';
    echo '<li><a href="' . esc_url(home_url('/cloud-applications')) . '">Cloud Applications</a></li>';
    echo '<li><a href="' . esc_url(home_url('/mobile-development')) . '">Mobile Development</a></li>';
    echo '<li><a href="' . esc_url(home_url('/system-integration')) . '">System Integration</a></li>';
    echo '<li><a href="' . esc_url(home_url('/data-analytics')) . '">Data Analytics</a></li>';
    echo '<li><a href="' . esc_url(home_url('/it-solutions')) . '">IT Solutions</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">Blog</a></li>';
    echo '</ul>';
}

/**
 * Customizer additions
 */
function nopula_saas_customize_register($wp_customize) {
    // Add Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'nopula-saas'),
        'priority' => 30,
    ));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Custom Software Solutions for Every Business',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'nopula-saas'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'From startups to enterprise corporations, we build tailored software solutions that drive your business forward. Expert development in C#, JavaScript, Python, and more.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'nopula-saas'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));
    
    // Add Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact Information', 'nopula-saas'),
        'priority' => 35,
    ));
    
    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'hello@nopula.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Contact Email', 'nopula-saas'),
        'section' => 'contact_section',
        'type'    => 'email',
    ));
    
    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Contact Phone', 'nopula-saas'),
        'section' => 'contact_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'nopula_saas_customize_register');

/**
 * Add custom body classes
 */
function nopula_saas_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'nopula_saas_body_classes');

/**
 * Custom excerpt length
 */
function nopula_saas_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'nopula_saas_excerpt_length');

/**
 * Custom excerpt more
 */
function nopula_saas_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nopula_saas_excerpt_more');

/**
 * AJAX handler for loading more blog posts
 */
function nopula_saas_load_more_posts() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'load_more_posts')) {
        wp_die('Security check failed');
    }
    
    $page = intval($_POST['page']);
    $posts_per_page = 6;
    $category = sanitize_text_field($_POST['category']);
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $page
    );
    
    // Add category filter if not "all"
    if ($category && $category !== 'all') {
        $category_slug = sanitize_title($category);
        $args['category_name'] = $category_slug;
    }
    
    $blog_posts = new WP_Query($args);
    
    if ($blog_posts->have_posts()) {
        ob_start();
        
        while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
            
            // Get post categories
            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : 'General';
            
            // Calculate reading time
            $word_count = str_word_count(strip_tags(get_the_content()));
            $reading_time = max(1, round($word_count / 200));
            ?>
            <article class="blog-post fade-in-up" data-category="<?php echo strtolower(str_replace(' ', '-', $category_name)); ?>">
                <div class="post-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    <?php else : ?>
                        <?php
                        // Category-based placeholder styling
                        $placeholder_styles = array(
                            'software-development' => 'background: linear-gradient(135deg, #00ffff 0%, #0080ff 50%, #8000ff 100%);',
                            'technology' => 'background: linear-gradient(135deg, #00ff00 0%, #00ffff 50%, #0080ff 100%);',
                            'business' => 'background: linear-gradient(135deg, #ff8000 0%, #ff0080 50%, #8000ff 100%);',
                            'ai-ml' => 'background: linear-gradient(135deg, #00ffff 0%, #ff00ff 50%, #ffff00 100%);',
                            'case-studies' => 'background: linear-gradient(135deg, #8000ff 0%, #ff8000 50%, #00ffff 100%);'
                        );
                        $category_slug = strtolower(str_replace(' ', '-', $category_name));
                        $placeholder_style = isset($placeholder_styles[$category_slug]) ? $placeholder_styles[$category_slug] : $placeholder_styles['technology'];
                        ?>
                        <div class="post-image-placeholder" style="<?php echo $placeholder_style; ?>">
                            <div class="placeholder-icon">
                                <?php
                                // Category-based icons
                                $icon_map = array(
                                    'software-development' => '<svg viewBox="0 0 24 24" width="48" height="48"><path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" fill="currentColor"/></svg>',
                                    'technology' => '<svg viewBox="0 0 24 24" width="48" height="48"><path d="M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z" fill="currentColor"/></svg>',
                                    'business' => '<svg viewBox="0 0 24 24" width="48" height="48"><path d="M19,7H18V6A2,2 0 0,0 16,4H8A2,2 0 0,0 6,6V7H5A1,1 0 0,0 4,8V19A3,3 0 0,0 7,22H17A3,3 0 0,0 20,19V8A1,1 0 0,0 19,7M8,6H16V7H8V6M18,19A1,1 0 0,1 17,20H7A1,1 0 0,1 6,19V9H18V19Z" fill="currentColor"/></svg>',
                                    'ai-ml' => '<svg viewBox="0 0 24 24" width="48" height="48"><path d="M12,2A2,2 0 0,1 14,4C14,4.74 13.6,5.39 13,5.73V7H14A7,7 0 0,1 21,14H22A1,1 0 0,1 23,15V18A1,1 0 0,1 22,19H21V20A2,2 0 0,1 19,22H5A2,2 0 0,1 3,20V19H2A1,1 0 0,1 1,18V15A1,1 0 0,1 2,14H3A7,7 0 0,1 10,7H11V5.73C10.4,5.39 10,4.74 10,4A2,2 0 0,1 12,2M7.5,13A2.5,2.5 0 0,0 5,15.5A2.5,2.5 0 0,0 7.5,18A2.5,2.5 0 0,0 10,15.5A2.5,2.5 0 0,0 7.5,13M16.5,13A2.5,2.5 0 0,0 14,15.5A2.5,2.5 0 0,0 16.5,18A2.5,2.5 0 0,0 19,15.5A2.5,2.5 0 0,0 16.5,13Z" fill="currentColor"/></svg>',
                                    'case-studies' => '<svg viewBox="0 0 24 24" width="48" height="48"><path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" fill="currentColor"/></svg>'
                                );
                                echo isset($icon_map[$category_slug]) ? $icon_map[$category_slug] : $icon_map['technology'];
                                ?>
                            </div>
                            <div class="placeholder-text"><?php echo strtoupper($category_name); ?></div>
                        </div>
                    <?php endif; ?>
                    <div class="post-category"><?php echo esc_html($category_name); ?></div>
                </div>
                <div class="post-content">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date('M j, Y'); ?></span>
                        <span class="read-time"><?php echo $reading_time; ?> min read</span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </div>
            </article>
            <?php
        }
        wp_reset_postdata();
        
        $html = ob_get_clean();
        
        // Send response
        wp_send_json_success(array(
            'html' => $html,
            'has_more' => $page < $blog_posts->max_num_pages
        ));
    } else {
        wp_send_json_error('No more posts found');
    }
}
add_action('wp_ajax_load_more_posts', 'nopula_saas_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'nopula_saas_load_more_posts');

/**
 * AJAX handler for contact form submissions
 */
function nopula_saas_handle_contact_form() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $full_name = sanitize_text_field($_POST['full_name']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $phone = sanitize_text_field($_POST['phone']);
    $project_type = sanitize_text_field($_POST['project_type']);
    $budget = sanitize_text_field($_POST['budget']);
    $timeline = sanitize_text_field($_POST['timeline']);
    $message = sanitize_textarea_field($_POST['message']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $privacy = isset($_POST['privacy']) ? 1 : 0;
    
    // Validate required fields
    if (empty($full_name) || empty($email) || empty($project_type) || empty($message) || !$privacy) {
        wp_send_json_error('Please fill in all required fields and accept the privacy policy.');
        return;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
        return;
    }
    
    // Prepare email content
    $to = get_option('admin_email');
    $subject = 'New Project Inquiry from ' . $full_name;
    
    $email_body = "New project inquiry received:\n\n";
    $email_body .= "Name: " . $full_name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Company: " . $company . "\n";
    $email_body .= "Phone: " . $phone . "\n";
    $email_body .= "Project Type: " . ucwords(str_replace('-', ' ', $project_type)) . "\n";
    $email_body .= "Budget: " . ucwords(str_replace('-', ' ', $budget)) . "\n";
    $email_body .= "Timeline: " . ucwords(str_replace('-', ' ', $timeline)) . "\n";
    $email_body .= "Newsletter Subscription: " . ($newsletter ? 'Yes' : 'No') . "\n\n";
    $email_body .= "Message:\n" . $message . "\n\n";
    $email_body .= "Submitted on: " . current_time('F j, Y \a\t g:i A') . "\n";
    $email_body .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    // Send email
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $full_name . ' <' . $email . '>'
    );
    
    $email_sent = wp_mail($to, $subject, $email_body, $headers);
    
    if ($email_sent) {
        // Store in database for future reference
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'contact_submissions';
        
        // Create table if it doesn't exist
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            full_name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            company varchar(100),
            phone varchar(20),
            project_type varchar(50) NOT NULL,
            budget varchar(50),
            timeline varchar(50),
            message text NOT NULL,
            newsletter tinyint(1) DEFAULT 0,
            privacy_accepted tinyint(1) DEFAULT 0,
            ip_address varchar(45),
            submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        
        // Insert submission
        $wpdb->insert(
            $table_name,
            array(
                'full_name' => $full_name,
                'email' => $email,
                'company' => $company,
                'phone' => $phone,
                'project_type' => $project_type,
                'budget' => $budget,
                'timeline' => $timeline,
                'message' => $message,
                'newsletter' => $newsletter,
                'privacy_accepted' => $privacy,
                'ip_address' => $_SERVER['REMOTE_ADDR']
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s')
        );
        
        wp_send_json_success('Thank you for your inquiry! We\'ll be in touch soon.');
    } else {
        wp_send_json_error('Failed to send message. Please try again or contact us directly.');
    }
}
add_action('wp_ajax_submit_contact_form', 'nopula_saas_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'nopula_saas_handle_contact_form');

/**
 * Add theme.json support for block themes
 */
function nopula_saas_theme_json() {
    $theme_json = array(
        'version' => 2,
        'settings' => array(
            'color' => array(
                'palette' => array(
                    array(
                        'slug'  => 'primary',
                        'color' => '#2563eb',
                        'name'  => 'Primary',
                    ),
                    array(
                        'slug'  => 'secondary',
                        'color' => '#64748b',
                        'name'  => 'Secondary',
                    ),
                    array(
                        'slug'  => 'accent',
                        'color' => '#f59e0b',
                        'name'  => 'Accent',
                    ),
                ),
            ),
            'typography' => array(
                'fontFamilies' => array(
                    array(
                        'fontFamily' => 'Inter, sans-serif',
                        'name'       => 'Inter',
                        'slug'       => 'inter',
                    ),
                ),
            ),
        ),
    );
    
    return $theme_json;
}

/**
 * Add admin styles
 */
function nopula_saas_admin_styles() {
    echo '<style>
        .wp-admin .wp-block-editor .editor-styles-wrapper {
            font-family: Inter, sans-serif;
        }
    </style>';
}
add_action('admin_head', 'nopula_saas_admin_styles');

/**
 * Remove unnecessary WordPress features for SaaS site
 */
function nopula_saas_cleanup() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Remove unnecessary meta tags
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'nopula_saas_cleanup');

/**
 * Add performance optimizations
 */
function nopula_saas_performance() {
    // Remove query strings from static resources
    if (!is_admin()) {
        add_filter('script_loader_src', 'nopula_saas_remove_query_strings', 15, 1);
        add_filter('style_loader_src', 'nopula_saas_remove_query_strings', 15, 1);
    }
}
add_action('init', 'nopula_saas_performance');

function nopula_saas_remove_query_strings($src) {
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
