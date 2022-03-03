<?php 
// echo '<pre>';
// print_r($data);
// echo '</pre>';
?>
<div id="shopify-section_cart-items" class="shopify-section">
	<link href="<?php echo CSS_URL;?>/component-cart.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo CSS_URL;?>/component-cart-items.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo CSS_URL;?>/component-totals.css" rel="stylesheet" type="text/css" media="all">
	<cart-items class="page-width <?php if(!isset($data['info'])) echo 'is-empty';?>">
		<?php if(!isset($data['info'])){ ?>
		<div class="cart__warnings">
			<h1 class="cart__empty-text">Giỏ hàng trống</h1>
			<a href="<?php echo SITE_URL .'categories';?>" class="button">Xem &amp; lựa thêm</a>
		</div>
		<?php }else{ ?>
		<div class="title-wrapper-with-link">
			<h1 class="title title--primary">Giỏ Hàng Của Tôi</h1>
			<a href="<?php echo SITE_URL .'categories';?>" class="underlined-link">Xem &amp; lựa thêm</a>
		</div>
		<form action="<?php echo SITE_URL .'cart/update/';?>" class="cart__contents critical-hidden" method="post" id="cart">
			<div class="cart__items" id="main-cart-items">
				<div class="js-contents">
					<table class="cart-items">
						<thead>
							<tr>
								<th class="caption-with-letter-spacing" colspan="2" scope="col">Sản phẩm</th>
								<th class="cart-price right caption-with-letter-spacing" colspan="1" scope="col">Gia</th>
								<th class="cart-items__heading--wide small-hide caption-with-letter-spacing" colspan="1" scope="col">Số lượng</th>
								<th class="small-hide right caption-with-letter-spacing" colspan="1" scope="col">Tổng</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach($data['info'] as $key => $row){
								$price = $row['price'] - $row['discount'];
						?>
							<tr class="cart-item" id="CartItem-1">
								<td class="cart-item__media">
									<a href="<?php echo SITE_URL .'product/index/'.$row['slug'];?>" class="cart-item__link" aria-hidden="true" tabindex="-1"> </a>
									<img class="cart-item__image" src="<?php echo UPLOAD_URL .$row['image'];?>" alt="" loading="lazy" width="150" height="100">
								</td>
								<td class="cart-item__details">
									<a href="<?php echo SITE_URL .'product/index/'.$row['slug'];?>" class="cart-item__name break"><?php echo $row['name'];?></a>
								</td>
								<td class="cart-item__totals right">
									<div class="cart-item__price-wrapper <?php if($row['discount'] > 0) echo 'price_sale'?>">
										<span class="price price--end"><?php echo number_format($row['price']);?>₫</span>
										<?php if($row['discount'] > 0){ ?>
										<span class="price price__sale"><?php echo number_format($price);?>₫</span>
										<?php } ?>
									</div>
								</td>
								<td class="cart-item__quantity">
									<label class="visually-hidden" for="Quantity-1">Số lượng</label>
									<quantity-input class="quantity">
										<button class="quantity__button no-js-hidden" name="minus" type="button">
											<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-minus" fill="none" viewBox="0 0 10 2"><path fill-rule="evenodd" clip-rule="evenodd" d="M.5 1C.5.7.7.5 1 .5h8a.5.5 0 110 1H1A.5.5 0 01.5 1z" fill="currentColor"></path></svg>
										</button>
										<input class="quantity__input" type="number" name="updates[<?php echo $key;?>]" value="<?php echo $row['qty'];?>" min="0" aria-label="<?php echo $row['name'];?>" id="Quantity-1" data-index="1">
										<button class="quantity__button no-js-hidden" name="plus" type="button">
											<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-plus" fill="none" viewBox="0 0 10 10"><path fill-rule="evenodd" clip-rule="evenodd" d="M1 4.51a.5.5 0 000 1h3.5l.01 3.5a.5.5 0 001-.01V5.5l3.5-.01a.5.5 0 00-.01-1H5.5L5.49.99a.5.5 0 00-1 .01v3.5l-3.5.01H1z" fill="currentColor"></path></svg>
										</button>
									</quantity-input>

									<cart-remove-button id="Remove-1" data-index="1">
										<a href="<?php echo SITE_URL .'cart/del/' .$key;?>" class="button button--tertiary">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" focusable="false" role="presentation" class="icon icon-remove"><path d="M14 3h-3.53a3.07 3.07 0 00-.6-1.65C9.44.82 8.8.5 8 .5s-1.44.32-1.87.85A3.06 3.06 0 005.53 3H2a.5.5 0 000 1h1.25v10c0 .28.22.5.5.5h8.5a.5.5 0 00.5-.5V4H14a.5.5 0 000-1zM6.91 1.98c.23-.29.58-.48 1.09-.48s.85.19 1.09.48c.2.24.3.6.36 1.02h-2.9c.05-.42.17-.78.36-1.02zm4.84 11.52h-7.5V4h7.5v9.5z" fill="currentColor"></path><path d="M6.55 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5zM9.45 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5z" fill="currentColor"></path></svg>
										</a>
									</cart-remove-button>
								</td>
								<td class="cart-item__totals right small-hide">
									<div class="loading-overlay hidden">
										<div class="loading-overlay__spinner">
											<svg aria-hidden="true" focusable="false" role="presentation" class="spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle></svg>
										</div>
									</div>
									<div class="cart-item__price-wrapper">
										<span class="price price--end"><?php echo number_format($price * $row['qty']);?>₫</span>
									</div>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5">
									<button type="submit" class="cart__update-button button button--secondary" form="cart">Cập nhật</button>
									<a href="<?php echo SITE_URL .'cart/del'?>" class="button delete_cart_all">Delete All</a>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</form>
		<?php } ?>
	</cart-items>
</div>
<div id="shopify-section_cart-footer" class="shopify-section cart__footer-wrapper">
	<div class="page-width" id="main-cart-footer">
		<div class="cart__footer">
		<?php if(isset($data['info'])){ $sum = 0; ?>
			<div class="cart__blocks">
				<div class="js-contents">
					<?php 
						foreach($data['info'] as $item){
							$price = $item['price'] - $item['discount'];
							$sum += $price * $item['qty'];
						}
					?>
					<div class="totals">
						<h3 class="totals__subtotal">Tổng đơn hàng</h3>
						<p class="totals__subtotal-value"><?php echo number_format($sum);?> VND</p>
					</div>
					<?php if($sum >= 800000){ ?>
					<small class="tax-note caption-large rte">Miễn phí vận chuyển cho đơn hàng từ 800.000</small>
					<?php } ?>
				</div>
				<div class="cart__ctas">
					<!--<button type="button" id="checkout" class="cart__checkout-button button" name="checkout" form="cart">Đặt hàng</button>-->
					<a href="<?php echo SITE_URL .'checkout'?>" id="checkout" class="cart__checkout-button button" name="checkout" form="cart">Đặt hàng</a>
				</div>
				<div id="cart-errors"></div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>