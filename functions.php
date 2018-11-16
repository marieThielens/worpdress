<?php

// lien vers le css
function theme_scripts(){
    wp_enqueue_style('theme-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', "theme_scripts");


// Associer les scripts de bootstrap qui se trouve dans le dossier bootstrap
// css bootstrap
function site_bootstrap_style(){
    // nom feuille de style. Chemin vers dossier
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css'); 
    $dependencies = array('bootstrap');
    wp_enqueue_style('bootstrap-style', get_stylesheet_uri(), $dependencies);
}
add_action('wp_enqueue_scripts', 'site_bootstrap_style');

// Bootstrap sa bibliotheque javascript
function site_bootstrap_script(){
    $dependencies = array('query');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.7', true);
}
add_action('wp_enqueue_scripts', 'site_bootstrap_script');

// le title du site
function site_title(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'site_title');

// La nav
function site_nav(){
    register_nav_menu('menu-principal', _('Menu Principal'));
}
add_action('init', 'site_nav');

// Les widgets
function widget_initialiser(){
    // register_sidebar : permet de définir une nouvelle zone de widgets
    register_sidebar(array(
        'name' => 'Pied de page',
        'id' => 'footer_texte',
        'before_widget' => '<div class="footer_texte">',
        'after_widget' => '</div>',
        'before_title' => '<h4>', 
        'after_title' => '</h4>',
    ));
    register_sidebar( array(
        'name' => 'colonne latérale',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="sidebar-module sidebar-module-inset">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
}
add_action('widgets_init', 'widget_initialiser');


?>