<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' )): ?>
    <header id="masthead" class="site-header fixed-top navbar-custom <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
            <?php if ( is_admin_bar_showing() ) { ?>
                <style>
                    #masthead {
                        top: 32px;
                    }
                </style>
            <?php } ?>
        <div class="container">
            <nav class="navbar navbar-expand-xl">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-height">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location'    => !is_user_logged_in() ? 'primary' : 'secondary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
    </header><!-- #masthead -->

    <?php if(is_front_page()) : ?>
        <div id="content" class="site-content-fluid">
            <div class="container-fluid">

    <?php elseif(is_shop()) : ?>
        <div id="content" class="site-content">
            <div class="container-fluid p-0">
                <?php echo do_shortcode('[metaslider id="297"]'); ?>
            </div>
        </div>
        <div id="content" class="site-content-fluid">
		    <div class="container">
    <?php else : ?>
        <div id="content" class="site-content">
            <div class="container">
    <?php endif; ?>
    <?php endif; ?>
                <div class="row">