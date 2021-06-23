<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;

use App\Models\Product;


class ProductController extends Controller
{
    private function store_or_update($product, $request)
    {
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->slug = $request['slug'];
        $product->sku = $request['sku'];
        $product->price = $request['price'];

        try {
            $product->save();
        }
        catch(QueryException $e){
            return Redirect::back()->withInput()
                                    ->withError($e->getMessage());
        }
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();

        $this->store_or_update($product, $request);

        return redirect()->route('admin.dashboard')->withSuccess("Product added to database.");
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->store_or_update($product, $request);

        return redirect()->route('admin.dashboard')->withSuccess("Product has been updated.");
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('admin.dashboard')->withSuccess("Product has been deleted.");
    }
}