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
			Personal news feed
		</a>
	</div>
</div>
<div class="wrapper notifications-wrapper" id="news">
	<div class="left">
		<div class="explain-title">
			What's new?
		</div>
		<div class="explain-content">
			Welcome to your personal news feed.<br />All new articles since your last visit will be highlighted in yellow.<br/><br/>Visit your <a href="{{ URL::to('/option') }}" style="color: #8ea13b;">options</a> to specify what type of news notifications you wish to receive on your personal news feed. All other news can be found at the <a href="{{ URL::to('/news') }}" style="color: #8ea13b;">regular news area</a> on the site.
		</div>
	</div>
	<div class="news-list news-section">
		@if($article_count > 0)
		<div class="title"><span class="news-icon"></span>Latest News</div>
			<div class="news">
				<?php $grey = false; $language = 'en'; $index = 0; ?>
				@foreach ($news as $newspost)
					@foreach($newspost->content as $row)
						
						{{-- For user highlights --}}
						@if (Session::has('news') && Session::get('news') > $index)
							
							@if ($row->language == $language)
								@if ($grey == true)
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post highlight animate-opacity" data-language="{{ $row->language }}">
								@else
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post highlight-light animate-opacity" data-language="{{ $row->language }}">
								@endif
							@else
								@if ($grey == true)
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post highlight hide animate-opacity" data-language="{{ $row->language }}">
								@else
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post highlight-light hide animate-opacity" data-language="{{ $row->language }}">
								@endif
							@endif
							
						{{-- For regular visitors --}}
						@else
						
							@if ($row->language == $language)
								@if ($grey == true)
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post grey animate-opacity" data-language="{{ $row->language }}">
								@else
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post animate-opacity" data-language="{{ $row->language }}">
								@endif
							@else
								@if ($grey == true)
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post grey hide animate-opacity" data-language="{{ $row->language }}">
								@else
									<a href="{{ url() }}/article/{{ $newspost->id }}" class="post hide animate-opacity" data-language="{{ $row->language }}">
								@endif
							@endif
							
						@endif
							
							<span class="post-title">
								{{ htmlspecialchars_decode($row->heading) }}
							</span>
							<span class="post-details">
								Published <?php echo date('d M, Y', strtotime($newspost->datetime)); ?>
							</span>
						</a>
								
					@endforeach
					<?php 
						if ($grey == false):	
							$grey = true;
						elseif ($grey == true): 
							$grey = false;
						endif;
					?>
					<?php $index++; ?>
				@endforeach
				
				@if (Session::has('news'))
					<?php 
					Session::put('news', 0); 
					?>
				@endif
			</div>
			
			@if($pagination->getLastPage() > 1)
			<div class="pagination">
				<span>Pages</span>
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($firstLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ $current_url .'p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a></strong>
				@else
				<a href="{{ $current_url .'p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a>
					@if ($firstLink['value'] != '')
						<span>{{ $firstLink['value'] }}</span>
					@endif
				@endif

				@foreach($pagination->getLinks() as $link)
					@if($link['index'] == $pagination->getCurrentPage())
					<strong><a href="{{ $current_url .'p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a></strong>
					@else
					<a href="{{ $current_url .'p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a>
					@endif
				@endforeach

				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ $current_url .'p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a></strong>
				@else
					@if ($lastLink['value'] != '')
						<span>{{ $lastLink['value'] }}</span>
					@endif
				<a href="{{ $current_url .'p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a> 
				@endif
			</div>
					
			<div class="mobile pagination pagination-mobile">
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($pagination->getCurrentPage() != 1)
					<?php $key = $pagination->getCurrentPage() - 1; ?>
				<strong><a href="{{ $current_url .'p'. $key }}" style="float: left;"><span class="light"></span>Previous page</a></strong>
				@endif
				
				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink != $pagination->getCurrentPage())
					<?php $key = $pagination->getCurrentPage() + 1; ?>
				<strong><a href="{{ $current_url .'p'. $key }}" style="float: right;"><span class="light"></span>Next page</a></strong>
				@endif
			</div>
			@endif
		</div>
		@else
		<div class="left">
			<div class="title"><span class="news-icon"></span>Latest News</div>
			<div class="explain-content">
				No articles are available according to your selected filters. To change your settings, please go to <a href="{{ URL::to('/options') }}">Options</a> and select practice areas or regions that interest you.
			</div>
		</div>
		@endif
	</div>
</div>

@stop