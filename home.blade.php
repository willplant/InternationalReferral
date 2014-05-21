@extends('site.template')

@section('content')
<div id="background" class="mobile-hide">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div class="section" id="home">
	<div class="wrapper">
		<div class="left">
			<div id="home-logo" class="tablet mobile"></div>
			<div class="explain-title">
				IR is the world's largest group of advisers featured
				exclusively by practice area expertise. Thus ensuring 
				clients can find the best specialist adviser for their requirements.
			</div>
			<div class="explain-content">
				The group is renowned for it's innovative approach and we
				work alongside our partners to provide clients; better value,
				improved service and more creative solutions.
				<br /><br />
				<a href="{{ URL::to('/advisors') }}" class="link" style="font-family: 'Titillium Web';">Find an Adviser here</a>
			</div>
		</div>
		<div class="right">
			<div id="dandelion"></div>
			<div id="canvas">
				<div id="canvas-gradient"></div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper stretched home-wrapper">
	<div class="left" id="home-videos">
		<div class="image-container">
			<div class="title">IR Latest Videos</div>
			<div class="nav-objects">
				<div class="nav nav-active animate-opacity"></div>
				<div class="nav animate-opacity"></div>
				<div class="nav no-margin-right animate-opacity"></div>
			</div>			
				<img src="{{ URL::to('img/static/vimeo1.jpg') }}" data-video="1" class="image image-active animate-opacity-long" alt="" />
				<img src="{{ URL::to('img/static/vimeo2.jpg') }}" data-video="2" class="image animate-opacity-long" alt="" />
				<img src="{{ URL::to('img/static/vimeo3.jpg') }}" data-video="3" class="image animate-opacity-long" alt="" />
		</div>
	</div>
	<div class="right" id="home-classes">
		<div class="classes-box">
			<a href="{{ URL::to('/exclusive') }}" class="ir-exclusive-box box">
				<span class="light"></span>
				<span class="title">IR Exclusive</span>
			</a>
			<a href="{{ URL::to('/rising-stars') }}" class="ir-rising-stars-box box">
				<span class="light"></span>
				<span class="title">IR Rising Stars</span>
			</a>
			<a href="{{ URL::to('/latin') }}" class="ir-latin-box box">
				<span class="light"></span>
				<span class="title">IR Latin</span>
			</a>
			<a href="{{ URL::to('/membership') }}" class="ir-explain-box box">
				<span class="light"></span>
				<span class="text">
				IR Members are divided in to 3 classes; IR Exclusive, IR Latin and Rising Stars
				Find out more about membership here.
				</span>
			</a>
		</div>
	</div>
	<div class="shadow"></div>
</div>
<div class="wrapper stretched home-wrapper">
	<div class="left" id="home-events">
		<div class="image-container">
			@if(time() < strtotime($event[0]['start_date']))
			<div class="title"><span class="icon"></span> Upcoming Event</div>
			@else
			<div class="title"><span class="icon"></span> Past Event</div>
			@endif
			<div class="nav-objects">
				<div class="nav nav-active animate-opacity"></div>
				<div class="nav animate-opacity"></div>
				<div class="nav no-margin-right animate-opacity"></div>
			</div>
			<a href="{{ URL::to('/event/'.$event[0]->id) }}" class="event-title animate-opacity"><span><strong>{{ htmlspecialchars_decode($event[0]->heading) }}</strong><br />{{ $event[0]->location }} - <?php echo date('d F', strtotime($event[0]->start_date)); ?></span></a>
			
			<?php $i = 0; ?>
			<a href="{{ URL::to('/event/'.$event[0]->id) }}" class="animate-opacity">
			@foreach($event[0]->attachments as $att)
				@if($i == 0)
				<img src="/attachments/{{ $att->id . '.' . $att->extension }}" class="image image-active animate-opacity-long" alt="" />
				@else
				<img src="/attachments/{{ $att->id . '.' . $att->extension }}" class="image animate-opacity-long" alt="" />
				@endif
				<?php $i++; ?>
			@endforeach
			</a>

		</div>
	</div>
	<div class="right" id="home-news">
		<div class="newsbox">
			<div class="title">
				<span class="icon"></span> Latest News
				<div class="nav-objects">
					<?php $i = 0; ?>
					@foreach ($latest_news as $article)
						@if ($i == 0)
							<div class="nav nav-active animate-opacity">	
						@elseif ($i == count($latest_news) - 1)
							<div class="nav no-margin-right animate-opacity">
						@else
							<div class="nav animate-opacity">
						@endif
							</div>
					<?php $i++; ?>
					@endforeach
				</div>
			</div>
			<div class="post">
				<?php $i = 0; ?>
				@foreach ($latest_news as $article)
					@if ($i == 0)
					<a href="{{ URL::to('/article/'.$article->id) }}" class="newspost newspost-active animate-opacity-superlong">
					@else
					<a href="{{ URL::to('/article/'.$article->id) }}" class="newspost animate-opacity-superlong">
					@endif
						<span class="light"></span>
						<span class="post-title">
							{{ htmlspecialchars_decode($article->content[0]->heading) }}
						</span>
						@if($article->member)
						<span class="published-by">Published by <strong>{{ $article->member->first_name }} {{ $article->member->middle_name }} {{ $article->member->last_name }}</strong></span>
						@else
						<span class="published-by">Published by <strong>a former member</strong></span>
						@endif
						<span class="date"><?php echo date('d F, Y', strtotime($article->datetime)); ?></span>
					</a>
				<?php $i++; ?>
				@endforeach
			</div>
		</div>
	</div>
	<div class="shadow"></div>
</div>
<div class="wrapper stretched home-wrapper">
	<div class="left" id="home-hotels">
		<div class="image-container" id="featured-hotels">
			<div class="title hotels-title"><span class="icon"></span>Featured Hotel Partners</div>
			<div class="nav-objects">
				<?php $i = 0; ?>
				@foreach ($featured_hotels as $hotel)
					@if ($i == 0)
						<div class="nav nav-active animate-opacity">	
					@elseif ($i == count($featured_hotels) - 1)
						<div class="nav no-margin-right animate-opacity">
					@else
						<div class="nav animate-opacity">
					@endif
						</div>
				<?php $i++; ?>
				@endforeach
			</div>
			<div class="hotel-title"><strong>{{ htmlspecialchars_decode($featured_hotels[0]['name']) }}</strong> - {{ $featured_hotels[0]['city'] }}, {{ htmlspecialchars_decode($featured_hotels[0]['country']['short_name']) }}</div>
			<?php $i = 0; ?>
				<a href="{{ URL::to('hotel/'.$featured_hotels[0]['id']) }}" class="featured-hotels-link animate-opacity">
					@foreach($featured_hotels as $hotel)
						@if($i == 0)
						<img src="/attachments/{{ $hotel['attachments'][0]['id'] . '.' . $hotel['attachments'][0]['extension'] }}" class="image image-active animate-opacity" data-name="{{ htmlspecialchars_decode($hotel['name']) }}" data-place="{{ $hotel['city'] }}, {{ htmlspecialchars_decode($hotel['country']['short_name']) }}" data-href="{{ URL::to('hotel/'.$hotel['id']) }}" alt="" />
						@else
						<img src="/attachments/{{ $hotel['attachments'][0]['id'] . '.' . $hotel['attachments'][0]['extension'] }}" class="image animate-opacity" data-name="{{ htmlspecialchars_decode($hotel['name']) }}" data-place="{{ $hotel['city'] }}, {{ htmlspecialchars_decode($hotel['country']['short_name']) }}" data-href="{{ URL::to('hotel/'.$hotel['id']) }}" alt="" />
						@endif
						<?php $i++; ?>
					@endforeach
				</a>
		</div>
	</div>
	<a href="http://ww2.international-referral.com/training.cfm" target="_blank" class="right animate-opacity" id="home-irtraining">
		<div class="title">IR Training</div>
		<div class="text">
			We are passionate about sharing business<br />
			development ideas via our training platform.<br />
			<br >
			Learn more here...
		</div>
	</a>
	<div class="shadow">
	</div>
</div>

@include('site.partials.vimeo_lightbox')

@stop