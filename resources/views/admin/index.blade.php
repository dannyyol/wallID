@extends('layouts.admin')

@section('content')
  <div class="main-panel">
        <div class="content-wrapper">
             <vue-page-transition name="fade-in-right">
                <router-view/>
            </vue-page-transition>
        </div>
    </div>
@endsection