<?php
    $category = get_category( get_query_var( 'cat' ) );
    $cat_id = is_null($category) ? NULL : $category->cat_ID;
    
    $random_posts = get_random_posts(1,0,$cat_id)[0];
?>

<div id="random_single" class="wp-block-code">
    <span class="legend"><?= $random_posts["post_title"]; ?></span>
    
    <p>
		<?= $random_posts["post_excerpt"]; ?><br /><br /><a class="see-more" href="<?= the_permalink($random_posts["ID"]) ?>">Read more</a>
	</p>
</div>