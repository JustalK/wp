<?php 

$youtube = file_get_contents(dirname(__FILE__)."/../json/youtube.json");
// Convert to array
$data = json_decode($youtube, true);
$items = $data["items"];

?>
<?php if ( wp_is_mobile()) : ?>
    <div id="mb-horizontal-posts">
    	<?php if(!is_null($title)) { ?><span class="legend title"><?= $title ?></span><?php } ?>
    	<ul>
    		<?php foreach($items as $item) { ?>
        		<li>
                	<a class="posts" href="<?= "https://www.youtube.com/watch?v=".$item["id"]["videoId"] ?>">
                		<div class="image" target="_blank" style="background-image: url('<?= $item["snippet"]["thumbnails"]["high"]["url"]; ?>')"></div>
                		<div class="post_informations">
                			<span>Youtube</span>
                			<h2><?= strlen($item["snippet"]["title"])>30 ? substr($item["snippet"]["title"],0,30) : $item["snippet"]["title"] ?></h2>
                			<div class="square"></div>
                		</div>
                	</a>
        		</li>
    		<?php } ?>
    	</ul>
    </div>
<?php else : ?>
    <div id="youtube-listing">
    	<div class="columns column12 left">
        	<a class="posts" href="<?= "https://www.youtube.com/watch?v=".$items[0]["id"]["videoId"] ?>" target="_blank" style="background-image: url('<?= $items[0]["snippet"]["thumbnails"]["high"]["url"]; ?>')">
        		<h2><?= $items[0]["snippet"]["title"]; ?></h2>
        	</a>
    	</div>
    	<div class="columns column12 right">
        	<a class="posts" href="<?= "https://www.youtube.com/watch?v=".$items[1]["id"]["videoId"] ?>" target="_blank" style="background-image: url('<?= $items[1]["snippet"]["thumbnails"]["high"]["url"]; ?>')">
        		<h2><?= $items[1]["snippet"]["title"]; ?></h2>
        	</a>
    	</div>
    </div>
<?php endif; ?>