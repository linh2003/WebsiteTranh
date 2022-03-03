<?php $url = '/' . $data['url'];?>
<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Danh mục</h5>
			<span>Quản lý Danh mục</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?php echo ADMIN_URL . $url . '/add'?>">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
				
				<li><a href="<?php echo ADMIN_URL . $url;?>">
					<img src="<?php echo ADMIN_PATH;?>/images/icons/control/16/list.png" />
					<span>Danh sách</span>
				</a></li>
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>