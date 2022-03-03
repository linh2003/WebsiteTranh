<div class="template-search spaced-section">
	<div class="template-search__header page-width center">
		<h1 class="h2">Kết quả tìm kiếm</h1>
		<div class="template-search__search">
			<predictive-search data-loading-text="Đang tải...">
				<form action="" method="get" role="search" class="search">
					<div class="field">
						<input class="search__input field__input" id="Search-In-Template" type="search" name="search" value="tranh" placeholder="Tìm kiếm" role="combobox" aria-expanded="false" aria-owns="predictive-search-results-list" aria-controls="predictive-search-results-list" aria-haspopup="listbox" aria-autocomplete="list" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" aria-activedescendant="">
						<label class="field__label" for="Search-In-Template">Tìm kiếm</label>
						<div class="predictive-search predictive-search--search-template" tabindex="-1" data-predictive-search="">
							<div class="predictive-search__loading-state">
								<svg aria-hidden="true" focusable="false" role="presentation" class="spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
							</svg>
							</div>
						</div>
						<span class="predictive-search-status visually-hidden" role="status" aria-hidden="true"></span>
						<button type="submit" class="search__button field__button" aria-label="Tìm kiếm">
							<svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
						</button>
					</div>
				</form>
			</predictive-search>
		</div>
        <p role="status"><?php echo $data['total'];?> kết quả tìm thấy cho <strong><?php echo $data['search'];?></strong></p>
	</div>
</div>
<div id="ProductGridContainer">
	<div class="template-search__results collection page-width">
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