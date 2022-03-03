<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH . '/css/buttons.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH . '/css/dashicons.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH . '/css/forms.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH . '/css/login.min.css' ?>">
</head>
<body class="login wp-core-ui">
<div id="login">
	<h1>Logo</h1>
<?php
if(!empty($data['error'])){
?>
	<div id="login_error">	
		<strong>Error</strong>: <?php echo $data['error'] ?>.<br>
	</div>
<?php } ?>
	<form name="loginform" id="loginform" action="" method="post">
		<p>
			<label for="user_login">Username or Email Address</label>
			<input type="text" name="username" id="user_login" class="input" value="" size="20" autocapitalize="off">
		</p>

		<div class="user-pass-wrap">
			<label for="user_pass">Password</label>
			<div class="wp-pwd">
				<input type="password" name="password" id="user_pass" class="input password-input" value="" size="20">
				<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
					<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
				</button>
			</div>
		</div>
		<p class="submit">
			<input type="submit" name="submit" id="wp-submit" class="button button-primary button-large" value="Log In">
		</p>
	</form>
	<script type="text/javascript">
		function wp_attempt_focus() {
			setTimeout( function() {
				try {d = document.getElementById( "user_login" );d.focus(); d.select();} catch( er ) {}
			}, 200);
		}
		wp_attempt_focus();
	</script>
</div>
</body>
</html>