@extends('layout.base')
@section('main-container')
<div class="container mx-auto">

    @dump($errors)
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('layout.status_message')

    {{-- <form method="POST" action="{{route('categories.update',['category'=>$data->id])}}" enctype="multipart/form-data">
      @csrf --}}

      {!! Form::open(array('route' => array('products.update', $data->id),
          'method'=>'post',
          'files'=>true
        )) !!}

            {{-- @method('PUT') --}}
            <input type="hidden" name="_method" value="put">
            @include('product.form')

      {!! Form::close() !!}
      {{-- </form> --}}
</div>
@endsection
