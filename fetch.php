<?php
	$files = glob("images/*");
	
	foreach ($files as $file) {
		echo $file . "\n";
	}
?>