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
		
			if ($c->language == 'en') $english = $c;
			else if ($c->language == 'es') $spanish = $c;
			
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
			@foreach($member->practiceareaFilter as $pa)
				@if($pa->name_es != "")
				<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }} / {{ $pa->name_es }}<span class="remove animate-opacity">X</span></div>
				@else
					<div class="tag loaded_practicearea" data-id="{{ $pa->id }}">{{ $pa->name }}<span class="remove animate-opacity">X</span></div>
				@endif
			@endforeach
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Your article</div>
	</div>
	<div class="row">
		<div class="news-title-row">
			
			<?php
				if ($english == null && $spanish != null):
					$hide_en = 'hide';
					$hide_es = '';
				else:
					$hide_en = '';
					$hide_es = 'hide';
				endif;
			?>
		
			<label for="title-en" class="{{ $hide_en }}" data-lang="en">Title:</label>
			
			@if ($english != null)
			<input type="text" class="input-setting {{ $hide_en }}" id="title-en" data-lang="en" placeholder="Your title here.." name="title-en" value="{{ $english->heading }}" />
			@else
			<input type="text" class="input-setting {{ $hide_en }}" id="title-en" data-lang="en" placeholder="Your title here.." name="title-en" value="" />
			@endif
			
			<label for="title-es" data-lang="es" class="{{ $hide_es }}">Titulo:</label>
			
			@if ($spanish != null)
			<input type="text" class="input-setting {{ $hide_es }}" data-lang="es" id="title-es" placeholder="Your title here.." name="title-es" value="{{ $spanish->heading }}" />
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
						@if ($english == null)
						<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" data-name="content_text" name="content_en" rows="15"></textarea>
						@else
						<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" data-name="content_text" name="content_en" rows="15">{{ $english->content }}</textarea>
						@endif
					</td>
				</tr>
				<tr class="link-divider {{ $hide_es }}" data-lang="es">
					<td colspan="2">
						@if ($spanish == null)
						<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="es" data-name="content_text" name="content_es" rows="15"></textarea>
						@else
						<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="es" data-name="content_text" name="content_es" rows="15">{{ $spanish->content }}</textarea>
						@endif
					</td>
				</tr>
			</tbody>
		</table>
		<div class="save-row">
			<input type="submit" value="Save Article" class="submit" />
		</div>
	</div>
	
	</form>
</div>

@stop