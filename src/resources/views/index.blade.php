@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('content')
<p>ログインID： {{Auth::id()}} </p>
<p>ログインユーザー：{{Auth::user()->name}}</p>
@endsection