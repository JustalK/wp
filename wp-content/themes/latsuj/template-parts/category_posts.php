<div id="category-posts" data-loop="0" data-order="<?= $order ?>" data-action="get_loop_categories" data-total_loop="<?= $total_category ?>">
	<img class="arrow left" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
	<a class="posts" href="<?= get_category_link($first_category->cat_ID) ?>" style="background-image: url('./images/<?= $first_category->cat_name; ?>.jpg')">
		<h2><?= $first_category->cat_name; ?></h2>
	</a>
	<a class="posts" href="<?= get_category_link($second_category->cat_ID) ?>" style="background-image: url('./images/<?= $second_category->cat_name; ?>.jpg')">
		<h2><?= $second_category->cat_name; ?></h2>
	</a>
	<img class="arrow right" src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpeg">
</div>