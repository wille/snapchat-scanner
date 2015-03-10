<?php
require_once "config.php";
require_once "snapchat.php";

function save($file, $data) {
	file_put_contents($file, $data);
}

$snapchat = new Snapchat(USERNAME, $auth_token, false);

$snapchat->login(USERNAME, PASSWORD);

$stories = $snapchat->getFriendStories(false);

foreach ($stories as $story) {
	$id = $story->media_id;
	$from = $story->username;
	$mediaKey = $story->media_key;
	$mediaIV = $story->media_iv;
	
	echo "Story found, ID: " . $id . ", from: " . $from . "\n";
	
	$save = true;
	
	if ($save) {	
		$path = $from + "/" + intval($id);
		
		file_put_contents($path, $snapchat->getStory($id, $mediaKey, $mediaIV, $from, $save));
		
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$finfo = finfo_file($finfo, $file);
		
		if ($finfo == "image/jpeg") {
			$ext = ".jpg";
		} else if ($finfo == "image/mp4") {
			$ext = ".mp4";
		} else {
			$ext = ".png";
		}
		
		rename($path, $path . $ext);
	}
}


?>