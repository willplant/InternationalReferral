		<div class="result-list">
			@if($advisors != 0)
			@foreach ($advisors as $letter => $results)
				<div class="letter">
					{{ $letter }}
				</div>
				<div class="result-objects">
					@foreach ($results as $advisor)
						@if(isset($advisor['practice_area_comittee']) && count($advisor['practice_area_comittee']) > 0)
						<a href="{{ $current_url . '/advisor/' . $advisor['id'] }}" class="result-advisor comittee animate-all">
						@else
						<a href="{{ $current_url . '/advisor/' . $advisor['id'] }}" class="result-advisor animate-all">
						@endif
							<span class="light"></span>
							@if ($advisor['has_image'] == 1)
								<span class="image" style="background-image: url({{ URL::to('/attachments/members/'.$advisor['id'].'.'.$advisor['image_extention']); }}); filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('/attachments/members/'.$advisor['id'].'.'.$advisor['image_extention']); }}', sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ URL::to('/attachments/members/'.$advisor['id'].'.'.$advisor['image_extention']); }}', sizingMethod='scale')';"></span>
							@else
								<span class="image"></span>
							@endif
							@if(isset($advisor['practice_area_comittee']) && count($advisor['practice_area_comittee']) > 0)
								<img src="{{ URL::to('/img/site-desktop/committee_text.png') }}" class="committee-text" alt="" title="Committee Member" />
							@endif
							<span class="name">{{ $advisor['last_name'] . ', ' . $advisor['first_name'] . ' ' . $advisor['middle_name'] }}</span>
							<span class="firm">
								<strong>Firm:</strong><span class="text-objects">{{ $advisor['firm']['name'] }}</span>
							</span>
							<span class="practiceareas">
								<strong>Practice Areas:</strong>
								<?php $index = 0; ?>
								<span class="text-objects">
								@foreach ($advisor['practice_areas'] as $pa)
									@if ($index > 0)
									<?php echo ", "; ?>
									@endif
									{{ $pa['name'] }}
									<?php $index++; ?>
								@endforeach
								</span>
							</span>
							<span class="classes">
								@foreach ($advisor['registers'] as $register)
									@if ($register['id'] == 1)
										<span class="icon-40-exclusive-light" data-class="IR Exclusive"></span>
									@elseif ($register['id'] == 2)
										<span class="icon-40-rising-stars" data-class="IR Rising Stars"></span>
									@elseif ($register['id'] == 3)
										<span class="icon-40-latin" data-class="IR Latin"></span>
									@endif
								@endforeach
								@if(isset($advisor['practice_area_comittee']) && count($advisor['practice_area_comittee']) > 0)
									<span class="icon-40-pac" data-class="Committee Member"></span>
								@endif
							</span>
							<span class="country">
								@foreach ($advisor['regions'] as $country)
									<img src="{{ url() }}/img/flags/48/{{ $country['country_id'] }}.png" alt="" data-name="{{ $country['country_name'] }}" />
								@endforeach
							</span>
						</a>
					@endforeach
				</div>
				<div class="shadow"></div>
			@endforeach
			@endif

			@if($pagination->getLastPage() > 1)
			<div class="pagination">
				<span>Pages</span>
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($firstLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ $current_url .'/p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a></strong>
				@else
				<a href="{{ $current_url .'/p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a>
					@if ($firstLink['value'] != '')
						<span>{{ $firstLink['value'] }}</span>
					@endif
				@endif

				@foreach($pagination->getLinks() as $link)
					@if($link['index'] == $pagination->getCurrentPage())
					<strong><a href="{{ $current_url .'/p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a></strong>
					@else
					<a href="{{ $current_url .'/p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a>
					@endif
				@endforeach

				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ $current_url .'/p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a></strong>
				@else
					@if ($lastLink['value'] != '')
						<span>{{ $lastLink['value'] }}</span>
					@endif
				<a href="{{ $current_url .'/p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a> 
				@endif
			</div>
					
			<div class="mobile pagination pagination-mobile">
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($pagination->getCurrentPage() != 1)
					<?php $key = $pagination->getCurrentPage() - 1; ?>
				<strong><a href="{{ $current_url .'/p'. $key }}" style="float: left;"><span class="light"></span>Previous page</a></strong>
				@endif
				
				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink != $pagination->getCurrentPage())
					<?php $key = $pagination->getCurrentPage() + 1; ?>
				<strong><a href="{{ $current_url .'/p'. $key }}" style="float: right;"><span class="light"></span>Next page</a></strong>
				@endif
			</div>
			@endif
		</div>