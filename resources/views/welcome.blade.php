@extends('layouts.master')

@section('title')
welcome 
@endsection

@section('content')

@include('includes.message-block')
<div class="row">
    <div class="col-md-5">
        <h3>Sign Up</h3>
        <form action="{{ route('signup')}}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Email Address</label>
                <input class="form-control"  type="text" id="email" name="email" value="{{ Request::old('email')}}">
            </div>
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}} ">
                <label for="first_name">First Name</label>
                <input class="form-control"  type="text" id="first_name" name="first_name" value="{{ Request::old('first_name')}}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password">Password</label>
                <input class="form-control"  type="password" id="password" name="password" value="{{ Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token()}}">
        </form>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5">
        <h3>Sign In</h3>
        <form action="{{ route('signin')}}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Email Address</label>
                <input class="form-control"  type="text" id="email" name="email" value="{{ Request::old('email')}}">
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}} ">
                <label for="password">Password</label>
                <input class="form-control"  type="text" id="password" name="password" value="{{ Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token()}}">
        </form>
    </div>
</div>

@endsection
