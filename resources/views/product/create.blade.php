@extends('layout.base')
@section('main-container')
<div class="container mx-auto">

  @dump($errors)
  {{-- @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        {!! Form::open(array(
            'route' => 'products.index',
            'method'=>'post',
            'files'=>true
            ))
            !!}

      @include('product.form')

      {!! Form::close() !!}

</div>
@endsection
