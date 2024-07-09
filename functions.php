<?php

//echo get_stylesheet_uri();
//echo get_template_directory_uri();
//exit();

function mytropetheme_theme_setup() {

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('home-featured', 580, 300, array('center', 'center'));
    add_theme_support('automatic-feed-links');

    register_nav_menus( array(
        'primary' => ('Primary Menu'.'mytropetheme')

    ));
}
add_action('after_setup_theme', 'mytropetheme_theme_setup');


function mytropetheme_scripts_enqueue() {

    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('mytropetheme-browser', get_template_directory_uri(). '/assets/js/browser.min.js');
    wp_enqueue_script('mytropetheme-breakpoints', get_template_directory_uri(). '/assets/js/breakpoints.min.js');
    wp_enqueue_script('mytropetheme-util', get_template_directory_uri(). '/assets/js/util.js');
    wp_enqueue_script('mytropetheme-main', get_template_directory_uri(). '/assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'mytropetheme_scripts_enqueue');

/*function mytropetheme_widgets_init() {

    register_sidebar( array(
        'name' => __('Main Sidebar'.'mytropetheme'),
        'id'   => 'main-sidebar',
        'description' => __('Primary Right Sidebar', 'mytropetheme'),
        'before_widget' => '<aside id= "%1$" class = "widget %2$s" >,
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 1'.'mytropetheme'),
        'id' => 'footer-widget-1',
        'description' => 'Footer Widget 1',
        'before_widget' => '<section> id='%1$' class="widget %2$s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h2 class=widget-title">',
        'after_title' => '</h2></header>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2'.'mytropetheme'),
        'id' => 'footer-widget-2',
        'description' => 'Footer Widget 2',
        'before_widget' => '<section> id='%1$' class="widget %2$s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h2 class="widget-title">',
        'after_title' => '</h2></header>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3'.'mytropetheme'),
        'id' => 'footer-widget-3',
        'description' => __('Footer Widget 3', 'mytropetheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s" >',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
 }

add_action('widgets_init', 'mytropetheme_widgets_init');*/


function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
	register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => $beforeTitle,
		'after_title' => $afterTitle,
	));
}

function multiple_widget_init(){
	widget_registration('Footer widget 1', 'footer-sidebar-1', 'test', '', '', '', '');
	widget_registration('Footer widget 2', 'footer-sidebar-2', 'test', '', '', '', '');
    widget_registration('Footer widget 3', 'footer-sidebar-3', 'test', '', '', '', '');
	
}

add_action('widgets_init', 'multiple_widget_init');


