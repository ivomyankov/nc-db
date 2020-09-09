<div id="alerts">
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div id="danger" class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div id="success" class="alert alert-success">
    {{session('success')}}
  </div>
@elseif(session('error'))
  <div id="danger" class="alert alert-danger">
    {{session('error')}}
  </div>
@elseif(session('primary'))
    <div id="primary" class="alert alert-primary">
      {{session('primary')}}
    </div>
@endif
</div>
