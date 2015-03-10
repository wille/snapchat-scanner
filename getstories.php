<?php
require_once "config.php";
require_once "snapchat.php";

$snapchat = new Snapchat(USERNAME, $auth_token, false);

$snapchat->login(USERNAME, PASSWORD);

$stories = $snapchat->getFriendStories(false);

foreach ($stories as $story) {
	$id = $story->media_id;
	$from = $story->username;
	$mediaKey = $story->media_key;
	$mediaIV = $story->media_iv;
	
	echo "Story found, ID: " . $id . ", from: " . $from . "\n";
}

?>