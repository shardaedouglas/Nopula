<?php
/**
 * The template for displaying all single posts
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="post-header" style="padding: var(--spacing-4xl) 0 var(--spacing-2xl); text-align: center;">
            <h1><?php the_title(); ?></h1>
            <div class="post-meta" style="color: var(--gray-500); margin-top: var(--spacing-md);">
                <span><?php echo get_the_date(); ?></span>
                <?php if (get_the_author()) : ?>
                    <span> • </span>
                    <span>By <?php the_author(); ?></span>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="post-content" style="max-width: 800px; margin: 0 auto;">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail" style="margin-bottom: var(--spacing-xl);">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nopula-saas'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
