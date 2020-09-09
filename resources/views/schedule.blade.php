@extends('layouts.app')

@section('content')



<div class="container" >

  <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link @if($status=='missed') active @endif" id="home-tab" data-toggle="tab" onclick="window.location.href='http://localhost/Laravel/nc-db/public/schedule/missed';" href="missed" role="tab" aria-selected="true">Missed</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($status=='todays') active @endif" id="profile-tab" data-toggle="tab" onclick="window.location.href='http://localhost/Laravel/nc-db/public/schedule/todays';" href="#" role="tab" aria-selected="false">Todays</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($status=='upcoming') active @endif" id="contact-tab" data-toggle="tab" onclick="window.location.href='http://localhost/Laravel/nc-db/public/schedule/upcoming';" href="upcoming" role="tab" aria-selected="false">Upcoming</a>
    </li>
  </ul>
    @foreach ($result as $conversation)

          @include('template-parts.history')

    @endforeach

    <center>{{ $result->links() }}</center>
</div>
@endsection
