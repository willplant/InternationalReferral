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
		<a href="{{ URL::to('/latin') }}" class="breadcrumb breadcrumb breadcrumb-latin animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			IR Latin
		</a>
		<div class="breadcrumb breadcrumb-active animate-opacity">
			<div class="light"></div>
			<div class="begin"></div>
			<div class="end"></div>
			Result
		</div>
	</div>
</div>
<div id="advisors" class="section advisors-latin">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				<div class="icon-40-latin"></div> IR Latin
			</div>
			@if($advisors_count != 0)
			<div class="explain-content">
				IR Latin is our Spanish language group. Promoting the development of Latin American businesses and their international expansion.
			</div>
			@else
			<div class="explain-content">
				No matching results were found, please perform a new search.<br />
				If you are still unable to find what you are looking for, you can contact lorna@international-referral.com<br /><br />
				If you would like to apply for the membership in this area / location, you can contact ross@international-referral.com
			</div>
			@endif
		</div>
	</div>
	@if($advisors_count != 0)
	@include('site.advisors_result_list')
	@endif
</div>
@stop