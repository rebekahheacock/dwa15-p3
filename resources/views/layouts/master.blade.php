<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','RHJ: Developer\'s Best Friend')</title>
	<link href="css/app.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

	<header>
		@yield('header')
	</header>
	<section>
		@yield('content')
	</section>


<footer>
	<p>because footers are nice</p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

@yield('body')
	
</body>
</html>