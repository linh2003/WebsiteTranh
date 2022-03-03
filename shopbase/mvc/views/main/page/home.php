
	<section id="banner_image" class="shopify-section spaced-section spaced-section--full-width">
		<div id="Banner-template--15144346255542__image_banner" class="banner banner--desktop-transparent">
			<div class="banner__media media">
				<img src="<?php echo PUBLIC_URL .'/images/banner.png'?>" alt="" />
			</div>
			<div class="banner__content banner__content--center page-width">
				<div class="banner__box color-background-1">
					<h2 class="banner__heading h1">
					  <span>Thương hiệu tranh trang trí số 1 VN</span>
					</h2>
					<div class="banner__text">
					  <span>TRANH ĐẸP TREO TƯỜNG VIET CANVAS</span>
					</div>
					<div class="banner__buttons">
						<a href="/collections/shop" class="button button--primary">Xem 20.000+ Bộ Tranh</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="featured_products" class="shopify-section spaced-section">
		<div class="collection page-width page-width-desktop">
			<div class="title-wrapper-with-link title-wrapper--self-padded-tablet-down">
				<h2 class="title">Sản Phẩm Nổi Bật</h2>
			</div>
			<slider-component class="slider-mobile-gutter">
				<ul class="grid grid--2-col product-grid grid--3-col-tablet grid--one-third-max grid--4-col-desktop grid--quarter-max slider slider--tablet grid--peek negative-margin--small" role="list">
				<?php
				foreach($data['featured_product'] as $row){
				?>
					<li class="grid__item slider__slide">
						<div class="card-wrapper">
							<div class="card-information">
								<div class="card-information__wrapper">
									<h3 class="card-information__text h5">
										<a href="<?php echo SITE_URL .'product/index/' .$row['slug']?>" class="full-unstyled-link"><?php echo $row['name']?></a>
									</h3>
									<span class="caption-large light"></span>
									<?php if(!empty($row['discount'])){ ?>
									<div class="price <?php echo 'price--on-sale';?>">
										<dl>
											<div class="price__sale">
												<dd class="price__compare">
													<s class="price-item price-item--regular"><?php echo number_format($row['price']);?></s>
												</dd>
												<dd>
													<span class="price-item price-item--sale"><?php echo number_format($row['price'] - $row['discount']);?> VND</span>
												</dd>
											</div>
										</dl>
									</div>
									<?php }else{ ?>
									<div class="price">
										<dl>
											<div class="price__regular">
												<dd>
													<span class="price-item price-item--regular"><?php echo number_format($row['price'] );?> VND</span>
												</dd>
											</div>
										</dl>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="card card--product card--outline" tabindex="-1">
								<div class="card__inner">
									 <div class="media media--transparent media--adapt media--hover-effect" style="padding-bottom: 111.2745098%;">
										<img src="<?php echo PUBLIC_URL .'/upload/'.$row['image']?>" alt="" />
									 </div>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
				</ul>
			</slider-component>
		</div>
	</section>
	<section id="featured_products" class="shopify-section spaced-section collection-list-section">
		<div class="collection-list-wrapper page-width page-width-desktop">
			<div class="title-wrapper-with-link title-wrapper--self-padded-tablet-down">
				<h2 class="collection-list-title">Bộ Sưu Tập</h2>
				<a href="" class="link underlined-link large-up-hide">Xem thêm</a>
			</div>
			<slider-component class="slider-mobile-gutter">
				<ul class="collection-list grid grid--1-col grid--3-col-tablet slider slider--tablet grid--peek collection-list--9-items" role="list">
				<?php
					foreach($data['parent_cat'] as $cat){
				?>
					<li class="collection-list__item grid__item slider__slide">
						<a href="<?php echo SITE_URL .'categories/index/' .$cat['meta_key'];?>" class="card animate-arrow link card--media">
							<div class="card--stretch card-colored color-background-1">
								<div class="card__media-spacer">
									<div class="media media--square media--hover-effect overflow-hidden">
										<img src="<?php echo UPLOAD_URL .$cat['picture'];?>" alt="" class="motion-reduce" />
									</div>
								</div>
								<div class="card__text card__text-spacing card-colored card__text-hover">
									<h3><?php echo $cat['name'];?>
										<span class="icon-wrap">&nbsp;<svg viewBox="0 0 14 10" fill="none" aria-hidden="true" focusable="false" role="presentation" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor">
										</path></svg>
										</span>
									</h3>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>
				</ul>
			</slider-component>
		</div>
	</section>
	<section class="shopify-section spaced-section spaced-section--full-width">
		<div class="multicolumn background-primary no-heading">
			<div class="page-width">
				<div class="title-wrapper-with-link title-wrapper--self-padded-mobile title-wrapper-with-link--no-heading">
					<h2 class="title"></h2>
				</div>
				<slider-component class="slider-mobile-gutter">
					<ul class="multicolumn-list grid grid--1-col grid--2-col-tablet grid--4-col-desktop" role="list">
						<li class="multicolumn-list__item grid__item center">
							<div class="multicolumn-card">
								<div class="multicolumn-card__info">
									<h3>Đa Dạng</h3>
									<div class="rte">
										<p>Kho tranh lớn nhất VN với hơn 20.000 bộ tranh và được cập nhật thường xuyên.&nbsp;</p>
									</div>
								</div>
							</div>
						</li>
						<li class="multicolumn-list__item grid__item center">
							<div class="multicolumn-card">
								<div class="multicolumn-card__info">
									<h3>Chất Lượng</h3>
									<div class="rte">
										<p>Cam kết tranh đẹp như mẫu. Bảo hành đổi trả nếu không hài lòng với chất lượng.</p>
									</div>
								</div>
							</div>
						</li>
						<li class="multicolumn-list__item grid__item center">
							<div class="multicolumn-card">
								<div class="multicolumn-card__info">
									<h3>Uy Tín</h3>
									<div class="rte">
										<p>Tự hào được hơn 200.000 khách hàng ủng hộ với hơn 10.000 reviews 5 sao.</p>
									</div>
								</div>
							</div>
						</li>
						<li class="multicolumn-list__item grid__item center">
							<div class="multicolumn-card">
								<div class="multicolumn-card__info">
									<h3>Tốc Độ</h3>
									<div class="rte">
										<p>Miễn phí hỗ trợ lắp đặt tại nhà trong 24h với đội ngũ thi công chuyên nghiệp.</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</slider-component>
				<div class="center"></div>
			</div>
		</div>
	</section>
