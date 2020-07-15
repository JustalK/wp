<?php
    $random_posts = get_random_posts(1)[0];
?>

<div id="random_single" class="wp-block-code">
    <span class="legend"><?= $random_posts["post_title"]; ?></span>
    
    <p>
		<?= $random_posts["post_excerpt"]; ?><br /><br /><a href="<?= the_permalink($random_posts["ID"]) ?>">Read more</a>
	</p>
</div>