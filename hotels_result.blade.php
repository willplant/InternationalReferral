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
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result
		</a>
	</div>
</div>
<div class="wrapper hotels-result" id="hotels">
	<div class="left">
		<div class="explain-title">
			Result
		</div>
		<div class="explain-content">
			You’ve found {{ $hotels_count }} matching hotels to your search.
		</div>
	</div>
	<div class="result-list">
		@if($hotels != 0)
			@foreach ($hotels as $letter => $results)
				<div class="letter">
					{{ $letter }}
				</div>
				<div class="result-objects">
					<?php $right = false; ?>
					@foreach($results as $hotel)
						@if ($right == false)
							@if(count($hotel['attachments']) > 0)
							<a href="{{ $current_url . '/hotel/' . $hotel['id'] }}" class="result-hotel" style="background-image: url({{ '/attachments/' . $hotel['attachments'][0]['id'] . '.' . $hotel['attachments'][0]['extension'] }});">
							@else
							<a href="{{ $current_url . '/hotel/' . $hotel['id'] }}" class="result-hotel">
							@endif
						@else
							@if(count($hotel['attachments']) > 0)
							<a href="{{ $current_url . '/hotel/' . $hotel['id'] }}" class="result-hotel no-margin-right" style="background-image: url({{ '/attachments/' . $hotel['attachments'][0]['id'] . '.' . $hotel['attachments'][0]['extension'] }});">
							@else
							<a href="{{ $current_url . '/hotel/' . $hotel['id'] }}" class="result-hotel no-margin-right">
							@endif
						@endif
						<span class="title-bg"></span>
						<span class="title">{{ htmlspecialchars_decode($hotel['name']) }}</span>
						<img src="{{ url() }}/img/flags/48/{{ $hotel['country_id'] }}.png" class="flag" alt="" />
					</a>
					@if (count($results) == 1)
						<span class="hotel-description">
						@if(preg_match('/^.{1,350}\b/s', $hotel['description'], $match))
						{{ htmlspecialchars_decode($match[0]) }}.. 
						@else
						{{ htmlspecialchars_decode($hotel['description']) }}
						@endif
						</span>
					@endif
						<?php 	if ($right == false) $right = true;
									else if ($right == true) $right = false; ?>
					@endforeach
				</div>
			@endforeach
		@endif
	</div>
</div>

@stop