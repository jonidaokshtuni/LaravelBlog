@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
 @if(Sentinel::check())
<p>Hello {{Sentinel::getUSer()->first_name}}</p>
@else
    Test
@endif
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')   
<script> console.log('Hi!'); </script>
@stop

@push('css')

@push('js')