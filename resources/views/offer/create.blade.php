@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
  
  <h3>Add Your Offers</h3>
  @section('navbar')
  <div class="container mt-3">
      
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
      </div> 
      @endif
      @endsection
        
      <form action="{{route('offerstor')}}" method="POST" class="was-validated">
        @csrf
      
        <div class="mb-3 mt-3">
          <label for="uname" class="form-label">Offer Name</label>
          <input type="text" class="form-control" placeholder="Enter offer name" name="name" >

          @error('name')
          <small class="form-text text-danger">{{$message}}</small>
          @enderror

        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Offer Price</label>
          <input type="text" class="form-control"  placeholder="Enter Offer Price" name="price">

          @error('price')
          <small class="form-text text-danger">{{$message}}</small>
          @enderror
          
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Offer Detils</label>
          <input type="text" class="form-control"  placeholder="Enter Offer Detils" name="details" >
          @error('details')
          <small class="form-text text-danger">{{$message}}</small>
          @enderror
        
        </div>
        <div class="form-check mb-3">
          
          <button type="submit" class="btn btn-primary">Submsit</button>
        </div>

      </form> 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
