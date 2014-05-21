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
		<a href="{{ URL::to('/news') }}" class="breadcrumb breadcrumb-news animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			News
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Article
		</a>
		@if(count($available_languages) > 1)
		<div class="translation">
			<div class="title tablet mobile">Translation</div>
			<div class="language spanish animate-opacity" data-code="es"><div class="light"></div>En Español</div>
			<div class="language english active animate-opacity" data-code="en"><div class="light"></div>In english</div>
		</div>
		@elseif(count($available_languages) == 1)
			@if(!array_key_exists($language, $available_languages))
			<div class="translation">
				<div class="title tablet mobile">Translation</div>
				@if(array_key_exists('es', $available_languages))
				<div class="language spanish active animate-opacity" style="float: right;" data-code="es"><div class="light"></div>In spanish</div>
				@elseif(array_key_exists('en', $available_languages))
				<div class=" english active animate-opacity" style="float: right;" data-code="en"><div class="light"></div>En ingles</div>
				@endif
			</div>
			@endif
		@endif
	</div>
</div>

<div class="wrapper" id="article">
@foreach($news->content as $section)
	@if($content_count > 1)
		@if ($section->language == $language)
		<div class="wrapper-section" data-language="{{ $section->language }}">
		@else
		<div class="wrapper-section hide" data-language="{{ $section->language }}">
		@endif
	@else
	<div class="wrapper-section" data-language="{{ $section->language }}">	
	@endif
		<div class="title">
			{{ htmlspecialchars_decode($section->heading) }}
		</div>
		<div class="details">
			Published {{ date('j F, Y', strtotime($news->datetime)) }}
		</div>
		<div class="post">
			{{ htmlspecialchars_decode($section->content) }}
		</div>
		@foreach($news->links as $link)
		<a class="link" href="{{ $link->url }}" target="_blank"><span class="light"></span>
			@if ($link->name == '')
			{{ $link->url }}
			@else
			{{ $link->name }}
			@endif
		</a>
		@endforeach
		<a class="link link-share"><span class="link-icon-share"></span><span class="light"></span>Share article</a>
		<a class="link link-facebook link-hidden" data-link="{{ URL::to('/article/'.$news->id) }}" data-title="{{ $section->heading }}" data-type="article"><span class="link-icon-facebook"></span><span class="light"></span>on Facebook</a>
		<a class="link link-twitter link-hidden" data-link="{{ URL::to('/article/'.$news->id) }}" data-title="{{ $section->heading }}" style="margin-top: 5px;"><span class="link-icon-twitter"></span><span class="light"></span>on Twitter</a>
	</div>
@endforeach
	<div class="wrapper">
		@if($news->member)
		<a href="{{ url() }}/advisor/{{ $news->member->id }}" class="written-by">
			<span class="light"></span>
			<span class="image" style="background-image: url({{ '/attachments/members/' . $news->member->id . '.' . $news->member->image_extention }});
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $news->member->id . '.' . $news->member->image_extention }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $news->member->id . '.' . $news->member->image_extention }}', sizingMethod='scale')';"></span>
			<span class="text">
				Published by <strong>{{ $news->member->first_name }} {{ $news->member->middle_name }} {{ $news->member->last_name }}</strong>, {{ htmlspecialchars_decode($news->member->firm->name) }}
			</span>
			<span class="written-by-arrow"></span>
			<span class="written-by-shadow"></span>
		</a>
		@else
		<a href="#" class="written-by">
			<span class="light"></span>
			<span class="image"></span>
			<span class="text">
				Published by a <strong>former member</strong>
			</span>
			<span class="written-by-arrow"></span>
			<span class="written-by-shadow"></span>
		</a>
		@endif
	</div>
</div>

@stop