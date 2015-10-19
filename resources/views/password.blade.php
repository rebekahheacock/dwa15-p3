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
				    <ul>
				        @foreach ($errors->all() as $error) 
				            <div class="alert alert-danger alert-dismissible fade in" role="alert">
			  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  					{{ $error }}
							</div>
				        @endforeach
				    </ul>
				@endif

				<form id="newpassword" action="xckdpassword" method="POST">
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
					      <input type="radio" <?php echo $formdata['memorable']; ?> name="fancy" id="memorable"> Make it memorable <small>Four words in grammatically correct order</small>
					    </label><br>
					    <label for="dino" class="radio-inline">
					      <input type="radio" <?php echo $formdata['dino']; ?> name="fancy" id="dinosaurs"> Dinosaurs! <small>Include a <a href="https://github.com/dariusk/corpora/blob/master/data/animals/dinosaurs.json">real dinosaur name</a> in the password</small>
					    </label>
					</fieldset>
					
					<button type="submit" name="submit" value="submit" class="btn btn-default">Password, please!</button>
				</form>


			</div>

			<div class="col-md-9">

				@if(isset($paragraphs))
					<div id="loremipsumtext">
			        	<p>
			        	<?php echo implode('<p>', $paragraphs); ?>
			        </div>
			    @endif

		    </div>
		</div>
    </div>
@stop

@section('body')
	<script src="js/p3.js"></script>
@stop
