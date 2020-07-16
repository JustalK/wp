<?php

// ===================================================================================>
// Adding field to the general setting
// ===================================================================================>

add_filter('admin_init', 'my_general_settings_register_fields');

function my_general_settings_register_fields()
{
    register_setting('general', 'left_resume', 'esc_attr');
    register_setting('general', 'right_resume', 'esc_attr');
    add_settings_field('left_resume', '<label for="left_resume">'.__('Left Resume' , 'left_resume' ).'</label>' , 'left_resume_html', 'general');
    add_settings_field('right_resume', '<label for="right_resume">'.__('Right Resume' , 'right_resume' ).'</label>' , 'right_resume_html', 'general');
}

function left_resume_html()
{
    $value = get_option( 'left_resume', '' );
    echo '<input type="text" id="left_resume" name="left_resume" class="regular-text" value="' . $value . '" />';
}

function right_resume_html()
{
    $value = get_option( 'right_resume', '' );
    echo '<input type="text" id="right_resume" name="right_resume" class="regular-text" value="' . $value . '" />';
}

// ===================================================================================>
// Adding fields to the categories
// ===================================================================================>

function addCategoryIcon(){
    $cat_icon = get_term_meta($_GET['tag_ID'], 'cat_icon', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_icon"><?php _e('Category Icon'); ?></label></th>
        <td>
        <input type="text" name="cat_icon" id="cat_icon" value="<?php echo $cat_icon ?>"><br />
            <span class="description"><?php _e('Icon for the mobile version '); ?></span>
        </td>
    </tr>
    <?php

}
add_action ( 'edit_category_form_fields', 'addCategoryIcon');

function saveCategoryFields() {
    if ( isset( $_POST['cat_icon'] ) ) {
        update_term_meta($_POST['tag_ID'], 'cat_icon', $_POST['cat_icon']);
    }
}
add_action ( 'edited_category', 'saveCategoryFields');



add_theme_support( 'post-thumbnails' );

function custom_theme_assets() {
    if(wp_is_mobile()) wp_enqueue_style( 'mb-style', get_template_directory_uri()."/mb-style.css" );
    else wp_enqueue_style( 'style', get_stylesheet_uri() );
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

function get_related_posts($ids) {
    $args = array(
        'post_type' => 'post',
        'include' => $ids,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_most_recent_posts($number_post,$offset=0,$category_ID=NULL) {
    $args = array(
        'post_type' => 'post',
        'category' => $category_ID,
        'numberposts' => $number_post,
        'offset' => $offset,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_random_posts($number_post,$offset=0,$category_ID=NULL) {
    $args = array(
        'post_type' => 'post',
        'numberposts' => $number_post,
        'category' => $category_ID,
        'offset' => $offset,
        'orderby' => 'rand',
        'order' => 'DESC'
    );
    return wp_get_recent_posts($args);
}

function get_all_categories() {
    $args = array(
        'hide_empty' => 0,
        'orderby' => 'count',
        'order' => 'DESC'
    );
    return get_categories($args);
}

function count_all_published_post($category_ID=NULL) {
    if(is_null($category_ID)) return wp_count_posts()->publish;
    return get_category($category_ID)->count;
}

function getUrlSizeImageById($id) {
    return wp_get_attachment_image_src($id,getSizeImage())[0];
}

function getUrlSizeImageByPostId($id) {
    return get_the_post_thumbnail_url($id,getSizeImage());
}

function getUrlSizeImageBySlug( $slug ) {
    $args = array(
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_image_src($header->ID,getSizeImage())[0] : '';
}

function getSizeImage() {
    return wp_is_mobile() ? "thumbnail" : "medium";
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
    $category_ID = $_GET["category"]!="undefined" ? intval($_GET["category"]) : NULL;
    $total = count_all_published_post($category_ID);
    
    $posts = [];
    $args = array(
        'post_type' => 'post',
        'numberposts' => 1,
        'orderby' => $order,
        'category' => $category_ID,
        'order' => 'DESC'
    );
    
    for($i=0;$i<3;$i++) {
        $args["offset"] = ($loop + $i) % $total;
        $post = wp_get_recent_posts($args)[0];
        $post["url"] = get_the_permalink($post["ID"]);
        $post["innerHTML"] = $post["post_title"];
        $post["backgroundImage"] = getUrlSizeImageByPostId($post["ID"]);
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
        $categories[$i]->backgroundImage = getUrlSizeImageBySlug($categories[$i]->slug);
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




