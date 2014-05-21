<!doctype html>
<html lang="en">
	<head>
		<title>International Referral | Activation</title>
		<meta charset="UTF-8">
		<link href='http://fonts.googleapis.com/css?family=Numans|Titillium+Web|Crimson+Text:400,400italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href="{{ URL::route('base') }}css/desktop.css" rel="stylesheet">
		<link href="{{ URL::route('base') }}css/tablet.css" rel="stylesheet">
		<meta http-equiv="content-language" content="en-gb">
		<link rel="icon" href="{{ URL::to('/img/site-desktop') }}/favicon.ico" type="image/x-icon">
		<script type="text/javascript">
			base_url = "{{ URL::route('base') }}";
		</script>
		<script type="text/javascript">
			if (window.location.hash == '#_=_') window.location.hash = '';
		</script>
	</head>
	<body style="padding: 100px 200px;">
		<div id="home-logo" style="margin-bottom: 100px;"></div>
		<div class="explain-title" style="font-size: 60px; line-height: 80px;">
			Hello, {{ $firstname . ' ' . $lastname }}
		</div>
		<div class="explain-content">
			We're almost done setting up your account.<br />Just choose one of the following alternatives to complete the registration process:
		</div>
		@if (Session::has('message'))
		<div class="explain-content" style="margin-top: 50px; margin-bottom: 50px; color: #ff0000; font-size: 40px; line-height: 54px;">
			{{ Session::get('message') }}
			<?php Session::forget('message'); ?>
			<?php
				if (Session::has('set_user_facebook')):
					Session::forget('set_user_facebook');
				endif;
				if (Session::has('set_user_linkedin')):
					Session::forget('set_user_linkedin');
				endif;
			?>
		</div>
		@endif
		<div class="explain-title" style="margin-top: 60px;">
			Create a login password:
		</div>
		<div class="explain-content">
			{{ Form::open(array('url' => '/activation/activate_mail', 'type' => 'POST')) }}
			<input type="password" class="input-search" name="pass_newpass1" placeholder="New Password" style="margin-top: 15px; margin-bottom: 5px;" />
			<input type="password" class="input-search" name="pass_newpass2" placeholder="New Password (again)" style="margin-bottom: 5px;" />
			<input type="hidden" name="recent_url" value="{{ $current_url }}" />
			<input type="hidden" name="encrypted_email" value="{{ $email }}" />
			<input type="submit" class="input-search-submit animate-opacity" value="Submit" style="background-image: none; color: #fff; "/>
			{{ Form::close() }}
			@if ($errors->first('pass_newpass_match'))
				<strong>{{ $errors->first('pass_newpass_match') }}</strong>
			@elseif ($errors->first('email_missing'))
				<strong>{{ $errors->first('email_missing') }}</strong>
			@endif
		</div>
		<div class="explain-title" style="margin-top: 60px;">
			Connect your IR Account to LinkedIn:
		</div>
		<div class="explain-content">
			<a href="{{ URL::to('/activate/linkedin') }}/{{ Crypt::encrypt(Request::url()) }}">Press here</a>
		</div>
		<div class="explain-title" style="margin-top: 60px;">
			Connect your IR Account to Facebook:
		</div>
		<div class="explain-content">
			<a href="{{ URL::to('/activate/facebook') }}/{{ Crypt::encrypt(Request::url()) }}" class="activation-facebook">Press here</a>
		</div>
		<script data-main="{{ url() }}/js/" src="{{ url() }}/js/lib/require.js"></script>
        <script>
            require(['site/common'], function (common) {
				
            });
        </script>
	</body>
</html>
