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
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Events
		</a>
	</div>
</div>
<div id="events" class="section">
	<div class="wrapper">
		@if($upcoming_events)
		<div class="left">
			<div class="upcoming-event">
				<div class="title tablet mobile">
					<a href="{{ url() }}/event/{{ $upcoming_events[0]['id'] }}">{{ $upcoming_events[0]['location'] }}</a><br />
					@if(date('j-n', strtotime($upcoming_events[0]['start_date'])) == date('j-n', strtotime($upcoming_events[0]['end_date']))) 
					<span class="date">{{ date('jS F, Y', strtotime($upcoming_events[0]['start_date'])) }}</span>
					@else
					<span class="date">{{ date('jS', strtotime($upcoming_events[0]['start_date'])) }} - {{ date('jS F, Y', strtotime($upcoming_events[0]['end_date'])) }}</span>
					@endif
				</div>
				<div class="image-container">
					<?php $index = 0; ?>
					@foreach($upcoming_events[0]['attachments'] as $attachment)
						@if ($index == 0)
							<img src="/attachments/{{ $attachment['id'] . '.' . $attachment['extension'] }}" class="image image-active animate-opacity-long" alt="" />
						@else
							<img src="/attachments/{{ $attachment['id'] . '.' . $attachment['extension'] }}" class="image animate-opacity-long" alt="" />
						@endif
						<?php $index++; ?>
					@endforeach
				</div>
				<div class="image-container-shadow animate-opacity"></div>
			</div>
		</div>
		<div class="right first">
			<div class="explain-title">
				How we make networking both enjoyable and profitable.
			</div>
			<div class="explain-content">
				Meet up and expand your network with high level professionals from around the world. IR events inspire you and show the infinite possibilities of working together under the same vision.
			</div>
		</div>
		{{-- In the case of when we have no upcoming events --}}
		@else
		<div class="left">
			<div class="explain-title">
				How we make networking both enjoyable and profitable.
			</div>
			<div class="explain-content">
				Meet up and expand your network with high level professionals from around the world. IR events inspire you and show the infinite possibilities of working together under the same vision.
			</div>
		</div>
		@endif
	</div>
	<div class="wrapper event-lists">
		<div class="left">
			<div class="title">Upcoming events</div>
			<div class="event-list">
			<?php
			$count 	= 0;
			$grey 	= false;
			?>
			@foreach($upcoming_events as $event)
				@if ($grey == false)
					@if ($count == 0)
					<a href="{{ url() }}/event/{{ $event['id'] }}" class="event animate-opacity event-next">
					@else
					<a href="{{ url() }}/event/{{ $event['id'] }}" class="event animate-opacity">
					@endif
				@else
					<a href="{{ url() }}/event/{{ $event['id'] }}" class="event grey animate-opacity">
				@endif
					<span class="place">{{ $event['location'] }}</span>
					@if(date('j-n', strtotime($event['start_date'])) == date('j-n', strtotime($event['end_date']))) 
					<span class="date">{{ date('jS F, Y', strtotime($event['start_date'])) }}</span>
					@else
					<span class="date">{{ date('jS', strtotime($event['start_date'])) }} - {{ date('jS F, Y', strtotime($event['end_date'])) }}</span>
					@endif
				</a>
				<?php
				// Display only 2 upcoming evnets
				if($count == 2)
					break;
				
				if 			($grey == false) 		$grey = true;
				else if 	($grey == true) 		$grey = false;

				$count++;
				?>
			@endforeach
			
			@if($count == 0)
			<div class="animate-opacity">
				<div class="nothing">No upcoming events..</div>
			</div>
			@endif
			</div>
			@if (count($testimonials) > 0)
				<div class="testimonial-wrapper testimonial-desktop-wrapper">
					<div class="testimonial-title testimonial-desktop">Testimonials</div>
					<?php $i = 0; ?>
					@foreach($testimonials as $testimonial)
					@if($i > 0)
					<div class="testimonial testimonial-desktop hide">
					@else
					<div class="testimonial testimonial-desktop testimonial-active">
					@endif
						<div class="light"></div>
						@if ($testimonial->has_image != 0)
						<div class="image" style="background-image: url({{ '/attachments/testimonials/' . $testimonial->id . '.' . $testimonial->image_extention }});
						filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/testimonials/' . $testimonial->id . '.' . $testimonial->image_extention }}', sizingMethod='scale');
						-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/testimonials/' . $testimonial->id . '.' . $testimonial->image_extention }}', sizingMethod='scale')';"></div>
						@else
						<div class="image"></div>
						@endif
						<div class="details">
							<span class="name">{{ $testimonial->author }}</span> <span class="firm">, {{ htmlspecialchars_decode($testimonial->author_details) }}</span>
						</div>
						<div class="key-value animate-all">
							"{{ htmlspecialchars_decode($testimonial->short_description) }}"
						</div>
						<div class="comment animate-all">
							{{ htmlspecialchars_decode($testimonial->description) }}
						</div>
						<div class="border"></div>
						<div class="shadow"></div>
						<div class="expand"></div>
					</div>
					<?php $i++; ?>
					@endforeach
				</div>
			@endif
		</div>
		<div class="right">
			<div class="title">Past events</div>
			<div class="event-list">
			<?php
			$grey = false;
			foreach($previous_events as $event):
				if(time() > strtotime($event['start_date']))
				{
				?>
					@if ($grey == false)
						<a href="{{ url() }}/event/{{ $event['id'] }}" class="event animate-opacity">
					@else
						<a href="{{ url() }}/event/{{ $event['id'] }}" class="event grey animate-opacity">
					@endif
						<span class="place">{{ $event['location'] }}</span>
						@if(date('j-n', strtotime($event['start_date'])) == date('j-n', strtotime($event['end_date']))) 
						<span class="date">{{ date('jS F, Y', strtotime($event['start_date'])) }}</span>
						@else
						<span class="date">{{ date('jS', strtotime($event['start_date'])) }} - {{ date('jS F, Y', strtotime($event['end_date'])) }}</span>
						@endif
					</a>
				<?php
				}
				
				if 			($grey == false) 		$grey = true;
				else if 	($grey == true) 		$grey = false;
			endforeach;
			?>
			</div>
			<div class="load-more" data-page="1">
				Load more past events
			</div>
		</div>
	</div>
	@if (count($testimonials) > 0)
	<div class="tablet wrapper testimonial-wrapper tablet-testimonial-wrapper">
		<div class="testimonial-title">Testimonials</div>
		<?php $i = 0; ?>
		@foreach($testimonials as $testimonial)
		@if($i > 0)
		<div class="testimonial hide">
		@else
		<div class="testimonial testimonial-active">
		@endif
			<div class="light"></div>
			@if ($testimonial->has_image != 0)
			<div class="image" style="background-image: url({{ '/attachments/testimonials/' . $testimonial->id . '.' . $testimonial->image_extention }});"></div>
			@else
			<div class="image"></div>
			@endif
			<div class="details">
				<span class="name">{{ $testimonial->author }}</span> <span class="firm">, {{ $testimonial->author_details }}</span>
			</div>
			<div class="key-value animate-all">
				"{{ htmlspecialchars_decode($testimonial->short_description) }}"
			</div>
			<div class="comment animate-all">
				{{ htmlspecialchars_decode($testimonial->description) }}
			</div>
			<div class="border"></div>
			<div class="shadow"></div>
			<div class="expand"></div>
		</div>
		<?php $i++; ?>
		@endforeach
	</div>
	@endif
</div>
@stop