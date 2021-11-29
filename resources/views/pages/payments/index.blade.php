@extends('layouts.app')

@section('navbar') @endsection

@section('content')
    <vue-page-transition name="fade-in-right">
        <router-view/>
    </vue-page-transition>
@endsection

@section('footer') @endsection