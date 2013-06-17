<?php 
	include_once('config.php');
	include_once('include/markdown.php');
?>
<html>
<head>
	<title><?php if(isset($_GET["post"])) {
		echo ucwords($_GET["post"]);
	} else {
		echo $config['title'];
	} ?></title>
</head>
<body>

	<?php if(isset($_GET["post"])) {
		$post = $_GET["post"];
		$post = file_get_contents($config['directory'] . '/' . $post . '.md');
		echo $post = Markdown($post);
	} ?>

</body>
</html>