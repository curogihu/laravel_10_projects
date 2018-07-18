<!DOCTYPE html>
<html>
<head>
	<title>MyTweetz</title>
	<link rel="stylesheet" href="https://bootswatch.com/3/cerulean/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">MyTweetz</a>
			</div>
		</div>
	</nav>

	<div class="container">
		@if(!empty($data))
			@foreach($data as $key => $tweet)
				<div class="well">
					<h3>{{ $tweet['text'] }}
						<i class="glyphicon glyphicon-heart"></i> {{ $tweet['favorite_count'] }}
						<i class="glyphicon glyphicon-repeat"></i> {{ $tweet['retweet_count'] }}
					</h3>

					@if(!empty($tweet['extended_entities']['media']))
						@foreach($tweet['extended_entities']['media'] as $i)
							<img src="{{ $i['media_url_https'] }}" style="width:100px;">
						@endforeach
					@endif
				</div>

			@endforeach
		@else
			<p>No Tweets Found...</p>
		@endif
	</div>	
</body>
</html>