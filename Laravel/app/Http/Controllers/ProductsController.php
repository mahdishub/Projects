<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ProductsController extends Controller
{

    public function __construct() {
        $this->middleware('check')->only('store','update');
    }



    public function index()
    {
        $products = Product::all();
        return view('index')->with(compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        
        $product = new Product;
        $product->title = $request->title;
        $product->details = $request->details;
        $product->is_fragile = ($request->is_fragile == 'YES') ? 1:0;
        $product->location = $request->city.",".$request->thana.",".$request->jela;


        $file = $request->file('image');
        if ( $file != null ) {        
            $request->image = time().'.'.$file->getClientOriginalExtension();
            $product->image = $request->image;
            $file->move('storage/images/',$product->image);
        }
        else {
            $product->image = 'default.png';
        }
        
        $product->save();

        return redirect(route('products.index'));

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit',compact('product'))->with('id',$id);
    }

    public function update(Request $request, $id)
    {
        

        ///find the tuple to update
        $product = Product::find($id);
        $product->title = $request->title;
        $product->details = $request->details;
        $old_image = $product->image; /// store old image path
        ///find the tuple to update

        ///Storing new image
        $file = $request->file('image'); 

        ///checks on the image file
        if ( $file != null ) {       
            $request->image = time().'.'.$file->getClientOriginalExtension();
            $product->image = $request->image; /// setting new image name
            $file->move('storage/images/',$product->image);
            if( $old_image != 'default.png') { /// checking so that we dont delete dafult.png
                FILE::delete('storage/images/'.$old_image); /// deleting old image
            }
        }
        ///checks on the image file

        ///Stroring new image

        
        
        
        $product->save();

        return redirect(route('products.index'));

    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if( $product->image != 'default.png') {
            FILE::delete('storage/images/'.$product->image); /// deleting old image
        }
        $product->delete();
        return redirect(route('products.index'));
    }
}
