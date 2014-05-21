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
			What is IR
		</a>
	</div>
</div>
<div class="wrapper static static-first">
	<div class="left">
		<div class="image-container">
			<img src="{{ url() }}/img/static/what_is_ir_01.jpg" class="image image-active animate-opacity-long" alt="" />
			<img src="{{ url() }}/img/static/what_is_ir_02.jpg" class="image animate-opacity-long" alt="" />
			<img src="{{ url() }}/img/static/what_is_ir_03.jpg" class="image animate-opacity-long" alt="" />
		</div>
		<div class="image-container-shadow"></div>
	</div>
	<div class="right first">
		<div class="explain-content">
			IR acts as a professional partner for anyone looking for a reliable referral service. We assist forward thinking firms with the highest standards by providing new opportunities and helping them build international relationships.
		</div>
	</div>
</div>
<div class="wrapper static twelvetwenty">
	<div class="title">
		Our Philosophy
	</div>
	<div class="subtitle">‘Networking and working with likeminded people is what makes the world not only 'go round', but enjoyable and profitable’</div>
	<div class="post">
		IR has been designed to assist leading professional services firms with the growth of their business. The group is highly idiosyncratic and transfers these unique skills to its members via regular global events, training and the use of cutting edge internet marketing and technology.<br />
		<br />
		The networks ultimate goal is to bring like minded individuals together and assist in building new relationships which are mutually beneficial. This includes the sharing of opportunities, joint marketing collaboration and referrals.
	</div>
	<div class="subtitle">
		Our beliefs;
	</div>
	<div class="post">
		<ul>
			<li>We believe every firm has its own strengths and weaknesses. We therefore work exclusively by practise area thus ensuring we work with only the very best specialists around the world.</li>
			<li>Our criteria is based on both quality of the firm and the character of the individuals within. Its key that all of our members share a common vision towards mutual success.</li>
			<li>We stand out from the crowd via speed of implementation. We are constantly pioneering new concepts and applications which directly benefit our members.</li>
			<li>Personal Service; each member has their own client manager who assists and fulfils all requests.</li>
			<li>Transparency is key. We offer clear group information including; web statistics, referrals, social media growth and group strategy to all members.</li>
		</ul>
	</div>
</div>
<div class="wrapper static twelvetwenty">
	<div class="title">
		How we harness the web?
	</div>
	<div class="post">
		IR is a market leader in internet business development and our firms benefit greatly from extensive global exposure via both the site & social media platforms.  We are renowned for the highest quality content and utilized by entrepreneurs, business leaders and advisory firms around the world as a resource tool when doing business overseas.
		<div style="height: 20px;"></div>
		<ul>
			<li>Monthly Web Hits – 50,000+</li>
			<li>Average User Time – 4min 30+</li>
		</ul>
	</div>
	<div class="social-media-stats">
		<a href="http://www.linkedin.com/company/2767332" class="stats-button stats-linkedin" target="_blank"><span class="light"></span><span class="icon animate-all"></span><span class="text">8000+ people across the network</span></a>
		<a href="https://twitter.com/IntlReferral" class="stats-button stats-twitter" target="_blank"><span class="light"></span><span class="icon animate-all"></span><span class="text">13 000+ followers</span></a>
		<a href="http://vimeo.com/internationalreferral" class="stats-button stats-youtube" target="_blank"><span class="light"></span><span class="icon animate-all"></span><span class="text">1000+ views</span></a>
		<a href="https://www.facebook.com/internationalreferral" class="stats-button stats-facebook no-margin-right" target="_blank"><span class="light"></span><span class="icon animate-all"></span><span class="text">3000+ likes</span></a>
	</div>
</div>
<div class="wrapper static static-last">
	<div class="left">
		<div class="title">
			Why our members love us?
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
	<div class="right">
		<div class="title">
			LinkedIn Forums
		</div>
		<div class="link-list">
			<a href="http://www.linkedin.com/groups?gid=4130452&trk=myg_ugrp_ovr" class="link" target="_blank"><span class="light"></span>International Referral</a>
			<a href="http://www.linkedin.com/groups?gid=4675595&trk=myg_ugrp_ovr" class="link" target="_blank"><span class="light"></span>IR Rising Stars</a>
			<a href="http://www.linkedin.com/groups?gid=4696199&trk=myg_ugrp_ovr" class="link" target="_blank"><span class="light"></span>IR Latin</a>
			<a href="http://www.linkedin.com/groups?gid=5049753&trk=my_groups-b-grp-v" class="link" target="_blank"><span class="light"></span>IR Events</a>
		</div>
	</div>
</div>

@stop