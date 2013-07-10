<?php

// This is where you can control site-wide variables, such as the title of your blog etc.

$config = [];

// set the title for your site
$config['title'] = "Change this in line 8 of config.php";

// set the holding directory for your posts. If you change this, you need to create the directory that you change it to, and then change 'posts' in .htaccess to your new word.
$config['directory'] = "posts";

/* FOOTER LINKS These will not show in the footer unless you set them. I can't do magic! */

// Your website
$config['social']['web'] = "";

// Your social networks
$config['social']['facebook'] = "";
$config['social']['twitter'] = "";
$config['social']['gplus'] = "";




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
	global $author;
	global $date;
	$post = $_GET["post"];
	$post = file_get_contents($config['directory'] . '/' . $post . '.md');
	if (strpos($post, "@#end") != false) {
		$frontmatter = substr($post, 3, strpos($post, "@#end") - 5);
		$post = substr($post, strpos($post,"@#end") + 5,strlen($post));
		if (strpos($frontmatter, "author: ")!= false) {
			$author = substr($frontmatter, strpos($frontmatter, "author: ") + 8);
			$author = substr($author, 0, strpos($author, ";"));
		}
		if (strpos($frontmatter, "date: ")!= false) {
			$date = substr($frontmatter, strpos($frontmatter, "date: ") + 6);
			$date = substr($date, 0, strpos($date, ";"));
		}
	} 
	echo $post = Markdown($post);
	if (isset($author) || isset($date)) {
		echo '<i>';
	}
	if (isset($author)) {
		echo "by " . $author;
	}
	if (isset($date)) {
		echo " - " . $date;
	}
	if (isset($author) || isset($date)) {
		echo '</i><br><br>';
	}
	echo '<a class="button" href="/">&laquo; Back to the homepage</a>';
	echo '  <a class="button" href="http://twitter.com/share?url=' . 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] . '&text=' . strip_tags($teaser = strtok($post, "\n")). '">Tweet</a>';
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
	global $date;
	$availableposts = glob("posts/*.md");
	foreach ($availableposts as $post) {
		$posturl = substr($post, 0,-3);
		$postname = ucfirst(strtr(substr($post, strlen($config["directory"]) + 1, -3),'-',' '));
		echo '<a href="' . $posturl . '">' . $postname . '</a></br>';
		
	}
}

function show_social() {
	global $config;
	if (!empty($config['social']['web'])) {
		echo '<a href="' . $config["social"]["web"] . '"><span data-icon="&#xe003"></span></a>';
	}
	if (!empty($config['social']['facebook'])) {
		echo '<a href="' . $config["social"]["facebook"] . '"><span data-icon="&#xe006"></span></a>';
	}	
	if (!empty($config['social']['gplus'])) {
		echo '<a href="' . $config["social"]["gplus"] . '"><span data-icon="&#xe004"></span></a>';
	}

	if (!empty($config['social']['twitter'])) {
		echo '<a href="' . $config["social"]["twitter"] . '"><span data-icon="&#xe005"></span></a>';
	}
}

?>