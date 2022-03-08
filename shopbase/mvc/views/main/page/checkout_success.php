<div class="checkout_success">
	<h2 class="checkout-text">Đặt hàng thành công. Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian sớm nhất.<br/>Xin cảm ơn!</h2>
	<?php if ($data['sendmail']) {
		echo '<h3>.Da gui mail thanh cong cho Admin.</h3>';
	}else{echo '<h3>Da gui mail that bai cho Admin</h3>';}?>
	<a href="<?php echo SITE_URL .'categories';?>" class="button">Xem &amp; lựa thêm</a>
</div>