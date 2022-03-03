<?php require_once 'top.php';?>
<?php 
	if(isset($data['error'])){
		foreach($data['error'] as $val){
			extract($val);
		}
	}
?>
<div class="wrapper">
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/dark/add.png" class="titleIcon" />
					<h6>Thêm mới danh mục</h6>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Tên danh mục:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php if(isset($name)) echo $name;?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Danh mục cha:</label>
					<div class="formRight">
						<select name="parent_cat">
							<option value="0">-- Danh mục cha --</option>
							<?php 
							if(isset($data['parent_cat'])){
								while($row = mysqli_fetch_assoc($data['parent_cat'])){
							?>
							<option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
							<?php } } ?>
						</select>
						<span name="parent_cat_autocheck" class="autocheck"></span>
						<div name="parent_cat_error" class="clear error"><?php if(isset($img)) echo $img;?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Hình ảnh:</label>
					<div class="formRight">
						<div class="left"><input type="file" name="picture" id="picture" /></div>
						<div name="picture_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Thứ tự hiển thị:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="sort_order" id="param_name" _autocheck="true" type="text" /></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formSubmit">
					<input type="submit" name="add" value="Thêm mới" class="redB" />
				</div>
	        	<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>