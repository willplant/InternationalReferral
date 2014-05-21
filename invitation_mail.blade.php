<!doctype html>
<html>
	<head>
		<title>International Referral | Invitition</title>
	</head>
	<body style="padding: 10px 10px;">
		<div style="margin-bottom: 20px;"></div>
		<div class="explain-title" style="font-size: 35px; line-height: 45px;">
			Welcome to International Referral, {{ $firstname . ' ' . $lastname }}
		</div>
		<div class="explain-content">
			This e-mail will help you set up your account on IR's website <a href="http://www.international-referral.com" target="_blank">www.international-referral.com</a>.<br />
			Follow the link below to start activate your account.
		</div>
		<div class="explain-title" style="margin-top: 40px;">
			<a href="{{ url() . '/activation/' . $encrypted_email }}" target="_blank">Activate your account here</a>
		</div>
		<div class="explain-content" style="margin-top: 40px;">
			Sincerely,<br/>The IR team
		</div>
	</body>
</html>