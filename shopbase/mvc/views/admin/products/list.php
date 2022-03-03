<?php 
	$url = '/' . $data['url'];
?>
<?php require_once 'top.php';?>

<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
		<!-- Message -->
		<?php 
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
			if(isset($_SESSION['message'])){
				require_once './mvc/views/admin/message.php';
			}
			unset($_SESSION['message']);
		?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách sản phẩm</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $data['sumproduct']?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter">
				<tr>
					<td colspan="6">
						<form class="list_filter form" action="<?php echo ADMIN_URL . $url;?>" method="get">
							<table cellpadding="0" cellspacing="0" width="80%">
								<tbody>
									<tr>
										<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
										<td class="item"><input name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:'';?>" id="filter_id" type="text" style="width:55px;" /></td>
										<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
										<td class="item" style="width:155px;">
											<input name="name" value="<?php echo isset($_GET['name'])?$_GET['name']:'';?>" id="filter_iname" type="text" style="width:155px;" />
										</td>
										<td class="label" style="width:60px;"><label for="filter_status">Danh mục</label></td>
										<td class="item">
											<?php
											$cat_id = isset($_GET['cat_id'])?$_GET['cat_id']:'';
											?>
											<select name="cat_id">
												<option value="">-- Select --</option>
												<!-- kiem tra danh muc co danh muc con hay khong -->
												<?php
												if(isset($data['parent_cat'])){
													foreach($data['parent_cat'] as $parent_cat){
												?>
												<option value="<?php echo $parent_cat['id']?>" <?php echo ($cat_id==$parent_cat['id']?'selected':'')?>>
													<?php echo $parent_cat['name']?>
												</option>
												<?php
												foreach($data['cat'] as $cat){
													if($parent_cat['id'] == $cat['parent_id']){
												?>
													<option value="<?php echo $cat['id']?>" <?php echo ($cat_id==$cat['id']?'selected':'')?>>&nbsp;&nbsp;<?php echo $cat['name']?></option>
												<?php } } ?>
												
												<?php } } ?>
											</select>
										</td>
										<td style='width:150px'>
											<input type="submit" class="button blueB" value="Filter" />
											<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo ADMIN_URL . $url;?>'; ">
										</td>
									</tr>
								</tbody>
							</table>
						</form>
					</td>
				</tr>
			</thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo ADMIN_PATH;?>/images/icons/tableArrows.png" /></td>
					<td style="width:60px;">ID</td>
					<td>Tên</td>
					<td>Giá</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
								<span style='color:white;'>Xóa hết</span>
							</a>
						</div>
						<div class="pagination" style="">
						<?php
							if(isset($data['pagination'])){
								$pagination = $data['pagination'];
								$path = '/products/index/';
								echo $pagination->create(['slug'=>$path]);
							}
						?>
						</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
			<?php
			if(isset($data['product'])){
				while($row = mysqli_fetch_assoc($data['product'])){
			?>
			    <tr class="row_<?php echo $row['id'];?>">
					<td><input type="checkbox" name="id[]" value="<?php echo $row['id'];?>" /></td>
					<td class="textC"><?php echo $row['id'];?></td>
					<td>
						<div class="image_thumb">
							<img src="<?php echo PUBLIC_URL . '/upload/' .$row['image'];?>" height="50">
							<div class="clear"></div>
						</div>
						<a href="<?php echo $row['id'];?>" class="tipS" title="" target="_blank">
							<b><?php echo $row['name'];?></b>
						</a>
						<div class="f11" >Đã bán: <?php echo $row['buy'];?> | Xem: <?php echo $row['view'];?></div>
					</td>
					<td class="textR">
						<?php 
						if($row['discount'] > 0){
						?>
						<b style="color:red"><?php echo number_format($row['price'] - $row['discount']);?> đ</b>
						<p style='text-decoration:line-through'><?php echo number_format($row['price']);?> đ</p>
						<?php }else{ ?>
						<?php echo number_format($row['price']);?> đ
						<?php } ?>
					</td>
					<td class="textC"><?php echo $row['created'];?></td>
					<td class="option textC">
						<a href="product/view/9.html" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
							<img src="<?php echo ADMIN_PATH;?>/images/icons/color/view.png" />
						</a>
						<a href="<?php echo ADMIN_URL .$url.'/edit/'.$row['id'];?>" title="Edit" class="tipS">
							<img src="<?php echo ADMIN_PATH;?>/images/icons/color/edit.png" />
						</a>
						<a href="<?php echo ADMIN_URL .$url.'/del/'.$row['id'];?>" title="Delete" class="tipS verify_action" >
						    <img src="<?php echo ADMIN_PATH;?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php } } ?>
			</tbody>
		</table>
	</div>
</div>