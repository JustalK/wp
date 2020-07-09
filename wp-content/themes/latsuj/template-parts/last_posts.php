<?php 
    $post = get_most_recent_posts(1)[0];
?>

<div id="last-posts">
	<a class="posts" href="<?= the_permalink($post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($post["ID"],'full'); ?>')">
		<h2><?= $post["post_title"]; ?></h2>
	</a>
</div>