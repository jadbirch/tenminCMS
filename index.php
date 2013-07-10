<?php 
	include_once('config.php');
	include_once('include/markdown.php');
?>
<html>
<head>
	<title><?php tmcms_head(); ?></title>
	<link rel="stylesheet" type="text/css" href="/assets/main.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- place the below code block inside your main div, section or container etc. -->
<div class="container">
<?php if(post_check() == true) {
	show_the_post();
} else { ?>
	<h2><?php echo $config['title'];?></h2>
	<h4>Latest posts</h4>
	<?php feed_posts();?>









<?php } ?>

<div class="footer">
<?php show_social();?>
</div>
</div>

</body>
</html>