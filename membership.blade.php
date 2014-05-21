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
			Membership
		</a>
	</div>
</div>
<div class="wrapper static static-first">
	<div class="left">
		<div class="image-container">
			<img src="{{ url() }}/img/static/membership1.jpg" class="image image-active animate-opacity-long" alt="" />
			<img src="{{ url() }}/img/static/membership2.jpg" class="image animate-opacity-long" alt="" />
			<img src="{{ url() }}/img/static/membership3.jpg" class="image animate-opacity-long" alt="" />
		</div>
		<div class="image-container-shadow"></div>
	</div>
	<div class="right first">
		<div class="explain-title membership-title">
			IR - Connects you!
		</div>
		<div class="explain-content">
			We open the door to a worldwide network of professional service firms. Receive recommendations, introductions, news & event information, opportunities, advice and business development support.
		</div>
	</div>
</div>
<div class="wrapper static twelvetwenty">
	<div class="title">
		IR Classes
	</div>
	<div class="subtitle">
		- IR Exclusive
	</div>
	<div class="post">
		Our ‘exclusive’ members are the most highly recommended specialist firms across all fields of advice. Renowned for innovation, expertise and their integrity.
	</div>
	<div class="subtitle">
		- IR Latin
	</div>
	<div class="post">
		The IR Latin members are the finest Spanish speaking advisers in the world. The group focuses on sharing and creating opportunities in the Latin American region.
	</div>
	<div class="subtitle">
		- IR Rising Stars
	</div>
	<div class="post">
		These members represent the best talent in the professional service sectors. The individual members are typically senior associates or junior partners who are building a reputation for excellence.
	</div>
</div>
<div class="wrapper static twelvetwenty">
	<div class="title">
		Application information
	</div>
	<div class="subtitle">
		- Creating Value / Rewarding Excellence
	</div>
	<div class="post">
		Our members share our ethos of mutual benefit for mutual effort. Exclusive memberships are booked via invitation only and all applicants are subjected to our internal vetting procedure. Each firm is therefore required to have an exceptional reputation, the highest professional standards and niche expertise.
	</div>
	<div class="subtitle">
		- Vetting process
	</div>
	<div class="post">
		All applicants are subjected to a stringent vetting process prior to acceptance. During this process, we analyze firm reputation, rankings and gauge feedback from connections in their jurisdiction. In addition, a face to face meeting or conference call is required to ensure the applicant is aware of group expectations and how they can utilize their membership to best effect.
	</div>
</div>
<div class="wrapper static twelvetwenty">
	<div class="title">
		Benefits
	</div>
	<div class="subtitle">
		- Why join a network?
	</div>
	<div class="post">
	<ul><li>Build your international connections and gain incoming referrals</li><li>Assist your existing clients with high quality international experts</li><li>Develop your firm brand globally</li><li>Distribute and share your news and updates to peers</li><li>Learn new skills and gain support on business development</li><li>Attend events and make new contacts and friends</li></ul>
	</div>
	<div class="subtitle">
		- Why join IR?
	</div>
	<div class="post">
	<ul>
		<li>Representation in over 140+ jurisdictions and in over 70 unique practice areas</li>
		<li>135 Chambers Ranked Law Firms</li>
		<li>Unique, thought provoking and inspirational events</li>
		<li>Working groups each led by a steering committee</li>
		<li>Exclusive membership secured by jurisdiction and area of expertise</li>
		<li>Personal client manager, offering introductions and support</li>
		<li>Market leader in online and social media marketing</li>
	</ul>
	</div>
	<div class="subtitle">
		- Applying for membership
	</div>
	<div class="post">
		For further information concerning membership and the application process, please contact the Business Development Director Mr Ross Nicholls.
	</div>
	<div class="link-list">
		<a href="mailto:ross@international-referral.com" class="link contact-link" target="_blank"><span class="light"></span>E-mail Ross</a>
		<a href="tel:+441675443396" class="link contact-link mobile" target="_blank"><span class="light"></span>Call IR</a>
	</div>
</div>
<div class="wrapper static static-last">
	<div class="left">
		<div class="title">
			Why Join?
		</div>
		@if (count($testimonials) > 0)
			<div class="testimonial-wrapper testimonial-desktop-wrapper">
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
	<div class="right static-regular">
		<div class="title">
			Refund policy
		</div>
		<div class="post">
			Any membership purchased can be cancelled within 7 days for any reason, by giving written notice via email or via post to The Piggery, Woodhouse Farm, Catherine de Barnes Lane, Catherine de Barnes, B92 ODJ. The amount will be refunded in full.
		</div>
	</div>
</div>

@stop