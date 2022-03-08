<!-- Main content -->
<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>

<div class="line"></div>
<!-- Message -->
<?php 
	if(isset($_SESSION['message'])){
		require_once './mvc/views/admin/message.php';
	}
	unset($_SESSION['message']);
?>
<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widgets">
		 <!-- Stats -->
		
		<!-- Amount -->
		<div class="oneTwo">
			<div class="widget">
				<div class="title">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/dark/money.png" class="titleIcon" />
					<h6>Doanh số</h6>
				</div>
				
				<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
					<tbody>
						<tr>
							<td class="fontB blue f13">Tổng doanh số</td>
							<td class="textR webStatsLink red" style="width:120px;">44,000,000 đ</td>
						</tr>
						<tr>
							<td class="fontB blue f13">Doanh số hôm nay</td>
							<td class="textR webStatsLink red" style="width:120px;">0 đ</td>
						</tr>
						<tr>
							<td class="fontB blue f13">Doanh số theo tháng</td>
							<td class="textR webStatsLink red" style="width:120px;">0 đ</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- User -->
		<div class="oneTwo">
			<div class="widget">
				<div class="title">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/dark/users.png" class="titleIcon" />
					<h6>Thống kê dữ liệu</h6>
				</div>
				
				<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
					<tbody>
						<tr>
							<td>
								<div class="left">Tổng số sản phẩm</div>
								<div class="right f11"><a href="admin/product.html">Chi tiết</a></div>
							</td>
							
							<td class="textC webStatsLink">8</td>
						</tr>
						<tr>
							<td>
								<div class="left">Tổng số liên hệ</div>
								<div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
							</td>
							
							<td class="textC webStatsLink">0</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- Giao dich cho xy ly -->
		
		<div class="widget">
			<div class="title">
				<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
				<h6>Danh sách Giao dịch Chờ xử lý</h6>
			</div>
			
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo ADMIN_PATH;?>/images/icons/tableArrows.png" /></td>
						<td style="width:40px;">Mã số</td>
						<td style="width:200px;">Khách hàng</td>
						<td>Sản phẩm</td>
						<td style="width:90px;">Số tiền</td>
						<td style="width:90px;">Thanh toán</td>
						<td style="width:75px;">Trạng thái</td>
						<td style="width:75px;">Ngày tạo</td>
					</tr>
				</thead>
				
				<tbody class="list_item">
				<?php
				foreach($data['transactions'] as $key => $tran){
				?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $key;?>" /></td>
						<td class="textC"><?php echo $key;?></td>
				<?php
					// $customer = array();
					// $product = array();
					foreach($tran as $k => $val){
						if($k == 'customer'){
							while($customer = mysqli_fetch_assoc($val)){
				?>
						<td>
							<div class="customer_name"><?php echo $customer['name'];?></div>
							<div class="customer_phone"><b>SDT</b>: <?php echo $customer['phone'];?></div>
							<div class="customer_address"><b>Address</b>: <?php echo $customer['address'];?></div>
						</td>
				<?php
							}
						}else if($k == 'product'){
				?>
						<td>
				<?php
							$i = 1;
							foreach($val as $q => $pro){
								while($product = mysqli_fetch_assoc($pro['info'])){
				?>
							<div class="product_item">
								<?php echo $i .'.'?>
								<?php echo $product['name'];?> - Số lượng(<?php echo $pro['qty'];?>) - 
								Giá:<?php echo number_format($product['price']);?>VND
								<?php if($product['discount']>0) {echo ' - Sale:' .number_format($product['price']-$product['discount']) .'VND';}?>
							</div>
						
				<?php
								}
								$i++;
							}
				?>
						</td>
				<?php
						}
					}
				?>
						<td class="textR red"><?php echo number_format($tran['item']['amount']);?>VND</td>
						<td><?php echo ($tran['item']['payment']==0?'Tiền mặt':'Chuyển khoản')?></td>
						<td class="status textC">
							<a href="<?php echo ADMIN_URL . 'edit/'.$key;?>"><span class="pending">Chờ xử lý</span></a>
						</td>
						<td class="textC"><?php echo $tran['item']['time'];?></td>
					</tr>
				<?php } ?>
				</tbody>
				
			</table>
		</div>
		<!-- Giao dich thanh cong gan day nhat -->
		<div class="widget">
			<div class="title">
				<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
				<h6>Danh sách Giao dịch xử lý thành công</h6>
			</div>
			
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo ADMIN_PATH;?>/images/icons/tableArrows.png" /></td>
						<td style="width:40px;">Mã số</td>
						<td style="width:150px;">Khách hàng</td>
						<td>Sản phẩm</td>
						<td style="width:90px;">Số tiền</td>
						<td style="width:90px;">Thanh toán</td>
						<td style="width:75px;">Trạng thái</td>
						<td style="width:75px;">Ngày tạo</td>
						<td style="width:55px;">Action</td>
					</tr>
				</thead>
				
				<tfoot class="auto_check_pages">
					<tr>
						<td colspan="9">
							<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/tran/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
							</div>
						</td>
					</tr>
				</tfoot>
				
				<tbody class="list_item">
				<?php
				foreach($data['tran_success'] as $key => $tran){
				?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $key;?>" /></td>
						<td class="textC"><?php echo $key;?></td>
				<?php
					foreach($tran as $k => $val){
						if($k == 'customer'){
							while($customer = mysqli_fetch_assoc($val)){
				?>
						<td>
							<div class="customer_name"><?php echo $customer['name'];?></div>
							<div class="customer_phone"><b>SDT</b>: <?php echo $customer['phone'];?></div>
							<div class="customer_address"><b>Address</b>: <?php echo $customer['address'];?></div>
						</td>
				<?php
							}
						}else if($k == 'product'){
				?>
						<td>
				<?php
							$i = 1;
							foreach($val as $q => $pro){
								while($product = mysqli_fetch_assoc($pro['info'])){
				?>
							<div class="product_item">
								<?php echo $i .'.'?>
								<?php echo $product['name'];?> - Số lượng(<?php echo $pro['qty'];?>) - 
								Giá:<?php echo number_format($product['price']);?>VND
								<?php if($product['discount']>0) {echo ' - Sale:' .number_format($product['price']-$product['discount']) .'VND';}?>
							</div>
						
				<?php
								}
								$i++;
							}
				?>
						</td>
				<?php
						}
					}
				?>
						<td class="textR red"><?php echo number_format($tran['item']['amount']);?>VND</td>
						<td><?php echo ($tran['item']['payment']==0?'Tiền mặt':'Chuyển khoản')?></td>
						<td class="status textC">
							<span class="pending">DONE</span>
						</td>
						<td class="textC"><?php echo $tran['item']['time'];?></td>
						<td class="textC">
							<a href="<?php echo ADMIN_URL .'del/' .$key;?>" title="Xóa" class="tipS verify_action" >
								<img src="<?php echo ADMIN_PATH;?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
				
			</table>
		</div>
	</div>
</div>
		