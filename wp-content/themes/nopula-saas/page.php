<?php
/**
 * The template for displaying all pages
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="page-header" style="padding: var(--spacing-4xl) 0 var(--spacing-2xl); text-align: center;">
            <h1><?php the_title(); ?></h1>
        </div>
        
        <div class="page-content" style="max-width: 800px; margin: 0 auto;">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
