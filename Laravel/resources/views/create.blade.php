@extends('layout')
@section('content')

<h2>List a new product!</h2>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}"  method = "POST" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name of Product:</label>
    <input type="text" class="form-control" id="title" name = "title">
  </div>
  <div class="mb-3">
    <label for="detail" class="form-label">Product Details</label>
    <textarea class = "form-control" name ="details" id="detail" rows="5"></textarea> 
  </div>
  <div class = "mb-3">
    <strong>Is the product fragile&nbsp;&nbsp;</strong>
    <input type="radio" id="yes" name="is_fragile" value="YES" checked="checked">
    <label for="yes">Yes</label>
    <input type="radio" id="no" name="is_fragile" value="NO">
    <label for="no">No</label>
  </div>
  <div class = "mb-3">
    <label for="location">Location&nbsp;&nbsp;</label>
    <select name="city" id="location">
      <option value="Dhaka">Dhaka</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Barisal">Barisal</option>
      <option value="Khulna">Khulna</option>
    </select>
    <select name="thana" id="location">
      <option value="Mohammadpur">Mohammadpur</option>
      <option value="Mirpur">Mirpur</option>
      <option value="Barisal">Barisal</option>
      <option value="Khulna">Khulna</option>
    </select>
    <select name="jela" id="location">
      <option value="Dhaka">Dhaka</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Barisal">Barisal</option>
      <option value="Khulna">Khulna</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="img" class="form-label">Upload an image</label>
    <input type="file" name="image" id = "img" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
