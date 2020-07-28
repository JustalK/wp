<?php /* Template Name: Offline */ ?>

<?php
    get_header();
?>

<?php if ( wp_is_mobile() ) : ?>
	<span id="nav-offline">YOU ARE OFFLINE</span>
	
	<?php wpse_get_partial('template-parts/header'); ?>
	<?php 
        wpse_get_partial('template-parts/offline_listing', array(
        'nbr_of_post' => 20,
        'offset' => 0,
        'direction' => 'horizontal'
    ));
    ?>
	
<?php else : ?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

    <?php wpse_get_partial('template-parts/header'); ?>

<?php endif; ?>