@extends('layouts.master')

@section('title')
	RHJ: LoremIpsum
@stop

@section('header')
	<h1>Lorem Ipsum</h1>
@stop

@section('content')
	<form method='POST' action='loremipsum'>
	    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
	    <div class="form-group">
		    <label for="grafs">Number of paragraphs (max 10)</label>
		    <input type="number" id="grafs" min="1" max="10" value="<?php echo $grafs; ?>">
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
