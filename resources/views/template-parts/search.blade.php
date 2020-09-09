<form id="searchBox" action="{{route('search')}}" method="POST">
  @csrf
  <div class="row justify-content-center" style="width: 100%;">

  <div class="col-xs-12 col-sm-9">
      <input name="search" type="text" placeholder="What are you looking for?" >
  </div>
  <div class="col-xs-12 col-sm-3">
      <button class="btn-search" type="submit" >Search</button>
  </div>
</div>
</form>
