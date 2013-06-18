<?php

// This is where you can control site-wide variables, such as the title of your blog etc.

$config = [];

// set the title for your site
$config['title'] = "Jarrod";

// set the holding directory for your posts. If you change this, you need to create the directory that you change it to, and then change 'posts' in .htaccess to your new word.
$config['directory'] = "posts";






// DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING.
// 
// 
$posttitle = null;

function post_check() {
	if(isset($_GET["post"])) {
		return true;
	}
}

function show_the_post() {
	global $config;
	$post = $_GET["post"];
	$post = file_get_contents($config['directory'] . '/' . $post . '.md');
	echo $post = Markdown($post);
}
function tmcms_head() {
	global $config;
	global $posttitle;
	if(isset($_GET["post"])) {
		$posttitle = $_GET["post"];
		$posttitle = strtr($posttitle, '-', ' ');
		echo ucfirst($posttitle);
	} else {
		echo $config['title'];
	}
}
function feed_posts() {
	global $config;
	$availableposts = glob("posts/*.md");
	foreach ($availableposts as $post) {
		$posturl = substr($post, 0,-3);
		$postname = ucfirst(strtr(substr($post, strlen($config["directory"]) + 1, -3),'-',' '));
		echo '<a href="' . $posturl . '">' . $postname . '</a></br>';
		
	}
}


?>