@extends('layout.base')
@section('main-container')

<div class="container mx-auto">
 <h1>{{$title}}</h1>
@include('layout.status_message')

 <table class="table">
     <thead>
       <tr>
         <th scope="col">Id</th>
         <th scope="col">Category_Id</th>
         <th scope="col">Product Name</th>
         <th scope="col">Color</th>
         <th scope="col">Quantity</th>
       </tr>
     </thead>
     <tbody>
       @foreach ($data as $item)
       <tr>
       <th scope="row">{{$item->id}}</th>
       <td>{{$item->category->category_name}}</td>
       <td>{{$item->product_name}}</td>
       <td>{{$item->color}}</td>
       <td>{{$item->quantity}}</td>
       <td></td>
       <td>
         <a class="btn btn-primary" href="{{route('products.edit', ['product'=>$item->id])}}" >Edit</a>
         <button class="btn btn-danger ">delete</button>
       </td>
     </tr>
       @endforeach
     </tbody>
   </table>
</div>

@endsection
