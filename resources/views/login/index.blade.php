@extends('layout.base')
@section('main-container')
<div class="container mx-auto">

    @dump($errors)
    @include('layout.status_message')
        {!! Form::open(array(
            'route' => 'login.login',
            'method'=>'post',
            ))
            !!}

      @include('login.form')

      {!! Form::close() !!}

</div>
@endsection
