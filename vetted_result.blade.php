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
		<a href="{{ URL::to('/vetted') }}" class="breadcrumb animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			IR Vetted
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			{{ $vettedRegion->name }}
		</a>
	</div>
</div>
<div class="wrapper vetted" style="margin-top: 100px;">
	<div class="vetted-function" style="margin-bottom: 0px;">
		<img src="{{ URL::to('img/site-desktop/vetted.png') }}" /><br /><br />
		<div class="explain-title action-title">Select a region below to see the IR Vetted firms:</div>
		<div class="explain-content">
			<select id="regions_selection" name="regions_selection" class="input-setting-dropdown" style="float: none;" data-baseurl="{{ URL::to('vetted') }}">
				<option value="">Select region</option>
				@foreach ($vettedRegions as $vr)
					@if($selected_region == $vr->id)
						<option value="{{ $vr->id }}" selected>{{ $vr->name }}</option>
					@else
						<option value="{{ $vr->id }}">{{ $vr->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="vetted-results">
		@foreach($vettedRegion->vetteds as $vetted)
			<a href="{{ $vetted->firm->url }}" target="_blank" class="vetted-object">
				<span class="vetted-link">{{ $vetted->firm->name }}</span><br/>			
				<span class="vetted-pa">
					<?php $index = 0; ?>
					@if (count($vetted->firm->practiceAreas) > 0)
					<span class="vetted-label">Practice areas:</span>
					@foreach ($vetted->firm->practiceAreas as $pa)
						@if ($index > 0)
						<?php echo ", "; ?>
						@endif
						{{ $pa->name }}
						<?php $index++; ?>
					@endforeach
					@else
						<i>No Practice areas..</i>
					@endif
				</span>
				@if($vetted->firm->has_image)
				<span class="vetted-image">
					<img src="{{ URL::to('attachments/firms/'.$vetted->firm->id.'.'.$vetted->firm->image_extention) }}" />
				</span>
				@endif
			</a>
		@endforeach
	</div>
</div>

@stop