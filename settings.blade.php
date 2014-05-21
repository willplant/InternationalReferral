@extends('site.template')

@section('content')
<div id="background">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div class="breadcrumbs">
	<div class="wrapper">
		<a href="{{ url() }}" class="breadcrumb breadcrumb-home no-margin-left animate-opacity">
			<span class="light"></span>
			<span class="end"></span>
			<span class="icon"></span>
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Settings
		</a>
	</div>
</div>
<div class="wrapper settings-wrapper" id="news">
	<div class="left">
		<div class="explain-title">
			Manage your account
		</div>
		<div class="explain-content">
			Here you can change all your private account information, just follow the instructions at this page.
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Account settings</div>
	</div>
	<div class="left">
		<div class="explain-content" style="margin-top: 40px;">
			Change your e-mail here. Simply enter the new e-mail and your password in the fields below.
		</div>
		<div id="advisors-search" class="class-search settings-fields">
			{{ Form::open(array('url' => '/settings/change_email', 'method' => 'post')) }}
			<input type="text" 	class="input-search" name="email_email" placeholder="Users e-mail here" value="{{ Input::old('email_email') }}" />
			<input type="password" class="input-search" name="email_oldpass" placeholder="Current password" />
			<input type="submit" class="input-search-submit animate-opacity" value="Submit" />
			{{ Form::close() }}
			@if($errors->first('email_password_match'))
			<div class="error-block">Password doesn't match!</div>
			@endif
			@if($errors->first('email_email'))
			<div class="error-block">Please write an accurate e-mail</div>
			@endif

			@if(Input::old('email_action'))
			<div>{{ Input::old('email_action') }}</div>
			@endif
		</div>
	</div>

	<div class="right" class="settings-right">
		<div class="explain-content" style="margin-top: 40px;">
			Change your password here. Simply enter your old and new password in the fields below.
		</div>
		<div id="advisors-search" class="class-search settings-fields">
			{{ Form::open(array('url' => '/settings/change_password', 'method' => 'post')) }}
			<input type="password" class="input-search" name="pass_oldpass" placeholder="Current password" />
			<input type="password" class="input-search" name="pass_newpass1" placeholder="New Password" style="margin-top: 15px;" />
			<input type="password" class="input-search" name="pass_newpass2" placeholder="New Password (again)" />
			<input type="submit" class="input-search-submit animate-opacity" value="Submit" />
			{{ Form::close() }}
			@if($errors->first('pass_oldpass_match'))
			<div class="error-block">{{ $errors->first('pass_oldpass_match') }}</div>
			@elseif($errors->first('pass_newpass_match'))
			<div class="error-block">{{ $errors->first('pass_newpass_match') }}</div>
			@endif

			@if(Input::old('pass_action'))
			<div>{{ Input::old('pass_action') }}</div>
			@endif
		</div>
	</div>
	<div class="news-list news-section" style="display: none;">
		<div class="title">Profile picture</div>
	</div>
	<div class="left">
		<div class="explain-content" style="margin-top: 40px;">
			Choose or change your profile picture here. It doesn't have to be round shaped - the site will take care of that for you.<br /> 
			Your picture will be seen by thousand of visitors, so choose wisely.
		</div>
		<div class="advisor-profile" id="profile-picture">
			<div class="advisor-name">
				@if($advisor->has_image)
				<div class="image" style="margin-top: 40px; background-image: url({{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }});
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }}', sizingMethod='scale')';"></div>
				@else
				<div class="image" style="margin-top: 40px;"></div>
				@endif
				<div class="link-list settings-fields">
					<a class="link upload-image-facebook" style="display: block;"><span class="light"></span>Choose from Facebook</a>
					{{ Form::open(array('url' => '/settings/change_picture', 'files' => true)) }}
						<a class="link">Upload New Image<input type="file" name="picture" id="picture" value="" style="position: absolute; z-index: 1; opacity: 0; width: 100%; height: 100%; margin-top: 0px; left: 0px;"></a>
						<input class="input-search-submit animate-opacity" type="submit" value="Submit" style="background-image: none; color: #fff; font-weight: 600; float: right; margin-right: 17px;" />
					{{ Form::close() }}
				</div>
			</div>
			@if(Input::old('picture_success'))
				<div style="margin-top: 20px;">{{ Input::old('picture_success') }}</div>
			@elseif(Input::old('picture_fail'))
				<div style="margin-top: 20px;">{{ Input::old('picture_fail') }}</div>
			@endif
		</div>
	</div>
	<div class="right last">
		<div class="explain-content" style="margin-top: 40px;">
			For further question regarding your account or your personal information, please contact the IR team directly.
		</div>
	</div>
</div>

@stop