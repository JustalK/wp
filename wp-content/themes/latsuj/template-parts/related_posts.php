<?php 
$meta=get_post_custom($id);
$ids = !is_null($meta["RELATED_POSTS"][0]) ? array_map('intval', explode(",",$meta["RELATED_POSTS"][0])) : [];

$posts = get_related_posts($ids);

?>

<div id="mb-vertical-posts">
	<span class="legend title">Related Posts</span>
	<ul>
		<?php foreach($posts as $post) { ?>
    		<li>
    			<a class="posts" href="<?= the_permalink($post["ID"]) ?>">
            		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($post["ID"],'full'); ?>')"></div>
            		<div class="post_informations">
            			<span><?= get_the_category($post["ID"])[0]->cat_name ?></span>
            			<h3><?= $post["post_title"]; ?></h3>
            		</div>
            	</a>
            	<div class="border red"></div>
            	<div class="border blue"></div>
    		</li>
		<?php } ?>
	</ul>
</div>