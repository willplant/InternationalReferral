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
			Resources
		</a>
	</div>
</div>
<div class="wrapper resources-wrapper" id="news">
	<div class="left">
		<div class="explain-title">
			Everything you need!
		</div>
		<div class="explain-content">
			Here we have collected all files related to IR and our services for you to download.<br />
			Is something missing? Don't hesitate to contact us! If you are having trouble saving the file, press right click and "Save As".
		</div>
	</div>
	<div class="news-list news-section">
		<div class="title">Your files</div>
		<div class="news">
			<?php $index = 0; ?>
			<?php $subindex = 0; ?>
			<?php $subsubindex = 0; ?>
			@foreach($resources as $r)
				
				@if($r['files'] == 0)
				
					<a href="{{ URL::to('/resources') . '/download/' . $r['file_path'] }}" target="_blank" class="post animate-opacity">
						<span class="post-title">
							{{ $r['name'] }}
							@if($r['title'] != "")
							({{ $r['title'] }})
							@endif
						</span>
					</a>
					
				@else
				
					<?php $index++; ?>
					<a class="post animate-opacity folder folder-closed" data-level="folder-main" data-name="{{ $r['name'].'main'.$index }}">
						<span class="icon animate-all"></span>
						<span class="post-title">{{ $r['name'] }}</span>
					</a>
					
					@foreach($r['files'] as $sub_r)
					
						@if ($sub_r['title'] == 'folder')
							
							<?php $subindex++; ?>
							
							<a class="post animate-opacity folder folder-closed sub-folder hide in-folder" data-level="folder-sub" data-belongsto="{{ $r['name'] }}" data-name="{{ $sub_r['name'].'sub'.$subindex }}" data-folder="{{ $r['name'].'main'.$index }}"><span class="icon animate-all"></span><span class="post-title">{{ $sub_r['name'] }}</span></a>
							
							@foreach ($sub_r['files'] as $file)
								
								@if ($file['title'] == 'folder')
								
								<?php $subsubindex++; ?>
									
									<a class="post animate-opacity folder folder-closed sub-sub-folder hide in-folder" data-level="folder-sub-sub" data-belongsto="{{ $r['name'] }}" data-name="{{ $file['name'].'subsub'.$subsubindex }}" data-folder="{{ $sub_r['name'].'sub'.$subindex }}"><span class="icon animate-all"></span><span class="post-title">{{ $file['name'] }}</span></a>
									
									@foreach ($file['files'] as $sub_file)
									
										<a href="{{ URL::to('/resources') . '/download/' . $sub_file['file_path'] }}" target="_blank" data-belongsto="{{ $r['name'] }}" data-folder="{{ $file['name'].'subsub'.$subsubindex }}" class="post animate-opacity hide in-folder in-sub-sub-folder">
											<span class="icon"></span>
											<span class="post-title">
												{{ $sub_file['name'] }}
												@if($sub_file['title'] != "")
												({{ $sub_file['title'] }})
												@endif
											</span>
										</a>
									
									@endforeach
									
								@else

									<a href="{{ URL::to('/resources') . '/download/' . $file['file_path'] }}" target="_blank" class="post animate-opacity hide in-folder in-sub-folder" data-belongsto="{{ $r['name'] }}" data-folder="{{ $sub_r['name'].'sub'.$subindex }}">
										<span class="icon"></span>
										<span class="post-title">
											{{ $file['name'] }}
											@if($file['title'] != "")
											({{ $file['title'] }})
											@endif
										</span>
									</a>
								
								@endif
								
							@endforeach
							
						@else
					
							<a href="{{ URL::to('/resources') . '/download/' . $sub_r['file_path'] }}" target="_blank" data-folder="{{ $r['name'].'main'.$index }}" class="post animate-opacity hide in-folder">
								<span class="post-title">
									{{ $sub_r['name'] }}
									@if($sub_r['title'] != "")
									({{ $sub_r['title'] }})
									@endif
								</span>
							</a>
						
						@endif
					@endforeach
				@endif
			@endforeach
		</div>
	</div>
</div>

@stop