@extends('layouts.default')
@section('title','主页')

@section('content')
    <div class="jumbotron">
        <h1>Hello laravel</h1>
        <p class="lead">
            你现在看到的是 <a href="http://learnku.com/courses/laravel-essential-training">Laravel 入门教程</a>的示例项目主页
        </p>
        <p>
            一切将从这里开始
        </p>
        <p>
            <a href="{{ route('signup') }}" class="btn btn-lg btn-success" role="button">现在注册</a>
        </p>
    </div>
    <h1>主页</h1>
@stop
