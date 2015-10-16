@extends('layouts.master')

@section('title')
	RHJ: User Generator
@stop

@section('header')
	<h1>User Generator</h1>
@stop

@section('content')
	<p>form of some sort, plus place to display results</p>

	@if(isset($userstufftbd))
        <p>Show users</p>
    @else
        <p>blank</p>
    @endif
@stop