<?php 

$apikey = 'AIzaSyD3wrJOnR8npXfBUibwSOr_fp84OML3Bug';
$channelId = 'UCvmYjxbiFavUv9lipG1pezg';
$maxResult = 2;
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
//$items = $data->items;

$json = json_encode($data);

if (file_put_contents("../json/youtube.json", $json)) {
    echo "JSON file created successfully...";
} else {
    echo "Oops! Error creating json file...";
}

?>