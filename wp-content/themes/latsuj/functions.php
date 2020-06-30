<?php

add_theme_support( 'post-thumbnails' );

function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

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

function count_all_published_post() {
    return wp_count_posts()->publish;
}

function wpse_get_partial($template_name, $data = []) {
    $template = locate_template($template_name . '.php', false);
    extract($data);
    include($template);
}

// =======================================================================> AJAX

function ajax_enqueue() {
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/latsuj.js' );
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'ajax_enqueue' );

function get_loop_posts(){
    $loop = $_GET["loop"];
    $order = $_GET["order"];
    $total = count_all_published_post();
    
    $posts = [];
    
    $args = array(
        'post_type' => 'post',
        'numberposts' => 1,
        'orderby' => $order,
        'order' => 'DESC'
    );
    
    for($i=0;$i<3;$i++) {
        $args["offset"] = ($loop + $i) % $total;
        $post = wp_get_recent_posts($args)[0];
        $post["url"] = get_the_permalink($post["ID"]);
        $post["innerHTML"] = $post["post_title"];
        $post["backgroundImage"] = get_the_post_thumbnail_url($post["ID"],'full');
        $posts[] = $post;
    }
    
    echo json_encode($posts);
    die();
}

add_action('wp_ajax_get_loop_posts', 'get_loop_posts');
add_action('wp_ajax_nopriv_get_loop_posts', 'get_loop_posts');

function get_loop_categories(){
    $loop = $_GET["loop"];
    $categories = get_all_categories();
    $total_categories = sizeof($categories);
    
    for($i=$total_categories;$i--;) {
        $categories[$i]->url = get_category_link($categories[$i]->cat_ID);
        $categories[$i]->innerHTML = $categories[$i]->cat_name;
        $categories[$i]->backgroundImage = "./images/".$categories[$i]->cat_name.".jpg";
    }
    
    echo get_loop_elements(2,$loop,$categories);
    die();
}

function get_loop_elements($nbr_elements,$loop,$elements) {
    $rsl = [];
    for($i=$nbr_elements;$i--;) {
        $rsl[$i]=$elements[($loop*1+$i) %  sizeof($elements)];
    }
    return json_encode($rsl);
}
add_action('wp_ajax_get_loop_categories', 'get_loop_categories');
add_action('wp_ajax_nopriv_get_loop_categories', 'get_loop_categories');

function custom_excerpt_length( $length ) {
    return 500;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );




