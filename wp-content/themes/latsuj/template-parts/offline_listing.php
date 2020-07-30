<?php
$category = get_category( get_query_var( 'cat' ) );
$cat_id = is_null($category) ? NULL : $category->cat_ID;

$posts = get_most_recent_posts($nbr_of_post,$offset,$cat_id);
$id=0;
?>

<?php if ( wp_is_mobile() ) : ?>

      <div id="mb-horizontal-posts">
      	<?php if(!is_null($title)) { ?><span class="legend title"><?= $title ?></span><?php } ?>
      	<ul>
      		<?php foreach($posts as $post) { ?>
          		<li>
                  	<div class="posts" data-id="<?= $id ?>">
                  		<div class="image" style="background-image: url('<?= getUrlSizeImageByPostId($post["ID"]); ?>')"></div>
                  		<div class="post_informations">
                  			<span><?= get_the_category($post["ID"])[0]->cat_name ?></span>
                  			<h2><?= $post["post_title"]; ?></h2>
                  			<div class="square"></div>
                  		</div>
                  	</div>
                  </li>
                  <li class="posts_content hidden" data-pos="<?= $count ?>">
                  	<div>
                  		<div id="theexcerpt"><p><?= get_the_excerpt($post["ID"]); ?></p></div>
                  		<?= $post["post_content"]; ?>
                  	</div>
          		</li>
      		<?php $id++; } ?>
      	</ul>
      </div>

<?php else : ?>

<div id="most_recent-posts">
    <div class="columns column23 left">
    	<a class="posts" href="<?= the_permalink($posts[0]["ID"]) ?>" style="background-image: url('<?= get_the_post_thumbnail_url($posts[0]["ID"],"full"); ?>')">
    		<h2><?= $posts[0]["post_title"]; ?></h2>
    	</a>
    </div>
    <div class="columns column13 right">
    	<a class="posts secondary_post" href="<?= the_permalink($posts[1]["ID"]) ?>" style="background-image: url('<?= getUrlSizeImageByPostId($posts[1]["ID"]); ?>')">
    		<h2><?= $posts[1]["post_title"]; ?></h2>
    	</a>
    	<a class="posts secondary_post bottom_post" href="<?= the_permalink($posts[2]["ID"]) ?>" style="background-image: url('<?= getUrlSizeImageByPostId($posts[2]["ID"]); ?>')">
    		<h2><?= $posts[2]["post_title"]; ?></h2>
    	</a>
    </div>
</div>

<?php endif; ?>
