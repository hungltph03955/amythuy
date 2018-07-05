@if(count($errors) >0)
    <div class="alert alert-danger gennerError">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif
@if(session('mess'))
    <div class="alert alert-success gennerError">
        {{session('mess')}}
    </div>
@endif