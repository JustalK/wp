<?php /* Template Name: All */ ?>

<?php
get_header();
?>

<?php wpse_get_partial('template-parts/nav'); ?>

<div id="all-posts">
	<span id="design_top" class="design">&nbsp;</span> <span
	id="design_bottom" class="design">&nbsp;</span>
		
	<h1>All posts</h1>
	
    <?php 
    wpse_get_partial('template-parts/most_recent_posts', array(
        'nbr_of_post' => 20,
        'offset' => 0,
        'direction' => 'vertical'
    ));
    ?>
</div>

<?php
get_footer();
?>