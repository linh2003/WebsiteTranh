<?php require_once 'top.php';?>
<?php 
	if(isset($data['error'])){
		// echo '<pre>';
		// print_r($data['error']);
		// echo '</pre>';
		foreach($data['error'] as $val){
			extract($val);
		}
	}
	$info = $data['info'];
?>
<div class="wrapper">
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/dark/add.png" class="titleIcon" />
					<h6>Chỉnh sửa sản phẩm</h6>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" value="<?php echo $info['name']?>" id="param_name" _autocheck="true" type="text" /></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error">
							<?php if(isset($data['error']['name'])) echo $data['error']['name'];?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Slug:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="slug" value="<?php echo $info['slug']?>" id="param_name" _autocheck="true" type="text" /></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error">
							<?php if(isset($data['error']['name'])) echo $data['error']['name'];?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Danh mục:</label>
					<div class="formRight">
						<select name="catalog">
							<!-- kiem tra danh muc co danh muc con hay khong -->
							<?php 
							if(isset($data['parent_cat'])){
								foreach($data['parent_cat'] as $val){
							?>
							<option value="<?php echo $val['id']?>" <?php echo ($val['id']==$info['cat_id'])?'selected':''?>>
								<?php echo $val['name']?>
							</option>
							<?php
								foreach($data['cat'] as $cat){
									if($val['id'] == $cat['parent_id']){
								?>
								<option value="<?php echo $cat['id']?>" <?php echo ($cat['id']==$info['cat_id'])?'selected':''?>>
									&nbsp;&nbsp;<?php echo $cat['name']?>
								</option>
							<?php } } ?>
							<?php } } ?>
						</select>
						<span name="cat_autocheck" class="autocheck"></span>
						<div name="cat_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Hình ảnh nhỏ:</label>
					<div class="formRight">
						<div class="left">
							<input type="file" name="picture" id="picture" />
						</div>
						<div class="cat_img" style="float:left;margin-left:7px">
							<img src="<?php echo PUBLIC_URL . '/upload/' . $info['image']?>" width="50px" alt="" />
						</div>
						<div name="picture_error" class="clear error"><?php if(isset($picture)) echo $picture; ?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">List Hình ảnh lớn:</label>
					<div class="formRight">
						<div class="left"><input type="file" name="imglist[]" id="imglist" multiple="multiple" /></div>
						<div class="img_list" style="float:left;margin-left:7px">
						<?php
							$imglist = explode(',',$info['image_list']);
							foreach($imglist as $image){
						?>
							<img src="<?php echo PUBLIC_URL . '/upload/' . $image;?>" width="50px" alt="" />
						<?php } ?>
						</div>
						<div name="imglist_error" class="clear error"><?php if(isset($img)) echo $img; ?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Giá bán:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo">
							<input name="price" value="<?php echo $info['price']?>" style='width:150px' id="param_price" class="format_number" _autocheck="true" type="text" />
						</span>
						<span name="price_autocheck" class="autocheck"></span>
						<div name="price_error" class="clear error">
							<?php if(isset($data['error']['price'])) echo $data['error']['price']; ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Giá khuyến mãi:</label>
					<div class="formRight">
						<span class="oneTwo">
							<input name="discount" style='width:150px' value="<?php echo $info['discount']?>" id="discount" _autocheck="true" class="format_number" type="text" />
						</span>
						<span name="discount_autocheck" class="autocheck"></span>
						<div name="discount_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Ngày tạo:</label>
					<div class="formRight">
						<input name="created" value="<?php echo $info['created']?>" id="created" _autocheck="true" type="date" />
						<div name="created_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Nội dung sản phẩm:</label>
					<div class="formRight">
						<textarea name="content" id="content" rows="20"><?php echo $info['content']?></textarea>
						<div name="content_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formSubmit">
					<input type="submit" name="update" value="Update" class="redB" />
				</div>
	        	<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>