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
			Favorites
		</a>
	</div>
</div>
<div class="wrapper resources-wrapper" id="news">
	<div class="left">
		<div class="explain-title">
			Favorites
		</div>
		<div class="explain-content">
			In the favorite section you'll find all your bookmarked pages, profiles and other content of your choice.
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Your favorites</div>
		<div class="news">
			<?php $grey = false; ?>
			@foreach($member->favorites as $f)
			
					@if ($grey == true)
					<a href="{{ IRItemType::ToURL($f->fav_id, $f->fav_type) }}" class="post grey animate-opacity favorite-post">
					@else
					<a href="{{ IRItemType::ToURL($f->fav_id, $f->fav_type) }}" class="post animate-opacity favorite-post">
					@endif
					<span class="post-title">
						{{ IRItemType::ToString($f->fav_type) }}: {{ MemberFavorite::ToString($f->fav_type, $f->fav_id) }}
					</span>
					<span class="post-details">
						@if ($f->comment != '')
						Comment: {{ $f->comment }}
						@endif
					</span>
					</a>
					@if ($grey == true)
					<div class="remove-favorite grey" data-id="{{ $f->fav_id }}" data-user="{{ Session::get('ir_id') }}" data-type="{{ $f->fav_type }}">
					@else
					<div class="remove-favorite" data-id="{{ $f->fav_id }}" data-user="{{ Session::get('ir_id') }}" data-type="{{ $f->fav_type }}">
					@endif
						Remove
					</div>
					
					<?php 
						if ($grey == false):	$grey = true;
						elseif ($grey == true): $grey = false;
						endif;
					?>
				
			@endforeach
		</div>
	</div>
</div>
<div id="content-lang-remove-confirm" class="hide">
  <div class="modal-body">
	<p class="text-center">Are you sure you wish to remove this favorite?</p>
  </div>
  <div class="modal-footer">
	<button class="btn btn-primary modal-hide">No thanks!</button>
	<button type="button" class="btn btn-danger favorite-remove">Remove favorite</button>
  </div>
</div>


@stop