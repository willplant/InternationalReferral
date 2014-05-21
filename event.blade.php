@extends('site.template')

@section('content')
<div id="background">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div class="breadcrumbs">
	<div class="wrapper">
		<div class="breadcrumb breadcrumb-home no-margin-left animate-opacity">
			<div class="light"></div>
			<div class="end"></div>
			<div class="icon"></div>
		</div>
		<a href="{{ URL::to('/events') }}" class="breadcrumb breadcrumb-events animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Events
		</a>
		<div class="breadcrumb breadcrumb-active animate-opacity">
			<div class="light"></div>
			<div class="begin"></div>
			<div class="end"></div>			
			Event: &nbsp;'<span class="breadcrumb-light">{{{ $event->location }}}</span>'
		</div>
	</div>
</div>
<div id="events" class="event-single section">
	<div class="wrapper">
		<div class="title tablet mobile">
			{{{ $event->heading }}}<br />
			@if(date('j-n', strtotime($event->start_date)) == date('j-n', strtotime($event->end_date))) 
			<span class="date">{{ date('jS F, Y', strtotime($event->start_date)) }}</span>
			@else
			<span class="date">{{ date('jS', strtotime($event->start_date)) }} - {{ date('jS F, Y', strtotime($event->end_date)) }}</span>
			@endif
		</div>
		<?php 
		$attachment_count = count($event->attachments) - 1;
		$i = 0;
		?>
		<div class="image-carousel">
			@foreach($event->attachments as $att)
			@if($i == 0)
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-center animate-all" alt="" />
			@elseif ($i == 1)
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-right animate-all" alt="" />
			@else
			<img src="{{ '/attachments/' . $att->id . '.' . $att->extension }}" class="img-right img-hidden-right animate-all" alt="" />
			@endif
			<?php $i++; ?>
			@endforeach
			@if (count($event->attachments) > 1)
			<div class="arrow arrow-left hide animate-opacity"></div>
			<div class="arrow arrow-right animate-opacity"></div>
			@endif
			<div class="gradient-left"></div>
			<div class="gradient-right"></div>
		</div>
		<div class="image-carousel-shadow animate-opacity"></div>
		<div class="left">
			<div class="content-section content-summery">
				<div class="title">Event Summary</div>
				<div class="content">
					{{ $event->summary }}
				</div>
			</div>
			<div class="event-buttons">
				@if ($event->start_date > date('Y-m-d'))
				<a href="{{ $event->url_registration }}" class="link"><span class="link-icon-register"></span><span class="light"></span>Register for this event</a>
				@endif
				<a class="link link-share"><span class="link-icon-share"></span><span class="light"></span>Share this event</a>
				<a class="link link-facebook link-hidden" data-link="{{ URL::to('/event/'.$event->id) }}" data-title="{{ $event->heading }}" data-type="event"><span class="link-icon-facebook"></span><span class="light"></span>on Facebook</a>
				<a class="link link-twitter link-hidden" data-link="{{ URL::to('/event/'.$event->id) }}" data-title="{{ $event->heading }}"><span class="link-icon-twitter"></span><span class="light"></span>on Twitter</a>

				@foreach($event->links as $link)
					<a class="link" href="{{ $link->url }}" target="_blank"><span class="light"></span>
						@if ($link->name == '')
						{{ $link->url }}
						@else
						{{ $link->name }}
						@endif
					</a>
				@endforeach
			</div>

			<div class="content-section">
				<div class="title">Event Content</div>
				<div class="content">
					{{ $event->short_description }}
				</div>
			</div>
		</div>
		<div class="right">
			<div class="content-section">
				<div class="title">Description</div>
				<div class="content">
					{{ $event->description }}
				</div>
			</div>
			@if(count($event->partners) > 0)
			<div class="content-section">
				<div class="title">Sponsors</div>
				<div class="content">
					@foreach($event->partners as $partner)
					<a href="{{ $partner->url_website }}" target="_blank" class="sponsor" style="background-image: url({{ '/attachments/partners/' . $partner->id . '.' . $partner->image_extention }});"></a>
					@endforeach
				</div>
			</div>
			@endif

			@if (count($testimonials) > 0)
			<div class="testimonail-wrapper testimonial-desktop-wrapper">
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
					<span class="name">{{ $testimonial->author }}</span> <span class="firm">, {{ $testimonial->author_details }}</span>
				</div>
				<div class="key-value animate-all">
					"{{ $testimonial->short_description }}"
				</div>
				<div class="comment animate-all">
					{{ $testimonial->description }}
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
			<div class="image" style="background-image: url({{ '/attachments/testimonials/' . $testimonial->id . '.' . $testimonial->image_extention }});"></div>
			<div class="details">
				<span class="name">{{ $testimonial->author }}</span> <span class="firm">, {{ $testimonial->author_details }}</span>
			</div>
			<div class="key-value animate-all">
				"{{ $testimonial->short_description }}"
			</div>
			<div class="comment animate-all">
				{{ $testimonial->description }}
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