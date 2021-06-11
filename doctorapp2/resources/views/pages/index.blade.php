@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h2 class="">
            Welcome to {{ config('app.name', 'Admin') }}
        </h2>
      <hr class="my-4">
        <p>
        Click <strong><a href="{{route('register')}}">here</a></strong> to Register as a Doctor
        </p>
        <p>
            <strong>Thank you!</strong> for joining us to transform the...
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a>
        </p>
    </div>
</div>

@endsection