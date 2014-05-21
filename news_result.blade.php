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
		<a href="{{ URL::to('/news') }}" class="breadcrumb breadcrumb breadcrumb-advisors animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			News
		</a>
		<a class="breadcrumb breadcrumb-active breadcrumb-advisors animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result
		</a>
	</div>
</div>
<div id="news" class="section news-results">
	<div class="wrapper">
		<div class="left">
			<div class="explain-title">
				Result
			</div>
			@if($articles_count != 0)
			<div class="explain-content">
				You’ve found {{ $articles_count }} matching {{ $articles_count == 1 ? 'article' : 'articles' }} to your search.
			</div>
			@else
			<div class="explain-content">
				No matching results was found in your search. Preform a new search to find what you are looking for.
			</div>
			@endif
		</div>
		@if($articles_count > 0)
		<div class="news-list news-section">
			<div class="title"><span class="news-icon"></span>Found articles</div>
			<div class="news">
				<?php $grey = false; $language = 'en'; ?>
				@foreach ($articles as $newspost)
					<?php $content_count = count($newspost['content']); ?>
					@foreach($newspost['content'] as $row)
						@if($content_count > 1)
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
						@else
							@if ($grey == true)
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post grey animate-opacity" data-language="{{ $row->language }}">
							@else
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post animate-opacity" data-language="{{ $row->language }}">
							@endif
						@endif
							
							<span class="post-title">
								{{ htmlspecialchars_decode($row->heading) }}
							</span>
							<span class="post-details">
								Publised <?php echo date('d M, Y', strtotime($newspost->datetime)); ?>
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
				@endforeach
			</div>
		</div>
		@endif
		
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
</div>

@stop