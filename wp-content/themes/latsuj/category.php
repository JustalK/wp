<?php
get_header();
?>

<?php

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;


$posts = get_most_recent_posts_by_category($cat_id,6);
$random_posts = get_random_posts_by_category($cat_id,4);

$category->cat_name;
$category->slug;
$category->category_description;

?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<div id="category">
	<span id="design_top" class="design">&nbsp;</span> <span
	id="design_bottom" class="design">&nbsp;</span>
		
	<h1><?= $category->cat_name; ?></h1>
	
	<div id="thedate">
		Category
	</div>
	<div id="theexcerpt">
    	<p>
    		<?= $category->category_description; ?>
    	</p>
	</div>
	
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'first_post' => $posts[0],
        'second_post' => $posts[1],
        'third_post' => $posts[2]
    )); ?>   
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Older posts",
        'first_post' => $posts[3],
        'second_post' => $posts[4],
        'third_post' => $posts[5]
    )); ?>
    
    <?php wpse_get_partial('template-parts/preview_posts', array(
        'post' => $random_posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Random posts",
        'first_post' => $random_posts[1],
        'second_post' => $random_posts[2],
        'third_post' => $random_posts[3]
    )); ?>

</div>

<?php
get_footer();
?>