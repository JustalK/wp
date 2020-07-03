<?php
 
get_header();

$posts = get_most_recent_posts(7);
$random_posts = get_random_posts(4);
$total_posts = count_all_published_post();
?>

<?php if ( wp_is_mobile() ) : ?>

<div>
	<?php wpse_get_partial('template-parts/header'); ?>
    <?php wpse_get_partial('template-parts/categories_listing'); ?> 
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 4,
        'offset' => 0
    )); ?>
    
	<div id="mb-vertical-posts">
		<span class="legend title">Older posts</span>
    	<ul>
    		<li>
    			<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>">
            		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')"></div>
            		<div class="legend">
            			<span>Category</span>
            			<h2><?= $posts[2]["post_title"]; ?></h2>
            		</div>
            	</a>
            	<div class="red"></div>
            	<div class="blue"></div>
    		</li>
    		<li>
    			<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>">
            		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')"></div>
            		<div class="legend">
            			<span>Category</span>
            			<h2><?= $posts[2]["post_title"]; ?></h2>
            		</div>
            	</a>
            	<div class="red"></div>
            	<div class="blue"></div>
    		</li>
    		<li>
    			<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>">
            		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')"></div>
            		<div class="legend">
            			<span>Category</span>
            			<h2><?= $posts[2]["post_title"]; ?></h2>
            		</div>
            	</a>
            	<div class="red"></div>
            	<div class="blue"></div>
    		</li>
    		<li>
    			<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>">
            		<div class="image" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')"></div>
            		<div class="legend">
            			<span>Category</span>
            			<h2><?= $posts[2]["post_title"]; ?></h2>
            		</div>
            	</a>
            	<div class="red"></div>
            	<div class="blue"></div>
    		</li>
    	</ul>
	</div>
	<a id="mb-see-all" href="#">See all <i class="material-icons">chevron_right</i></a>
</div>


<?php else : ?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<div>
    <?php wpse_get_partial('template-parts/header'); ?>
	<?php wpse_get_partial('template-parts/categories_listing'); ?> 
    <?php wpse_get_partial('template-parts/last_posts', array(
        'post' => $posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 3,
        'offset' => 1
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Older posts",
        'first_post' => $posts[4],
        'second_post' => $posts[5],
        'third_post' => $posts[6],
        'loop_init' => 4,
        'order' => "date",
        'total_post' => $total_posts
    )); ?>
    
    <?php wpse_get_partial('template-parts/preview_posts', array(
        'post' => $random_posts[0]
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Random posts",
        'first_post' => $random_posts[1],
        'second_post' => $random_posts[2],
        'third_post' => $random_posts[3],
        'loop_init' => 0,
        'order' => "rand",
        'total_post' => $total_posts
    )); ?>
	
</div>

<?php endif; ?>

<?php

get_footer();
 
?>