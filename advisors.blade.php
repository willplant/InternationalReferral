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
			Find an Adviser
		</a>
	</div>
</div>
<div id="advisors" class="section">
	<div class="wrapper">
		<div class="left">
			<div id="advisors-classes">
				<div class="explain-title">
					Choose from our classes
				</div>
				<div class="explain-content">
				<ul>
				<li>‘Exclusive’ members are vetted and our recommended referral partners. They offer the highest quality advice and support to our global client base.</li>
				<li>IR Latin is our Spanish language group. Promoting the development of Latin American businesses and their international expansion.</li>
				<li>Rising Stars - are our pick of the most talented associates and junior partners within our member's teams.</li>
				</ul>
				</div>
				<div class="classes-box">
					<div class="ir-exclusive-box box">
						<div class="light"></div>
						<div class="title">IR Exclusive</div>
						<div class="checkbox checked animate-all" data-class="exclusive" data-classid="1"></div>
					</div>
					<div class="ir-rising-stars-box box">
						<div class="light"></div>
						<div class="title">IR Rising Stars</div>
						<div class="checkbox animate-all" data-class="rising-stars" data-classid="2"></div>
					</div>
					<div class="ir-latin-box box">
						<div class="light"></div>
						<div class="title">IR Latin</div>
						<div class="checkbox animate-all" data-class="latin" data-classid="3"></div>
					</div>
					<a href="{{ URL::to('/membership') }}" class="ir-explain-box box">
						<span class="light"></span>
						<span class="text">
						IR Members are divided in to 3 classes; IR Exclusive, IR Latin and Rising Stars
						Find out more about membership here.
						</span>
					</a>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="explain-title">
				Find an Adviser
			</div>
			{{ Form::open(array('url' => '/advisors/search')) }}
				<div id="advisors-filter">
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
					<input type="hidden" name="selected_classes[]" data-classid="2" value>
					<input type="hidden" name="selected_classes[]" data-classid="3" value>
				</div>
				<input type="submit" class="tablet handheld-submit" value="See All Advisers" />
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop