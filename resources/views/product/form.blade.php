<div class="mb-3">
    {!! Form::label('category_id', 'Category', array('class' =>'form-label'))!!}
    {{ Form::select('category_id', $categories, isset($data)? $data->category_id:null, ['class'=>'form-label', 'id'=>'category_id']) }}
    @error('category_id')
    <div class="text text-danger">{{  $errors->first('category_id') }}</div>
    @enderror
 </div>

  <div class="mb-3">
    {!! Form::label('product_name', 'Product Name', array('class' =>'form-label'))!!}
    {!! Form::text($name="product_name", $value = isset($data)? $data->product_name:null, $attributes = array('class' =>'form-label')) !!}
    @error('product_name')
    <div class="text text-danger">{{  $errors->first('product_name') }}</div>
    @enderror
  </div>

  <div class="mb-3">
    {!! Form::label('color', 'Color', array('class' =>'form-label'))!!}
    {!! Form::text($name="color", $value = isset($data)? $data->color:null, $attributes = array('class' =>'form-label')) !!}
    @error('color')
    <div class="text text-danger">{{  $errors->first('color') }}</div>
    @enderror
  </div>

  <div class="mb-3">
    {!! Form::label('quantity', 'Quantity', array('class' =>'form-label'))!!}
    {!! Form::text($name="quantity", $value = isset($data)? $data->quantity:null, $attributes = array('class' =>'form-label')) !!}
    @error('quantity')
    <div class="text text-danger">{{  $errors->first('quantity') }}</div>
    @enderror
  </div>

  {!! Form::submit('Submit', $attributes = array('class' =>'btn btn-primary'))!!}
