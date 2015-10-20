@extends('layouts.master')

@section('title')
	RHJ: XKCD Password Generator
@stop

@section('subhead')
	<div class="container-fluid">
		<div class="subhead">
			<h1><i class="fa fa-key"></i> XKCD Password Generator</h1>
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

				<form id="newpassword" action="password" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label for="numwords">Number of words (max 9)</label>
					<input type="number" name="numwords" class="form-control" min="1" max="9" value="<?php echo $formdata['numwords']; ?>" required> 
					<div class="checkbox">
					    <label>
					      <input type="checkbox" <?php echo $formdata['numyes']; ?> name="num"> Include a number
					    </label>
				  	</div>
				  	<div class="checkbox">
					    <label>
					      <input type="checkbox" <?php echo $formdata['symbolyes']; ?> name="symbol"> Include a symbol
					    </label>
				  	</div>
					<fieldset>
						<legend>Separator*</legend>
						<label for="separatorspace" class="radio-inline">
							<input type="radio" name="separator" id="separatorspace" required <?php echo $formdata['separator_space'] ?> value="space"> Space
						</label><br>
						<label for="separatordash" class="radio-inline">
							<input type="radio" name="separator" id="separatordash" required <?php echo $formdata['separator_dash'] ?> value="dash"> -
						</label><br>
						<label for="separatordot" class="radio-inline">
							<input type="radio" name="separator" id="separatordot" required <?php echo $formdata['separator_dot'] ?> value="dot"> .
						</label><br>
						<label for="separatornone" class="radio-inline">
							<input type="radio" name="separator" id="separatornone" required <?php echo $formdata['separator_none'] ?> value="none"> No separator
						</label><br>
						<label for="separatorrandom" class="radio-inline">
							<input type="radio" name="separator" id="separatorrandom" required <?php echo $formdata['separator_random'] ?> value="random"> Surprise me
						</label>
					</fieldset>
					<fieldset>
						<legend>Let's get fancy</legend>
					    <label for="memorable" class="radio-inline">
					    	<input type="radio" <?php echo $formdata['memorable']; ?> name="fancy" id="memorable" value="memorable"> Make it memorable<br><small>Four words in grammatically correct order</small>
					    </label><br>
					    <label for="dino" class="radio-inline">
					    	<input type="radio" <?php echo $formdata['dino']; ?> name="fancy" id="dino" value="dino"> Dinosaurs!<br><small>Include a <a href="https://github.com/dariusk/corpora/blob/master/data/animals/dinosaurs.json">real dinosaur name</a> in the password</small>
					    </label>
					</fieldset>
					
					<button type="submit" name="submit" value="submit" class="btn btn-default">Password, please!</button>
				</form>


			</div>

			<div class="col-md-9">

				<div class="password">

					@if(isset($password_string))
				        	<p>{{ $password_string }}<p>
				    @else
				    	<p>********</p>
				    @endif

				    @if($formdata['dino'] == 'checked')
				    	<img src="img/dino.png" alt="Dinosaur" class="password-img">
				    	<p class="caption"><a href="https://thenounproject.com/term/dinosaur/161852">Dinosaur icon</a> by <a href="https://thenounproject.com/goodmajr2827">Jennifer Goodman</a> on the <a href="https://thenounproject.com/">Noun Project</a>. Used under a <a href="http://creativecommons.org/licenses/by/3.0/us/">CC-BY 3.0</a> license.</p>
				    @else
					    <a href="http://xkcd.com/936/"><img src="img/xkcd_password_strength.png" alt="XKCD Password Strength" class="password-img" title="Original hovertext: 'To anyone who understands information theory and security and is in an infuriating argument with someone who does not (possibly involving mixed case), I sincerely apologize.'"></a>
					    <p class="caption"><a href="http://xkcd.com/936/">via XKCD</a></p>
					@endif

			    </div>

		    </div>
		</div>
    </div>
@stop

@section('body')
	<script src="js/p3.js"></script>
@stop
