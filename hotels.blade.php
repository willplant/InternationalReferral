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
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Hotel Partners
		</a>
	</div>
</div>
<div class="wrapper" id="hotels">
	{{ Form::open(array('url' => '/hotels/search')) }}
	<div class="left">
		<div class="upcoming-event">
			<div class="title">
				Featured Hotels
			</div>
			<div class="image-container" id="featured-hotels">
				<div class="hotel-title" style="pointer-events: none;"><strong>{{ htmlspecialchars_decode($featured_hotels[0]['name']) }}</strong> - {{ $featured_hotels[0]['city'] }}, {{ htmlspecialchars_decode($featured_hotels[0]['country']['short_name']) }}</div>
				<a href="{{ URL::to('hotel/'.$featured_hotels[0]['id']) }}" class="featured-hotels-link animate-opacity">
				<?php $index = 0; ?>
				@foreach($featured_hotels as $featured)
					@if(count($featured['attachments']) > 0)
						@if ($index == 0)
							<img data-name="{{ htmlspecialchars_decode($featured['name']) }}" data-place="{{ $featured['city'] }}, {{ $featured['country']['short_name'] }}" src="{{ '/attachments/' . $featured['attachments'][0]['id'] . '.' . $featured['attachments'][0]['extension'] }}" class="image image-active animate-opacity-long" data-href="{{ URL::to('hotel/'.$featured['id']) }}" alt="" />
						@else
							<img data-name="{{ htmlspecialchars_decode($featured['name']) }}" data-place="{{ $featured['city'] }}, {{ $featured['country']['short_name'] }}" src="{{ '/attachments/' . $featured['attachments'][0]['id'] . '.' . $featured['attachments'][0]['extension'] }}" class="image animate-opacity-long" data-href="{{ URL::to('hotel/'.$featured['id']) }}" alt="" />
						@endif
						<?php $index++; ?>
					@endif
				@endforeach
				</a>
			</div>
			<div class="image-container-shadow"></div>
			<div class="explain-title">
				Find Your Hotel
			</div>
			<div class="explain-content">	
				On your way to an event or planning a trip? Search for a hotel by the country filter or with a keyword
			</div>
		</div>
	</div>
	<div class="right first">
		<div class="explain-title">
			IR Hotel Partners
		</div>
		<div class="explain-content">
		International advisers are frequent travellers and we offer our members the very best accommodation around the world via our hotel partners. We offer BARs, discounts and many additional perks including; upgrades, transport and meeting facilities. 
		</div>
		<div id="advisors-select">
			<div class="select-row">
				<div class="input-select-fillout"></div>
				<select name="country" class="input-select window">
					<option value="0" selected>All countries</option>
					@foreach ($countries as $country)
						<option value="{{ $country['id'] }}">{{ $country['short_name'] }}</option>
					@endforeach
				</select>
				<div class="input-select-fillout"></div>
			</div>
		</div>
		<div id="advisors-search">
			<input type="text" class="input-search" name="phrase" placeholder="Search (e.g. city or name)" />
			<input type="submit" class="input-search-submit animate-opacity" value=" " />
		</div>
		<input type="submit" class="tablet handheld-submit" value="See All Hotels" />
	</div>
	{{ Form::close() }}
</div>

@stop