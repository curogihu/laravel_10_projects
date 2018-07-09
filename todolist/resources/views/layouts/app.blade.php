<!DOCTYPE html>
<html>
<head>
	<title>Todolist</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	@include('inc.navbar')
	<div class="container">
		@include('inc.messages')
		@yield('content')

		<footer id="footer" class="text-center">
			<p>Copyright &copy; 2018 TodoList</p>
		</footer>
	</div>
</body>
</html>