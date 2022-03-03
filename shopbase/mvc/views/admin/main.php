<!DOCTYPE html>
<html>
<head>
<!-- HEADER -->
<?php require_once 'head.php';?>
</head>
<body>
	<!-- SIDEBAR -->
	<?php require_once 'sidebar.php';?>
	
	<!-- Right side -->
	<div id="rightSide">
		<!-- Account panel top -->
		<?php require_once 'header.php';?>
	    <!-- Main content -->
		<?php 
			if(isset($data['content'])){
				if(isset($data['url'])){
					require_once $data['url'] .'/'. $data['content'] .'.php';
				}else{
					require_once $data['content'] .'.php';
				}
			}
		?>
		<div class="clear mt30"></div>
		<!-- FOOTER -->
		<?php require_once 'footer.php';?>
	</div>
	<div class="clear"></div>
	<script type="text/javascript">
		var data = '<?php echo $data["url"];?>';
		if(data == 'products' || data == 'categories'){
			jQuery(document).ready(function($){
				// $('#menu > .product > a').on('click',function(e){
					// e.preventDefault();
					// $(this).addClass('this');
				// });
				$('#menu > .product > a').removeClass('inactive').addClass('active');
				$('#menu > .product > ul').slideDown();
			});
		}
	</script>
</body>
</html>