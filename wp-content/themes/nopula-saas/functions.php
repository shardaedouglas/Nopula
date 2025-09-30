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
    
    // Add smooth scrolling for anchor links
    wp_add_inline_script('nopula-saas-script', '
        document.addEventListener("DOMContentLoaded", function() {
            // Smooth scrolling for anchor links
            document.querySelectorAll("a[href^=\'#\']").forEach(function(anchor) {
                anchor.addEventListener("click", function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute("href"));
                    if (target) {
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    }
                });
            });
            
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
                    
                    // Update active button
                    document.querySelectorAll(".category-btn").forEach(function(b) {
                        b.classList.remove("active");
                    });
                    this.classList.add("active");
                    
                    // Filter posts
                    posts.forEach(function(post) {
                        if (category === "all" || post.getAttribute("data-category") === category) {
                            post.style.display = "block";
                            post.style.animation = "fadeInUp 0.6s ease-out";
                        } else {
                            post.style.display = "none";
                        }
                    });
                });
            });
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
    echo '<li><a href="#services">Services</a></li>';
    echo '<li><a href="#testimonials">Testimonials</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">Blog</a></li>';
    echo '<li><a href="#contact">Contact</a></li>';
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
