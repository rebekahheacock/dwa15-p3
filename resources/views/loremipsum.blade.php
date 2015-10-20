@extends('layouts.master')

@section('title')
	RHJ: LoremIpsum
@stop

@section('subhead')
	<div class="container-fluid">
		<div class="subhead">
			<h1><i class="fa fa-align-justify"></i> Lorem Ipsum Generator</h1>
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

				<form method="POST" action="loremipsum">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <label for="grafs">Number of paragraphs (max 10)</label>
				    <input type="number" id="grafs" name="grafs" class="form-control" value="<?php echo $grafs; ?>" min="1" max="10" required>
					<button type="submit" class="btn btn-default" title="Let's do it">Faciamus hoc (let's do it)</button>
				</form>
			</div>

			<div class="col-md-9">

				@if(isset($paragraphs))
					<div id="loremipsumtext">
						@foreach($paragraphs as $paragraph)
							<p>{{ $paragraph }}</p>
						@endforeach
			        </div>
			    @endif

		    </div>
		</div>
    </div>
@stop
