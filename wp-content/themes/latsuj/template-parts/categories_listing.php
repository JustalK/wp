<?php 
$categories = get_all_categories();
$two_first_categories = array_slice($categories,0,2);
?>

<?php if ( wp_is_mobile() ) : ?>
<div id="categories_listing">
	<span class="legend title">All categories</span>
	<ul>
		<?php foreach($categories as $category) { ?>
			<li><a href="<?= get_category_link($category->cat_ID) ?>"><i class="material-icons"><?= get_term_meta($category->cat_ID, 'cat_icon', true); ?></i><span><?= $category->cat_name ?></span><i class="material-icons">chevron_right</i></a></li>
		<?php } ?>
	</ul>
</div>
<?php else : ?>
    <div id="categories_listing" data-loop="0" data-order="date" data-action="get_loop_categories" data-total_loop="<?= sizeof($categories) ?>">
    	<i class="material-icons arrow left">chevron_left</i>
    	<?php foreach($two_first_categories as $category) { ?>
        	<a class="posts" href="<?= get_category_link($category->cat_ID) ?>" style="background-image: url('<?= getUrlSizeImageBySlug($category->slug); ?>')">
        		<h2><?= $category->cat_name; ?></h2>
        	</a> 	
    	<?php } ?>
    	<i class="material-icons arrow right">chevron_right</i>
    </div>
<?php endif; ?>