@extends('layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@php
  $yes_checked = $no_checked = "";
  ($product->is_fragile)? $yes_checked = "checked=checked": $no_checked = "checked=checked"; 
@endphp

<form action="{{ route('products.update',$id) }}" method = "post" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Name of Product:</label>
    <input type="text" class="form-control" id="title" name = "title" value="{{$product->title}}">
  </div>
  <div class="mb-3">
    <label for="detail" class="form-label">Product Details</label>
    <input type="text" class="form-control" id="detail" name = "details" value = "{{ $product->details}}">
  </div>
  <div class = "mb-3">
    <strong>Is the product fragile&nbsp;&nbsp;</strong>

    <input type="radio" id="yes" name="is_fragile" value="YES" {{$yes_checked}}>
    <label for="yes">Yes</label>
    <input type="radio" id="no" name="is_fragile" value="NO" {{$no_checked}}>
    <label for="no">No</label>
  </div>

  <div class="mb-3">
    <label for="img" class="form-label">Upload an image</label>
    <input type="file" name="image" id = "img">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection