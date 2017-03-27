<?php
/**
 * Template Name: Blogs Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sparkle_Store
 */
get_header(); ?>

<?php do_action('sparklestore-breadcrumbs'); ?>

<div class="inner_page">

    <div class="container">

        <div class="row">

            <div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array('post_type' => 'post', 'paged' => $paged);
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :

                        /* Start the Loop */
                        while ($query->have_posts()) : $query->the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        endwhile;

                        if (function_exists("sparklestore_pagination")):
                            sparklestore_pagination($query->max_num_pages);
                        endif;

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </main>
            </div>

            <?php get_sidebar(); ?>

        </div>

    </div>

</div>

<?php get_footer();
