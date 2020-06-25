<div id="most_recent-posts">
    <div class="columns column23 left">
    	<a class="posts" href="<?= the_permalink($first_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($first_post["ID"],'full'); ?>')">
    		<h2><?= $first_post["post_title"]; ?></h2>
    	</a>
    </div>
    <div class="columns column13 right">
    	<a class="posts secondary_post" href="<?= the_permalink($second_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($second_post["ID"],'full'); ?>')">
    		<h2><?= $second_post["post_title"]; ?></h2>
    	</a>
    	<a class="posts secondary_post bottom_post" href="<?= the_permalink($third_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($third_post["ID"],'full'); ?>')">
    		<h2><?= $third_post["post_title"]; ?></h2>
    	</a>
    </div>
</div>