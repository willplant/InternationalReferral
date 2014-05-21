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
			Your Articles
		</a>
	</div>
</div>
<div class="wrapper settings-wrapper profile-settings-page" id="news">
	<div class="left">
		<div class="explain-title">
			Your Articles
		</div>
		<div class="explain-content">
			Here you can see your own articles and post new ones if you wish. If you have written something you like, feel free to publish it by pressing the button below.
		</div>
	</div>
	<div class="right">
		<div class="link-list">
			<a href="{{ URL::to('/my_articles/write') }}" class="link"><span class="light"></span>Write an article</a>
		</div>
	</div>

	<div class="news-list news-section">
		@if($news_count > 0)
		<div class="title"><span class="news-icon"></span>Your Articles:</div>
		<div class="news">
			<?php $grey = false; $language = 'en'; $index = 0; ?>
			@foreach ($news as $newspost)
				<div class="post-holder">
				@foreach($newspost->content as $row)
					
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
						
						<span class="post-title">
							{{ htmlspecialchars_decode($row->heading) }}
						</span>
						<span class="post-details">
							Published <?php echo date('d M, Y', strtotime($newspost->datetime)); ?>
						</span>
					</a>
					
				@endforeach
				@if ($grey == true)
					<a href="{{ URL::to('my_articles/edit/'.$newspost->id) }}" class="edit-article grey animate-opacity" data-id="{{ $newspost->id }}">
				@else
					<a href="{{ URL::to('my_articles/edit/'.$newspost->id) }}" class="edit-article animate-opacity" data-id="{{ $newspost->id }}">
				@endif
						Edit Article
					</a>
				
				@if ($grey == true)
					<a class="remove-article grey animate-opacity" data-id="{{ $newspost->id }}">
				@else
					<a class="remove-article animate-opacity" data-id="{{ $newspost->id }}">
				@endif
						Remove Article
					</a>
				<?php 
					if ($grey == false):	
						$grey = true;
					elseif ($grey == true): 
						$grey = false;
					endif;
				?>
				<?php $index++; ?>
				</div>
			@endforeach
		</div>
		@else
		<div class="title"><span class="news-icon"></span>No written articles</div>
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

<div id="content-lang-remove-confirm" class="hide">
  <div class="modal-body">
	<p class="text-center">Are you sure you wish to remove this article?</p>
  </div>
  <div class="modal-footer">
	<button class="btn btn-primary modal-hide">No thanks!</button>
	<button type="button" class="btn btn-danger article-remove">Remove article</button>
  </div>
</div>

@stop