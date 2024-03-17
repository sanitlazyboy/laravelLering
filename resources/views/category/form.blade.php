<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input name="category_name" type="text" class="form-control" value="{{ isset($data)? $data->category_name:"" }}" id="exampleInputEmail1" aria-describedby="emailHelp">
  @error('category_name')
<div class="text text-danger">{{  $errors->first('category_name') }}</div>
@enderror
</div>
<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="file" name="image" class="form-control" id="exampleInputPassword1">
  @isset($data)      
  <img src="{{Storage::disk('public')->url('upload/'.$data->image)}}" width="50px" height="50px" />
  @else
  <img src="" width="50px" height="50px" />
  @endisset
  @error('image')
<div class="text text-danger">{{  $errors->first('image') }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>