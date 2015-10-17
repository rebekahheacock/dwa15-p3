@extends('layouts.master')

@section('title')
    RHJ: Developer's Best Friend
@stop

@section('navbar')
@stop

@section('subhead')
@stop

@section('content')

    <div class="home">
        <div class="cogs">
            <i class="fa fa-cogs fa-5x"></i>
        </div>
        <div class="home-header">
            Developer's<br>
            Best Friend
        </div>
        <div class="clear"> </div>
    </div>

    <div class="container-fluid">
        <div class="row apps">
            <div class="col-md-3 col-md-offset-3">
                <a class="tile" href="loremipsum">
                    <i class="fa fa-align-justify fa-5x"></i>
                    <h1>Lorem Ipsum Generator</h1>
                    <p>Paragraphs of filler text.</p>
                </a>
            </div>
            <div class="col-md-3">
                <a class="tile" href="users">
                    <i class="fa fa-users fa-5x"></i>
                    <h1>Random User Generator</h1>
                    <p>Fake users to help test your web app.</p>
                </a>

            </div>
        </div>
    </div>
@stop
