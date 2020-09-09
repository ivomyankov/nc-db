@extends('layouts.app')

@section('content')

<div id="searchResBox" >
  <b>Results:</b> <i>{{$count}}</i> <br>
  <b>Search phrases:</b> <i>{{$srch}}</i>
</div>

@foreach ($result as $company)

  <a href="{{route('getcompany',['id' => $company->id])}}" ><div class="srch_res box">ID:{{$company->id}} Company: {{$company->firma1}}</div></a>

@endforeach

@endsection
