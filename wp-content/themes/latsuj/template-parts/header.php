<header>
	<img src="<?= getUrlSizeImageById(191); ?>">
	<h1><?= get_bloginfo("name") ?></h1>
	<?php if(!wp_is_mobile()) { ?>
		<p class="left"><?= get_option("left_resume") ?></p>
		<p class="right"><?= get_option("right_resume") ?></p>
	<?php } ?>
</header>
<?php if(wp_is_mobile()) { ?>
	<p id="resume"><?= get_option("left_resume").get_option("right_resume") ?></p>
<?php } ?>