<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','RHJ: Developer\'s Best Friend')</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>
	<link href="css/app.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="css/p3.css" type="text/css" rel="stylesheet">

</head>
<body>

	@section('navbar')

		<nav class="navbar navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
				<a class="navbar-brand" href="<?php echo url(); ?>">
					<i class="fa fa-cogs fa"></i> developer's best friend
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right list-unstyled list-inline">
					<li><a href="loremipsum"><i class="fa fa-align-justify"></i> Lorem Ipsum</a></li>
					<li><a href="users"><i class="fa fa-users"></i> User Generator</a></li>
					<li><a href="password"><i class="fa fa-key"></i> Password Generator</a></li>
				</ul>	
			</div>
		</nav>
	@show


	@yield('subhead')

	@yield('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

@yield('body')
	
</body>
</html>