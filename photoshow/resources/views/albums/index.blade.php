@extends('layouts.app')

@section('content')
	@if(count($albums) <= 0)
		<p>No Albums To Display</p>

	@else
		<?php
			$colcount = count($albums);
			$i = 1;
		?>
		<div id="albums">
			<div class="row text-center">
				@foreach($albums as $album)
					@if($i == $colcount)
						<div class="medium-4 columns end">
							<a href="/albums/{{ $album->id }}">
								<img class="thumbnail"
										src="storage/album_covers/{{ $album->cover_image }}"
										alt="{{ $album->name }}">
							</a>
							<br>
							<h4>{{ $album->name }}</h4>
						</div>

					@else
						<div class="medium-4 columns">
							<a href="/albums/{{ $album->id }}">
								<img class="thumbnail"
										src="storage/album_covers/{{ $album->cover_image }}"
										alt="{{ $album->name }}">
							</a>
							<br>
							<h4>{{ $album->name }}</h4>
						</div>
					@endif

					@if($i % 3 == 0)
						</div></div><div class="row text-center">
					@else
						</div>
					@endif

					<?php $i++; ?>

				@endforeach
			</div>
		</div>
	@endif
@endsection