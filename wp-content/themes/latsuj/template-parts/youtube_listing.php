<?php 
    $apikey = 'AIzaSyD3wrJOnR8npXfBUibwSOr_fp84OML3Bug';
    $channelId = 'UCvmYjxbiFavUv9lipG1pezg';
    $maxResult = 20;
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?key='.$apikey.'&channelId='.$channelId.'&part=snippet,id&order=date&maxResults='.$maxResult;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    
    curl_close($ch);
    $data = json_decode($response);
    $items = $data->items;
?>

<div id="youtube-listing">
	<div class="columns column12 left">
    	<a class="posts" href="<?= "https://www.youtube.com/watch?v=".$items[0]->id->videoId ?>" target="_blank" style="background-image: url('<?= $items[0]->snippet->thumbnails->high->url; ?>')">
    		<h2><?= $items[0]->snippet->title; ?></h2>
    	</a>
	</div>
	<div class="columns column12 right">
    	<a class="posts" href="<?= "https://www.youtube.com/watch?v=".$items[1]->id->videoId ?>" target="_blank" style="background-image: url('<?= $items[1]->snippet->thumbnails->high->url; ?>')">
    		<h2><?= $items[1]->snippet->title; ?></h2>
    	</a>
	</div>
</div>