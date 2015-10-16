@extends('layouts.master')

@section('title')
	RHJ: User Generator
@stop

@section('header')
	<h1><s>User</s> Cat Generator</h1>
@stop

@section('content')
	<form method='POST' action='users'>
	    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
	    <div class="form-group">
		    <label for="numusers">Number of <s>users</s> cats (max 10)</label>
		    <input type="number" id="numusers" min="1" max="10" value="<?php echo $numusers; ?>">
		</div>
		 <div class="checkbox">
		    <label>
		      <input type="checkbox" id="address"> Include a mailing address
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" id="phone"> Include a phone number
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" id="birthday"> Include a birthday
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" id="text"> Include profile text
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" id="photo"> Include a profile photo
		    </label>
	  	</div>
		<button type="submit" class="btn btn-default">Create some <s>users</s> cats</button>
	</form>

	@if(isset($paragraphs))
		<div id="newusers">
        	<p>show the users</p>
        </div>
    @endif
@stop