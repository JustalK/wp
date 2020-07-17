<?php
get_header();
?>

<?php if ( !wp_is_mobile() ) { ?>
	<span id="design_side_left" class="design_side">&nbsp;</span>
	<span id="design_side_right" class="design_side">&nbsp;</span>
<?php } ?>

<?php wpse_get_partial('template-parts/nav'); ?>

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
        the_post_thumbnail("medium");
        the_content();
    endwhile
    ;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

?>
</article>

<div id="share">
	<div id="fb-root"></div>
    <div class="fb-share-button" 
    data-href="https://www.your-domain.com/your-page.html" 
    data-layout="button_count">
    </div>
</div>

<?php 
    wpse_get_partial('template-parts/related_posts', array(
        'id' => get_the_ID()
    )); 
?>

<?php
get_footer();
?>