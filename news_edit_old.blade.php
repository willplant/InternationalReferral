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
		<a href="{{ URL::to('my_articles') }}" class="breadcrumb animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Your articles
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Edit article
		</a>
	</div>
</div>
<div class="wrapper settings-wrapper profile-settings-page news-add-page" id="news">
	<form method="post" action="">
	
	<?php
		$english = null;
		$spanish = null;
	
		foreach ($article->content as $c):
		
			if ($c->language == 'en') 			$english = $c;
			else if ($c->language == 'es') 	$spanish = $c;
			
		endforeach;
	?>
	<div class="row">
		<div class="explain-title">
			Edit article
		</div>
		<div class="explain-content">
			This is where you edit your article. Just do the changes you want, and then press "Save Article". If you wish to have a Spanish translation, press Spanish below to add it. If you wish to remove a translation, simply remove all the text and the translation will be removed. If you wish to change the Practice Areas connected to the article, please do so below this text.
		</div>
		<div class="interests">
			<select id="practiceareas_selection" class="input-setting-dropdown">
				<option value="">Select practice area</option>
				@foreach($practiceAreas as $pa)
					@if($pa->name_es != "")
					<option value="{{ $pa->id }}" data-id="{{ $pa->id }}">{{ $pa->name }} / {{ $pa->name_es }}</option>
					@else
					<option value="{{ $pa->id }}" data-id="{{ $pa->id }}">{{ $pa->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div id="added_practiceareas" class="tags">
			<div class="added_practicearea tag pa-template" style="display:none;"> <span class="remove animate-opacity">X</span></div>
			{{-- Fetched input --}}
			@if (!Session::has('old_pa'))
				@foreach($article->practiceAreas as $pa)
					@if($pa->name_es != "")
					<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }} / {{ $pa->name_es }}<span class="remove animate-opacity">X</span></div>
					<input type="hidden" value="practicearea-{{ $pa->id }}" />
					@else
						<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }}<span class="remove animate-opacity">X</span></div>
						<input type="hidden" name="practicearea-{{ $pa->id }}" value="{{ $pa->id }}" />
					@endif
				@endforeach
			@else
				@if(Session::has('old_pa') && count(Session::get('old_pa')) > 0)
				<?php
					$fetched_old_pa = PracticeArea::whereIn('id', Session::get('old_pa'))->get();
				?>
				@foreach($fetched_old_pa as $pa)
					@if($pa->name_es != "")
					<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }} / {{ $pa->name_es }}<span class="remove animate-opacity">X</span></div>
					<input type="hidden" value="practicearea-{{ $pa->id }}" />
					@else
						<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }}<span class="remove animate-opacity">X</span></div>
						<input type="hidden" name="practicearea-{{ $pa->id }}" value="{{ $pa->id }}" />
					@endif
				@endforeach
				@endif
			@endif
		</div>
		<div class="interests">
			@if (Session::has('error'))
				@if (Session::get('error')[0] == 'class')
				<select name="class" id="class" class="input-setting-dropdown input-error">
				@endif
			@else
			<select name="class" id="class" class="input-setting-dropdown">
			@endif
				<option value="0">Select class</option>
				@foreach($member->registers as $class)
					@if (Input::old('class'))
						@if (Input::old('class') == $class->id)
						<option value="{{ $class->id }}" data-id="{{ $class->id }}" selected>{{ $class->name }}</option>
						@else
						<option value="{{ $class->id }}" data-id="{{ $class->id }}">{{ $class->name }}</option>
						@endif
					@else
						<!-- Här behöver du lägga till så att den hämtar upp användarens aktiva klass. Förslagsvis bygger vi ut detta istället så att användaren väljer klasser i stil med hur multiselecten ovanför fungerar. -->
						<option value="{{ $class->id }}" data-id="{{ $class->id }}">{{ $class->name }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Your article</div>
	</div>
	<div class="row">
		<div class="news-title-row">
			
			<?php
				if ($english == null && !Input::old('content_en') && $spanish != null):
					$hide_en = 'hide';
					$hide_es = '';
				else:
					$hide_en = '';
					$hide_es = 'hide';
				endif;
				
				if (Session::has('error')):
					foreach (Session::get('error') as $e):
						
						if ($e == 'title-es') $hide_es .= ' input-error';
						if ($e == 'title-en') $hide_en .= ' input-error';
						
					endforeach;
				endif;
			?>
		
			<label for="title-en" class="{{ $hide_en }}" data-lang="en">Title:</label>
			
			@if ($english != null && strpos($hide_en, 'input-error') === false)
				@if (!Input::old('title-en'))
					<input type="text" class="input-setting {{ $hide_en }}" id="title-en" data-lang="en" placeholder="Your title here.." name="title-en" value="{{ $english->heading }}" />
				@else
					<input type="text" class="input-setting {{ $hide_en }}" id="title-en" data-lang="en" placeholder="Your title here.." name="title-en" value="{{ Input::old('title-en') }}" />
				@endif
			@else
				<input type="text" class="input-setting {{ $hide_en }}" id="title-en" data-lang="en" placeholder="Your title here.." name="title-en" value="" />
			@endif
			
			<label for="title-es" data-lang="es" class="{{ $hide_es }}">Titulo:</label>
			
			@if ($spanish != null && strpos($hide_es, 'input-error') === false)
				@if (!Input::old('title-es'))
					<input type="text" class="input-setting {{ $hide_es }}" data-lang="es" id="title-es" placeholder="Your title here.." name="title-es" value="{{ $spanish->heading }}" />
				@else
					<input type="text" class="input-setting {{ $hide_es }}" data-lang="es" id="title-es" placeholder="Your title here.." name="title-es" value="{{ Input::old('title-es') }}" />
				@endif
			@else
				<input type="text" class="input-setting {{ $hide_es }}" data-lang="es" id="title-es" placeholder="Su titulo.." name="title-es" value="" />
			@endif
			
		</div>
		<table id="" class="table table-hover table-biography" cellpadding="1" cellspacing="24">
			<thead>
				@if ($hide_es == 'hide')
				<th class="swap-lang animate-opacity" data-to-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="swap-lang inactive animate-opacity" data-to-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@else
				<th class="swap-lang inactive animate-opacity" data-to-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="swap-lang animate-opacity" data-to-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@endif
			</thead>
			<tbody>
				<tr class="link-divider {{ $hide_en }}" data-lang="en">
					<td colspan="2">
						@if ($english == null && !Input::old('content_en'))
							<textarea class="input-xxlarge lang-input-field wysi" data-lang="en" data-name="content_text" name="content_en" rows="15"></textarea>
						@else
							@if (!Input::old('content_en'))
								<textarea class="input-xxlarge lang-input-field wysi" data-lang="en" data-name="content_text" name="content_en" rows="15">{{ $english->content }}</textarea>
							@else
								<textarea class="input-xxlarge lang-input-field wysi" data-lang="en" data-name="content_text" name="content_en" rows="15">{{ Input::old('content_en') }}</textarea>
							@endif
						@endif
					</td>
				</tr>
				<tr class="link-divider {{ $hide_es }}" data-lang="es">
					<td colspan="2">
						@if ($spanish == null && !Input::old('content_es'))
						<textarea class="input-xxlarge lang-input-field wysi" data-lang="es" data-name="content_text" name="content_es" rows="15"></textarea>
						@else
							@if (!Input::old('content_es'))
								<textarea class="input-xxlarge lang-input-field wysi" data-lang="es" data-name="content_text" name="content_es" rows="15">{{ $spanish->content }}</textarea>
							@else
								<textarea class="input-xxlarge lang-input-field wysi" data-lang="es" data-name="content_text" name="content_es" rows="15">{{ Input::old('content_es') }}</textarea>
							@endif
						@endif
					</td>
				</tr>
			</tbody>
		</table>
		<div class="save-row">
			<input type="submit" value="Save Article" class="submit" />
		</div>
	</div>

	<!-- Links -->
	<div class="news-list news-section">
		<div class="title">Links</div>
	</div>
	<div class="row" id="links">
		<div class="explain-content">
			Remember to make sure that every link starts with <strong>http://</strong> or <strong>https://</strong>. You can open the link and copy the address from your browsers address bar. If you wish to change the order of your links, then press + or - buttons.
		</div>
		<table id="link-table" class="table table-hover" cellpadding="1" cellspacing="24">
			<thead>
				<tr class="table-head">
					<th>Order</th>
					<th>URL</th>
					<th>Display name</th>
					<th>Remove link</th>
				</tr>
			</thead>
			<tbody>
				<tr class="link-row-template hide">
					<td class="link-order hide">
						<input type="hidden" name="link_order[]" value="-1" disabled></input>
					</td>
					<td class="link-order-buttons">
						<button type="button" class="btn btn-small btn-primary link-order-up submit-small">+</button>
						<button type="button" class="btn btn-small btn-primary link-order-down submit-small">-</button>
					</td>
					<td class="searchable"><input class="input-xlarge input-setting" type="text" name="link_url[]" placeholder="ex. http://www.url.com/" value="" disabled></td>
					<td class="searchable"><input class="input-large input-setting" type="text" name="link_name[]" placeholder="ex. Link to a page" value="" disabled></td>
					<td>
						<input type="hidden" name="link_id[]" value="-1" disabled></input>
						<input class="link-action" type="hidden" name="link_action[]" value="none" disabled></input>
						<button type="button" class="btn btn-small btn-danger link-remove submit-small">Remove</button>
					</td>
				</tr>
				{{-- Old input --}}
				<?php
				if(Input::old('link_action'))
				{
					for($i = 0; $i < count(Input::old('link_action')); $i++)
					{
						if(Input::old('link_action.' . $i) != "none")
						{
							$hide = Input::old('link_action.' . $i) == "delete" ? " hide" : "";
				?>

				<tr class="link-row{{ $hide }}">
					<td class="link-order hide">
						<input type="hidden" name="link_order[]" value="{{ $i }}"></input>
					</td>
					<td class="link-order-buttons">
						<button type="button" class="btn btn-small btn-primary link-order-up submit-small">+</button>
						<button type="button" class="btn btn-small btn-primary link-order-down submit-small">-</button>
					</td>
					<td>
						@if ($errors->first('link_url' . $i))
						<div class="control-group error">
						@else
						<div class="contro-group">
						@endif
							<input class="input-xlarge input-setting" type="text" name="link_url[]" placeholder="ex. http://www.url.com/" value="{{ Input::old('link_url.' . $i) }}">
						</div>
					</td>
					<td>
						@if ($errors->first('link_name' . $i))
						<div class="control-group error">
						@else
						<div class="contro-group">
						@endif
							<input class="input-large input-setting" type="text" name="link_name[]" placeholder="ex. Link to a page" value="{{ Input::old('link_name.' . $i) }}">
						</div>
					</td>
					<td>
						<input type="hidden" name="link_id[]" value="{{ Input::old('link_id.' . $i) }}"></input>
						<input class="link-action" type="hidden" name="link_action[]" value="{{ Input::old('link_action.' . $i) }}"></input>
						<button type="button" class="btn btn-small btn-danger link-remove submit-small">Remove</button>
					</td>
				</tr>
				<?php
						}
					}
				}
				else
				{
					foreach($article->links as $links)
					{
				?>
				<tr class="link-row link-loaded">
					<td class="link-order hide">
						<input type="hidden" name="link_order[]" value="{{ $links->rank }}"></input>
					</td>
					<td class="link-order-buttons">
						<button type="button" class="btn btn-small btn-primary link-order-up submit-small">+</button>
						<button type="button" class="btn btn-small btn-primary link-order-down submit-small">-</button>
					</td>
					<td>
						<div class="control-group">
							<input class="input-xlarge input-setting" type="text" name="link_url[]" placeholder="ex. http://www.url.com/" value="{{ $links->url }}">
						</div>
					</td>
					<td>
						<div class="control-group">
							<input class="input-large input-setting" type="text" name="link_name[]" placeholder="ex. Link to a page" value="{{ $links->name }}">
						</div>
					</td>
					<td>
						<input type="hidden" name="link_id[]" value="{{ $links->id }}"></input>
						<input class="link-action" type="hidden" name="link_action[]" value="update"></input>
						<button type="button" class="btn btn-small btn-danger link-remove submit-small">Remove</button>
					</td>
				</tr>
				<?php
					}
				}
				?>
				<tr class="add-row">
					<td colspan="5">
						<button type="button" class="btn btn-mini btn-primary link-add submit-small">Add new link +</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="save-row">
			<input type="submit" value="Save Links" class="submit" />
		</div>
	</div>
	
	</form>
</div>

@stop