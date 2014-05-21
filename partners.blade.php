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
			Key/Strategic Partners
		</a>
	</div>
</div>
<div class="wrapper" id="partners">
	<div class="explain-content">We share a common vision with our partners and are proud to be associated with some of the world’s most creative, forward thinking and supportive organizations.<br /><br />
	If you would like to connect with IR and discuss possible synergies, please contact the Managing Director <a href="mailto:thomas@international-referral.com">Mr. Thomas Wheeler</a>.
	</div>
</div>
<div class="wrapper" id="strategic-partners">
	<div class="letter">Strategic Partners</div>
	<div class="partner-list">
	<?php $i = 0; ?>
	@foreach($strategic_partners as $sp)
		@if($i % 2 == 0)
		<a href="{{ $sp->url_website }}" class="strategic-partner" style="background-image: url({{ '/attachments/partners/' . $sp->id . '.' . $sp->image_extention }});">
		@else
		<a href="{{ $sp->url_website }}" class="strategic-partner no-margin-right" style="background-image: url({{ '/attachments/partners/' . $sp->id . '.' . $sp->image_extention }});">
		@endif
			<span class="description animate-opacity">
				<span class="light"></span>
				{{ htmlspecialchars_decode($sp->description) }}
			</span>
		</a>
	<?php $i++; ?>
	@endforeach
	</div>
</div>
<!--<div class="wrapper" id="partners">
	
</div>-->
<div class="wrapper" id="key-partners">
	<div class="letter">Key Partners</div>
	<div class="explain-content">Our key partners are members of International Referral who we recognize for playing an influential role in the development of the group.
	</div>
	<div class="partner-list">
	<?php $i = 0; ?>
	@foreach($key_partners as $kp)
		@if($i % 4 == 3)
		<a href="{{ $kp->url_website }}" class="key-partner no-margin-right" style="background-image: url({{ '/attachments/partners/' . $kp->id . '.' . $kp->image_extention }});" target="_blank">
		@else
		<a href="{{ $kp->url_website }}" class="key-partner" style="background-image: url({{ '/attachments/partners/' . $kp->id . '.' . $kp->image_extention }});" target="_blank">
		@endif
		</a>
	<?php $i++; ?>
	@endforeach
	</div>
</div>

@stop