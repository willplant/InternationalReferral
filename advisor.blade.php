@extends('site.template')

@section('content')

<div id="background">
	<div class="left"></div>
	<div class="right"></div>
</div>
<div id="background-profile">
</div>
<div id="background-profile-card">
</div>
<div class="breadcrumbs">
	<div class="wrapper">
		<a href="{{ URL::to('/') }}" class="breadcrumb breadcrumb-home no-margin-left animate-opacity">
			<span class="light"></span>
			<span class="end"></span>
			<span class="icon"></span>
		</a>
		<a href="{{ URL::to('/advisors') }}" class="breadcrumb breadcrumb breadcrumb-advisors animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Find an Adviser
		</a>
		<a href="{{ $url_back }}" class="breadcrumb breadcrumb-advisors-search animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			Result 
		</a>
		<a class="breadcrumb breadcrumb-active animate-opacity">
			<span class="light"></span>
			<span class="begin"></span>
			<span class="end"></span>
			<span class="breadcrumb-light">Adviser</span>
		</a>
		@if(count($available_languages) > 1)
		<div class="translation">
			<div class="title tablet mobile">Translation</div>
			<div class="language spanish animate-opacity" data-code="es">En Español</div>
			<div class="language english active animate-opacity" data-code="en">In english</div>
		</div>
		@elseif(count($available_languages) == 1)
			@if(!array_key_exists($language, $available_languages))
			<div class="translation">
				<div class="title tablet mobile">Translation</div>
				@if(array_key_exists('es', $available_languages))
				<div class="language spanish active animate-opacity" style="float: right;" data-code="es">In spanish</div>
				@elseif(array_key_exists('en', $available_languages))
				<div class=" english active animate-opacity" style="float: right;" data-code="en">En ingles</div>
				@endif
			</div>
			@endif
		@endif
	</div>
</div>
<div id="advisors" class="section advisor-profile-page">
	<div class="wrapper advisor-detail-wrapper">
		<div class="left">
			<?php $mobile_extra = ''; ?>
				@if(count($available_languages) > 1 || array_key_exists('es', $available_languages))
					<?php $mobile_extra = ' mobile_extra_profile'; ?>
				@endif
			<div class="advisor-profile{{ $mobile_extra }}">
				<div class="advisor-name">
					<div class="image" style="background-image: url({{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }});
					filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }}', sizingMethod='scale');
					-ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{ '/attachments/members/' . $advisor->id . '.' . $advisor->image_extention }}', sizingMethod='scale')';"></div>
					<span class="name">{{ $advisor->first_name . ' ' . $advisor->middle_name . ' ' . $advisor->last_name }}</span><br />
					<span class="title">{{ $advisor->title }},<br />{{ $advisor->firm->name }}</span>
				</div>
			</div>
			<?php $mobile_extra = ''; ?>
				@if(count($available_languages) > 1 || array_key_exists('es', $available_languages))
					<?php $mobile_extra = ' mobile_extra'; ?>
				@endif
			<div class="advisor-data{{ $mobile_extra }}">
				<div class="classes">
				@if (count($advisor->registers) > 1)
					<span class="translate_this" data-language="en">Classes</span>
					<span class="translate_this hide" data-language="es">Clases</span>
				@else
					<span class="translate_this" data-language="en">Class</span>
					<span class="translate_this hide" data-language="es">Clase</span>
				@endif
					<div class="classes-icons">
					@foreach ($advisor->registers as $register)
						@if ($register->id == 1)
							<div class="icon-40-exclusive-light"></div>
						@elseif ($register->id == 2)
							<div class="icon-40-rising-stars"></div>
						@elseif ($register->id == 3)
							<div class="icon-40-latin"></div>
						@endif
					@endforeach
					</div>
				</div>
				@if (!empty($regions))
					<div class="nationality">
					<span class="text translate_this" data-language="en">Jurisdiction</span>
					<span class="text translate_this hide" data-language="es">Jurisdicción</span>
						<div class="nationality-country">
							@foreach ($regions as $r)
								<img src="{{ url() }}/img/flags/48/{{ $r->country_id }}.png" alt="" class="flag-hover" data-name="{{ $r->country_name }}" />
							@endforeach
						</div>
					</div>
				@endif
				<div class="firm">
					<span class="translate_this" data-language="en">Firm</span>
					<span class="translate_this hide" data-language="es">Firma</span>
					@if($advisor->firm->has_image)
					<div class="firm-image" style="background-image: none; background-color: #fff;">
						<img class="firm-img" src="{{ URL::to('/attachments/firms/' . $advisor->firm->id . '.' . $advisor->firm->image_extention)  }}" alt="" />
					</div>
					@else
					<div class="firm-image"></div>
					@endif
				</div>
			</div>
		</div>
		<div class="right">
			<div class="advisor-details">
				<div class="title translate_this" data-language="en">Contact details</div>
				<div class="title translate_this hide" data-language="es">Datos de contacto</div>
				<div class="details">
					<div class="detail-row">
						<div class="detail-title translate_this" data-language="en">Firm name</div>
						<div class="detail-title translate_this hide" data-language="es">Firma</div>
						<div class="detail">{{ htmlspecialchars_decode($advisor->firm->name) }}</div>
					</div>
					<div class="detail-row">
						<div class="detail-title translate_this" data-language="en">Address</div>
						<div class="detail-title translate_this hide" data-language="es">Dirección</div>
						<div class="detail">
							@if ($advisor->street)
								{{ htmlspecialchars_decode($advisor->street) }}
							@endif
							@if ($advisor->postcode)
								<br />{{ htmlspecialchars_decode($advisor->postcode) }}
							@endif
							@if ($advisor->city)
								, {{ htmlspecialchars_decode($advisor->city) }}
							@endif
							@if ($advisor->country)
								, {{ htmlspecialchars_decode($advisor->country) }}
							@endif
						</div>
					</div>
					<div class="detail-row">
						<div class="detail-title translate_this" data-language="en">Phone</div>
						<div class="detail-title translate_this hide" data-language="es">Teléfono</div>
						@if(empty($advisor->phone2))
						<div class="detail">{{ $advisor->phone1 }}</div>
						@else
						<div class="detail">{{ $advisor->phone1 }}<br/>{{ $advisor->phone2 }}</div>
						@endif
					</div>
					<div class="detail-row">
						<div class="detail-title">E-mail</div><div class="detail"><a href="mailto:{{ $advisor->email }}" target="_blank">{{ $advisor->email }}</a></div>
					</div>
				</div>
				<div class="contact-buttons">
					<a href="{{ $advisor->firm->url }}" target="_blank" class="link no-margin-left translate_this" data-language="en"><span class="light"></span>Visit firm website</a>
					<a href="{{ $advisor->firm->url }}" target="_blank" class="link no-margin-left translate_this hide" data-language="es"><span class="light"></span>Visita la firma</a>
					@if(!empty($advisor->vcita_id) && $advisor->vcita_id != "0")
					<a class="link translate_this" data-language="en" href="http://www.vcita.com/meeting_scheduler?v={{ $advisor->vcita_id }}" target="_blank"><span class="light"></span>Book a meeting</a>
					<a class="link translate_this hide" data-language="es" href="http://www.vcita.com/meeting_scheduler?v={{ $advisor->vcita_id }}" target="_blank"><span class="light"></span>Concertar una cita</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper advisor-content profile-small-sections">
		@if (count($advisor->practice_area_comittee) > 0)
		<div class="wrapper-section">
			<div class="title translate_this" data-language="en">
				<span class="icon-40-comittee" title="IR - Comitee member" style="background-image: url({{ URL::to('/img/site-desktop/class-icon-comittee.png') }}); margin-right: 20px;"></span> Committee Member
			</div>
			<div class="title translate_this hide" data-language="es">
				<span class="icon-40-comittee" title="IR - Comitee member" style="background-image: url({{ URL::to('/img/site-desktop/class-icon-comittee.png') }}); margin-right: 20px;"></span> Miembro de comité
			</div>
			<div style="padding-top: 20px;">
				@foreach($advisor->practice_area_comittee as $pac)
					{{ $pac->description }}
				@endforeach
			</div>
		</div>
		@endif
		@if(count($advisor->practiceareas) > 0)
		<div class="wrapper-section">
			<div class="title translate_this" data-language="en">Practice Areas</div>
			<div class="title translate_this hide" data-language="es">Áreas de práctica</div>
			<div class="content translate_this" data-language="en">
				@foreach ($advisor->registers as $register)
					@if ($register->id == 1)
						<i>{{ $advisor->first_name . ' ' . $advisor->middle_name . ' ' . $advisor->last_name }} is the exclusive IR member for:</i><br />
						<?php break; ?>
					@elseif ($register->id == 2)
						<i>{{ $advisor->first_name . ' ' . $advisor->middle_name . ' ' . $advisor->last_name }} is featured in Rising Stars for:</i><br />
						<?php break; ?>
					@elseif ($register->id == 3)
						<i>{{ $advisor->first_name . ' ' . $advisor->middle_name . ' ' . $advisor->last_name }} is featured in IR Latin for:</i><br />
						<?php break; ?>
					@endif
				@endforeach
				<ul style="padding-top: 20px;">
				@if ($advisor->practiceareas)
					@foreach ($advisor->practiceareas as $pa)
						<li style="padding-left: 20px;">{{ $pa->name }}</li>
					@endforeach
				@endif
				</ul>
			</div>
			<div class="content translate_this hide" data-language="es">
				<i>{{ $advisor->first_name . ' ' . $advisor->middle_name . ' ' . $advisor->last_name }} es el miembro de IR Latin para:</i><br />
				<ul style="padding-top: 20px;">
				@if ($advisor->practiceareas)
					@foreach ($advisor->practiceareas as $pa)
						@if($pa->name_es != "")
						<li style="padding-left: 20px;">{{ $pa->name_es }}</li>
						@else
						<li style="padding-left: 20px;">{{ $pa->name }}</li>
						@endif
					@endforeach
				@endif
				</ul>
			</div>
		</div>
		@endif
		@if (count($advisor->links) > 0)
		<div class="wrapper-section">
			<div class="title translate_this" data-language="en">Links</div>
			<div class="title translate_this hide" data-language="es">Enlaces</div>
			<div style="padding-top: 20px;">
				@foreach($advisor->links as $link)
					<a href="{{ $link->url }}" class="animate-opacity" target="_blank">- {{ $link->name }}</a>
				@endforeach
			</div>
		</div>
		@endif
	</div>
	<div class="wrapper advisor-content">
		<?php $first = true; ?>
		
		{{-- Sections --}}
		@if ($advisor->content)
			@foreach ($advisor->content as $section)
			
				@foreach ($section->content as $section)
					@if (trim(htmlspecialchars_decode($section->content)) != '')
						@if(count($available_languages) > 1)
							@if ($section->language == $language)
							<div class="wrapper-section" data-language="{{ $section->language }}">
							@else
							<div class="wrapper-section hide" data-language="{{ $section->language }}">
							@endif
						@else
						<div class="wrapper-section" data-language="{{ $section->language }}">
						@endif
							<div class="title">
								{{ $section->heading }}
							</div>
							<div class="content">
								{{ htmlspecialchars_decode($section->content) }}
							</div>
						</div>
					@endif
				@endforeach
				
				{{-- Firms --}}
				@if ($first == true && $advisor->firm->content)
					@foreach ($advisor->firm->content as $firmcontent)
						@if (trim(htmlspecialchars_decode($firmcontent->content)) != '')
							@if ($firmcontent->language == $language)
							<div class="wrapper-section firm-profile" data-language="{{ $firmcontent->language }}">
							@else
							<div class="wrapper-section firm-profile hide" data-language="{{ $firmcontent->language }}">
							@endif
								<div class="title">
									{{ htmlspecialchars_decode($firmcontent->heading) }}
								</div>
								<div class="content">
									{{ htmlspecialchars_decode($firmcontent->content) }}
								</div>
							</div>
						@endif
					@endforeach
				@endif
				<?php $first = false; ?>	
			@endforeach
		@endif
		
		{{-- News --}}
		@if (count($news) > 0)
			<div class="wrapper-section news-section">
				<div class="title translate_this" data-language="en"><span class="news-icon"></span>News by {{ $advisor->first_name }}</div>
				<div class="title translate_this hide" data-language="es"><span class="news-icon"></span>Noticias por {{ $advisor->first_name }}</div>
				<div class="news">
				<?php $grey = false; ?>
				@foreach ($news as $newspost)
					@foreach($newspost->content as $row)
						
						@if ($row->language == $language)
							@if ($grey == true)
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post grey animate-opacity" data-language="{{ $row->language }}">
							@else
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post animate-opacity" data-language="{{ $row->language }}">
							@endif
							
						@else
							@if ($grey == true)
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post grey hide animate-opacity" data-language="{{ $row->language }}">
							@else
								<a href="{{ url() }}/article/{{ $newspost->id }}" class="post hide animate-opacity" data-language="{{ $row->language }}">
							@endif
						@endif

								<span class="post-title">
								{{ htmlspecialchars_decode($row->heading) }}
								</span>
								<span class="post-details">
									Published <?php echo date('d M, Y', strtotime($newspost->datetime)); ?>
								</span>
							</a>
							
					@endforeach
					<?php 
						if ($grey == false): 			$grey = true;
						elseif ($grey == true): 	$grey = false;
						endif;
					?>
				@endforeach
				</div>
				<div class="load-more translate_this" data-language="en" data-page="1" data-user="{{ $advisor->id }}">Load more news</div>
				<div class="load-more translate_this hide" data-language="es" data-page="1" data-user="{{ $advisor->id }}">Ver más noticias</div>
			</div>
		@endif
	</div>
</div>

@stop