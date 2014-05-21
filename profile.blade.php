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
			Profile settings
		</a>
	</div>
</div>
<form id="update-profile-form" method="post" accept-charset="UTF-8">
<div class="wrapper settings-wrapper profile-settings-page" id="news">
	<div class="left">
		<div class="explain-title">
			Change your profile
		</div>
		<div class="explain-content">
			Here you can manage all information that's shown on your profile page. Press Save in the certain section when you feel satisfied with your changes. If you don't press save, all your changes will be lost.
		</div>
	</div>
	<!-- Profile -->
	<div class="news-list news-section">
		<div class="title">Profile settings</div>
	</div>
	<div class="left forty">
		<div><label for="first_name">First Name:</label><input type="text" class="input-setting" id="first_name" value="{{ $member->first_name }}" name="first_name" /></div>
		<div><label for="middle_name">Middle Name(s):</label><input type="text" class="input-setting" id="middle_name" value="{{ $member->middle_name }}" name="middle_name" /></div>
		<div><label for="last_name">Last Name:</label><input type="text" class="input-setting" id="last_name" value="{{ $member->last_name }}" name="last_name" /></div>
		<div><label for="city">City:</label><input type="text" class="input-setting" id="city" value="{{ $member->city }}" name="city" /></div>
		<div>
			<label for="country">Country:</label>
			<select name="country_id" class="input-setting-dropdown">
				<option value="0">Select country</option>
				@foreach($countries as $country)
					@if(Input::old('country_id') == $country->id)
						<option value="{{ $country->id }}" selected>{{ $country->short_name }}</option>
					@else
						@if($country->id == $member->country_id)
						<option value="{{ $country->id }}" selected>{{ $country->short_name }}</option>
						@else
						<option value="{{ $country->id }}">{{ $country->short_name }}</option>
						@endif
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="right forty">
		<div><label for="phone1">Phone:</label><input type="text" class="input-setting" id="phone1" value="{{ $member->phone1 }}" name="phone1" /></div>
		<div><label for="phone2">Phone #2:</label><input type="text" class="input-setting" id="phone2" value="{{ $member->phone2 }}" name="phone2" /></div>
		<div><label for="street">Street:</label><input type="text" class="input-setting" id="street" value="{{ $member->street }}" name="street" /></div>
		<div><label for="postcode">Postal code:</label><input type="text" class="input-setting" id="postcode" value="{{ $member->postcode }}" name="postcode" /></div>
	</div>
	<div class="save-row">
		<input type="submit" value="Save Profile settings" class="submit" />
	</div>
	
	<!-- Biography -->
	<!-- Låt denna div vara outstanding och lägg in content i row. -->
	<div class="news-list news-section">
		<div class="title">Biography</div>
	</div>
	<div class="row">
		<div class="explain-content">
			Here you can read and edit your biography. When you feel satisfied - just press <strong>"Save Biography"</strong>! If you wish to have a Spanish translation, press Spanish below to add it. If you wish to remove a translation, simply remove all the text and the translation will be removed.
		</div>
		<table class="table table-hover table-biography" cellpadding="1" cellspacing="24">
			<thead>
				@if(isset($biography['en']))
				<th class="animate-opacity language-tab" data-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="inactive animate-opacity language-tab" data-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@elseif(!isset($biography['en']) && isset($biography['es']))
				<th class="inactive animate-opacity language-tab" data-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="animate-opacity language-tab" data-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@else
				<th class="animate-opacity language-tab" data-lang="en"><img src="{{ URL::to('img/flags/48/235.png') }}" alt="" /> English</th>
				<th class="inactive animate-opacity language-tab" data-lang="es"><img src="{{ URL::to('img/flags/48/209.png') }}" alt="" />Spanish</th>
				@endif
			</thead>
			<tbody>
				@if(isset($biography['en']))
				<tr class="link-divider" data-lang="en">
					<td colspan="2" class="input-contaier">
						<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" data-name="content_text" rows="15">{{ $biography['en']->content }}</textarea>
						<input type="hidden" name="content_action[]" value="update" />
						<input type="hidden" name="content_lang[]" value="en" />
						<input type="hidden" name="content_id[]" value="{{ $biography['en']->id }}" />
					</td>
				</tr>
				@else
					@if(isset($biography['es']))
					<tr class="link-divider hide" data-lang="en">
					@else
					<tr class="link-divider" data-lang="en">
					@endif
					<td colspan="2" class="input-contaier">
						<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" data-name="content_text" rows="15"></textarea>
						<input type="hidden" name="content_action[]" value="add" />
						<input type="hidden" name="content_lang[]" value="en" />
						<input type="hidden" name="content_id[]" value="0" />
					</td>
				</tr>
				@endif

				@if(isset($biography['es']))
					@if(!isset($biography['en']))
					<tr class="link-divider" data-lang="es">
					@else
					<tr class="link-divider hide" data-lang="es">
					@endif
					<td colspan="2" class="input-contaier">
						<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" rows="15">{{ $biography['es']->content }}</textarea>
						<input type="hidden" name="content_action[]" value="update" />
						<input type="hidden" name="content_lang[]" value="es" />
						<input type="hidden" name="content_id[]" value="{{ $biography['es']->id }}" />
					</td>
				</tr>
				@else
				<tr class="link-divider hide" data-lang="es">
					<td colspan="2" class="input-contaier">
						<textarea name="content_text[]" class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="en" data-name="content_text" rows="15"></textarea>
						<input type="hidden" name="content_action[]" value="add" />
						<input type="hidden" name="content_lang[]" value="es" />
						<input type="hidden" name="content_id[]" value="0" />
					</td>
				</tr>
				@endif
			</tbody>
		</table>
		<div class="save-row">
			<input type="submit" value="Save Biography" class="submit" />
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
				<tr class="link-divider">
					<td colspan="5"></td>
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
					foreach($member->links as $links)
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
</div>

<div id="content-lang-remove-confirm" class="hide">
  <div class="modal-body">
	<p class="text-center">Are you sure you wish to remove this translation?</p>
  </div>
  <div class="modal-footer">
	<button class="btn btn-primary modal-hide">That would be crazy!?</button>
	<button type="button" class="btn btn-danger lang-remove2">Remove translation</button>
  </div>
</div>

<div id="content-section-remove-confirm" class="hide">
  <div class="modal-body">
	<p class="text-center">Are you sure you wish to remove this section?</p>
  </div>
  <div class="modal-footer">
	<button class="btn btn-primary modal-hide">That would be crazy!?</button>
	<button type="button" class="btn btn-danger content-section-remove2">Remove translation</button>
  </div>
</div>

</form>

@stop