@extends('layouts.app')

@section('content')



<div class="container" >
  <div id="filter" class="navbar" style="margin: -1.5rem auto 20px auto; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; padding: 20px;">
    <div class="col-xs-12 col-sm-4"></div>
    <div class="col-xs-12 col-sm-2">
      <select class="form-control" id="incrementation" alt="">
          <option @if ($filter[0]=='DESC') selected @endif value="{{ url('/') }}/history/DESC" >Descending</option>
          <option @if ($filter[0]=='ASC') selected @endif value="{{ url('/') }}/history/ASC" >Ascendingd</option>
      </select></div>
    <div class="col-xs-12 col-sm-2">
      <select class="form-control" id="staffFilter">
        <option selected >All</option>
        @foreach ($users as $user)
          <option @if ($filter[1] == $user->name ) selected @endif value="{{$user->name}}" >{{$user->name}}</option>
          <!-- @if (Auth::user()->name==$user->name)
            <option selected value="{{ url('/') }}/{{$user->name}}">{{$user->name}}</option>
          @else
            <option value="{{$user->name}}" >{{$user->name}}</option>
          @endif -->
        @endforeach
      </select>
    </div>
    <div class="col-xs-12 col-sm-2"><input class="form-control" id="from_date" value="@if ($filter[2] != NULL ) {{$filter[2]}} @else ∞ @endif" type="text"></div>
    <div class="col-xs-12 col-sm-2"><input class="form-control" id="to_date" value="@if ($filter[3] != NULL ) {{$filter[3]}} @else ∞ @endif" type="text"></div>
  </div>
  <div class="navbar" id="filterToggle()" onclick="filterToggle()" style="width:40px; top: 0px; margin: -1.5rem 0 3rem 90%;border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; cursor: pointer;"><i id="toggler" class="fa fa-chevron-up"></i></div>

    @foreach ($result as $conversation)

          @include('template-parts.history')

    @endforeach

    <center>{{ $result->links() }}</center>
</div>
@endsection
