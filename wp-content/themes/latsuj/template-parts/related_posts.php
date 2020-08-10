<?php
$meta=get_post_custom($id);
$ids = !is_null($meta["RELATED_POSTS"][0]) ? array_map('intval', explode(",",$meta["RELATED_POSTS"][0])) : [];
$posts = get_related_posts($ids);

?>

<?php if ( wp_is_mobile() ) : ?>
    <div id="mb-vertical-posts">
    	<span class="legend title">Related Posts</span>
    	<ul>
    		<?php foreach($posts as $post) { ?>
        		<li>
        			<a class="posts" href="<?= the_permalink($post["ID"]) ?>">
                		<div class="image"><img class="lqip" data-src="<?= get_the_post_thumbnail_url($post["ID"],'full') ?>"></img></div>
                		<div class="post_informations">
                			<span><?= get_the_category($post["ID"])[0]->cat_name ?></span>
                			<h3><?= $post["post_title"]; ?></h3>
                		</div>
                	</a>
        		</li>
    		<?php } ?>
    	</ul>
    </div>
<?php else : ?>
    <span class="line-description">Related Posts</span>
    <div class="slider">
    	<?php foreach($posts as $post) { ?>
        	<a class="posts" href="<?= the_permalink($post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($post["ID"],'full'); ?>')">
        		<h3><?= $post["post_title"]; ?></h3>
        	</a>
    	<?php } ?>
    </div>
<?php endif; ?>
