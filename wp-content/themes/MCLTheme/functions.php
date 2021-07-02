<?php

use Automattic\WooCommerce\Blocks\Domain\Bootstrap;

function mytheme_supports () {
    add_theme_support('title-tag');

// register CSS style exp with Bootstrap

function mytheme_register_assets() {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css,' []);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], false, true);
    // wp_deregister_script('jquery');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');

}
};

// mettre le nom dans l'onglet du navigateur
add_action('after_setup_theme', 'mytheme_supports'); 
add_action('wp_enqueue_scripts', 'mytheme_register_assets');