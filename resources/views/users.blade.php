@extends('layouts.master')

@section('title')
	RHJ: User Generator
@stop

@section('subhead')
	<div class="container-fluid">
		<div class="subhead">
			<h1><i class="fa fa-users"></i> Random User Generator</h1>
		</div>
@stop

@section('content')

	<div class="row">

		<div class="col-md-3">

			@if(count($errors) > 0)
		        @foreach ($errors->all() as $error)
			    	<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						{{ $error }}
					</div>
				@endforeach
			@endif
	
			<form method="POST" action="users">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <label for="numusers">Number of users (max 10)</label>
			    <input type="number" name="numusers" class="form-control" min="1" max="10" value="<?php echo $formdata['numusers']; ?>" required>
				 <div class="checkbox">
				    <label>
				      <input type="checkbox" <?php echo $formdata['addressyes']; ?> name="address"> Include a mailing address
				    </label>
			  	</div>
			  	<div class="checkbox">
				    <label>
				      <input type="checkbox" <?php echo $formdata['phoneyes']; ?> name="phone"> Include a phone number
				    </label>
			  	</div>
			  	<div class="checkbox">
				    <label>
				      <input type="checkbox" <?php echo $formdata['birthdayyes']; ?> name="birthday"> Include a birthday
				    </label>
			  	</div>
			  	<div class="checkbox">
				    <label>
				      <input type="checkbox" <?php echo $formdata['profileyes']; ?> name="profile"> Include profile text
				    </label>
			  	</div>
			  	<div class="checkbox">
				    <label>
				      <input type="checkbox" <?php echo $formdata['photoyes']; ?> name="photo"> Include a profile photo
				    </label>
			  	</div>
				<button type="submit" class="btn btn-default">Let's do it</button>
			</form>
		</div>

		<div class="col-md-9">

			@if(isset($users))
				<div class="users">
				<p>
					Download results as: 
					<a href="randomusers.json" class="btn btn-default" download>JSON</a>
					<a href="randomusers.csv" class="btn btn-default" download>CSV</a>
				</p>
		        	@foreach($users as $user) 
		        		<div class="user">
	        				@if(isset($user['photo']))
		        				<div class="profilepic">
									<img class="profilepic" src="{{ $user['photo']}}">
								</div>
								<div class="userinfo-pic">
							@else
								<div class="userinfo-nopic">
	        				@endif
	        				
				        		<p class="name">{{ $user['name'] }} <small>({{ $user['username'] }})</small></p>
				        		@if(isset($user['profile']))
				        			<p class="profile">{{ $user['profile']}}</p>
				        		@endif
				        		<p class="email">{{ $user['email'] }}</p>
				        		@if(isset($user['birthday']))
				        			<p>{{ $user['birthday'] }}</p>
				        		@endif
				        		@if(isset($user['streetaddress']))
				        			<p>{{ $user['streetaddress'] }}<br>
				        			   {{ $user['city'] }}, {{$user['state'] }} {{ $user['postcode'] }}</p>
				        		@endif
				        		@if(isset($user['phone']))
				        			<p>{{ $user['phone']}}</p>
				        		@endif
				        	</div>
		        		</div>
	        		@endforeach
		    	</div>
		    @endif
		</div>
@stop