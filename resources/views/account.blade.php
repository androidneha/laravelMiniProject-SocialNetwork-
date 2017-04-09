@extends('layouts.master')
@section('title')
Account
@endsection
@section('content')

<section class="row new-post">
    
    @if(Storage::disk('local')->has($user->first_name.'-'.$user->id.'.jpg'))
     <div class="col-md-3">
            <img src="{{route('account.image',['filename'=>$user->first_name.'-'.$user->id.'.jpg'])}}" alt="" class="img-responsive">
        </div>
    @endif
    <div class="col-md-9 ">
        <header><h3>Your Account </h3></header>
        <form action="{{route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="first_name">First Name </label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                <label for="image">Image(only .jpg) </label>
                <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
        </form>	
    </div>
</section>
    
@endsection

