<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','RHJ: Developer\'s Best Friend')</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald%7Crimson+Text' rel='stylesheet' type='text/css'>
	<link href="css/app.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="css/p3.css" type="text/css" rel="stylesheet">

</head>
<body>

	@section('navbar')

		<nav class="navbar navbar-fixed-top">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo url(); ?>">
					<i class="fa fa-cogs fa-lg"></i> Developer's Best Friend
				</a>
			</div>
			<ul class="nav navbar-nav navbar-right list-unstyled list-inline">
				<li><a href="loremipsum">Lorem Ipsum</a></li>
				<li><a href="users">User Generator</a></li>
			</ul>	
		</nav>
	@show

	<div class="container-fluid">
		@section('subhead')
			<section>
				<div class="subhead">

		@show
		@section('endsubhead')
			</div>
			</section>
		@show
		<section>
				@yield('content')
		</section>
	</div>

	<footer>
		<p>because footers are nice</p>
	</footer>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

@yield('body')
	
</body>
</html>