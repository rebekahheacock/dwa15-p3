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
		    <input type="number" name="numusers" min="1" max="10" value="<?php echo $numusers; ?>">
		</div>
		 <div class="checkbox">
		    <label>
		      <input type="checkbox" <?php echo $addressyes; ?> name="address"> Include a mailing address
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" <?php echo $phoneyes; ?> name="phone"> Include a phone number
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" <?php echo $birthdayyes; ?> name="birthday"> Include a birthday
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" <?php echo $profileyes; ?> name="profile"> Include profile text
		    </label>
	  	</div>
	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" <?php echo $photoyes; ?> name="photo"> Include a profile photo
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