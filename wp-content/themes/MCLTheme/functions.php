<?php

use Automattic\WooCommerce\Blocks\Domain\Bootstrap;

function monTheme_supports()
{
    add_theme_support('title-tag');
    // ajoute "image mise en avant" pour les articles
    add_theme_support('post-thumbnails');

    // register CSS style exp with Bootstrap

    function monTheme_register_assets()
    {
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], false, true);
        // wp_deregister_script('jquery');
        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrap');
    }
};

function monTheme_title_separator()
{
    return '|';
};

// mettre le nom dans l'onglet du navigateur
add_action('after_setup_theme', 'monTheme_supports');
add_action('wp_enqueue_scripts', 'monTheme_register_assets');
add_filter('document_title_separator', 'monTheme_title_separator');
