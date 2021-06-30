<?php

function mytheme_supports () {
    add_theme_support('title-tag');

};

// mettre le nom dans l'onglet du navigateur
add_action('after_setup_theme', 'mytheme_supports'); 