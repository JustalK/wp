<?php 
$category = get_category( get_query_var( 'cat' ) );
$cat_id = is_null($category) ? NULL : $category->cat_ID;
$cat_data = is_null($category) ? "" : 'data-category="'.$cat_id.'"';

$posts = $order=="rand" ? get_random_posts($nbr_of_post,$offset,$cat_id) : get_most_recent_posts($nbr_of_post,$offset,$cat_id);
$total_posts = count_all_published_post($cat_id);
?>
<span class="line-description"><?= $description ?></span>
<div class="slider" data-loop="<?= $offset ?>" data-order="<?= $order ?>" <?= $cat_data ?> data-action="get_loop_posts" data-total_loop="<?= $total_posts ?>">
	<i class="material-icons arrow left">chevron_left</i>
    <?php foreach($posts as $post) { ?>
    	<a class="posts" href="<?= the_permalink($post["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($post["ID"],'full'); ?>')">
    		<h3><?= $post["post_title"]; ?></h3>
    	</a>
	<?php } ?>
    <i class="material-icons arrow right">chevron_right</i>
</div>