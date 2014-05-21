@extends('site.template')

@section('content')
<div id="background">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div class="breadcrumbs">
	<div class="wrapper">
		<a href="{{ URL::to('/') }}" class="breadcrumb breadcrumb-home no-margin-left animate-opacity">
			<span class="light"></span>
			<span class="end"></span>
			<span class="icon"></span>
		</a>
		<a href="{{ URL::to('/payment') }}" class="breadcrumb animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Payment
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Checkout
		</a>
	</div>
</div>
<div class="wrapper" id="contact">
	<div class="wrapper settings-wrapper profile-settings-page" id="news">
		<form action="https://secure.wp3.rbsworldpay.com/wcc/purchase" method="post">
			<div class="left">
				<div class="explain-title">
					Please check the reference and amount below, if these are not correct please <a href="javascript:history.go(-1);" style="color: #8ea13b;">amend them here</a>.
				</div>
				<div class="explain-content">
					<strong>Reference</strong>: {{ Input::get('the_reference') }}<br/>
					<strong>Amount £</strong>: {{ Input::get('the_amount') }}<br/>
				</div>
				<div class="save-row">
					<input type="submit" value="Confirm" class="submit" />
				</div>
			</div>

			<input type="hidden" name="instId" value="248415">

			<input type="hidden" name="description" id="description" value="Balance Payment">
			<input type="hidden" name="currency" value="GBP">

			<input type="hidden" name="cartId" value="{{ Input::get('the_reference') }}">
			<input type="hidden" name="amount" value="{{ Input::get('the_amount') }}" class="textField" id="amount">

			<div style="padding-top: 40px">
				<div class="explain-title">
					Refund Policy:
				</div>
				<div class="explain-content">
					Any membership purchased via the website can be cancelled within 7 days for any reason, by giving written notice via email, by fax to 0207 206 7282 or via post to 26 York Street London W1U 6PZ. The amount will be refunded in full.
				</div>

				<div class="explain-title">
					Company  Details:
				</div>
				<div class="explain-content">
					Ethical  Networking Ltd<br>
				    International  Referral<br>
				    Communications  House<br>
				    26  York Street, London, W1U 6PZ<br>
				    United  Kingdom<br>
				    Phone:  0044 207 2067281&nbsp; <br>
				    Company  no: 7254406<br>
				    VAT  NO: 990233616<br>
				    Tel: 0207 206 7281<br>
				    Email: <a href="mailto:info@intl-referral.com" style="color: #8ea13b;">info@intl-referral.com</a>
				</div>
			</div>
		</form>
	</div>
</div>

@stop