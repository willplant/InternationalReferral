<!doctype html>
<html lang="en-gb">
	<head>
		<title>International Referral | {{ $title }}</title>
		<meta charset="UTF-8">
		<link href='http://fonts.googleapis.com/css?family=Numans|Titillium+Web|Crimson+Text:400,400italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href="{{ URL::route('base') }}css/desktop.css" rel="stylesheet">
		<link href="{{ URL::route('base') }}css/tablet.css" rel="stylesheet">
		<link href="{{ URL::route('base') }}css/mobile.css" rel="stylesheet">
		<?php if (stripos($_SERVER['HTTP_USER_AGENT'], '11.0') !== false): ?>
			<link href="{{ URL::route('base') }}css/fallback.css" rel="stylesheet">
		<?php endif; ?>
		<!--[if IE]>
		<link href="{{ URL::route('base') }}css/fallback.css" rel="stylesheet">
		<![endif]-->
		<!--[if lt IE 9]>
		<link href="{{ URL::route('base') }}css/fallback_ie8.css" rel="stylesheet">
		<![endif]-->
		<?php if (Agent::isMobile() && strpos($_SERVER['HTTP_USER_AGENT'], 'GT-') !== false): ?>
			<meta name="viewport" content="width=360, initial-scale=0.5">
		<?php elseif (stripos($_SERVER['HTTP_USER_AGENT'], 'Nexus 7') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Galaxy Tab 2') !== false): ?>
			<meta name="viewport" content="width=1024, initial-scale=1">
		<?php elseif (stripos($_SERVER['HTTP_USER_AGENT'], 'Nexus 4') !== false): ?>
			<meta name="viewport" content="width=768, initial-scale=0.5">
		<?php elseif (stripos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Nexus') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'HTC') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Motorola') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Sony') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Samsung') !== false): ?>
			<meta name="viewport" content="width=device-width, initial-scale=0.5">
		<?php elseif (Agent::isMobile()): ?>
			<meta name="viewport" content="width=640, initial-scale=0.5">
		<?php else:?>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php endif; ?>
		<meta property="og:title" content="IR {{ $title }}" />
		<meta property="og:type" content="business" />
		<meta property="og:url" content="{{ Request::url() }}" />
		<meta name="description" content="The home of the world’s most innovative group of advisers. How can we connect you?">
		<link rel="icon" href="{{ URL::to('/img/site-desktop') }}/favicon.ico" type="image/x-icon">
		<meta property="og:image" content="{{ URL::to('/img/site-desktop/og-image.png') }}" />
		<script type="text/javascript">
			base_url = "{{ URL::route('base') }}";
			
			@if (Session::has('ir_first_name'))
				first_name = "{{ Session::get('ir_first_name') }}";
			@endif
		</script>
		<script type="text/javascript">
			if (window.location.hash == '#_=_') window.location.hash = '';
		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
			// init the FB JS SDK
			FB.init({
			  appId      : '213373708825006',                        // App ID from the app dashboard
			  channelUrl : base_url + '/channel.html', // Channel file for x-domain comms
			  status     : true,                                 // Check Facebook Login status
			  xfbml      : true                                  // Look for social plugins on the page
			});

			// Additional initialization code such as adding Event Listeners goes here
		  };

		  // Load the SDK asynchronously
		  (function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/en_US/all.js";
			 fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
		@include('site.partials.header')
		@yield('content')
		@include('site.partials.footer')
		<script data-main="{{ url() }}/js/" src="{{ url() }}/js/lib/require.min.js"></script>
        <script type="text/javascript">
            require(['site/common'], function (common) {
					require(['site/helpers/viewport']);
					require(['site/placeholder']);
					require(['site/header']);
					require(['site/hotels']);
					require(['site/helpers/facebook']);

					@if(Request::is('*news*'))
						require(['site/helpers/classes_news']);
					@else
						require(['site/helpers/classes']);
					@endif

					require(['site/helpers/breadcrumbs']);
					require(['site/helpers/language']);
					require(['site/helpers/links']);
					require(['site/helpers/map']);
					require(['site/helpers/notifications']);
					require(['site/helpers/image-container']);
					require(['site/helpers/image-carousel']);
					require(['site/helpers/testimonials']);
					require(['site/helpers/popups']);
					require(['site/helpers/load-more']);
					require(['site/helpers/vimeo']);

					@if(Request::is('profile'))
					require(['site/profile.main']);
					@elseif(Request::is('favorites'))
					require(['site/favorites.main']);
					@elseif(Request::is('resources'))
					require(['site/resources.main']);
					@elseif(Request::is('options'))
					require(['site/options.main']);
					@elseif(Request::is('my_articles*'))
					require(['site/my_articles.main']);
					@elseif(Request::is('vetted*'))
					require(['site/vetted.main']);
					@endif
            });
        </script>
		<script type="text/javascript"
		  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-nxvBC6Ikv63NAGlWECB6nT6crouXQxw&sensor=false">
		</script>
		<script type="text/javascript">
			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-16319657-1']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();
		</script>
	</body>
</html>
