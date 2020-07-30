<?php /* Template Name: Offline */ ?>

<?php
    get_header();
?>

<?php if ( wp_is_mobile() ) : ?>
  <span class="nav-offline">YOU ARE OFFLINE</span>

  <?php wpse_get_partial('template-parts/header'); ?>
  <?php
        wpse_get_partial('template-parts/offline_listing', array(
        'nbr_of_post' => 20,
        'offset' => 0,
        'direction' => 'horizontal'
    ));
    ?>

  <span class="nav-offline bottom">CLOSE ARTICLES</span>
<?php else : ?>

<span id="design_side_left" class="design_side">&nbsp;</span>
<span id="design_side_right" class="design_side">&nbsp;</span>

    <?php wpse_get_partial('template-parts/header'); ?>

<?php endif; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const posts = document.querySelectorAll(".posts");
    const posts_content = document.querySelectorAll(".posts_content");
    const close_posts = document.querySelector(".nav-offline.bottom");
    let posts_open =0;

    const click_close_posts = function(e) {
      posts_open = 0;
      close_posts.classList.remove("show");
      for(let i=posts_content.length;i--;) {
        posts_content[i].classList.add("hidden");
      }
    }
    close_posts.addEventListener("click", click_close_posts);

    const click_show_text = function(e) {
      const selected_posts = e.currentTarget;
      const id = selected_posts.dataset.id;
      posts_content[id].classList.remove("hidden");
      if(!posts_open) close_posts.classList.add("show");
      posts_open++;
    }
    for(let i=posts.length;i--;) {
      posts[i].addEventListener("click", click_show_text);
    }
})
</script>

<?php
    get_footer();
?>
