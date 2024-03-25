<div class="mb-3">
  {{-- <label for="exampleInputEmail1" class="form-label">Email address</label> --}}
  {{-- <input name="category_name" type="text" class="form-control" value="{{ isset($data)? $data->category_name:"" }}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
  {!! Form::label('Name', 'Category Name', array('class' =>'form-label'))!!}
  {!! Form::text($name="category_name", $value = isset($data)? $data->category_name:null, $attributes = array('class' =>'form-label')) !!}
  @error('category_name')
<div class="text text-danger">{{  $errors->first('category_name') }}</div>
@enderror
</div>
<div class="mb-3">
  {{-- <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="file" name="image" class="form-control" id="exampleInputPassword1"> --}}
  {!! Form::label('Image', 'image', array('class' =>'form-label')),
      Form::file('image', $attributes = array('class' =>'form-label','id'=>'exampleInputPassword1')) !!}
  @isset($data)
  <img src="{{Storage::disk('public')->url('upload/'.$data->image)}}" width="50px" height="50px" />
  @else
  <img src="{{Storage::disk('public')->url('/img/default.jpeg')}}" width="50px" height="50px" />
  @endisset
  @error('image')
<div class="text text-danger">{{  $errors->first('image') }}</div>
@enderror
</div>
{{-- {!!Form::checkbox('name', 'value'),
   Form::radio('name', 'value'),
   Form::checkbox('name', 'value', true),
   Form::radio('name', 'value', true),
   Form::number('name', 'value'),
   Form::file('image'),
   Form::select('size', array('L' => 'Large', 'S' => 'Small')),
   Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S'),
   Form::select('animal', array(
    'Cats' => array('leopard' => 'Leopard'),
    'Dogs' => array('spaniel' => 'Spaniel'),
   )),
   Form::selectRange('number', 10, 20),
   Form::selectMonth('month'),
   Form::selectYear('year',2001, 2024)
!!} --}}
{!! Form::submit('Submit', $attributes = array('class' =>'btn btn-primary'))!!}
{{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
