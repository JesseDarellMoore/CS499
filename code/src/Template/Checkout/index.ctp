<div class="page site-page">
	<div class="responsive-inner">
		<div class="page-top">
			<div class="page-icon">
				<span class="icomoon">&#xe93b;</span>
			</div>
			<div class="page-text">
				Checkout
			</div>
		</div>
		<div class="page-main">
			<div class="checkout-top">
				<div class="checkout-total">
					<strong>Total: $<?= $total ?></strong>
				</div>
				<a href="<?= $this->Url->build("/cart/", true) ?>"><span class="icomoon">&#xea44;</span> Return to cart</a>
			</div>
			<div class="checkout-wrap">
				<div class="checkout-main">
					<div class="checkout-form">
						<form method="post" action="<?= $this->Url->build("/checkout/process/", true) ?>">
							<label>Payment method:</label>
							<select name="payment-method" class="payment-method" style="width:100%;">
								<option value="credit">Credit card</option>
								<option value="cash">Cash or check (pay at door)</option>
							</select>
							<div class="payment-credit">
								<label>Credit card number:</label>
								<input type="text" name="card-number" placeholder="1234 5678 9012 3456" />
								<label>Name on card:</label>
								<input type="text" name="card-name" placeholder="Janet P. Doe" />

								<table>
									<tr>
										<td style="width:420px;">
											<label>Expiration date:</label>

											<select name="card-exp-month">
												<?php for ($i = 1; $i <= 12; $i++) { ?>
													<option><?= $i ?></option>
												<?php } ?>
											</select>
											<select name="card-exp-year">
												<?php $currentYear = intval(date("Y")) ?>
												<?php $endYear = intval(date("Y"))+5 ?>
												<?php for ($i = $currentYear; $i < $endYear; $i++) { ?>
													<option><?= $i ?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<label>CVV:</label>
											<input type="text" name="card-cvv" placeholder="123" />
										</td>
									</tr>
								</table>

								<label>Zip code:</label>
								<input type="text" name="card-zip" placeholder="12345" />
							</div>
							<div class="payment-cash" style="display:none;">
								<label>Full name:</label>
								<input type="text" name="name" placeholder="Jane Doe" />
							</div>

							<?php if ($season_cart) { ?>

							<?php if (!$loggedIn) { ?>
							<hr />
							<label>Full name:</label>
							<input type="text" name="account_name" placeholder="Jane Doe" />
							<label>Email address:</label>
							<input type="text" name="account_email" placeholder="janedoe123@example.com" />
							<label>Password:</label>
							<input type="password" name="account_password" />
							<label>Retype password:</label>
							<input type="password" name="account_password_confirm" />
							<?php } ?>
							<hr />
							<label>Street address:</label>
							<input type="text" name="account_address" placeholder="1600 Pennsylvania Avenue" value="<?php if ($loggedIn) echo $user->street ?>" />
							<label>City:</label>
							<input type="text" name="account_city" placeholder="Washington DC" value="<?php if ($loggedIn) echo $user->city ?>" />
							<label>State:</label>
							<input type="text" name="account_state" placeholder="District of Columbia" value="<?php if ($loggedIn) echo $user->state ?>" />
							<label>Country:</label>
							<input type="text" name="account_country" placeholder="United States" value="<?php if ($loggedIn) echo $user->country ?>" />
							<label>Zip code:</label>
							<input type="text" name="account_zipcode" placeholder="12345" value="<?php if ($loggedIn) echo $user->zip ?>" />
							<label>Phone number:</label>
							<input type="text" name="account_phone" placeholder="(123) 456-6789" value="<?php if ($loggedIn) echo $user->phone_number ?>" />
							<hr />
							<?php } ?>

							<input type="submit" class="button process-payment-button" value="Process Payment" />
						</form>
					</div>
					<div class="checkout-cart">
						<?php foreach ($cart as $item) { ?>
							<div class="cart-item" id="cart-<?= $item[6] ?>-<?= $item[7] ?>">
								<div class="cart-item-text">
									<strong><?= $item[1] ?></strong>
								</div>
								<div class="cart-price">
									$<?= $item[0] ?>
								</div>
								<div class="cart-item-text">
									<?= $item[3] ?>. <?= $item[4] ?>. Seat <?= $item[5] ?>
								</div>
							</div>
						<?php } ?>
						<div class="cart-total">
							<div class="cart-total-pretax">
								Pre-Tax: $<?= $pre_tax ?>
							</div>
							<div class="cart-total-pretax">
								Tax: $<?= $tax ?>
							</div>
							<div class="cart-total-pretax">
								<strong>Total: $<?= $total ?></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>