<!doctype html>
<html lang="en">
	<head>
		<title>International Referral | Whoops, you are out in space!</title>
		<meta charset="UTF-8">
		<link href='http://fonts.googleapis.com/css?family=Numans|Titillium+Web|Crimson+Text:400,400italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href="{{ URL::route('base') }}css/desktop.css" rel="stylesheet">
		<link href="{{ URL::route('base') }}css/tablet.css" rel="stylesheet">
		<meta http-equiv="content-language" content="en-gb">
		<link rel="icon" href="{{ URL::to('/img/site-desktop') }}/favicon.ico" type="image/x-icon">
		<script type="text/javascript">
			base_url = "{{ URL::route('base') }}";
		</script>
	</head>
	<body>
		@include('site.partials.header')
		@yield('content')
		@include('site.partials.footer')
		<script data-main="{{ url() }}/js/" src="{{ url() }}/js/lib/require.js"></script>
        <script>
            require(['site/common'], function (common) {
					require(['site/header']);
					require(['site/helpers/classes']);
					require(['site/helpers/breadcrumbs']);
					require(['site/helpers/language']);
					require(['site/helpers/links']);
					require(['site/helpers/map']);
					require(['site/helpers/notifications']);
					require(['site/helpers/image-container']);
					require(['site/helpers/image-carousel']);
					require(['site/helpers/testimonials']);
					require(['site/helpers/popups']);
            });
        </script>
	</body>
</html>
