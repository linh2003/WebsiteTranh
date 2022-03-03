<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.cloud-search-filter__values').hide();
		jQuery('.cloud-search-filter__name').click(function(){
			var expand = jQuery(this).children('span:first-child');
			if(jQuery(expand).hasClass('cloud-search-filter__expand')){
				jQuery(expand).removeClass().addClass('cloud-search-filter__collapse');
			}else{
				jQuery(expand).removeClass().addClass('cloud-search-filter__expand');
			}
			jQuery(this).next('div').slideToggle('fast');
		});
	});
</script>
<div id="cloud_search_filters_sidebar">
	<div class="cloud-search-filters-sidebar">
		<div class="cloud-search-filters-sidebar__heading">Filters</div>
		<div class="cloud-search-filters-sidebar__filters">
			<div class="cloud-search-filter" data-filter-name="Giá">
				<form action="" method="get" class="form-filter-price">
					<div class="cloud-search-filter__name">
						<span class="cloud-search-filter__expand"></span><span>Giá</span>
					</div>
					<div class="cloud-search-filter__values filter-price">
						<div class="cloud-search-filter-value">
							<label>Min:&nbsp;</label>
							<select name="min_price">
								<option value="0">Select min price</option>
								<option value="500000" <?php if(intval(@$data['url']['min_price'])==500000) echo 'selected';?>>500000</option>
								<option value="1000000" <?php if(intval(@$data['url']['min_price'])==1000000) echo 'selected';?>>1000000</option>
								<option value="1500000" <?php if(intval(@$data['url']['min_price'])==1500000) echo 'selected';?>>1500000</option>
							</select>
						</div>
						<div class="cloud-search-filter-value">
							<label>Max:</label>
							<select name="max_price">
								<option value="0">Select max price</option>
								<option value="1000000" <?php if(intval(@$data['url']['max_price'])==1000000) echo 'selected';?>>1000000</option>
								<option value="1500000" <?php if(intval(@$data['url']['max_price'])==1500000) echo 'selected';?>>1500000</option>
								<option value="2000000" <?php if(intval(@$data['url']['max_price'])==2000000) echo 'selected';?>>2000000</option>
								<option value="1500000" <?php if(intval(@$data['url']['max_price'])==3000000) echo 'selected';?>>3000000</option>
							</select>
						</div>
						<div class="cloud-search-filter-btn">
							<input type="submit" class="btn-filter-price" value="Filter" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo SITE_URL .'/'.$data['url'];?>">
						</div>
					</div>						
				</form>
			</div>
			<?php 
			foreach($data['parent_cat'] as $items){
			?>
			<div class="cloud-search-filter" data-filter-name="<?php echo $items['meta_key']?>">
				<div class="cloud-search-filter__name">
					<span class="cloud-search-filter__expand"></span><span><?php echo $items['name']?></span>
				</div>
				<div class="cloud-search-filter__values">
				<?php 
				foreach($data['cat'] as $cats){
					if($cats['parent_id'] == $items['id']){
				?>
					<div class="cloud-search-filter-value">
						<a class="cloud-search-filter-value <?php if(@$data['slug']==$cats['meta_key']) echo 'cloud-search-filter-value--selected';?>" href="<?php echo SITE_URL .'categories/index/'.$cats['meta_key'];?>">
							<input type="checkbox" <?php if(@$data['slug']==$cats['meta_key']) echo 'checked';?>>
							<span class="cloud-search-filter-value__name"><?php echo $cats['name']?></span>&nbsp;<span class="cloud-search-filter-value__count">(<?php echo $data['count_product'][$cats['id']]?>)</span>
						</a>
					</div>
				<?php } } ?>
				</div>
			</div>
			<?php } ?>			
		</div>
	</div>
</div>