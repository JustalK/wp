<span class="line-description"><?= $description ?></span>
<div class="slider">
	<img class="arrow left" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
	<a class="posts" href="<?= the_permalink($first_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($first_post["ID"],'full'); ?>')">
		<h3><?= $first_post["post_title"]; ?></h3>
	</a>
	<a class="posts" href="<?= the_permalink($second_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($second_post["ID"],'full'); ?>')">
		<h3><?= $second_post["post_title"]; ?></h3>
	</a>
	<a class="posts" href="<?= the_permalink($third_post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($third_post["ID"],'full'); ?>')">
		<h3><?= $third_post["post_title"]; ?></h3>
	</a>
	<img class="arrow right" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
</div>