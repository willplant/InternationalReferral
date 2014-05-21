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
		@if(!isset($fail))
		<div id="home-logo" style="margin-bottom: 100px;"></div>
		<div class="explain-title" style="font-size: 60px; line-height: 80px;">
			Congratulations, {{ $firstname . ' ' . $lastname }}
		</div>
		<div class="explain-content">
			Your IR account is now created! Start using your account at <a href="http://international-referral.com/">www.international-referral.com</a>.<br/><br/>Enjoy,<br/>The IR team
		</div>
		@endif
		<script data-main="{{ url() }}/js/" src="{{ url() }}/js/lib/require.js"></script>
        <script>
            require(['site/common'], function (common) {
				
            });
        </script>
	</body>
</html>
