   @extends('layout.base')
   @section('main-container')

   <div class="container mx-auto">
    <h1>{{$title}}</h1>
   @include('layout.status_message')

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category_Name</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
          <th scope="row">{{$item->id}}</th>
          <td>{{$item->category_name}}</td>
          <td><img src="{{Storage::disk('public')->url('upload/'.$item->image)}}" width="50px" height="50px" /></td>
          <td> 
            <a class="btn btn-primary" href="{{route('categories.edit', ['category'=>$item->id])}}" >Edit</a>  
            <button class="btn btn-danger ">delete</button>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table>
</div>

   @endsection
