<?php
    get_header();
    
    $category = get_category( get_query_var( 'cat' ) );
    $cat_id = is_null($category) ? NULL : $category->cat_ID;
?>

<?php wpse_get_partial('template-parts/nav'); ?>

<?php if ( wp_is_mobile() ) : ?>

    <div id="category">
    	<span id="design_top" class="design">&nbsp;</span> <span
    	id="design_bottom" class="design">&nbsp;</span>
    		
    	<h1><?= $category->cat_name; ?></h1>
    	
    	<div id="theexcerpt">
        	<p>
        		<?= $category->category_description; ?>
        	</p>
    	</div>
    	
        <?php 
        wpse_get_partial('template-parts/most_recent_posts', array(
            'nbr_of_post' => 3,
            'offset' => 0,
            'direction' => 'horizontal',
            'title' => 'Recent Posts'
        ));
        wpse_get_partial('template-parts/most_recent_posts', array(
            'nbr_of_post' => 4,
            'offset' => 3,
            'direction' => 'vertical',
            'title' => 'Older Posts'
        ));
        wpse_get_partial('template-parts/preview_posts');
        ?>
    
    </div>

<?php else : ?>
	<span id="design_side_left" class="design_side">&nbsp;</span>
	<span id="design_side_right" class="design_side">&nbsp;</span>

    <div id="category">
    	<span id="design_top" class="design">&nbsp;</span> <span
    	id="design_bottom" class="design">&nbsp;</span>
    		
    	<h1><?= $category->cat_name; ?></h1>
    	
    	<div id="theexcerpt">
        	<p>
        		<?= $category->category_description; ?>
        	</p>
    	</div>
    	
        <?php 
        wpse_get_partial('template-parts/most_recent_posts', array(
            'nbr_of_post' => 3,
            'offset' => 0,
            'direction' => 'horizontal',
            'title' => 'Recent Posts'
        )); ?>
        <?php wpse_get_partial('template-parts/slider', array(
            'description' => "Older posts",
            'nbr_of_post' => 3,
            'offset' => 3,
            'order' => "date"
        )); ?>
        <?php wpse_get_partial('template-parts/preview_posts'); ?>
        
        <?php wpse_get_partial('template-parts/slider', array(
            'description' => "Random posts",
            'nbr_of_post' => 3,
            'offset' => 1,
            'order' => "rand"
        )); ?>
    
    </div>

<?php endif; ?>

<?php
get_footer();
?>