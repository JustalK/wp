<?php
    get_header();
?>

<?php if ( wp_is_mobile() ) : ?>

	<div id="socials">
		<a href="https://www.facebook.com/Team-KD-106019544520538" target="_blank"><i class="fa fa-facebook-square"></i></a>
		<a href="https://github.com/Latsuj" target="_blank"><i class="fa fa-github-square"></i></a>
		<a href="https://www.youtube.com/channel/UCvmYjxbiFavUv9lipG1pezg" target="_blank"><i class="fa fa-youtube-square"></i></a>
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
	<a id="mb-see-all" href="<?php echo esc_url( get_permalink( get_page_by_path( 'posts' ) ) ); ?>">See all <i class="material-icons">chevron_right</i></a>


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