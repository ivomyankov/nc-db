@extends('layouts.app')

@section('content')

@foreach ($result as $company)

  @php
    if($company->deleted=='deleted'){
      $forbiden = 'not-allowed';
      $disabled = 'disabled';
      $hidden = 'hidden';
    } else {
      $forbiden = '';
      $disabled = '';
      $hidden = '';
    }
  @endphp
<div class="container">
    <div class="row justify-content-center box">
      <div class="col-xs-12 col-sm-6">
        @include('template-parts.company')

      </div>
      <div class="col-xs-12 col-sm-6">
          @php $cont=0; @endphp
          @include('template-parts.new-contact')
          @foreach ($company->contacts as $contact)
            @php $cont++; @endphp
            @include('template-parts.contact')
          @endforeach

          @include('template-parts.dialog')
      </div>

    </div>
    @foreach ($company->conversations as $conversation)
      @include('template-parts.conversation')
    @endforeach
</div>
@endforeach

@endsection
