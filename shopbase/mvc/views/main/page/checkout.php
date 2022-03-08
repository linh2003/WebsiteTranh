<div class="rootDiv">
	<div class="coreDiv">
		<form action="<?php ?>" method="post" class="checkout_form">
			<div class="pTitle"><span style="font-size: 24px !important;">Đặt hàng</span></div>
			<div class="pBody">
				<div class="info_customer" style="margin-right: 30px; margin-left: 30px;">
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="lSpan">Tên người nhận</span><span>*</span></div>
						<div class="col-sm-9 colPlace"><input type="text" name="name" placeholder="Nguyễn Văn A" class="checkout_name form-control fieldSize" value="<?php if(isset($data['post'])) echo $data['post']['name'];?>"></div>
						<div class="message_error"><?php if(isset($data['error']['name'])) echo $data['error']['name'];?></div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="lSpan">Email</span></div>
						<div class="col-sm-9 colPlace"><input type="email" name="email" placeholder="NguyenVanA@gmail.com" class="checkout_email form-control fieldSize" value="<?php if(isset($data['post'])) echo $data['post']['email'];?>"></div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Số điện thoại liên hệ</span><span>*</span></div>
						<div class="col-sm-9 colPlace field_phone">
							<div class="phone_input">
								<input type="tel" name="phone" placeholder="0983859614" class="phone form-control fieldSize" value="<?php if(isset($data['post'])) echo $data['post']['phone'];?>">
								<input type="button" name="phone_suggest" class="btn_phone_suggest" id="btn_phone_suggest" value="Tìm">
							</div>
							<div class="message_error"><?php if(isset($data['error']['phone'])) echo $data['error']['phone'];?></div>
							<div class="phone_suggest">Nhập SĐT và nhấn Tìm để tìm kiếm thông tin của bạn</div>
						</div>
						
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Địa chỉ nhận hàng</span><span>*</span></div>
						<div class="col-sm-9 colPlace">
							<!--<input type="text" name="address" placeholder="1B Trần Não, Phường An Phú, TP Thủ Đức, HCM" class="form-control fieldSize">-->
							<textarea rows="5" cols="15" name="address" placeholder="1B Trần Não, Phường An Phú, TP Thủ Đức, HCM" class="checkout_address form-control fieldSize"><?php if(isset($data['post'])) echo $data['post']['address'];?></textarea>
							<div class="message_error"><?php if(isset($data['error']['phone'])) echo $data['error']['address'];?></div>
						</div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Hình thức thanh toán</span><span>*</span></div>
						<div class="col-sm-9 colPlace">
							<select name="payment" class="form-control fieldSize">
								<option value="0">Thanh toán tiền mặt</option>
								<option value="1">Chuyển khoản</option>
							</select>
						</div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Lời nhắn</span></div>
						<div class="col-sm-9 colPlace">
							<textarea rows="5" name="message" cols="15" class="form-control fieldSize"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="pFooter">
				<button type="submit" name="checkout" class="pButton" style="border: 0px; background: rgb(0, 0, 0); color: rgb(255, 255, 255);"><span>Hoàn tất</span> <svg width="13px" height="24px" viewBox="0 0 13 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="leadify-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Artboard-Copy-3" transform="translate(-1595.000000, -865.000000)" fill="currentColor" stroke="currentColor"><g id="Group-7" transform="translate(1416.000000, 838.000000)"><g id="noun_Next_880265" transform="translate(179.000000, 28.000000)"><polygon id="Path" points="1.54508197 0 0 1.43255814 9.96311475 11 0 20.5674419 1.54508197 22 13 11"></polygon></g></g></g></g></svg></button>
				<!--<input type="submit" name="checkout" class="pButton" value="Hoàn tất" />-->
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('#btn_phone_suggest').hide();
		jQuery('input.phone').click(function(){
			jQuery('#btn_phone_suggest').show();
		});
		jQuery('#btn_phone_suggest').click(function(){
			var phone = jQuery('.phone').val();
			if(phone != ''){
				console.log('Phone:' + phone);
				var url = jQuery(location).attr('href') + '/filterPhone';
				jQuery.post(url,{phone:phone},function(data){
					if(!jQuery.isEmptyObject(data)){
						jQuery('.checkout_name').val(data.name);
						jQuery('.checkout_email').val(data.email);
						jQuery('.checkout_address').val(data.address);
						var mes = 'Đã tìm thấy thông tin khách hàng';
						jQuery('.phone_suggest').css('color','#5ACF7F');
						jQuery('.phone_suggest').text(mes);
					}else{
						var mes = 'Không tìm thấy thông tin khách hàng';
						jQuery('.phone_suggest').text(mes);
					}
				},'json');
			}else{
				var mes = 'SDT trống';
				jQuery('.phone_suggest').text(mes);
			}
		});
	})
</script>