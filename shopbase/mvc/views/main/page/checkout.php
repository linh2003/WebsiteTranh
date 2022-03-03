<div class="rootDiv">
	<div class="coreDiv">
		<form action="<?php ?>" method="post" class="checkout_form">
			<div class="pTitle"><span style="font-size: 24px !important;">Đặt hàng</span></div>
			<div class="pBody">
				<div class="info_customer" style="margin-right: 30px; margin-left: 30px;">
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="lSpan">Tên người nhận</span><span>*</span></div>
						<div class="col-sm-9 colPlace"><input type="text" name="name" placeholder="Nguyễn Văn A" class="form-control fieldSize"></div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="lSpan">Email</span></div>
						<div class="col-sm-9 colPlace"><input type="email" name="email" placeholder="NguyenVanA@gmail.com" class="form-control fieldSize"></div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Số điện thoại liên hệ</span><span>*</span></div>
						<div class="col-sm-9 colPlace"><input type="tel" name="phone" placeholder="0983859614" class="form-control fieldSize"></div>
					</div>
					<div class="row min-row field">
						<div class="col-sm-3 colPlace"><span class="">Địa chỉ nhận hàng</span><span>*</span></div>
						<div class="col-sm-9 colPlace">
							<!--<input type="text" name="address" placeholder="1B Trần Não, Phường An Phú, TP Thủ Đức, HCM" class="form-control fieldSize">-->
							<textarea rows="5" cols="15" name="address" placeholder="1B Trần Não, Phường An Phú, TP Thủ Đức, HCM" class="form-control fieldSize"></textarea>
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