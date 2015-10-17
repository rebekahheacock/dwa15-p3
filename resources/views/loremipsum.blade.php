@extends('layouts.master')

@section('title')
	RHJ: LoremIpsum
@stop

@section('subhead')
	<div class="subhead">
		<h1><i class="fa fa-align-justify"></i> Lorem Ipsum Generator</h1>
	</div>
@stop

@section('content')

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

	<form method='POST' action='loremipsum'>
	    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
	    <div class="form-group">
		    <label for="grafs">Number of paragraphs (max 10)</label>
		    <input type="number" name="grafs" value="<?php echo $grafs; ?>" min="1" max="10" required>
		</div>
		<button type="submit" class="btn btn-default" title="Let's do it">Faciamus hoc</button>
	</form>

	@if(isset($paragraphs))
		<div id="loremipsumtext">
        	<p>
        	<?php echo implode('<p>', $paragraphs); ?>
        </div>
    @endif
@stop
