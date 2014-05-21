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
		<a href="{{ URL::to('/hotels') }}" class="breadcrumb animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Hotel Partners
		</a>
		@if(isset($url_back))
		<a href="{{ $url_back }}" class="breadcrumb breadcrumb animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result
		</a>
		@endif
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Hotel
		</a>
	</div>
</div>
<div id="hotel" class="section">
	<div class="wrapper">
		<?php 
		$attachment_count = count($hotel->attachments) - 1;
		$i = 0;
		?>
		<div class="image-carousel">
			@foreach ($hotel->attachments as $att)
			@if ($i == 0)
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-center animate-all" alt="" />
			@elseif ($i == 1)
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-right animate-all" alt="" />
			@else
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-right img-hidden-right animate-all" alt="" />
			@endif
			<?php $i++; ?>
			@endforeach
			@if (count($hotel->attachments) > 1)
			<div class="arrow arrow-left hide animate-opacity"></div>
			<div class="arrow arrow-right animate-opacity"></div>
			@endif
			<div class="gradient-left"></div>
			<div class="gradient-right"></div>
		</div>
		<div class="image-carousel-shadow animate-opacity"></div>
		<div class="left">
			<div class="content-section">
				<div class="title hotel-head-title">{{ $hotel->name }} <img src="{{ url() }}/img/flags/48/{{ $hotel->country_id }}.png" class="flag" alt="" /></div>
				<div class="details">{{ $hotel->city }}, {{ $hotel->country->short_name }}</div>
				<div class="content">
					<div class="title">Contact & Booking</div>
					<div class="list">
						<div class="row">
							<div class="detail-title">Phone</div> <div class="detail">{{ $hotel->phone }}</div>
						</div>
						<div class="row">
							<div class="detail-title">Fax</div> <div class="detail">{{ $hotel->fax }}</div>
						</div>
						<div class="row">
							<div class="detail-title">E-mail</div> <div class="detail"><a href="mailto:{{ $hotel->email }}">{{ $hotel->email }}</a></div>
						</div>
						<div class="row">
							<div class="detail-title">Website</div> <div class="detail"><a href="{{ $hotel->url_website }}" target="_blank">{{ $hotel->url_website }}</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="link-list">
				@if($hotel->url_booking != "")
				<a href="{{ $hotel->url_booking }}" class="link" target="_blank"><span class="link-icon-register"></span><span class="light"></span>Book Hotel</a>
				@endif
			</div>
		</div>
		<div class="right">
			<div class="content-section content-section-map">
				<div class="title">Map</div>
				<div id="map" data-name="{{ $hotel->name }}" data-latitude="{{ $hotel->geo_lat }}" data-longitude="{{ $hotel->geo_lon }}"></div>
			</div>
		</div>
	</div>
<div class="wrapper dynamic hotel-dynamic-wrapper" style="position: relative;">
	<div class="content-section">
		<div class="title">Description</div>
		<div class="content">
			{{ $hotel->description }}
		</div>
	</div>
	@if($hotel->has_image)
	<div class="content-section featured-room">
		<div class="title">Featured Room</div>
		<div class="content">
			<img src="{{ '/attachments/featured_rooms/' . $hotel->id . '.' . $hotel->image_extention }}" class="animate-all" alt="" />
			{{ $hotel->feat_room_descr }}
		</div>
	</div>
	@endif
	<!--<div class="left hotel-content-left">-->
		@foreach($hotel->content as $content)
			<div class="content-section" style="">
				<div class="title">{{ $content->title }}</div>
				<div class="content">
					{{ $content->content }}
				</div>
			</div>
		@endforeach
	</div>
</div>
</div>
@stop