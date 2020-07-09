<?php 
$posts = $order=="rand" ? get_random_posts($nbr_of_post,$offset) : get_most_recent_posts($nbr_of_post,$offset);
$total_posts = count_all_published_post();
?>
<span class="line-description"><?= $description ?></span>
<div class="slider" data-loop="<?= $offset ?>" data-order="<?= $order ?>" data-action="get_loop_posts" data-total_loop="<?= $total_post ?>">
	<img class="arrow left" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')">
		<h3><?= $posts[0]["post_title"]; ?></h3>
	</a>
	<a class="posts" href="<?= the_permalink($posts[1]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[1]["ID"],'full'); ?>')">
		<h3><?= $posts[1]["post_title"]; ?></h3>
	</a>
	<a class="posts" href="<?= the_permalink($posts[2]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[2]["ID"],'full'); ?>')">
		<h3><?= $posts[2]["post_title"]; ?></h3>
	</a>
	<img class="arrow right" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
</div>