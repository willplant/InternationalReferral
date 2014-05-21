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
			Here you can manage all your profile data.
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Profile settings</div>
	</div>
	<div class="left forty">
		<div><label for="first_name">First Name:</label><input type="text" class="input-setting" id="first_name" value="{{ $member->first_name }}" name="first_name" /></div>
		<div><label for="middle_name">Middle Name(s):</label><input type="text" class="input-setting" id="middle_name" value="{{ $member->middle_name }}" name="middle_name" /></div>
		<div><label for="last_name">Last Name:</label><input type="text" class="input-setting" id="last_name" value="{{ $member->last_name }}" name="last_name" /></div>
		<div><label for="phone1">Phone:</label><input type="text" class="input-setting" id="phone1" value="{{ $member->phone1 }}" name="phone1" /></div>
	</div>
	<div class="right forty">
		<div><label for="phone2">Phone (second):</label><input type="text" class="input-setting" id="phone2" value="{{ $member->phone2 }}" name="phone2" /></div>
		<div><label for="street">Street:</label><input type="text" class="input-setting" id="street" value="{{ $member->street }}" name="street" /></div>
		<div><label for="postcode">Postal code:</label><input type="text" class="input-setting" id="postcode" value="{{ $member->postcode }}" name="postcode" /></div>
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
	<div class="save-row">
		<input type="submit" value="Save" class="submit" />
	</div>

	<div class="news-list news-section content">
		<div class="title">Custom sections</div>
	</div>
	<div class="row" id="add_content">
		<div class="explain-content">
			You can add your own special sections if you want to. If you have specific interests or a specific skillset you may write about it as much as you want. Fill in the title - and then press "Add new section".
		</div>
		<div class="input-append">
			<div class="input-box">
				<label>Section title:</label>
				<input class="input-xxlarge input-field-title input-setting" type="text" name="content_add" placeholder="ex. Awards, Education, Philanthropy" value="">
			</div>
			<button type="button" class="btn btn-primary content-add submit">Add new section +</button>
		</div>
	</div>
	<div id="content_main_container">
		<!-- Hidden template -->
		<div class="row hidden-section content-container hide" id="content_template">
			<!-- Section start -->
			 <div class="news-list news-section">
				<div class="title content-heading">Content</div>
			</div>

			<div class="row-navbar">
				@foreach($language_codes as $lang)
					@if($lang->two_letter != "en")
					<button type="button" class="lang-add submit" data-lang="{{ $lang->two_letter }}">Add {{ $lang->english_name }} +</button>
					@else
					<button type="button" class="lang-add submit hide" data-lang="{{ $lang->two_letter }}">Add {{ $lang->english_name }} +</button>
					@endif
				@endforeach
				<div class="pull-right content-removable-section">
					<button type="button" class="content-section-remove1 submit">Remove section <i class="icon-plus-sign icon-white"></i></button>
				</div>
			</div>
				<?php
				{
					// Output a template for new content (in all languages). This will be copied by javascript at a later stage.
					$i = 0;
					foreach($language_codes as $lang):

						$xtend = '';
						if ($i > 0) $xtend = ' input-boxes-right';

						// Display the default language English by default
						$action 	= "add";
						$hide 		= "";
						if($lang->two_letter != "en")
						{
							$action 	= "none";
							$hide 		= " hide";
						}
				?>
				<div class="content_container_{{ $lang->two_letter }} input-boxes<?php echo $xtend; echo $hide; ?>">
					<div class="title-float">{{ $lang->english_name }}
						<button type="button" class="lang-remove1 submit-small" data-lang="{{ $lang }}">Remove translation -</button>
					</div>

					<!-- Title -->
					<div class="input-box">
						<label>Title:</label>
						<input class="input-xxlarge lang-input-field input-field-title input-setting" type="text" data-type="2array" data-lang="{{ $lang->two_letter }}" data-name="content_title">
					</div>

					<!-- Content text -->
					<div class="input-box">
						<label>Text:</label>
						<textarea class="lang-input-field" data-type="2array" data-lang="{{ $lang->two_letter }}" data-name="content_text" rows="15"></textarea>
					</div>		

					<!-- Hidden content data  -->
					<div>
                        <input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang->two_letter }}" 	data-name="content_action" 	value="{{ $action }}">
						<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang->two_letter }}" 	data-name="content_lang" 	value="{{ $lang->two_letter }}">
                    </div>					
				</div>
				<?php
					$i++;
					endforeach;
				}
				?>

				<!-- Hidden section data -->
				<div>
					<input class="lang-input-field" type="hidden" data-type="1array" data-name="section_type" value="removable">
					<input class="lang-input-field" type="hidden" data-type="1array" data-name="section_action" 	value="none">
				</div>

				<div class="save-row">
					<input type="submit" value="Save" class="submit" />
				</div>
				<!-- Section end -->
			</div>

                <?php
				// Output data saved in database
                if(count(Input::old('section_action')) == 0)
                {
                    for($i = 0; $i < count($member->content); $i++)
                    {
						// Pre-load all content
						$section_content = array();
						foreach($member->content[$i]->content as $c)
						{
							$section_content['id']			= $member->content[$i]->id;
							$section_content[$c->language] 	= $c;
						}

						// Pre set variables for nicer html
						$heading = array_key_exists('en', $section_content) ? $section_content['en']->heading : $section_content['es']->heading;

						// Define content type, removable = can be deleted, non-removable = cannot be deleted (ex. biography)
						$section_type = "removable";
						if($i == 0) // Biography
							$section_type = "non-removable";
                ?>
					@if($i == 0) {{-- Reserve spot 0 for biography --}}
                    <div class="row content-container content-type-biography">
					@else
                    <div class="row content-container">
					@endif
						<!-- Section start -->
						<div class="news-list news-section content">
							<div class="title">{{ $heading }}</div>
						</div>

						<div class="row-navbar">
							<?php
							$language_names = array();	// Used for naming of database-read data
							$l 				= 0;		// Counter for the loop below
							foreach($language_codes as $language):
								$identifier 							= $i . '.' . $language->two_letter; // Used for identifying Input name
								$language_names[$language->two_letter] 	= $language->english_name;
							?>
							
							@if(array_key_exists($language->two_letter, $section_content))
							<button type="button" class="lang-add hide submit" data-lang="{{ $language->two_letter }}">Add {{ $language->english_name }} +</button>
							@else
							<button type="button" class="lang-add submit" data-lang="{{ $language->two_letter }}">Add {{ $language->english_name }} +</button>
							@endif
							<?php endforeach; ?>
							@if($i > 0)
							<button type="button" class="content-section-remove1 submit">Remove section <i class="icon-plus-sign icon-white"></i></button>
							@endif
						</div>

                        <?php
						$customindex = 0;
						
                        foreach($language_codes as $language):
                            $lang 			= $language->two_letter;
                            $identifier 	= $i . '.' . $lang;			// Identifier for Input array, ex. Input::old('content_action.1.en')

							$xtend = '';
							if ($customindex > 0) $xtend = ' input-boxes-right';
							
							$hasLanguage = array_key_exists($lang, $section_content);

							// Pre definitions
							$hide 			= " hide";
							$content_action = "none";
							$heading		= "";
							$content_text 	= "";
							$content_id		= "";

							// Check if section has translated content
							if($hasLanguage)
							{
								// Visuals
								$hide 			= "";

								// Update existing data
								$content_action = "update";

								// Database content
								$heading		= $section_content[$lang]->heading;
								$content_text	= $section_content[$lang]->content;

								$content_id		= $section_content[$lang]->id;
							}
                        ?>
						<div class="content_container_{{ $lang }} input-boxes<?php echo $xtend; echo $hide; ?>">
							<div class="title-float">{{ $language->english_name }}
								<button type="button" class="btn btn-danger lang-remove1 submit-small" data-lang="{{ $lang }}">Remove translation -</button>
							</div>
							<!-- Title -->
							<div class="input-box">
								<label>Title:</label>
								<input class="input-xxlarge lang-input-field input-field-title input-setting" type="text" data-type="2array" data-lang="{{ $lang }}" data-name="content_title" value="{{ $heading }}">
							</div>
							<!-- Content text -->
							<div class="input-box">
								<label>Text:</label>
								<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="{{ $lang }}" data-name="content_text" rows="15">{{ $content_text }}</textarea>
							</div>							
						</div>

						<!-- Hidden content data -->
						<div>
							<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_id" 			value="{{ $content_id }}">
							<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_lang" 		value="{{ $lang }}">
							<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_action" 		value="{{ $content_action }}">
						</div>
					<?php 
					$customindex++; 
					endforeach; 
					?>

					<!-- Hidden section data -->
					<div>
						<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_id" 			value="{{ $member->content[$i]->id }}">
						<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_type" 		value="{{ $section_type }}">
						<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_action" 		value="update">
					</div>
						
					<div class="save-row">
						<input type="submit" value="Save" class="submit" />
					</div>
					<!-- Section end -->
				</div>
                <?php
                    // End loaded data loop
                    }
                }
                else // Handle old input
                {
                    for($i = 0; $i < count(Input::old('section_action')); $i++)
                    {
                    ?>
                    @if($i == 0) {{-- Reserve spot 0 for biography --}}
                    <div class="row content-container content-type-biography">
					@else
                    <div class="row content-container">
					@endif
						<!-- Section start -->
						<div class="news-list news-section content">
							<div class="title">{{ Input::old('content_title.' . $i . '.en') }}</div>
						</div>

						@if(Input::old('section_action.' . $i) == 'add' || Input::old('section_action.' . $i) == 'update')
                        <div class="row-navbar">
                            <?php
                            foreach($language_codes as $language):
                                $identifier = $i . '.' . $language->two_letter;

                                // Display the default language English by default
                                $hide = "";
                                if(Input::old('content_action.' . $identifier) == "add" ||
                                   Input::old('content_action.' . $identifier) == "update")
                                {
                                    $hide = " hide";
                                }
                            ?>
							<button type="button" class="lang-add{{ $hide }} submit" data-lang="{{ $language->two_letter }}">Add {{ $language->english_name }} +</button>
	                        <?php endforeach; ?>
	                        @if(Input::old('section_type.' . $i) == "removable")
							<button type="button" class="content-section-remove1 submit">Remove section <i class="icon-plus-sign icon-white"></i></button>
	                        @endif
                        </div>

                        <?php
						$customindex = 0;
                        foreach($language_codes as $language):
                            $lang       = $language->two_letter;
                            $identifier = $i . '.' . $lang;

                            $xtend = '';
							if ($customindex > 0) $xtend = ' input-boxes-right';

                            $hide = "";
                            if(Input::old('content_action.' . $identifier) != "add" &&
                               Input::old('content_action.' . $identifier) != "update")
                            {
                                $hide = " hide";
                            }
                        ?>
                            <div class="content_container_{{ $lang }} input-boxes<?php echo $xtend; echo $hide; ?>">
								<div class="title-float">{{ $language->english_name }}
									<button type="button" class="lang-remove1 submit-small" data-lang="{{ $lang }}">Remove translation -</button>
								</div>

                                <!-- Title -->
								<div class="input-box">
									<label>Title:</label>
									<input class="input-xxlarge lang-input-field input-field-title input-setting" type="text" data-type="2array" data-lang="{{ $lang }}" data-name="content_title" value="{{ Input::old('content_title.' . $identifier) }}">
								</div>
								<!-- Content text -->
								<div class="input-box">
									<label>Text:</label>
									<textarea class="input-xxlarge lang-input-field wysi" data-type="2array" data-lang="{{ $lang }}" data-name="content_text" rows="15">{{ Input::old('content_text.' . $identifier) }}</textarea>
								</div>							
							</div>

                        	<!-- Hidden content data -->
							<div>
								<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_id" 			value="{{ Input::old('content_id.' . $identifier) }}">
								<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_lang" 		value="{{ Input::old('content_lang.' . $identifier) }}">
								<input class="lang-input-field" type="hidden" data-type="2array" data-lang="{{ $lang }}" 	data-name="content_action" 		value="{{ Input::old('content_action.' . $identifier) }}">
							</div>
						<!-- </div> -->
                        <?php
                        $customindex++;
						endforeach;
						endif; 		// if(section_action != remove)
						?>
						<!-- Hidden section data -->
						<div>
							<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_id" 			value="{{ Input::old('section_id.' . $i) }}">
							<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_type" 		value="{{ Input::old('section_type.' . $i) }}">
							<input class="lang-input-field" type="hidden" data-type="1array" 	data-name="section_action" 		value="{{ Input::old('section_action.' . $i) }}">
						</div>
							
						<div class="save-row">
							<input type="submit" value="Save" class="submit" />
						</div>
						
						<!-- Section end -->
					</div>
                <?php
                    // End for-loop
                    }
                }
                ?>
               </div>
				<!-- end of content_container -->

		<div class="news-list news-section">
			<div class="title">Links</div>
		</div>

		<!-- Links -->
		<div class="row" id="links">
			<button type="button" class="btn btn-mini btn-primary link-add submit">Add link +</button>
			<div class="explain-content">
				Remember to make sure that every link starts with <strong>http://</strong> or <strong>https://</strong> !<br />(pro-tip: Open the link and copy the URL from your browsers adress bar).
			</div>
			<div class="span10 well">
				<table id="link-table" class="table table-hover">
					<thead>
						<tr class="table-head">
							<th><a href="#">Order</a></th>
							<th><a href="#">URL</a></th>
							<th><a href="#">Display name</a></th>
							<th><a href="#">Remove link</a></th>
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
					</tbody>
				</table>
				<div class="save-row">
					<input type="submit" value="Save" class="submit" />
				</div>
			</div>
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
</div>
</form>

@stop