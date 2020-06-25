<?php
 
get_header();

$posts = get_most_recent_posts(6);
$random_posts = get_random_posts(4);

?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<div>

	<header>
		<img src="<?php echo get_template_directory_uri(); ?>/img/background_index.png">
		<h1>Latsuj</h1>
		<p class="left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare quam sit amet mi condimentum porttitor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
		<p class="right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare quam sit amet mi condimentum porttitor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	</header>
	
	<div>
		
	</div>
	
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
        'third_post' => $posts[6] 
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