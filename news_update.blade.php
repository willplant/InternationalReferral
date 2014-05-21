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
	<form method="post">
	<div class="row">
		<div class="explain-title">
			Edit article
		</div>
		<div class="explain-content">
			This is where you edit your article. Just do the changes you want, and then press "Save Article". If you wish to have a Spanish translation, press Spanish below to add it. If you wish to remove a translation, simply remove all the text and the translation will be removed. If you wish to change the Practice Areas connected to the article, please do so below this text.
		</div>

		<!-- practice areas -->
		<div class="interests">
			@if ($errors->first('practice_areas_count'))
			<select id="practiceareas_selection" class="input-setting-dropdown input-error">
			@else
			<select id="practiceareas_selection" class="input-setting-dropdown">
			@endif
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
		{{-- Old input --}}
		@if(Input::old('practice_areas'))
			@foreach(Input::old('practice_areas') as $old_input)
        		<?php
        		$oi 		= stripslashes($old_input); // Old input
        		$oi_decoded = json_decode($oi); 		// Encoded <-> Decode
        		
        		// Distinguish fresh data and loaded data
        		$source_prefix = 'added';
        		if(isset($oi_decoded) && $oi_decoded->action != 'add')
        			$source_prefix = 'loaded';
        		?>
            	@if(!isset($oi_decoded->action) || (isset($oi_decoded->action) && $oi_decoded->action != "delete"))
					@if(isset($oi_decoded->name_es) && $oi_decoded->name_es != "")
						<div class="tag {{ $source_prefix }}_practicearea" data-id="{{ $oi_decoded->id }}">{{ $oi_decoded->name }} / {{ $oi_decoded->name_es }}<span class="remove animate-opacity">X</span></div>
					@else
						<div class="tag {{ $source_prefix }}_practicearea" data-id="{{ $oi_decoded->id }}">{{ $oi_decoded->name }}<span class="remove animate-opacity">X</span></div>
					@endif
				@endif
				<input type="hidden" class="{{ $source_prefix }}_practicearea {{ $source_prefix }}_practicearea_input" name="practice_areas[]" data-id="{{ $oi_decoded->id }}" value='{{ $oi }}'>
			@endforeach
		@else
			{{-- Fetched input --}}
			@foreach($article->practiceareas as $pa)
				<?php
					$toEncode['id'] 		= $pa->id;
					$toEncode['name'] 		= $pa->name;
					$toEncode['name_es'] 	= $pa->name_es;
					$toEncode['action'] 	= "none";
				?>
				@if($pa->name_es != "")
					<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }} / {{ $pa->name_es }}<span class="remove animate-opacity">X</span></div>
				@else
					<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }}<span class="remove animate-opacity">X</span></div>
				@endif
				<input type="hidden" class="loaded_practicearea loaded_practicearea_input" name="practice_areas[]" data-id="{{ $pa->id }}" value='{{ json_encode($toEncode) }}'>
			@endforeach
		@endif
		</div>

		<!-- regions -->
		<div class="interests">
			@if ($errors->first('working_regions_count'))
			<select id="region_selection" class="input-setting-dropdown input-error">
			@else
			<select id="region_selection" class="input-setting-dropdown">
			@endif
				<option value="" selected>All regions</option>
				@foreach ($countries as $country)
					<option value="{{ $country['id'] }}">{{ $country['short_name'] }}</option>
					@if(array_key_exists('regions', $country))
						@foreach($country['regions'] as $region)
						@if($region['name'] != $country['short_name'])
						<option value="{{ $region['id'] }}">- {{ $region['name'] }}</option>
						@endif
						@endforeach
					@endif
				@endforeach
			</select>
		</div>
		<div id="added_region" class="tags">
		{{-- Old input --}}
		@if(Input::old('working_regions'))
			@foreach(Input::old('working_regions') as $old_input)
        		<?php
        		$oi 		= stripslashes($old_input); // Old input
        		$oi_decoded = json_decode($oi); 		// Encoded <-> Decode
        		
        		// Distinguish fresh data and loaded data
        		$source_prefix = 'added';
        		if(isset($oi_decoded) && $oi_decoded->action != 'add')
        			$source_prefix = 'loaded';
        		?>
            	@if(!isset($oi_decoded->action) || (isset($oi_decoded->action) && $oi_decoded->action != "delete"))
					@if(isset($oi_decoded->name_es) && $oi_decoded->name_es != "")
						<div class="tag {{ $source_prefix }}_region" data-id="{{ $oi_decoded->id }}">{{ $oi_decoded->name }} / {{ $oi_decoded->name_es }}<span class="remove animate-opacity">X</span></div>
					@else
						<div class="tag {{ $source_prefix }}_region" data-id="{{ $oi_decoded->id }}">{{ $oi_decoded->name }}<span class="remove animate-opacity">X</span></div>
					@endif
				@endif
				<input type="hidden" class="{{ $source_prefix }}_region {{ $source_prefix }}_region_input" name="working_regions[]" data-id="{{ $oi_decoded->id }}" value='{{ $oi }}'>
			@endforeach
		@else
			{{-- Fetched input --}}
			@foreach($article->regions as $r)
				<?php
					$toEncode['id'] 		= $r->id;
					$toEncode['name'] 		= $r->name;
					$toEncode['name_es'] 	= $r->name_es;
					$toEncode['action'] 	= "none";
				?>
				@if($r->name_es != "")
					<div class="tag loaded_region" data-id="{{ $r->id }}">{{ $r->name }} / {{ $r->name_es }}<span class="remove animate-opacity">X</span></div>
				@else
					<div class="tag loaded_region" data-id="{{ $r->id }}">{{ $r->name }}<span class="remove animate-opacity">X</span></div>
				@endif
				<input type="hidden" class="loaded_region loaded_region_input" name="working_regions[]" data-id="{{ $r->id }}" value='{{ json_encode($toEncode) }}'>
			@endforeach
		@endif
		</div>

		<!-- classes -->
		<div class="interests">
			@if ($errors->first('registers_count'))
			<select id="registers_selection" class="input-setting-dropdown input-error">
			@else
			<select id="registers_selection" class="input-setting-dropdown">
			@endif
				<option value="">Select classes</option>
				@foreach($member->registers as $r)
					<option value="{{ $r->id }}" data-id="{{ $r->id }}">{{ $r->name }}</option>
				@endforeach
			</select>
		</div>
		<div id="added_registers" class="tags">
		{{-- Old input --}}
		@if(Input::old('registers'))
			@foreach(Input::old('registers') as $old_input)
        		<?php
        		$oi 		= stripslashes($old_input); // Old input
        		$oi_decoded = json_decode($oi); 		// Encoded <-> Decode
        		
        		// Distinguish fresh data and loaded data
        		$source_prefix = 'added';
        		if(isset($oi_decoded) && $oi_decoded->action != 'add')
        			$source_prefix = 'loaded';
        		?>
            	@if(!isset($oi_decoded->action) || (isset($oi_decoded->action) && $oi_decoded->action != "delete"))
					<div class="tag {{ $source_prefix }}_register" data-id="{{ $oi_decoded->id }}">{{ $oi_decoded->name }}<span class="remove animate-opacity">X</span></div>
				@endif
				<input type="hidden" class="{{ $source_prefix }}_register {{ $source_prefix }}_register_input" name="registers[]" data-id="{{ $oi_decoded->id }}" value='{{ $oi }}'>
			@endforeach
		@else
			{{-- Fetched input --}}
			@foreach($article->registers as $class)
				<?php
					$toEncode['id'] 		= $class->id;
					$toEncode['name'] 		= $class->name;
					$toEncode['action'] 	= "none";
				?>
				<div class="tag loaded_register" data-id="{{ $class->id }}">{{ $class->name }}<span class="remove animate-opacity">X</span></div>
				<input type="hidden" class="loaded_register loaded_register_input" name="registers[]" data-id="{{ $class->id }}" value='{{ json_encode($toEncode) }}'>
			@endforeach
		@endif
		</div>
	</div>

	<div class="news-list news-section">
		<div class="title">Your article</div>
	</div>
	<div class="row">
		<table id="" class="table table-hover table-biography" cellpadding="1" cellspacing="24">
			<thead>
				@if($input_loaded)
				<th class="swap-lang animate-opacity {{ ($hidden['en'] == '' ? '' : 'inactive') }}" data-to-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="swap-lang animate-opacity {{ ($hidden['es'] == '' ? '' : 'inactive') }}" data-to-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@elseif($input_old)
				<?php 
				// Indicate error in either English or Spanish translation by marking the button red
				$en_error = '';
				if($errors->first('content_title0'))
					$en_error = 'input-error';

				$es_error = '';
				if($errors->first('content_title1'))
					$es_error = 'input-error';
				?>
				<th class="swap-lang animate-opacity {{ ($hidden['en'] == '' ? '' : 'inactive') }} {{ $en_error }}" data-to-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="swap-lang animate-opacity {{ ($hidden['es'] == '' ? '' : 'inactive') }} {{ $es_error }}" data-to-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@else
				<th class="swap-lang animate-opacity {{ ($hidden['en'] == '' ? '' : 'inactive') }}" data-to-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="swap-lang animate-opacity {{ ($hidden['es'] == '' ? '' : 'inactive') }}" data-to-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@endif
			</thead>
			<tbody>
				{{-- English --}}
				<?php
				// Copy
				$copy_text = array(
	                   'en' => array('title' => 'Title:', 'placeholder' => 'Your title here..'),
	                   'es' => array('title' => 'Titulo:', 'placeholder' => 'Su titulo..'),
	                   );

				$itr = 0;
				foreach($languages as $lang):
					// Used to define the language in DOM structure
					$lang_prefix = $lang->two_letter; 
					$lang_loaded = isset($content[$lang_prefix]);

					// Old inputs for more readable DOM
					$old_heading 	= Input::old('content_title.' . $itr);
					$old_text	 	= Input::old('content_text.' . $itr);
					$old_action 	= Input::old('content_action.' . $itr);
					$old_lang 		= Input::old('content_lang.' . $itr);
					$old_id 		= Input::old('content_id.' . $itr);
				?>
				@if($input_old)
					<tr data-lang="{{ $lang_prefix }}" class="{{ $hidden[$lang_prefix] }}">
						<td colspan="2">
							<?php 
							$error = '';
							if($errors->first('content_title' . $itr))
								$error = 'input-error';
							?>
							<label for="title-{{ $lang_prefix }}" data-lang="{{ $lang_prefix }}">{{ $copy_text[$lang_prefix]['title'] }}</label>
							<input type="text" class="input-setting {{ $error }}" id="title-{{ $lang_prefix }}" 
									data-lang="{{ $lang_prefix }}" placeholder="{{ $copy_text[$lang_prefix]['placeholder'] }}" 
									name="content_title[]" value="{{ $old_heading }}" />
						</td>
					</tr>
					<tr class="link-divider {{ $hidden[$lang_prefix] }}" data-lang="{{ $lang_prefix }}">
						<td colspan="2">
							<?php 
							$error = '';
							if($errors->first('content_title' . $itr))
								$error = 'input-error';
							?>
							<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi {{ $error }}" data-lang="{{ $lang_prefix }}" rows="15">{{ $old_text }}</textarea>
							<input type="hidden" name="content_action[]" value="{{ $old_action }}" />
							<input type="hidden" name="content_lang[]" value="{{ $old_lang }}" />
							<input type="hidden" name="content_id[]" value="{{ $old_id }}" />
						</td>
					</tr>
				@elseif($input_loaded && $lang_loaded)
					<tr data-lang="{{ $lang_prefix }}" class="{{ $hidden[$lang_prefix] }}">
						<td colspan="2">
							<label for="title-{{ $lang_prefix }}" data-lang="{{ $lang_prefix }}">{{ $copy_text[$lang_prefix]['title'] }}</label>
							<input type="text" class="input-setting" id="title-{{ $lang_prefix }}" 
								data-lang="{{ $lang_prefix }}" placeholder="{{ $copy_text[$lang_prefix]['placeholder'] }}" 
								name="content_title[]" value="{{ $content[$lang_prefix]->heading }}" />
						</td>
					</tr>
					<tr class="link-divider {{ $hidden[$lang_prefix] }}" data-lang="{{ $lang_prefix }}">
						<td colspan="2">
							<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-lang="{{ $lang_prefix }}" rows="15">{{ $content[$lang_prefix]->content }}</textarea>
							<input type="hidden" name="content_action[]" value="update" />
							<input type="hidden" name="content_lang[]" value="{{ $lang_prefix }}" />
							<input type="hidden" name="content_id[]" value="{{ $content[$lang_prefix]->id }}" />
						</td>
					</tr>
				@else
					<tr class="{{ $hidden[$lang_prefix] }}" data-lang="{{ $lang_prefix }}">
						<td colspan="2">
							<label for="title-{{ $lang_prefix }}" data-lang="{{ $lang_prefix }}">{{ $copy_text[$lang_prefix]['title'] }}</label>
							<input type="text" class="input-setting" id="title-{{ $lang_prefix }}" 
								data-lang="{{ $lang_prefix }}" placeholder="{{ $copy_text[$lang_prefix]['placeholder'] }}" name="content_title[]" value="" />
						</td>
					</tr>
					<tr class="link-divider {{ $hidden[$lang_prefix] }}" data-lang="{{ $lang_prefix }}">
						<td colspan="2">
							<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-lang="{{ $lang_prefix }}" rows="15"></textarea>
							<input type="hidden" name="content_action[]" value="add" />
							<input type="hidden" name="content_lang[]" value="{{ $lang_prefix }}" />
							<input type="hidden" name="content_id[]" value="0" />
						</td>
					</tr>
				@endif
			<?php 
			$itr++; 
			endforeach;
			?>
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
						<div>
						@if ($errors->first('link_url' . $i))
							<input class="input-xlarge input-setting input-error" type="text" name="link_url[]" placeholder="ex. http://www.url.com/" value="{{ Input::old('link_url.' . $i) }}">
						@else
							<input class="input-xlarge input-setting" type="text" name="link_url[]" placeholder="ex. http://www.url.com/" value="{{ Input::old('link_url.' . $i) }}">
						@endif
						</div>
					</td>
					<td>
						<div>
						@if ($errors->first('link_name' . $i))
							<input class="input-large input-setting input-error" type="text" name="link_name[]" placeholder="ex. Link to a page" value="{{ Input::old('link_name.' . $i) }}">
						@else
							<input class="input-large input-setting" type="text" name="link_name[]" placeholder="ex. Link to a page" value="{{ Input::old('link_name.' . $i) }}">
						@endif
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