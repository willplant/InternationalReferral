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
			News
		</a>
	</div>
</div>
<div class="wrapper" id="news">
	{{ Form::open(array('url' => '/news/search')) }}
		<div class="left">
			<div class="explain-content no-margin-top">
				IR News is written by our members. Thus ensuring content is relevant, interesting and highly qualified. Join, write, share, interact and gain exposure!
			</div>
			<a href="{{ URL::to('/rss/news') }}" target="_blank" class="link" style="margin-top: 40px;">
				Latest News (RSS)
			</a>
			<div class="explain-title news-search-title" style="margin-top: 40px;">
				Looking for something special?
			</div>
			<div class="explain-content news-search-content">
				Search within our wide library of written articles and news. You’ll also find a record of each member’s publishing archive via their profile.
			</div>
		</div>
		<div class="right">
			<div class="classes-box">
				<div class="ir-exclusive-box box">
					<div class="light"></div>
					<div class="title">IR Exclusive</div>
					<div class="checkbox checked animate-all" data-class="exclusive" data-classid="1"></div>
				</div>
				<div class="ir-rising-stars-box box">
					<div class="light"></div>
					<div class="title">IR Rising Stars</div>
					<div class="checkbox checked animate-all" data-class="rising-stars" data-classid="2"></div>
				</div>
				<div class="ir-latin-box box">
					<div class="light"></div>
					<div class="title">IR Latin</div>
					<div class="checkbox checked animate-all" data-class="latin" data-classid="3"></div>
				</div>
				<a href="{{ url() }}/membership" class="ir-explain-box box">
					<span class="light"></span>
					<span class="text">
					IR Members are divided into three classes, IR Exclusive, IR Latin and IR Rising Stars.
					Find out more about IR membership here.
					</span>
				</a>
			</div>
			<div class="select-row filter-practicearea">
				<div class="input-select-fillout"></div>
				<select name="practicearea" class="input-select window advisor-filter">
					<option value="0" selected>All practice areas</option>
					@foreach ($practice_areas as $practice_area)
						<option value="{{ $practice_area->practice_area_id }}">{{ $practice_area->name }}</option>
					@endforeach
				</select>
				<div class="input-select-fillout"></div>
			</div>
			<div class="input-select-shadow"></div>
			<div id="advisors-search" class="class-search">
				<input type="text" class="input-search" name="phrase" placeholder="Search (e.g. UK economy)" />
				<input type="submit" class="input-search-submit animate-opacity" value=" " />
				<input type="hidden" name="selected_classes[]" data-classid="1" value="1">
				<input type="hidden" name="selected_classes[]" data-classid="2" value="2">
				<input type="hidden" name="selected_classes[]" data-classid="3" value="3">
			</div>
		</form>
	</div>
	<div class="news-list news-section">
		<div class="title"><span class="news-icon"></span>Latest News</div>
		<div class="news">
			<?php $grey = false; $language = 'en'; $index = 0; ?>
			@foreach ($news as $newspost)
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
				<?php 
					if ($grey == false):	
						$grey = true;
					elseif ($grey == true): 
						$grey = false;
					endif;
				?>
				<?php $index++; ?>
			@endforeach
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
</div>

@stop