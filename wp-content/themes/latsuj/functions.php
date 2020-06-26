<?php

add_theme_support( 'post-thumbnails' );

function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
function collectiveray_load_js_script() {
    if(is_singular()) wp_enqueue_script( 'js-file', get_template_directory_uri().'/js/latsuj.js');
}

add_action('wp_enqueue_scripts', 'collectiveray_load_js_script');
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
add_action('get_header', 'remove_admin_login_header');

function wrapping_content($content) {
    if(is_singular()) return '<div id="thecontent">'.$content.'</div>';
    return $content;
}

function wrapping_title($content) {
    if(is_singular()) return '<h1>'.$content.'</h1>';
    return $content;
}

function wrapping_excerpt($content) {
    if(is_singular()) return '<div id="theexcerpt">'.$content.'</div>';
    return $content;
}

function wrapping_category($content) {
    if(is_singular()) return '<div id="thecategory">'.$content.'</div>';
    return $content;
}

function wrapping_date($content) {
    if(is_singular()) return '<span id="thedate" class="line-description">'.$content.'</span>';
    return $content;
}

function wrapping_the_post_thumbnail($content) {
    if(is_singular()) return '<div id="thepostthumbnail" class="wp-block-image">'.$content.'</div>';
    return $content;
}

add_filter('the_content', 'wrapping_content');
add_filter('the_title', 'wrapping_title');
add_filter('the_excerpt', 'wrapping_excerpt');
add_filter('the_category', 'wrapping_category');
add_filter('the_date', 'wrapping_date');
add_filter('post_thumbnail_html', 'wrapping_the_post_thumbnail');

function get_category_by_index($index,$id) {
    $categories = get_the_category();
    $idHtml= $id!=null ? 'id="'.$id.'"' : "";
    $link ='<a '.$idHtml.' class="categories_visible" href="' . esc_url( get_category_link( $categories[$index]->term_id ) ) . '">' . esc_html( $categories[$index]->name ) . '</a>';
    echo wp_sprintf("%s", $link);
}

function get_first_category($id=null) {
    return get_category_by_index(0,$id);
}

function get_second_category($id=null) {
    return get_category_by_index(1,$id);
}

add_filter('first_category', 'get_first_category');
add_filter('second_category', 'get_second_category');

function get_most_recent_posts_by_category($category_ID,$number_post) {
    $args = array(
        'post_type' => 'post',
        'category' => $category_ID,
        'numberposts' => $number_post,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_random_posts_by_category($category_ID,$number_post) {
    $args = array(
        'post_type' => 'post',
        'category' => $category_ID,
        'numberposts' => $number_post,
        'orderby' => 'rand',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_most_recent_posts($number_post) {
    $args = array(
        'post_type' => 'post',
        'numberposts' => $number_post,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_random_posts($number_post) {
    $args = array(
        'post_type' => 'post',
        'numberposts' => $number_post,
        'orderby' => 'rand',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_all_categories() {
    $args = array(
        'hide_empty' => 0,
        'orderby' => 'name',
        'order' => 'DESC'
    );
    return get_categories($args);
}

function wpse_get_partial($template_name, $data = []) {
    $template = locate_template($template_name . '.php', false);
    extract($data);
    include($template);
}



