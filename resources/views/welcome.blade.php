@extends('layouts.app')

@section('title', 'Welcome to TPRMS')

@section('content')

    
    @include('home.header')

    @include('home.hero')

    @include('home.about')

    @include('home.features')



    @include('home.contact')

    @include('home.footer')

@endsection
