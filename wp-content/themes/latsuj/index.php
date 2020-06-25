<?php
 
get_header();

$posts = get_most_recent_posts_by_category($cat_id);
set_query_var( 'query_last_posts', array(
    'post' => $posts[0]
));

?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<div id="category">
	<h1>Latsuj</h1>
	
    <?php wpse_get_partial('template-parts/last_posts', array(
        'post' => $posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'first_post' => $posts[1],
        'second_post' => $posts[2],
        'third_post' => $posts[3] 
    )); ?>
	
</div>


<?php

get_footer();
 
?>