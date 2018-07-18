<!DOCTYPE html>
<html>
<head>
	<title>BP Website - @yield('title')</title>
	<link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
</head>
<body>
	@include('inc.navbar')

	<div class="container">
		@yield('content')
	</div>
</body>
</html>