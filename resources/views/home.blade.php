@extends('layouts.app')

@section('content')
<div class="container">
  <br><br><br><br>
    <div class="row justify-content-center box">
      <div class="col-md-12" style="text-align: center;">
        <br><br><br>
      <H2>Hello {{ Auth::user()->name }}</H2>
    </div>
    <div class="col-md-12" style="text-align: center;">
      <img src="{{ url('/images/fist') }}.gif">
    </div>
<br>
    </div>
</div>
@endsection
