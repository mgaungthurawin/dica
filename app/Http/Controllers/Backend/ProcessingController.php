<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductLocation;
use App\Model\Processing;
use App\Model\Product;
use App\Http\Requests\Backend\ProcessingRequest;
Use Alert;

class ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $processings = Processing::orderBy('recommend', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data)) {
                $processings = Processing::where('main_process', 'like', '%' . $data['name'] . '%')->paginate(25);
            }
        }
        return view('admin.processing.index', compact('processings'));
    }

    /**
     * Show the form for creating a processing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $products = Product::all();
        return view('admin.processing.create', compact('products'));
    }

    /**
     * Store a processingly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessingRequest $request)
    {
    	$data = $request->all();
        $data['product_string'] = json_encode($data['product_string']);
        Processing::create($data);
        Alert::success('Success', 'Successfully Created main processings');
        return redirect(url('admin/processing'));
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
        $processing = Processing::find($id);
        $products = Product::all();
        $selected_product = json_decode($processing->product_string, TRUE);
        if(empty($processing)) {
            Alert::error('Error', 'main processings Not Found');
            return redirect(route('processing.index'));
        }
        return view('admin.processing.edit', compact('processing','products', 'selected_product'));
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
        $data['location_id'] = json_encode($request['location_id']);
        $data['product_string'] = json_encode($request['product_string']);

        if (!array_key_exists('recommend', $data)) {
            $data['recommend'] = 0;
        }
        if (!array_key_exists('main_classification', $data)) {
            $data['main_classification'] = 0;
        }
        Processing::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated main processings');
        return redirect(url('admin/processing'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processing = Processing::find($id);
        if(empty($processing)) {
            Alert::error('Error', 'main processings Not Found');
            return redirect(url('admin/processing'));
        }
        $processing->delete();
        Alert::success('Success', 'Successfully deleted main processings');
        return redirect(url('admin/processing'));
    }
}
