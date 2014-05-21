@extends('site.template')

@section('content')
<div id="background">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div class="breadcrumbs">
	<div class="wrapper">
		<a href="{{ url() }}" class="breadcrumb breadcrumb-home no-margin-left animate-opacity">
			<span class="light"></span>
			<span class="end"></span>
			<span class="icon"></span>
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Notifications
		</a>
	</div>
</div>
<div class="wrapper notifications-wrapper" id="news">
	<div class="left">
		<div class="explain-title">
			What's new?
		</div>
		<div class="explain-content">
			Welcome to the Notification area of IR.<br />All new notifications and messages since your last visit will be highlighted in yellow.
		</div>
	</div>
	<div class="news-list news-section">
		@if($notifications)
		<div class="title">Your notifications</div>
		@else
		<div class="title">No notifications available</div>
		@endif
		<div id="notifications" class="news">
		@if($notifications)
			<?php $grey = false; $index = 0; ?>
			@foreach ($notifications as $notification)
				@if (Session::get('notifications') > $index )
					@if ($grey == true)
					<a class="post highlight animate-opacity">
					@else
					<a class="post highlight-light animate-opacity">
					@endif
				@else
					@if ($grey == true)
					<a class="post grey animate-opacity">
					@else
					<a class="post animate-opacity">
					@endif
				@endif
					<span class="post-title">
						{{ htmlspecialchars_decode($notification->heading) }}
					</span>
					<span class="post-details">
						Published <?php echo date('d M, Y', strtotime($notification->created_at)); ?>
					</span>
				</a>
				<div class="notification-content hide">
					<span class="light"></span>
					{{ htmlspecialchars_decode($notification->content) }}
				</div>
				
				<?php 
					if ($grey == false):		$grey = true;
					elseif ($grey == true): $grey = false;
					endif;
					
					$index++;
				?>
			@endforeach

			@if($pagination->getLastPage() > 1)
			<div class="pagination">
				<span>Pages</span>
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($firstLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ URL::to('notifications') .'/p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a></strong>
				@else
				<a href="{{ URL::to('notifications') .'/p'. $firstLink['key'] }}"><span class="light"></span>{{ $firstLink['key'] }}</a>
					@if ($firstLink['value'] != '')
						<span>{{ $firstLink['value'] }}</span>
					@endif
				@endif

				@foreach($pagination->getLinks() as $link)
					@if($link['index'] == $pagination->getCurrentPage())
					<strong><a href="{{ URL::to('notifications') .'/p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a></strong>
					@else
					<a href="{{ URL::to('notifications') .'/p'. $link['index'] }}"><span class="light"></span>{{ $link['index'] }}</a>
					@endif
				@endforeach

				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink['key'] == $pagination->getCurrentPage())
				<strong><a href="{{ URL::to('notifications') .'/p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a></strong>
				@else
					@if ($lastLink['value'] != '')
						<span>{{ $lastLink['value'] }}</span>
					@endif
				<a href="{{ URL::to('notifications') .'/p'. $lastLink['key'] }}"><span class="light"></span>{{ $lastLink['key'] }}</a> 
				@endif
			</div>
					
			<div class="mobile pagination pagination-mobile">
				<?php $firstLink = $pagination->getFirstLink(); ?>
				@if($pagination->getCurrentPage() != 1)
					<?php $key = $pagination->getCurrentPage() - 1; ?>
				<strong><a href="{{ URL::to('notifications') .'/p'. $key }}" style="float: left;"><span class="light"></span>Previous page</a></strong>
				@endif
				
				<?php $lastLink = $pagination->getLastLink(); ?>
				@if($lastLink != $pagination->getCurrentPage())
					<?php $key = $pagination->getCurrentPage() + 1; ?>
				<strong><a href="{{ URL::to('notifications') .'/p'. $key }}" style="float: right;"><span class="light"></span>Next page</a></strong>
				@endif
			</div>
			@endif
		@endif
		</div>
	</div>
	
	<?php
		// Får användaren att ha 0 notification highlights
		Session::put('notifications',0);
	?>
	
</div>

@stop