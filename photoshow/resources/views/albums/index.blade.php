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
					<div class="medium-4 columns <?php echo $i == $colcount ? ' end' : null ; ?>">
						<a href="/albums/{{ $album->id }}">
							<img class="thumbnail" src="storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">
						</a>
						<br>
						<h4>{{ $album->name }}</h4>
					</div>

					@if($i % 3 == 0)
						<div class="row text-center">
					@endif

					<?php $i++; ?>

				@endforeach
			</div>
		</div>
	@endif
@endsection