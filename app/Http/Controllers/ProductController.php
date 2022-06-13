<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        if($request->search){
            return Product::wherer('name','ike', '%' . $request->search . '%')
            ->orderBy('id','desc')->paginate(10);
        }else{

        }
            return Product::orderBy('id','desc')->paginate(10);
        */

        /*
        if(request('search')){
            return Product::wherer('name','ike', '%' . request('search') . '%')
            ->orderBy('id','desc')->paginate(10);
        }else{

        }
            return Product::orderBy('id','desc')->paginate(10);
        */

        /*
        $product = Product::query();
        if(request('search')){
            return $products->wherer('name','ike', '%' . request('search') . '%')
            ->orderBy('id','desc')->paginate(10);
        }else {
            return $products->orderBy('id', 'desc')->paginate(10);
        }
        */

        return Product::when(request('search'), function($query) {
            $query->where('name','like', '%' . request('search') . '%');
        })->orderBy('id','desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        // $product = new Product();
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->save(); //samemethods

        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price
        // ]);

        // $product = Product::create($request->all()); security issue


        /*$request->validate([
            'name' => "required|string",
            'price' => "required|numeric"
        ],[
            'name.required' => 'Enter Name',
            'name.string' => 'Enter String',
            'price.required' => 'Enter price',
            'price.numeric' => "Enter Numeric"
        ]);*/

        $product = Product::create($request->only('name','price'));
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        /*$request->validate([
            'name' => "nullable|string",
            'price' => "nullable|numeric"
        ],[
            'name.string' => 'Enter String',
            'price.numeric' => 'Enter Numeric'
        ]);*/

        $product = Product::find($id);
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->save();

        $product->update($request->only('name', 'price'));
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }
}
