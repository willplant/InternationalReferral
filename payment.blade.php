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
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Payment
		</a>
	</div>
</div>
<div class="wrapper" id="contact">
	<div class="wrapper settings-wrapper profile-settings-page" id="news" style="padding-top: 0 !important;">
		<form action="{{ URL::to('payment/checkout') }}" method="POST">
			<div class="news-list news-section">
				<div class="title">Pay your invoice</div>
			</div>
			<div class="left forty">
			<?php
			$error = "";
			if(Input::old('empty_error'))
			{
				$error = "input-error";
			}

			if(Input::old('numeric_error'))
			{
				$error = "input-error";
			}
			?>
				<div>
					@if(Input::old('empty_error'))
					Please fill in a value in the text field.
					@endif

					@if(Input::old('numeric_error'))
					Please fill in a numeric value.
					@endif
				</div>
				<div>
					<label for="the_reference">Reference*:</label>
					<input type="text" class="input-setting {{ $error }}" id="the_reference" name="the_reference" value="{{ Input::old('the_reference') }}" />
				</div>
				<div>
					<label for="the_amount">Amount* £:</label>
					<input type="text" class="input-setting {{ $error }}" id="the_amount" name="the_amount" value="{{ Input::old('the_amount') }}" />
				</div>
			</div>
			<div class="save-row">
				<input type="submit" value="Continue" class="submit" />
			</div>
		</form>
	</div>
</div>

@stop