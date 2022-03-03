<?php 
	$slug = '/' . $data['url'];
?>
<?php require_once 'top.php';?>

<!-- Main content wrapper -->
<div class="wrapper">
	<!-- Message -->
	<?php 
		if(isset($_SESSION['message'])){
			require_once './mvc/views/admin/message.php';
		}
		unset($_SESSION['message']);
	?>
	<!-- Static table -->
	<div class="widget" id='main_content'>
	
		<div class="title">
		    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách Danh mục</h6>
			<div class="num f12">Tổng số: <b><?php echo $data['sum'];?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
				    <td style="width:21px;"><img src="<?php echo ADMIN_PATH;?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;">ID</td>
					<td style="width:100px;">Hình ảnh</td>
					<td>Tên</td>
					<td style="width:150px;">Slug</td>
					<td style="width:80px;">Thứ tự hiển thị</td>
					<td style="width:150px;">Action</td>
				</tr>
			</thead>
			
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?php echo ADMIN_PATH;?>/admin/cat/del_all.html">
									<span style='color:white;'>Delete All</span>
								</a>
						 </div>
							
					    <div class='pagination'>
							<?php
								if(isset($data['pagination'])){
									$pagination = $data['pagination'];
									echo $pagination->create(['slug'=>'categories']);
								}
							?>
						</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody>
			<?php 
			if(isset($data['cat'])){
				while($row = mysqli_fetch_assoc($data['cat'])){	
			?>
			    <tr class='row_18'>
			        <td><input type="checkbox" name="id[]" value="18" /></td>
					<td><?php echo $row['id'];?></td>
					<td><img src="<?php echo PUBLIC_URL.'/upload/'.$row['picture'] ?>" alt="" style="width:100px;"></td>
					<td><?php echo $row['name'];?></td> 
					<td><?php echo $row['meta_key'];?></td> 
					<td><?php echo $row['sort_order'];?></td> 
					<td class="option">
						<a href="<?php echo ADMIN_URL. $slug . '/edit/' . $row['id'];?>" title="edit" class="tipS ">
							<img src="<?php echo ADMIN_PATH;?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo ADMIN_URL . $slug .'/delete/'. $row['id'];?>" title="delete" class="tipS verify_action" >
						    <img src="<?php echo ADMIN_PATH;?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>				     
			<?php } }?>				
			</tbody>
		</table>
	</div>
</div>