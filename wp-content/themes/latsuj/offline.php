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

<script>
document.addEventListener("DOMContentLoaded", function() {
    const posts = document.querySelectorAll(".posts");
    const posts_content = document.querySelectorAll(".posts_content");

    const show_text = function(e) {
      const selected_posts = e.currentTarget;
      const id = selected_posts.dataset.id;

      posts_content[id].classList.remove("hidden");
      
      console.log(e.currentTarget);
    }

    for(let i=posts.length;i--;) {
      posts[i].addEventListener("click", show_text);
    }
})
</script>

<?php
    get_footer();
?>
