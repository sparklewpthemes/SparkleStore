<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sparkle_Store
 */
get_header(); ?>
<div class="inner_page">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <section class="content-wrapper">
                        <div class="container">
                            <div class="std">
                                <div class="page-not-found">
                                    <h2><?php _e('404','sparklestore'); ?></h2>
                                    <h3><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/signal.png"><?php esc_html_e('Oops! The Page you requested was not found!', 'sparklestore'); ?></h3>
                                    <div><a href="<?php echo esc_url(home_url('/')); ?>" type="button" class="btn-home"><span><?php _e('Back To Home', 'sparklestore'); ?></span></a></div>
                                </div>
                            </div>
                        </div>
                    </section>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
</div>

<?php get_footer();
