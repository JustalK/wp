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
		?><div id="loading"><?php
        the_date();
        the_excerpt();
        the_post_thumbnail("full");
        the_content();
		?></div><?php
    endwhile
    ;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

?>
</article>

<div id="share">
    <a class="fshare" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>" target="_blank">
      <i class="fa fa-facebook-square"></i> <span>Share</span>
    </a>
</div>

<?php
    wpse_get_partial('template-parts/related_posts', array(
        'id' => get_the_ID()
    ));
?>

<?php
get_footer();
?>
