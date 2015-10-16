@extends('layouts.master')

@section('title')
	RHJ: LoremIpsum
@stop

@section('header')
	<h1>Lorem Ipsum</h1>
@stop

@section('content')
	<p>form of some sort, plus place to display results</p>

	@if(isset($litext))
        <p>Show paragraphs of text</p>
    @else
        <p>blank</p>
    @endif
@stop
