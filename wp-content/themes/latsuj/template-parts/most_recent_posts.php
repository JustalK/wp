<?php 
$posts = get_most_recent_posts($nbr_of_post,$offset);
?>


<?php if ( wp_is_mobile() ) : ?>

<div id="mb-horizontal-posts">
	<span class="legend title">Recent posts</span>
	<ul>
		<?php foreach($posts as $post) { ?>
		<li>
        	<a class="posts" href="<?= the_permalink($post["ID"]) ?>">
        		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($post["ID"],'full'); ?>')"></div>
        		<div class="post_informations">
        			<span><?= get_the_category($post["ID"])[0]->cat_name ?></span>
        			<h2><?= $post["post_title"]; ?></h2>
        		</div>
        	</a>
        	<div class="red"></div>
        	<div class="blue"></div>
		</li>
		<?php } ?>
	</ul>
</div>

<?php else : ?>

<div id="most_recent-posts">
    <div class="columns column23 left">
    	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')">
    		<h2><?= $posts[0]["post_title"]; ?></h2>
    	</a>
    </div>
    <div class="columns column13 right">
    	<a class="posts secondary_post" href="<?= the_permalink($posts[1]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[1]["ID"],'full'); ?>')">
    		<h2><?= $posts[1]["post_title"]; ?></h2>
    	</a>
    	<a class="posts secondary_post bottom_post" href="<?= the_permalink($posts[2]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[2]["ID"],'full'); ?>')">
    		<h2><?= $posts[2]["post_title"]; ?></h2>
    	</a>
    </div>
</div>

<?php endif; ?>

