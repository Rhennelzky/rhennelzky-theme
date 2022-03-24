<?php

require_once ('theme_options.php');
require_once ('create_menu.php');
require_once ('customizer.php');
require_once ('register_portfolio.php');
require_once ('register_blog.php');
require_once ('class-tgm-plugin-activation.php');
require_once ('install_plugins.php');

function rhennelzky_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.css');
	wp_enqueue_style('converging', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('readmore', get_template_directory_uri() . '/js/readmore.js', array('jquery'), false, true);
    wp_enqueue_script('play_about_us', get_template_directory_uri() . '/js/play_about_us.js', array('jquery'), false, true);
    wp_enqueue_script('myjs', get_template_directory_uri() . '/js/myjs.js', array('jquery'), false, true);
    wp_enqueue_script('visible', get_template_directory_uri() . '/js/jquery.visible.js', array('jquery'), false, 
        true);
     
    wp_enqueue_script('effects-slide', get_template_directory_uri() . '/js/effects-slide.js', array('jquery-effects-core', 'jquery-effects-slide'), false, true);

     wp_enqueue_script('effect-jump', get_template_directory_uri() . '/js/effect-jump.js', array('jquery-effects-core', 'jquery-effects-bounce'), false, true);
    
   
    wp_enqueue_style( 'dashicons', '/wp-includes/css/dashicons.min.css');

    wp_deregister_script('jquery'); 

    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, true);
    wp_enqueue_script('jquery');

    wp_enqueue_script('themecustomizer', get_stylesheet_directory_uri().'/js/theme_customizer.js', array( 'jquery','customize-preview' ), false, true);

    if (  is_page(292) ) {

        wp_enqueue_script('svgDraw', get_template_directory_uri() . '/js/svgDraw.js', array('jquery'), false, true);

    }


}

add_action( 'wp_enqueue_scripts', 'rhennelzky_scripts' );

add_theme_support( 'post-thumbnails' );

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'sidebar',
    'before_widget' => '<div class = "sidebar" style="color:white;">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


?>