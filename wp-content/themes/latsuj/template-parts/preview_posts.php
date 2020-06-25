<div id="random_single" class="wp-block-code">
    <span class="description"><?= $post["post_title"]; ?></span>
    
    <p>
		<?= $post["post_excerpt"]; ?><a href="<?= the_permalink($post["ID"]) ?>">[ Read more ]</a>
	</p>
</div>