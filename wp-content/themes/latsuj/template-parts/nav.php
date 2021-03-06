<div id="nav">
	<?php if(is_singular() && !is_page("posts")) { ?>
		<?php
            $categories = get_the_category(get_the_ID());
            $category_with_most_posts = $categories[0];
		?>
        <a class="options" href="<?= get_category_link($category_with_most_posts->cat_ID) ?>">
        	<i class="fa fa-arrow2-left"></i>
        	<span><?= $category_with_most_posts->cat_name ?></span>
        </a>
        <a class="options" href="<?= home_url(); ?>">
        	<span>Home</span>
        	<i class="fa fa-home"></i>
        </a>
    <?php } else { ?>
        <a class="options" href="<?= home_url(); ?>">
        	<i class="fa fa-home"></i>
        	<span>Home</span>
        </a>
		<a class="options" href="javascript:history.back()">
        	<span>Back</span>
        	<i class="fa fa-arrow2-right"></i>
        </a>
    <?php } ?>
</div>
