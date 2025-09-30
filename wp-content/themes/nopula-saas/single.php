<?php
/**
 * Single Post Template
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- Post Header -->
            <header class="post-header">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                <?php endif; ?>
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>
                    <span class="post-author">By <?php the_author(); ?></span>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) :
                        ?>
                        <span class="post-category">
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        </span>
                        <?php
                    endif;
                    ?>
                </div>
                <h1 class="post-title"><?php the_title(); ?></h1>
                <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
            </header>

            <!-- Post Content -->
            <article class="post-content">
                <?php the_content(); ?>
            </article>

            <!-- Post Footer -->
            <footer class="post-footer">
                <div class="post-tags">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                        ?>
                        <h4>Tags:</h4>
                        <div class="tag-list">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag">
                                    <?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>

                <div class="post-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← Previous Post'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Next Post →'); ?>
                    </div>
                </div>
            </footer>

        <?php endwhile; ?>
    </div>

    <!-- Related Posts -->
    <section class="related-posts">
        <div class="container">
            <h3>Related Articles</h3>
            <div class="related-grid">
                <?php
                // Get related posts based on categories
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category_ids = array();
                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }
                    
                    $related_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'category__in' => $category_ids,
                        'orderby' => 'rand'
                    ));
                    
                    if ($related_posts->have_posts()) :
                        while ($related_posts->have_posts()) : $related_posts->the_post();
                            ?>
                            <article class="related-post">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                <div class="related-meta">
                                    <span><?php echo get_the_date('M j, Y'); ?></span>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>