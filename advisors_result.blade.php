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
		<a href="{{ URL::to('/advisors') }}" class="breadcrumb breadcrumb breadcrumb-advisors animate-opacity" onclick="">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Find an Adviser
		</a>
		<a class="breadcrumb breadcrumb-active breadcrumb-advisors animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result
		</a>
	</div>
</div>
<div id="advisors" class="section">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				Result
			</div>
			@if($advisors != 0)
			<div class="explain-content">
				You’ve found {{ $advisors_count }} matching {{ $advisors_count == 1 ? 'profile' : 'profiles' }} to your search
					@if ($phrase != null)
					 <span class="black-strong">'{{ $phrase }}'</span>.
					@endif
			</div>
			@else
			<div class="explain-content">
				No matching results were found, please perform a new search.<br />
				If you are still unable to find what you are looking for, you can contact lorna@international-referral.com<br /><br />
				If you would like to apply for the membership in this area / location, you can contact ross@international-referral.com
			</div>
			@endif
		</div>
		@include('site.advisors_result_list')
	</div>
</div>

@stop