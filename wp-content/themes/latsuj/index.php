<?php
    get_header();
?>

<?php if ( wp_is_mobile() ) : ?>

	<div id="socials">
		<i class="fa fa-facebook-square"></i>
		<i class="fa fa-github-square"></i>
		<i class="fa fa-youtube-square"></i>
	</div>

	<?php 
	
	wpse_get_partial('template-parts/header');
    wpse_get_partial('template-parts/categories_listing');
    wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 4,
        'offset' => 0,
        'direction' => 'horizontal',
        'title' => 'Recent Posts'
    )); 
    wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 4,
        'offset' => 4,
        'direction' => 'vertical',
        'title' => 'Older Posts'
    ));
    
    ?>
	<a id="mb-see-all" href="#">See all <i class="material-icons">chevron_right</i></a>


<?php else : ?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

    <?php wpse_get_partial('template-parts/header'); ?>
	<?php wpse_get_partial('template-parts/categories_listing'); ?> 
    <?php wpse_get_partial('template-parts/last_posts'); ?>
    
    <?php wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 3,
        'offset' => 1
    )); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Older posts",
        'nbr_of_post' => 3,
        'offset' => 4,
        'order' => "date"
    )); ?>
    
    <?php wpse_get_partial('template-parts/preview_posts'); ?>
    
    <?php wpse_get_partial('template-parts/slider', array(
        'description' => "Random posts",
        'nbr_of_post' => 3,
        'offset' => 0,
        'order' => "rand"
    )); ?>
	

<?php endif; ?>

<?php
get_footer();
?>