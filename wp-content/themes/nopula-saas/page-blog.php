<?php
/**
 * Blog Page Template
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="blog-hero-content">
                <h1 class="fade-in-up">Nopula Tech Blog</h1>
                <p class="fade-in-up">Insights, trends, and expertise in software development, technology, and business innovation.</p>
            </div>
        </div>
    </section>

    <!-- Blog Categories -->
    <section class="blog-categories">
        <div class="container">
            <div class="category-filters">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="software-development">Software Development</button>
                <button class="category-btn" data-category="technology">Technology</button>
                <button class="category-btn" data-category="business">Business</button>
                <button class="category-btn" data-category="ai-ml">AI & ML</button>
                <button class="category-btn" data-category="case-studies">Case Studies</button>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="blog-posts">
        <div class="container">
            <div class="blog-grid" id="blog-grid">
                <?php
                // Query for blog posts
                $blog_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($blog_posts->have_posts()) :
                    $post_count = 0;
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        $post_count++;
                        $is_featured = ($post_count === 1);
                        
                        // Get post categories
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? $categories[0]->name : 'General';
                        
                        // Calculate reading time (rough estimate)
                        $word_count = str_word_count(strip_tags(get_the_content()));
                        $reading_time = max(1, round($word_count / 200)); // 200 words per minute
                        ?>
                        
                        <article class="blog-post <?php echo $is_featured ? 'featured-post' : ''; ?> fade-in-up" data-category="<?php echo strtolower(str_replace(' ', '-', $category_name)); ?>">
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
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php echo $is_featured ? 'Read Full Article' : 'Read More'; ?></a>
                            </div>
                        </article>
                        
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback content if no posts are found
                    ?>
                    <div class="no-posts">
                        <p>No blog posts found. Please check back later!</p>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <!-- Load More Button -->
            <div class="text-center" style="margin-top: var(--spacing-4xl);" id="load-more-container">
                <?php if ($blog_posts->max_num_pages > 1) : ?>
                    <button class="btn btn-primary btn-lg" id="load-more-btn" data-page="1" data-max-pages="<?php echo $blog_posts->max_num_pages; ?>">
                        <span class="btn-text">Load More Articles</span>
                        <span class="btn-loading" style="display: none;">Loading...</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="newsletter-signup">
        <div class="container">
            <div class="newsletter-form">
                <h3>Stay Updated with Latest Tech Insights</h3>
                <p>Get our weekly newsletter with the latest trends in software development and technology.</p>
                <form>
                    <div class="email-input">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>