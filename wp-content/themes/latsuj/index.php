<?php
 
get_header();

$posts = get_most_recent_posts(7);
$random_posts = get_random_posts(4);
$categories = get_all_categories();
$total_posts = wp_count_posts()->publish;

?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<div>

	<header>
		<img src="<?php echo get_template_directory_uri(); ?>/img/background_index.png">
		<h1>Latsuj</h1>
		<p class="left">Hello and welcome to my world. I'm Kevin, a french full stack developer who is actually living in the Philippines</p>
		<p class="right">And on my right, it's my crazy little wife. The one who always support me and make my life so much more entertaining </p>
	</header>
	<?php wpse_get_partial('template-parts/category_posts', array(
	    'first_category' => $categories[0],
	    'second_category' => $categories[1],
	    'total_category' => sizeof($categories)
    )); ?> 
    <?php wpse_get_partial('template-parts/last_posts', array(
        'post' => $posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'first_post' => $posts[1],
        'second_post' => $posts[2],
        'third_post' => $posts[3] 
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Older posts",
        'first_post' => $posts[4],
        'second_post' => $posts[5],
        'third_post' => $posts[6],
        'loop_init' => 3,
        'total_post' => $total_posts
    )); ?>
    
    <?php wpse_get_partial('template-parts/preview_posts', array(
        'post' => $random_posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Random posts",
        'first_post' => $random_posts[1],
        'second_post' => $random_posts[2],
        'third_post' => $random_posts[3],
        'loop_init' => 0,
        'total_post' => $total_posts
    )); ?>
	
</div>


<?php

get_footer();
 
?>