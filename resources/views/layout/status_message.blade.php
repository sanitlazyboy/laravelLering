@if (session('success'))
    
<div class="alert alert-success">
  <ul>
    {{session('success')}} 
  </ul>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
  <ul>
       {{session('error')}} 
  </ul>
</div>
@endif