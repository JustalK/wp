<?php
get_header();
?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="side_left">
	<span id="menu-list">
		<span class="home">Home</span>
		<span class="posts">All Post</span>
		<span class="categories">Categories</span>
		<span class="category_01"><?php get_first_category(); ?></span>
		<span class="category_02"><?php get_second_category(); ?></span>
		<span class="postRelated">Related Post</span>
		<span class="related_01">Related 1</span>
		<span class="related_02">Related 2</span>
		<span class="related_03">Related 3</span>
	</span>
</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<span id="design_top" class="design">&nbsp;</span> <span
		id="design_bottom" class="design">&nbsp;</span>
<?php

if (have_posts()) :
    while (have_posts()) :
        the_post();
        get_first_category("firstcategory");
        get_second_category("secondcategory");
        the_title();
        the_date();
        the_excerpt();
        the_post_thumbnail();
        the_content();
    endwhile
    ;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

?>
</article>

<?php 
    $posts = get_most_recent_posts_by_category($cat_id,3);
?>
<span class="line-description">Random posts</span>
<div class="slider">
    	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')">
    		<h3><?= $posts[0]["post_title"]; ?></h3>
    	</a>
    	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')">
    		<h3><?= $posts[0]["post_title"]; ?></h3>
    	</a>
    	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],'full'); ?>')">
    		<h3><?= $posts[0]["post_title"]; ?></h3>
    	</a>
</div>

<?php
get_footer();
?>