<?php
foreach($data['product'] as $row){
}
?>
<section class="shopify-section product-section spaced-section">
	<section class="page-width">
		<div class="product grid grid--1-col grid--2-col-tablet">
			<div class="grid__item product__media-wrapper">
				<slider-component class="slider-mobile-gutter">
					<ul class="product__media-list grid grid--peek list-unstyled slider slider--mobile" role="list">
					<?php
					$imglist = explode(',',$row['image_list']);
					foreach($imglist as $item){
					?>
						<li class="product__media-item grid__item slider__slide" data-media-id="template--15144346222774__main-11518592876693"">
							<modal-opener class="product__modal-opener product__modal-opener--image no-js-hidden" data-modal="#ProductModal-template--15144346222774__main">
								<span class="product__media-icon motion-reduce" aria-hidden="true">
									<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-plus" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66724 7.93978C4.66655 7.66364 4.88984 7.43922 5.16598 7.43853L10.6996 7.42464C10.9758 7.42395 11.2002 7.64724 11.2009 7.92339C11.2016 8.19953 10.9783 8.42395 10.7021 8.42464L5.16849 8.43852C4.89235 8.43922 4.66793 8.21592 4.66724 7.93978Z" fill="currentColor"></path>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M7.92576 4.66463C8.2019 4.66394 8.42632 4.88723 8.42702 5.16337L8.4409 10.697C8.44159 10.9732 8.2183 11.1976 7.94215 11.1983C7.66601 11.199 7.44159 10.9757 7.4409 10.6995L7.42702 5.16588C7.42633 4.88974 7.64962 4.66532 7.92576 4.66463Z" fill="currentColor"></path>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M12.8324 3.03011C10.1255 0.323296 5.73693 0.323296 3.03011 3.03011C0.323296 5.73693 0.323296 10.1256 3.03011 12.8324C5.73693 15.5392 10.1255 15.5392 12.8324 12.8324C15.5392 10.1256 15.5392 5.73693 12.8324 3.03011ZM2.32301 2.32301C5.42035 -0.774336 10.4421 -0.774336 13.5395 2.32301C16.6101 5.39361 16.6366 10.3556 13.619 13.4588L18.2473 18.0871C18.4426 18.2824 18.4426 18.599 18.2473 18.7943C18.0521 18.9895 17.7355 18.9895 17.5402 18.7943L12.8778 14.1318C9.76383 16.6223 5.20839 16.4249 2.32301 13.5395C-0.774335 10.4421 -0.774335 5.42035 2.32301 2.32301Z" fill="currentColor"></path>
									</svg>
								</span>
								<div class="product__media media media--transparent" style="padding-top: 74.98412698412699%;">
									<img src="<?php echo UPLOAD_URL .$item;?>" loading="lazy" alt="" />
								</div>
								<button class="product__media-toggle" type="button" aria-haspopup="dialog" data-media-id="11518592876693">
									<span class="visually-hidden">Open media 1 in gallery view
									</span>
								</button>
							</modal-opener>
						</li>
					<?php } ?>
					</ul>
				</slider-component>
			</div>
			<div class="product__info-wrapper grid__item">
				<div class="product__info-container product__info-container--sticky">
					<h1 class="product__title"><?php echo $row['name'];?></h1>
					<div class="no-js-hidden" id="price-template--15144346222774__main">
						<div class="price price--large <?php if($row['discount'] > 0) echo 'price--on-sale';?> ">
							<dl>
							<?php if($row['discount'] > 0){ ?>
								<div class="price__sale">
									<dd class="price__compare">
										<s class="price-item price-item--regular">
											<?php echo number_format($row['price']);?> VND
										</s>
									</dd>
									<dd>
										<span class="price-item price-item--sale">
											<?php echo number_format($row['price'] - $row['discount']);?> VND
										</span>
									</dd>
								</div>
							<?php }else{ ?>
								<div class="price__regular">
									<dd>
										<span class="price-item price-item--regular">
											<?php echo number_format($row['price']);?> VND
										</span>
									</dd>
								</div>
							<?php } ?>
							</dl>
							<?php if(intval($row['discount']) > 0){ ?>
							<span class="badge price__badge-sale color-background-2" aria-hidden="true">Sale</span>
							<?php } ?>
						</div>
					</div>
					<?php if($row['price'] > 800000){ ?>
					<div class="product__tax caption rte">Miễn phí vận chuyển cho đơn hàng từ 800.000</div>
					<?php } ?>
					<div class="product-form__input product-form__quantity">
						<label class="form__label" for="Quantity-template--15144346222774__main">Số lượng</label>
						<quantity-input class="quantity">
							<button class="quantity__button no-js-hidden" name="minus" type="button">
							<span class="visually-hidden">Giảm số lượng cho Tranh Bình Hoa - VQ261</span>
							<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-minus" fill="none" viewBox="0 0 10 2">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M.5 1C.5.7.7.5 1 .5h8a.5.5 0 110 1H1A.5.5 0 01.5 1z" fill="currentColor">
							</path></svg></button>
							<input class="quantity__input" type="number" name="quantity" id="Quantity-template--15144346222774__main" min="1" value="1" form="product-form-template--15144346222774__main">
							<button class="quantity__button no-js-hidden" name="plus" type="button">
							<span class="visually-hidden">tăng số lượng cho Tranh Bình Hoa - VQ261</span>
							<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-plus" fill="none" viewBox="0 0 10 10">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M1 4.51a.5.5 0 000 1h3.5l.01 3.5a.5.5 0 001-.01V5.5l3.5-.01a.5.5 0 00-.01-1H5.5L5.49.99a.5.5 0 00-1 .01v3.5l-3.5.01H1z" fill="currentColor">
							</path></svg></button>
						</quantity-input>
					</div>
					<product-form class="product-form">
						<div class="product-form__error-message-wrapper" role="alert" hidden="">
							<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-error" viewBox="0 0 13 13">
							<circle cx="6.5" cy="6.50049" r="5.5" stroke="white" stroke-width="2"></circle>
							<circle cx="6.5" cy="6.5" r="5.5" fill="#EB001B" stroke="#EB001B" stroke-width="0.7"></circle>
							<path d="M5.87413 3.52832L5.97439 7.57216H7.02713L7.12739 3.52832H5.87413ZM6.50076 9.66091C6.88091 9.66091 7.18169 9.37267 7.18169 9.00504C7.18169 8.63742 6.88091 8.34917 6.50076 8.34917C6.12061 8.34917 5.81982 8.63742 5.81982 9.00504C5.81982 9.37267 6.12061 9.66091 6.50076 9.66091Z" fill="white"></path>
							<path d="M5.87413 3.17832H5.51535L5.52424 3.537L5.6245 7.58083L5.63296 7.92216H5.97439H7.02713H7.36856L7.37702 7.58083L7.47728 3.537L7.48617 3.17832H7.12739H5.87413ZM6.50076 10.0109C7.06121 10.0109 7.5317 9.57872 7.5317 9.00504C7.5317 8.43137 7.06121 7.99918 6.50076 7.99918C5.94031 7.99918 5.46982 8.43137 5.46982 9.00504C5.46982 9.57872 5.94031 10.0109 6.50076 10.0109Z" fill="white" stroke="#EB001B" stroke-width="0.7">
							</path></svg>
							<span class="product-form__error-message"></span>
						</div>
						<form method="post" action="<?php echo SITE_URL .'cart/add';?>" class="form" enctype="multipart/form-data">
							<input type="hidden" name="pro_qty" class="product__quantity" value="">
							<input type="hidden" class="product__id" name="id" value="<?php echo $row['id'];?>">
							<div class="product-form__buttons">
								<button type="submit" name="add" class="product-form__submit button button--full-width button--secondary"><span>Thêm vào giỏ</span>
									<div class="loading-overlay__spinner hidden">
										<svg aria-hidden="true" focusable="false" role="presentation" class="spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
										<circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
										</svg>
									</div>
								</button>
								<!--<button name="addPopSells" popsells="FastCheckout" class="button button--full-width button--primary" type="button"><span>ĐẶT HÀNG NHANH</span>
									<div class="loading-overlay__spinner hidden">
									<svg aria-hidden="true" focusable="false" role="presentation" class="spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
									<circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
									</svg>
									</div>
								</button>-->
								<a href="<?php echo SITE_URL .'checkout'?>" class="button button--full-width button--primary">ĐẶT HÀNG </a>
							</div>
						</form>
					</product-form>
					<?php require_once VIEW_PATH .'main/block/services.php';?>
					<?php require_once VIEW_PATH .'main/block/product_des.php';?>
				</div>
			</div>
		</div>
	</section>
	<product-modal id="ProductModal-template__main" class="product-media-modal media-modal">
		<div class="product-media-modal__dialog" role="dialog" aria-label="Media gallery" aria-modal="true" tabindex="-1">
			<button id="ModalClose-template--15144346222774__main" type="button" class="product-media-modal__toggle" aria-label="Đóng">
				<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" fill="none" viewBox="0 0 18 17"><path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor"></path></svg>
			</button>
			<div class="product-media-modal__content" role="document" aria-label="Media gallery" tabindex="0">
			<?php
			$imglist = explode(',',$row['image_list']);
			foreach($imglist as $item){
			?>
				<img src="<?php echo UPLOAD_URL .$item;?>" alt="<?php echo $row['name'];?>" loading="lazy" width="1100">
			<?php } ?>
			</div>
		</div>
	</product-modal>
</section>
<section id="shopify-section-template__product-recommendations" class="shopify-section spaced-section">
	<product-recommendations class="product-recommendations page-width">
		<h2 class="product-recommendations__heading">Có Thể Bạn Quan Tâm</h2>
		<ul class="grid grid--2-col product-grid grid--4-col-desktop grid--quarter-max" role="list">
			<?php
			foreach($data['related'] as $items){
				if($items['id'] == $row['id'])
					continue;
			?>
				<li class="grid__item">
					<div class="card-wrapper">
						<div class="card-information">
							<div class="card-information__wrapper">
								<h3 class="card-information__text h5">
									<a href="<?php echo SITE_URL .'product/index/' .$items['slug'];?>" class="full-unstyled-link"><?php echo $items['name'];?>
									</a>
								</h3>
								<div class="price <?php if($items['discount']>0) echo 'price--on-sale';?>">
									<dl>
									<?php if($items['discount']>0){ ?>
										<div class="price__sale">
											<dd class="price__compare">
												<s class="price-item price-item--regular">
													<?php echo number_format($items['price']);?> VND
												</s>
											</dd>
											<dd>
												<span class="price-item price-item--sale">
													<?php echo number_format($items['price'] - $items['discount']);?> VND
												</span>
											</dd>
										</div>
									<?php }else{ ?>
										<div class="price__regular">
											<dd>
												<span class="price-item price-item--regular">
													<?php echo number_format($items['price']);?> VND
												</span>
											</dd>
										</div>	
									<?php } ?>
									</dl>
								</div>
							</div>
						</div>
						<div class="card card--product" tabindex="-1">
							<div class="card__inner">
								<div class="media media--transparent media--adapt media--hover-effect" style="padding-bottom: 133.4117647%;">
									<img src="<?php echo UPLOAD_URL .$items['image'];?>" alt="<?php echo $items['name'];?>" loading="lazy" class="motion-reduce" />
								</div>
								<?php if($items['discount']>0){ ?>
								<div class="card__badge">
									<span class="badge badge--bottom-left color-background-2">Sale</span>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>
	</product-recommendations>
</section>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var qty = jQuery('.quantity__input').val();
		var id = jQuery('.product__id').val();
		
		jQuery('.product__quantity').val(qty);
		jQuery('.quantity__input').on('change',function(){
			qty = jQuery(this).val();
			jQuery('.product__quantity').val(qty);
		});
		jQuery('.slider-mobile-gutter').click(function(){
			jQuery('body').addClass('overflow-hidden');
			var product_modal = jQuery('#ProductModal-template__main');
			if(!product_modal.attr('open')){
				product_modal.attr('open',true);
			}
		});
	});
</script>