@extends('layouts.master')

@section('title')
	RHJ: User Generator
@stop

@section('navbar')
	@parent
@stop

@section('subhead')
	@parent
	<h1>User Generator</h1>
@stop

@section('endsubhead')
	@parent
@stop

@section('content')

	@if(count($errors) > 0)
        @foreach ($errors->all() as $error)
	    	<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ $error }}
			</div>
		@endforeach
	@endif
	
	<form method='POST' action='users'>
	    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
	    <div class="form-group">
		    <label for="numusers">Number of <s>users</s> cats (max 10)</label>
		    <input type="number" name="numusers" min="1" max="10" value="<?php echo $formdata['numusers']; ?>" required>
		</div>
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
		<button type="submit" class="btn btn-default">Create some <s>users</s> cats</button>
	</form>

	@if(isset($users))
		<div id="newusers">
        	<?php print_r($users); ?>
        </div>
    @endif
@stop