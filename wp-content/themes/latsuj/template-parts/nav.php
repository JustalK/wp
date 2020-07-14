<div id="nav">
	<?php if(is_singular()) {?>
		<?php 
            $categories = get_the_category(get_the_ID()); 
            $category_with_most_posts = $categories[0];
		?>
        <a class="options" href="<?= get_category_link($category_with_most_posts->cat_ID) ?>">
        	<i class="material-icons">arrow_back</i>
        	<span><?= $category_with_most_posts->cat_name ?></span>	
        </a>
    <?php } else { ?>
		<a class="options" href="javascript:history.back()">
        	<i class="material-icons">arrow_back</i>
        	<span>Back</span>	
        </a>
    <?php } ?>
    <a class="options" href="<?= home_url(); ?>">
    	<span>Home</span>
    	<i class="material-icons">home</i>
    </a>
</div>