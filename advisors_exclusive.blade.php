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
			<span  class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			IR Exclusive
		</a>
	</div>
</div>
<div id="advisors" class="section advisors advisors-exclusive">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				<div class="icon-40-exclusive-light"></div> IR Exclusive
			</div>
			<div class="explain-content">
				‘Exclusive’ members are vetted and our recommended referral partners. They offer the highest quality advice and support to our global client base.
			</div>
		</div>
		<div class="right">
			{{ Form::open(array('url' => '/exclusive/search')) }}
				<div id="advisors-filter">
					<div class="explain-title">
						Filter
					</div>
					<div id="advisors-select">
						<div class="select-row">
							<div class="input-select-fillout"></div>
							<select name="country" class="input-select window advisor-filter">
								<option value="0" selected>All regions</option>
								@foreach ($countries as $country)
									<option value="{{ $country['country_id'] }}">{{ $country['country_name'] }}</option>
									@if(array_key_exists('regions', $country))
										@foreach($country['regions'] as $region)
										@if($region['region_name'] != $country['country_name'])
										<option value="{{ $region['region_id'] }}">- {{ $region['region_name'] }}</option>
										@endif
										@endforeach
									@endif
								@endforeach
							</select>
							<div class="input-select-fillout"></div>
						</div>
						<div class="select-row">
							<div class="input-select-fillout"></div>
							<select name="discipline" class="input-select window advisor-filter">
								<option value="0" selected>All practice areas</option>
								@foreach ($practice_areas as $practice_area)
									<option value="{{ $practice_area->practice_area_id }}">{{ $practice_area->name }}</option>
								@endforeach
							</select>
							<div class="input-select-fillout"></div>
						</div>
						<div class="select-row">
							<div class="input-select-fillout"></div>
							<select name="firm" class="input-select window advisor-filter">
								<option value="0" selected>All firms</option>
								@foreach ($firms as $firm)
									<option value="{{ $firm['id'] }}">{{ $firm['name'] }}</option>
								@endforeach
							</select>
							<div class="input-select-fillout"></div>
						</div>
						<div class="input-select-shadow">
						</div>
					</div>
				</div>
				<input type="submit" class="handheld-submit gobutton animate-opacity" value="Go" />
				<div id="advisors-search" class="class-search">
					<input type="text" class="input-search" name="phrase" placeholder="Or search by individual name" />
					<input type="submit" class="input-search-submit animate-opacity" value=" " />
					<input type="hidden" name="selected_classes[]" data-classid="1" value="1">
				</div>
				<input type="submit" class="tablet handheld-submit" value="See All Advisers" />
			{{ Form::close() }}
		</div>
	</div>
	@if($advisors_count != 0)
	@include('site.advisors_result_list')
	@endif
</div>
@stop