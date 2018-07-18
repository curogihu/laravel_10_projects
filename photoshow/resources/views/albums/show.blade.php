@extends('layouts.app')

@section('content')
	<h1>{{ $album->name }}</h1>
	<a class="button secondary" href="/">Go Back</a>
	<a class="button" href="/photos/create/{{ $album->id }}">Upload Photo to Album</a>
	<hr>
	@if(count($album->photos) <= 0)
		<p>No Photos To Display</p>

	@else
		<?php
			$colcount = count($album->photos);
			$i = 1;
		?>
		<div id="photos">
			<div class="row text-center">
				@foreach($album->photos as $photo)
					<div class="medium-4 columns <?php echo $i == $colcount ? ' end' : null ; ?>">
						<a href="/photos/{{ $photo->id }}">
							<img class="thumbnail" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
						</a>
						<br>
						<h4>{{ $photo->title }}</h4>
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