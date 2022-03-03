<div class="shopify-section spaced-section spaced-section--full-width">
	<div class="collection-hero">
		<div class="collection-hero__inner page-width">
			<div class="collection-hero__text-wrapper">
				<h1 class="collection-hero__title"><?php echo $data['title'];?></h1>
			</div>
		</div>
	</div>
</div>
<div class="shopify-section spaced-section collection-grid-section">
	<div class="cloud-search-filters-sidebar-container">
		<!-- SIDEBAR -->
		<?php require_once VIEW_PATH .'/main/sidebar.php'?>
		
		<div class="cloud-search-filters-products">
			<div id="ProductGridContainer">
				<div class="collection page-width">
					<ul id="product-grid" data-id="template--15144346190006__product-grid" class="grid grid--2-col negative-margin product-grid grid--3-col-tablet grid--one-third-max grid--4-col-desktop grid--quarter-max">
						<?php
						foreach($data['product'] as $row){
						?>
						<li class="grid__item">
							<div class="card-wrapper">
								<div class="card-information">
									<div class="card-information__wrapper">
										<h3 class="card-information__text h5">
											<a href="<?php echo SITE_URL .'product/index/' .$row['slug'];?>" class="full-unstyled-link"><?php echo $row['name'];?>
											</a>
										</h3>
										<div class="price <?php if($row['discount']>0) echo 'price--on-sale';?>">
											<dl>
											<?php if($row['discount']>0){ ?>
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
										</div>
									</div>
								</div>
								<div class="card card--product" tabindex="-1">
									<div class="card__inner">
										<div class="media media--transparent media--adapt media--hover-effect" style="padding-bottom: 133.4117647%;">
											<img src="<?php echo UPLOAD_URL .$row['image'];?>" alt="<?php echo $row['name'];?>" loading="lazy" class="motion-reduce" />
										</div>
										<?php if($row['discount']>0){ ?>
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
					<div class="pagination-wrapper">
						<nav class="pagination" role="navigation" aria-label="Pagination">
							<?php
								if(isset($data['pagination'])){
									$pagination = $data['pagination'];
									$path = $data['current_url'].(count($data['url'])>1?'&':'?').'page=';
									$config = array(
										'path' 		=> '',
										'ul_class' 	=> 'pagination__list list-unstyled',
										'slug' 		=> $path
									);
									echo $pagination->create($config);
								}
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>