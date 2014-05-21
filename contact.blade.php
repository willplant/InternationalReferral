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
			Contact details
		</a>
	</div>
</div>
<div class="wrapper" id="contact">
	<div class="explain-title">
		The IR team awaits you!
	</div>
	<div class="explain-content">
		For any questions, inquiries, feedback or comments regarding IR, our services or our clients. Please don't hesitate to contact us. 
	</div>
	<div class="persons">
		<div class="person thomas">
			<div class="details">
				<div class="image" style="background-image: url({{ URL::to('img/static/thomas.png') }}) !important;
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/thomas.png') }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/thomas.png') }}', sizingMethod='scale')';"></div>
				<div class="name">Thomas Wheeler</div>
				<div class="role">Managing Director</div>
				<div class="phone hide"><span>Phone:</span>+46 123 456 789</div>
			</div>
			<div class="link-list">
				<a href="mailto:thomas@international-referral.com" target="_blank" class="link"><span class="light"></span><span class="link-icon-email"></span>E-mail Thomas</a>
				<a href="http://www.linkedin.com/in/tomwheeler" target="_blank" class="link"><span class="light"></span><span class="link-icon-linkedin"></span>LinkedIn</a>
			</div>
			<div class="hover-bio hide">Tom Wheeler has spent  his entire career in the professional services sector. Initially working in publishing and marketing, he strived to find value and return on investment for clients. In 2010, he launched International Referral as an alternative to both existing marketing methods and traditional networks. Today the group is the largest exclusive grouping of advisers in the world and renowned for its international events. Talking with him, you will understand his approach  is unique in today's business climate, as first and foremost his interest is in people and the building of relationships. He is always looking out for new and innovative ways to take the group forward. To arrange a call , please send him an email.</div>
		</div>
		<div class="person ross">
			<div class="details">
				<div class="image" style="background-image: url({{ URL::to('img/static/ross.png') }}) !important;
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/ross.png') }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/ross.png') }}', sizingMethod='scale')';"></div>
				<div class="name">Ross Nicholls</div>
				<div class="role">Business Development Director</div>
				<div class="phone hide"><span>Phone:</span>+46 123 456 789</div>
			</div>
			<div class="link-list">
				<a href="mailto:ross@international-referral.com" target="_blank" class="link"><span class="light"></span><span class="link-icon-email"></span>E-mail Ross</a>
				<a href="http://www.linkedin.com/pub/ross-nicholls/38/442/2b7" target="_blank" class="link"><span class="light"></span><span class="link-icon-linkedin"></span>LinkedIn</a>
			</div>
			<div class="hover-bio hide">
				Ross Nicholls is the Business Development Director of International Referral.  Ross’s expertise in creating and increasing exposure for high end brands and well as delivering solutions means he is uniquely qualified to lead and drive the business development team forward at IR. He brings this expertise to IR and manages all new member applications to the group, as well directing the current membership through the client management team. His strategy to work directly with members firms to achieve their goals obviously has brought success to the membership as current renewal rates stand at just over 85%. 
			</div>
		</div>
		<div class="person">
			<div class="details">
				<div class="image" style="background-image: url({{ URL::to('img/static/lorna.jpg') }}) !important;
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/lorna.jpg') }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/lorna.jpg') }}', sizingMethod='scale')';"></div>
				<div class="name">Lorna Gallen</div>
				<div class="role">Accounts Manager</div>
				<div class="phone hide"><span>Phone:</span>+46 123 456 789</div>
			</div>
			<div class="link-list">
				<a href="mailto:lorna@international-referral.com" target="_blank" class="link"><span class="light"></span><span class="link-icon-email"></span>E-mail Lorna</a>
				<a href="http://uk.linkedin.com/pub/lorna-gallen/44/36b/b57" target="_blank" class="link"><span class="light"></span><span class="link-icon-linkedin"></span>LinkedIn</a>
			</div>
		</div>
		<div class="person">
			<div class="details">
				<div class="image" style="background-image: url({{ URL::to('img/static/rachel.png') }}) !important;
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/rachel.png') }}', sizingMethod='scale');
				-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('img/static/rachel.png') }}', sizingMethod='scale')';"></div>
				<div class="name">Rachel Finch</div>
				<div class="role">Social Media Manager</div>
				<div class="phone hide"><span>Phone:</span>+46 123 456 789</div>
			</div>
			<div class="link-list">
				<a href="mailto:rachel@international-referral.com" target="_blank" class="link"><span class="light"></span><span class="link-icon-email"></span>E-mail Rachel</a>
				<a href="http://uk.linkedin.com/in/rachelfinch" target="_blank" class="link"><span class="light"></span><span class="link-icon-linkedin"></span>LinkedIn</a>
			</div>
		</div>
		<div class="office">
			<div class="details">
				<div class="name"><img src="{{ url() }}/img/flags/48/235.png" class="flag" alt="" /> UK Head Office</div>
				<div class="role">
					<span class="phone"><strong>Call us:</strong>
						<br />+44 1675 443396
					</span><br />
					
				<strong>Address:</strong><br />
				International Referral<br />
				The Piggery<br />
				Woodhouse Farm<br />
				Catherine de Barnes Lane<br />
				Catherine de Barnes<br />
				B92 ODJ.<br />
				</div>
			</div>
			<div class="link-list">
				<a href="mailto:thomas@international-referral.com" target="_blank" class="link"><span class="light"></span><span class="link-icon-email"></span>E-mail us</a>
				<a href="skype:international-referral?call" target="_blank" class="link"><span class="light"></span><span class="link-icon-skype"></span>Skype</a>
				<a href="http://www.linkedin.com/company/2767332?trk=tyah&trkInfo=tas%3Ainternational%20referr%2Cidx%3A1-2-2" target="_blank" class="link"><span class="light"></span><span class="link-icon-linkedin"></span>LinkedIn</a>
			</div>
		</div>
	</div>
</div>

@stop