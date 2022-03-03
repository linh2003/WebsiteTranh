<?php
$sum = 0; 
if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $d){
		$sum += $d['qty'];
	}
}
?>
<?php
if(isset($_SESSION['cart_on']) && $_SESSION['cart_on'] == true){
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#cart-notification').addClass('animate active');
		jQuery('.cart-notification__close').click(function(){
			jQuery('#cart-notification').removeClass('animate active');
		});
	});
</script>
<?php
	$_SESSION['cart_on'] = false;
}
?>
<div id="shopify-section-announcement-bar" class="shopify-section">
	<div class="announcement-bar color-accent-2 gradient" role="region" aria-label="Announcement">
		<a href="tel:0983859614" class="announcement-bar__link link link--text focus-inset animate-arrow">
			<p class="announcement-bar__message h5">
				Để hỗ trợ nhanh, liên hệ hotline 0983.859.614
				<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
				</path>
				</svg>
			</p>
		</a>
	</div>
</div>
<div id="shopify-section-header" class="shopify-section">
<!-- <script type="text/javascript" src="<?php echo JS_URL;?>/details-modal.js"></script>-->
	<svg xmlns="http://www.w3.org/2000/svg" class="hidden">
	  <symbol id="icon-search" viewBox="0 0 18 19" fill="none">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M11.03 11.68A5.784 5.784 0 112.85 3.5a5.784 5.784 0 018.18 8.18zm.26 1.12a6.78 6.78 0 11.72-.7l5.4 5.4a.5.5 0 11-.71.7l-5.41-5.4z" fill="currentColor"></path>
	  </symbol>

	  <symbol id="icon-close" class="icon icon-close" fill="none" viewBox="0 0 18 17">
		<path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor">
	  </path></symbol>
	</svg>
	<sticky-header class="header-wrapper color-inverse gradient">
		<header class="header header--middle-left page-width header--has-menu">
			<!-- MENU MOBILE -->
			<header-drawer data-breakpoint="tablet">
				<details class="menu-drawer-container">
					<summary class="header__icon header__icon--menu header__icon--summary link focus-inset" aria-label="Menu" role="button" aria-expanded="false" aria-controls="menu-drawer">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-hamburger" fill="none" viewBox="0 0 18 16">
							<path d="M1 .5a.5.5 0 100 1h15.71a.5.5 0 000-1H1zM.5 8a.5.5 0 01.5-.5h15.71a.5.5 0 010 1H1A.5.5 0 01.5 8zm0 7a.5.5 0 01.5-.5h15.71a.5.5 0 010 1H1a.5.5 0 01-.5-.5z" fill="currentColor">
							</path></svg>
							<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" fill="none" viewBox="0 0 18 17">
							<path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor">
							</path></svg>
						</span>
					</summary>
					<div id="menu-drawer" class="menu-drawer motion-reduce" tabindex="-1">
						<div class="menu-drawer__inner-container">
							<div class="menu-drawer__navigation-container">
								 <nav class="menu-drawer__navigation">
								 	<ul class="menu-drawer__menu list-menu" role="list">
								 		<li>
											<a href="" class="menu-drawer__menu-item list-menu__item link link--text focus-inset">Shop</a>
										</li>
										<li>
											<details>
												<summary class="menu-drawer__menu-item list-menu__item link link--text focus-inset" role="button" aria-expanded="false" aria-controls="link-Chủ Đề">Chủ Đề
													<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
													</path></svg>
													<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-caret" viewBox="0 0 10 6">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M9.354.646a.5.5 0 00-.708 0L5 4.293 1.354.646a.5.5 0 00-.708.708l4 4a.5.5 0 00.708 0l4-4a.5.5 0 000-.708z" fill="currentColor">
													</path></svg>
												</summary>
												 <div id="link-Chủ Đề" class="menu-drawer__submenu motion-reduce" tabindex="-1">
												 	<div class="menu-drawer__inner-submenu">
														<button class="menu-drawer__close-button link link--text focus-inset" aria-expanded="true">
															<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
															</path></svg>Chủ Đề
														</button>
														<ul class="menu-drawer__menu list-menu" role="list" tabindex="-1">
															<?php 
															while($item = mysqli_fetch_assoc($data['parent_cat'])){
															?>
															<li>
																<details>
																	<summary class="menu-drawer__menu-item link link--text list-menu__item focus-inset" role="button" aria-expanded="false" aria-controls="childlink-<?php echo $item['name']?>"><?php echo $item['name']?>
																		<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
																		</path></svg>
																		<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-caret" viewBox="0 0 10 6">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M9.354.646a.5.5 0 00-.708 0L5 4.293 1.354.646a.5.5 0 00-.708.708l4 4a.5.5 0 00.708 0l4-4a.5.5 0 000-.708z" fill="currentColor">
																		</path></svg>
																	</summary>
																	<div id="childlink-<?php echo $item['name']?>" class="menu-drawer__submenu motion-reduce">
																		<button class="menu-drawer__close-button link link--text focus-inset" aria-expanded="true">
																			<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
																			</path></svg><?php echo $item['name']?>
																		</button>
																		<ul class="menu-drawer__menu list-menu" role="list" tabindex="-1">
																		<?php 
																		foreach($data['cat'] as $cat){ 
																			if($cat['parent_id'] == $item['id']){
																		?>
																			<li>
																				<a href="" class="menu-drawer__menu-item link link--text list-menu__item focus-inset">
																				<?php echo $cat['name']?>
																				</a>
																			</li>
																		<?php } } ?>
																		</ul>
																	</div>
																</details>
															</li>
															<?php } ?>
														</ul>
												 	</div>
												 </div>
											</details>
										</li>
								 	</ul>
								 </nav>
							</div>
						</div>
					</div>
				</details>
			</header-drawer>
			<!-- LOGO -->
			<h1 class="header__heading">
				<a href="<?php echo SITE_URL;?>" class="header__heading-link link link--text focus-inset">SwingPiano</a>
			</h1>
			<!-- MENU DESKTOP -->
			<nav class="header__inline-menu">
				<ul class="list-menu list-menu--inline" role="list">
					<li>
						<a href="<?php echo SITE_URL .'categories'?>" class="header__menu-item header__menu-item list-menu__item link link--text focus-inset">
						<span>Shop</span></a>
					</li>
					<li>
						<details-disclosure>
							<details>
								<summary class="header__menu-item list-menu__item link focus-inset">
									<span>Chủ Đề</span>
									<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-caret" viewBox="0 0 10 6">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M9.354.646a.5.5 0 00-.708 0L5 4.293 1.354.646a.5.5 0 00-.708.708l4 4a.5.5 0 00.708 0l4-4a.5.5 0 000-.708z" fill="currentColor">
									</path></svg>
								</summary>
								<ul class="header__submenu list-menu list-menu--disclosure caption-large motion-reduce" role="list" tabindex="-1">
									<?php 
									foreach($data['parent_cat'] as $item){ 
										foreach($data['sum_child'] as $key => $val){ 
											if($key == $item['id']){
												if($val == 0){
									?>
									<li><a href="<?php echo SITE_URL .'/categories/index/' .$item['meta_key'];?>" class="header__menu-item list-menu__item link link--text focus-inset caption-large"><?php echo $item['name'];?></a></li>
									<?php }else{ ?>
									<li>
										<details>
											<summary class="header__menu-item link link--text list-menu__item focus-inset caption-large"><?php echo $item['name'];?>
											<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-caret" viewBox="0 0 10 6">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M9.354.646a.5.5 0 00-.708 0L5 4.293 1.354.646a.5.5 0 00-.708.708l4 4a.5.5 0 00.708 0l4-4a.5.5 0 000-.708z" fill="currentColor">
											</path></svg></summary>
											<ul class="header__submenu list-menu motion-reduce">
											<?php 
											foreach($data['cat'] as $cat){ 
												if($cat['parent_id'] == $item['id']){
											?>
												<li>
													<a href="<?php echo SITE_URL .'/categories/index/' .$cat['meta_key'];?>" class="header__menu-item list-menu__item link link--text focus-inset caption-large"><?php echo $cat['name'];?></a>
												</li>
											<?php } } ?>
											</ul>
										</details>
									</li>
									<?php } } } } ?>
								</ul>
							</details>
						</details-disclosure>
					</li>
				</ul>
			</nav>
			<div class="header__icons">
				<details-modal class="header__search">
					<details>
						<summary class="header__icon header__icon--search header__icon--summary link focus-inset modal__toggle" aria-haspopup="dialog" aria-label="Tìm kiếm" role="button" aria-expanded="false">
							<span>
								<svg class="modal__toggle-open icon icon-search" aria-hidden="true" focusable="false" role="presentation"><use href="#icon-search"></use></svg>
								<svg class="modal__toggle-close icon icon-close" aria-hidden="true" focusable="false" role="presentation"><use href="#icon-close"></use></svg>
							</span>
						</summary>
						<div class="search-modal modal__content" role="dialog" aria-modal="true" aria-label="Tìm kiếm">
							<div class="modal-overlay"></div>
							<div class="search-modal__content" tabindex="-1">
								<predictive-search class="search-modal__form" data-loading-text="Đang tải...">
									<form action="<?php echo SITE_URL .'search';?>" method="get" role="search" class="search search-modal__form">
										<div class="field">
											<input class="search__input field__input" id="Search-In-Modal" type="search" name="search" value="" placeholder="Tìm kiếm" role="combobox" aria-expanded="false" aria-owns="predictive-search-results-list" aria-controls="predictive-search-results-list" aria-haspopup="listbox" aria-autocomplete="list" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false">
											<label class="field__label" for="Search-In-Modal">Tìm kiếm</label>
											<button class="search__button field__button" aria-label="Tìm kiếm">
												<svg class="icon icon-search" aria-hidden="true" focusable="false" role="presentation"><use href="#icon-search"></use></svg>
											</button> 
										</div>
										<div class="predictive-search predictive-search--header" tabindex="-1" data-predictive-search="">
											<div class="predictive-search__loading-state">
												<svg aria-hidden="true" focusable="false" role="presentation" class="spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
												<circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
												</svg>
											</div>
										</div>
										<span class="predictive-search-status visually-hidden" role="status" aria-hidden="true"></span>
									</form>
								</predictive-search>
								<button type="button" class="search-modal__close-button modal__close-button link link--text focus-inset" aria-label="Đóng"><svg class="icon icon-close" aria-hidden="true" focusable="false" role="presentation"><use href="#icon-close"></use></svg>
								</button>
							</div>
						</div>
					</details>
				</details-modal>
				<a href="<?php echo SITE_URL .'cart'?>" class="header__icon header__icon--cart link focus-inset" id="cart-icon-bubble">
					<svg class="icon icon-cart" aria-hidden="true" focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none"><path fill="currentColor" fill-rule="evenodd" d="M20.5 6.5a4.75 4.75 0 00-4.75 4.75v.56h-3.16l-.77 11.6a5 5 0 004.99 5.34h7.38a5 5 0 004.99-5.33l-.77-11.6h-3.16v-.57A4.75 4.75 0 0020.5 6.5zm3.75 5.31v-.56a3.75 3.75 0 10-7.5 0v.56h7.5zm-7.5 1h7.5v.56a3.75 3.75 0 11-7.5 0v-.56zm-1 0v.56a4.75 4.75 0 109.5 0v-.56h2.22l.71 10.67a4 4 0 01-3.99 4.27h-7.38a4 4 0 01-4-4.27l.72-10.67h2.22z"></path></svg>
					<span class="visually-hidden">Giỏ hàng</span>
					<?php 
					if(isset($_SESSION['cart'])){ 
					?>
					<div class="cart-count-bubble">
						<span aria-hidden="true"><?php echo $sum;?></span>
						<span class="visually-hidden"><?php echo $sum;?> sản phẩm</span>
					</div>
					<?php } ?>
				</a>
			</div>
		</header>
	</sticky-header>
	<cart-notification>
		<div class="cart-notification-wrapper page-width color-inverse">
			<div id="cart-notification" class="cart-notification focus-inset" aria-modal="true" aria-label="Sản phẩm đã được thêm vào giỏ" role="dialog" tabindex="-1">
				<div class="cart-notification__header">
					<h2 class="cart-notification__heading caption-large"><svg class="icon icon-checkmark color-foreground-text" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 9" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M11.35.643a.5.5 0 01.006.707l-6.77 6.886a.5.5 0 01-.719-.006L.638 4.845a.5.5 0 11.724-.69l2.872 3.011 6.41-6.517a.5.5 0 01.707-.006h-.001z" fill="currentColor"></path>
					</svg>Sản phẩm đã được thêm vào giỏ</h2>
					<button type="button" class="cart-notification__close modal__close-button link link--text focus-inset" aria-label="Đóng">
						<svg class="icon icon-close" aria-hidden="true" focusable="false"><use href="#icon-close"></use></svg>
					</button>
				</div>
				<div id="cart-notification-product" class="cart-notification-product">
					<?php 
					if(isset($_SESSION['cart_notify'])){
					?>
					<img class="cart-notification-product__image" src="<?php echo UPLOAD_URL .$_SESSION['cart_notify']['image'];?>" alt="" width="70" height="47" loading="lazy">
					<div class="cart-notification-product__info">
						<h3 class="cart-notification-product__name h4">
							<?php echo $_SESSION['cart_notify']['name'];?>
						</h3>
					</div>
					<?php } ?>		
				</div>
				<div class="cart-notification__links">
					<a href="<?php echo SITE_URL .'cart';?>" id="cart-notification-button" class="button button--secondary button--full-width">Xem giỏ hàng <?php if(isset($_SESSION['cart'])) echo $sum;?></a>
					<form action="https://vietcanvas.net/cart" method="post" id="cart-notification-form">
						<button class="button button--primary button--full-width" name="checkout" type="button">Đặt hàng</button>
					</form>
					<button type="button" class="link button-label">Xem &amp; lựa thêm</button>
				</div>
			</div>
		</div>
	</cart-notification>
<style data-shopify="">
  .cart-notification {
     display: none;
  }
</style>
</div>