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
  
  @section('navbar')

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
  </div> 
  @endif

  @if(Session::has('error'))
  <div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
  </div> 
  @endif


  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">details</th>
        <th scope="col">action</th>

      </tr>
    </thead>
    <tbody>
      
        @foreach ($offre as $item)
            
        <tr>
          <th scope="row">{{$item->id}}</th>
          <td>{{$item->name}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->details}}</td>
          {{-- <td>{{$item->image}}</td> --}}

          <td>

          <a href="{{route('editoffer',$item->id)}}" class="btn btn-success">update</a>
          <a href="{{route('deleteoffer',$item->id)}}" class="btn btn-danger">delete</a>


          </td>

        </tr>
        @endforeach
    
    </tbody>
  </table>
  @endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
