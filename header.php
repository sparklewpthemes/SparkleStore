<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sparkle_Store
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php sparklestore_html_tag_schema(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">

        <?php
            /**
             * @see  sparklestore_skip_links() - 5
             */
            do_action('sparklestore_header_before');

            /**
             * @see  sparklestore_top_header() - 15
             * @see  sparklestore_main_header() - 20
             */
            do_action('sparklestore_header');

            do_action('sparklestore_header_after');

        ?>
        
<nav class="main_menu_category_menu">
    <div class="container">

        <div class="category-menu-main">
            <div class="category-menu-title">
               <i class="fa fa-navicon"></i>
               <?php _e('All Categories', 'sparklestore'); ?>
            </div>
            <div class="menu-category">
                <?php wp_nav_menu(array('theme_location' => 'sparklecategory')); ?>
            </div>
        </div>

        <div class="main-menu">
            <div class="toggle-wrap">
                <div class="toggle">
                    <i class="fa fa-align-justify"></i>
                    <span class="label"><?php _e('Menu', 'sparklestore'); ?></span> 
                </div>
            </div>
            <div class="main-menu-links">
                <?php wp_nav_menu( array( 'theme_location' => 'sparkleprimary' ) ); ?>
            </div>
        </div>

    </div>
</nav>