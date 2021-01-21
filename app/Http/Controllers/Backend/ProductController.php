<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Category;
use App\Model\Media;
use App\Model\Location;
use App\Http\Requests\Backend\ProductRequest;
Use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data) && array_key_exists('category_id', $data)) {
                $products = Product::where('name', 'like', '%' . $data['name'] . '%')
                                    ->where('category_id', $data['category_id'])->paginate(25);
            }
        }
        return view('admin.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_media')) {
            $media = saveSingleMedia($request, 'image');
            if (TRUE != $media['status']) {
                Alert::error('Error', 'product Not Found');
                return redirect(route('product.index'));
            }
            $data['media_id'] = $media['media_id'];
        }
        $product = Product::create($data);
        Alert::success('Success', 'Successfully Created product');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        if(empty($product)){
            Alert::error('Error', 'product Not Found');
            return redirect(route('product.index'));
        }
        return view('admin.product.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image_media')) {
            $media = saveSingleMedia($request, 'image');
            if (TRUE == $media['status']) {
                $data['media_id'] = $media['media_id'];
            }
        }
        if (!array_key_exists('recommend', $data)) {
            $data['recommend'] = 0;
        }
        if (!array_key_exists('main_product', $data)) {
            $data['main_product'] = 0;
        }
        Product::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated product');
        return redirect(route('product.index'));
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
        if (empty($product)) {
            Alert::error('Error', 'product Not Found');
            return redirect(route('product.index'));
        }
        $product->delete();
        Alert::success('Success', 'Successfully deleted product');
        return redirect(route('product.index'));
    }
}
