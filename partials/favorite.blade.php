<?php
	$favorite_open = false;
?>
@if (Session::has('ir_id'))
	<?php
		if (isset($title)):
			$obj_id = '';
			$obj_type = '';
			
			if ($title == 'Adviser'):
				$obj_id = $advisor->id;
				$obj_type = 1;
				$favorite_open = true;
			elseif ($title == 'Article'):
				$obj_id = $news->id;
				$obj_type = 2;
				$favorite_open = true;
			elseif ($title == 'Event'):
				$obj_id = $event->id;
				$obj_type = 3;
				$favorite_open = true;
			elseif ($title == 'Hotel'):
				$obj_id = $hotel->id;
				$obj_type = 4;
				$favorite_open = true;
			endif;
			
			if ($favorite_open == true):
			
				$is_favorite = false;
				$user_id = Session::get('ir_id');
				$is_favorite = Member::isFavoriteItem($user_id, $obj_id, $obj_type);
				
				if ($is_favorite == true) $favorite = Member::getFavoriteItem($user_id, $obj_id, $obj_type);
				
				$has_comment = false;
				
				if (isset($favorite)):
					if ($favorite->comment != '') $has_comment = true;
				endif;

	?>
				<div class="favoritepanel" data-user="{{ $user_id }}" data-id="{{ $obj_id }}" data-type="{{ $obj_type }}">
				
					@if ($is_favorite == false)
					<div class="add">Add to favorites?</div>
					@else
					<div class="add hide">Add to favorites?</div>
					@endif
					
					@if ($has_comment == false)
					<div class="comment hide">
						<span>Do you wish to add a comment?</span>
						<textarea id="favorite-comment"></textarea><br />
						<div class="buttons">
							<button class="abort">No thanks!</button><button class="save">Save</button>
						</div>
					</div>
					@else
					<div class="comment hide">
						<span>Do you wish to change the comment?</span>
						<textarea id="favorite-comment">{{ $favorite->comment }}</textarea><br />
						<div class="buttons">
							<button class="abort">No thanks!</button><button class="save">Save</button>
						</div>
					</div>
					@endif
					
					<?php $class = ''; ?>
					
					@if ($is_favorite == true)
					<div class="remove-holder">
						<?php if ($has_comment == false) $class = ' hide'; ?>
							<div class="open-comment{{ $class }}">Read comment
							<span><img src="{{ URL::to('img/site-desktop/comment-icon.png') }}"></span>
							</div>
						<div class="remove">Remove favorite</div>
					</div>
					@else
					<div class="remove-holder hide">
						<?php if ($has_comment == false) $class = ' hide'; ?>
							<div class="open-comment{{ $class }}">Read comment
							<span><img src="{{ URL::to('img/site-desktop/comment-icon.png') }}"></span>
							</div>
						<div class="remove">Remove favorite</div>
					</div>
					@endif
					
				</div>
	<?php
			endif;
			
		endif;
	?>
@endif