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
		<a href="{{ URL::to('/rising-stars') }}" class="breadcrumb breadcrumb-rising-stars animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			IR Rising stars
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result
		</a>
	</div>
</div>
<div id="advisors" class="section advisors-rising-stars">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				<div class="icon-40-rising-stars"></div> IR Rising Stars
			</div>
			@if($advisors_count != 0)
			<div class="explain-content">
				Rising Stars - are our pick of the most talented associates and junior partners within our member's teams.
			</div>
			@else
			<div class="explain-content">
				No matching results were found, please perform a new search.<br />
				If you are still unable to find what you are looking for, you can contact lorna@international-referral.com<br /><br />
				If you would like to apply for the membership in this area / location, you can contact ross@international-referral.com
			</div>
			@endif
		</div>
		<div class="right">
			{{ Form::open(array('url' => '/rising-stars/search')) }}
				<div id="advisors-search">
					<input type="text" name="phrase" class="input-search" placeholder="Search by individual name" value="{{ $phrase }}" />
					<input type="submit" class="input-search-submit animate-opacity" value=" " />
				</div>
			{{ Form::close() }}
		</div>
	</div>
	@if($advisors_count != 0)
	@include('site.advisors_result_list')
	@endif
</div>
@stop