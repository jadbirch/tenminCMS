<?php 
	include_once('config.php');
	include_once('include/markdown.php');
?>
<html>
<head>
	<title><?php tmcms_head(); ?></title>
</head>
<body>
<!-- place the below code block inside your main div, section or container etc. -->
<div style="width:80%;margin:0 auto;">
<?php if(post_check() == true) {
	show_the_post();
} else { ?>
	<h1>This is the homepage.</h1>
	<?php feed_posts();?>









<?php } ?>
<div>
	This div shows on both the homepage and the post page.
</div>
</div>

</body>
</html>