<div id="header">
	@if (Request::url() == url())
	<div id="menu" class="gradient-green shadow-flat-menu mobile-show">
	@else
	<div id="menu" class="gradient-green mobile-flat">
	@endif
		<div class="menu-list-top"></div>
		<div class="menu-list-bottom"></div>
		<div class="wrapper">
			<div class="tablet menu-tablet-indicator">
				@if (isset($title))
				{{ $title }}
				@endif
			</div>
			@if (Request::is('advisors') || Request::is('exclusive') || Request::is('latin') || Request::is('rising-stars') || Request::is('events') || Request::is('news') || Request::is('news/p*') || Request::is('partners') || Request::is('hotels') || Request::is('contact') || Request::is('what-is-ir') || Request::is('legal') || Request::is('membership') || Request::is('legal') || Request::is('privacy'))
				<a href="{{ URL::to('/') }}" class="handheld-breadcrumb handheld-breadcrumb-home">
				</a>
			@elseif (Request::url() != URL::to('/'))
				<a class="handheld-breadcrumb handheld-breadcrumb-back" onclick="window.history.back();">
				</a>
			@endif
			
			@if (Request::is('advisor*') || Request::is('exclusive*') || Request::is('rising-stars*') || Request::is('latin*'))
			<span class="mobile mobile-header-icon mobile-header-icon-advisors"></span>
			@endif
			
			@if (Request::is('event*'))
			<span class="mobile mobile-header-icon mobile-header-icon-events"></span>
			@endif
			
			@if (Request::is('news*') || Request::is('article*'))
			<span class="mobile mobile-header-icon mobile-header-icon-news"></span>
			@endif
			
			@if (Request::is('what-is-ir*'))
			<span class="mobile mobile-header-icon mobile-header-icon-whatsir"></span>
			@endif
			
			@if (Request::is('membership*'))
			<span class="mobile mobile-header-icon mobile-header-icon-membership"></span>
			@endif
			
			@if (Request::is('hotel*'))
			<span class="mobile mobile-header-icon mobile-header-icon-hotels"></span>
			@endif
			
			<div class="tablet menu-tablet-button animate-opacity"></div>
			<div class="menu-content">
				<a href="{{ url() }}" class="menu-logo"></a>
			
				@if (Request::url() == URL::to('/'))
					<a href="{{ URL::to('') }}" class="menu-button menu-button-active animate-all" id="menu-home"><span class="menu-icon animate-all"></span><span class="light"></span>Home</a>
				@else
					<a href="{{ URL::to('') }}" class="menu-button animate-all" id="menu-home"><span class="menu-icon animate-all"></span><span class="light"></span>Home</a>
				@endif
				
				@if (Request::is('advisors*') || Request::is('rising-stars*') || Request::is('latin*'))
					<a href="{{ URL::to('advisors') }}" class="menu-button first-menu-button menu-button-active animate-all" id="menu-advisors"><span class="menu-icon animate-all"></span><span class="light"></span>Find an Adviser</a>
				@else
					<a href="{{ URL::to('advisors') }}" class="menu-button first-menu-button animate-all" id="menu-advisors"><span class="menu-icon animate-all"></span><span class="light"></span>Find an Adviser</a>
				@endif
				
				@if (Request::is('event*'))
					<a href="{{ URL::to('events') }}" class="menu-button menu-button-active animate-all" id="menu-events"><span class="menu-icon animate-all"></span><span class="light"></span>Events</a>
				@else
					<a href="{{ URL::to('events') }}" class="menu-button animate-all" id="menu-events"><span class="menu-icon animate-all"></span><span class="light"></span>Events</a>
				@endif
				
				@if (Request::is('news*') || Request::is('article*'))
					<a href="{{ URL::to('news') }}" class="menu-button menu-button-active animate-all" id="menu-news"><span class="menu-icon animate-all"></span><span class="light"></span>News</a>
				@else
					<a href="{{ URL::to('news') }}" class="menu-button animate-all" id="menu-news"><span class="menu-icon animate-all"></span><span class="light"></span>News</a>
				@endif
				
				
				@if (Request::is('what-is-ir*'))
					<a href="{{ URL::to('vetted') }}" class="menu-button menu-button-active animate-all" id="menu-whatsir"><span class="menu-icon animate-all"></span><span class="light"></span>IR Vetted</a>
				@else
					<a href="{{ URL::to('vetted') }}" class="menu-button animate-all" id="menu-whatsir"><span class="menu-icon animate-all"></span><span class="light"></span>IR Vetted</a>
				@endif
				
				@if (Request::is('contact*'))
					<a href="{{ URL::to('contact') }}" class="menu-button menu-button-active animate-all" id="menu-contact"><span class="menu-icon animate-all"></span><span class="light"></span>Contact</a>
				@else
					<a href="{{ URL::to('contact') }}" class="menu-button animate-all" id="menu-contact"><span class="menu-icon animate-all"></span><span class="light"></span>Contact</a>
				@endif
				
				<div class="menu-button menu-button-dropdown mobile-hide animate-all" id="menu-membership">
					<span class="menu-icon animate-all"></span>
					About IR <div class="dropdown-arrow"></div>
					<div class="menu-dropdown">
						<ul>
							<li><a href="{{ url() }}/membership">Membership</a></li>
							<li><a href="{{ url() }}/what-is-ir">What is IR?</a></li>
						</ul>
					</div>
				</div>
				
				<!--
				@if (Request::is('membership*'))
					<a href="{{ URL::to('membership') }}" class="menu-button menu-button-active animate-all" id="menu-membership"><span class="menu-icon animate-all"></span><span class="light"></span>Membership</a>
				@else
					<a href="{{ URL::to('membership') }}" class="menu-button animate-all" id="menu-membership"><span class="menu-icon animate-all"></span><span class="light"></span>Membership</a>
				@endif-->
				
				<a href="{{ URL::to('membership') }}" class="menu-button mobile animate-all" id="menu-membership"><span class="menu-icon animate-all"></span><span class="light"></span>Membership</a>
				
				<a href="{{ URL::to('what-is-ir') }}" class="menu-button mobile animate-all" id="menu-whatsir"><span class="menu-icon animate-all"></span><span class="light"></span>What is IR?</a>
				
				<a href="{{ URL::to('hotels') }}" class="menu-button mobile animate-all" id="menu-hotels"><span class="menu-icon animate-all"></span><span class="light"></span>Hotel Partners</a>
				
				<div class="menu-button menu-button-dropdown mobile-hide animate-all" id="menu-partners">
					<span class="menu-icon animate-all"></span>
					Partners <div class="dropdown-arrow"></div>
					<div class="menu-dropdown">
						<ul>
							<li><a href="{{ url() }}/partners">Strategic/Key</a></li>
							<li><a href="{{ url() }}/hotels">Hotel Partners</a></li>
						</ul>
					</div>
				</div>
				
				<div class="menu-user-controls">
					@if (Session::has('ir_id'))
						@if (Session::has('ir_init'))
							<div class="logged-in logged-in-first">
							<?php Session::forget('ir_init'); ?>
						@else
							<div class="logged-in">
						@endif
						
						@if (Session::get('notifications') > 0)
							<a href="{{ url() }}/notifications" class="menu-user-notifications animate-opacity control-active"><span class="alert">{{ Session::get('notifications') }}</span></a>
						@else
							<a href="{{ url() }}/notifications" class="menu-user-notifications animate-opacity"></a>
						@endif
						
						@if (Session::get('news') > 0)
						<a href="{{ url() }}/personal/news" class="menu-user-news animate-opacity control-active"><span class="alert">{{ Session::get('news') }}</span></a>
						@else
						<a href="{{ url() }}/personal/news" class="menu-user-news animate-opacity"></a>
						@endif
						
						<a href="{{ url() }}/resources" class="menu-user-resources control-static animate-opacity"></a>
						<a href="{{ url() }}/favorites" class="menu-user-favorites control-static animate-opacity"></a>
						<a href="#" class="menu-user-settings control-static animate-opacity"></a>
						<div class="tablet menu-user-texts">
							<span class="welcome">Welcome {{ Session::get('ir_first_name') }}</span>
							<div class="control-texts">
								<span>Notifications</span>
								<span>News</span>
								<span>Resources</span>
								<span>Favorites</span>
								<span>Options</span>
							</div>
						</div>
					</div>
					@else
					<a class="menu-user-login menu-button animate-all" id="menu-login"><span class="menu-icon animate-all"></span><span class="light"></span>Member Login</a>
					<div class="tablet menu-login">
						<span>Login with:</span>
						<a href="{{ URL::to('/auth/facebook') }}/{{ Crypt::encrypt(Request::url()) }}" class="sm-button sm-icon-facebook"><span class="sm-button-active"></span></a>
						<a href="{{ URL::to('/auth/linkedin') }}/{{ Crypt::encrypt(Request::url()) }}" class="sm-button sm-icon-linkedin"><span class="sm-button-active"></span></a>
						<a class="sm-button sm-icon-email tablet-email"><span class="sm-button-active"></span></a>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="collapsed-header">
		<div class="wrapper">
			<a href="{{ URL::to('') }}" class="collapsed-name">International Referral</a>
			<a href="{{ URL::to('/advisors') }}" class="collapsed-advisors">Find an Adviser</a>
			<span class="collapsed-top">Back to top</span>
		</div>
	</div>
</div>
<div id="header-focus-layer" class="tablet"></div>
@if (Session::has('message'))
<div id="popup-message">
	{{ Session::get('message') }}
</div>
	<?php Session::forget('message'); ?>
@endif
<div class="popup-container">
</div>
<div class="popup-layer"></div>
@if (Session::has('ir_id'))
<div class="popup-settings hide animate-opacity" style="pointer-events: all !important;">
	<div class="popup-wrapper">
		<div class="tablet popup-close"></div>
		<div class="popup-corner popup-right-corner"></div>
		<div class="popup">
			<a href="{{ URL::to('/advisor/'.Session::get('ir_id')) }}">Visit your profile</a>
			<a href="{{ URL::to('/profile') }}">Profile settings</a>
			<a href="{{ URL::to('/my_articles') }}">Your articles</a>
			<a href="{{ URL::to('/options') }}">Options</a>
			<a href="{{ URL::to('/auth/logout') }}">Log out</a>
		</div>
	</div>
</div>
@endif
<div class="tablet popup-tablet-login-email animate-opacity">
	<div class="popup-wrapper">
		<div class="tablet popup-close"></div>
		<form method="post" action="{{ URL::to('auth/email') }}/{{ Crypt::encrypt(Request::url()) }}">
			<input class="login-field" type="text" value="" placeholder="E-mail" name="email" />
			<input class="login-field" type="password" value="" placeholder="Password" name="password" />
			<input class="login-button-email" type="submit" value="Log in" />
			<a class="login-back">Back</a>
		</form>
	</div>
</div>
<div class="popup-login animate-opacity">
	<div class="popup-wrapper">
		<div class="popup-corner popup-right-corner"></div>
		<div class="popup">
			How do you wish to log in?
			<a href="{{ URL::to('/auth/facebook') }}/{{ Crypt::encrypt(Request::url()) }}" class="login-icon-facebook"></a>
			<a href="{{ URL::to('/auth/linkedin') }}/{{ Crypt::encrypt(Request::url()) }}" class="login-icon-linkedin"></a>
			<div class="login-icon-email no-margin-right"></div>
		</div>
		<div class="popup hide">
			<div class="tablet popup-close"></div>
			<form method="post" action="{{ URL::to('auth/email') }}/{{ Crypt::encrypt(Request::url()) }}">
				<input class="login-field" type="text" value="" placeholder="E-mail" name="email" />
				<input class="login-field" type="password" value="" placeholder="Password" name="password" />
				<input class="login-button-email" type="submit" value="Log in" />
				<a class="login-back">Back</a>
			</form>
		</div>
	</div>
</div>
<div class="hover hover-flag hide">
</div>
<div class="hover hover-flags" style="display: none;">
	<span class="country-name"></span>
</div>
<div class="hover hover-classes hide">
	
</div>
<div class="hover hover-comittee hide">
	This is a committee member! Press here to read about the committee members expertice.
</div>
<div class="hover hover-advisors-submit hide">
	Press here to see browse all advisors.
	<img src="{{ url() }}/img/site-desktop/hover-bottom.png" style="position: absolute; bottom: -40px; right: 50px;">
</div>

@include('site.partials.favorite')
