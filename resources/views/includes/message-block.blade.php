@if(count($errors)>0)
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <ul class="list-group">
            @foreach($errors->all() as $err)
            <li class="list-group-item list-group-item-danger">{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-3"></div>
</div>
@endif

@if(Session::has('message'))
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 success">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success"> {{ Session::get('message')}}</li>
        </ul>
       
    </div>
    <div class="col-md-3"></div>
</div>

@endif