@extends('layouts.app')

@section('content')

@php
  $hidden = '';

  $company = (object) [
    'id' => 'new',
    'kontakter' => Auth::user()->name
  ];
@endphp

<div class="container">
    <div class="row justify-content-center box">
      <div class="col-12">        
        @include('template-parts.new-company')
      </div>
    </div>

</div>


@endsection
