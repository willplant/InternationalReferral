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
		<div class="breadcrumb breadcrumb breadcrumb-latin animate-opacity">
			<div class="light"></div>
			<div class="begin"></div>
			<div class="end"></div>
			IR Latin
		</div>
	</div>
</div>
<div id="advisors" class="section advisors-latin">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				<div class="icon-40-latin"></div> IR Latin
			</div>
			<div class="explain-content">
				IR Latin is our Spanish language group. Promoting the development of Latin American businesses and their international expansion.
			</div>
		</div>
		<div class="right">
			{{ Form::open(array('url' => '/latin/search')) }}
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
									@if($country['country_name_es'] != "")
										<option value="{{ $country['country_id'] }}">{{ $country['country_name_es'] }}</option>
									@else
										<option value="{{ $country['country_id'] }}">{{ $country['country_name'] }}</option>
									@endif
									@if(array_key_exists('regions', $country))
										@foreach($country['regions'] as $region)
											@if($region['region_name'] != $country['country_name'])
												@if($region['region_name_es'] != "")
												<option value="{{ $region['region_id'] }}">- {{ $region['region_name_es'] }}</option>
												@else
												<option value="{{ $region['region_id'] }}">- {{ $region['region_name'] }}</option>
												@endif
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
									@if($practice_area->name_es != "")
									<option value="{{ $practice_area->practice_area_id }}">{{ $practice_area->name_es }}</option>
									@else
									<option value="{{ $practice_area->practice_area_id }}">{{ $practice_area->name }}</option>
									@endif
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
					<input type="hidden" name="selected_classes[]" data-classid="3" value="3">
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