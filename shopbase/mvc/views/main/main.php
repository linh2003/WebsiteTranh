<!DOCTYPE html>
<html class="js" lang="en" fontify-lang="en">
<head>
	<?php require_once VIEW_PATH .'main/head.php'?>
</head>

<body class="gradient">
	<!-- HEADER -->
	<?php require_once VIEW_PATH .'main/header.php'?>
	
	<!-- MAIN CONTENT -->
	<main id="MainContent" class="content-for-layout focus-none" role="main" tabindex="-1">
		<?php
			if(isset($data['page'])){
				require_once VIEW_PATH .'main/' .$data['page'] .'.php';
			}
		?>
	</main>
	<!-- FOOTER -->
	<?php require_once VIEW_PATH .'main/footer.php'?>
</body>
</html>