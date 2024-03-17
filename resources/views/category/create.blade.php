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
    <form method="POST" action="{{url('categories')}}" enctype="multipart/form-data">
      @csrf
      @include('category.form')
    </form>
</div>
@endsection
