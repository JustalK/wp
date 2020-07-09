<?php
get_header();
?>

<?php if ( !wp_is_mobile() ) { ?>
	<span id="design_side_left" class="design_side">&nbsp;</span>
	<span id="design_side_right" class="design_side">&nbsp;</span>
<?php } ?>


<div id="nav">
    <a class="options" href="javascript:history.back()">
    	<i class="material-icons">arrow_back</i>
    	<span>Back</span>	
    </a>
    <a class="options" href="<?= home_url(); ?>">
    	<span>Home</span>
    	<i class="material-icons">home</i>
    </a>
</div>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<span id="design_top" class="design">&nbsp;</span> <span
		id="design_bottom" class="design">&nbsp;</span>
<?php

if (have_posts()) :
    while (have_posts()) :
        the_post();
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
    wpse_get_partial('template-parts/related_posts', array(
        'id' => get_the_ID()
    )); 
?>

<?php
get_footer();
?>