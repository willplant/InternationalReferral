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
			IR Vetted
		</a>
	</div>
</div>
<div class="wrapper vetted vetted-first" style="margin-top: 100px;">
	<div class="vetted-function">
		<img src="{{ URL::to('img/site-desktop/vetted.png') }}" /><br /><br />
		<div class="explain-title action-title">Select a region below to see the IR Vetted firms:</div>
		<div class="explain-content">
			<select id="regions_selection" name="regions_selection" class="input-setting-dropdown" style="float: none;" data-baseurl="{{ URL::to('vetted') }}">
				<option>Select region</option>
				@foreach ($vettedRegions as $vr)
					<option value="{{ $vr->id }}">{{ $vr->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="left">
		<div class="explain-title">IR Vetted</div>
		<div class="explain-content">
			International Referral is proud to announce the launch of IR Vetted, which recognises the leading regional advisory firms in the UK. This will represent the leading regional advisory firms in the UK. During the tremendous growth of IR over the last years, which has seen the group become the largest exclusive network of advisers in the world, we have retained a strong presence and following in the UK. Many businesses, investors and high net worth individuals use the site for their advisory needs and to keep abreast of legal / financial developments in their area of business. In addition, we have retained close relationships and co-hosted events with the UKTI and their regional teams, entrepreneurial organizations such as the Supper Club, Start up Britain and the likes of Thomson Reuters owned Practical Law.<br />
			<br />
			We have recognized that regional firms still have international client requirements. However, they do not have an international network in place to assist them. Via this new initiative we will enable these firms to become an “IR Vetted” firm, giving them immediate access to very best advisers around the world. This provides not only added value to existing clients, but fantastic added benefits to any prospective client considering using the “IR Vetted” firm.<br />
			<br />
		</div>
	</div>
	<div class="right">
		<div class="explain-content">
			<br/>Furthermore, IR is known for being the most innovative and creative global group and offers significant support to our members. IR has grown to become the largest exclusive network of advisory firms in the world; 800 members in 130+ jurisdictions and expertise in over 75 sectors & practise areas. Many of the key services IR provide will be available to the firms we select. Including; business development training (We are CPD accredited by the SRA), design services, social media support and much more.
		</div>
		<div class="explain-title" style="margin-top: 40px;">Selection Process</div>
		<div class="explain-content">
			We take great pride in associating and positioning the group with both the most highly regarded and forward thinking firms. For this purpose, there is a stringent selection procedure carried out to ensure we only align ourselves with the top firms in each region. This includes initial background research on the firm taking into consideration rankings and previous awards, correspondence with our existing UK partners and a final check via the IR management team. It is a prestigious accolade; one that offers significant exposure and raises the firms profile both nationally and internationally.
		</div>
	</div>
</div>

@stop