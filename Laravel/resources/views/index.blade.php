@extends('layout')

@section('content')
<h2>PRODUCT TABLE</h2>
<table class="table table-dark">
    <tr>
      <th>SL no.</th>
      <th>Image</th>
      <th>Name</th>
      <th>Detail</th>
      <th>Is Fragile</th>
      <th>Location</th>
      <th>Actions</th>
    </tr>
    @php
    	$i=1;
        $image_name = 'default.png';
    @endphp
    @foreach ( $products as $product )
    <tr>
    	<td>{{ $i++ }}</td>


        @php
            if ( $product->image != null) { $image_name = $product->image; }
        @endphp

        <td><img src = "{{ asset('storage/images/'.$image_name) }}" alt="{{$image_name}}" width="100px" height="100px"></td>
    	<td>{{$product->title}}</td>
    	<td>{{$product->details}}</td>
        <td>
            @if ( $product->is_fragile == 1 ) Yes
            @else No
            @endif
        </td>
        <td>{{ $product->location }}</td>
    	<td>
    	<form action="{{ route('products.destroy',$product->id) }}" method="POST">
    		@method('DELETE')
    		@csrf
    		<a class="btn btn-primary" href = "{{route('products.edit',$product->id) }}">Edit</a>
    		<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>

    	</form>
    	</td>
    </tr>
    @endforeach
</table>
<a class= "btn btn-success" href="{{route('products.create') }}"> Create new entry</a>



@endsection




