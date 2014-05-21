<div id="footer">
	<div class="light"></div>
	<div class="wrapper">
		<div class="col">
			<div class="title">
				Follow - Share - Interact
			</div>
			<div class="sm-buttons">
				<a href="http://www.linkedin.com/groups?gid=4130452&trk=groups_most_recent-h-dsc&goback=%2Egmr_4130452" class="sm-button sm-icon-linkedin" target="_blank"><span class="sm-button-icon sm-button-active"></span><span class="sm-button-icon sm-button-inactive"></span></a>
				<a href="https://twitter.com/IntlReferral" class="sm-button sm-icon-twitter" target="_blank"><span class="sm-button-icon sm-button-active"></span><span class="sm-button-icon sm-button-inactive"></span></a>
				<a href="https://www.facebook.com/internationalreferral" class="sm-button sm-icon-facebook" target="_blank"><span class="sm-button-icon sm-button-active"></span><span class="sm-button-icon sm-button-inactive"></span></a>
				<a href="http://vimeo.com/internationalreferral" class="sm-button sm-icon-youtube" target="_blank"><span class="sm-button-icon sm-button-active"></span><span class="sm-button-icon sm-button-inactive"></span></a>
			</div>
		</div>
		<div class="col footer-center-col" style="margin: 0; margin-left: 100px;">
			<div class="title">
				Company info
			</div>
			<div>
				<div class="footer-logo"></div>
				<div class="footer-company-info">
					International Referral<br />
					+44 1675 443396<br />
					<a href="mailto:info@international-referral.com" target="_blank">info@international-referral.com</a>
				</div>
			</div>
		</div>
		<div class="col no-margin" style="float: right;">
			@if (!Request::is('/contact'))
			<a href="{{ URL::to('/contact') }}" class="link contact-details">
				<span class="light"></span>
				Contact details
			</a>
			@endif
			<div class="footer-legal">
				<a href="{{ URL::to('/legal') }}">Legal</a> <a href="{{ URL::to('/privacy') }}">Privacy</a>
			</div>
		</div>
	</div>
</div>